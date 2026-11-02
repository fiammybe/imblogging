<?php
/**
 * Persian language constants used in admin section of the module
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @copyright http://www.impresscms.ir Official ImpressCMS support site for Persians
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author Sina Asghari (aka stranger) <pesian_stranger@users.sourceforge.net>
 * 
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// Requirements
define("_AM_IMBLOGGING_REQUIREMENTS", "نیازمندی‌های ماژول");
define("_AM_IMBLOGGING_REQUIREMENTS_INFO", "ما سیستم شما را بررسی کردیم، متاسفانه شما تمامی امکانات مورد نیاز را ندارید. برای به کار انداختن این ماژول باید موارد زیر را داشته باشید.");
define("_AM_IMBLOGGING_REQUIREMENTS_ICMS_BUILD", "این ماژول برای کار به ایمپرس سی‌ام‌اس ۱.۱.۱ نیازمند است.");
define("_AM_IMBLOGGING_REQUIREMENTS_IMTAGGING", "این ماژول نیاز به ماژول تگ . برچسب‌های ایمپرس سی‌ام‌اس دارد.");
define("_AM_IMBLOGGING_REQUIREMENTS_SUPPORT", "برای هرگونه سوال به انجمن ایمپرس سی‌ام‌اس در <a href='https://www.impresscms.org/modules/iforum/'>https://www.impresscms.org/modules/iforum/</a> مراجعه نمایید.");

// general
define("_AM_IMBLOGGING_POSTS", "پیام‌ها");
define("_AM_IMBLOGGING_FIRST_USE", "این اولین باری است که از این ماژول استفاده می کنید. لطفاً ابتدا آن را به‌روز برسانید تا ساختار پایگاه داده به درستی ایجاد شود.");

// Post
define("_AM_IMBLOGGING_POSTS_DSC", "تمام نوشته‌های ارسال شده");
define("_AM_IMBLOGGING_POST_CREATE", "پیامی را بنویسید");
define("_AM_IMBLOGGING_POST", "پیام");
define("_AM_IMBLOGGING_POST_CREATE_INFO", "فرم زیر را برای نوشتن مطلب جدید پر کنید.");
define("_AM_IMBLOGGING_POST_EDIT", "این نوشته را ویراستاری کنید");
define("_AM_IMBLOGGING_POST_EDIT_INFO", "فرم زیر را برای ویراستاری این مطلب پر کنید.");
define("_AM_IMBLOGGING_POST_MODIFIED", "این نوشته با موفقیت ویرایش شد.");
define("_AM_IMBLOGGING_POST_CREATED", "نوشته‌ی شما با موفقیت ایجاد شد.");
define("_AM_IMBLOGGING_POST_VIEW", "اطلاعات نوشته");
define("_AM_IMBLOGGING_POST_VIEW_DSC", "اطلاعات کلی این پیام.");

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
