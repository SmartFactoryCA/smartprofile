<?php
// $Id: main.php,v 1.5 2007/06/11 09:40:37 mithyt2 Exp $
define("_PROFILE_MA_ERRORDURINGSAVE", "Error during save");
define('_PROFILE_MA_USERREG','Account Registration');
define('_PROFILE_MA_NICKNAME','Login Name');
define('_PROFILE_MA_REALNAME', 'Display Name');
define('_PROFILE_MA_EMAIL','Email');
define('_PROFILE_MA_ALLOWVIEWEMAIL','Allow registered users to view my email address');
define('_PROFILE_MA_TIMEZONE','Time Zone');
define('_PROFILE_MA_AVATAR','myIcon');
define('_PROFILE_MA_VERIFYPASS','Verify Password');
define('_PROFILE_MA_SUBMIT','Submit');
define('_PROFILE_MA_USERNAME','Login Name');
define('_PROFILE_MA_FINISH','Finish');
define('_PROFILE_MA_REGISTERNG','Could not register new user.');
define('_PROFILE_MA_MAILOK','Receive occasional email notices from site administrators?');
define('_PROFILE_MA_DISCLAIMER','Site Policies');
define('_PROFILE_MA_IAGREE','I have read and agree to the site policies');
define('_PROFILE_MA_UNEEDAGREE', 'You must agree to our site policies to register.');
define('_PROFILE_MA_NOREGISTER','Sorry, we are currently closed for new user registrations.');
define("_PROFILE_MA_NOSTEPSAVAILABLE", "No registration steps are defined");
define('_PROFILE_MA_REQUIRED','Required');

// %s is username. This is a subject for email
define('_PROFILE_MA_USERKEYFOR','User activation key for %s');
define('_PROFILE_MA_ACTLOGIN','Your account has been activated. Please login with the username and password you chose when registering.');
define('_PROFILE_MA_ACTKEYNOT','Activation key not correct!');
define('_PROFILE_MA_ACONTACT','Selected account is already activated!');

define('_PROFILE_MA_YOURREGISTERED','Your account has been created. You will need to activate your account prior to logging in. An email with activation instructions has been sent to the email address you provided. Please follow those instructions to activate your account. Thanks.');
define('_PROFILE_MA_YOURREGMAILNG','Your account has been created. However, the system was unable to send the activation mail to your email account due to an internal error. Please contact the webmaster regarding the situation. We apologize in advance for the inconvenience.');
define('_PROFILE_MA_YOURREGISTERED2','Your account has been created. Your account must be activated by the adminstrators (who have been sent notification of this account creation). You will receive an email once your account has been activated. Please be patient. Thanks.');

// %s is your site name
define('_PROFILE_MA_NEWUSERREGAT','New user registration at %s');
// %s is a username
define('_PROFILE_MA_HASJUSTREG','%s has just registered!');

define('_PROFILE_MA_INVALIDMAIL','ERROR: Invalid email address.');
define('_PROFILE_MA_EMAILNOSPACES','ERROR: Email addresses do not contain spaces.');
define('_PROFILE_MA_INVALIDNICKNAME','ERROR: Invalid Login Name.');
define("_PROFILE_MA_INVALIDDISPLAYNAME", "ERROR: Invalid Displayname.");
define('_PROFILE_MA_NICKNAMETOOLONG','Login Name is too long. It must be less than %s characters.');
define('_PROFILE_MA_DISPLAYNAMETOOLONG','Displayname is too long. It must be less than %s characters.');
define('_PROFILE_MA_NICKNAMETOOSHORT','Login Name is too short. It must be more than %s characters.');
define('_PROFILE_MA_DISPLAYNAMETOOSHORT','Display Name is too short. It must be more than %s characters.');
define('_PROFILE_MA_NAMERESERVED','ERROR: Name is reserved.');
define('_PROFILE_MA_DISPLAYNAMERESERVED','ERROR: Display Name is reserved.');
define('_PROFILE_MA_NICKNAMENOSPACES','There cannot be any spaces in the Login Name.');
define('_PROFILE_MA_DISPLAYNAMENOSPACES','There cannot be any spaces in the Display Name.');
define('_PROFILE_MA_NICKNAMETAKEN','ERROR: Login Name taken.');
define('_PROFILE_MA_DISPLAYNAMETAKEN','ERROR: Displayname taken.');
define('_PROFILE_MA_EMAILTAKEN','ERROR: Email address already registered.');
define('_PROFILE_MA_ENTERPWD','ERROR: You must provide a password.');
define('_PROFILE_MA_SORRYNOTFOUND','No user info was found.');
define("_PROFILE_MA_WRONGPASSWORD", "ERROR: Wrong Password");
define("_PROFILE_MA_USERALREADYACTIVE", "User with email %s is already activated");

// %s is your site name
define('_PROFILE_MA_YOURACCOUNT', 'Your account at %s');

// %s is a username
define('_PROFILE_MA_ACTVMAILNG', 'Failed sending notification email to %s.');
define('_PROFILE_MA_ACTVMAILOK', 'Successful notification email to %s.');

define("_PROFILE_MA_DEFAULT", "Basic Information");

