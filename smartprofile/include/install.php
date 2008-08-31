<?php
// $Id: install.php,v 1.7 2007/06/10 19:10:23 mithyt2 Exp $
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
//  SmartProfile v1.03-MPB1 2007-10-03 | Mark Boyden (mark.boyden@noise.org) //
//  Modified SmartProfile v1.03 CVS 2007-06-13                               //
//  (search MPB for changes)                                                 //
//  ------------------------------------------------------------------------ //
function xoops_module_install_smartprofile($module) {
    // Create registration steps
    addStep('Main Information', '', 1, 0);
    addStep('Additional Information', '', 2, 0);
    addStep('Other Settings', '', 3, 1);

    // Create categories
    addCategory('Private', 'Private Information (available to you and site personnel)', 1);
    addCategory('Public', 'Public profile data', 2);
    addCategory('Subscriptions', 'Subscriptions to Newsletters and More', 3);
    addCategory('Settings', 'Site-wide Settings', 4);
    addCategory('Other', 'Other Settings', 5);
    addCategory('Feedback', 'Feedback for Site Personnel', 6);

    // Add user fields
    include_once XOOPS_ROOT_PATH . "/language/" . $GLOBALS['xoopsConfig']['language'] . '/notification.php';
    include_once XOOPS_ROOT_PATH . '/include/notification_constants.php';
    $umode_options = array('nest'=>_NESTED, 'flat'=>_FLAT, 'thread'=>_THREADED);
    $uorder_options = array(0 => _OLDESTFIRST,
                            1 => _NEWESTFIRST);
    $notify_mode_options = array(XOOPS_NOTIFICATION_MODE_SENDALWAYS=>_NOT_MODE_SENDALWAYS,
                                 XOOPS_NOTIFICATION_MODE_SENDONCETHENDELETE=>_NOT_MODE_SENDONCE,
                                 XOOPS_NOTIFICATION_MODE_SENDONCETHENWAIT=>_NOT_MODE_SENDONCEPERLOGIN);
    $notify_method_options = array( XOOPS_NOTIFICATION_METHOD_DISABLE=>_NOT_METHOD_DISABLE,
                                    XOOPS_NOTIFICATION_METHOD_PM=>_NOT_METHOD_PM,
                                    XOOPS_NOTIFICATION_METHOD_EMAIL=>_NOT_METHOD_EMAIL);
    addField('user_icq', _PROFILE_MI_ICQ_TITLE, _PROFILE_MI_ICQ_DESCRIPTION, 2, 'textbox', 1, 0, 30, 21, '', 1, 1, 1, 0, 'a:0:{}', 2);
    addField('user_aim', _PROFILE_MI_AIM_TITLE, _PROFILE_MI_AIM_DESCRIPTION, 2, 'textbox', 1, 0, 30, 23, '', 1, 1, 1, 0, 'a:0:{}', 2);
    addField('user_yim', _PROFILE_MI_YIM_TITLE, _PROFILE_MI_YIM_DESCRIPTION, 2, 'textbox', 1, 0, 30, 22, '', 1, 1, 1, 0, 'a:0:{}', 2);
    addField('user_msnm', _PROFILE_MI_MSN_TITLE, _PROFILE_MI_MSN_DESCRIPTION, 2, 'textbox', 1, 0, 30, 24, '', 1, 1, 1, 0, 'a:0:{}', 2);

    addField('name', 'Display Name', 'Your publicly displayed name', 2, 'textbox', 1, 1, 25, 1, '', 1, 1, 1, 0, 'a:0:{}', 2);
    addField('user_from', _PROFILE_MI_FROM_TITLE, _PROFILE_MI_FROM_DESCRIPTION, 2, 'textbox', 1, 0, 255, 2, '', 1, 1, 1, 0, 'a:0:{}', 2);
    addField('timezone_offset', 'Timezone', '', 4, 'timezone', 1, 1, 0, 8, '-6', 1, 1, 1, 0, 'a:0:{}', 0);
    addField('user_occ', _PROFILE_MI_OCCUPATION_TITLE, _PROFILE_MI_OCCUPATION_DESCRIPTION, 2, 'textbox', 1, 0, 255, 4, '', 1, 1, 1, 0, 'a:0:{}', 2);
    addField('user_intrest', _PROFILE_MI_INTEREST_TITLE, _PROFILE_MI_INTEREST_DESCRIPTION, 2, 'textbox', 1, 0, 255, 3, '', 1, 1, 1, 0, 'a:0:{}', 2);
    addField('bio', _PROFILE_MI_BIO_TITLE, _PROFILE_MI_BIO_DESCRIPTION, 2, 'textarea', 2, 0, 255, 6, '', 1, 1, 1, 0, 'a:0:{}', 2);
    addField('user_regdate', 'Join Date', '', 2, 'datetime', 3, 0, 10, 34, '', 1, 0, 1, 0, 'a:0:{}', 0);

    addField('user_viewemail', _PROFILE_MI_VIEWEMAIL_TITLE, 'Allow users to see my e-mail address', 4, 'yesno', 3, 1, 1, 2, '0', 1, 1, 1, 0, 'a:0:{}', 3);
    addField('attachsig', 'Attach Signature', 'Include signature in your submissions?', 4, 'yesno', 3, 1, 1, 1, '1', 1, 1, 1, 0, 'a:0:{}', 3);
    addField('user_mailok', 'Site Notifications', 'May we periodically send you information about your account and this site?', 3, 'yesno', 3, 1, 1, 1, '1', 1, 1, 1, 0, 'a:0:{}', 3);
    addField('theme', 'Theme', '', 4, 'theme', 1, 0, 0, 7, '', 1, 1, 0, 0, 'a:0:{}', 0);
    addField('umode', 'Comments Display', '', 4, 'select', 3, 'umode', 'Comments Display', '', 1, 0, 5, 'nest', 1, 1, 1, 0, 'a:3:{s:4:"nest";s:6:"Nested";s:4:"flat";s:4:"Flat";s:6:"thread";s:8:"Threaded";}', 0);
    addField('uorder', 'Comments Sorting', '', 4, 'select', 3, 1, 0, 6, 'XOOPS_COMMENT_OLD1ST', 1, 1, 1, 0, 'a:2:{s:20:"XOOPS_COMMENT_OLD1ST";s:12:"Oldest First";s:20:"XOOPS_COMMENT_NEW1ST";s:12:"Newest First";}', 0);
    addField('notify_mode', 'Notification Frequency', '', 4, 'select', 3, 1, 0, 4, '0', 1, 1, 0, 0, 'a:3:{i:0;s:33:"Notify me of all selected updates";i:1;s:19:"Notify me only once";i:2;s:48:"Notify me once then disable until I log in again";}', 0);
    addField('notify_method', 'Notification Method', '', 4, 'select', 3, 1, 0, 3, '2', 1, 1, 0, 0, 'a:3:{i:0;s:19:"Temporarily Disable";i:1;s:15:"Private Message";i:2;s:33:"Email (use address in my profile)";}', 0);

    addField('url', _PROFILE_MI_URL_TITLE, _PROFILE_MI_URL_DESCRIPTION, 2, 'textbox', 1, 0, 255, 5, '', 1, 1, 1, 0, 'a:0:{}', 2);
    addField('posts', 'Posts', '', 2, 'textbox', 3, 0, 255, 31, '', 1, 1, 1, 0, 'a:0:{}', 0);
    addField('rank', 'Rank', '', 2, 'rank', 3, 0, 0, 32, '', 1, 1, 1, 0, 'a:0:{}', 0);
    addField('last_login', 'Last login', '', 2, 'datetime', 3, 0, 10, 33, '', 1, 0, 1, 0, 'a:0:{}', 0);
    addField('user_sig', _PROFILE_MI_SIG_TITLE, _PROFILE_MI_SIG_DESCRIPTION, 2, 'textarea', 2, 0, 255, 9, '', 1, 1, 1, 0, 'a:0:{}', 2);

    addField('first_name', 'First Name', '', 1, 'textbox', 1, 1, 20, 1, '', 1, 1, 1, 1, 'b:0;', 1);
    addField('middle_name', 'Middle Name', 'Middle Name or Initial', 1, 'textbox', 1, 0, 30, 2, '', 1, 1, 1, 1, 'b:0;', 1);
    addField('last_name', 'Last Name', '', 1, 'textbox', 1, 1, 50, 3, '', 1, 1, 1, 1, 'b:0;', 1);
    addField('company', 'Company', 'Company Name', 1, 'textbox', 1, 0, 255, 9, '', 1, 1, 1, 1, 'b:0;', 1);
    addField('address', 'Street Address', '', 1, 'textarea', 2, 0, 255, 10, '', 1, 1, 1, 1, 'b:0;', 1);
    addField('city', 'City', '', 1, 'textbox', 1, 0, 50, 11, '', 1, 1, 1, 1, 'b:0;', 1);
    addField('state', 'State/Province', '', 1, 'select', 1, 0, 255, 12, '', 1, 1, 1, 1, 'a:64:{s:0:"";s:8:"-Select-";s:2:"AB";s:7:"Alberta";s:2:"NF";s:12:"Newfoundland";s:2:"PE";s:20:"Prince Edward Island";s:2:"BC";s:16:"British Columbia";s:2:"NT";s:31:"Northwest Territories / Nunavut";s:2:"PQ";s:6:"Quebec";s:2:"MB";s:8:"Manitoba";s:2:"NS";s:11:"Nova Scotia";s:2:"SK";s:12:"Saskatchewan";s:2:"NB";s:13:"New Brunswick";s:2:"ON";s:7:"Ontario";s:2:"YT";s:5:"Yukon";s:2:"AL";s:7:"Alabama";s:2:"AK";s:6:"Alaska";s:2:"AZ";s:7:"Arizona";s:2:"AR";s:8:"Arkansas";s:2:"CA";s:10:"California";s:2:"CO";s:8:"Colorado";s:2:"CT";s:11:"Connecticut";s:2:"DE";s:8:"Delaware";s:2:"DC";s:20:"District of Columbia";s:2:"FL";s:7:"Florida";s:2:"GA";s:7:"Georgia";s:2:"HI";s:6:"Hawaii";s:2:"ID";s:5:"Idaho";s:2:"IL";s:8:"Illinois";s:2:"IN";s:7:"Indiana";s:2:"IA";s:4:"Iowa";s:2:"KS";s:6:"Kansas";s:2:"KY";s:8:"Kentucky";s:2:"LA";s:9:"Louisiana";s:2:"ME";s:5:"Maine";s:2:"MD";s:8:"Maryland";s:2:"MA";s:13:"Massachusetts";s:2:"MI";s:8:"Michigan";s:2:"MN";s:9:"Minnesota";s:2:"MS";s:11:"Mississippi";s:2:"MO";s:8:"Missouri";s:2:"MT";s:7:"Montana";s:2:"NE";s:8:"Nebraska";s:2:"NV";s:6:"Nevada";s:2:"NH";s:13:"New Hampshire";s:2:"NJ";s:10:"New Jersey";s:2:"NM";s:10:"New Mexico";s:2:"NY";s:8:"New York";s:2:"NC";s:14:"North Carolina";s:2:"ND";s:12:"North Dakota";s:2:"OH";s:4:"Ohio";s:2:"OK";s:8:"Oklahoma";s:2:"OR";s:6:"Oregon";s:2:"PA";s:12:"Pennsylvania";s:2:"RI";s:12:"Rhode Island";s:2:"SC";s:14:"South Carolina";s:2:"SD";s:12:"South Dakota";s:2:"TN";s:9:"Tennessee";s:2:"TX";s:5:"Texas";s:2:"UT";s:4:"Utah";s:2:"VT";s:7:"Vermont";s:2:"VA";s:8:"Virginia";s:2:"WA";s:10:"Washington";s:2:"WV";s:13:"West Virginia";s:2:"WI";s:9:"Wisconsin";s:2:"WY";s:7:"Wyoming";}', 1);
    addField('zip', 'Zip/Postal Code', '', 1, 'textbox', 1, 0, 10, 13, '', 1, 1, 1, 1, 'b:0;', 1);
    addField('country', 'Country', '', 1, 'select', 1, 1, 255, 14, '', 1, 1, 1, 1, 'a:250:{s:0:"";s:8:"-Select-";s:2:"AC";s:16:"Ascension Island";s:2:"AD";s:7:"Andorra";s:2:"AE";s:20:"United Arab Emirates";s:2:"AF";s:11:"Afghanistan";s:2:"AG";s:19:"Antigua and Barbuda";s:2:"AI";s:8:"Anguilla";s:2:"AL";s:7:"Albania";s:2:"AM";s:7:"Armenia";s:2:"AN";s:20:"Netherlands Antilles";s:2:"AO";s:6:"Angola";s:2:"AQ";s:10:"Antarctica";s:2:"AR";s:9:"Argentina";s:2:"AS";s:14:"American Samoa";s:2:"AT";s:7:"Austria";s:2:"AU";s:9:"Australia";s:2:"AW";s:5:"Aruba";s:2:"AX";s:13:"Aland Islands";s:2:"AZ";s:10:"Azerbaijan";s:2:"BA";s:22:"Bosnia and Herzegovina";s:2:"BB";s:8:"Barbados";s:2:"BD";s:10:"Bangladesh";s:2:"BE";s:7:"Belgium";s:2:"BF";s:12:"Burkina Faso";s:2:"BG";s:8:"Bulgaria";s:2:"BH";s:7:"Bahrain";s:2:"BI";s:7:"Burundi";s:2:"BJ";s:5:"Benin";s:2:"BM";s:7:"Bermuda";s:2:"BN";s:17:"Brunei Darussalam";s:2:"BO";s:7:"Bolivia";s:2:"BR";s:6:"Brazil";s:2:"BS";s:7:"Bahamas";s:2:"BT";s:6:"Bhutan";s:2:"BV";s:13:"Bouvet Island";s:2:"BW";s:8:"Botswana";s:2:"BY";s:7:"Belarus";s:2:"BZ";s:6:"Belize";s:2:"CA";s:6:"Canada";s:2:"CC";s:23:"Cocos (Keeling) Islands";s:2:"CD";s:26:"Congo, Democratic Republic";s:2:"CF";s:24:"Central African Republic";s:2:"CG";s:5:"Congo";s:2:"CH";s:11:"Switzerland";s:2:"CI";s:28:"Cote D\\\'Ivoire (Ivory Coast)";s:2:"CK";s:12:"Cook Islands";s:2:"CL";s:5:"Chile";s:2:"CM";s:8:"Cameroon";s:2:"CN";s:5:"China";s:2:"CO";s:8:"Colombia";s:2:"CR";s:10:"Costa Rica";s:2:"CS";s:23:"Czechoslovakia (former)";s:2:"CU";s:4:"Cuba";s:2:"CV";s:10:"Cape Verde";s:2:"CX";s:16:"Christmas Island";s:2:"CY";s:6:"Cyprus";s:2:"CZ";s:14:"Czech Republic";s:2:"DE";s:7:"Germany";s:2:"DJ";s:8:"Djibouti";s:2:"DK";s:7:"Denmark";s:2:"DM";s:8:"Dominica";s:2:"DO";s:18:"Dominican Republic";s:2:"DZ";s:7:"Algeria";s:2:"EC";s:7:"Ecuador";s:2:"EE";s:7:"Estonia";s:2:"EG";s:5:"Egypt";s:2:"EH";s:14:"Western Sahara";s:2:"ER";s:7:"Eritrea";s:2:"ES";s:5:"Spain";s:2:"ET";s:8:"Ethiopia";s:2:"FI";s:7:"Finland";s:2:"FJ";s:4:"Fiji";s:2:"FK";s:27:"Falkland Islands (Malvinas)";s:2:"FM";s:10:"Micronesia";s:2:"FO";s:13:"Faroe Islands";s:2:"FR";s:6:"France";s:2:"FX";s:20:"France, Metropolitan";s:2:"GA";s:5:"Gabon";s:2:"GB";s:18:"Great Britain (UK)";s:2:"GD";s:7:"Grenada";s:2:"GE";s:7:"Georgia";s:2:"GF";s:13:"French Guiana";s:2:"GH";s:5:"Ghana";s:2:"GI";s:9:"Gibraltar";s:2:"GL";s:9:"Greenland";s:2:"GM";s:6:"Gambia";s:2:"GN";s:6:"Guinea";s:2:"GP";s:10:"Guadeloupe";s:2:"GQ";s:17:"Equatorial Guinea";s:2:"GR";s:6:"Greece";s:2:"GS";s:32:"S. Georgia and S. Sandwich Isls.";s:2:"GT";s:9:"Guatemala";s:2:"GU";s:4:"Guam";s:2:"GW";s:13:"Guinea-Bissau";s:2:"GY";s:6:"Guyana";s:2:"HK";s:9:"Hong Kong";s:2:"HM";s:26:"Heard and McDonald Islands";s:2:"HN";s:8:"Honduras";s:2:"HR";s:18:"Croatia (Hrvatska)";s:2:"HT";s:5:"Haiti";s:2:"HU";s:7:"Hungary";s:2:"ID";s:9:"Indonesia";s:2:"IE";s:7:"Ireland";s:2:"IL";s:6:"Israel";s:2:"IM";s:11:"Isle of Man";s:2:"IN";s:5:"India";s:2:"IO";s:30:"British Indian Ocean Territory";s:2:"IQ";s:4:"Iraq";s:2:"IR";s:4:"Iran";s:2:"IS";s:7:"Iceland";s:2:"IT";s:5:"Italy";s:2:"JE";s:6:"Jersey";s:2:"JM";s:7:"Jamaica";s:2:"JO";s:6:"Jordan";s:2:"JP";s:5:"Japan";s:2:"KE";s:5:"Kenya";s:2:"KG";s:10:"Kyrgyzstan";s:2:"KH";s:8:"Cambodia";s:2:"KI";s:8:"Kiribati";s:2:"KM";s:7:"Comoros";s:2:"KN";s:21:"Saint Kitts and Nevis";s:2:"KP";s:13:"Korea (North)";s:2:"KR";s:13:"Korea (South)";s:2:"KW";s:6:"Kuwait";s:2:"KY";s:14:"Cayman Islands";s:2:"KZ";s:10:"Kazakhstan";s:2:"LA";s:4:"Laos";s:2:"LB";s:7:"Lebanon";s:2:"LC";s:11:"Saint Lucia";s:2:"LI";s:13:"Liechtenstein";s:2:"LK";s:9:"Sri Lanka";s:2:"LR";s:7:"Liberia";s:2:"LS";s:7:"Lesotho";s:2:"LT";s:9:"Lithuania";s:2:"LU";s:10:"Luxembourg";s:2:"LV";s:6:"Latvia";s:2:"LY";s:5:"Libya";s:2:"MA";s:7:"Morocco";s:2:"MC";s:6:"Monaco";s:2:"MD";s:7:"Moldova";s:2:"MG";s:10:"Madagascar";s:2:"MH";s:16:"Marshall Islands";s:2:"MK";s:22:"F.Y.R.O.M. (Macedonia)";s:2:"ML";s:4:"Mali";s:2:"MM";s:7:"Myanmar";s:2:"MN";s:8:"Mongolia";s:2:"MO";s:5:"Macau";s:2:"MP";s:24:"Northern Mariana Islands";s:2:"MQ";s:10:"Martinique";s:2:"MR";s:10:"Mauritania";s:2:"MS";s:10:"Montserrat";s:2:"MT";s:5:"Malta";s:2:"MU";s:9:"Mauritius";s:2:"MV";s:8:"Maldives";s:2:"MW";s:6:"Malawi";s:2:"MX";s:6:"Mexico";s:2:"MY";s:8:"Malaysia";s:2:"MZ";s:10:"Mozambique";s:2:"NA";s:7:"Namibia";s:2:"NC";s:13:"New Caledonia";s:2:"NE";s:5:"Niger";s:2:"NF";s:14:"Norfolk Island";s:2:"NG";s:7:"Nigeria";s:2:"NI";s:9:"Nicaragua";s:2:"NL";s:11:"Netherlands";s:2:"NO";s:6:"Norway";s:2:"NP";s:5:"Nepal";s:2:"NR";s:5:"Nauru";s:2:"NT";s:12:"Neutral Zone";s:2:"NU";s:4:"Niue";s:2:"NZ";s:22:"New Zealand (Aotearoa)";s:2:"OM";s:4:"Oman";s:2:"PA";s:6:"Panama";s:2:"PE";s:4:"Peru";s:2:"PF";s:16:"French Polynesia";s:2:"PG";s:16:"Papua New Guinea";s:2:"PH";s:11:"Philippines";s:2:"PK";s:8:"Pakistan";s:2:"PL";s:6:"Poland";s:2:"PM";s:23:"St. Pierre and Miquelon";s:2:"PN";s:8:"Pitcairn";s:2:"PR";s:11:"Puerto Rico";s:2:"PS";s:31:"Palestinian Territory, Occupied";s:2:"PT";s:8:"Portugal";s:2:"PW";s:5:"Palau";s:2:"PY";s:8:"Paraguay";s:2:"QA";s:5:"Qatar";s:2:"RE";s:7:"Reunion";s:2:"RO";s:7:"Romania";s:2:"RS";s:6:"Serbia";s:2:"RU";s:18:"Russian Federation";s:2:"RW";s:6:"Rwanda";s:2:"SA";s:12:"Saudi Arabia";s:2:"SB";s:15:"Solomon Islands";s:2:"SC";s:10:"Seychelles";s:2:"SD";s:5:"Sudan";s:2:"SE";s:6:"Sweden";s:2:"SG";s:9:"Singapore";s:2:"SH";s:10:"St. Helena";s:2:"SI";s:8:"Slovenia";s:2:"SJ";s:28:"Svalbard & Jan Mayen Islands";s:2:"SK";s:15:"Slovak Republic";s:2:"SL";s:12:"Sierra Leone";s:2:"SM";s:10:"San Marino";s:2:"SN";s:7:"Senegal";s:2:"SO";s:7:"Somalia";s:2:"SR";s:8:"Suriname";s:2:"ST";s:21:"Sao Tome and Principe";s:2:"SU";s:13:"USSR (former)";s:2:"SV";s:11:"El Salvador";s:2:"SY";s:5:"Syria";s:2:"SZ";s:9:"Swaziland";s:2:"TC";s:24:"Turks and Caicos Islands";s:2:"TD";s:4:"Chad";s:2:"TF";s:27:"French Southern Territories";s:2:"TG";s:4:"Togo";s:2:"TH";s:8:"Thailand";s:2:"TJ";s:10:"Tajikistan";s:2:"TK";s:7:"Tokelau";s:2:"TM";s:12:"Turkmenistan";s:2:"TN";s:7:"Tunisia";s:2:"TO";s:5:"Tonga";s:2:"TP";s:10:"East Timor";s:2:"TR";s:6:"Turkey";s:2:"TT";s:19:"Trinidad and Tobago";s:2:"TV";s:6:"Tuvalu";s:2:"TW";s:6:"Taiwan";s:2:"TZ";s:8:"Tanzania";s:2:"UA";s:7:"Ukraine";s:2:"UG";s:6:"Uganda";s:2:"UK";s:14:"United Kingdom";s:2:"UM";s:25:"US Minor Outlying Islands";s:2:"US";s:13:"United States";s:2:"UY";s:7:"Uruguay";s:2:"UZ";s:10:"Uzbekistan";s:2:"VA";s:29:"Vatican City State (Holy See)";s:2:"VC";s:30:"Saint Vincent & the Grenadines";s:2:"VE";s:9:"Venezuela";s:2:"VG";s:22:"British Virgin Islands";s:2:"VI";s:21:"Virgin Islands (U.S.)";s:2:"VN";s:8:"Viet Nam";s:2:"VU";s:7:"Vanuatu";s:2:"WF";s:25:"Wallis and Futuna Islands";s:2:"WS";s:5:"Samoa";s:2:"YE";s:5:"Yemen";s:2:"YT";s:7:"Mayotte";s:2:"YU";s:19:"Yugoslavia (former)";s:2:"ZA";s:12:"South Africa";s:2:"ZM";s:6:"Zambia";s:2:"ZW";s:8:"Zimbabwe";}', 1);
    addField('phone', 'Phone - Main', 'Primary Phone Number', 1, 'textbox', 1, 0, 25, 20, '', 1, 1, 1, 1, 'b:0;', 1);
    addField('phone2', 'Phone - Secondary', 'Secondary Phone', 1, 'textbox', 1, 0, 25, 21, '', 1, 1, 1, 1, 'b:0;', 1);
    addField('birth_date', 'Date of Birth', '', 1, 'date', 3, 0, 10, 7, '', 1, 1, 1, 1, 'b:0;', 1);
    addField('newsletter', 'Newsletter', 'Subscribe to our Newsletter?', 3, 'yesno', 3, 1, 1, 2, '1', 1, 1, 1, 1, 'b:0;', 3);
    addField('newsletter_partners', 'Partner News', 'May we send you site-related information from our partners?', 3, 'yesno', 3, 1, 1, 3, '1', 1, 1, 1, 1, 'b:0;', 3);
    addField('email_format', 'Email Format', 'Desired E-mail Format (if available)', 3, 'select', 1, 1, 255, 10, 'HTML', 1, 1, 1, 1, 'a:2:{s:4:"HTML";s:4:"HTML";s:4:"TEXT";s:4:"Text";}', 0);

    // Add visbility permissions
    addVisibility(1, 1, 0);
    addVisibility(1, 2, 0);
    addVisibility(2, 1, 0);
    addVisibility(2, 2, 0);
    addVisibility(3, 1, 0);
    addVisibility(3, 2, 0);
    addVisibility(4, 1, 0);
    addVisibility(4, 2, 0);
    addVisibility(5, 1, 0);
    addVisibility(5, 2, 0);
    addVisibility(6, 1, 0);
    addVisibility(6, 2, 0);
    addVisibility(7, 1, 0);
    addVisibility(8, 1, 0);
    addVisibility(8, 2, 0);
    addVisibility(9, 1, 0);
    addVisibility(9, 2, 0);
    addVisibility(10, 1, 0);
    addVisibility(10, 2, 0);
    addVisibility(11, 1, 0);
    addVisibility(11, 2, 0);
    addVisibility(12, 1, 0);
    addVisibility(13, 1, 0);
    addVisibility(14, 1, 0);
    addVisibility(15, 1, 0);
    addVisibility(16, 1, 0);
    addVisibility(17, 1, 0);
    addVisibility(18, 1, 0);
    addVisibility(19, 1, 0);
    addVisibility(20, 1, 0);
    addVisibility(20, 2, 0);
    addVisibility(21, 1, 0);
    addVisibility(21, 2, 0);
    addVisibility(22, 1, 0);
    addVisibility(22, 2, 0);
    addVisibility(23, 1, 0);
    addVisibility(23, 2, 0);
    addVisibility(24, 1, 0);
    addVisibility(24, 2, 0);
    addVisibility(25, 1, 0);
    addVisibility(26, 1, 0);
    addVisibility(27, 1, 0);
    addVisibility(28, 1, 0);
    addVisibility(29, 1, 0);
    addVisibility(30, 1, 0);
    addVisibility(31, 1, 0);
    addVisibility(32, 1, 0);
    addVisibility(33, 1, 0);
    addVisibility(34, 1, 0);
    addVisibility(35, 1, 0);
    addVisibility(36, 1, 0);
    addVisibility(37, 1, 0);
    addVisibility(38, 1, 0);
    addVisibility(39, 1, 0);

//    addProfileFields(); //MPB - Commented Out as caused error

    return true;
}

