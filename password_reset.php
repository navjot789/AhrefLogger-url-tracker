<?php
session_start();
include "connection/connect.php";
$get_ext_token = mysqli_real_escape_string($con, htmlspecialchars($_GET["external_token"]));
      
	if(!empty($get_ext_token))
	{
	
	
                		 
                		   
                		   $stmts = $con->prepare('SELECT username,token,upd_d FROM users WHERE token = ?');
                                		    $stmts->bind_param('s', $get_ext_token);
                                        	$stmts->execute();
                                        	
                                        	$stmts->bind_result($username,$ext_token_fetch,$date);
                                            $json = array();
                                             
                                        if($stmts->fetch()) 
                                         {
                                            $json = array('username'=>$username,'token'=>$ext_token_fetch,'password_updation_date'=>$date);
                                    
                                            }
                                        	
                                    
                		   
                		   
	
	
	  	if($json['token']==$get_ext_token) 
           	{
                            			    
	
                		 
                            $creation_date = $json['password_updation_date']; //user creation date
                
                            //display the converted time added +3 hr
                            $expire_date = date('Y-m-d H:i',strtotime('+3 hour',strtotime($creation_date)));
                            //Times can be entered in a readable way:
                            
                            //+1 day = adds 1 day
                            //+1 hour = adds 1 hour
                            //+10 minutes = adds 10 minutes
                            //+10 seconds = adds 10 seconds
                            //To sub-tract time its the same except a - is used instead of a +
                            
                            
                             $now = date("Y-m-d H:i:s"); //current date_time
                            
                            
                        
                        if($now>$expire_date) {
                            //expired link
                            
                             header('location:https://ahref.tech/confirm/5'); 
                             
                              
                        }
                        else
                        { 
                            //still have a time out of 3hr
                            //showing user password change form
                                     
                            		 $password = mysqli_real_escape_string($con, htmlspecialchars($_POST["password"]));
                            		 $c_password = mysqli_real_escape_string($con, htmlspecialchars($_POST["c_password"]));
                            		 
                            		if(isset($_POST["password_submit"]))
                            		{
                            		  
                            		       
                            		  
                            		  
                            		  
                            		  
                            		  if (empty($password) ||  empty($c_password) ) 
                            		  {
                	                    // Could not get the data that should have been sent.
                	
                                    		$error = ' <div class="alert alert-danger">  
                                                         <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                                            <strong>Empty Fields!</strong> Both fields cannot be empty. 
                                                                                                        </div>  ';
                                        }
                                        elseif(strlen($password) < 6 || strlen($c_password) < 6)  //cal password length
                	                    {
            	
                                         $error='    <div class="alert alert-danger">  
                                                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                        <strong>Opps!</strong> Password is too short, Must be More than 6 Charactors. 
                                                                                    </div>  ';	    
            		
                                    	}
                                    	elseif($password !== $c_password)
                                    	{
                                    	       $error='    <div class="alert alert-danger">  
                                                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                        <strong>Miss-match!</strong> Password confirmation doesnt match the password. 
                                                                                    </div>  ';	    
                                    	}
                                    	else
                                    	{
                                    	    include "connection/connect.php";
                                    	    $encrypt_password = password_hash($c_password, PASSWORD_DEFAULT);
                                           
                                                    	  
                                                    	  
                                            $stmt = $con->prepare('UPDATE users SET password = ? WHERE token = ? ');
                                		    $stmt->bind_param('ss',$encrypt_password,$get_ext_token);
                                        
                                		   
                                                        
                                                        if(	$stmt->execute())
                                                        {
                                                           $success='    <div class="alert alert-success text-center">  
                                                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                        <strong>Password Changed!</strong> update successfully. 
                                                                                    </div>  ';	   
                                                            
                                                        }
                                                        else
                                                        {
                                                             $error='    <div class="alert alert-danger text-center">  
                                                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                        <strong>SQL ERROR:</strong> Contact developer. 
                                                                                    </div>  ';	    
                                                        }
                                                        
                                                $stmt->close();         
                                    	}
                                    	
                            		  
                            		                          
                     }
                            		
                            		
                            		
                            		
                            		
                            			
                            		$password_changer_form	='<section class="under-head-cont">
                            		
                                            	<div class="container">    
                                            		<div class="centered form">  
                                            		
                                            			'.$error.' '.$success.'
                                            			 
                                            			<form role="form" class="live_form form" id="login_form" method="post" > 
                                            				<p class="title">Change password for @'.$json['username'].'</p>  
                                            				
                                            			
                                            			
                                            				<div class="form-group">
                                            					<input type="password" class="form-control"  placeholder="New password" name="password" autofocus >
                                            				<i class="zmdi zmdi-dialpad"></i>
                                            				</div>
                                            				
                                            				<div class="form-group">
                                            					<input type="password" class="form-control"  placeholder=" Re-password" name="c_password" autofocus >
                                            				<i class="zmdi zmdi-dialpad"></i>
                                            				</div>
                                            				
                                            				
                                            				
                                            		
                                            				
                                            				
                                            				<div class="form-group text-center">
                                            				
                                            					<button type="submit" name="password_submit" class="mdbtn btn btn-primary ">Change Password</button>
                                            				</div>                  
                                            
                                            								
                                            					<hr>
                                            					<p class="info-row">
                                                					<span>Once done,</span>
                                                					<a href="https://ahref.tech/login" class="register-link">Click Here</a> <span>to login.</span>
                                                				</p>
                                            			
                                            							</form>  
                                            
                                            		       
                                            		</div>
                                            	</div>
                                            	 
                                                 
                                                 		
                                            </section>' ;
                            		
                            		
                           
                        }
		 
		
           	}
           else 
            {
                 header('location:https://ahref.tech/confirm/3');  //token not matched
            }
          	
	}
	else
	{
	
	      
   			
                if (isset($_POST['submit']))
                {
                        	$email = $_POST['email'];
                	
                // Now we check if the data from the entered email in the form was submitted, isset() will check if the data exists.
                if (empty($email) ) {
                	// Could not get the data that should have been sent.
                	
                		$error = ' <div class="alert alert-danger">  
                                     <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                        <strong>Empty Fields!</strong> Please enter your email. 
                                                                                    </div>  ';
                }
                
                // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
                  else  if ($stmt = $con->prepare('SELECT email FROM users WHERE email = ?') ) 
                  
                    {
                    	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
                    	$stmt->bind_param('s', $email);
                    	$stmt->execute();
                    	// Store the result so we can check if the account exists in the database.
                    	$stmt->store_result();
                    	
                    	
                    	if ($stmt->num_rows > 0) 
                    	{
                    	$stmt->bind_result($email_fetch);
                    	$stmt->fetch();
                    	// Account exists
                    
                    	
                            	
                            	if(!empty($email_fetch))
                                {   
                                    //updating token
                                            $now = date("Y-m-d H:i:s");
                                            $token =  md5(uniqid(rand(), TRUE));
                                		    $stmt = $con->prepare('UPDATE users SET token = ?,upd_d = ? WHERE email = ?');
                                		    $stmt->bind_param('sss', $token,$now,$email_fetch);
                                        	$stmt->execute();
                                		    $stmt->close();
                                		    
                                	  //fetching token
                                	  
                                		    $stmts = $con->prepare('SELECT token FROM users WHERE token = ?');
                                		    $stmts->bind_param('s', $token);
                                        	$stmts->execute();
                                        	
                                        	$stmts->bind_result($token);
                                            $json = array();
                                             
                                        if($stmts->fetch()) 
                                         {
                                            $json = array('token'=>$token);
                                    
                                            }
                                        	
                                    
                                             $token_id = $json['token'];
                                             $link="https://$_SERVER[HTTP_HOST]"."/password_reset/" .$token_id;
                                             
                                                $toEmail = $email_fetch;
                                                $subject = "[Ahref] Please rest your Password";
                                                
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
                                                            																										<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" align="left"><a href="#" target="_blank"><img src="https://ahref.tech/image/logo.png" width="94" alt="" style="border-width:0;width:200px;height:auto;display:block;" /></a></td>
                                                            																									</tr>
                                                            																								</table>
                                                            																							</div>
                                                            																			</td>
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
                                                            										<td align="left" style="padding:0px 40px 40px 40px">
                                                            										    
                                                            										   
                                                            											<p style="color:#5b5f65; font-size:16px; text-align:left; font-family: Verdana, Geneva, sans-serif">We heard that you lost your Ahref password. Sorry about that!
                                                            												<br />
                                                            												
                                                            											 But don’t worry! You can use the following link to reset your password:
                                                            											 <br /><br />
                                                            											  '.$link.'
                                                            											 	 <br /><br />
                                                            											 
                                                                                                           if you don’t use this link within 3 hours, it will expire.</br>
                                                                                                           To get a new password reset link, visit <a href="https://ahref.tech/password_reset">here</a>
                                                            											 
                                                            												
                                                            												<br />
                                                            											
                                                            												<br />
                                                            												Thanks, <br />
                                                            												
                                                            												Ahref Team </p>
                                                            											
                                                            										</td>
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
                                                            						<td width="33" align="center"><a href="https://www.facebook.com/AhrefLogger" target="_blank"><img src="https://ahref.tech/image/facebook.png" alt="facebook" width="32" height="32" border="0"/></a></td>
                                                            						<td width="34" align="center"><a href="#" target="_blank"><img src="https://ahref.tech/image/twitter-logo.png" alt="twitter" width="32" height="32" border="0"/></a></td>
                                                            						<td width="33" align="center"><a href="#" target="_blank"><img src="https://ahref.tech/image/youtube.png" alt="linkedin" width="32" height="32" border="0"/></a></td>
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
                                                            <a href="https://ahref.tech" target="_blank" style="color:#ffffff; text-decoration:underline">ahref.tech</a> All rights reserved.</font></td>
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
                                             
                                                $headers = "From: ahrefs<noreply@ahrefs.tech> \r\n";
                                                $headers .= "MIME-Version: 1.0\r\n";
                                                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                                                
                                                mail($toEmail, $subject, $content, $headers);
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                		     $stmts->close();
                                		    
                                }
                            		
                               
                                    $success = ' <div class="alert alert-success">  
                                                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                        <strong>Done</strong> Check your email for a link to reset your password. If it doesn’t appear within a few minutes, check your spam folder. 
                                                                                    </div>  ';  
                                      
                                      
                            	
                            
                        } 
                    else {
                    	$error = ' <div class="alert alert-danger">  
                                                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                        <strong>Invalid email! </strong> sorry we cant find that email. 
                                                                                    </div>  ';
                        }
                    $stmt->close();
                    	
                    	
                    }
                }


}
?>


