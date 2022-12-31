<?php

/**
 * Common functions used by the module
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * @version $Id$
 */

/**
 * Notification lookup function
 *
 * This function is called by the notification process to get an array contaning information
 * about the item for which there is a notification
 *
 * @param string $category category of the notification
 * @param int $item_id id of the item related to this notification
 *       
 * @return array containing 'name' and 'url' of the related item
 */
function imblogging_notify_iteminfo($category, $item_id) {
	global $icmsModuleConfig, $icmsConfig;

	$moddir = basename(dirname(__DIR__));

	if ($category == 'global') {
		$item['name'] = '';
		$item['url'] = '';
		return $item;
	}

	$postHandler = icms_getModuleHandler('post', $moddir, 'imblogging');
	$post = $postHandler->getPost($item_id);
	$item['name'] = $post['post_title'];
	$item['url'] = $post['itemUrl'];
	return $item;
}
