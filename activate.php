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
//  Patch made by XoopsTotal - Fernando Santos, fernando@zend.com.br         //
//  www.xoopstotal.com.br                                                    //
//  ------------------------------------------------------------------------ //
//$xoopsOption['pagetype'] = "user";
include "../../mainfile.php";
include XOOPS_ROOT_PATH.'/header.php';

if (isset($_REQUEST['op']) && $_REQUEST['op'] == "actv") {
	if ( file_exists(XOOPS_ROOT_PATH."/language/".$GLOBALS['xoopsConfig']['language']."/user.php") ) {
	    include_once XOOPS_ROOT_PATH."/language/".$GLOBALS['xoopsConfig']['language']."/user.php";
	} else {
	    include_once XOOPS_ROOT_PATH."/language/english/user.php";
	}
    $id = intval($_GET['id']);
    $actkey = trim($_GET['actkey']);
    if (empty($id)) {
        redirect_header(XOOPS_URL,1,'');
        exit();
    }
    $member_handler =& xoops_gethandler('member');
    $thisuser =& $member_handler->getUser($id);
    if (!is_object($thisuser)) {
        exit();
    }
    if ($thisuser->getVar('actkey') != $actkey) {
        redirect_header(XOOPS_URL.'/',5,_PROFILE_MA_ACTKEYNOT);
    } else {
        if ($thisuser->getVar('level') > 0 ) {
            redirect_header(XOOPS_URL.'/modules/smartprofile/index.php',5,_PROFILE_MA_ACONTACT);
        } else {
            if (false != $member_handler->activateUser($thisuser)) {
                $config_handler =& xoops_gethandler('config');
                if ($xoopsModuleConfig['activation_type'] == 2) {
                    $myts =& MyTextSanitizer::getInstance();
                    $xoopsMailer =& getMailer();
                    $xoopsMailer->useMail();
                    $xoopsMailer->setTemplateDir(XOOPS_ROOT_PATH."/modules/smartprofile/language/".$xoopsConfig['language']."/mail_template");
                    $xoopsMailer->setTemplate('activated.tpl');
                    $xoopsMailer->assign('SITENAME', $xoopsConfig['sitename']);
                    $xoopsMailer->assign('ADMINMAIL', $xoopsConfig['adminmail']);
                    $xoopsMailer->assign('SITEURL', XOOPS_URL."/");
                    $xoopsMailer->setToUsers($thisuser);
                    $xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
                    $xoopsMailer->setFromName($xoopsConfig['sitename']);
                    $xoopsMailer->setSubject(sprintf(_PROFILE_MA_YOURACCOUNT,$xoopsConfig['sitename']));
                    include XOOPS_ROOT_PATH.'/header.php';
                    if ( !$xoopsMailer->send() ) {
                        printf(_PROFILE_MA_ACTVMAILNG, $thisuser->getVar('uname'));
                    } else {
                        printf(_PROFILE_MA_ACTVMAILOK, $thisuser->getVar('uname'));
                    }
                    include XOOPS_ROOT_PATH.'/footer.php';
                } else {
                    redirect_header(XOOPS_URL.'/user.php',5,_PROFILE_MA_ACTLOGIN);
                }
            } else {
                redirect_header(XOOPS_URL.'/index.php',5,'Activation failed!');
            }
        }
    }
    exit();
}
elseif (!isset($_REQUEST['submit']) || !isset($_REQUEST['email']) || trim($_REQUEST['email']) == "") {
    include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
    $form = new XoopsThemeForm('', 'form', 'activate.php');
    $form->addElement(new XoopsFormText(_PROFILE_MA_EMAIL, 'email', 25, 255));
    $form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
    $form->display();
}else{
    $myts =& MyTextSanitizer::getInstance();
    $member_handler =& xoops_gethandler('member');
    $getuser =& $member_handler->getUsers(new Criteria('email', $myts->addSlashes(trim($_REQUEST['email']))));
    if (count($getuser) == 0) {
        redirect_header(XOOPS_URL, 2, _PROFILE_MA_SORRYNOTFOUND);
    }
    if($getuser[0]->isActive()){
        redirect_header(XOOPS_URL, 2, sprintf(_PROFILE_MA_USERALREADYACTIVE, $getuser[0]->getVar('email')));
    }
    if($getuser[0]->isDisabled()){
        redirect_header(XOOPS_URL, 2, sprintf(_PROFILE_MA_USERDISABLED, $getuser[0]->getVar('email')));
    }
    $xoopsMailer =& getMailer();
    $xoopsMailer->useMail();
    $xoopsMailer->setTemplate('register.tpl');
    $xoopsMailer->setTemplateDir(XOOPS_ROOT_PATH."/modules/".$xoopsModule->getVar('dirname')."/language/".$xoopsConfig['language']."/mail_template/");
    $xoopsMailer->assign('SITENAME', $xoopsConfig['sitename']);
    $xoopsMailer->assign('ADMINMAIL',
    $xoopsConfig['adminmail']);
    $xoopsMailer->assign('SITEURL', XOOPS_URL."/");
    $xoopsMailer->setToUsers($getuser[0]);
    $xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
    $xoopsMailer->setFromName($xoopsConfig['sitename']);
    $xoopsMailer->setSubject($xoopsMailer->setSubject(sprintf(_PROFILE_MA_USERKEYFOR, $getuser[0]->getVar('uname'))));
    if ( !$xoopsMailer->send() ) {
        echo _PROFILE_MA_YOURREGMAILNG;
    } else {
        echo _PROFILE_MA_YOURREGISTERED;
    }
}
include XOOPS_ROOT_PATH.'/footer.php';
?>