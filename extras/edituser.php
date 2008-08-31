<?php
// $Id: edituser.php 669 2006-08-25 22:14:09Z skalpa $
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
//  SmartProfile v1.03-MPB1 2007-10-03 | Mark Boyden (mark.boyden@noise.org) //
//  Modified SmartProfile v1.03 CVS 2007-06-13                               //
//  (search MPB for changes)                                                 //
//  ------------------------------------------------------------------------ //

$xoopsOption['pagetype'] = 'user';
include 'mainfile.php';
include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';

// If not a user, redirect
if (!is_object($xoopsUser)) {
    redirect_header('index.php',3,_US_NOEDITRIGHT);
    exit();
}

// initialize $op variable
$op = 'editprofile';
if (!empty($_POST['op'])) {
    $op = $_POST['op'];
}
if (!empty($_GET['op'])) {
    $op = $_GET['op'];
}

// MPB ADD - START
// redirect to smartprofile module if not avatar stuff
if ('avatarform' != $op && 'avatarupload' != $op && 'avatarchoose' != $op) {
    $url = "modules/smartprofile/edituser.php";
    header("location: ".$url);
}
// MPB ADD - END

$config_handler =& xoops_gethandler('config');
$xoopsConfigUser =& $config_handler->getConfigsByCat(XOOPS_CONF_USER);
$myts =& MyTextSanitizer::getInstance();

// DELETED NON-AVATAR FUNCTIONS

