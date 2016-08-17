<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<?php
// define variables and set to empty values
$emailErr = $serverErr ="";
$email = $server="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $emails = array();
        $delim = " \n,";
        $tok = strtok($_POST["email"], $delim);
        while ($tok !== false) {
            $tok = test_input($tok);
            if (!filter_var($tok, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }else{
                $emails[] = $tok;
            }
            $tok = strtok($delim);
        }
        $email = array_unique($emails);
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php
echo "<h4>Your Input mails are:</h4><p>";

foreach ($email as $value){
    echo  $value. "</br>";
}
echo "</p>";
?>

<h2>GATExcel-135 Registrations</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="emailsform">
    E-mails(camma separated or each eamil in a line):</br><textarea name="email" rows="5" cols="40"><?php /*echo $comment;*/?></textarea>
    <span class="error"> <?php echo $emailErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>



<?php

define ('K_TABLE_PREFIX', 'tce_');
define ('K_TABLE_USERS', K_TABLE_PREFIX.'users');
define ('K_USRREG_GROUP', 1);
define ('K_TABLE_USERGROUP', K_TABLE_PREFIX.'usrgroups');
define ('K_TABLE_USER_GROUP', K_TABLE_PREFIX.'user_groups');
define ('K_NEWLINE', "\n");
define ('K_TIMESTAMP_FORMAT', 'Y-m-d H:i:s');
define ('K_DATABASE_HOST', 'localhost');
define ('K_DATABASE_PORT', '3306');
define ('K_DATABASE_NAME', 'tcexam');
define ('K_DATABASE_USER_NAME', 'root');
define ('K_DATABASE_USER_PASSWORD', 'raudra');
define ('K_STRONG_PASSWORD_ENCRYPTION', true);

function F_db_connect($host = 'localhost', $port = '3306', $username = 'root', $password = 'raudra', $database = 'tcexam') {
    if (!$db = @mysql_connect($host.':'.$port, $username, $password)) {
        return FALSE;
    }
    if ((strlen($database) > 0) AND (!@mysql_select_db($database, $db))) {
        return FALSE;
    }
    // set the correct charset encoding
    mysql_query('SET NAMES \'utf8\'');
    mysql_query('SET CHARACTER_SET \'utf8\'');
    mysql_query('SET collation \'utf8_unicode_ci\'');
    mysql_query('SET collation_server \'utf8_unicode_ci\'');
    mysql_query('SET collation_database \'utf8_unicode_ci\'');
    return $db;
}

if (!$db = @F_db_connect(K_DATABASE_HOST, K_DATABASE_PORT, K_DATABASE_USER_NAME, K_DATABASE_USER_PASSWORD, K_DATABASE_NAME)) {
    die('<h2>Unable to connect to the database!</h2>');
}


function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function getPasswordHash($password) {
    if (defined('K_STRONG_PASSWORD_ENCRYPTION') AND K_STRONG_PASSWORD_ENCRYPTION) {
        $pswlen = strlen($password);
        $salt = (2 * $pswlen);
        for ($i = 0; $i < $pswlen; ++$i) {
            $salt += (($i + 1) * ord($password[$i]));
        }
        $hash = '$'.$salt.'#'.strrev($password).'$';
        return md5($hash);
    }
    return md5($password);
}
function F_getRandomOTPkey() {
    $dict = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
    $key = '';
    for ($i = 0; $i < 16; ++$i) {
        $key .= $dict[(rand(0, 31))];
    }
    return $key;
}

function IsEmptyString($val){
    if (trim($val) === ''){$val = "NULL";}
    return $val;
}

function sendmailer($to,$username,$pass){
    require_once '../swift/lib/swift_required.php';

    $server="http://".$_SERVER['HTTP_HOST']."/";
    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
        ->setUsername('gatexcel2017@gmail.com')
        ->setPassword('Incorrect.5');

    $mailer = Swift_Mailer::newInstance($transport);

    $message = "<h2>Welcome to GATExcel-135</h2>";
    $message .="<p>Hi,</br> Please find your credentials for the test series GATExcel135 below</p>";
    $message .="<ul>
                <li>User Name : ".$username."</li>
                <li>Password : ".$pass."</li>
                </ul>";
    $message.="<p> you can login to your account with these credentials and change your password. Username can't be changed </p>";
    $message.="<p> you can take test <a href='".$server."'>HERE</a></p>";
    $message.-"<p> We suggest you to take tests preferrably on laptop/desktop computers for better user experience.</p>";
    $message.="<p> Wish you all the best :)</p>";


    $body = Swift_Message::newInstance('GATExcel135 starts today :)')
        ->setFrom(array('brahma0545@gmail.com' => 'Ravindra Babu Ravula'))
        ->setTo(array($to))
        ->setBody($message,'text/html');

    $result = $mailer->send($body);
    if($result){
        echo  "Mail Sent to <i>".$to."</i>";
    }

}

foreach ($email as $value){

    echo $value;

    $user_name = strtok($value, '@');
    $user_email = $value;

    echo "<h3 style=\"color:#122afc\">" . $user_name . K_NEWLINE . "</h3>";

    $newpassword = generateRandomString();
    $user_password = getPasswordHash($newpassword);
    $user_otpkey = F_getRandomOTPkey();

    $abcpassword=getPasswordHash($newpassword);


    $user_level = 1;

    $sql="SELECT user_id,user_regnumber FROM tce_users ORDER BY user_id DESC LIMIT 1";
    $r=mysql_query($sql,$db);

    while ($r and $row = mysql_fetch_assoc($r)) {
        if (is_null($row['user_regnumber'])) {
            $regnumber=0;
        }else{
            $regnumber = (int)substr($row['user_regnumber'], 2);
        }
    }
    if($r){
        $user_regnumber = "CS" . str_pad(++$regnumber, 5, "0", STR_PAD_LEFT);
    }


    $user_firstname = $user_name;
    $user_lastname = "";
    $user_birthdate = "";
    $user_birthplace = "";
    $user_ssn = "";
    $user_ip = "127.0.0.1";
    $user_regdate = date(K_TIMESTAMP_FORMAT);


    $sql = 'INSERT INTO ' . K_TABLE_USERS . ' (
				user_regdate,
				user_ip,
				user_name,
				user_email,
				user_password,
				user_regnumber,
				user_firstname,
				user_lastname,
				user_birthdate,
				user_birthplace,
				user_ssn,
				user_level,
				user_otpkey
				) VALUES (
				\'' . stripslashes(rtrim($user_regdate)) . '\',
				\'' . stripslashes(rtrim($user_ip)) . '\',
				\'' . stripslashes(rtrim($user_name)) . '\',
				\'' . stripslashes( rtrim($user_email)) . '\',
				\'' . stripslashes(rtrim($user_password)) . '\',
				\'' . IsEmptyString($user_regnumber) . '\',
				\'' . IsEmptyString($user_firstname) . '\',
				' . IsEmptyString($user_lastname) . ',
				' . IsEmptyString($user_birthdate) . ',
				' . IsEmptyString($user_birthplace) . ',
				' . IsEmptyString($user_ssn) . ',
				\'' . IsEmptyString($user_level) . '\',
				\'' . IsEmptyString($user_otpkey) . '\'
				)';

    $r = mysql_query($sql, $db);
    if(!$r){
        echo  "Error in inserting user in users:".mysql_error();
        continue;
    }

    $sql="SELECT user_id FROM ".K_TABLE_USERS." WHERE user_name='".stripslashes(rtrim($user_name))."'";
    echo "<h5>" . $sql . K_NEWLINE . "</h5>";
    $r=mysql_query($sql,$db);
    if(!$r){
        echo  "Error in getting user_id:".mysql_error();
        continue;
    }

    while ($r and $row = mysql_fetch_assoc($r)) {
        $user_id=$row['user_id'];
    }


    $sql="SELECT group_id FROM ".K_TABLE_USER_GROUP." WHERE group_name='GateExcel135'";
    $r=mysql_query($sql,$db);
    while ($r and $row = mysql_fetch_assoc($r)) {
        $group_id=$row['group_id'];
    }

    $sql = 'INSERT INTO '.K_TABLE_USERGROUP.' (
					usrgrp_user_id,
					usrgrp_group_id
					) VALUES (
					\''.$user_id.'\',
					\''.$group_id.'\'
					)';

    $r = mysql_query($sql, $db);
    if(!$r){
        echo  "Error insertion of user in groups:".mysql_error();
        continue;
    }
    if($r){
        echo "<h4 >User Name : <b>" .$user_name ."</b> </br>Passowrd : ". $newpassword ." </br>Registration Number : <i> ". $user_regnumber . K_NEWLINE ."</i></h4>";
        sendmailer(stripslashes(rtrim($user_email)),stripslashes(rtrim($user_name)),stripslashes(rtrim($newpassword)));
    }
}


?>
</body>
</html>