<?php
/**
 * Imports articles, tags, comments and lead images of the news module into imBlogging
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.2.0
 */
defined("ICMS_ROOT_PATH") || die("ICMS root path not defined");

class ImbloggingNewsImporter
{
    private const BATCH_SIZE = 50;

    private const NEWS_DIRNAME = 'news';

    private $db;

    private $postHandler;

    /** @var array<int, int> */
    private array $categoryMap = [];

    /** @var array<int, array{title: string, parent_id: int}> */
    private array $sprocketsTags = [];

    public function __construct(
        private bool $importTags = true,
        private bool $importComments = true,
        private bool $importImages = true,
        private ?int $newsModuleId = null,
        private ?string $sourcePrefix = null
    ) {
        if ($this->sourcePrefix !== null && !preg_match('/^[A-Za-z0-9_]+$/', $this->sourcePrefix)) {
            $this->sourcePrefix = null;
        }

        $this->db = icms::$xoopsDB;
        $this->postHandler = icms_getModuleHandler('post', IMBLOGGING_DIRNAME, 'imblogging');
    }

    public function isNewsAvailable(): bool
    {
        return $this->tableExists('news_article');
    }

    public function articleTableName(): string
    {
        return $this->table('news_article');
    }

    /**
     * @return array<int, string>
     */
    public function findArticleTables(): array
    {
        $result = $this->db->queryF("SHOW TABLES LIKE '%news\\_article'");

        if (!$result) {
            return [];
        }

        $tables = [];

        while ($row = $this->db->fetchRow($result)) {
            $tables[] = (string) $row[0];
        }

        return $tables;
    }

    private function table(string $name): string
    {
        return $this->sourcePrefix === null ?
            $this->db->prefix($name) :
            "{$this->sourcePrefix}_{$name}";
    }

    private function tableExists(string $name): bool
    {
        $result = $this->db->queryF("SHOW TABLES LIKE '{$this->table($name)}'");

        return $result && $this->db->getRowsNum($result) > 0;
    }

    public function isSprocketsAvailable(): bool
    {
        return $this->tableExists('sprockets_tag') && $this->tableExists('sprockets_taglink');
    }

    public function resolveNewsModuleId(): ?int
    {
        if ($this->newsModuleId !== null && $this->newsModuleId > 0) {
            return $this->newsModuleId;
        }

        $news = icms_getModuleInfo(self::NEWS_DIRNAME);

        if (is_object($news)) {
            return $this->newsModuleId = (int) $news->getVar('mid');
        }

        return $this->newsModuleId = $this->detectNewsModuleIdFromTaglinks();
    }

    public function isNewsModuleInstalled(): bool
    {
        return is_object(icms_getModuleInfo(self::NEWS_DIRNAME));
    }

    private function detectNewsModuleIdFromTaglinks(): ?int
    {
        if (!$this->isSprocketsAvailable()) {
            return null;
        }

        $result = $this->db->query(
            "SELECT DISTINCT mid FROM {$this->table('sprockets_taglink')} WHERE item = 'article' AND mid > 0"
        );

        if (!$result || $this->db->getRowsNum($result) !== 1) {
            return null;
        }

        [$mid] = $this->db->fetchRow($result);

        return (int) $mid;
    }

    public function isImtaggingAvailable(): bool
    {
        $module = icms_getModuleInfo('imtagging');

        return is_object($module);
    }

    public function countArticles(): int
    {
        $result = $this->db->query("SELECT COUNT(*) FROM {$this->table('news_article')}");

        if (!$result) {
            return 0;
        }

        [$count] = $this->db->fetchRow($result);

        return (int) $count;
    }

    /**
     * @return array{
     *     imported: int,
     *     skipped: array<int, string>,
     *     errors: array<int, string>,
     *     comments: int,
     *     next: int,
     *     done: bool
     * }
     */
    public function import(int $offset = 0): array
    {
        $report = [
            'imported' => 0,
            'skipped' => [],
            'errors' => [],
            'comments' => 0,
            'next' => $offset,
            'done' => false,
        ];

        $sql = sprintf(
            'SELECT * FROM %s ORDER BY article_id ASC LIMIT %d, %d',
            $this->table('news_article'),
            $offset,
            self::BATCH_SIZE
        );
        $result = $this->db->query($sql);

        if (!$result) {
            $report['errors'][] = $this->db->error();
            $report['done'] = true;

            return $report;
        }

        $rows = [];

        while ($row = $this->db->fetchArray($result)) {
            $rows[] = $row;
        }

        if (($this->importTags || $this->importComments) && $this->resolveNewsModuleId() === null) {
            $report['errors'][] = _AM_IMBLOGGING_IMPORT_NEWS_MID_UNKNOWN;
        }

        $report['next'] = $offset + count($rows);
        $report['done'] = count($rows) < self::BATCH_SIZE;

        foreach ($rows as $row) {
            $this->importRow($row, $report);
        }

        return $report;
    }

