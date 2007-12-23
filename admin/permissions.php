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
include 'header.php';
xoops_cp_header();

smart_adminMenu(5, "");
$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : "edit";

include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
$opform = new XoopsSimpleForm('', 'opform', 'permissions.php', "get");
$op_select = new XoopsFormSelect("", 'op', $op);
$op_select->setExtra('onchange="document.forms.opform.submit()"');
$op_select->addOption('visibility', _PROFILE_AM_PROF_VISIBLE);
$op_select->addOption('edit', _PROFILE_AM_PROF_EDITABLE);
$op_select->addOption('search', _PROFILE_AM_PROF_SEARCH);
$opform->addElement($op_select);
$opform->display();

switch ($op) {
    case "visibility":
    header("Location: visibility.php");
    break;
    
    case "edit":
    $title_of_form = _PROFILE_AM_PROF_EDITABLE;
    $perm_name = "smartprofile_edit";
    $restriction = "field_edit";
    $anonymous = false;
    break;
    
    case "search":
    $title_of_form = _PROFILE_AM_PROF_SEARCH;
    $perm_name = "smartprofile_search";
    $restriction = "";
    $anonymous = true;
    break;
}
$module_id = $xoopsModule->getVar('mid');
$perm_desc = "";
include_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';
$form = new XoopsGroupPermForm($title_of_form, $module_id, $perm_name, $perm_desc, 'admin/permissions.php', $anonymous);

$profile_handler =& xoops_getmodulehandler('profile');
$fields = $profile_handler->loadFields();

if ($op != "search") {
    foreach (array_keys($fields) as $i) {
        if ($restriction == "" || $fields[$i]->getVar($restriction)) {
            $form->addItem($fields[$i]->getVar('fieldid'), $fields[$i]->getVar('field_title'));
        }
    }
}
else {
    $searchable_types = array('textbox',
    'select',
    'radio',
    'yesno',
    'date',
    'datetime',
    'timezone',
    'language');
    foreach (array_keys($fields) as $i) {
        if (in_array($fields[$i]->getVar('field_type'), $searchable_types)) {
            $form->addItem($fields[$i]->getVar('fieldid'), $fields[$i]->getVar('field_title'));
        }
    }
}
$form->display();
xoops_cp_footer();
?>