function addField($name, $title, $description, $category, $type, $valuetype, $required=0, $length, $weight, $default='', $notnull=1, $canedit, $show=1, $config=0, $options=array(), $step_id) {
    global $xoopsDB;
    if (is_serialized($options)) {
        $xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("smartprofile_field")." VALUES (0, ".$category.", '".$type."', ".$valuetype.", '".$name."', '".$title."', '".$description."', ".$required.", ".$length.", ".$weight.", '".$default."', ".$notnull.", ".$canedit.", ".$show.", ".$config.", '".$options."', ".$step_id.")");
    } else {
        $xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("smartprofile_field")." VALUES (0, ".$category.", '".$type."', ".$valuetype.", '".$name."', '".$title."', '".$description."', ".$required.", ".$length.", ".$weight.", '".$default."', ".$notnull.", ".$canedit.", ".$show.", ".$config.", '".serialize($options)."', ".$step_id.")");
    }
}

function addCategory($name, $desc='', $weight) {
    global $xoopsDB;
    $xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("smartprofile_category")." VALUES (0, '".$name."', '".$desc."', ".$weight.")");
}

function addStep($name, $desc, $order, $save) {
    global $xoopsDB;
    $xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("smartprofile_regstep")." VALUES (0, '".$name."', '".$desc."', ".$order.", ".$save.")");
}

function addVisibility($fieldid, $user_group = 1, $profile_group = 0) {
    global $xoopsDB;
    $xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("profile_visibility")." VALUES (".$fieldid.", ".$user_group.", ".$profile_group.")");
}

function is_serialized($var) {
	$check = @unserialize($var);
	return ($check === false && $var != serialize(false)) ? false : true;
}

// MPB: CVS Function not ready for primetime
function addProfileFields() {
    global $xoopsModule;
    $profilefield_handler = xoops_getmodulehandler('field', 'smartprofile');
    $obj =& $profilefield_handler->create();
    $obj->setVar('field_name', 'newemail');
    $obj->setVar('field_moduleid', $xoopsModule->getVar('mid'));
    $obj->setVar('field_show', 0);
    $obj->setVar('field_edit', 0);
    $obj->setVar('field_config', 0);

    $obj->setVar('field_title', _PROFILE_MI_NEWEMAIL_TITLE);
    $obj->setVar('field_description', _PROFILE_MI_NEWEMAIL_DESCRIPTION);
    $obj->setVar('field_weight', 99);
    $obj->setVar('catid', 3);
    return $profilefield_handler->insert($obj);
}
?>
