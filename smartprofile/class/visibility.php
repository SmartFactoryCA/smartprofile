<?php
// $Id: visibility.php,v 1.3 2007/04/11 17:25:37 mithyt2 Exp $
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

class SmartprofileVisibility extends SmartObject  {
    function SmartprofileVisibility() {
        $this->initVar('fieldid', XOBJ_DTYPE_INT);
        $this->initVar('user_group', XOBJ_DTYPE_INT);
        $this->initVar('profile_group', XOBJ_DTYPE_INT);
    }
}

class SmartprofileVisibilityHandler extends SmartPersistableObjectHandler {

    function SmartprofileVisibilityHandler($db) {
        parent::SmartPersistableObjectHandler($db, 'visibility', array('fieldid', 'user_group', 'profile_group'), '', '', 'smartprofile');
    }

    /**
     * Get fields visible to the $user_groups on a $profile_groups profile
     *
     * @param array $user_groups
     * @param array $profile_groups
     *
     * @return array
     */
    function getVisibleFields($user_groups, $profile_groups) {
        global $xoopsUser;
        $profile_groups[] = 0;
        $user_groups[] = 0;

        $sql = "SELECT fieldid FROM ".$this->table." WHERE profile_group IN (".implode(',', $profile_groups).")";
        $sql .= " AND user_group IN (".implode(',', $user_groups).")";

        $fieldids = array();
        if ($result = $this->db->query($sql)) {
            while (list($fieldid) = $this->db->fetchRow($result)) {
                $fieldids[] = $fieldid;
            }
        }
        return $fieldids;
    }
}
?>
