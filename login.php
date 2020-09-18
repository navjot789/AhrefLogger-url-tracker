<?php
session_start();
include "connection/connect.php";
date_default_timezone_set('Asia/Kolkata');
$current_date =date('Y-m-d H:i:s');

if(!empty($_SESSION["u_id"]))
{
    sleep(1);
    header("Location:user_profile/dashboard" );
	exit();
}
else if(!empty($_COOKIE['username']) && !empty($_COOKIE['pass_salt']))
{
	   
	$_SESSION['loggedin'] = $_COOKIE['loggedin'];
	$_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['u_id'] = $_COOKIE['u_id'];
    header("Location:user_profile/dashboard" );
        exit(); 
}
else
{	      
   			
                if (isset($_POST['submit']))
                {
                        	$login = $_POST['username'];
                			$password = $_POST['password'];
                // Now we check if the data from the login form was submitted, isset() will check if the data exists.
                
                if (empty($login) ||  empty($password) ) 
                {
                	// Could not get the data that should have been sent.
                	
                		$error = ' <div class="alert alert-danger">  
                                     <button type="button" class="close" data-dismiss="alert">×</button>  
                                        <strong>Empty Fields!</strong> Please fill both the username and password field!. 
                                    </div>  ';
                }
                
                // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
                  else  if ($stmt = $con->prepare('SELECT u_id, password, status FROM users WHERE ( username = ? OR email = ?)') ) 
                  
                    {
                    	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
                    	$stmt->bind_param('ss', $login,$login);
                    	$stmt->execute();
                    	// Store the result so we can check if the account exists in the database.
                    	$stmt->store_result();
                    	
                    	
                    	if ($stmt->num_rows > 0) 
                    	{
                    	$stmt->bind_result($u_id, $hashed_password, $status);
                    	$stmt->fetch();
                    	// Account exists, now we verify the password.
                    	// Note: remember to use password_hash in your registration file to store the hashed passwords.
                    	
                            	if (password_verify($password, $hashed_password))
                            	{
                            		// Verification success! User has loggedin!
                            		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
                            	
                                		if($status==1)
                                		{
                                		    session_regenerate_id();
                                    		$_SESSION['loggedin'] = TRUE;
                                    		$_SESSION['username'] = $login;
                                    	    $_SESSION['u_id'] = $u_id;
                                    	      
                                    	              if(isset($_POST['rememberme']) && $_POST['rememberme']=='1')
                                                          {
                                                				setcookie("username", $login, time() + (86400 * 30)); 
                                                				setcookie("pass_salt", $hashed_password, time() + (86400 * 30)); 
                                                				setcookie("loggedin", $_SESSION['loggedin'], time() + (86400 * 30)); 
                                                			    setcookie("u_id", $_SESSION['u_id'], time() + (86400 * 30)); 
                                                			
                                                          }
                                    	     
                                    	     
                                       	             header("Location:user_profile/dashboard" );
                                                     exit(); 
                                    	
                                		    
                                		}
                                		elseif($status==2)
                                		{
                                		    	$error =   	'<div class="alert alert-danger">  
                                                                          <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                            <strong> Account Suspended!</strong> Your account is Blocked by Admin. 
                                                                            </div>  ';
                                		}
                                		else
                                		{
                                		    	$error =   	'<div class="alert alert-danger">  
                                                                          <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                            <strong>In-Active Account!</strong> check your email for further information. 
                                                                            </div>  ';
                                		}
                            		
                               
                                      
                                      
                                      
                            	
                            	} 
                            	else {
                            		$error =   	'<div class="alert alert-danger">  
                                                                      <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                        <strong>Incorrect password!</strong> password dosnt seems to be valid. 
                                                                        </div>  ';
                            	}
                        } 
                    else {
                    	$error = ' <div class="alert alert-danger">  
                                                                                        <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                        <strong>Incorrect username or email!</strong> username or email not seems to be valid. 
                                                                                    </div>  ';
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
		<div class="centered form">      
			 <?php echo $error;  	 ?>
			 
			<form role="form" class="live_form form" id="login_form" method="post" action=""> 
				<p class="title">Login</p>   
				<div class="form-group">
					<input type="text" class="form-control" id="email" placeholder="Email or username" name="username" autofocus >
					<i class="zmdi zmdi-account"></i>
				</div>
				
				<div class="form-group">
					<input type="password" class="form-control" id="pass" placeholder="Password" name="password" >
					<i class="zmdi zmdi-dialpad"></i>
					<a href="password_reset" class="forgot-password" id="forgot-password">Forgot?</a>
				</div>
				
				<p></p>	
				
				<div class="form-group">
					<div class="round-check">
						<input type="checkbox" name="rememberme" value="1"  id="round-checkbox"> 
						<label for="round-checkbox">Remember me</label>
					</div>
					<button type="submit" name="submit" class="mdbtn btn btn-primary pull-right margin0">Login</button>
				</div>                  
					
								
												<hr>
								<p class="info-row">
                                					<span>Don't have an account?</span>
                                					<a href="register.php" class="register-link">Create account</a>
                                				</p>
				
			
							</form>  
       
		</div>
	</div>
	 
     
     		
</section>      

	<?php include 'pages/jquery.php';?>
<!--
  <script >
      $('#myModal').on('shown.bs.modal', (function() {
  var mapIsAdded = false;

  return function() {
    if (!mapIsAdded) {
      $('.modal-body').html('<iframe src="https://maps.google.com/maps?q=30.9000,75.8500&hl=es;z=14&amp;output=embed" width="100%" height="400" frameborder="0" style="border:0"></iframe>');

      mapIsAdded = true;
    }    
  };
})());
  </script>
-->

	 
	</body>

</html>
<?php
}
?>
