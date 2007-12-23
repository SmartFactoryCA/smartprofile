<?php

$xoopsTpl->assign("smartprofile_adminpage", "<a href='" . XOOPS_URL . "/modules/smartprofile/admin/user.php'>" ._CO_SOBJECT_ADMIN_PAGE . "</a>");
$xoopsTpl->assign("smartprofile_isAdmin", $smartprofile_isAdmin);
$xoopsTpl->assign('smartprofile_url', SMARTPROFILE_URL);
$xoopsTpl->assign('smartprofile_images_url', SMARTPROFILE_IMAGES_URL);

$xoopsTpl->assign("xoops_module_header", '<link rel="stylesheet" type="text/css" href="' . SMARTPROFILE_URL . 'module.css" />');

$xoopsTpl->assign("ref_smartfactory", "SmartProfile is developed by The SmartFactory (http://smartfactory.ca), a division of INBOX International (http://inboxinternational.com)");

include XOOPS_ROOT_PATH.'/footer.php';
?>