<?php
// $Id: modinfo.php,v 1.4 2007/04/11 17:25:37 mithyt2 Exp $
define("_PROFILE_MI_NAME", "myAccount");
define("_PROFILE_MI_DESC", "Module for managing accounts and custom user fields");

//Main menu links
define("_PROFILE_MI_EDITACCOUNT", "Edit Account");
define("_PROFILE_MI_CHANGEPASS", "Change Password");
define("_PROFILE_MI_CHANGEMAIL", "Change Email");

//Admin links
define("_PROFILE_MI_INDEX", "Index");
define("_PROFILE_MI_CATEGORIES", "Categories");
define("_PROFILE_MI_FIELDS", "Fields");
define("_PROFILE_MI_USERS", "Users");
define("_PROFILE_MI_STEPS", "Registration Steps");
define("_PROFILE_MI_PERMISSIONS", "Permissions");

//User Profile Category
define("_PROFILE_MI_CATEGORY_TITLE", "User Data");
define("_PROFILE_MI_CATEGORY_DESC", "For those user fields");

//User Profile Fields
define("_PROFILE_MI_AIM_TITLE", "AIM");
define("_PROFILE_MI_AIM_DESCRIPTION", "America Online Instant Messenger Client ID");
define("_PROFILE_MI_ICQ_TITLE", "ICQ");
define("_PROFILE_MI_ICQ_DESCRIPTION", "ICQ Instant Messenger ID");
define("_PROFILE_MI_YIM_TITLE", "YIM");
define("_PROFILE_MI_YIM_DESCRIPTION", "Yahoo! Instant Messenger ID");
define("_PROFILE_MI_MSN_TITLE", "MSN");
define("_PROFILE_MI_MSN_DESCRIPTION", "MSN Messenger ID");
define("_PROFILE_MI_FROM_TITLE", "Location");
define("_PROFILE_MI_FROM_DESCRIPTION", "");
define("_PROFILE_MI_SIG_TITLE", "Signature");
define("_PROFILE_MI_SIG_DESCRIPTION", "Signatures may be displayed in forum posts, comments, etc.");
define("_PROFILE_MI_VIEWEMAIL_TITLE", "Allow registered users to view my email address");
define("_PROFILE_MI_BIO_TITLE", "Extra Info");
define("_PROFILE_MI_BIO_DESCRIPTION", "");
define("_PROFILE_MI_INTEREST_TITLE", "Interests");
define("_PROFILE_MI_INTEREST_DESCRIPTION", "");
define("_PROFILE_MI_OCCUPATION_TITLE", "Occupation");
define("_PROFILE_MI_OCCUPATION_DESCRIPTION", "");
define("_PROFILE_MI_URL_TITLE", "Website");
define("_PROFILE_MI_URL_DESCRIPTION", "URL to your personal/organization website");
define("_PROFILE_MI_NEWEMAIL_TITLE", "New Email");
define("_PROFILE_MI_NEWEMAIL_DESCRIPTION", "Variable for storing a proposed new email address until confirmation comes from a mail sent to the old one. See modules/profile/changemail.php");

//Configuration categories
define("_PROFILE_MI_CAT_SETTINGS", "General Settings");
define("_PROFILE_MI_CAT_SETTINGS_DSC", "");
define("_PROFILE_MI_CAT_USER", "User Settings");
define("_PROFILE_MI_CAT_USER_DSC", "");

//Configuration items
define("_PROFILE_MI_PROFILE_SEARCH", "Show latest submissions on user public profile");
define("_PROFILE_MI_MAX_UNAME", "Maximum Login Name Length");
define("_PROFILE_MI_MAX_UNAME_DESC", "The maximum number of characters a Login Name may have");
define("_PROFILE_MI_MIN_UNAME", "Minimum Login Name Length");
define("_PROFILE_MI_MIN_UNAME_DESC", "The minimum number of characters a Login Name may have");
define("_PROFILE_MI_DISPLAY_DISCLAIMER", "Site Policy");
define("_PROFILE_MI_DISPLAY_DISCLAIMER_DESC", "Show Site Policy on the registration form?");
define("_PROFILE_MI_DISCLAIMER", "Site Policy Text");
define("_PROFILE_MI_DISCLAIMER_DESC", "");
define("_PROFILE_MI_BAD_UNAMES", "Bad Names List");
define("_PROFILE_MI_BAD_UNAMES_DESC", "Names that may not be entered as Login Name or Display Name. Separate each with a <b>|</b>. Case insensitive, regex enabled.");
define("_PROFILE_MI_BAD_EMAILS", "Bad Emails List");
define("_PROFILE_MI_BAD_EMAILS_DESC", "Enter emails that may not be entered. Separate each with a <b>|</b>. Case insensitive, regex enabled.");
define("_PROFILE_MI_MINPASS", "Minimum Password Length");
define("_PROFILE_MI_NEWUNOTIFY", "New Account Administrative Notification?");
define("_PROFILE_MI_NOTIFYTO", "New Account Administrative Notification Group");
define("_PROFILE_MI_ACTVTYPE", "New Account Activation Type");
define("_PROFILE_MI_USERACTV","User Activation (recommended)");
define("_PROFILE_MI_AUTOACTV","Instant Activation (not recommended)");
define("_PROFILE_MI_ADMINACTV","Administrator Activation");
define("_PROFILE_MI_ACTVGROUP", "Administrator Activation Group");
define("_PROFILE_MI_ACTVGROUP_DESC", "Valid only when 'Administrator Activation' selected");
define("_PROFILE_MI_UNAMELVL","Level of strictness for Login Name filter");
define("_PROFILE_MI_STRICT","Strict (alphabets and numbers)");
define("_PROFILE_MI_MEDIUM","Medium (plus special characters)");
define("_PROFILE_MI_LIGHT","Light (recommended for multi-byte chars)");
define("_PROFILE_MI_ALLOWREG", "Allow new accounts?");
define("_PROFILE_MI_ALLOWREG_DESC", "Turns on and off registration");
define("_PROFILE_MI_SELFDELETE", "Users Account Deletion?");
define("_PROFILE_MI_SELFDELETE_DESC", "Allow users to delete their own account.");
define("_PROFILE_MI_ALLOWCHGMAIL", "User Email Address Change");
define("_PROFILE_MI_ALLOWCHGMAIL_DESC", "Allow users to change their email address.");
define("_PROFILE_MI_SHOWEMPTY", "Show Empty Fields");
define("_PROFILE_MI_SHOWEMPTY_DESC", "Display fields without values on profile page?");

//Pages
define("_PROFILE_MI_PAGE_INFO", "User Info");
define("_PROFILE_MI_PAGE_EDIT", "Edit User");
define("_PROFILE_MI_PAGE_SEARCH", "Search");
?>
