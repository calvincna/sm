<?php

date_default_timezone_set('Asia/Singapore');

//The command to run: /usr/local/bin/php -f /home/social/public_html/fanTEXtic/backup/backup.php

$User = "playsp5_admin"; // Put New user -- CPanel user or MySQL user with All permissions is fine.
$Password = "09163610"; // Put New Password
$DatabaseName = "playsp5_spotmaniav2"; // Put Database name 


	//mysql_connect("localhost", "playsp5_admin", "09163610") or die(mysql_error());
	//mysql_select_db("playsp5_spotmania") or die(mysql_error());

//$File = $_SERVER['DOCUMENT_ROOT']."/somefile.sql"; // Put the complete path here -- /home/user/database.sql for example

//$today = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm
//$today = date("m.d.y");                         // 03.10.01


$today = date("d-m-y_H:i:s");  
$File = "/home/playsp5/public_html/playchap.com/spotmania/backup/backup_".$today.".sql";

$Results = shell_exec("mysqldump -u$User -p$Password $DatabaseName > $File");

// Mail the file

$sendto = "Calvin <cal.chia@gmail.com>";
$sendfrom = "Automated Backup <playchap@playchap.com>";
$sendsubject = "Daily Mysql Backup - spotmaniav2";
$bodyofemail = "Here is the daily spotmaniav2 backup.";

$path = get_include_path() . PATH_SEPARATOR . '/home/playsp5/php';
set_include_path($path);

    include('Mail.php');
    include('Mail/mime.php');

	$message = new Mail_mime();
	$text = "$bodyofemail";
	$message->setTXTBody($text);
	$message->AddAttachment($File);
    $body = $message->get();
    $extraheaders = array("From"=>"$sendfrom", "Subject"=>"$sendsubject");
    $headers = $message->headers($extraheaders);
    $mail = Mail::factory("mail");
    $mail->send("$sendto", $headers, $body);

?>