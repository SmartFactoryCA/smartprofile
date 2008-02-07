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
include_once(XOOPS_ROOT_PATH."/modules/smartobject/include/common.php");
include_once(XOOPS_ROOT_PATH."/modules/smartobject/class/smartobject.php");
include_once(XOOPS_ROOT_PATH."/modules/smartobject/class/smartobjecthandler.php");

/**
 * @package kernel
 * @copyright copyright &copy; 2000 XOOPS.org
 */
class SmartProfileProfile extends SmartObject {
    function SmartProfileProfile($fields) {
        $this->initVar('profileid', XOBJ_DTYPE_INT, null, true);
        $this->initVar('newemail', XOBJ_DTYPE_TXTBOX);
        $this->init($fields);
    }

    /**
    * Initiate variables
    * @param array $fields field information array of {@link XoopsProfileField} objects
    */
    function init($fields) {
        if (is_array($fields) && count($fields) > 0) {
            foreach (array_keys($fields) as $key) {
                $this->initVar($key, $fields[$key]->getVar('field_valuetype'), $fields[$key]->getVar('field_default', 'n'), $fields[$key]->getVar('field_required'), $fields[$key]->getVar('field_maxlength'));
            }
        }
    }
}
/**
 * @package kernel
 * @copyright copyright &copy; 2000 XOOPS.org
 */
class SmartProfileProfileHandler extends SmartPersistableObjectHandler {
    /**
    * holds reference to {@link SmartProfileFieldHandler} object
    */
    var $_fHandler;

    /**
    * Array of {@link XoopsProfileField} objects
    * @var array
    */
    var $_fields = array();

    function SmartProfileProfileHandler(&$db) {
        $this->SmartPersistableObjectHandler($db, "profile", "profileid", '', '', 'smartprofile');
        $this->_fHandler =& xoops_getmodulehandler('field', 'smartprofile');
    }

    /**
     * create a new {@link SmartObject}
     *
     * @param bool $isNew Flag the new objects as "new"?
     *
     * @return object {@link SmartObject}
     */
    function &create($isNew = true) {

        $obj =& new $this->className($this->loadFields());

        $obj->handler =& $this;
        if ($isNew === true) {
            $obj->setNew();
        }
        return $obj;
    }

    /**
    * Create new {@link SmartProfileField} object
    *
    * @param bool $isNew
    *
    * @return object
    */
    function &createField($isNew = true) {
        $return =& $this->_fHandler->create($isNew);
        return $return;
    }

    /**
    * Load field information
    *
    * @return array
    */
    function loadFields() {
        if (count($this->_fields) == 0) {
            $this->_fields = $this->_fHandler->loadFields();
        }
        return $this->_fields;
    }

    /**
    * Fetch fields
    *
    * @param object $criteria {@link CriteriaElement} object
    * @param bool $id_as_key return array with field IDs as key?
    * @param bool $as_object return array of objects?
    *
    * @return array
    **/
    function getFields($criteria, $id_as_key = true, $as_object = true) {
        return $this->_fHandler->getObjects($criteria, $id_as_key, $as_object);
    }

    /**
    * Insert a field in the database
    *
    * @param object $field
    * @param bool $force
    *
    * @return bool
    */
    function insertField(&$field, $force = false) {
        return $this->_fHandler->insert($field, $force);
    }

    /**
    * Delete a field from the database
    *
    * @param object $field
    * @param bool $force
    *
    * @return bool
    */
    function deleteField(&$field, $force = false) {
        return $this->_fHandler->delete($field, $force);
    }

