<?php
/**
* * Spanish language constants used in admin section of the module (traducci?n por debianus)
*
* @copyright	http://smartfactory.ca The SmartFactory
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		marcan aka Marc-Andr Lanciault <marcan@smartfactory.ca>
* @version		$Id$
*/

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// Module Info
// The name of this module

global $xoopsModule;
define("_MI_IMBLOGGING_MD_NAME", "imBlogging");
define("_MI_IMBLOGGING_MD_DESC", "M?dulo de creaci?n de blogs para ImpressCMS");

define("_MI_IMBLOGGING_art?culos", "Art?culos");

// Configs
define("_MI_IMBLOGGING_POSTERGR", "Grupos a los que se permite publicar art?culos");
define("_MI_IMBLOGGING_POSTERGRDSC", "Seleccione los grupos de usuarios que pueden publicar nuevos art?culos. Tenga en cuenta que un usuario perteneciente a cualquiera de los grupos que elija podr? publicar directamente en el sitio web y que el m?dulo actualmente no tiene la caracter?stica de moderar los envios..");
define("_MI_IMBLOGGING_LIMIT", "L?mite de art?culos");
define("_MI_IMBLOGGING_LIMITDSC", "N?mero de art?culos que se mostrar?n en el sitio.");

// Blocks
define("_MI_IMBLOGGING_POSTRECENT", "Art?culos recientes");
define("_MI_IMBLOGGING_POSTRECENTDSC", "Mostrar los art?culos m?s recientes");
define("_MI_IMBLOGGING_POSTBYMONTH", "Art?culos por mes");
define("_MI_IMBLOGGING_POSTBYMONTHDSC", "Muestra la lista con los meses en los cuales se publicaron art?culos");

// Notifications
define("_MI_IMBLOGGING_GLOBAL_NOTIFY", "Todos los art?culos");
define("_MI_IMBLOGGING_GLOBAL_NOTIFY_DSC", "Notificaciones relacionadas con todos los art?culos existentes en el m?dulo");
define("_MI_IMBLOGGING_GLOBAL_POST_PUBLISHED_NOTIFY", "Nuevo art?culo publicado");
define("_MI_IMBLOGGING_GLOBAL_POST_PUBLISHED_NOTIFY_CAP", "Notificarme cuando un nuevo art?culo es publicado");
define("_MI_IMBLOGGING_GLOBAL_POST_PUBLISHED_NOTIFY_DSC", "Recibir notificaci?n cuando cualquier nuevo art?culo es publicado.");
define("_MI_IMBLOGGING_GLOBAL_POST_PUBLISHED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notify : Nuevo art?culo publicado");

// Submit button
define("_MI_IMBLOGGING_POST_ADD", "A?adir un nuevo art?culo");
?>
