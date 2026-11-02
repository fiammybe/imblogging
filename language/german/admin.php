<?php
/**
 * English language constants used in admin section of the module
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * 
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// Requirements
define("_AM_IMBLOGGING_REQUIREMENTS", "Voraussetzungen für Blog");
define("_AM_IMBLOGGING_REQUIREMENTS_INFO", "Es wurde Ihr System geprüft, leider erfüllt es nicht alle Anforderungen damit es genutzt werden kann. Folgende Anforderungen werden benötigt.");
define("_AM_IMBLOGGING_REQUIREMENTS_ICMS_BUILD", "Das Modul benötigt mindestens ImpressCMS 1.1.1 RC 1.");
define("_AM_IMBLOGGING_REQUIREMENTS_IMTAGGING", "Es muss vorher das Modul imTagging installiert sein, sonst können keine Kategorien und Tags angelegt werden. Das imTagging kann bei <a href='http://www.impresscms.de/search.php?query=imTagging&action=results'>http://www.impresscms.de</a> gefunden werden.");
define("_AM_IMBLOGGING_REQUIREMENTS_SUPPORT", "Sollten Sie Fragen oder Bedenken haben, besuchen Sie das <a href='http://www.impresscms.de/modules/newbb/'>Impresscms.de - Forum</a>.");

// general
define("_AM_IMBLOGGING_POSTS", "Beiträge");
define("_AM_IMBLOGGING_FIRST_USE", "Das ist der erste Start von diesem Modul, es aktualisiert sich automatisch und erstellt ein Datenbankschema.");

// Post
define("_AM_IMBLOGGING_POSTS_DSC", "Alle Beiträge von diesem Modul");
define("_AM_IMBLOGGING_POST_CREATE", "Blogeintrag schreiben");
define("_AM_IMBLOGGING_POST", "Beitrag");
define("_AM_IMBLOGGING_POST_CREATE_INFO", "Zum Erstellen eines Beitrages bitte das Forumlar ausfüllen.");
define("_AM_IMBLOGGING_POST_EDIT", "Beitrag bearbeiten");
define("_AM_IMBLOGGING_POST_EDIT_INFO", "Zum Bearbeiten des Beitrages bitte das Fomular ausfüllen.");
define("_AM_IMBLOGGING_POST_MODIFIED", "Der Beitrag wurde geändert.");
define("_AM_IMBLOGGING_POST_CREATED", "Der Beitrag wurde erstellt.");
define("_AM_IMBLOGGING_POST_VIEW", "Beitragsinfo");
define("_AM_IMBLOGGING_POST_VIEW_DSC", "Informationen zu diesem Beitrag.");

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