    private function importRow(array $row, array &$report): void
    {
        $title = (string) $row['title'];

        if ($this->postExists($row)) {
            $report['skipped'][] = $title;

            return;
        }

        $post = $this->postHandler->create();
        $post->setVar('post_title', $title);
        $post->setVar('post_content', $this->buildContent($row));
        $post->setVar('post_published_date', (int) $row['date']);
        $post->setVar('post_uid', (int) $row['submitter']);
        $post->setVar('post_status', $this->mapStatus($row));
        $post->setVar('post_cancomment', 1);
        $post->setVar('post_notification_sent', 1);
        $post->setVar('counter', (int) $row['counter']);
        $post->setVar('dohtml', (int) $row['dohtml']);
        $post->setVar('dobr', (int) $row['dobr']);
        $post->setVar('dosmiley', (int) $row['dosmiley']);
        $post->setVar('doxcode', (int) ($row['doxcode'] ?? $row['docxode'] ?? 1));
        $post->setVar('short_url', (string) ($row['short_url'] ?? ''));
        $post->setVar('meta_keywords', (string) ($row['meta_keywords'] ?? ''));
        $post->setVar('meta_description', (string) ($row['meta_description'] ?? ''));

        if ($this->importTags) {
            $post->setVar('categories', $this->categoryIdsForArticle((int) $row['article_id']));
        }

        if (!$this->postHandler->insert($post, true)) {
            $report['errors'][] = "{$title}: {$post->getHtmlErrors()}";

            return;
        }

        $report['imported']++;

        if ($this->importComments) {
            $report['comments'] += $this->copyComments((int) $row['article_id'], (int) $post->id());
        }
    }

    private function postExists(array $row): bool
    {
        $criteria = new icms_db_criteria_Compo();
        $criteria->add(new icms_db_criteria_Item('post_title', (string) $row['title']));
        $criteria->add(new icms_db_criteria_Item('post_published_date', (int) $row['date']));
        $criteria->add(new icms_db_criteria_Item('post_uid', (int) $row['submitter']));

        return $this->postHandler->getCount($criteria) > 0;
    }

    private function mapStatus(array $row): int
    {
        return (int) $row['online_status'] === 1 ?
            IMBLOGGING_POST_STATUS_PUBLISHED :
            IMBLOGGING_POST_STATUS_DRAFT;
    }

    private function buildContent(array $row): string
    {
        $content = (string) $row['description'];
        $extended = trim((string) $row['extended_text']);

        if ($extended !== '') {
            $content .= "[more]{$extended}";
        }

        if (!$this->importImages) {
            return $content;
        }

        $imageHtml = $this->copyImage((string) $row['image'], (int) $row['display_image']);

        return "{$imageHtml}{$content}";
    }

    private function copyImage(string $filename, int $displayPosition): string
    {
        $filename = basename($filename);

        if ($filename === '' || $displayPosition === 0) {
            return '';
        }

        $source = ICMS_ROOT_PATH . '/uploads/' . self::NEWS_DIRNAME . "/{$filename}";

        if (!is_file($source)) {
            return '';
        }

        $targetDir = ICMS_ROOT_PATH . '/uploads/' . IMBLOGGING_DIRNAME;

        if (!is_dir($targetDir) && !mkdir($targetDir, 0755, true)) {
            return '';
        }

        if (!is_file("{$targetDir}/{$filename}") && !copy($source, "{$targetDir}/{$filename}")) {
            return '';
        }

        $url = ICMS_URL . '/uploads/' . IMBLOGGING_DIRNAME . '/' . rawurlencode($filename);
        $float = $displayPosition === 2 ? 'right' : 'left';

        return "<img src=\"{$url}\" alt=\"\" style=\"float: {$float}; margin: 0 1em 1em 0;\" />";
    }

