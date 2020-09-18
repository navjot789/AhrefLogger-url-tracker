<?php
ob_start();
error_reporting(0);
//google recaptcha site/secret keys!
$siteKey = '6LdS7KwZAAAAAE3iQVoeFZxfBiMKpVrPucd83rdg';
$secretKey = '6LdS7KwZAAAAAFJn_bBvg8zpNHvL5w5N7wH9P7ZK';
//india default_time_zone
date_default_timezone_set('Asia/Kolkata');
$current_date =date('Y-m-d H:i:s');

$con = mysqli_connect("localhost","ahref","b7bT0&4n","ahref");
if (!$con)
{
	die('Could not connect: ' . mysqli_error());
}

?>