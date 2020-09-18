<?php
include 'connection/connect.php';
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
$current_date =date('Y-m-d H:i:s');

if(!isset($_SESSION['u_id']))
{
  $_SESSION['u_id'] = 0;
}

?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

  <?php include 'pages/head.php';?>
  
 
  <div id="focus-overlay"></div>
  <body class='light home' id="body">
        <a href="#body" id="back-to-top"><i class="zmdi zmdi-chevron-up"></i></a>
            
  <?php include 'pages/header.php';?>  
  <?php include 'pages/m_header.php';?>  
	   

	   
	   
	   
		 
                    <section class="under-head-cont main-index-top" style="background-image:url(image/back5.jpg);">
                    
                    <svg id="wave" viewBox="0 0 100 15" style="position: absolute;bottom: 0;z-index: 0;"><path fill="#fff" opacity="0.5" d="M0 30 V15 Q30 3 60 15 V30z"></path><path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z"></path></svg>
                    
                      <div class="container">
                        <div class="row">
                          <div class="col-md-12">                             
                            <div class="promo">
                              <h1>
                                AHREF - Create or Track URLs         
                              </h1>
                    	
                            </div>
                                    <div class="overlaylink">
                    	<div class="link-shared" id="modal">
                    		<!-- close trigger -->
                    		<div class="linkk">
                    			<span><i class="linkk2"></i></span>
                    		</div>
                    		<!-- modal content -->
                    		<div class="modal-contentlinkl">
                    		</div>
                    	</div>
                    </div>
                    <div class="sharee-thiss"></div>
                    <div class="ajaxx"></div>
                    <div class="p-relativee">
                
                <?php
              
                // getting the unique code and redirect the visitor
                if(isset($_GET['link']) ) 
                {
                  
                        $fetch  = "SELECT * FROM shotner WHERE shorturl = '".$_GET['link']."' ";
                	    $records = mysqli_query($con,$fetch);
                	    $row = mysqli_fetch_array($records);
                	    
                        	                       
                                   
                                	     if(strlen($_GET['link'])==6 && mysqli_num_rows($records) > 0 )
                                            {
                                              $final_url = $row['urlinput'];
                                             
                                             
                                             	include("browser-detect.php"); //include browser detection script
                                             	
                                                    $url = 'http://ip-api.com/json/'.$_SERVER["REMOTE_ADDR"];  //include API url for detection of isp,region,country of an ip
                                                    $obj = json_decode(file_get_contents($url), true); //converting json data into PHP	
                                                   
                                                   
                                             
                                                      
                                                   if (strpos($_SERVER["HTTP_USER_AGENT"], "facebookexternalhit/") !== false || 
                                                       strpos($_SERVER["HTTP_USER_AGENT"], "Facebot") !== false ||
                                                       strpos($_SERVER["HTTP_USER_AGENT"], "Trident/4.0") !== false ||
                                                       strpos($_SERVER["HTTP_USER_AGENT"], "rv:1.9.1.2") !== false ||
                                                       strpos($_SERVER["HTTP_USER_AGENT"], "rv:1.9.0.10") !== false ||
                                                       strpos($_SERVER["HTTP_USER_AGENT"], "rv:1.8") !== false ||
                                                       strpos($_SERVER["HTTP_USER_AGENT"], "Intel Mac OS X 10_11_6") !== false ||
                                                       strpos($_SERVER["HTTP_USER_AGENT"], "AhrefsBot/6.1") !== false ||
                                                       strpos($_SERVER["HTTP_USER_AGENT"], "TrendsmapResolver/0.1") !== false ||
                                                       strpos($_SERVER["HTTP_USER_AGENT"], "Twitterbot/1.0") !== false ||
                                                       strpos($_SERVER["HTTP_USER_AGENT"], "Applebot/0.1") !== false ||
                                                       strpos($_SERVER["HTTP_USER_AGENT"], "WhatsApp") !== false) 
                                                    {
                                                   
                                                    //BOT DETECTION
                                                        $workingquery = mysqli_query($con,"insert into tracking_data(ip,browser,os,complete,bot_status,country,region,isp,lat,lon,shorturl,date_time) values(
                                                                                                      '".$_SERVER['REMOTE_ADDR']."',
                                                                                                      '".$user_browser."',
                                                                                                      '".$user_os."',
                                                                                                      '<strong>BOT :&nbsp</strong> ".$_SERVER['HTTP_USER_AGENT']."',
                                                                                                      '1',
                                                                                                      '".$obj['country']."',
                                                                                                      '".$obj['regionName']."',
                                                                                                      '".$obj['isp']."',
                                                                                                      '".$obj['lat']."',
                                                                                                      '".$obj['lon']."',
                                                                                                      '".$_GET['link']."',
                                                                                                      '".$current_date."') ");
                                                    
                                                    }
                                                elseif(empty($_SERVER["HTTP_USER_AGENT"]) || $_SERVER["HTTP_USER_AGENT"] == "")
                                                    { 
                                                        //BOT DETECTION BUT WITHOUT USER-AGENT
                                                    
                                                      $workingquery = mysqli_query($con,"insert into tracking_data(ip,browser,os,complete,bot_status,country,region,isp,lat,lon,shorturl,date_time) values(
                                                                                                                                              '".$_SERVER['REMOTE_ADDR']."',
                                                                                                                                              '".$user_browser."',
                                                                                                                                              '".$user_os."',
                                                                                                                                              '<strong>BOT : USER AGENT NOT DETECTED!</strong>',
                                                                                                                                              '1',
                                                                                                                                              '".$obj['country']."',
                                                                                                                                              '".$obj['regionName']."',
                                                                                                                                               '".$obj['isp']."',
                                                                                                                                               '".$obj['lat']."',
                                                                                                                                                '".$obj['lon']."',
                                                                                                                                              '".$_GET['link']."',
                                                                                                                                              '".$current_date."') ");
                                                    
                                                    
                                                    
                                                    
                                                    }
                                                  else {
                                                   //NORMAL USER   
                                                   
                                              
                                                   
                                                     $workingquery = mysqli_query($con,"insert into tracking_data(ip,browser,os,complete,country,region,isp,lat,lon,shorturl,date_time) values(
                                                                                                                                              '".$_SERVER['REMOTE_ADDR']."',
                                                                                                                                              '".$user_browser."',
                                                                                                                                              '".$user_os."',
                                                                                                                                              '".$_SERVER['HTTP_USER_AGENT']."',
                                                                                                                                              '".$obj['country']."',
                                                                                                                                              '".$obj['regionName']."',
                                                                                                                                               '".$obj['isp']."',
                                                                                                                                               '".$obj['lat']."',
                                                                                                                                               '".$obj['lon']."',
                                                                                                                                              '".$_GET['link']."',
                                                                                                                                              '".$current_date."') ");
                                                    }
                                               
                                              if($workingquery)
                                              {
                                                  
                                                //sending emails only to vaild user if he active email notification on perticular shoturl
                                                
                                                 if($row['notify']==1 && $row['u_id'] !== 0)
                                                  {
                                                      $sql_prepare = 'SELECT username,email,status FROM users WHERE u_id = ?';
                   
                                    					$stmt = $con->prepare($sql_prepare); 
                                                       
                                                        	// Bind parameters (s = string, i = int, b = blob, etc), in our case the u_id is a int so we use "i"
                                                        	$stmt->bind_param('i', $row['u_id']);
                                                        	$stmt->execute();
                                                      
                                                        
                                                        	$stmt->bind_result($username,$email,$status);
                                                             $json = array();
                                                             if($stmt->fetch()) {
                                                                        $json = array('username'=>$username,'email'=>$email,'status'=>$status);
                                                                        
                                                                    }
                                                     
                                    					$stmt->close();
                                                        
                                                  
                                                          if($json['status']==1)
                                                            {
                                                            $toEmail = $json['email'];
                                                            }
                                                            $subject = "Ahref-".$row['shorturl'];
                                                            $content = '
                                                            
                                                            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                                            <html xmlns="http://www.w3.org/1999/xhtml">
                                                            <head>
                                                            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                                                            <!--[if !mso]><!-->
                                                            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                                                            <!--<![endif]-->
                                                            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                                                            <title></title>
                                                            <style type="text/css">
                                                            * {
                                                            	-webkit-font-smoothing: antialiased;
                                                            }
                                                            body {
                                                            	Margin: 0;
                                                            	padding: 0;
                                                            	min-width: 100%;
                                                            	font-family: Arial, sans-serif;
                                                            	-webkit-font-smoothing: antialiased;
                                                            	mso-line-height-rule: exactly;
                                                            }
                                                            table {
                                                            	border-spacing: 0;
                                                            	color: #333333;
                                                            	font-family: Arial, sans-serif;
                                                            }
                                                            img {
                                                            	border: 0;
                                                            }
                                                            .wrapper {
                                                            	width: 100%;
                                                            	table-layout: fixed;
                                                            	-webkit-text-size-adjust: 100%;
                                                            	-ms-text-size-adjust: 100%;
                                                            }
                                                            .webkit {
                                                            	max-width: 600px;
                                                            }
                                                            .outer {
                                                            	Margin: 0 auto;
                                                            	width: 100%;
                                                            	max-width: 600px;
                                                            }
                                                            .full-width-image img {
                                                            	width: 100%;
                                                            	max-width: 600px;
                                                            	height: auto;
                                                            }
                                                            .inner {
                                                            	padding: 10px;
                                                            }
                                                            p {
                                                            	Margin: 0;
                                                            	padding-bottom: 10px;
                                                            }
                                                            .h1 {
                                                            	font-size: 21px;
                                                            	font-weight: bold;
                                                            	Margin-top: 15px;
                                                            	Margin-bottom: 5px;
                                                            	font-family: Arial, sans-serif;
                                                            	-webkit-font-smoothing: antialiased;
                                                            }
                                                            .h2 {
                                                            	font-size: 18px;
                                                            	font-weight: bold;
                                                            	Margin-top: 10px;
                                                            	Margin-bottom: 5px;
                                                            	font-family: Arial, sans-serif;
                                                            	-webkit-font-smoothing: antialiased;
                                                            }
                                                            .one-column .contents {
                                                            	text-align: left;
                                                            	font-family: Arial, sans-serif;
                                                            	-webkit-font-smoothing: antialiased;
                                                            }
                                                            .one-column p {
                                                            	font-size: 14px;
                                                            	Margin-bottom: 10px;
                                                            	font-family: Arial, sans-serif;
                                                            	-webkit-font-smoothing: antialiased;
                                                            }
                                                            .two-column {
                                                            	text-align: center;
                                                            	font-size: 0;
                                                            }
                                                            .two-column .column {
                                                            	width: 100%;
                                                            	max-width: 300px;
                                                            	display: inline-block;
                                                            	vertical-align: top;
                                                            }
                                                            .contents {
                                                            	width: 100%;
                                                            }
                                                            .two-column .contents {
                                                            	font-size: 14px;
                                                            	text-align: left;
                                                            }
                                                            .two-column img {
                                                            	width: 100%;
                                                            	max-width: 280px;
                                                            	height: auto;
                                                            }
                                                            .two-column .text {
                                                            	padding-top: 10px;
                                                            }
                                                            .three-column {
                                                            	text-align: center;
                                                            	font-size: 0;
                                                            	padding-top: 10px;
                                                            	padding-bottom: 10px;
                                                            }
                                                            .three-column .column {
                                                            	width: 100%;
                                                            	max-width: 200px;
                                                            	display: inline-block;
                                                            	vertical-align: top;
                                                            }
                                                            .three-column .contents {
                                                            	font-size: 14px;
                                                            	text-align: center;
                                                            }
                                                            .three-column img {
                                                            	width: 100%;
                                                            	max-width: 180px;
                                                            	height: auto;
                                                            }
                                                            .three-column .text {
                                                            	padding-top: 10px;
                                                            }
                                                            .img-align-vertical img {
                                                            	display: inline-block;
                                                            	vertical-align: middle;
                                                            }
                                                            @media only screen and (max-device-width: 480px) {
                                                            table[class=hide], img[class=hide], td[class=hide] {
                                                            	display: none !important;
                                                            }
                                                            .contents1 {	width: 100%;
                                                            }
                                                            .contents1 {	width: 100%;
                                                            }
                                                            </style>
                                                            <!--[if (gte mso 9)|(IE)]>
                                                            	<style type="text/css">
                                                            		table {border-collapse: collapse !important;}
                                                            	</style>
                                                            	<![endif]-->
                                                            </head>
                                                            
                                                            <body style="Margin:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;min-width:100%;background-color:#ececec;">
                                                            <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#ececec;">
                                                            	<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#ececec;" bgcolor="#ececec;">
                                                            		<tr>
                                                            			<td width="100%"><div class="webkit" style="max-width:600px;Margin:0 auto;"> 
                                                            					
                                                            					<!--[if (gte mso 9)|(IE)]>
                                                            
                                                            						<table width="600" align="center" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0" >
                                                            							<tr>
                                                            								<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                                                            								<![endif]--> 
                                                            					
                                                            					<!-- ======= start main body ======= -->
                                                            					<table class="outer" align="center" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0;Margin:0 auto;width:100%;max-width:600px;">
                                                            						<tr>
                                                            							<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;"><!-- ======= start header ======= -->
                                                            								
                                                            								<table border="0" width="100%" cellpadding="0" cellspacing="0"  >
                                                            									<tr>
                                                            										<td><table style="width:100%;" cellpadding="0" cellspacing="0" border="0">
                                                            												<tbody>
                                                            													<tr>
                                                            														<td align="center"><center>
                                                            																<table border="0" align="center" width="100%" cellpadding="0" cellspacing="0" style="Margin: 0 auto;">
                                                            																	<tbody>
                                                            																		<tr>
                                                            																			<td class="one-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing:0">
                                                            																					<tr>
                                                            																						<td>&nbsp;</td>
                                                            																					</tr>
                                                            																			 
                                                            																					<tr>
                                                            																						<td align="center">&nbsp;</td>
                                                            																					</tr>
                                                            																					<tr>
                                                            																						<td height="6" bgcolor="#008aff " class="contents" style="width:100%; border-top-left-radius:10px; border-top-right-radius:10px"></td>
                                                            																					</tr>
                                                            																				</table></td>
                                                            																		</tr>
                                                            																	</tbody>
                                                            																</table>
                                                            															</center></td>
                                                            													</tr>
                                                            												</tbody>
                                                            											</table></td>
                                                            									</tr>
                                                            								</table>
                                                            								<table border="0" width="100%" cellpadding="0" cellspacing="0"  >
                                                            									<tr>
                                                            										<td><table style="width:100%;" cellpadding="0" cellspacing="0" border="0">
                                                            												<tbody>
                                                            													<tr>
                                                            														<td align="center"><center>
                                                            																<table border="0" align="center" width="100%" cellpadding="0" cellspacing="0" style="Margin: 0 auto;">
                                                            																	<tbody>
                                                            																		<tr>
                                                            																			<td class="one-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" bgcolor="#FFFFFF"><!-- ======= start header ======= -->
                                                            																				
                                                            																				<table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                            																					<tr>
                                                            																						<td class="two-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;text-align:center;font-size:0;"><!--[if (gte mso 9)|(IE)]>
                                                            													<table width="100%" style="border-spacing:0" >
                                                            													<tr>
                                                            													<td width="20%" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                                                            													<![endif]-->
                                                            																							
                                                            																							<div class="column" style="width:100%;max-width:200px;display:inline-block;vertical-align:top;float: left; margin-left: 40px; ">
                                                            																								<table class="contents" style="border-spacing:0; width:100%"  bgcolor="#ffffff" >
                                                            	 
                                                            																						 <tr>
                                                            																										<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" align="left"><a href="#" target="_blank"><img src="https://'.$_SERVER['HTTP_HOST'].'/image/logo.png" width="94" alt="" style="border-width:0;width:200px;height:auto;display:block;" /></a></td>
                                                            																									</tr>
                                                            																								</table>
                                                            																							</div>
                                                            																							
                                                            																							<!--[if (gte mso 9)|(IE)]>
                                                            													</td><td width="80%" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                                                            													<![endif]-->
                                                            																							
                                                            																							<div class="column" style="width:100%;max-width:415px;display:inline-block;vertical-align:top;">
                                                            																								<table width="100%" style="border-spacing:0" bgcolor="#ffffff">
                                                            																								
                                                            																									<tr>
                                                            																										<td class="inner" style="padding-top:10px;padding-bottom:10px; padding-right:10px;padding-left:10px;"><table class="contents" style="border-spacing:0; width:100%" bgcolor="#FFFFFF">
                                                            																												<tr>
                                                            																													<td align="right" valign="bottom" class="text"><font style="font-size:14px; text-decoration:none; color:#5b5f65;font-family:Arial, Helvetica, sans-serif"><strong>Ahref - New Log</strong></font></td>
                                                            																												</tr>
                                                            																											</table></td>
                                                            																									</tr>
                                                            																								</table>
                                                            																							</div>
                                                            																							
                                                            																							<!--[if (gte mso 9)|(IE)]>
                                                            													</td>
                                                            													</tr>
                                                            													</table>
                                                            													<![endif]--></td>
                                                            																					</tr>
                                                            																					<tr>
                                                            																						<td align="left" style="padding-left:40px"><table border="0" cellpadding="0" cellspacing="0" style="border-bottom:2px solid #81a3e6" align="left">
                                                            																								<tr>
                                                            																									<td height="20" width="30" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                                                            																								</tr>
                                                            																							</table></td>
                                                            																					</tr>
                                                            																					<tr>
                                                            																						<td>&nbsp;</td>
                                                            																					</tr>
                                                            																				</table></td>
                                                            																		</tr>
                                                            																	</tbody>
                                                            																</table>
                                                            															</center></td>
                                                            													</tr>
                                                            												</tbody>
                                                            											</table></td>
                                                            									</tr>
                                                            								</table>
                                                            								
                                                            								<!-- ======= end header ======= --> 
                                                            								
                                                            								<!-- ======= start hero image ======= --><!-- ======= end hero image ======= --> 
                                                            								
                                                            								<!-- ======= start hero article ======= -->
                                                            								
                                                            								<table class="one-column" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing:0" bgcolor="#FFFFFF">
                                                            									<tr>
                                                            										<td align="left" style="padding:0px 40px 40px 40px"><p style="color:#5b5f65; font-size:28px; text-align:left; font-family: Verdana, Geneva, sans-serif">Hi '.$json['username'].', </p>
                                                            											<p style="color:#5b5f65; font-size:16px; text-align:left; font-family: Verdana, Geneva, sans-serif">You have a new log on (<strong>'.$row['shorturl'].'</strong>) 
                                                            												<br />
                                                            												
                                                            												You Can Manage your Domain with the Tracking code of (<strong>'.$row['track_code'].'</strong>) by inserting it <a href="https://'.$_SERVER['HTTP_HOST'].'/codetrack">here</a>.
                                                            												
                                                            												<br />
                                                            											
                                                            												<br />
                                                            												Thanks, <br />
                                                            												
                                                            												Ahref Team </p>
                                                            											
                                                            											<!-- START BUTTON -->
                                                            											
                                                            											<center>
                                                            												<table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                            													<tr>
                                                            														<td><table border="0" cellpadding="0" cellspacing="0">
                                                            																<tr>
                                                            																	<td height="20" width="100%" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                                                            																</tr>
                                                            															</table>
                                                            															<table border="0" align="center" cellpadding="0" cellspacing="0" style="Margin:0 auto;">
                                                            																<tbody>
                                                            																	<tr>
                                                            																		<td align="center"><table border="0" cellpadding="0" cellspacing="0" style="Margin:0 auto;">
                                                            																				<tr>
                                                            																					<td width="250" height="60" align="center" bgcolor="#008aff ">
                                                            																					
                                                            																					<a href="https://'.$_SERVER['HTTP_HOST'].'/login" style="width:250; display:block; text-decoration:none; border:0; text-align:center; font-weight:bold;font-size:18px; font-family: Arial, sans-serif; color: #ffffff; background:#008aff " class="button_link">Click here to View</a>
                                                            																					</td>
                                                            																				</tr>
                                                            																			</table></td>
                                                            																	</tr>
                                                            																</tbody>
                                                            															</table></td>
                                                            													</tr>
                                                            												</table>
                                                            											</center>
                                                            											
                                                            											<!-- END BUTTON --></td>
                                                            									</tr>
                                                            								</table>
                                                            								
                                                            								<!-- ======= end hero article ======= -->  
                                                            								
                                                            							<!-- ======= start footer ======= -->
                                                            								
                                                            							 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            	<tr>
                                                            		<td><table width="100%" cellpadding="0" cellspacing="0" border="0"  bgcolor="#008aff ">
                                                            		
                                                            			<tr>
                                                            				<td align="center" bgcolor="#008aff " class="one-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">&nbsp;</td>
                                                            			</tr>
                                                            			<tr>
                                                            				<td align="center" bgcolor="#008aff " class="one-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;"><table width="150" border="0" cellspacing="0" cellpadding="0">
                                                            					<tr>
                                                            						<td width="33" align="center"><a href="https://www.facebook.com/AhrefLogger" target="_blank"><img src="https://'.$_SERVER['HTTP_HOST'].'/image/facebook.png" alt="facebook" width="32" height="32" border="0"/></a></td>
                                                            						<td width="34" align="center"><a href="#" target="_blank"><img src="https://'.$_SERVER['HTTP_HOST'].'/image/twitter-logo.png" alt="twitter" width="32" height="32" border="0"/></a></td>
                                                            						<td width="33" align="center"><a href="#" target="_blank"><img src="https://'.$_SERVER['HTTP_HOST'].'/image/youtube.png" alt="linkedin" width="32" height="32" border="0"/></a></td>
                                                            					</tr>
                                                            				</table></td>
                                                            			</tr>
                                                            			<tr>
                                                            				<td align="center" bgcolor="#008aff " class="one-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">&nbsp;</td>
                                                            			</tr>
                                                            
                                                            
                                                            			<tr>
                                                            				<td align="center" bgcolor="#008aff " class="one-column" style="padding-top:0;padding-bottom:0;padding-right:10px;padding-left:10px;"><font style="font-size:13px; text-decoration:none; color:#ffffff; font-family: Verdana, Geneva, sans-serif; text-align:center">To unsubscribe from these emails, please contact us using the support section on Ahref</font></td>
                                                            			</tr>
                                                            			<tr>
                                                            				<td align="center" bgcolor="#008aff " class="one-column" style="padding-top:0;padding-bottom:0;padding-right:10px;padding-left:10px;"><font style="font-size:13px; text-decoration:none; color:#ffffff; font-family: Verdana, Geneva, sans-serif; text-align:center">© 2019  
                                                            <a href="https://'.$_SERVER['HTTP_HOST'].'" target="_blank" style="color:#ffffff; text-decoration:underline">'.$_SERVER['HTTP_HOST'].'</a> All rights reserved.</font></td>
                                                            			</tr>
                                                            			<tr>
                                                            				<td align="center" bgcolor="#008aff " class="one-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">&nbsp;</td>
                                                            			</tr>
                                                            			<tr>
                                                            				<td height="6" bgcolor="#008aff " class="contents1" style="width:100%; border-bottom-left-radius:10px; border-bottom-right-radius:10px"></td>
                                                            			</tr>
                                                            			</table></td>
                                                            	</tr>
                                                            	<tr>
                                                            		<td><table width="100%" cellpadding="0" cellspacing="0" border="0"> 
                                                            			<tr>
                                                            				<td height="6" bgcolor="#008aff " class="contents" style="width:100%; border-bottom-left-radius:10px; border-bottom-right-radius:10px"></td>
                                                            			</tr>
                                                            			<tr>
                                                            				<td>&nbsp;</td>
                                                            			</tr>
                                                            		</table></td>
                                                            	</tr>
                                                            </table>
                                                            
                                                            							 <!-- ======= end footer ======= --></td>
                                                            						</tr>
                                                            					</table>
                                                            					<!--[if (gte mso 9)|(IE)]>
                                                            					</td>
                                                            				</tr>
                                                            			</table>
                                                            			<![endif]--> 
                                                            				</div></td>
                                                            		</tr>
                                                            	</table>
                                                            </center>
                                                            </body>
                                                            </html>';
                                                         
                                                            $headers = "From: ahref<noreply@ahref.tech> \r\n";
                                                            $headers .= "MIME-Version: 1.0\r\n";
                                                            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                                                               
                                                             mail($toEmail, $subject, $content, $headers);
                                                                
                                                  
                                                  
                                                  }
                                                  
                                                  
                                                  
                                                  
                                                 //this means insert query is working perfectly and now user can redirect to orignal URL
                                                   header("Location:".$final_url, true);
                                                   exit();
                                              }
                                              else
                                              {
                                                  //problem with the Query Redirect to the main site.
                                                  header("Location:https://".$_SERVER['HTTP_HOST'], true);
                                                   exit();
                                              }
                                                                                                                                            
                                                                                                                                              
                                             }
                                          else
                                          {
                                               header('location:https://file.mockplus.com/image/2018/02/b2eaaf72-8f21-4390-b113-b5b6fc98261c.jpg');
                                                exit();
                                          }
                                                        	    
                                	    
                
                }
                
                
                
                ?>
                
                
 

                
                
                
                
                
                <form  id="main-form" method="post" >
                <?php

                	$urlinput=mysqli_real_escape_string($con,htmlentities($_POST['url'])); //long_url
             
     

                	if(isset($_POST['Shorten']))
                	{
                	    
                            $responseKey = mysqli_real_escape_string($con,htmlentities($_POST['g-recaptcha-response'])); //responce_key_callback_by_google
                            $userIP = $_SERVER['REMOTE_ADDR']; //user_ip_address
                            $google_api_url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP"; // google_api_url
                            $response = file_get_contents($google_api_url);
                            $response = json_decode($response);
                           
                	 
                		if($urlinput=='')
                		{
                		      	echo '
                                    
                                      <div class="container py-5">  
                                       
                                        <div class="alert alert-danger">  
                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                            <strong>Opps!</strong> A URL was not entered, please try again below: 
                                        </div>  
     
        
                                    </div>   ';
                		}
                	   elseif($response->success == false)
                        {
                            	echo '
                                 <div class="container py-5">  
                                       
                                        <div class="alert alert-danger">  
                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                            <strong>Opps!</strong> You Missed the Captcha, please try again below: 
                                        </div>  
     
        
                                    </div>  ';
                                
                                
                        }
                
                		else
                		{
                                  $str = $urlinput;
                                  $urlinput = preg_replace('#^https?://#', '', $str); //removing both protocols from current url
                                        
                       
                                $urlinput = strpos($urlinput, 'http')!== 0  || strpos($urlinput, 'https') !== 0 ? "http://$urlinput" : $urlinput; //adding bydefault http if user not enter protocol itself
                        	
                        		$shorturl= strtoupper(substr(md5(uniqid(mt_rand(0,9999))), 26));
                        		
                        		$track= strtoupper(substr(md5(uniqid(mt_rand(0,9999))), 27));
                        		$_SESSION['TRACK_CODE'] = $track;
                        		
                        		
                        		  //curl fetching description,title of the longurl
                                           
                                             
                                               
                                                 $url = $urlinput; 
                                                 $parts = parse_url($url);   //Array ( [scheme] => https [host] => www.electrictoolbox.com [path] => /php-extract-domain-from-full-url/ )
                                                 //print_r($parts);
                                                 $protocol = $parts[scheme]; //http:https
                                                  $domain =  $parts[host]; //www.example.com
                                             
                                                $submitted=  $protocol."://".$domain;
                                                $urlContents = file_get_contents($submitted);
                                                $dom = new DOMDocument();
                                                @$dom->loadHTML($urlContents);
                                                $titly = $dom->getElementsByTagName('title');
                                                $title=$titly->item(0)->nodeValue;
                                                
                                                $metatagarray = get_meta_tags($submitted);
                                                $description = $metatagarray["description"];
                                                
                                            
                                              //  echo "<strong>Title:</strong> $title <br/>";
                                             //   echo "<strong>Description: </strong >$description <br/>";
                        		
                        		
                        		//bit.ly
                               
                                    $login = 'o_25ed7sq0j5';
                                    $api_key = 'R_bccce5fbdd2146e3a48a7d00b2eebf29';
                                    $ch = curl_init('http://api.bitly.com/v3/shorten?login=' .$login. '&apikey=' .$api_key. '&longUrl=' . $url);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    $result = curl_exec($ch);
                                    $res = json_decode($result,true);
                                    $bitly =$res['data']['url'];               //http://bit.ly/2VaZWyV
                                    $base_url_code_bitly = basename($bitly); 
                                
                        		
                        		
                                  //tinyurl.com/ 
        
                                    
                                    
                                    	curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
                                    	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
                                    	$data = curl_exec($ch);               //http://tinyurl.com/kktcge9
                                    	curl_close($ch);  
                                        $base_url_code_tinyurl = basename($data);    
                                        
                                        
                                        
                                        
        
                                 // https://shorte.st/  
                                 
                                     $key = '320aeb0fa23c10c7ff31a8cb1f64c82d';
                                    
                                    $curl_url = "https://api.shorte.st/s/$key/$url";
                                    $ch = curl_init(); 
                                    curl_setopt($ch, CURLOPT_URL, $curl_url); 
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
                                    $results = curl_exec($ch); 
                                    curl_close($ch); 
                                    $array = json_decode($results);
                                    $shortest = $array->shortenedUrl; // http://ceesty.com/wNI4gu
                                    $base_url_code_shortest = basename($shortest);   
                                 
                                  
                        		$sql = "insert into shotner(u_id,urlinput,title,description,shorturl,track_code,bitly,tiny,shortest,date) values('".$_SESSION['u_id']."','$urlinput','$title','$description','$shorturl','".$_SESSION['TRACK_CODE']."','$base_url_code_bitly','$base_url_code_tinyurl','$base_url_code_shortest','".date('Y-m-d H:i:s')."')";
                        		$rec = mysqli_query($con,$sql);
                        		
                        			
                        		
                        		
                                    		 if($rec)
                                    		 {
                                    		         
                                                	    header('Location:track');
                                                	     exit();
                                    		     
                                    		     
                                    		 }
                                    		 else
                                    		 {
                                    		     
                                                    
                                                    echo '
                                                                    <div class="alert alert-danger">  
                                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                        <strong>Invalid Incounter!</strong>  Something is wrong with Query! Contact developer support:( 
                                                                    </div>  
                                 
                                    
                                                                ';
                                                    
                                                    
                                    		 }
                         
                       
                        		
                                }
                   
                	
                	}
                	
                	
                
                
                	
                	?>
                	
                	
                	
                
                	<div class="main-form">
                		<div class="row" id="single">
                		    
                		    	
                                
                			<div class="col-md-9 shortfieldz">
                			
                				 <img src="image/links.png" class="img-responsive zmdi zmdi-link" alt="Responsive image " width="30" height="24" /> 
                				<input type="text" class="form-control main-input" onclick="In_ShowPosInfo()" id='myInput' name="url" value="" placeholder="Paste a long url" /> 
                		
                							
                						  
                			</div>
                			<div class="col-md-3 shortbtnz">
                				<input class="btn btn-default btn-block main-button"  type="submit"   name="Shorten" value="Shorten">
                				<!--<button class="btn btn-primary btn-block main-button" id="copyurl" type="button">Copy</button>-->
                			</div>
                			
                			
                		</div>
                			</div>
                
                	             


                
                   
                 <div class="call-to-action  text-center" style="margin:0px;">
                  
                   <div align="center" class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
                      
                </div>  
                	    
                   
                </form><!--/.form-->  
                </div>  
                

                   
         
                		
                		
                		
                      </div>
                    </div>
                  </div>  
                </section>

                	
                      <section class="infinity-stats">
                          <div class="container">
                            <div class="row stats">
                              <div class="col-xs-6">
                        		<div class="infinity-facts">
                        			<i class="zmdi zmdi-link"></i>
                        			<p>URLs Created</p>
                        			<h3>
                        			     	<?php
					
                        					$sql_prepare = 'SELECT * FROM shotner';
                                              $stmt = $con->prepare($sql_prepare); 
                                            $stmt->execute();
                                            $stmt->store_result();
                                            echo $numberofrows =  number_format($stmt->num_rows);
                                            $stmt->close();
                                        ?>
                        			
                        			
                        			
                        			
                        			</h3>
                        		</div>
                              </div>
                        
                              
                              <div class="col-xs-6">
                        		<div class="infinity-facts">
                        			<i class="zmdi zmdi-mouse"></i>
                        			<p>logs Served</p>
                        			<h3>
                        			    
                        			   	<?php
					
                        					$sql_prepare = 'SELECT * FROM tracking_data';
                                            $stmt = $con->prepare($sql_prepare); 
                                            $stmt->execute();
                                            $stmt->store_result();
                                            echo $numberofrows =  number_format($stmt->num_rows);
                                            $stmt->close();
                                        ?>
                        			    
                        			    </h3>
                        		</div>
                              </div>
                        
                            </div>
                          </div>
                        </section>     
            


            <section class="light">
                <div class="container">
                  <div class="row featurette">
            	  <h2 class="center">
            		One short link, infinite possibilities.	  </h2>
            	  <p class="text-center featureP">
                    A short link is a powerful marketing tool when you use it carefully. It is not just a link but a medium between your customer and their destination. A short link allows you to collect so much data about your customers and their behaviors.      </p>
                    <div class="col-sm-4">
                      <div class="feature-img" style="background-image:url(image/expander1.png)"></div>
                      <h3>Domain Expander</h3>
                      <p>Expand your short link and see what's its orignal domain</p>
                    </div>
                    <div class="col-sm-4">
                      <div class="feature-img" style="background-image:url(image/globe.png)"></div>
                      <h3>Geotarget</h3>
                      <p>Geotarget your links to redirect visitors to specialized pages and increase your click conversion.</p>
                    </div>      
                    <div class="col-sm-4">
                      <div class="feature-img" style="background-image:url(image/changer1.png)"></div>
                      <h3>Domain Changer</h3>
                      <p>Mask your links so that nobody finds whats inside it.</p>
                    </div>
                  </div>    
                </div>
              </section>
              <section id="more">
                <div class="container">
                  <div class="row feature" id="infinity-feature">
                    <div class="col-sm-7 image">
                      <img src="image/stats.png" alt="Complete Analytics">
                    </div>
                    <div class="col-sm-5 info">
                      <h2>
                        <small>Complete Analytics</small>
                        Track each and every user who clicks a link.          </h2>
            		  <div class="feature-border"></div>
                      <p>
                        Our system allows you to track everything. Whether it is the amount of clicks, the country or the referrer, the data is there.          </p>
                    </div>      
                  </div>      
                </div>
              </section>
              <section>
                <div class="container">
                  <div class="row feature" id="infinity-feature">
                    <div class="col-sm-5 info">
                      <h2>
                        <small>Powerful Dashboard</small>
                        One dashboard to manage everything.          </h2>
            		  <div class="feature-border"></div>
                      <p>
                        Our dashboard lets you control everything. Manage your URLs, create bundles, manage your splash pages and your settings, all from the same dashboard.          </p>
                    </div>
                    <div class="col-sm-7 image">
                      <img src="image/dashboard.png" alt="Powerful Dashboard">
                    </div>
                  </div>         
                </div> 
              </section>
         
            
      <! ========================  
    features offered     
  ========================  !>
<div id="generic_price_table">   

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--PRICE HEADING START-->
                    <div class="price-heading clearfix">
                         <h1 class="center">	Plans</h1>
                    </div>
                    <!--//PRICE HEADING END-->
                </div>
            </div>
        </div>
         <section id="pricePlans">
		<ul id="plans">
			<li class="plan">
				<ul class="planContainer">
					<li class="title"><h2>No Account</h2></li>
					<li class="price"><p>$ 0 .00 /Guest</p></li>

					<li>
						<ul class="options">
							<li>Logs IP addresses <span></span></li>
							<li>Log country <span></span></li>
							<li>Log Useragent<span></span></li>
							<li>Log hostname <span></span></li>
							<li>Log ISP<span></span></li>
							<li>Device <span></span></li>
							<li>Os<span></span></li>
							
						</ul>
					</li>
					<a href="register"></br></br></br></a>
				</ul>
			</li>

			<li class="plan">
				<ul class="planContainer">
					<li class="title"><h2 class="bestPlanTitle">Free Account </h2></li>
					<li class="price"><p class="bestPlanPrice">$ 0 .00 /User</p></li>
					<li>
						<ul class="options">
							<li>Email Notifications<span></span></li>
							<li>Auto saved tracking code<span></span></li>
							<li>Logs IP addresses<span></span></li>
							<li>Log country<span></span></li>
							<li>Log Useragent<span></span></li>
							<li>Log hostname <span></span></li>
							<li>Log ISP<span></span></li>
							<li>Device<span></span></li>
							<li>Os<span></span></li>
						</ul>
					</li>
						<li class="button"><a href="https://<?php echo $_SERVER['HTTP_HOST'];?>/register">SIGN UP</a></li>
				</ul>
			</li>

			

		</ul> <!-- End ul#plans -->
	</section>
         
    
</div>   


<section class="light">
                <div class="container">
                  <div class="row featurette">
            	  <h2 class="center">
            		URL'S	  </h2>
            	  <p class="text-center featureP" style="font-size:18px;">
                  This is the list of the current URL's that you can disguise your link as.   
                  </br><small>Please keep in mind that any of these links (except for ahref.tech) can change or be removed at any time.</small></p>
                <div class="col-md-6"  > 
                
                     <div class="list-group">
                      <button type="button" class="list-group-item list-group-item-action active" style="background-color:#007feb;padding:20px;font-size:18px;">
                       Available extra Url's
                       
                      </button>
                      
                         <?php
                                                                 
                                                                
                                                                
                                                                //category
                                                                $domain = 'domain';
                                                             
                                                                
                                                             //sql_query 1 for main category      
                                                                
                                                            	$sql1 = 'SELECT bundle,sub FROM bundles WHERE cat = ? && sub =1';
                                    					        $st1 = $con->prepare($sql1); 
                                                                $st1->bind_param('s', $domain);
                                                                $st1->execute();
                                                                $st1->bind_result($domains,$attribute);
                                                                $json1 = array();
                                                                    
                                                              while($st1->fetch())
                                                              {
                                                                                $json1 = array('domains'=>$domains,'attribute'=>$attribute);
                                                                              
                                                                         
                                                            
                                                                      ?>
                                                               
                                                       
                                                   
                                                         
                                                             
                                                               <a class="list-group-item list-group-item-action" style="padding:20px;cursor:pointer;font-size:18px;"><i class="fas fa-link"></i> <?php    echo $json1['domains']; ?></a>
                                                              
                                                        
                                                        
                                                                    <?php
                                                              }
                                                                
                                                                	$st1->close(); //close 1
                                                                
                                                                ?>
                      
                      
                    
                      </div>
             </div>   
                 <div class="col-md-6"  > 
                
                     <div class="list-group">
                      <button type="button" class="list-group-item list-group-item-action active"  style="background-color:#007feb;padding:20px;font-size:18px;">
                       Guidelines</br>Please respect the following Guidelines while using this service.
                      </button>
                      <button type="button" class="list-group-item list-group-item-action"  style="padding:20px;font-size:18px;">No links to malicious websites.</button>
                      <button type="button" class="list-group-item list-group-item-action" style="padding:20px;font-size:18px;">No adult material.</button>
                   
                      </div>
             </div>   
                  </div>    
                </div>
              </section>

        
         
            
            <section class="infinity-cta">
            	<div class="container">
            		<div class="row stats">
            			<h2 class="center">
            			The Ultimate URL Shortener that's simple,<br>powerful, and easy.			</h2>
            			<p>
            			Unleash the Power of the Link			</p>
            			<div class="col-md-12">
            				<a href="register" class="infbtn">Get Started</a>
            			</div>
            		</div>
            	</div>
            </section>            






  <?php include 'pages/footer.php';?>  

  <?php include 'pages/jquery.php';?>  
  <script src='https://www.google.com/recaptcha/api.js'></script>
	</body>


</html>