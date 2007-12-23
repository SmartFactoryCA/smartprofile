<?php

include_once '../../mainfile.php';
include_once(XOOPS_ROOT_PATH . '/modules/smartprofile/class/vcard.php');

$vcard = new SmartprofileVcard();

$vcard->loadContact($_REQUEST['uid']);
$vcard->saveVCard();


?>
