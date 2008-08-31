<?php
// $Id: admin.php,v 1.6 2007/04/11 17:25:37 mithyt2 Exp $
define("_PROFILE_AM_FIELD", "Field");
define("_PROFILE_AM_FIELDS", "Fields");
define("_PROFILE_AM_CATEGORY", "Category");
define("_PROFILE_AM_STEP", "Step");

define("_PROFILE_AM_SAVEDSUCCESS", "%s Saved Successfully");
define("_PROFILE_AM_DELETEDSUCCESS", "%s Deleted Successfully");
define("_PROFILE_AM_RUSUREDEL", "Are you sure you want to delete %s?");

define("_PROFILE_AM_ADD", "Add");
define("_PROFILE_AM_EDIT", "Edit");
define("_PROFILE_AM_TYPE", "Field Type");
define("_PROFILE_AM_VALUETYPE", "Value Type");
define("_PROFILE_AM_NAME", "Name");
define("_PROFILE_AM_TITLE", "Title");
define("_PROFILE_AM_DESCRIPTION", "Description");
define("_PROFILE_AM_REQUIRED", "Req'd?");
define("_PROFILE_AM_MAXLENGTH", "Max Length");
define("_PROFILE_AM_WEIGHT", "Weight");
define("_PROFILE_AM_DEFAULT", "Default");
define("_PROFILE_AM_NOTNULL", "Not Null?");
define("_PROFILE_AM_MODULE", "Module");
define("_PROFILE_AM_SHOW", "Show");

define("_PROFILE_AM_ARRAY", "Array");
define("_PROFILE_AM_EMAIL", "Email");
define("_PROFILE_AM_INT", "Integer");
define("_PROFILE_AM_TXTAREA", "Text Area");
define("_PROFILE_AM_TXTBOX", "Text Field");
define("_PROFILE_AM_URL", "URL");
define("_PROFILE_AM_OTHER", "Other");

define("_PROFILE_AM_PROF_VISIBLE_ON", "Field visible on these groups' profile");
define("_PROFILE_AM_PROF_VISIBLE_FOR", "Field visible on profile for these groups");
define("_PROFILE_AM_PROF_VISIBLE", "Visibility");
define("_PROFILE_AM_PROF_EDITABLE", "Field editable from myAccount");
define("_PROFILE_AM_PROF_REGISTER", "Show in registration form");
define("_PROFILE_AM_PROF_SEARCH", "Searchable by these groups");

define("_PROFILE_AM_FIELDVISIBLE", "The field ");
define("_PROFILE_AM_FIELDVISIBLEFOR", " is visible for ");
define("_PROFILE_AM_FIELDVISIBLEON", " viewing account profile of ");
define("_PROFILE_AM_FIELDVISIBLETOALL", "- Everyone");
define("_PROFILE_AM_FIELDNOTVISIBLE", "is not visible");

define("_PROFILE_AM_CHECKBOX", "Checkbox");
define("_PROFILE_AM_GROUP", "Group Select");
define("_PROFILE_AM_GROUPMULTI", "Group Multi Select");
define("_PROFILE_AM_LANGUAGE", "Language Select");
define("_PROFILE_AM_RADIO", "Radio Buttons");
define("_PROFILE_AM_SELECT", "Select");
define("_PROFILE_AM_SELECTMULTI", "Multi Select");
define("_PROFILE_AM_TEXTAREA", "Text Area");
define("_PROFILE_AM_DHTMLTEXTAREA", "DHTML Text Area");
define("_PROFILE_AM_TEXTBOX", "Text Field");
define("_PROFILE_AM_TIMEZONE", "Timezone");
define("_PROFILE_AM_YESNO", "Yes/No");
define("_PROFILE_AM_DATE", "Date");
define("_PROFILE_AM_AUTOTEXT", "Auto Text");
define("_PROFILE_AM_DATETIME", "Date and Time");
define("_PROFILE_AM_LONGDATE", "Long Date");

define("_PROFILE_AM_ADDOPTION", "Add Option");
define("_PROFILE_AM_REMOVEOPTIONS", "Remove Options");
define("_PROFILE_AM_KEY", "Key");
define("_PROFILE_AM_VALUE", "Value");

