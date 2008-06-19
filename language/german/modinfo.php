<?php
// $Id: modinfo.php,v 1.4 2007/04/11 17:25:37 mithyt2 Exp $
define("_PROFILE_MI_NAME", "Extended Profiles");
define("_PROFILE_MI_DESC", "Modul zum Verwalten von eigenen Profilfeldern");

//Main menu links
define("_PROFILE_MI_EDITACCOUNT", "Editiere Account");
define("_PROFILE_MI_CHANGEPASS", "Ändere Passwort");
define("_PROFILE_MI_CHANGEMAIL", "Ändere Email");

//Admin links
define("_PROFILE_MI_INDEX", "Index");
define("_PROFILE_MI_CATEGORIES", "Kategorien");
define("_PROFILE_MI_FIELDS", "Felder");
define("_PROFILE_MI_USERS", "User");
define("_PROFILE_MI_STEPS", "Registrierungsschritte");
define("_PROFILE_MI_PERMISSIONS", "Berechtigungen");
define("_PROFILE_MI_FINDUSER", "Mitglied suchen");

//User Profile Category
define("_PROFILE_MI_CATEGORY_TITLE", "User Profil");
define("_PROFILE_MI_CATEGORY_DESC", "Für diese Userfelder");

//User Profile Fields
define("_PROFILE_MI_AIM_TITLE", "AIM");
define("_PROFILE_MI_AIM_DESCRIPTION", "America Online Instant Messenger ID");
define("_PROFILE_MI_ICQ_TITLE", "ICQ");
define("_PROFILE_MI_ICQ_DESCRIPTION", "ICQ Instant Messenger ID");
define("_PROFILE_MI_YIM_TITLE", "YIM");
define("_PROFILE_MI_YIM_DESCRIPTION", "Yahoo! Instant Messenger ID");
define("_PROFILE_MI_MSN_TITLE", "MSN");
define("_PROFILE_MI_MSN_DESCRIPTION", "Microsoft Messenger ID");
define("_PROFILE_MI_FROM_TITLE", "Ort");
define("_PROFILE_MI_FROM_DESCRIPTION", "");
define("_PROFILE_MI_SIG_TITLE", "Signatur");
define("_PROFILE_MI_SIG_DESCRIPTION", "Hier können Sie eine Signatur erstellen die unter Beiträgen im Forum oder Komentaren erscheint.");
define("_PROFILE_MI_VIEWEMAIL_TITLE", "Erlaube anderen Usern meine Email zu sehen");
define("_PROFILE_MI_BIO_TITLE", "Zusatz Info");
define("_PROFILE_MI_BIO_DESCRIPTION", "");
define("_PROFILE_MI_INTEREST_TITLE", "Interessen");
define("_PROFILE_MI_INTEREST_DESCRIPTION", "");
define("_PROFILE_MI_OCCUPATION_TITLE", "Beruf");
define("_PROFILE_MI_OCCUPATION_DESCRIPTION", "");
define("_PROFILE_MI_URL_TITLE", "Webseite");
define("_PROFILE_MI_URL_DESCRIPTION", "");
define("_PROFILE_MI_NEWEMAIL_TITLE", "Neue Email");
define("_PROFILE_MI_NEWEMAIL_DESCRIPTION", "Variable for storing a proposed new email address until confirmation comes from a mail sent to the old one. See modules/smartprofile/changemail.php");

//Configuration categories
define("_PROFILE_MI_CAT_SETTINGS", "Haupteinstellungen");
define("_PROFILE_MI_CAT_SETTINGS_DSC", "");
define("_PROFILE_MI_CAT_USER", "User Einstellungen");
define("_PROFILE_MI_CAT_USER_DSC", "");

