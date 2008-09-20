<?php
/**
* Recent posts block file
*
* This file holds the functions needed for the recent posts block
*
* @copyright	http://smartfactory.ca The SmartFactory
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
* @version		$Id$
*/

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

function imblogging_post_recent_show($options)
{
	include_once(ICMS_ROOT_PATH . '/modules/imblogging/include/common.php');
	$imblogging_post_handler = xoops_getModuleHandler('post', 'imblogging');
	$block['posts'] = $imblogging_post_handler->getPosts(0, $options[0]);

	return $block;
}

function imblogging_post_recent_edit($options)
{
	include_once(ICMS_ROOT_PATH . '/modules/imblogging/include/common.php');

	$form = '<table><tr>';
	$form .= '<td>' . _MB_IMBLOGGING_POST_RECENT_LIMIT . '</td>';
	$form .= '<td>' . '<input type="text" name="options[]" value="' .$options[0] . '"/></td>';
	$form .= '</tr></table>';
    return $form;
	}

?>