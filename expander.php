<?php
include 'connection/connect.php';
session_start();
error_reporting(0);


?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

  <?php include 'pages/head.php';?>
  <style>
 
      
      
  </style>
 
  <div id="focus-overlay"></div>
  <body class='light home' id="body">
        <a href="#body" id="back-to-top"><i class="zmdi zmdi-chevron-up"></i></a>
            
  <?php include 'pages/header.php';?>  
  <?php include 'pages/m_header.php';?>  
	   
	   
                    <section class="under-head-cont main-index-top" style="background-image:url(image/back.jpg);">
                    
                    <svg id="wave" viewBox="0 0 100 15" style="position: absolute;bottom: 0;z-index: 0;"><path fill="#fff" opacity="0.5" d="M0 30 V15 Q30 3 60 15 V30z"></path><path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z"></path></svg>
                    
                      <div class="container">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="promo">
                              <h1>
                               URLs Expander           
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
                
                
                
                <form  id="main-form" method="post" >
                <?php
                   $raw_input =  $_POST['link_expand'];
                   $raw_input = strpos($raw_input, 'http') !== 0  || strpos($raw_input, 'https') !== 0 ? "http://$raw_input" : $raw_input;
                    
                	$inputlink = mysqli_real_escape_string($con,htmlentities($raw_input)); //tracking code
             
                	 
                	 
                 $base_url_code = basename($inputlink);  // getting the SHOTcode only
                	
                		          
                	if(isset($_POST['search']))
                	{
                	    
                            $responseKey = mysqli_real_escape_string($con,htmlentities($_POST['g-recaptcha-response'])); //responce_key_callback_by_google
                            $userIP = $_SERVER['REMOTE_ADDR']; //user_ip_address
                            $google_api_url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP"; // google_api_url
                            $response = file_get_contents($google_api_url);
                            $response = json_decode($response);
                           
                	 
                	 
                                		if(empty( $_POST['link_expand']) ||  $_POST['link_expand']=='')
                                		{
                                		      	echo '
                                                    
                                                      <div class="container py-5">  
                                                       
                                                        <div class="alert alert-danger">  
                                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                                            <strong>Opps!</strong> link was not entered, please try again below: 
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
                                  
                                     else if(strlen($base_url_code) < 6 || strlen($base_url_code) > 6)  //$base_url_code  length
                                                	{
                                        	
                                        	
                                        		         
                                                        
                                        		echo  ' <div class="alert alert-danger">  
                                                          <button type="button" class="close" data-dismiss="alert">×</button>  
                                                            <strong>invalid Link!</strong> Only Applicable with '.$_SERVER['HTTP_HOST'].'/url/[code]. 
                                                            </div>  ';	 
                                                            
                                                   
                                        }
                                           
                                       else{
                                               
                                                    
                                    		     $sql = "select * from shotner where shorturl='$base_url_code'" ;
                                    		          $rec = mysqli_query($con,$sql);
                                    		        
                                    		          $exist = mysqli_num_rows($rec);
                                    		   
                                    		   
                                    		   if($rec)
                                    		   {
                                    		   
                                                		 if($exist > 0)
                                                		 {
                                                		        
                                                		     
                                                		          $long_url= mysqli_fetch_array($rec);
                                                		     
                                                            	          function get_time_ago( $time )     //converting nornal time into facebook time ago
                                                                            {
                                                                                $time_difference = time() - $time;
                                                                            
                                                                                if( $time_difference < 1 ) { return 'less than 1 second ago'; }
                                                                                $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                                                                                            30 * 24 * 60 * 60       =>  'month',
                                                                                            24 * 60 * 60            =>  'day',
                                                                                            60 * 60                 =>  'hour',
                                                                                            60                      =>  'minute',
                                                                                            1                       =>  'second'
                                                                                );
                                                                            
                                                                                foreach( $condition as $secs => $str )
                                                                                {
                                                                                    $d = $time_difference / $secs;
                                                                            
                                                                                    if( $d >= 1 )
                                                                                    {
                                                                                        $t = round( $d );
                                                                                        return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
                                                                                    }
                                                                                }
                                                                            }

                                                                 
                                                                       
                                                                            
                                                            	           // image generation api:https://www.thum.io/documentation/api/url     
                                                            	                
                                                            	            echo    '<div class="container stats-page">
                                                                            		<div class="panel panel-body panel-default" >
                                                                            			<div class="row info">
                                                                            				<div class="col-md-3 thumb">
                                                                            					<img class="img-thumbnail" src="https://image.thum.io/get/width/1000/crop/1000/'.$long_url['urlinput'].'" alt="">
                                                                            				</div>
                                                                            				<hr class="visible-sm visible-xs">
                                                                            				<div class="col-md-9 url-info">
                                                                            					<h2>
                                                                            					
                                                                            					<img src="https://www.google.com/s2/favicons?domain='.$long_url['urlinput'].'" alt="favicon">
                                                                            					
                                                                            				
                                                                            					
                                                                            					<a href="'.$long_url['urlinput'].'" rel="nofollow" target="_blank">'.$long_url['title'].'<i class="zmdi zmdi-open-in-new"></i></a>
                                                                            					
                                                                            					
                                                                            					
                                                                            						<span>'.$long_url['description'].'</span>
                                                                            						
                                                                            						<small><i class="zmdi zmdi-calendar"></i> '.get_time_ago( strtotime($long_url['date'])).' </small>
                                                                            					</h2>
                                                                            					<hr style="margin-top: 23px;margin-bottom: 21px;">
                                                                            					<div class="row">
                                                                            						<div class="col-md-7">
                                                                            							<p>
                                                                            								<i class="glyphicon glyphicon-link"></i> <strong>'.$long_url['urlinput'].' </strong>								
                                                                            							</p>
                                                                            							
                                                                            							<p>
                                                                            								<i class="glyphicon glyphicon-link"></i> <strong> <a style="text-decoration:underline;" href="https://ahrefs.tech/url/'.$long_url['shorturl'].'" target="_blank">
                                                                            								https://'.$_SERVER['HTTP_HOST'].'/url/'.$long_url['shorturl'].'<i class="zmdi zmdi-open-in-new">
                                                                            								</i></a> </strong>
                                                                            								</p>
                                                                            								
                                                                            							<p>
                                                                            							
                                                                            								<i class="glyphicon glyphicon-qrcode"></i> 
                                                                            							<strong><a style="text-decoration:underline;" target="_blank" href="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl='.$long_url['urlinput'].'&choe=UTF-8"> QR-CODE</a></strong>
                                                                            						
                                                                            							
                                                                            							</p>
                                                                            							
                                                                            							
                                                                            						</div>
                                                                            						
                                                                            						<div class="col-md-5 ">
                                                                            						
                                                                            						<h3 style="margin-bottom: 10px;">Share on:</h3>
                                                                            							<div class="text-center media-share">
                                                                            							
                                                                            								<a href="https://www.facebook.com/sharer/sharer.php?u=https://'.$_SERVER['HTTP_HOST'].'/url/'.$long_url['shorturl'].'" class="btn btn-facebook u_share" target="_blank"><i class="zmdi zmdi-facebook"></i></a>
                                                                            								
                                                                            								<style>
                                                                            							.fa-whatsapp  {
                                                                                                          color:#fff;
                                                                                                          background:
                                                                                                          linear-gradient(#25d366,#25d366)10px 84%/10px 9px no-repeat,
                                                                                                          radial-gradient(circle at center, #25d366 63%,transparent 0);
                                                                                                          line-height: 26px;
                                                                                                          font-size:28px;
                                                                                                        }
                                                                                                                      
                                                                            								</style>
                                                                            							
                                                                            								<a href="https://api.whatsapp.com/send?text=https://'.$_SERVER['HTTP_HOST'].'/url/'.$long_url['shorturl'].'" target="_blank" class="btn u_share"  ><i class="fab fa-whatsapp"></i></a>
                                                                            								
                                                                            								<a href="https://twitter.com/intent/tweet?url=https://'.$_SERVER['HTTP_HOST'].'/url/'.$long_url['shorturl'].'" class="btn btn-twitter u_share" target="_blank"><i class="zmdi zmdi-twitter"></i></a>
                                                                            								
                                                                            								
                                                                            							
                                                                            					
                                                                            				
                                                                            								
                                                                            							</div>
                                                                            						</div>						
                                                                            					</div>
                                                                            				</div>
                                                                            			</div>
                                                                            		</div>
                                                                            	</div>';
                                                            	                
                                                            	                
                                                            	                
                                                            	                
                                                            	                
                                                            	                
                                                            	                
                                                            	                
                                                            	                
                                                            	                
                                                                           
                                                                     
                                                                }
                                                                else
                                                        		 {
                                                        		     
                                                                        
                                                                        echo '
                                                                                
                                                                                       
                                                                                        <div class="alert alert-warning">  
                                                                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                            <strong>There is No data is found in our databse!</strong>  
                                                                                        </div>  
                                                     
                                                        
                                                                                   ';
                                                                        
                                                                        
                                                        		 }
                                    		   }
                                    		   else{
                                    		           echo '
                                                                                
                                                                                       
                                                                                        <div class="alert alert-danger">  
                                                                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                            <strong>querry error!</strong>  
                                                                                        </div>  
                                                     
                                                        
                                                                                   ';
                                    		   }
                                                		         
                                                            	
                                                		     
                                                		     
                                                		 }
                            	
                              
                                
                                
                                
                        }
                	
                	
                
                	
                	?>
                
                	<div class="main-form">
                		<div class="row" id="single">
                		         
                			<div class="col-md-9 shortfieldz">
                					<img src="image/expand.png" class="img-responsive zmdi zmdi-link" alt="Responsive image " width="28" height="22" style="border-radius: 0px;"/> 
                				
                				<input type="text" class="form-control main-input"  id='myInput' name="link_expand"  placeholder="https://domain.com/url/xxxxxx or code" /> 
                				  
                			</div>
                			<div class="col-md-3 shortbtnz">
                				<input class="btn btn-default btn-block main-button"  type="submit"   name="search" value="Expand">
                			
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
                        			<p>Clicks Served</p>
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
            
            
            <section class="infinity-cta">
            	<div class="container">
            		<div class="row stats">
            			<h2 class="center">
            			The Ultimate URL Shortener that's simple,<br>powerful, and easy.			</h2>
            			<p>
            			Unleash the Power of the Link			</p>
            			<div class="col-md-12">
            				<a href="register.php" class="infbtn">Get Started</a>
            			</div>
            		</div>
            	</div>
            </section>            






  <?php include 'pages/footer.php';?>  

  <?php include 'pages/jquery.php';?>  
 <script src='https://www.google.com/recaptcha/api.js'></script>
	</body>


</html>