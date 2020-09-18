<?php
include "connection/connect.php";





                        	$name=mysqli_real_escape_string($con,htmlentities($_POST['name'])); 
                	    	$email=mysqli_real_escape_string($con,htmlentities($_POST['email'])); 
                			$message=mysqli_real_escape_string($con,htmlentities($_POST['message'])); 
             
     

                	if(isset($_POST['send']))
                	{
                	    
                            $responseKey = mysqli_real_escape_string($con,htmlentities($_POST['g-recaptcha-response'])); //responce_key_callback_by_google
                            $userIP = $_SERVER['REMOTE_ADDR']; //user_ip_address
                            $google_api_url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP"; // google_api_url
                            $response = file_get_contents($google_api_url);
                            $response = json_decode($response);
                           
                	 
                		if(empty($name) || empty($email) || empty($message))
                		{
                		     	$error =  '
                                 
                                       
                                        <div class="alert alert-danger">  
                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                            <strong>Opps!</strong> all fields are required, please try again below: 
                                        </div>   ';
                		}
                	   elseif($response->success == false)
                        {
                            	$error = '
                                
                                       
                                        <div class="alert alert-warning">  
                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                            <strong>Opps!</strong> You Missed the Captcha, please try again below: 
                                        </div>    ';
                                
                                
                        }
                        else
                        {
                                  $sql_prepare = 'insert into support(name,email,message,date) values(?, ?, ?, ?)';
                   
                                              $stmt = $con->prepare($sql_prepare); 
                                                       
                                                          // Bind parameters (s = string, i = int, b = blob, etc), in our case the u_id is a int so we use "i"
                                                          $stmt->bind_param('ssss',$name,$email,$message,$current_date);
                                                        
                                                          
                              if($stmt->execute())
                              {
                                       $success = '
                                
                                       
                                        <div class="alert alert-success">  
                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                            <strong>Message Sent.</strong> your Responce is captured. Our team will contact you within 12hr. Do not forget to check Spam folder.
                                        </div>  ';
                              }else
                              {
                                  	$error =  '
                                 
                                       
                                        <div class="alert alert-danger">  
                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                            <strong>ERROR: SQL!</strong> Contact Developer support:( 
                                        </div>   ';
                              }
                            
                        
                                                          

                                                         
                                                     
                                              $stmt->close();
                                              
                        }






}




?>


<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
  
 <?php include 'pages/head.php';?>
 
  <div id="focus-overlay"></div>
  <body id="body">
    <a href="#body" id="back-to-top"><i class="zmdi zmdi-chevron-up"></i></a>
                
<?php include 'pages/header.php';?>  
  <?php include 'pages/m_header.php';?>  




<section class="under-head-cont">
	<div class="container">    
	
	 
	

		<div class="centered form" style="max-width: 600px;">   
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
		
		
            <form role="form" class="live_form" method="post"  style="width: 600px;">
      	<h3>Contact us</h3>
      	<p>If you have any questions, feel free to contact us on this page.</p>
      	<hr>
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" value="" style="">	   
			<i class="zmdi zmdi-face"></i>
        </div>
        <div class="form-group">
          <label>Email (Required)</label>
          <input type="email" class="form-control" name="email" value=""  style="">	
			<i class="zmdi zmdi-email"></i>
        </div>  
        <div class="form-group">
           
          <label>Message (Required)</label>
          <textarea name="message" class="form-control" rows="10"  style="" spellcheck="false"></textarea>	            
        </div>          
				<div id="captcha" class="display">
						    <div align="center" class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
                    			
				</div>	        
   <button type="submit" name="send" class="mdbtn btn btn-primary " style="">Send</button>        
      </form>        
		</div>

	
	
	
	
	
	
	</div>
	 
     		
</section>      

 
	<?php include 'pages/jquery.php';?>

 
  <script src='https://www.google.com/recaptcha/api.js'></script> 
	 
	</body>

</html>

