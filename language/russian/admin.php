<?php
/**
 * Russian language constants used in admin section of the module
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 *  Russian translation. Charset: utf-8 (without BOM)
 */
if (!defined("ICMS_ROOT_PATH")) die("Не определен корневой путь к ICMS");

// Requirements
define("_AM_IMBLOGGING_REQUIREMENTS", "Требования imBlogging");
define("_AM_IMBLOGGING_REQUIREMENTS_INFO", "Мы просмотрели Вашу систему, к сожалению она не содержит всего необходимого для функционирования модуля imBlogging. Ниже представлены необходимые требования.");
define("_AM_IMBLOGGING_REQUIREMENTS_ICMS_BUILD", "Для правильного функционирования модуля imBlogging требуется версия не ниже ImpressCMS 1.1.1 RC 1.");
define("_AM_IMBLOGGING_REQUIREMENTS_IMTAGGING", "Для функционирования модуля imBlogging необходимо установить модуль imTagging. Пожалуйста, возьмите этот модуль в ImpressCMS SVN-депозитарии.");
define("_AM_IMBLOGGING_REQUIREMENTS_SUPPORT", "Если у Вас имеются вопросы или пожелания, пожалуйста, посетите наш форум на сайте <a href='https://www.impresscms.org/modules/iforum/'>https://www.impresscms.org/modules/iforum/</a>.");

// general
define("_AM_IMBLOGGING_POSTS", "Сообщения");
define("_AM_IMBLOGGING_FIRST_USE", "Первый вход в этот модуль. Пожалуйста, обновите модуль, чтобы динамически создать схему базы данных.");

// Post
define("_AM_IMBLOGGING_POSTS_DSC", "Все сообщения в модуле");
define("_AM_IMBLOGGING_POST_CREATE", "Добавить сообщение");
define("_AM_IMBLOGGING_POST", "Сообщение");
define("_AM_IMBLOGGING_POST_CREATE_INFO", "Заполните следующую форму для создания нового сообщения.");
define("_AM_IMBLOGGING_POST_EDIT", "Редактировать это сообщение");
define("_AM_IMBLOGGING_POST_EDIT_INFO", "Заполните следующую форму, чтобы редактировать это сообщение.");
define("_AM_IMBLOGGING_POST_MODIFIED", "Сообщение отредактировано.");
define("_AM_IMBLOGGING_POST_CREATED", "Сообщение создано.");
define("_AM_IMBLOGGING_POST_VIEW", "Информация о сообщении");
define("_AM_IMBLOGGING_POST_VIEW_DSC", "Информация об этом сообщении.");

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
