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
include 'header.php';
xoops_cp_header();

smart_adminMenu(4, "");

$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : (isset($_REQUEST['id']) ? "edit" : 'list');

$handler =& xoops_getmodulehandler('regstep');
switch ($op) {
    case "list":
        $xoopsTpl->assign('steps', $handler->getObjects(null, true, false));
        $smartOption['template_main'] = "smartprofile_admin_steplist.html";
        break;

    case "new":
        $obj =& $handler->create();
        $form =& $obj->getForm();
        $form->display();
        break;

    case "edit":
        $obj =& $handler->get($_REQUEST['id']);
        $form =& $obj->getForm();
        $form->display();
        break;

    case "save":
        if (isset($_REQUEST['id'])) {
            $obj =& $handler->get($_REQUEST['id']);
        }
        else {
            $obj =& $handler->create();
        }
        $obj->setVar('step_name', $_REQUEST['step_name']);
        $obj->setVar('step_order', $_REQUEST['step_order']);
        $obj->setVar('step_intro', $_REQUEST['step_intro']);
        $obj->setVar('step_save', $_REQUEST['step_save']);
        if ($handler->insert($obj)) {
            redirect_header('step.php', 3, sprintf(_PROFILE_AM_SAVEDSUCCESS, _PROFILE_AM_STEP));
        }
        echo $obj->getHtmlErrors();
        $form =& $obj->getForm();
        $form->display();
        break;

    case "delete":
        $obj =& $handler->get($_REQUEST['id']);
        if (isset($_REQUEST['ok']) && $_REQUEST['ok'] == 1) {
            if ($handler->delete($obj)) {
                redirect_header('step.php', 3, sprintf(_PROFILE_AM_DELETEDSUCCESS, _PROFILE_AM_STEP));
            }
            else {
                echo $obj->getHtmlErrors();
            }
        }
        else {
            xoops_confirm(array('ok' => 1, 'id' => $_REQUEST['id'], 'op' => 'delete'), $_SERVER['REQUEST_URI'], sprintf(_PROFILE_AM_RUSUREDEL, $obj->getVar('step_name')));
        }
        break;
}

$xoopsTpl->display("db:".$smartOption['template_main']);

xoops_cp_footer();
?>