// User management
define("_PROFILE_AM_EDITUSER", "Edit User");
define("_PROFILE_AM_SELECTUSER", "Select User");
define("_PROFILE_AM_AYSYWTDU","Are you sure you want to delete user %s?");
define("_PROFILE_AM_BYTHIS","By doing this all the info for this user will be removed permanently (but not their postings).");
define("_PROFILE_AM_YMCACF","You must complete all required fields.");
define("_PROFILE_AM_CNRNU","Could not register new user.");
define("_PROFILE_AM_EDEUSER","Edit/Delete Users");
define("_PROFILE_AM_NICKNAME","Nickname");
define("_PROFILE_AM_MODIFYUSER","Modify User");
define("_PROFILE_AM_DELUSER","Delete User");
define("_PROFILE_AM_GO","Go!");
define("_PROFILE_AM_ADDUSER","Add User");
define("_PROFILE_AM_OPTION","Option");
define("_PROFILE_AM_AVATAR","myIcon");
define("_PROFILE_AM_THEME","Theme");
define("_PROFILE_AM_AOUTVTEAD","Allow registered users to view this email address");
define("_PROFILE_AM_RANK","Rank");
define("_PROFILE_AM_NSRA","No Special Rank Assigned");
define("_PROFILE_AM_NSRID","No Special Ranks in Database");
define("_PROFILE_AM_ACCESSLEV","Access Level");
define("_PROFILE_AM_PASSWORD","Password");
define("_PROFILE_AM_INDICATECOF","* indicates required fields");
define("_PROFILE_AM_NOTACTIVE","This user has not been activated. Do you wish to activate this user?");
define("_PROFILE_AM_UPDATEUSER","Update User");
define("_PROFILE_AM_USERINFO","User Info");
define("_PROFILE_AM_USERID","User ID");
define("_PROFILE_AM_RETYPEPD","Retype Password");
define("_PROFILE_AM_CHANGEONLY","(for changes only)");
define("_PROFILE_AM_USERPOST","Site Contributions");
define("_PROFILE_AM_COMMENTS","Comments");
define("_PROFILE_AM_PTBBTSDIYT","Synchronice data if you think the above user posts info does not appear to indicate actual status");
define("_PROFILE_AM_SYNCHRONIZE","Synchronize");
define("_PROFILE_AM_USERDONEXIT","User doesn't exist!");
define("_PROFILE_AM_STNPDNM","Passwords do not match.");
define("_PROFILE_AM_CNGTCOM","Could not get total comments");
define("_PROFILE_AM_CNUUSER","Could not update user");
define("_PROFILE_AM_CNGUSERID","Could not get user IDs");
define("_PROFILE_AM_LIST","List");
define("_PROFILE_AM_NOUSERS", "No users selected");
define("_PROFILE_MA_ACTIVEUSER", "User Level");

define("_PROFILE_MA_ACTIVE", "Active");
define("_PROFILE_MA_INACTIVE", "Inactive");
define("_PROFILE_MA_DISABLED", "Disabled");
define("_PROFILE_MA_USERDISABLED", "This user account is disabled and may not be activated by the user");

define("_PROFILE_AM_NOUSERNAME", "No Login Name Selected");
define("_PROFILE_AM_USERCREATED", "User Created");

define("_PROFILE_AM_CANNOTDELETESELF", "Deleting your own account is not allowed here - use your profile page to delete your own account");

define("_PROFILE_AM_NOSELECTION", "User doesn't exist");
define("_PROFILE_AM_CANNOTEDITWEBMASTERS", "You may not edit a webmaster's account");
define("_PROFILE_AM_USER_ACTIVATED", "User activated");
define("_PROFILE_AM_USER_DEACTIVATED", "User deactivated");
define("_PROFILE_AM_USER_NOT_ACTIVATED", "Error: User NOT activated");
define("_PROFILE_AM_USER_NOT_DEACTIVATED", "Error: User NOT deactivated");

define("_PROFILE_AM_STEPNAME", "Step name");
define("_PROFILE_AM_STEPORDER", "Step order");
define("_PROFILE_AM_STEPSAVE", "Save after step");
define("_PROFILE_AM_STEPINTRO", "Step description");
define("_PROFILE_AM_NOSTEP", "--NONE--");

// Photo/Image field type
define("_PROFILE_AM_MAXWIDTH", "Max width (px)");
define("_PROFILE_AM_MAXHEIGHT", "Max height (px)");
define("_PROFILE_AM_MAXSIZE", "Max file size (KB)");
?>
