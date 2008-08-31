<?php
// $Id: header.php,v 1.2 2006/12/07 20:42:29 mithyt2 Exp $
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

require_once("../../../include/cp_header.php");

//include_once XOOPS_ROOT_PATH.'/modules/smartobject/include/common.php';
define("SMARTOBJECT_ROOT_PATH", XOOPS_ROOT_PATH.'/modules/smartobject/');
include_once(SMARTOBJECT_ROOT_PATH.'include/functions.php');

/**
 * Include the common language constants for the SmartObject Framework
 */
 if (!defined('SMARTOBJECT_COMMON_CONSTANTS')) {
	$common_file = SMARTOBJECT_ROOT_PATH . "language/" . $xoopsConfig['language'] . "/common.php";
	if (!file_exists($common_file)) {

		$common_file = SMARTOBJECT_ROOT_PATH . "language/english/common.php";
	}
	include_once($common_file);
	define('SMARTOBJECT_COMMON_CONSTANTS', true);
}
$admin_file = SMARTOBJECT_ROOT_PATH . "language/" . $xoopsConfig['language'] . "/admin.php";
if (!file_exists($admin_file)) {

    $admin_file = SMARTOBJECT_ROOT_PATH . "language/english/admin.php";
}
include_once($admin_file);

if (!isset($xoopsTpl) || !is_object($xoopsTpl)) {
	include_once(XOOPS_ROOT_PATH."/class/template.php");
	$xoopsTpl = new XoopsTpl();
}
?>
