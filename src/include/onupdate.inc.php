<?php
/**
 * File containing onUpdate and onInstall functions for the module
 *
 * This file is included by the core in order to trigger onInstall or onUpdate functions when needed.
 * Of course, onUpdate function will be triggered when the module is updated, and onInstall when
 * the module is originally installed. The name of this file needs to be defined in the
 * icms_version.php
 *
 * <code>
 * $modversion['onInstall'] = "include/onupdate.inc.php";
 * $modversion['onUpdate'] = "include/onupdate.inc.php";
 * </code>
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * @version $Id$
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// this needs to be the latest db version - and match the dirname
define(strtoupper(basename(dirname(dirname(__FILE__)))) . '_DB_VERSION', 1);

/*
 * it is possible to define custom functions which will be call when the module is updating at the
 * correct time in update incrementation. Simpy define a function named <direname_db_upgrade_db_version>
 */
/*
 * function imblogging_db_upgrade_1() {
 * }
 * function imblogging_db_upgrade_2() {
 * }
 */

/**
 * This can be based on the module name (not the module directory)
 *
 * @param unknown_type $module
 */
function icms_module_update_imblogging($module) {
	/*
	 * Using the IcmsDatabaseUpdater to automatically manage the database upgrade dynamically
	 * according to the class defined in the module
	 */
	$icmsDatabaseUpdater = icms_db_legacy_Factory::getDatabaseUpdater();
	$icmsDatabaseUpdater->moduleUpgrade($module);
	return TRUE;
}

/**
 * This can be based on the module name (not the module directory)
 *
 * @param unknown_type $module
 */
function icms_module_install_imblogging($module) {
	return TRUE;
}
