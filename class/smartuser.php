<?php
// $Id: item.php 1765 2008-04-22 15:34:17Z fx2024 $
// ------------------------------------------------------------------------ //
// 				 XOOPS - PHP Content Management System                      //
//					 Copyright (c) 2000 XOOPS.org                           //
// 						<http://www.xoops.org/>                             //
// ------------------------------------------------------------------------ //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //

// You may not change or alter any portion of this comment or credits       //
// of supporting developers from this source code or any supporting         //
// source code which is considered copyrighted (c) material of the          //
// original comment or credit authors.                                      //
// This program is distributed in the hope that it will be useful,          //
// but WITHOUT ANY WARRANTY; without even the implied warranty of           //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
// GNU General Public License for more details.                             //

// You should have received a copy of the GNU General Public License        //
// along with this program; if not, write to the Free Software              //
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------ //
// URL: http://www.xoops.org/												//
// Project: The XOOPS Project                                               //
// -------------------------------------------------------------------------//

if (!defined("XOOPS_ROOT_PATH")) {
    die("XOOPS root path not defined");
}
include_once SMARTOBJECT_ROOT_PATH."class/smartobject.php";

class SmartProfileSmartuser extends SmartObject {

	  function SmartProfileSmartuser(&$handler) {
    	//ini_set('memory_limit','32M');
		$this->initNonPersistableVar('uid', XOBJ_DTYPE_INT, false, "_AM_SPROFILE_UID");
		$this->initNonPersistableVar('uname', XOBJ_DTYPE_TXTBOX, false, "_AM_SPROFILE_UNAME");
		$this->initNonPersistableVar('email', XOBJ_DTYPE_TXTBOX, false, "_AM_SPROFILE_EMAIL");

    	$this->SmartObject($handler);
    	$fields =& $this->handler->getFields();
    	foreach($fields as $key =>$field){
    		$this->initNonPersistableVar($key, XOBJ_DTYPE_TXTBOX, false, $field->getVar('field_title'));
    	}

    }

    function getUserLink(){
    	return "<a href='".XOOPS_URL."/modules/smartprofile/userinfo.php?uid=".$this->getVar('uid')."'>".$this->getVar('uname')."</a>";
    }

	function getUserEail(){
    	return "<a href='mailto:".$this->getVar('email')."'>".$this->getVar('email')."</a>";
    }

}
class SmartProfileSmartuserHandler extends SmartPersistableObjectHandler {

    function SmartProfileSmartuserHandler($db) {
    	 $this->SmartPersistableObjectHandler($db, 'smartuser', 'uid', 'uname', 'uname', 'smartprofile');
    	 $this->generalSQL = 'SELECT * FROM '.$this->db->prefix('users') . " AS " . $this->_itemname . ' JOIN ' . $this->db->prefix('smartprofile_profile') . ' AS profile ON profileid='.$this->_itemname.'.uid ';

    }
     function getFields(){
		static $fields_array;
		if (!isset($fields_array)) {
		  	$profile_handler =& xoops_getmodulehandler('profile');
			$fields_array =& $profile_handler->loadFields();
		}
		return $fields_array;
    }
}


?>
