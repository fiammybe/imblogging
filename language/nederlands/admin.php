<?php
/**
 * Dutch language constants used in admin section of the module
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * @translation    McDonald
 * 
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// Requirements
define("_AM_IMBLOGGING_REQUIREMENTS", "imBlogging Vereisten");
define("_AM_IMBLOGGING_REQUIREMENTS_INFO", "We hebben uw installatie bekeken. Helaas voldoet het niet aan alle vereisten nodig voor het juist funktioneren van imBlogging. Hieronder zijn de nodig vereisten.");
define("_AM_IMBLOGGING_REQUIREMENTS_ICMS_BUILD", "imBlogging vereist minimaal ImpressCMS 1.1.1 RC 1.");
define("_AM_IMBLOGGING_REQUIREMENTS_IMTAGGING", "imBlogging vereist dat imTagging is geïnstalleerd. U kunt het downloaden via ImpressCMS SVN.");
define("_AM_IMBLOGGING_REQUIREMENTS_SUPPORT", "Indien u vragen heeft verzoeken wij u zich te wenden tot onze forums op: <a href='https://www.impresscms.org/modules/iforum/'>https://www.impresscms.org/modules/iforum/</a>.");

// general
define("_AM_IMBLOGGING_POSTS", "Berichten");
define("_AM_IMBLOGGING_FIRST_USE", "Dit is de eerste keer dat u deze module gebruikt. Update de module alstublieft om de nodige database dynamisch aan te maken.");

// Post
define("_AM_IMBLOGGING_POSTS_DSC", "Alle berichten in deze module");
define("_AM_IMBLOGGING_POST_CREATE", "Voeg een bericht toe");
define("_AM_IMBLOGGING_POST", "Bericht");
define("_AM_IMBLOGGING_POST_CREATE_INFO", "Vul het volgende formulier in om een nieuw bericht te maken.");
define("_AM_IMBLOGGING_POST_EDIT", "Bewerk dit bericht");
define("_AM_IMBLOGGING_POST_EDIT_INFO", "Vul het volgende formulier in om dit bericht te bewerken.");
define("_AM_IMBLOGGING_POST_MODIFIED", "Het bericht is succesvol gemodificeerd.");
define("_AM_IMBLOGGING_POST_CREATED", "Het bericht is succesvol opgeslagen.");
define("_AM_IMBLOGGING_POST_VIEW", "Bericht info");
define("_AM_IMBLOGGING_POST_VIEW_DSC", "Hier is informatie betreffende dit bericht.");

// News import
define("_AM_IMBLOGGING_IMPORT", "Importeren uit News");
define("_AM_IMBLOGGING_IMPORT_DSC", "Kopieert de artikelen van de News-module naar imBlogging. Artikelen die al in imBlogging bestaan (zelfde titel, datum en auteur) worden overgeslagen, zodat de import veilig opnieuw kan worden uitgevoerd.");
define("_AM_IMBLOGGING_IMPORT_NO_NEWS", "De gegevens van de News-module zijn niet gevonden.");
define("_AM_IMBLOGGING_IMPORT_FOUND", "Gevonden artikelen in News: %d");
define("_AM_IMBLOGGING_IMPORT_IMAGES", "Hoofdafbeeldingen kopiëren en in het bericht plaatsen");
define("_AM_IMBLOGGING_IMPORT_WITH_COMMENTS", "Reacties importeren");
define("_AM_IMBLOGGING_IMPORT_TAGS", "Sprockets-tags importeren als imTagging-categorieën");
define("_AM_IMBLOGGING_IMPORT_START", "Import starten");
define("_AM_IMBLOGGING_IMPORT_CONTINUE", "Volgende batch importeren");
define("_AM_IMBLOGGING_IMPORT_REPORT", "Importrapport");
define("_AM_IMBLOGGING_IMPORT_IMPORTED", "Berichten geïmporteerd: %d");
define("_AM_IMBLOGGING_IMPORT_COMMENTS", "Reacties geïmporteerd: %d");
define("_AM_IMBLOGGING_IMPORT_SKIPPED", "Berichten overgeslagen (bestaan al): %d");
define("_AM_IMBLOGGING_IMPORT_ERRORS", "Fouten: %d");
define("_AM_IMBLOGGING_IMPORT_SKIPPED_ITEM", "Overgeslagen:");
define("_AM_IMBLOGGING_IMPORT_DONE", "De import is voltooid.");

define("_AM_IMBLOGGING_IMPORT_REQUIREMENTS", "De News-module hoeft niet geïnstalleerd of werkend te zijn: enkel de databasetabellen worden gelezen (news_article, xoopscomments en eventueel sprockets_tag en sprockets_taglink, met dezelfde tabelprefix als deze site). Kopieer eerst de afbeeldingen uit uploads/news/ naar deze site.");
define("_AM_IMBLOGGING_IMPORT_NEWS_NOT_INSTALLED", "De News-module is niet geïnstalleerd op deze site. Tags en reacties kunnen toch geïmporteerd worden als u het module-id opgeeft dat News op de bronsite had.");
define("_AM_IMBLOGGING_IMPORT_NEWS_MID", "Module-id van News op de bronsite");
define("_AM_IMBLOGGING_IMPORT_NEWS_MID_DSC", "Nodig om de reacties en tags van de artikelen te vinden. Wordt automatisch gedetecteerd wanneer mogelijk.");
define("_AM_IMBLOGGING_IMPORT_NEWS_MID_UNKNOWN", "Het module-id van News is onbekend, dus tags en reacties zijn niet geïmporteerd. Vul het in en voer de import opnieuw uit.");

define("_AM_IMBLOGGING_IMPORT_NO_NEWS_TABLE", "Tabel niet gevonden: %s.");
define("_AM_IMBLOGGING_IMPORT_FOUND_TABLES", "Tabellen die eindigen op news_article in deze database:");
define("_AM_IMBLOGGING_IMPORT_SOURCE_PREFIX", "Tabelprefix van de News-data");
define("_AM_IMBLOGGING_IMPORT_SOURCE_PREFIX_DSC", "Enkel het deel vóór _news_article, bijvoorbeeld icms. Laat leeg om de prefix van deze site te gebruiken.");
define("_AM_IMBLOGGING_IMPORT_SOURCE_CHECK", "Opnieuw controleren");
define("_AM_IMBLOGGING_IMPORT_REMAINING", "Nog te importeren berichten: %d");
define("_AM_IMBLOGGING_IMPORT_REPAIRED", "Bestaande berichten waarvan het leesrecht voor alle groepen is hersteld: %d");