    /**
    * Save a new field in the database
    *
    * @param array $vars array of variables, taken from $module->loadInfo('profile')['field']
    * @param int $categoryid ID of the category to add it to
    * @param int $type valuetype of the field
    * @param int $moduleid ID of the module, this field belongs to
    * @param int $weight
    *
    * @return string
    **/
    function saveField($vars, $weight = 0) {
        $field =& $this->createField();
        $field->setVar('field_name', $vars['name']);
        $field->setVar('field_valuetype', $vars['valuetype']);
        $field->setVar('field_type', $vars['type']);
        $field->setVar('field_weight', $weight);
        if (isset($vars['title'])) {
            $field->setVar('field_title', $vars['title']);
        }
        if (isset($vars['description'])) {
            $field->setVar('field_description', $vars['description']);
        }
        if (isset($vars['required'])) {
            $field->setVar('field_required', $vars['required']); //0 = no, 1 = yes
        }
        if (isset($vars['maxlength'])) {
            $field->setVar('field_maxlength', $vars['maxlength']);
        }
        if (isset($vars['default'])) {
            $field->setVar('field_default', $vars['default']);
        }
        if (isset($vars['notnull'])) {
            $field->setVar('field_notnull', $vars['notnull']);
        }
        if (isset($vars['show'])) {
            $field->setVar('field_show', $vars['show']);
        }
        if (isset($vars['edit'])) {
            $field->setVar('field_edit', $vars['edit']);
        }
        if (isset($vars['config'])) {
            $field->setVar('field_config', $vars['config']);
        }
        if (isset($vars['options'])) {
            $field->setVar('field_options', $vars['options']);
        }
        else {
            $field->setVar('field_options', array());
        }
        if ($this->insertField($field)) {
            $msg = '&nbsp;&nbsp;Field <b>'.$vars['name'].'</b> added to the database';
        }
        else {
            $msg = '&nbsp;&nbsp;<span style="color:#ff0000;">ERROR: Could not insert field <b>'.$vars['name'].'</b> into the database. '.implode(' ', $field->getErrors()).$this->db->error().'</span>';
        }
        unset($field);
        return $msg;
    }

    /**
     * insert a new object in the database
     *
     * @param object $obj reference to the object
     * @param bool $force whether to force the query execution despite security settings
     * @param bool $checkObject check if the object is dirty and clean the attributes
     *
     * @return bool FALSE if failed, TRUE if already present and unchanged or successful
     */

    function insert(&$obj, $force = false, $checkObject = true) {
        $uservars = $this->getUserVars();
        foreach ($uservars as $var) {
            unset($obj->vars[$var]);
        }
        if (count($obj->vars) == 1) {
            return true;
        }
        return parent::insert($obj, $force, $checkObject);
    }


    /**
     * Get array of standard variable names (user table)
     *
     * @return array
     */
    function getUserVars() {
        return $this->_fHandler->getUserVars();
    }

    /**
     * Search profiles and users
     *
     * @param CriteriaElement $criteria
     *
     * @return array
     */
    function search($criteria, $searchvars) {
        $sql = "SELECT uid, uname, user_viewemail, email, ".implode(',', $searchvars)."
                FROM ".$this->db->prefix("users")." LEFT JOIN ".$this->table." ON uid=profileid";
        $sql .= ' '.$criteria->renderWhere();
        if ($criteria->getSort() != '') {
            $sql .= ' ORDER BY '.$criteria->getSort().' '.$criteria->getOrder();
        }
        $limit = $criteria->getLimit();
        $start = $criteria->getStart();

        $result = $this->db->query($sql, $limit, $start);

        if (!$result) {
            return array(array(), array(), 0);
        }
        $user_handler = xoops_gethandler('user');
        $uservars = $this->getUserVars();
        while ($myrow = $this->db->fetchArray($result)) {
        	$profile = $this->create(false);
        	$user = $user_handler->create(false);

        	foreach ($myrow as $name => $value) {
        	    if (in_array($name, $uservars)) {
        	       $user->assignVar($name, $value);
        	    }
        	    else {
        	        $profile->assignVar($name, $value);
        	    }
        	}
            $profiles[$myrow['uid']] = $profile;
            $users[$myrow['uid']] = $user;
        }

        $sql_count  = "SELECT count(*) FROM ".$this->db->prefix("users")." LEFT JOIN ".$this->table." ON uid=profileid";
        $sql_count .= ' '.$criteria->renderWhere();
        $count_res = $this->db->query($sql_count, $limit, $start);
        list($count) = $this->db->fetchRow($count_res);

        return array($users, $profiles, $count);
    }
}
?>