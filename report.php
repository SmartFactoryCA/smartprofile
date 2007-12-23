<?php
/**
* $Id$
* Module: SmartContent
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
/*
 * new page by felix<inbox> for validusdc
 * adding report page
 */

include_once('header.php');

$xoopsOption['template_main'] = 'smartprofile_report.html';
include_once(XOOPS_ROOT_PATH . "/header.php");
include_once("footer.php");


$smartprofile_profile_handler = xoops_getModuleHandler('profile');

$smart_registry = SmartObjectsRegistry::getInstance();
/*$smart_registry->addObjectsFromItemName('account');
$smart_registry->addObjectsFromItemName('project');
$smart_registry->addObjectsFromItemName('activity');*/

include_once SMARTOBJECT_ROOT_PATH."class/smartobjecttable.php";
$objectTable = new SmartObjectTable($smartprofile_profile_handler);
$objectTable->isForUserSide();
$objectTable->addIntroButton('', 'report.php?op=export', _AM_SPROFILE_EXPORT);
//Filters
$criteria_new_reg = new CriteriaCompo();
$criteria_new_reg->add(new Criteria('reg_date', time()-(3600*24*7), '>'));
$objectTable->addFilter(_CO_SOFFSET_NEW_REG, array(
							'key' => 'reg_date',
							'criteria' => $criteria_new_reg
));


$objectTable->addColumn(new SmartObjectColumn('uname', 'left', 150));
$objectTable->addColumn(new SmartObjectColumn('reg_date', 'left', 150));
/*$objectTable->addColumn(new SmartObjectColumn('activityid', 'left', 150));
$objectTable->addColumn(new SmartObjectColumn('accountid', 'left', false));
$objectTable->addColumn(new SmartObjectColumn('duration', 'right', 100));*/


//$objectTable->addFilter('accountid', 'getAccounts');

$xoopsTpl->assign('smartprofile_report',$objectTable->fetch());
//$xoopsTpl->assign('categoryPath', _MD_SBILLING_LOG_MYLOG);


$xoopsTpl->assign('module_home', smart_getModuleName(false, true));

include_once(XOOPS_ROOT_PATH . '/footer.php');
?>