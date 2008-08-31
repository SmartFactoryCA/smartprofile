<?php
// $Id: register.php,v 1.13.4.1.2.3 2005/04/23 09:55:39 mithyt2 Exp $
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

include 'mainfile.php';
$parsed_url = parse_url($_SERVER['REQUEST_URI']);
$url = "modules/smartprofile/register.php";
header('location: '.$url);
//this file is deprecated
?>
