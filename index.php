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
/*
 * Hack by felix for ampersand
 */
/*if ($xoopsUser) {
    header('location: userinfo.php?uid='.$xoopsUser->getVar('uid'));
}
else {
    header('location: register.php');
}*/
include 'header.php';
$xoopsOption['template_main'] = 'smartprofile_userlist.html';
include(XOOPS_ROOT_PATH.'/header.php');
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$user_handler =& xoops_getModuleHandler('user', 'smartprofile');

$criteria = new CriteriaCompo();
if(!(is_object($xoopsUser) && $xoopsUser->isAdmin())){
	if(is_object($xoopsUser)){
		$groups = $xoopsUser->getGroups();
	}else{
		$groups = array(3);
	}
	$allowed_groups = array();
	foreach($groups as $groupid){
		if(isset($xoopsModuleConfig['view_group_'.$groupid]) && $xoopsModuleConfig['view_group_'.$groupid][0] != ''){
			$allowed_groups = array_merge($allowed_groups, $xoopsModuleConfig['view_group_'.$groupid]);
		}
	}
	$allowed_groups = array_unique($allowed_groups);
	$criteria->add(new Criteria('groupid', '('.implode(', ', $allowed_groups).')', 'IN'));
}
$real_total_items = intval($user_handler->getCount($criteria));

$criteria->setStart($start);
$criteria->setLimit($xoopsModuleConfig['perpage']);
$usersObj =& $user_handler->getObjects($criteria, true);

$uArray = array();
if($xoopsModuleConfig['index_avatar'] && $xoopsModuleConfig['index_avatar_height'] && $xoopsModuleConfig['index_avatar_width']){
	$wh = "width='".$xoopsModuleConfig['index_avatar_width']."' height=".$xoopsModuleConfig['index_avatar_height']."'";
}
foreach($usersObj as $uid => $userObj){
	if($xoopsModuleConfig['index_avatar'] && $userObj->user_avatar() != ''){

		$avatar = "<img ".$wh." src='".XOOPS_URL."/uploads/".$userObj->user_avatar()."'/>";
		$uArray[$uid]['avatar'] = $avatar;
		unset($avatar);
	}
	if($xoopsModuleConfig['index_real_name'] == 'real'){
		$uArray[$uid]['uname'] = $userObj->getVar('name') != '' ? $userObj->getVar('name') : $userObj->uname();
	}elseif($xoopsModuleConfig['index_real_name'] == 'both'){
		$uArray[$uid]['uname'] = $userObj->getVar('name') != '' ? $userObj->getVar('name').' ('.$userObj->uname().')' : $userObj->uname();
	}else{
		$uArray[$uid]['uname'] = $userObj->uname();
	}
}
$xoopsTpl->assign('u_array', $uArray);
$xoopsTpl->assign('avatar', $xoopsModuleConfig['index_avatar']);
$xoopsTpl->assign('avatar_height', $xoopsModuleConfig['index_avatar_height']);
$xoopsTpl->assign('avatar_width', $xoopsModuleConfig['index_avatar_width']);
include_once XOOPS_ROOT_PATH.'/class/pagenav.php';
$pagenav = new XoopsPageNav($real_total_items, $xoopsModuleConfig['perpage'], $start, 'start', '');
$xoopsTpl->assign('navbar', '<div style="text-align:right;">' . $pagenav->renderNav() . '</div>');
include(XOOPS_ROOT_PATH.'/footer.php');
?>