<?php
// $Id$
###############################################################################
##                    XOOPS - PHP Content Management System                  ##
##                       Copyright (c) 2000 XOOPS.org                        ##
##                          <http://www.xoops.org/>                          ##
###############################################################################
##  This program is free software; you can redistribute it and/or modify     ##
##  it under the terms of the GNU General Public License as published by     ##
##  the Free Software Foundation; either version 2 of the License, or        ##
##  (at your option) any later version.                                      ##
##                                                                           ##
##  You may not change or alter any portion of this comment or credits       ##
##  of supporting developers from this source code or any supporting         ##
##  source code which is considered copyrighted (c) material of the          ##
##  original comment or credit authors.                                      ##
##                                                                           ##
##  This program is distributed in the hope that it will be useful,          ##
##  but WITHOUT ANY WARRANTY; without even the implied warranty of           ##
##  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            ##
##  GNU General Public License for more details.                             ##
##                                                                           ##
##  You should have received a copy of the GNU General Public License        ##
##  along with this program; if not, write to the Free Software              ##
##  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA ##
###############################################################################
include_once(XOOPS_ROOT_PATH."/modules/smartobject/include/common.php");
include_once(XOOPS_ROOT_PATH."/modules/smartobject/class/smartobject.php");
include_once(XOOPS_ROOT_PATH."/modules/smartobject/class/smartobjecthandler.php");

class SmartprofileRegstep extends SmartObject  {
    function SmartprofileRegstep() {
        $this->initVar('step_id', XOBJ_DTYPE_INT);
        $this->initVar('step_name', XOBJ_DTYPE_TXTBOX);
        $this->initVar('step_intro', XOBJ_DTYPE_TXTAREA);
        $this->initVar('step_order', XOBJ_DTYPE_INT, 1);
        $this->initVar('step_save', XOBJ_DTYPE_INT, 0);
    }

    /**
     * Get add/edit form for a SmartprofileRegstep
     *
     * @return RegistrationStepForm
     */
    function getForm() {
        include_once(XOOPS_ROOT_PATH."/modules/smartprofile/class/forms/step.php");
        $form = new RegistrationStepForm(_PROFILE_AM_STEP, 'stepform', 'step.php');
        $form->createElements($this);
        return $form;
    }
}

class SmartprofileRegstepHandler extends SmartPersistableObjectHandler {
    function SmartprofileRegstepHandler($db) {
        parent::SmartPersistableObjectHandler($db, 'regstep', 'step_id', 'step_name', '', 'smartprofile');
    }

    /**
     * Insert a new object
     * @see SmartPersistableObjectHandler
     *
     * @param SmartprofileRegstep $obj
     * @param bool $force
     *
     * @return bool
     */
    function insert($obj, $force = false) {
        if (parent::insert($obj, $force)) {
            if ($obj->getVar('step_save') == 1) {
                return $this->updateAll('step_save', 0, new Criteria('step_id', $obj->getVar('step_id'), "!="));
            }
            return true;
        }
        return false;
    }

    /**
     * Delete an object from the database
     * @see SmartPersistableObjectHandler
     *
     * @param SmartprofileRegstep $obj
     * @param bool $force
     *
     * @return bool
     */
    function delete($obj, $force = false) {
        if (parent::delete($obj, $force)) {
            $field_handler = xoops_getmodulehandler('field');
            return $field_handler->updateAll('step_id', 0, new Criteria('step_id', $obj->getVar('step_id')));
        }
        return false;
    }
}
?>