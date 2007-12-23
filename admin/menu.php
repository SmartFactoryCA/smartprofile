<?php
// $Id$
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
// Author: XOOPS Foundation                                                  //
// URL: http://www.xoops.org/                                                //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //
//$adminmenu[1]['title'] = _PROFILE_MI_INDEX;
//$adminmenu[1]['link'] = "admin/admin.php";
$adminmenu[1]['title'] = _PROFILE_MI_USERS;
$adminmenu[1]['link'] = "admin/user.php";
$adminmenu[2]['title'] = _PROFILE_MI_CATEGORIES;
$adminmenu[2]['link'] = "admin/category.php";
$adminmenu[3]['title'] = _PROFILE_MI_FIELDS;
$adminmenu[3]['link'] = "admin/field.php";
$adminmenu[4]['title'] = _PROFILE_MI_STEPS;
$adminmenu[4]['link'] = "admin/step.php";
$adminmenu[5]['title'] = _PROFILE_MI_PERMISSIONS;
$adminmenu[5]['link'] = "admin/permissions.php";

if (isset($xoopsModule)) {

	$i = -1;

	$i++;
	$headermenu[$i]['title'] = _PREFERENCES;
	$headermenu[$i]['link'] = '../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $xoopsModule->getVar('mid');

	$i++;
	$headermenu[$i]['title'] = _CO_SOBJECT_GOTOMODULE;
	$headermenu[$i]['link'] = XOOPS_URL."/modules/".$xoopsModule->getVar('dirname') . '/';

	$i++;
	$headermenu[$i]['title'] = _CO_SOBJECT_UPDATE_MODULE;
	$headermenu[$i]['link'] = XOOPS_URL . "/modules/system/admin.php?fct=modulesadmin&op=update&module=" . $xoopsModule->getVar('dirname');

	$i++;
	$headermenu[$i]['title'] = _AM_SOBJECT_ABOUT;
	$headermenu[$i]['link'] = XOOPS_URL . "/modules/".$xoopsModule->getVar('dirname')."/admin/about.php";
}
?>