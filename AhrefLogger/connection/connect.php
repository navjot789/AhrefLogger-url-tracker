<?php
ob_start();
error_reporting(0);
//google recaptcha site/secret keys!
$siteKey = 'Google-recaptcha-V2-sitekey';
$secretKey = 'Google-recaptcha-V2-secretkey';
//india default_time_zone
date_default_timezone_set('Asia/Kolkata');
$current_date =date('Y-m-d H:i:s');

$con = mysqli_connect("localhost","username","password","database");
if (!$con)
{
  die('Could not connect: ' . mysqli_error());
}

?>