    /**
     * @return array<int, int>
     */
    private function categoryIdsForArticle(int $articleId): array
    {
        if (!$this->isSprocketsAvailable() || !$this->isImtaggingAvailable()) {
            return [];
        }

        $newsModuleId = $this->resolveNewsModuleId();

        if ($newsModuleId === null) {
            return [];
        }

        $sql = sprintf(
            "SELECT DISTINCT tid FROM %s WHERE mid = %d AND item = 'article' AND iid = %d AND tid > 0",
            $this->table('sprockets_taglink'),
            $newsModuleId,
            $articleId
        );
        $result = $this->db->query($sql);

        if (!$result) {
            return [];
        }

        $categoryIds = [];

        while ($row = $this->db->fetchArray($result)) {
            $categoryId = $this->categoryForTag((int) $row['tid']);

            if ($categoryId > 0) {
                $categoryIds[] = $categoryId;
            }
        }

        return $categoryIds;
    }

    private function categoryForTag(int $tagId): int
    {
        if (isset($this->categoryMap[$tagId])) {
            return $this->categoryMap[$tagId];
        }

        $tag = $this->sprocketsTag($tagId);

        if ($tag === null) {
            return 0;
        }

        $parentId = $tag['parent_id'] > 0 ? $this->categoryForTag($tag['parent_id']) : 0;

        $categoryHandler = icms_getModuleHandler('category', 'imtagging', 'imtagging');
        $existingId = $this->findCategory($tag['title'], $parentId);

        if ($existingId > 0) {
            return $this->categoryMap[$tagId] = $existingId;
        }

        $category = $categoryHandler->create();
        $category->setVar('category_title', $tag['title']);
        $category->setVar('category_pid', $parentId);

        if (!$categoryHandler->insert($category)) {
            return 0;
        }

        return $this->categoryMap[$tagId] = (int) $category->id();
    }

    private function findCategory(string $title, int $parentId): int
    {
        $categoryHandler = icms_getModuleHandler('category', 'imtagging', 'imtagging');

        $criteria = new icms_db_criteria_Compo();
        $criteria->add(new icms_db_criteria_Item('category_title', $title));
        $criteria->add(new icms_db_criteria_Item('category_pid', $parentId));
        $criteria->setLimit(1);

        $categories = $categoryHandler->getObjects($criteria);

        return $categories ? (int) reset($categories)->id() : 0;
    }

    /**
     * @return array{title: string, parent_id: int}|null
     */
    private function sprocketsTag(int $tagId): ?array
    {
        if (isset($this->sprocketsTags[$tagId])) {
            return $this->sprocketsTags[$tagId];
        }

        $sql = sprintf(
            'SELECT title, parent_id FROM %s WHERE tag_id = %d',
            $this->table('sprockets_tag'),
            $tagId
        );
        $result = $this->db->query($sql);

        if (!$result) {
            return null;
        }

        $row = $this->db->fetchArray($result);

        if (!$row) {
            return null;
        }

        return $this->sprocketsTags[$tagId] = [
            'title' => (string) $row['title'],
            'parent_id' => (int) $row['parent_id'],
        ];
    }

    private function copyComments(int $articleId, int $postId): int
    {
        $newsModuleId = $this->resolveNewsModuleId();

        if ($newsModuleId === null) {
            return 0;
        }

        $sql = sprintf(
            'SELECT * FROM %s WHERE com_modid = %d AND com_itemid = %d ORDER BY com_id ASC',
            $this->table('xoopscomments'),
            $newsModuleId,
            $articleId
        );
        $result = $this->db->query($sql);

        if (!$result) {
            return 0;
        }

        $commentHandler = icms::handler('icms_data_comment');
        $imblogging = icms_getModuleInfo(IMBLOGGING_DIRNAME);
        $idMap = [];
        $copied = 0;

        while ($row = $this->db->fetchArray($result)) {
            $comment = $commentHandler->create();
            $comment->setVar('com_modid', (int) $imblogging->getVar('mid'));
            $comment->setVar('com_itemid', $postId);
            $comment->setVar('com_pid', $idMap[(int) $row['com_pid']] ?? 0);

            foreach (['com_icon', 'com_title', 'com_text', 'com_created', 'com_modified', 'com_uid', 'com_ip', 'com_sig', 'com_status', 'com_exparams', 'dohtml', 'dosmiley', 'doxcode', 'doimage', 'dobr'] as $field) {
                $comment->setVar($field, $row[$field]);
            }

            if (!$commentHandler->insert($comment)) {
                continue;
            }

            $newId = (int) $comment->getVar('com_id');
            $idMap[(int) $row['com_id']] = $newId;
            $copied++;

            $rootId = $idMap[(int) $row['com_rootid']] ?? $newId;
            $comment->setVar('com_rootid', $rootId);
            $commentHandler->insert($comment);
        }

        if ($copied > 0) {
            $this->postHandler->updateComments($postId, $copied);
        }

        return $copied;
    }
}
