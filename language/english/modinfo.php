<?php
/**
* English language constants related to module information
*
* @copyright	http://smartfactory.ca The SmartFactory
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
* @version		$Id$
*/

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// Module Info
// The name of this module

global $xoopsModule;
define("_MI_IMBLOGGING_MD_NAME", "imBlogging");
define("_MI_IMBLOGGING_MD_DESC", "ImpressCMS Simple Blogging module");

define("_MI_IMBLOGGING_POSTS", "Posts");

// Notifications
define("_MI_IMBLOGGING_GLOBAL_NOTIFY", "All posts");
define("_MI_IMBLOGGING_GLOBAL_NOTIFY_DSC", "Notifications related to all posts in the module");
define("_MI_IMBLOGGING_GLOBAL_POST_PUBLISHED_NOTIFY", "New post published");
define("_MI_IMBLOGGING_GLOBAL_POST_PUBLISHED_NOTIFY_CAP", "Notify me when a new post is published");
define("_MI_IMBLOGGING_GLOBAL_POST_PUBLISHED_NOTIFY_DSC", "Receive notification when any new post is published.");
define("_MI_IMBLOGGING_GLOBAL_POST_PUBLISHED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notify : New post published");


?>