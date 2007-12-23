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

include_once 'header.php';
include_once 'include/functions.php';
$myts =& MyTextSanitizer::getInstance();


if (empty($xoopsModuleConfig['allow_register'])) {
    redirect_header(XOOPS_URL."/", 6, _PROFILE_MA_NOREGISTER);
    exit();
}
$xoopsOption['template_main'] = "smartprofile_register.html";
include XOOPS_ROOT_PATH.'/header.php';

$member_handler =& xoops_gethandler('member');

$template_dir = XOOPS_ROOT_PATH."/modules/smartprofile/language/".$xoopsConfig['language']."/mail_template";
if (!file_exists($template_dir)) {
	$template_dir = XOOPS_ROOT_PATH."/modules/smartprofile/language/english/mail_template";
}


/**
 * Debugging purpose
 */
$newuser = isset($_SESSION['smartprofile']['uid']) ? $member_handler->getUser($_SESSION['smartprofile']['uid']) : $member_handler->createUser();
//$newuser = $member_handler->createUser();

$profile_handler = xoops_getmodulehandler('profile');
$profile = $profile_handler->get($newuser->getVar('uid'));

$op = !isset($_POST['op']) ? 'register' : $_POST['op'];

$current_step = !isset($_POST['step']) ? 0 : $_POST['step'];
$criteria = new CriteriaCompo();
$criteria->setSort("step_order");
$regstep_handler = xoops_getmodulehandler('regstep');
$steps = $regstep_handler->getObjects($criteria);

$xoopsTpl->assign('categoryPath', $steps[$current_step]->getVar('step_name'));

if (count($steps) == 0) {
    redirect_header(XOOPS_URL."/", 6, _PROFILE_MA_NOSTEPSAVAILABLE);
    exit();
}

foreach ($steps as $step) {
    $xoopsTpl->append('steps', $step->toArray());
}
switch ( $op ) {
    case 'step':
        //Dynamic fields
        // Get fields
        $fields =& $profile_handler->loadFields();

        if (count($fields) > 0) {
            foreach (array_keys($fields) as $i) {
                $fieldname = $fields[$i]->getVar('field_name');
                if (isset($_POST[$fieldname])) {
                    $_SESSION['smartprofile'][$fieldname] = $_POST[$fieldname];
                }
            }
        }
        // if first step was previous step, check user data as they will always be at first step
        if ($current_step == 0) {
            $newuser->setVar('uname', isset($_POST['uname']) ? trim($_POST['uname']) : '');
            $newuser->setVar('email', isset($_POST['email']) ? trim($_POST['email']) : '');
            $vpass = isset($_POST['vpass']) ? $myts->stripSlashesGPC($_POST['vpass']) : '';
            $agree_disc = (isset($_POST['agree_disc']) && intval($_POST['agree_disc'])) ? 1 : 0;
            $newuser->setVar('pass', isset($_POST['pass']) ? md5(trim($_POST['pass'])) : '');

            $stop = '';
            if ($xoopsModuleConfig['display_disclaimer'] != 0 && $xoopsModuleConfig['disclaimer'] != '') {
                if (empty($agree_disc)) {
                    $stop .= _PROFILE_MA_UNEEDAGREE.'<br />';
                }
            }
            if (!empty($xoopsModuleConfig['minpass']) && strlen(trim($_POST['pass'])) < $xoopsModuleConfig['minpass']) {
                $stop .= sprintf(_PROFILE_MA_PWDTOOSHORT,$xoopsModuleConfig['minpass'])."<br />";
            }
            $stop .= userCheck($newuser);
            if (empty($stop)) {
                $_SESSION['smartprofile']['uname'] = $newuser->getVar('uname', 'n');
                $_SESSION['smartprofile']['email'] = $newuser->getVar('email', 'n');
                $_SESSION['smartprofile']['pass'] = $newuser->getVar('pass', 'n');
                $_SESSION['smartprofile']['actkey'] = substr(xoops_makepass(), 0, 8);
            }
        }
        // Set vars
        $uservars = $profile_handler->getUserVars();
        foreach ($_SESSION['smartprofile'] as $field => $value) {
            if (in_array($field, $uservars)) {
                $newuser->setVar($field, $value);
            }
            else {
                $profile->setVar($field, $value);
            }
        }
        if (empty($stop)) {
            // If save after previous step, save the user
            $save = false;
            for ($i = 0; $i <= $current_step; $i++) {
                if ($steps[$i]->getVar('step_save')) {
                    $save = true;
                    break;
                }
            }
            if ($save) {
                if (!$member_handler->insertUser($newuser)) {
                    $stop .= _PROFILE_MA_REGISTERNG."<br />";
                    $stop .= implode('<br />', $newuser->getErrors());
                    $xoopsTpl->assign('stop', $stop);
                }
                else{
                    $_SESSION['smartprofile']['uid'] = $newuser->getVar('uid');
                    $profile->setVar('profileid', $newuser->getVar('uid'));
                    $profile_handler->insert($profile);
                    if ($newuser->isNew() ) {
                        $xoopsTpl->append('confirm', postSaveProcess($newuser) );
                    }
                }
            }
			if (isset($steps[$current_step+1])) {
				$xoopsTpl->assign('categoryPath', $steps[$current_step+1]->getVar('step_name'));
			}
            if (!empty($stop) || isset($steps[$current_step+1])) {
                // There are errors or we can proceed to next step
                $next_step = (empty($stop) ? $current_step+1 : $current_step);
                include_once 'include/forms.php';
                $reg_form =& getRegisterForm($newuser, $profile, $next_step, $steps[$next_step] );
                assign($reg_form, $xoopsTpl);
                $xoopsTpl->assign('current_step', $next_step);
                $xoopsTpl->assign('stop', $stop);
            }
            else {
                // No errors and no more steps, finish
                $xoopsTpl->append('confirm', "Thanks for registering");
            }
        } else {
            include_once 'include/forms.php';
            $reg_form =& getRegisterForm($newuser, $profile, $current_step, $steps[$current_step]);
            assign($reg_form, $xoopsTpl);
            $xoopsTpl->assign('stop', $stop);
            $xoopsTpl->assign('current_step', $current_step);
        }
        break;

    case 'register':
    default:
        include_once 'include/forms.php';
        $reg_form =& getRegisterForm($newuser, $profile, 0, $steps[0]);
        assign($reg_form, $xoopsTpl);
        $xoopsTpl->assign('current_step', 0);
        break;
}

