<?php
// $Id: category.php,v 1.3 2007/04/11 17:25:37 mithyt2 Exp $
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
if (!defined("XOOPS_ROOT_PATH")) {
    die("XOOPS root path not defined");
}
include_once(XOOPS_ROOT_PATH."/modules/smartobject/include/common.php");
include_once(XOOPS_ROOT_PATH."/modules/smartobject/class/smartobject.php");
include_once(XOOPS_ROOT_PATH."/modules/smartobject/class/smartobjecthandler.php");
/**
 * @package kernel
 * @copyright copyright &copy; 2000 XOOPS.org
 */
class SmartprofileCategory extends SmartObject {
    function SmartprofileCategory() {
        $this->initVar('catid', XOBJ_DTYPE_INT, null, true);
        $this->initVar('cat_title', XOBJ_DTYPE_TXTBOX);
        $this->initVar('cat_description', XOBJ_DTYPE_TXTAREA);
        $this->initVar('cat_weight', XOBJ_DTYPE_INT);
        //$this->initVar('cat_moduleid', XOBJ_DTYPE_INT);
    }

    /**
    * Get {@link XoopsThemeForm} for adding/editing categories
    *
    * @param mixed $action URL to submit to or false for $_SERVER['REQUEST_URI']
    *
    * @return object
    */
    function getForm($action = false) {
        if ($action === false) {
            $action = $_SERVER['REQUEST_URI'];
        }
        $title = $this->isNew() ? sprintf(_PROFILE_AM_ADD, _PROFILE_AM_CATEGORY) : sprintf(_PROFILE_AM_EDIT, _PROFILE_AM_CATEGORY);

        include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");

        $form = new XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->addElement(new XoopsFormText(sprintf(_PROFILE_AM_TITLE, _PROFILE_AM_CATEGORY), 'cat_title', 35, 255, $this->getVar('cat_title')));
        if (!$this->isNew()) {
            //Load groups
            $form->addElement(new XoopsFormHidden('id', $this->getVar('catid')));
        }
        $form->addElement(new XoopsFormTextArea(_PROFILE_AM_DESCRIPTION, 'cat_description', $this->getVar('cat_description', 'e')));
        $form->addElement(new XoopsFormText(_PROFILE_AM_CATEGORY." "._PROFILE_AM_WEIGHT, 'cat_weight', 35, 35, $this->getVar('cat_weight', 'e')));

        $form->addElement(new XoopsFormHidden('op', 'save'));
        $form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));

        return $form;
    }
}

/**
 * @package kernel
 * @copyright copyright &copy; 2000 XOOPS.org
 */
class SmartprofileCategoryHandler extends SmartPersistableObjectHandler {
    function SmartprofileCategoryHandler(&$db) {
        parent::SmartPersistableObjectHandler($db, "category", "catid", 'cat_title', 'cat_description', 'smartprofile');
    }
}
?>