//Configuration items
define("_PROFILE_MI_PROFILE_SEARCH", "Zeige letzte Beiträge im Userprofil");
define("_PROFILE_MI_MAX_UNAME", "Maximale Länge des Usernamens");
define("_PROFILE_MI_MAX_UNAME_DESC", "Diese Zahl legt die maximale Länge des Usernamens fest");
define("_PROFILE_MI_MIN_UNAME", "Minimale Länge des Usernamens");
define("_PROFILE_MI_MIN_UNAME_DESC", "Diese Zahl legt die minimale Länge des Usernamens fest");
define("_PROFILE_MI_DISPLAY_DISCLAIMER", "Zeige Haftungsauschluss");
define("_PROFILE_MI_DISPLAY_DISCLAIMER_DESC", "Wenn aktiviert, wird der Haftungsauschluss in der Registrierung angezeigt");
define("_PROFILE_MI_DISCLAIMER", "Text (Haftungsausschluss)");
define("_PROFILE_MI_DISCLAIMER_DESC", "Dieser Text wird angezeigt wenn der Haftungsausschluss oben aktiviert ist");
define("_PROFILE_MI_BAD_UNAMES", "Tragen Sie Namen ein die nicht gewählt werden können");
define("_PROFILE_MI_BAD_UNAMES_DESC", "Trennen sie Angaben durch <b>|</b>.");
define("_PROFILE_MI_BAD_EMAILS", "Tragen Sie Emails ein die nicht gewählt werden können");
define("_PROFILE_MI_BAD_EMAILS_DESC", "Trennen sie Angaben durch <b>|</b>.");
define("_PROFILE_MI_MINPASS", "Minimale Passwortlänge");
define("_PROFILE_MI_NEWUNOTIFY", "Wollen Sie eine Email erhalten wenn neue User angemeldet werden?");
define("_PROFILE_MI_NOTIFYTO", "Wählen Sie eine Gruppe welche die Emails erhalten sollen");
define("_PROFILE_MI_ACTVTYPE", "Wählen Sie die Aktivierungseinstellung");
define("_PROFILE_MI_USERACTV","Aktivierung durch User (recommended)");
define("_PROFILE_MI_AUTOACTV","Automatische Aktivierung");
define("_PROFILE_MI_ADMINACTV","Aktivierung durch Administrator");
define("_PROFILE_MI_ACTVGROUP", "Wählen Sie eine Gruppe welche die Aktivierungsemails erhalten sollen");
define("_PROFILE_MI_ACTVGROUP_DESC", "Nur nötig wenn Aktivierung durch Administratoren gewählt ist");
define("_PROFILE_MI_UNAMELVL","Wählen Sie das Niveau für die Usernamenbeschränkung");
define("_PROFILE_MI_STRICT","Hoch (Nur Buchstaben und Zahlen)");
define("_PROFILE_MI_MEDIUM","Mittel");
define("_PROFILE_MI_LIGHT","Leicht (alle Zeichen erlaubt)");
define("_PROFILE_MI_ALLOWREG", "Erlaube Userregistrierungen?");
define("_PROFILE_MI_ALLOWREG_DESC", "Wähle Ja für neue Userregistrierungen");
define("_PROFILE_MI_SELFDELETE", "Erlaube das löschen des Accounts durch den User?");
define("_PROFILE_MI_SELFDELETE_DESC", "");
define("_PROFILE_MI_ALLOWCHGMAIL", "Erlaube den Usern das Ändern der Emailadresse?");
define("_PROFILE_MI_ALLOWCHGMAIL_DESC", "");
define("_PROFILE_MI_SHOWEMPTY", "Zeige leere Felder");
define("_PROFILE_MI_SHOWEMPTY_DESC", "Wenn nein gewählt werden leere Felder nicht angezeigt");

//Pages
define("_PROFILE_MI_PAGE_INFO", "Userinfo");
define("_PROFILE_MI_PAGE_EDIT", "Editiere User");
define("_PROFILE_MI_PAGE_SEARCH", "Suche");

//blocks
define("_MI_SPROFILE_BLOCK_NEW_MEMBERS", "New members");
define("_MI_SPROFILE_BLOCK_NEW_MEMBERS_DSC", "Recently subscribed members");

define("_MI_SPROFILE_PERPAGE", "Users Per Page");
define("_MI_SPROFILE_PERPAGE_DSC", "");
define("_MI_SPROFILE_ALL", "All");

define("_PROFILE_MI_DISPNAME", "Name to display on index page");
define("_PROFILE_MI_DISPNAME_DESC", "");
define("_PROFILE_MI_NICKNAME", "User name");
define("_PROFILE_MI_REALNAME", "Real name");
define("_PROFILE_MI_BOTH", "Both");

define("_PROFILE_MI_AVATAR_INDEX", "Display Avatar in users list");
define("_PROFILE_MI_AVATAR_INDEX_DESC", "");
define("_PROFILE_MI_AVATAR_HEIGHT", "Avatar height in users list");
define("_PROFILE_MI_AVATAR_HEIGHT_DESC", "");
define("_PROFILE_MI_AVATAR_WIDTH", "Avatar width in users list");
define("_PROFILE_MI_AVATAR_WIDTH_DESC", "");

define("_PROFILE_MI_GROUP_VIEW_3", "Anonymous users can view");
define("_PROFILE_MI_GROUP_VIEW_DSC", "");
define("_PROFILE_MI_GROUP_VIEW_2", "Registered users can view");

$member_handler = &xoops_gethandler('member');
$group_list = &$member_handler->getGroupList();
foreach ($group_list as $key=>$group) {
	if($key > 3){
		define("_PROFILE_MI_GROUP_VIEW_".$key, $group." Mitglied kann sehen");
	}
}
?>