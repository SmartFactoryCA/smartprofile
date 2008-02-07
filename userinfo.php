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

include_once XOOPS_ROOT_PATH . '/modules/system/constants.php';

$uid = intval($_GET['uid']);

if ($uid <= 0) {
	if(is_object($xoopsUser)){
		$uid = $xoopsUser->getVar('uid');
	}else{
		header('location: '.XOOPS_URL);
		exit();
	}
}

$gperm_handler = & xoops_gethandler( 'groupperm' );
$groups = is_object($xoopsUser) ? $xoopsUser->getGroups() : array(XOOPS_GROUP_ANONYMOUS);

if (is_object($xoopsUser) && $uid == $xoopsUser->getVar('uid')) {
    //disable cache
    $xoopsConfig['module_cache'][$xoopsModule->getVar('mid')] = 0;
    $xoopsOption['template_main'] = 'smartprofile_userinfo.html';
    include XOOPS_ROOT_PATH.'/header.php';

    $xoopsTpl->assign('user_ownpage', true);
    $xoopsTpl->assign('lang_editprofile', _PROFILE_MA_EDITPROFILE);
    $xoopsTpl->assign('lang_changepassword', _PROFILE_MA_CHANGEPASSWORD);
    $xoopsTpl->assign('lang_avatar', _PROFILE_MA_AVATAR);
    $xoopsTpl->assign('lang_logout', _PROFILE_MA_LOGOUT);
    if ($xoopsModuleConfig['self_delete'] == 1) {
        $xoopsTpl->assign('user_candelete', true);
        $xoopsTpl->assign('lang_deleteaccount', _PROFILE_MA_DELACCOUNT);
    } else {
        $xoopsTpl->assign('user_candelete', false);
    }
    $xoopsTpl->assign('user_changeemail', $xoopsModuleConfig['allow_chgmail']);
    $thisUser =& $xoopsUser;
} else {
    $member_handler =& xoops_gethandler('member');
    $thisUser =& $member_handler->getUser($uid);
    if (!is_object($thisUser) || (!$thisUser->isActive() && (!$xoopsUser || !$xoopsUser->isAdmin()))) {
        redirect_header(XOOPS_URL."/fs/smartprofile",3,_PROFILE_MA_SELECTNG);
        exit();
    }
    if ($xoopsUserIsAdmin) {
        //disable cache
        $xoopsConfig['module_cache'][$xoopsModule->getVar('mid')] = 0;
    }
    $xoopsOption['template_main'] = 'smartprofile_userinfo.html';
    include(XOOPS_ROOT_PATH.'/header.php');
    $xoopsTpl->assign('user_ownpage', false);
}

if ( is_object($xoopsUser) && $xoopsUser->isAdmin() ) {
    $xoopsTpl->assign('lang_editprofile', _PROFILE_MA_EDITPROFILE);
    $xoopsTpl->assign('lang_deleteaccount', _PROFILE_MA_DELACCOUNT);
    $xoopsTpl->assign('user_uid', $thisUser->getVar('uid'));
    $xoopsTpl->assign('userlevel', $thisUser->isActive());
}

// Dynamic User Profiles
$thisUsergroups =& $thisUser->getGroups();
$visibility_handler = xoops_getmodulehandler('visibility');
$fieldids = $visibility_handler->getVisibleFields($groups, $thisUsergroups);

$profile_handler =& xoops_getmodulehandler('profile');
$fields = $profile_handler->loadFields();
$cat_handler =& xoops_getmodulehandler('category');
$cat_crit = new CriteriaCompo();
$cat_crit->setSort("cat_weight");
$cats = $cat_handler->getObjects($cat_crit, true, false);
unset($cat_crit);

// Add core fields
//$categories[0]['cat_title'] = sprintf(_PROFILE_MA_ALLABOUT, $thisUser->getVar('uname'));
//if($thisUser->getVar('name')){
//    $categories[0]['fields'][] = array('title' => _PROFILE_MA_REALNAME, 'value' => $thisUser->getVar('name'));
//    $weights[0][] = 0;
//}
$avatar = "";
if($thisUser->getVar('user_avatar') && "blank.gif" != $thisUser->getVar('user_avatar')){
    $avatar = XOOPS_UPLOAD_URL."/".$thisUser->getVar('user_avatar');
}