$xoopsTpl->assign('module_home', _PROFILE_MA_REGISTER);
include 'footer.php';
function postSaveProcess($newuser) {
    global $xoopsModuleConfig, $xoopsConfig, $template_dir;
    $newid = $newuser->getVar('uid');
    $member_handler = xoops_gethandler('member');
    if (!$member_handler->addUserToGroup(XOOPS_GROUP_USERS, $newid)) {
        return _PROFILE_MA_REGISTERNG;
    }
    if ($xoopsModuleConfig['new_user_notify'] == 1 && !empty($xoopsModuleConfig['new_user_notify_group'])) {
        $xoopsMailer =& getMailer();
        $xoopsMailer->useMail();
        $member_handler =& xoops_gethandler('member');
        $xoopsMailer->setToGroups($member_handler->getGroup($xoopsModuleConfig['new_user_notify_group']));
        $xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
        $xoopsMailer->setFromName($xoopsConfig['sitename']);
        $xoopsMailer->setSubject(sprintf(_PROFILE_MA_NEWUSERREGAT,$xoopsConfig['sitename']));
        $xoopsMailer->setBody(sprintf(_PROFILE_MA_HASJUSTREG, $newuser->getVar('uname')));
        //xoops_debug('sending email');
        $xoopsMailer->send(true);
       // xoops_debug($xoopsMailer->getErrors(true));
    }
    if ($xoopsModuleConfig['activation_type'] == 1) {
        return "";
    }
    if ($xoopsModuleConfig['activation_type'] == 0) {
        $xoopsMailer =& getMailer();
        $xoopsMailer->useMail();
        $xoopsMailer->setTemplate('register.tpl');
        $xoopsMailer->setTemplateDir($template_dir);
        $xoopsMailer->assign('SITENAME', $xoopsConfig['sitename']);
        $xoopsMailer->assign('ADMINMAIL', $xoopsConfig['adminmail']);
        $xoopsMailer->assign('SITEURL', XOOPS_URL."/");
        $xoopsMailer->assign('X_UPASS', $_POST['vpass']);
        $xoopsMailer->setToUsers(new XoopsUser($newid));
        $xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
        $xoopsMailer->setFromName($xoopsConfig['sitename']);
        $xoopsMailer->setSubject(sprintf(_PROFILE_MA_USERKEYFOR, $newuser->getVar('uname')));

        //xoops_debug('sending email');
        if ( !$xoopsMailer->send(true) ) {
        	//xoops_debug($xoopsMailer->getErrors(true));
            return _PROFILE_MA_YOURREGMAILNG;
        } else {
            return _PROFILE_MA_YOURREGISTERED;
        }
    } elseif ($xoopsModuleConfig['activation_type'] == 2) {
        $xoopsMailer =& getMailer();
        $xoopsMailer->useMail();
        $xoopsMailer->setTemplate('adminactivate.tpl');
        $xoopsMailer->setTemplateDir($template_dir);
        $xoopsMailer->assign('USERNAME', $newuser->getVar('uname'));
        $xoopsMailer->assign('USEREMAIL', $newuser->getVar('email'));
        $actkey = XOOPS_URL."/user.php?op=actv&id=".$newid."&actkey=".$newuser->getVar('actkey');
        $xoopsMailer->assign('USERACTLINK', $actkey);

        $xoopsMailer->assign('SITENAME', $xoopsConfig['sitename']);
        $xoopsMailer->assign('ADMINMAIL', $xoopsConfig['adminmail']);
        $xoopsMailer->assign('SITEURL', XOOPS_URL."/");
        $member_handler =& xoops_gethandler('member');
        $xoopsMailer->setToGroups($member_handler->getGroup($xoopsModuleConfig['activation_group']));
        $xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
        $xoopsMailer->setFromName($xoopsConfig['sitename']);
        $xoopsMailer->setSubject(sprintf(_PROFILE_MA_USERKEYFOR, $newuser->getVar('uname')));
       // xoops_debug('sending email');
        if ( !$xoopsMailer->send(true) ) {
        	xoops_debug($xoopsMailer->getErrors(true));
            return _PROFILE_MA_YOURREGMAILNG;
        } else {
            return _PROFILE_MA_YOURREGISTERED2;
        }
    }

    return "";
}