<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
  
 <?php include 'pages/head.php';?>
 
  <div id="focus-overlay"></div>
  <body id="body">
  


<?php
	if(empty($get_ext_token))
	{
?>

<section class="under-head-cont">
	<div class="container">    
		<div class="centered form">      
			 <?php
			 if(isset($error))
			 {
			      echo $error; 
			 }
			 	 if(isset($success))
			 {
			      echo $success; 
			 }
			 	 ?>
			 
			<form role="form" class="live_form form" id="login_form" method="post" action=""> 
				<p class="title">Reset your password</p>  
				
			
				<label for="email_field">Enter your email address and we will send you a link to reset your password.</label>
				</br></br>
			
				<div class="form-group">
					<input type="email" class="form-control" id="email" placeholder="Enter your email Address" name="email" autofocus >
				<i class="fas fa-at" style="        color: #aaa;
                                                    font-size: 17px;
                                                    position: absolute;
                                                    margin-top: -28px;
                                                    transition: all 0.2s ease-in;
                                                    left: 15px;
                                                    pointer-events: none;"></i>
				</div>
				
				
				
		
				
				
				<div class="form-group text-center">
				
					<button type="submit" name="submit" class="mdbtn btn btn-primary ">Send password reset email</button>
				</div>                  

						<hr>
								<p class="info-row">
                                				
                                					<a href="login" class="register-link">Go back</a>
                                				</p>			
							
			
							</form>  

		       
		</div>
	</div>
	 
     
     		
</section>

<?php
}
else
{
   if($json['token']==$get_ext_token)
   {
        
    echo $password_changer_form;
   }
}
?>










	<?php include 'pages/jquery.php';?>


	</body>

</html>
