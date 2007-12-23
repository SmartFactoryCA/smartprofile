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

include 'header.php';
if (!$xoopsUser) {
    redirect_header(XOOPS_URL, 2, _NOPERM);
}
$xoopsOption['template_main'] = 'smartprofile_changepass.html';
include XOOPS_ROOT_PATH."/header.php";

if (!isset($_POST['submit'])) {
    //show change password form
    include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
    $form = new XoopsThemeForm(_PROFILE_MA_CHANGEPASSWORD, 'form', $_SERVER['REQUEST_URI'], 'post', true);
    $form->addElement(new XoopsFormPassword(_PROFILE_MA_OLDPASSWORD, 'oldpass', 15, 50), true);
    $form->addElement(new XoopsFormPassword(_PROFILE_MA_NEWPASSWORD, 'newpass', 15, 50), true);
    $form->addElement(new XoopsFormPassword(_PROFILE_MA_VERIFYPASS, 'vpass', 15, 50), true);
    $form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
    $form->assign($xoopsTpl);

	$xoopsTpl->assign('module_home', smart_getModuleName(true));
	$xoopsTpl->assign('categoryPath', _PROFILE_MA_CHANGEPASSWORD);

}
else {
    include_once XOOPS_ROOT_PATH."/modules/".$xoopsModule->getVar('dirname')."/include/functions.php";
    $stop = checkPassword($xoopsUser->getVar('uname'), $_POST['oldpass'], $_POST['newpass'], $_POST['vpass']);
    if ($stop != "") {
        redirect_header(XOOPS_URL.'/modules/smartprofile/userinfo.php?uid='.$xoopsUser->getVar('uid'), 2, $stop);
    }
    else {
        //update password
        $xoopsUser->setVar('pass', md5($_POST['newpass']));

        $member_handler =& xoops_gethandler('member');
        if ($member_handler->insertUser($xoopsUser)) {
            redirect_header(XOOPS_URL.'/modules/smartprofile/userinfo.php?uid='.$xoopsUser->getVar('uid'), 2, _PROFILE_MA_PASSWORDCHANGED);
        }
        redirect_header(XOOPS_URL.'/modules/smartprofile/userinfo.php?uid='.$xoopsUser->getVar('uid'), 2, _PROFILE_MA_ERRORDURINGSAVE);
    }
}

include "footer.php";
?>