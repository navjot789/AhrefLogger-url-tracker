 <?php
    include 'connection/connect.php';
           
                    
    
    $submit = mysqli_real_escape_string($con, htmlspecialchars($_POST['submit']));
 
    if($submit)
    {
        
						
    $username = mysqli_real_escape_string($con, htmlspecialchars($_POST['username']));
    $email = mysqli_real_escape_string($con, htmlspecialchars($_POST['email']));
    $password = mysqli_real_escape_string($con, htmlspecialchars($_POST['password']));
    $terms = mysqli_real_escape_string($con, htmlspecialchars($_POST['terms']));
						
						
						    $responseKey = mysqli_real_escape_string($con,htmlentities($_POST['g-recaptcha-response'])); //responce_key_callback_by_google
                            $userIP = $_SERVER['REMOTE_ADDR']; //user_ip_address
                            $google_api_url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP"; // google_api_url
                            $response = file_get_contents($google_api_url);
                            $response = json_decode($response);
						
						
						
						
						
        
         if(!empty($username) && !empty($email) && !empty($password))
         {
                 
                   
                                                                           //now lets check if user email in use
                    $query = mysqli_query($con,"select u_id from users where email = '".$email."' ");
                    $row=mysqli_num_rows($query);
                    
                    $query1 = mysqli_query($con,"select u_id from users where username = '".$username."' ");
                    $row1=mysqli_num_rows($query1);
       
      
       
                  if (strpos($username, ' ') > 0) {
                      
                         $error='    <div class="alert alert-danger">  
                                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                        <strong>Invalid!</strong> Try username without spaces. 
                                                                    </div>  ';	
                    } 
                                   
                elseif($row1 > 0)
                 {
        	         
                               $error='    <div class="alert alert-danger">  
                                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                        <strong>Opps!</strong> username is already in use, Pick different one. 
                                                                    </div>  ';	  
                                
                                
                  }
                elseif($row > 0)
                 {
        	         
                                
                          $error='    <div class="alert alert-danger">  
                                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                        <strong>Opps!</strong> Email is already in use, Pick different one. 
                                                                    </div>  ';	  
                                
                  }  
                elseif(strlen($password) < 6)  //cal password length
                	{
            	
            		
            		
                                
                         $error='    <div class="alert alert-danger">  
                                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                        <strong>Opps!</strong> Password is too short, Must be More than 6 Charactors. 
                                                                    </div>  ';	    
            		
                	}
               elseif(empty($terms) && $terms=="")
                    {
                                    
                         $error='    <div class="alert alert-danger">  
                                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                        <strong>Opps!</strong> Terms & conditions are Not checked. 
                                                                    </div>  ';	
                    }
            elseif($response->success == false)
                    {
                        
                              $error='
                             
                                        <div class="alert alert-danger">  
                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                            <strong>Opps!</strong> You Missed the Captcha, please try again below: 
                                        </div>  ';
                                
                                
                    }
                 else 
                 {
                      $encrypt_passwords = password_hash($password, PASSWORD_DEFAULT);
                      $token =  md5(uniqid(rand(), TRUE));
                    
                    $sql =mysqli_query($con,"insert into users(username,password,email,tos,token,date) values('".$username."','".$encrypt_passwords."','".$email."','".$terms."','".$token."','".date("Y-m-d H:i:s")."')");
        	        
                      // then lets send user verification link to their email using the phpmailer function
                      
                         if(!empty($sql))
                         {
                                
                                $query = mysqli_query($con,"select token from users where token = '".$token."' ");
                                $token_id=mysqli_fetch_array($query);
                                
                            
                                       $token_id = $token_id['token'];
                                       $link="https://$_SERVER[HTTP_HOST]"."/activate?token=" .$token_id;
                                        
                                        $toEmail = $email;
                                        $subject = "Confirm your e-mail address";
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
                                                        .contents1 {
                                                        	width: 100%;
                                                        }
                                                        .contents1 {
                                                        	width: 100%;
                                                        }
                                                        </style>
                                                        <!--[if (gte mso 9)|(IE)]>
                                                        	<style type="text/css">
                                                        		table {border-collapse: collapse !important;}
                                                        	</style>
                                                        	<![endif]-->
                                                        </head>
                                                        
                                                        <body style="Margin:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;min-width:100%;background-color:#f3f2f0;">
                                                        <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#f3f2f0;">
                                                          <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f3f2f0;" bgcolor="#f3f2f0;">
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
                                                                                              <td class="one-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" bgcolor="#FFFFFF"><!-- ======= start header ======= -->
                                                                                                
                                                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#f3f2f0">
                                                                                                  <tr>
                                                                                                    <td class="two-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;text-align:left;font-size:0;" ><!--[if (gte mso 9)|(IE)]>
                                                        													<table width="100%" style="border-spacing:0" >
                                                        													<tr>
                                                        													<td width="20%" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:30px;" >
                                                        													<![endif]-->
                                                                                                      
                                                                                                      <div class="column" style="width:100%;max-width:80px;display:inline-block;vertical-align:top;">
                                                                                                        <table class="contents" style="border-spacing:0; width:100%"  >
                                                                                                          <tr>
                                                                                                            <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:5px;" align="left"><a href="#" target="_blank"><img src="https://ahref.tech/image/logo.png" alt="" width="60" height="60" style="border-width:0; width:200px;height:auto; display:block" align="left"/></a></td>
                                                                                                          </tr>
                                                                                                        </table>
                                                                                                      </div>
                                                                                                      
                                                                                                      <!--[if (gte mso 9)|(IE)]>
                                                        													</td><td width="80%" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                                                        													<![endif]-->
                                                                                                      
                                                                                                      <div class="column" style="width:100%;max-width:518px;display:inline-block;vertical-align:top;">
                                                                                                        <table width="100%" style="border-spacing:0" cellpadding="0" cellspacing="0" border="0" >
                                                                                                          <tr>
                                                                                                            <td class="inner" style="padding-top:0px;padding-bottom:10px; padding-right:10px;padding-left:10px;"><table class="contents" style="border-spacing:0; width:100%" cellpadding="0" cellspacing="0" border="0">
                                                                                                                <tr>
                                                                                                                  <td align="left" valign="top">&nbsp;</td>
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
                                                                        
                                                                        <table class="one-column" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing:0; border-left:1px solid #e8e7e5; border-right:1px solid #e8e7e5; border-bottom:1px solid #e8e7e5; border-top:1px solid #e8e7e5" bgcolor="#FFFFFF">
                                                                          <tr>
                                                                            <td align="left" style="padding:50px 50px 50px 50px"><p style="color:#262626; font-size:24px; text-align:left; font-family: Verdana, Geneva, sans-serif"><strong>Hey '.$username.'</strong>,</p>
                                                                              <p style="color:#000000; font-size:16px; text-align:left; font-family: Verdana, Geneva, sans-serif; line-height:22px ">Thank you for signing up for ahref! To start creating new account, you first need to confirm your e-mail address. Click the button to activate your account or copy and paste the link in your Browser in case if button not works.<br /><br />
                                                                              <strong> Note: This link is valid for 4 hour.</strong>
                                                                                <br />
                                                                                <br />
                                                                              </p>
                                                                              <table border="0" align="left" cellpadding="0" cellspacing="0" style="Margin:0 auto;">
                                                                                <tbody>
                                                                                  <tr>
                                                                                    <td align="center"><table border="0" cellpadding="0" cellspacing="0" style="Margin:0 auto;">
                                                                                        <tr>
                                                                                          <td width="250" height="60" align="center" bgcolor="#008aff" style="-moz-border-radius: 30px; -webkit-border-radius: 30px; border-radius: 30px;"><a  href="'.$link.'" style="width:250; display:block; text-decoration:none; border:0; text-align:center; font-weight:bold;font-size:18px; font-family: Arial, sans-serif; color: #ffffff" class="button_link">Confirm<img src="https://gallery.mailchimp.com/fdcaf86ecc5056741eb5cbc18/images/582dc751-b0fc-4769-ad74-35932c7594dd.png" width="32" height="17" style="padding-top:5px" alt="" border="0"/></a></td>
                                                                                        </tr>
                                                                                      </table></td>
                                                                                  </tr>
                                                                                </tbody>
                                                                              </table>
                                                                              <p style="color:#000000; font-size:16px; text-align:left; font-family: Verdana, Geneva, sans-serif; line-height:22px "><br />
                                                                                <br />
                                                                                <br />
                                                                                <br />
                                                                                <br />
                                                                                Direct link:<span style="color:#008aff;">'.$link.'</span>
                                                                                <br />
                                                                                 <br />
                                                                                Best Regards, <br />
                                                                                ahref team</p></td>
                                                                          </tr>
                                                                        </table>
                                                                        
                                                                        <!-- ======= end hero article ======= --> 
                                                                        
                                                                        <!-- ======= start footer ======= -->
                                                                        
                                                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                          <tr>
                                                                            <td height="30">&nbsp;</td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td class="two-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;text-align:center;font-size:0;"><!--[if (gte mso 9)|(IE)]>
                                                        													<table width="100%" style="border-spacing:0" >
                                                        													<tr>
                                                        													<td width="60%" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                                                        													<![endif]-->
                                                                              
                                                                              <div class="column" style="width:100%;max-width:350px;display:inline-block;vertical-align:top;">
                                                                                <table class="contents" style="border-spacing:0; width:100%">
                                                                                  <tr>
                                                                                    <td width="39%" align="right" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;"><a href="#" target="_blank"><img src="https://ahref.tech/image/logo.png" alt="" width="59" height="59" style="border-width:0; width:100px;height:auto; display:block; padding-right:20px" /></a></td>
                                                                                    <td width="61%" align="left" valign="middle" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;"><p style="color:#787777; font-size:13px; text-align:left; font-family: Verdana, Geneva, sans-serif">&copy; 2019 ahref.tech <br />
                                                                                        All rights reserved.</p></td>
                                                                                  </tr>
                                                                                </table>
                                                                              </div>
                                                                              
                                                                              <!--[if (gte mso 9)|(IE)]>
                                                        													</td><td width="40%" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" > 								<![endif]-->
                                                                              
                                                                              <div class="column" style="width:100%;max-width:248px;display:inline-block;vertical-align:top;">
                                                                                <table width="100%" style="border-spacing:0">
                                                                                  <tr>
                                                                                    <td class="inner" style="padding-top:0px;padding-bottom:10px; padding-right:10px;padding-left:10px;"><table class="contents" style="border-spacing:0; width:100%">
                                                                                        <tr>
                                                                                          <td width="32%" align="center" valign="top" style="padding-top:10px"><table width="150" border="0" cellspacing="0" cellpadding="0">
                                                                                              <tr>
                                                                                                <td width="33" align="center"><a href="https://www.facebook.com/AhrefLogger" target="_blank"><img src="https://ahref.tech/image/facebook.png" alt="facebook" width="36" height="36" border="0" style="border-width:0; max-width:36px;height:auto; display:block; max-height:36px"/></a></td>
                                                                                                <td width="34" align="center"><a href="#" target="_blank"><img src="https://ahref.tech/image/youtube.png" alt="twitter" width="36" height="36" border="0" style="border-width:0; max-width:36px;height:auto; display:block; max-height:36px"/></a></td>
                                                                                                
                                                                                              </tr>
                                                                                            </table></td>
                                                                                        </tr>
                                                                                      </table></td>
                                                                                  </tr>
                                                                                </table>
                                                                              </div>
                                                                              
                                                                              <!--[if (gte mso 9)|(IE)]> 	</td> 											</tr> </table> 									<![endif]--></td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td height="30">&nbsp;</td>
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
                                                        </html> ';
                                     
                                        $headers = "From: ahrefs<noreply@ahrefs.tech> \r\n";
                                        $headers .= "MIME-Version: 1.0\r\n";
                                        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                                           


                                              
                                             if(mail($toEmail, $subject, $content, $headers)) 
                                             {
                                                
                                                                                             
                                                                                             
                                                		
                                                                    
                                                                                         
                                                 $success='    <div class="alert alert-success">  
                                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                        <strong>Success.</strong> Thank you For registering with us, check your 
                                                                                             email to activate your account. Dont forget to check spam folder. 
                                                                    </div>  ';	
                                                                    
        	                                 } 
        	                                 else
        	                                 {
        	                                    
        	                                    
                                                                    
                                                                      
                                                 $error='    <div class="alert alert-danger">  
                                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                        <strong>Opps!</strong>unable to send email, Try again later. 
                                                                    </div>  ';		
        	                                 }
                                
                         }
                }
        
         }
        
          else
            {
                  
                     
                     $error='    <div class="alert alert-danger">  
                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                            <strong>Opps!</strong> You forget to enter data, please try again below: 
                                        </div>  ';		
             }
       
    }
	
	?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
  
  <?php include 'pages/head.php';?>
  
  <div id="focus-overlay"></div>
  <body class='dark' id="body">
    <a href="#body" id="back-to-top"><i class="zmdi zmdi-chevron-up"></i></a>
    
    <?php include 'pages/header.php';?>  
  <?php include 'pages/m_header.php';?>  
  
  		    
              
              
