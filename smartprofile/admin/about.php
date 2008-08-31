<?php

/**
* $Id: about.php,v 1.2 2006/12/07 20:42:29 mithyt2 Exp $
* Module: SmartPartner
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
//
include_once("header.php");

include_once(SMARTOBJECT_ROOT_PATH . "class/smartobjectabout.php");
$aboutObj = new SmartobjectAbout();
$aboutObj->render();

?>