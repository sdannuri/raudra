<?php
//============================================================+
// File name   : tce_user_change_email.php
// Begin       : 2010-09-17
// Last Update : 2012-06-07
//
// Description : Form to change user email
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
//    Copyright (C) 2004-2012 Nicola Asuni - Tecnick.com LTD
//    See LICENSE.TXT file for more information.
//============================================================+

/**
 * @file
 * Form to change user email
 * @package com.tecnick.tcexam.public
 * @author Nicola Asuni
 * @since 2010-09-17
 */

/**
 */

require_once('../config/tce_config.php');

$pagelevel = K_AUTH_USER_CHANGE_EMAIL;
$thispage_title = $l['t_user_view_comments'];
require_once('../../shared/code/tce_authorization.php');
require_once('../../shared/code/tce_functions_form.php');
require_once('../code/tce_page_header.php');

$user_id = intval($_SESSION['session_user_id']);
if(isset($_REQUEST["test_id"])){   
    $test_id = $_REQUEST["test_id"];
     if(empty($test_id)){
         header("Location: index.php");
     }
}
else{
    header("Location: index.php");
}
echo '<div class="container">'.K_NEWLINE;
$sql = "SELECT tc.comments,t.test_name FROM ".K_TABLE_TEST_COMMENTS." as tc INNER JOIN ".K_TABLE_TESTS." as t ON tc.test_id=t.test_id WHERE tc.test_id=".$test_id;
if($r = F_db_query($sql, $db)){
    $record = F_db_fetch_array($r);
   echo '<div class="tceformbox">';
   ?>
   <div class="row">
        <span class="label">
        <span title="User">Test Name:</span>
        </span>
        <span class="formw">
          - <?=$record["test_name"]?>
        </span>
    </div>

    <div class="row">
            <span class="label">
            <span title="User">Comments:</span>
            </span>
            <span class="formw">
               <?=$record["comments"]?>
            </span>
        </div>
<?php
   echo '</div>';
}else{
      header("Location: index.php");
}
echo '</div>'.K_NEWLINE;


//echo '<div class="pagehelp">'.$l['hp_user_change_email'].'</div>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;

require_once(dirname(__FILE__).'/tce_page_footer.php');

//============================================================+
// END OF FILE
//============================================================+