<section class="under-head-cont">
	<div class="container"> 
		<div class="centered form">    
		
		
         	 <?php 
         	 if(isset($error))
         	 {echo $error;}
         	if(isset($success))
			{echo $success;}?> 

			<form role="form" class="live_form" id="login_form" method="post" action="">
			   
				<p class="title">Get Started</p>
				<div class="form-group">
					<input type="text" class="form-control" id="name" placeholder="Username" name="username" autofocus>
					<i class="zmdi zmdi-account"></i>
				</div>        
				<div class="form-group">
					<input type="email" class="form-control" id="email" placeholder="Email address" name="email">
					<i class="zmdi zmdi-email"></i>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" id="pass" placeholder="Password" name="password">
					<i class="zmdi zmdi-dialpad"></i>
				</div>     
				 
			     
						
							
							<div class="social">
        					
        								<div align="center" class="g-recaptcha" data-sitekey="6LdS7KwZAAAAAE3iQVoeFZxfBiMKpVrPucd83rdg"></div>
        								</div>
        								
        								
        								
        									            
				<div class="form-group">
					<div class="round-check">
						<input type="checkbox" name="terms" value="1" id="round-checkbox"> 
						<label for="round-checkbox">I agree to the <a href="tos" target="_blank">terms and conditions</a>.</label>
					</div>
				</div>     
        								
        									<input  type="submit" name="submit" class="mdbtn btn btn-primary width100" value="Create account" >
							
								<hr>
												<p class="info-row">
					<span>Already Have an account?</span>
					<a href="login.php" class="register-link">Click Here</a>
				</p>
				 
			</form>        
		</div>
	</div>

</section>           
 
		
<?php include 'pages/jquery.php';?>
 <script src='https://www.google.com/recaptcha/api.js'></script>
	</body>


</html>