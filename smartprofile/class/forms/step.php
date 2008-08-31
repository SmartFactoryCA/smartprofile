<?php
// $Id: step.php,v 1.2 2006/12/13 15:45:19 mithyt2 Exp $
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

include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");

class RegistrationStepForm extends XoopsThemeForm {
    
    /**
     * Add elements to the form
     * 
     * @param SmartprofileRegstep $target
     * 
     * @return void
     *
     */
    function createElements($target) {
        if (!$target->isNew()) {
            $this->addElement(new XoopsFormHidden('id', $target->getVar('step_id')));
        }
        $this->addElement(new XoopsFormHidden('op', 'save'));
        $this->addElement(new XoopsFormText(_PROFILE_AM_STEPNAME, 'step_name', 25, 255, $target->getVar('step_name', 'e')));
        $this->addElement(new XoopsFormText(_PROFILE_AM_STEPINTRO, 'step_intro', 25, 255, $target->getVar('step_intro', 'e')));
        $this->addElement(new XoopsFormText(_PROFILE_AM_STEPORDER, 'step_order', 10, 10, $target->getVar('step_order', 'e')));
        $this->addElement(new XoopsFormRadioYN(_PROFILE_AM_STEPSAVE, 'step_save', $target->getVar('step_save', 'e')));
        $this->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
    }
}
?>