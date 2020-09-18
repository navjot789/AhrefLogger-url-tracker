 <?php
            	            $name=mysqli_real_escape_string($con,htmlentities($_POST['r_name'])); 
                	    	$email=mysqli_real_escape_string($con,htmlentities($_POST['r_email'])); 
                			$message=mysqli_real_escape_string($con,htmlentities($_POST['r_message'])); 
             
     

                	if(isset($_POST['reply']))
                	{
                	    
                        
                	 
                		if(empty($name) || empty($email) || empty($message))
                		{
                		     	$error =  '
                                 
                                       
                                        <div class="alert alert-danger">  
                                            <button type="button" class="close" data-dismiss="alert" style="top:10px;">×</button>  
                                            <strong>Opps!</strong> all fields are required, please try again below: 
                                        </div>   ';
                		}
                	  
                        else
                        {
                                 
                                                        
                               
                               
                                                            $toEmail = $email;
                                                         
                                                            $subject = "Ahref Help Center";
                                                            $content = '
                                                            
                                                            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                                            <html xmlns="http://www.w3.org/1999/xhtml">
                                                            <head>
                                                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                                                            																										<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" align="left"><a href="#" target="_blank"><img src="https://ahref.tech/image/logo.png" width="94" alt="" style="border-width:0;width:200px;height:auto;display:block;" /></a></td>
                                                            																									</tr>
                                                            																								</table>
                                                            																							</div>
                                                            																							
                                                            																							<!--[if (gte mso 9)|(IE)]>
                                                            													</td>
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
                                                            										<td align="left" style="padding:0px 40px 40px 40px"><p style="color:#5b5f65; font-size:28px; text-align:left; font-family: Verdana, Geneva, sans-serif">Hi '.$name.', </p>
                                                            											<p style="color:#5b5f65; font-size:16px; text-align:left; font-family: Verdana, Geneva, sans-serif">
                                                            											
                                                            											'.$message.'  
                                                            											
                                                            												
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
                                                         
                                                            $headers = "From: support@ahref.tech \r\n";
                                                            $headers .= "MIME-Version: 1.0\r\n";
                                                            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                                                               
                                                       
                               
                               
                               
                                                          
                              if(mail($toEmail, $subject, $content, $headers))
                              {
                                       $success = '
                                
                                       
                                        <div class="alert alert-success">  
                                            <button type="button" class="close" data-dismiss="alert" style="top:10px;">×</button>  
                                            <strong>Message Sent.</strong> 
                                        </div>  ';
                              }else
                              {
                                  	$error =  '
                                 
                                       
                                        <div class="alert alert-danger">  
                                            <button type="button" class="close" data-dismiss="alert" style="top:10px;">×</button>  
                                            <strong>ERROR: SQL!</strong> Contact Developer support:( 
                                        </div>   ';
                              }
                            
                        
                                                          

                                                         
                                                     
                                            
                                              
                        }






}

            
            
?>
                     
                     
                     
                     
                     
                     
                     
                     
                       <div class="col-sm-6 eq-box-sm " style="margin: 0 auto; float: none;" >
                     <?php echo $error.$success;?>
                     </div>
                      <div class="col-sm-6 eq-box-sm " style="margin: 0 auto; float: none;" >
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-control">
                                                <a class="btn btn-default" href="dashboard?page=messages"><i class="fas fa-arrow-circle-left"></i> Back</a>
                                             
                                            </div>
                                            <h3 class="panel-title"><i class="fas fa-envelope-open-text"></i> Compose Message</h3>
                                        </div>
                                        <!--Block Styled Form -->
                                        <!--===================================================-->
                                        <form method="post">
                                           <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-4 mar-btm">
                                                    <input type="text" class="form-control" placeholder="Name" value="<?php echo $_POST['name'];?>" name="r_name">
                                                </div>
                                                <div class="col-md-4 mar-btm">
                                                    <input type="email" class="form-control" placeholder="Email" value="<?php echo $_POST['email'];?>" name="r_email">
                                                </div>
                                                
                                            </div>
                                            <textarea placeholder="Message" rows="13" class="form-control" name="r_message"></textarea>
                                        </div>
                                            <div class="panel-footer text-right">
                                                <button class="btn btn-info" type="submit" name="reply"><i class="fa fa-reply" aria-hidden="true"></i></button>
                                            </div>
                                        </form>
                                        <!--===================================================-->
                                        <!--End Block Styled Form -->
                                    </div>
                                </div>   
 