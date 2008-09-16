<?php
/**
* Post page
*
* @copyright	http://smartfactory.ca The SmartFactory
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
* @version		$Id$
*/

function editpost($post_id = 0)
{
	global $imblogging_post_handler, $xoopsTpl, $xoopsUser;

	$postObj = $imblogging_post_handler->get($post_id);

	if (!$postObj->isNew()){
		if (!$postObj->userCanEditAndDelete()) {
			redirect_header($postObj->getItemLink(true), 3, _NOPERM);
		}
		$postObj->hideFieldFromForm(array('post_published_date', 'post_uid', 'meta_keywords', 'meta_description', 'short_url'));
		$sform = $postObj->getSecureForm(_MD_IMBLOGGING_POST_EDIT, 'addpost');
		$sform->assign($xoopsTpl, 'imblogging_postform');
		$xoopsTpl->assign('imblogging_category_path', $postObj->getVar('post_title') . ' > ' . _EDIT);
	} else {
		if (!$imblogging_post_handler->userCanSubmit()) {
			redirect_header(IMBLOGGING_URL, 3, _NOPERM);
		}
		$postObj->setVar('post_uid', $xoopsUser->uid());
		$postObj->setVar('post_published_date', time());
		$postObj->hideFieldFromForm(array('post_published_date', 'post_uid', 'meta_keywords', 'meta_description', 'short_url'));
		$sform = $postObj->getSecureForm(_MD_IMBLOGGING_POST_SUBMIT, 'addpost');
		$sform->assign($xoopsTpl, 'imblogging_postform');
		$xoopsTpl->assign('imblogging_category_path', _SUBMIT);
	}
}

include_once('header.php');

$xoopsOption['template_main'] = 'imblogging_post.html';
include_once(ICMS_ROOT_PATH . "/header.php");

$imblogging_post_handler = xoops_getModuleHandler('post');

$op = '';

if (isset($_GET['op'])) $op = $_GET['op'];
if (isset($_POST['op'])) $op = $_POST['op'];

$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0 ;
$postObj = $imblogging_post_handler->get($post_id);

switch ($op) {
	case "mod":
		editpost($post_id);
		break;

	case "addpost":
        if (!$xoopsSecurity->check()) {
        	redirect_header($impresscms->urls['previouspage'], 3, _MD_IMBLOGGING_SECURITY_CHECK_FAILED . implode('<br />', $xoopsSecurity->getErrors()));
        }
        include_once ICMS_ROOT_PATH."/kernel/icmspersistablecontroller.php";
        $controller = new IcmsPersistableController($imblogging_post_handler);
		$controller->storeFromDefaultForm(_MD_IMBLOGGING_POST_CREATED, _MD_IMBLOGGING_POST_MODIFIED);
		break;

	case "del":
		if (!$postObj->userCanEditAndDelete()) {
			redirect_header($postObj->getItemLink(true), 3, _NOPERM);
		}
		if (isset($_POST['confirm'])) {
		    if (!$xoopsSecurity->check()) {
		    	redirect_header($impresscms->urls['previouspage'], 3, _MD_IMBLOGGING_SECURITY_CHECK_FAILED . implode('<br />', $xoopsSecurity->getErrors()));
		    }
		}
	    include_once ICMS_ROOT_PATH."/kernel/icmspersistablecontroller.php";
        $controller = new IcmsPersistableController($imblogging_post_handler);
		$controller->handleObjectDeletionFromUserSide();
		$xoopsTpl->assign('imblogging_category_path', $postObj->getVar('post_title') . ' > ' . _DELETE);

		break;

	default:
		if ($postObj && !$postObj->isNew() && $postObj->accessGranted()) {
			$xoopsTpl->assign('imblogging_post', $postObj->toArray());
			$xoopsTpl->assign('imblogging_category_path', $postObj->getVar('post_title'));
		} else {
			redirect_header(IMBLOGGING_URL, 3, _NOPERM);
		}

		if ($xoopsModuleConfig['com_rule'] && $postObj->getVar('post_cancomment')) {
			$xoopsTpl->assign('imblogging_post_comment', true);
			include_once ICMS_ROOT_PATH . "/include/comment_view.php";
		}
		break;
}

/**
 * Generating meta information for this page
 */
$icms_metagen = new IcmsMetagen($postObj->getVar('post_title'), $postObj->getVar('meta_keywords','n'), $postObj->getVar('meta_description', 'n'));
$icms_metagen->createMetaTags();


$xoopsTpl->assign('imblogging_module_home', imblogging_getModuleName(true, true));
include_once("footer.php");
?>