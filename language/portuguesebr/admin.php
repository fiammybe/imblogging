<?php
/**
 * Portuguese language constants used in admin section of the module
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * 
 * @translation        GibaPhp - http://br.impresscms.org
 */
if (!defined("ICMS_ROOT_PATH")) die("O caminho para o raiz do site não foi definido");

// Requirements
define("_AM_IMBLOGGING_REQUIREMENTS", "Requerimentos do Blog");
define("_AM_IMBLOGGING_REQUIREMENTS_INFO", "Nós analisamos seu sistema, infelizmente ele não atende todos os requisitos necessários para a função deste Blog. Abaixo estão os requisitos necessários.");
define("_AM_IMBLOGGING_REQUIREMENTS_ICMS_BUILD", "O Blog exige, no mínimo, ImpressCMS 1.1.1 RC 1.");
define("_AM_IMBLOGGING_REQUIREMENTS_IMTAGGING", "Este Blog depende do módulo Tag para ser instalado. Por favor, pegue este módulo em nosso SVN no ImpressCMS.");
define("_AM_IMBLOGGING_REQUIREMENTS_SUPPORT", "Se tiver alguma pergunta ou comentário, por favor visite o nosso fórum em <a href='https://www.impresscms.org/modules/iforum/'>https://www.impresscms.org/modules/iforum/</a> ou caso deseja suporte em seu idioma português <a href='https://www.impresscms.org'>https://www.impresscms.org</a> quando estiver aberto.");

// general
define("_AM_IMBLOGGING_POSTS", "Blogs");
define("_AM_IMBLOGGING_FIRST_USE", "Esta é a primeira vez que você está entrando neste módulo. Atualize o módulo imediatamente para criar a sua base de dados padrão.");

// Post
define("_AM_IMBLOGGING_POSTS_DSC", "Todos os Blogs do módulo");
define("_AM_IMBLOGGING_POST_CREATE", "Incluir um Blog");
define("_AM_IMBLOGGING_POST", "Blog");
define("_AM_IMBLOGGING_POST_CREATE_INFO", "Preencher o formulário para criar um novo Blog.");
define("_AM_IMBLOGGING_POST_EDIT", "Editar este Blog");
define("_AM_IMBLOGGING_POST_EDIT_INFO", "Preencha o seguinte formulário para editar este Blog.");
define("_AM_IMBLOGGING_POST_MODIFIED", "O Blog foi modificado com sucesso.");
define("_AM_IMBLOGGING_POST_CREATED", "O Blog foi criado com sucesso.");
define("_AM_IMBLOGGING_POST_VIEW", "Blog info");
define("_AM_IMBLOGGING_POST_VIEW_DSC", "Aqui está a informação sobre este Blog.");

// News import
define("_AM_IMBLOGGING_IMPORT", "Import from News");
define("_AM_IMBLOGGING_IMPORT_DSC", "Copies the articles of the News module to imBlogging. Articles that already exist in imBlogging (same title, date and author) are skipped, so the import can safely be run again.");
define("_AM_IMBLOGGING_IMPORT_NO_NEWS", "The News module data could not be found.");
define("_AM_IMBLOGGING_IMPORT_FOUND", "Articles found in News: %d");
define("_AM_IMBLOGGING_IMPORT_IMAGES", "Copy lead images and place them in the post");
define("_AM_IMBLOGGING_IMPORT_WITH_COMMENTS", "Import comments");
define("_AM_IMBLOGGING_IMPORT_TAGS", "Import Sprockets tags as imTagging categories");
define("_AM_IMBLOGGING_IMPORT_START", "Start import");
define("_AM_IMBLOGGING_IMPORT_CONTINUE", "Import next batch");
define("_AM_IMBLOGGING_IMPORT_REPORT", "Import report");
define("_AM_IMBLOGGING_IMPORT_IMPORTED", "Posts imported: %d");
define("_AM_IMBLOGGING_IMPORT_COMMENTS", "Comments imported: %d");
define("_AM_IMBLOGGING_IMPORT_SKIPPED", "Posts skipped (already exist): %d");
define("_AM_IMBLOGGING_IMPORT_ERRORS", "Errors: %d");
define("_AM_IMBLOGGING_IMPORT_SKIPPED_ITEM", "Skipped:");
define("_AM_IMBLOGGING_IMPORT_DONE", "The import is complete.");

define("_AM_IMBLOGGING_IMPORT_REQUIREMENTS", "The News module does not have to be installed or working: only its database tables are read (news_article, xoopscomments and optionally sprockets_tag and sprockets_taglink, with the same table prefix as this site). Copy the images from uploads/news/ to this site first.");
define("_AM_IMBLOGGING_IMPORT_NEWS_NOT_INSTALLED", "The News module is not installed on this site. Tags and comments can still be imported if you give the module id News had on the source site.");
define("_AM_IMBLOGGING_IMPORT_NEWS_MID", "Module id of News on the source site");
define("_AM_IMBLOGGING_IMPORT_NEWS_MID_DSC", "Needed to find the comments and tags of the articles. Detected automatically when possible.");
define("_AM_IMBLOGGING_IMPORT_NEWS_MID_UNKNOWN", "The module id of News is unknown, so tags and comments were not imported. Enter it and run the import again.");

define("_AM_IMBLOGGING_IMPORT_NO_NEWS_TABLE", "Table not found: %s.");
define("_AM_IMBLOGGING_IMPORT_FOUND_TABLES", "Tables ending in news_article in this database:");
define("_AM_IMBLOGGING_IMPORT_SOURCE_PREFIX", "Table prefix of the News data");
define("_AM_IMBLOGGING_IMPORT_SOURCE_PREFIX_DSC", "Only the part before _news_article, for example icms. Leave empty to use the prefix of this site.");
define("_AM_IMBLOGGING_IMPORT_SOURCE_CHECK", "Check again");
define("_AM_IMBLOGGING_IMPORT_REMAINING", "Posts still to import: %d");
define("_AM_IMBLOGGING_IMPORT_REPAIRED", "Existing posts whose view permission for all groups was restored: %d");
