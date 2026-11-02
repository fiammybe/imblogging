<?php
/**
 * Admin page to import the data of the news module
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.2.0
 */
include_once "admin_header.php";
include_once IMBLOGGING_ROOT_PATH . 'class/NewsImporter.php';

$validOps = ['import', ''];
$cleanOp = isset($_POST['op']) ? htmlentities($_POST['op']) : '';
$cleanOp = isset($_GET['op']) ? htmlentities($_GET['op']) : $cleanOp;

if (!in_array($cleanOp, $validOps, true)) {
    redirect_header(IMBLOGGING_ADMIN_URL . 'import.php', 3, _NOPERM);
}

$source = $_POST + $_GET;
$importTags = !empty($source['import_tags']);
$importComments = !empty($source['import_comments']);
$importImages = !empty($source['import_images']);
$offset = isset($source['offset']) ? max(0, (int) $source['offset']) : 0;

$newsModuleId = isset($source['news_mid']) && (int) $source['news_mid'] > 0 ? (int) $source['news_mid'] : null;

$sourcePrefix = isset($source['source_prefix']) && trim((string) $source['source_prefix']) !== '' ? trim((string) $source['source_prefix']) : null;

$importer = new ImbloggingNewsImporter($importTags, $importComments, $importImages, $newsModuleId, $sourcePrefix);

icms_cp_header();
icms::$module->displayAdminMenu(1, _AM_IMBLOGGING_IMPORT);

if (!$importer->isNewsAvailable()) {
    echo '<div class="errorMsg">' . _AM_IMBLOGGING_IMPORT_NO_NEWS . ' ' . sprintf(_AM_IMBLOGGING_IMPORT_NO_NEWS_TABLE, htmlspecialchars($importer->articleTableName())) . '</div>';

    $foundTables = $importer->findArticleTables();

    if ($foundTables) {
        echo '<p>' . _AM_IMBLOGGING_IMPORT_FOUND_TABLES . ' ' . htmlspecialchars(implode(', ', $foundTables)) . '</p>';
    }

    echo '<form method="post" action="import.php">';
    echo '<p><label>' . _AM_IMBLOGGING_IMPORT_SOURCE_PREFIX . ' <input type="text" name="source_prefix" value="' . htmlspecialchars((string) $sourcePrefix) . '" /></label><br />' . _AM_IMBLOGGING_IMPORT_SOURCE_PREFIX_DSC . '</p>';
    echo '<input type="submit" value="' . _AM_IMBLOGGING_IMPORT_SOURCE_CHECK . '" />';
    echo '</form>';

    icms_cp_footer();
    exit();
}

if ($cleanOp === 'import') {
    if (!icms::$security->check()) {
        redirect_header(IMBLOGGING_ADMIN_URL . 'import.php', 3, implode('<br />', icms::$security->getErrors()));
    }

    $report = $importer->import($offset);

    echo '<h3>' . _AM_IMBLOGGING_IMPORT_REPORT . '</h3>';
    echo '<ul>';
    echo '<li>' . sprintf(_AM_IMBLOGGING_IMPORT_IMPORTED, $report['imported']) . '</li>';
    echo '<li>' . sprintf(_AM_IMBLOGGING_IMPORT_COMMENTS, $report['comments']) . '</li>';
    echo '<li>' . sprintf(_AM_IMBLOGGING_IMPORT_SKIPPED, count($report['skipped'])) . '</li>';
    echo '<li>' . sprintf(_AM_IMBLOGGING_IMPORT_ERRORS, count($report['errors'])) . '</li>';
    echo '</ul>';

    foreach ($report['skipped'] as $title) {
        echo '<div>' . _AM_IMBLOGGING_IMPORT_SKIPPED_ITEM . ' ' . htmlspecialchars($title) . '</div>';
    }

    foreach ($report['errors'] as $error) {
        echo '<div class="errorMsg">' . $error . '</div>';
    }

    if ($report['done']) {
        echo '<p><strong>' . _AM_IMBLOGGING_IMPORT_DONE . '</strong></p>';
        echo '<p><a href="post.php">' . _AM_IMBLOGGING_POSTS . '</a></p>';
        icms_cp_footer();
        exit();
    }

    $continueUrl = IMBLOGGING_ADMIN_URL . 'import.php';

    echo '<form method="post" action="' . $continueUrl . '">';
    echo '<input type="hidden" name="op" value="import" />';
    echo '<input type="hidden" name="offset" value="' . $report['next'] . '" />';
    echo '<input type="hidden" name="import_tags" value="' . (int) $importTags . '" />';
    echo '<input type="hidden" name="import_comments" value="' . (int) $importComments . '" />';
    echo '<input type="hidden" name="import_images" value="' . (int) $importImages . '" />';
    echo '<input type="hidden" name="news_mid" value="' . (int) $importer->resolveNewsModuleId() . '" />';
    echo '<input type="hidden" name="source_prefix" value="' . htmlspecialchars((string) $sourcePrefix) . '" />';
    echo icms::$security->getTokenHTML();
    echo '<input type="submit" value="' . _AM_IMBLOGGING_IMPORT_CONTINUE . '" />';
    echo '</form>';

    icms_cp_footer();
    exit();
}

echo '<h3>' . _AM_IMBLOGGING_IMPORT . '</h3>';
echo '<p>' . _AM_IMBLOGGING_IMPORT_DSC . '</p>';
echo '<p>' . sprintf(_AM_IMBLOGGING_IMPORT_FOUND, $importer->countArticles()) . '</p>';

echo '<p>' . _AM_IMBLOGGING_IMPORT_REQUIREMENTS . '</p>';

if (!$importer->isNewsModuleInstalled()) {
    echo '<div class="errorMsg">' . _AM_IMBLOGGING_IMPORT_NEWS_NOT_INSTALLED . '</div>';
}

echo '<form method="post" action="import.php">';
echo '<input type="hidden" name="op" value="import" />';
echo '<input type="hidden" name="offset" value="0" />';
echo '<input type="hidden" name="source_prefix" value="' . htmlspecialchars((string) $sourcePrefix) . '" />';
echo '<p><label>' . _AM_IMBLOGGING_IMPORT_NEWS_MID . ' <input type="number" name="news_mid" min="1" value="' . (int) $importer->resolveNewsModuleId() . '" /></label><br />' . _AM_IMBLOGGING_IMPORT_NEWS_MID_DSC . '</p>';
echo '<p><label><input type="checkbox" name="import_images" value="1" checked="checked" /> ' . _AM_IMBLOGGING_IMPORT_IMAGES . '</label></p>';
echo '<p><label><input type="checkbox" name="import_comments" value="1" checked="checked" /> ' . _AM_IMBLOGGING_IMPORT_WITH_COMMENTS . '</label></p>';

if ($importer->isSprocketsAvailable() && $importer->isImtaggingAvailable()) {
    echo '<p><label><input type="checkbox" name="import_tags" value="1" checked="checked" /> ' . _AM_IMBLOGGING_IMPORT_TAGS . '</label></p>';
}

echo icms::$security->getTokenHTML();
echo '<input type="submit" value="' . _AM_IMBLOGGING_IMPORT_START . '" />';
echo '</form>';

icms_cp_footer();