if ($op == 'avatarform') {
    include XOOPS_ROOT_PATH.'/header.php';
    echo '<a href="userinfo.php?uid='.$xoopsUser->getVar('uid').'">'. _US_PROFILE .'</a>&nbsp;<span style="font-weight:bold;">&raquo;&raquo;</span>&nbsp;'. _US_UPLOADMYAVATAR .'<br /><br />';
    $oldavatar = $xoopsUser->getVar('user_avatar');
    if (!empty($oldavatar) && $oldavatar != 'blank.gif') {
        echo '<div style="text-align:center;"><h4 style="color:#ff0000; font-weight:bold;">'._US_OLDDELETED.'</h4>';
        echo '<img src="'.XOOPS_UPLOAD_URL.'/'.$oldavatar.'" alt="" /></div>';
    }
    if ($xoopsConfigUser['avatar_allow_upload'] == 1 && $xoopsUser->getVar('posts') >= $xoopsConfigUser['avatar_minposts']) {
        include_once 'class/xoopsformloader.php';
        $form = new XoopsThemeForm(_US_UPLOADMYAVATAR, 'uploadavatar', 'edituser.php', 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        $form->addElement(new XoopsFormLabel(_US_MAXPIXEL, $xoopsConfigUser['avatar_width'].' x '.$xoopsConfigUser['avatar_height']));
        $form->addElement(new XoopsFormLabel(_US_MAXIMGSZ, $xoopsConfigUser['avatar_maxsize']));
        $form->addElement(new XoopsFormFile(_US_SELFILE, 'avatarfile', $xoopsConfigUser['avatar_maxsize']), true);
        $form->addElement(new XoopsFormHidden('op', 'avatarupload'));
        $form->addElement(new XoopsFormHidden('uid', $xoopsUser->getVar('uid')));
        $form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
            $form->display();
    }
    $avatar_handler =& xoops_gethandler('avatar');
    $form2 = new XoopsThemeForm(_US_CHOOSEAVT, 'uploadavatar', 'edituser.php', 'post', true);
    $avatar_select = new XoopsFormSelect('', 'user_avatar', $xoopsUser->getVar('user_avatar'));
    $avatar_select->addOptionArray($avatar_handler->getList('S'));
    $avatar_select->setExtra("onchange='showImgSelected(\"avatar\", \"user_avatar\", \"uploads\", \"\", \"".XOOPS_URL."\")'");
    $avatar_tray = new XoopsFormElementTray(_US_AVATAR, '&nbsp;');
    $avatar_tray->addElement($avatar_select);
    $avatar_tray->addElement(new XoopsFormLabel('', "<img src='".XOOPS_UPLOAD_URL."/".$xoopsUser->getVar("user_avatar", "E")."' name='avatar' id='avatar' alt='' /> <a href=\"javascript:openWithSelfMain('".XOOPS_URL."/misc.php?action=showpopups&amp;type=avatars','avatars',600,400);\">"._LIST."</a>"));
    $form2->addElement($avatar_tray);
    $form2->addElement(new XoopsFormHidden('uid', $xoopsUser->getVar('uid')));
    $form2->addElement(new XoopsFormHidden('op', 'avatarchoose'));
    $form2->addElement(new XoopsFormButton('', 'submit2', _SUBMIT, 'submit'));
    $form2->display();
    include XOOPS_ROOT_PATH.'/footer.php';
}

if ($op == 'avatarupload') {
    if (!$GLOBALS['xoopsSecurity']->check()) {
        redirect_header('index.php',3,_US_NOEDITRIGHT."<br />".implode('<br />', $GLOBALS['xoopsSecurity']->getErrors()));
        exit;
    }
    $xoops_upload_file = array();
    $uid = 0;
    if (!empty($_POST['xoops_upload_file']) && is_array($_POST['xoops_upload_file'])){
        $xoops_upload_file = $_POST['xoops_upload_file'];
    }
    if (!empty($_POST['uid'])) {
        $uid = intval($_POST['uid']);
    }
    if (empty($uid) || $xoopsUser->getVar('uid') != $uid ) {
        redirect_header('index.php',3,_US_NOEDITRIGHT);
        exit();
    }
    if ($xoopsConfigUser['avatar_allow_upload'] == 1 && $xoopsUser->getVar('posts') >= $xoopsConfigUser['avatar_minposts']) {
        include_once XOOPS_ROOT_PATH.'/class/uploader.php';
        $uploader = new XoopsMediaUploader(XOOPS_UPLOAD_PATH, array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png'), $xoopsConfigUser['avatar_maxsize'], $xoopsConfigUser['avatar_width'], $xoopsConfigUser['avatar_height']);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            $uploader->setPrefix('cavt');
            if ($uploader->upload()) {
                $avt_handler =& xoops_gethandler('avatar');
                $avatar =& $avt_handler->create();
                $avatar->setVar('avatar_file', $uploader->getSavedFileName());
                $avatar->setVar('avatar_name', $xoopsUser->getVar('uname'));
                $avatar->setVar('avatar_mimetype', $uploader->getMediaType());
                $avatar->setVar('avatar_display', 1);
                $avatar->setVar('avatar_type', 'C');
                if (!$avt_handler->insert($avatar)) {
                    @unlink($uploader->getSavedDestination());
                } else {
                    $oldavatar = $xoopsUser->getVar('user_avatar');
                    if (!empty($oldavatar) && preg_match("/^cavt/", strtolower($oldavatar))) {
                        $avatars =& $avt_handler->getObjects(new Criteria('avatar_file', $oldavatar));
			            if (!empty($avatars) && count($avatars) == 1 && is_object($avatars[0])) {
			                $avt_handler->delete($avatars[0]);
				            $oldavatar_path = str_replace("\\", "/", realpath(XOOPS_UPLOAD_PATH.'/'.$oldavatar));
				            if (0 === strpos($oldavatar_path, XOOPS_UPLOAD_PATH) && is_file($oldavatar_path)) {
				                unlink($oldavatar_path);
				            }
			            }
                    }
                    $sql = sprintf("UPDATE %s SET user_avatar = %s WHERE uid = %u", $xoopsDB->prefix('users'), $xoopsDB->quoteString($uploader->getSavedFileName()), $xoopsUser->getVar('uid'));
                    $xoopsDB->query($sql);
                    $avt_handler->addUser($avatar->getVar('avatar_id'), $xoopsUser->getVar('uid'));
                    redirect_header('userinfo.php?t='.time().'&amp;uid='.$xoopsUser->getVar('uid'),0, _US_PROFUPDATED);
                }
            }
        }
        include XOOPS_ROOT_PATH.'/header.php';
        echo $uploader->getErrors();
        include XOOPS_ROOT_PATH.'/footer.php';
    }
}

if ($op == 'avatarchoose') {
    if (!$GLOBALS['xoopsSecurity']->check()) {
        redirect_header('index.php',3,_US_NOEDITRIGHT."<br />".implode('<br />', $GLOBALS['xoopsSecurity']->getErrors()));
        exit;
    }
    $uid = 0;
    if (!empty($_POST['uid'])) {
        $uid = intval($_POST['uid']);
    }
    if (empty($uid) || $xoopsUser->getVar('uid') != $uid ) {
        redirect_header('index.php', 3, _US_NOEDITRIGHT);
        exit();
    }
    $user_avatar = '';
    $avt_handler =& xoops_gethandler('avatar');
    if (!empty($_POST['user_avatar'])) {
        $user_avatar = $myts->addSlashes( trim($_POST['user_avatar']) );
        $criteria_avatar = new CriteriaCompo(new Criteria('avatar_file', $user_avatar));
        $criteria_avatar->add(new Criteria('avatar_type', "S"));
        $avatars =& $avt_handler->getObjects($criteria_avatar);
        if (!is_array($avatars) || !count($avatars)) {
	        $user_avatar = 'blank.gif';
        }
        unset($avatars, $criteria_avatar);
    }
    $user_avatarpath = str_replace("\\", "/", realpath(XOOPS_UPLOAD_PATH.'/'.$user_avatar));
    if (0 === strpos($user_avatarpath, XOOPS_UPLOAD_PATH) && is_file($user_avatarpath)) {
        $oldavatar = $xoopsUser->getVar('user_avatar');
        $xoopsUser->setVar('user_avatar', $user_avatar);
        $member_handler =& xoops_gethandler('member');
        if (!$member_handler->insertUser($xoopsUser)) {
            include XOOPS_ROOT_PATH.'/header.php';
            echo $xoopsUser->getHtmlErrors();
            include XOOPS_ROOT_PATH.'/footer.php';
            exit();
        }
        if ($oldavatar && preg_match("/^cavt/", strtolower($oldavatar))) {
            $avatars =& $avt_handler->getObjects(new Criteria('avatar_file', $oldavatar));
            if (!empty($avatars) && count($avatars) == 1 && is_object($avatars[0])) {
                $avt_handler->delete($avatars[0]);
	            $oldavatar_path = str_replace("\\", "/", realpath(XOOPS_UPLOAD_PATH.'/'.$oldavatar));
	            if (0 === strpos($oldavatar_path, XOOPS_UPLOAD_PATH) && is_file($oldavatar_path)) {
	                unlink($oldavatar_path);
	            }
            }
        }
        if ($user_avatar != 'blank.gif') {
            $avatars =& $avt_handler->getObjects(new Criteria('avatar_file', $user_avatar));
            if (is_object($avatars[0])) {
                $avt_handler->addUser($avatars[0]->getVar('avatar_id'), $xoopsUser->getVar('uid'));
            }
        }
    }
    redirect_header('userinfo.php?uid='.$uid, 0, _US_PROFUPDATED);
}
?>
