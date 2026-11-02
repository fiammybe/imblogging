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
define("_AM_IMBLOGGING_REQUIREMENTS", "imBlogging Requirements");
define("_AM_IMBLOGGING_REQUIREMENTS_INFO", "We've reviewed your system, unfortunately it doesn't meet all the requirements needed for imBlogging to function. Below are the requirements needed.");
define("_AM_IMBLOGGING_REQUIREMENTS_ICMS_BUILD", "imBlogging requires at least ImpressCMS %s");
define("_AM_IMBLOGGING_REQUIREMENTS_IMTAGGING", "imBlogging requires imTagging to be installed. Please get it from ImpressCMS SVN.");
define("_AM_IMBLOGGING_REQUIREMENTS_SUPPORT", "Should you have any question or concerns, please visit our forums at <a href='https://www.impresscms.org/modules/iforum/'>https://www.impresscms.org/modules/iforum/</a>.");

// general
define("_AM_IMBLOGGING_POSTS", "Posts");
define("_AM_IMBLOGGING_FIRST_USE", "This is the first time you access this module. Please update the module in order to dynamically create the database scheme.");

// Post
define("_AM_IMBLOGGING_POSTS_DSC", "All posts in the module");
define("_AM_IMBLOGGING_POST_CREATE", "Add a post");
define("_AM_IMBLOGGING_POST", "Post");
define("_AM_IMBLOGGING_POST_CREATE_INFO", "Fill-out the following form to create a new post.");
define("_AM_IMBLOGGING_POST_EDIT", "Edit this post");
define("_AM_IMBLOGGING_POST_EDIT_INFO", "Fill-out the following form in order to edit this post.");
define("_AM_IMBLOGGING_POST_MODIFIED", "The post was successfully modified.");
define("_AM_IMBLOGGING_POST_CREATED", "The post has been successfully created.");
define("_AM_IMBLOGGING_POST_VIEW", "Post info");
define("_AM_IMBLOGGING_POST_VIEW_DSC", "Here is the info about this post.");

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
