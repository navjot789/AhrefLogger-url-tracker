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
                               Track URLs             
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
                
              
                
                
 

                
                
                
                
                
                <form  id="main-form" method="post" action="">
                <?php
                    
                	$inputcode = mysqli_real_escape_string($con,htmlentities($_POST['track_code'])); //tracking code
                	
                                  $sql = "select track_code from shotner where track_code='$inputcode'" ;
                		          $rec = mysqli_query($con,$sql);
                		          $exist = mysqli_num_rows($rec);
     

                	if(isset($_POST['search']))
                	{
                	    
                          
                           
                	 
                            		if($inputcode=='')
                            		{
                            		      	echo '
                                                
                                                  <div class="container py-5">  
                                                   
                                                    <div class="alert alert-danger">  
                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                        <strong>Opps!</strong> A Tracking Code is not entered, please try again below: 
                                                    </div>  
                 
                    
                                                </div>   ';
                            		}
                            	   else if(strlen($inputcode) < 5 || strlen($inputcode) > 5)  //cal password length
                                	{
                        	
                        	
                        		         
                                        
                        		echo  '    <div class="alert alert-danger">  
                                                                                    <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                    <strong>invalid!</strong> Code = 5char. 
                                                                                </div>  ';	 
                                            
                                   
                                	}
                                 else if($exist > 0)
                                    {
                            	         
                            	        $track_records = mysqli_fetch_array($rec);
                            	        
                                        $_SESSION['TRACK_CODE'] = $track_records['track_code'];
                                        
                                        header('Location:track');
                                        exit();
                                                    
                                                  
                                         
                                                    
                                                    
                                    }
                                    else
                            		 {
                            		     
                                            
                                            echo '
                                                    
                                                           
                                                            <div class="alert alert-danger">  
                                                                <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                <strong>code not exist!</strong>  
                                                            </div>  
                         
                            
                                                       ';
                                            
                                            
                            		 }
                                	
                                	
                                	
                                
                	
                   
                    
                
                	
                	}
                	
                	
                
                
                	
                	?>
                
                	<div class="main-form">
                		<div class="row" id="single">
                		    
                		    	
                                
                			<div class="col-md-9 shortfieldz">
                					 <img src="image/track.png" class="img-responsive zmdi zmdi-link" alt="Responsive image " width="30" height="24" /> 
                				
                				<input type="text" class="form-control main-input"  id='myInput' name="track_code" value="<?php echo htmlspecialchars($_GET['val']); ?>" placeholder="Enter your tracking code..." /> 
                		
                							
                						  
                			</div>
                			<div class="col-md-3 shortbtnz">
                				<input class="btn btn-default btn-block main-button"  type="submit"   name="search" value="Tracking Code">
                			
                			</div>
                			
                			
                		</div>
                			</div>
                
                	             


                
                   
                 <div class="call-to-action  text-center" style="margin:0px;">
                  
                   <div align="center" class="g-recaptcha" data-sitekey="6Ld4WZAUAAAAADt1ZQKIwS0q34FjaGjglFor2ERW"></div>
                      
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
 
	</body>


</html>