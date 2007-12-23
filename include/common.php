<?php

/**
* $Id$
* Module: Class_Booking
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
if (!defined("XOOPS_ROOT_PATH")) {
 	die("XOOPS root path not defined");
}

if( !defined("SMARTPROFILE_DIRNAME") ){
	define("SMARTPROFILE_DIRNAME", 'smartprofile');
}

if( !defined("SMARTPROFILE_URL") ){
	define("SMARTPROFILE_URL", XOOPS_URL.'/modules/'.SMARTPROFILE_DIRNAME.'/');
}
if( !defined("SMARTPROFILE_ROOT_PATH") ){
	define("SMARTPROFILE_ROOT_PATH", XOOPS_ROOT_PATH.'/modules/'.SMARTPROFILE_DIRNAME.'/');
}

if( !defined("SMARTPROFILE_IMAGES_URL") ){
	define("SMARTPROFILE_IMAGES_URL", SMARTPROFILE_URL.'/images/');
}
include_once(XOOPS_ROOT_PATH.'/modules/smartobject/include/functions.php');
$smartprofile_isAdmin = smart_userIsAdmin();
?>