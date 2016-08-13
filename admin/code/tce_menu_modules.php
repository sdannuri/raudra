<?php
//============================================================+
// File name   : tce_menu_modules.php
// Begin       : 2004-04-20
// Last Update : 2010-09-05
//
// Description : Output XHTML unordered list menu for modules.
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//
// License:
//    Copyright (C) 2004-2010 Nicola Asuni - Tecnick.com LTD
//    See LICENSE.TXT file for more information.
//============================================================+

/**
 * @file
 * Output XHTML unordered list menu for modules.
 * @package com.tecnick.tcexam.admin
 * @author Nicola Asuni
 * @since 2010-05-10
 */

/**
 */

require_once('../config/tce_config.php');

$pagelevel = 1;
require_once('../../shared/code/tce_authorization.php');

$thispage_title = $l['w_modules'];
require_once('../code/tce_page_header.php');

echo '<div class="custom-sidebar">'.K_NEWLINE;

// print submenu
echo '<ul>'.K_NEWLINE;
foreach ($menu['tce_menu_modules.php']['sub'] as $link => $data) {
	echo F_menu_link($link, $data, 1);
}
echo '</ul>'.K_NEWLINE;

//echo '<div class="pagehelp">'.$l['w_modules'].'</div>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;
//echo '<div class="menu-content">';
//echo "Module Dashboard";
//echo "Click on any of the links to perform specific action";
//echo "<ul>";
//echo "<li>Module";
//echo "</li>";
//echo "<li>Topics";
//echo "</li>";
//echo "<li>Module";
//echo "</li>";
//echo "<li>Module";
//echo "</li>";
//echo "<li>Module";
//echo "</li>";
//echo  "</ul>";
//echo  '</div>';
require_once('../code/tce_page_footer.php');

//============================================================+
// END OF FILE
//============================================================+