if ($thisUser->getVar('user_viewemail') == 1) {
    $email = $thisUser->getVar('email', 'E');
} else {
    $email = "";
    if (is_object($xoopsUser)) {
        // Module admins will be allowed to see emails
        if ($xoopsUser->isAdmin() || ($xoopsUser->getVar("uid") == $thisUser->getVar("uid"))) {
            $email = $thisUser->getVar('email', 'E');
        }
    }
}
//if ($email != "") {
//    $categories[0]['fields'][] = array('title' => _PROFILE_MA_EMAIL, 'value' => $email);
//    $weights[0][] = 0;
//}
foreach (array_keys($cats) as $i) {
    $categories[$i] = $cats[$i];
}

$profile_handler = xoops_getmodulehandler('profile');
$profile = $profile_handler->get($thisUser->getVar('uid'));
// Add dynamic fields
foreach (array_keys($fields) as $i) {
    //If field should be shown
    if (in_array($fields[$i]->getVar('fieldid'), $fieldids)) {
        $catid = $fields[$i]->getVar('catid');
        $value = $fields[$i]->getOutputValue($thisUser, $profile);
         if (is_array($value)) {
            $value = implode('<br />', array_values($value));
        }
        if($xoopsModuleConfig['show_empty'] || $value){
            $categories[$catid]['fields'][] = array('title' => $fields[$i]->getVar('field_title'), 'value' => $value);
            $weights[$catid][] = $fields[$i]->getVar('catid');
        }
    }
}

//sort fields order in categories
foreach (array_keys($categories) as $i) {
    if (isset($categories[$i]['fields'])) {
        array_multisort($weights[$i], SORT_ASC, array_keys($categories[$i]['fields']), SORT_ASC, $categories[$i]['fields']);
    }
}

//ksort($categories);
$xoopsTpl->assign('categories', $categories);
// Dynamic user profiles end

if ($xoopsModuleConfig['profile_search']) {
    $module_handler =& xoops_gethandler('module');
    $criteria = new CriteriaCompo(new Criteria('hassearch', 1));
    $criteria->add(new Criteria('isactive', 1));
    $modules = $module_handler->getObjects($criteria, true);
    $mids = array_keys($modules);

    $myts =& MyTextSanitizer::getInstance();
    $allowed_mids = $gperm_handler->getItemIds('module_read', $groups);
    if (count($mids) > 0 && count($allowed_mids) > 0) {
        foreach ($mids as $mid) {
            if ( in_array($mid, $allowed_mids)) {
                $results = $modules[$mid]->search('', '', 5, 0, $thisUser->getVar('uid'));
                $count = count($results);
                if (is_array($results) && $count > 0) {
                    for ($i = 0; $i < $count; $i++) {
                        if (isset($results[$i]['image']) && $results[$i]['image'] != '') {
                            $results[$i]['image'] = XOOPS_URL.'/modules/'.$modules[$mid]->getVar('dirname').'/'.$results[$i]['image'];
                        } else {
                            $results[$i]['image'] = XOOPS_URL.'/images/icons/posticon2.gif';
                        }
                        if (!preg_match("/^http[s]*:\/\//i", $results[$i]['link'])) {
                            $results[$i]['link'] = XOOPS_URL."/modules/".$modules[$mid]->getVar('dirname')."/".$results[$i]['link'];
                        }
                        $results[$i]['title'] = $myts->makeTboxData4Show($results[$i]['title']);
                        $results[$i]['time'] = $results[$i]['time'] ? formatTimestamp($results[$i]['time']) : '';
                    }
                    if ($count == 5) {
                        $showall_link = '<a href="'.XOOPS_URL.'/search.php?action=showallbyuser&amp;mid='.$mid.'&amp;uid='.$thisUser->getVar('uid').'">'._PROFILE_MA_SHOWALL.'</a>';
                    } else {
                        $showall_link = '';
                    }
                    $xoopsTpl->append('modules', array('name' => $modules[$mid]->getVar('name'), 'results' => $results, 'showall_link' => $showall_link));
                }
                unset($modules[$mid]);
            }
        }
    }
}

//User info
$xoopsTpl->assign('uname', $thisUser->getVar('uname'));
$xoopsTpl->assign('email', $email);
$xoopsTpl->assign('avatar', $avatar);
$xoopsTpl->assign('module_home', _PROFILE_MA_PROFILE);
//$xoopsTpl->assign('categoryPath', _PROFILE_MA_USERINFO);

include 'footer.php';
?>