function assign($form, $tpl) {
    $i = 0;
    $req_elements = $form->getRequired();
    $required = array();
    foreach ( $req_elements as $elt ) {
        if ($elt->getName() != "") {
            $required[] = $elt->getName();
        }
    }
    $elements = array();
    foreach ( $form->getElements() as $ele ) {
        if (is_a($ele, "XoopsFormElement") ) {
            $n = ($ele->getName() != "") ? $ele->getName() : $i;
            $elements[$n]['name']	  = $ele->getName();
            $elements[$n]['caption']  = $ele->getCaption();
            $elements[$n]['body']	  = $ele->render();
            $elements[$n]['hidden']	  = $ele->isHidden();
            $elements[$n]['required'] = in_array($n, $required);
            if ($ele->getDescription() != '') {
                $elements[$n]['description']  = $ele->getDescription();
            }
        }
        $i++;
    }
    /*
     * hack by felix
     * Make work js validation
     */
    $js = $form->renderValidationJS2();
    $tpl->assign($form->getName(), array('title' => $form->getTitle(), 'name' => $form->getName(), 'action' => $form->getAction(),  'method' => $form->getMethod(), 'extra' => 'onsubmit="return xoopsFormValidate_'.$form->getName().'(this);"'.$form->getExtra(), 'javascript' => $js, 'elements' => $elements));
    //$js = $form->renderValidationJS();
    //$tpl->assign($form->getName(), array('title' => $form->getTitle(), 'name' => $form->getName(), 'action' => $form->getAction(),  'method' => $form->getMethod(), 'extra' => 'onsubmit="return xoopsFormValidate_'.$form->getName().'();"'.$form->getExtra(), 'javascript' => $js, 'elements' => $elements, 'requiredcount' => count($required)));
	/*
     * End of hack by felix
     * Make work js validation
     */
}
?>