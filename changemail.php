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

include '../../mainfile.php';
if (!$xoopsUser || $xoopsModuleConfig['allow_chgmail'] != 1) {
    redirect_header(XOOPS_URL."/modules/smartprofile/", 2, _NOPERM);
}
include XOOPS_ROOT_PATH."/header.php";

if (!isset($_POST['submit']) && !isset($_REQUEST['oldmail'])) {
    //show change password form
    include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
    $form = new XoopsThemeForm(_PROFILE_MA_CHANGEMAIL, 'form', $_SERVER['REQUEST_URI'], 'post', true);
    $form->addElement(new XoopsFormText(_PROFILE_MA_NEWMAIL, 'newmail', 15, 50), true);
    $form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
    $form->display();
}
else {
    //compute unique key
    $key = md5(substr($xoopsUser->getVar("pass"), 0, 5));
    if (!isset($_REQUEST['oldmail'])) {
        if (!checkEmail($_POST['newmail'])) {
            redirect_header('changemail.php', 2, _PROFILE_MA_INVALIDMAIL);
        }
        else {
            //send email to new email address with key
            $xoopsMailer =& getMailer();
            $xoopsMailer->useMail();
            $xoopsMailer->setTemplateDir(XOOPS_ROOT_PATH."/modules/".$xoopsModule->getVar('dirname')."/language/".$xoopsConfig['language']."/mail_template");
            $xoopsMailer->setTemplate('changemail.tpl');
            $xoopsMailer->assign("SITENAME", $xoopsConfig['sitename']);
            $xoopsMailer->assign("X_UNAME", $xoopsUser->getVar('uname'));
            $xoopsMailer->assign("ADMINMAIL", $xoopsConfig['adminmail']);
            $xoopsMailer->assign("SITEURL", XOOPS_URL."/");
            $xoopsMailer->assign("IP", $_SERVER['REMOTE_ADDR']);
            $xoopsMailer->assign("NEWEMAIL_LINK", XOOPS_URL."/modules/smartprofile/changemail.php?key=".$key."&oldmail=".$xoopsUser->getVar('email'));
            $xoopsMailer->assign("NEWEMAIL", $_POST['newmail']);
            $xoopsMailer->setToEmails($_POST['newmail']);
            $xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
            $xoopsMailer->setFromName($xoopsConfig['sitename']);
            $xoopsMailer->setSubject(sprintf(_PROFILE_MA_NEWEMAILREQ,$xoopsConfig['sitename']));
            if ($xoopsMailer->send()) {
                //set proposed email as the user's newemail
                $xoopsUser->setVar('newemail', $_POST['newmail']);
                $member_handler =& xoops_gethandler('member');
                if ($member_handler->insertUser($xoopsUser)) {
                    //redirect with success
                    redirect_header(XOOPS_URL.'/', 2, _PROFILE_MA_NEWMAILMSGSENT);
                }
            }
            else {
                //relevant error messages
                echo $xoopsMailer->getErrors();
            }
        }
    }
    else {
        //check unique key
        $code = isset($_GET['code']) ? $_GET['code'] : redirect_header(XOOPS_URL, 2, _PROFILE_MA_CONFCODEMISSING);
        if ($code == $key) {
            //change email address to the proposed one
            $xoopsUser->setVar('email', $xoopsUser->getVar('newemail', 'n'));
            //update user data
            $member_handler =& xoops_gethandler('member');
            if ($member_handler->insertUser($xoopsUser, true)) {
                //redirect with success
                redirect_header(XOOPS_URL."/modules/smartprofile/", 2, _PROFILE_MA_EMAILCHANGED);
            }
            else {
                //error in update process
                echo implode('<br />', $xoopsUser->getErrors());
            }
        }
        else {
            //wrong key
            $eh =& XoopsErrorHandler::getInstance();
		    $eh->errorPage(1, $xoopsModule->getVar('mid'));
        }
    }
}

include XOOPS_ROOT_PATH."/footer.php";
?>