//%%%%%%		File Name userinfo.php 		%%%%%
define('_PROFILE_MA_SELECTNG','User Doesn\'t Exist!');
define('_PROFILE_MA_PM','PM');
define('_PROFILE_MA_ICQ','ICQ');
define('_PROFILE_MA_AIM','AIM');
define('_PROFILE_MA_YIM','YIM');
define('_PROFILE_MA_MSNM','MSNM');
define('_PROFILE_MA_LOCATION','Location');
define('_PROFILE_MA_OCCUPATION','Occupation');
define('_PROFILE_MA_INTEREST','Interest');
define('_PROFILE_MA_SIGNATURE','Signature');
define('_PROFILE_MA_EXTRAINFO','Extra Info');
define('_PROFILE_MA_EDITPROFILE','Change Settings');
define('_PROFILE_MA_LOGOUT','Logout');
define('_PROFILE_MA_INBOX','Inbox');
define('_PROFILE_MA_MEMBERSINCE','Join Date');
define('_PROFILE_MA_RANK','Rank');
define('_PROFILE_MA_POSTS','Comments/Posts');
define('_PROFILE_MA_LASTLOGIN','Last Login');
define('_PROFILE_MA_ALLABOUT','All about %s');
define('_PROFILE_MA_STATISTICS','Statistics');
define('_PROFILE_MA_MYINFO','My Info');
define('_PROFILE_MA_BASICINFO','Basic information');
define('_PROFILE_MA_MOREABOUT','More About Me');
define('_PROFILE_MA_SHOWALL','Show All');

//%%%%%%		File Name edituser.php 		%%%%%
define('_PROFILE_MA_PROFILE','Account');
define('_PROFILE_MA_DISPLAYNAME','Displayname');
define('_PROFILE_MA_SHOWSIG','Always attach signature');
define('_PROFILE_MA_CDISPLAYMODE','Comments Display Mode');
define('_PROFILE_MA_CSORTORDER','Comments Sort Order');
define('_PROFILE_MA_PASSWORD','Password');
define('_PROFILE_MA_TYPEPASSTWICE','(Enter new password twice)');
define('_PROFILE_MA_SAVECHANGES','Save Changes');
define('_PROFILE_MA_NOEDITRIGHT',"You may not edit this user's info.");
define('_PROFILE_MA_PASSNOTSAME','Passwords are different; they must match.');
define('_PROFILE_MA_PWDTOOSHORT','Password must be at least <b>%s</b> characters long.');
define("_PROFILE_MA_NOPASSWORD", "Please input a password");
define('_PROFILE_MA_PROFUPDATED','Your account has been updated!');
define('_PROFILE_MA_USECOOKIE','Store my Login Name in a cookie for 1 year');
define('_PROFILE_MA_NO','No');
define('_PROFILE_MA_DELACCOUNT','Delete Account');
define('_PROFILE_MA_MYAVATAR', 'myIcon');
define('_PROFILE_MA_UPLOADMYAVATAR', 'Upload Icon');
define('_PROFILE_MA_MAXPIXEL','Max Pixels');
define('_PROFILE_MA_MAXIMGSZ','Max Size (Bytes)');
define('_PROFILE_MA_SELFILE','Select file');
define('_PROFILE_MA_OLDDELETED','Your old Icon will be deleted!');
define('_PROFILE_MA_CHOOSEAVT', 'Choose Icon from the available list');

define('_PROFILE_MA_PRESSLOGIN', 'Click button below to login');

define('_PROFILE_MA_ADMINNO', 'Users in the webmasters group may not be deleted.');
define('_PROFILE_MA_GROUPS', 'User\'s Groups');

define('_PROFILE_MA_NOPERMISS','You dont have permission to perform this action!');
define('_PROFILE_MA_SURETODEL','Are you sure you want to delete your account?');
define('_PROFILE_MA_REMOVEINFO','This will remove all your account info from our database.');
define('_PROFILE_MA_BEENDELED','Your account has been deleted.');

//changepass.php
define("_PROFILE_MA_CHANGEPASSWORD", "Change Password");
define("_PROFILE_MA_PASSWORDCHANGED", "Password changed successfully");
define("_PROFILE_MA_OLDPASSWORD", "Current Password");
define("_PROFILE_MA_NEWPASSWORD", "New Password");

//search.php
define("_PROFILE_MA_SORTBY", "Sort By");
define("_PROFILE_MA_ORDER", "Order");
define("_PROFILE_MA_PERPAGE", "Users per page");
define("_PROFILE_MA_LATERTHAN", "%s is later than");
define("_PROFILE_MA_EARLIERTHAN", "%s is earlier than");
define("_PROFILE_MA_LARGERTHAN", "%s is larger than");
define("_PROFILE_MA_SMALLERTHAN", "%s is smaller than");

define("_PROFILE_MA_NOUSERSFOUND", "No users found");
define("_PROFILE_MA_RESULTS", "Search Results");

//changemail.php
define("_PROFILE_MA_CHANGEMAIL", "Change Email");
define("_PROFILE_MA_NEWMAIL", "New Email Address");

define("_PROFILE_MA_SENDPM", "Send Email");

define("_PROFILE_MA_NEWEMAILREQ", "New Email Address Request");
define("_PROFILE_MA_NEWMAILMSGSENT", "Your New Email Address Change Request has been received and logged. You must confirm your new email address before your session expires. An email with activation instructions has been sent to the new email address you entered. Please follow the instructions in that email to make the change. Do not close your browser until you click on the confirmation link in the e-mail address. Your email address WILL NOT CHANGE UNLESS you confirm it.");
define("_PROFILE_MA_EMAILCHANGED", "Your Email Address has been changed.");

define("_PROFILE_MA_DEACTIVATE", "Deactivate");
define("_PROFILE_MA_ACTIVATE", "Activate");
define("_PROFILE_MA_CONFCODEMISSING", "Confirmation Code Missing");
define("_PROFILE_MA_SITEDEFAULT", "Site default");

define("_PROFILE_ERROR1", "The key is wrong");
?>
