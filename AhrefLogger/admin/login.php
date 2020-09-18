<?php
ob_start();
?>


 <?php
 include "../connection/connect.php";
 session_start();


 
 if(!empty($_SESSION["m_id"]))
{
	header('location:dashboard.php');
}	
else
{	

?>


<html lang="en">
 
 
 
<!--  Design By Navjot Singh pages-lock-screen.html  Thu, 02 Aug 2018 16:36:53 GMT -->
<?php include "inc/head.php";
	  ?>    
    <!--TIPS-->
    <!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
    <body>
        <div id="container" class="cls-container">
            <!-- Start Lock Screen  -->
            <!--===================================================-->
            <style>
                @media screen and (max-width: 400px) {
                  .lock-wrapper {
                   margin: 10px 10px 10px 10px;
                  }
                }
                                
            </style>
            <div class="lock-wrapper"  >
                <div class="panel lock-box">
                    <div class="center"> <img alt="" src="img/user.png" class="img-circle"/> </div>
                    <h4> Hello Admin </h4>
                    <p class="text-center">Please login to Access Adminstrator</p>
                    <div class="row">
                        
                        
                        <?php
                        
                        
                        
                        
                        
                if (isset($_POST['submit']))
                {
                                    	$username = $_POST['username'];
                            			$password = $_POST['password'];
                            			
                            // Now we check if the data from the login form was submitted, isset() will check if the data exists.
                            
                            if (empty($username) ||  empty($password) ) {
                            	// Could not get the data that should have been sent.
                            	
                            		$error = ' <div class="alert alert-danger">  
                                                 <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                                    <strong>Empty Fields!</strong> Please fill both the username and password field!. 
                                                                                                </div>  ';
                            }
                            
                            // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
                              else  if ($stmt = $con->prepare('SELECT m_id,m_username,m_password FROM manage WHERE m_username = ?') ) 
                              
                                {
                                	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username,pass is a string so we use "ss"
                                	$stmt->bind_param('s', $username);
                                	$stmt->execute();
                                	// Store the result so we can check if the account exists in the database.
                                	$stmt->store_result();
                                	
                                	
                                	if ($stmt->num_rows > 0) 
                                	{
                                	$stmt->bind_result($m_id,$m_username,$hashed_password);
                                	$stmt->fetch();
                                	// Account exists, now we verify the password.
                                	// Note: remember to use password_hash in your registration file to store the hashed passwords.
                                	
                                        	if (password_verify($password, $hashed_password))
                                        	{
                                        		// Verification success! User has loggedin!
                                        		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
                                        	
                                            	
                                            		   session_regenerate_id();
                                                		$_SESSION['m_loggedin'] = TRUE;
                                                		$_SESSION['m_username'] = $m_username;
                                                	    $_SESSION['m_id'] = $m_id;
                                                	      //sleep(1);
                                                          header("Location:dashboard" );
                                                          exit(); 
                                            	  
                                        	
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
                                                                                                    <strong>Incorrect username!</strong> username dosnt seems to be valid. 
                                                                                                </div>  ';
                                    }
                                $stmt->close();
                                	
                                	
                                }
                }
                        
                        
                        ?>
                        
                        
                        
                        
                        
                        
                        
                        
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
                        <form method="post" class="form-inline">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                
                                  <div class="text-left">
                                    <label for="signupInputPassword" class="text-muted">username</label>
                                    <input id="signupInputPassword" type="text" name="username" placeholder="username" class="form-control lock-input"  />
                                </div>
                                
                                <div class="text-left">
                                    <label for="signupInputPassword" class="text-muted">Password</label>
                                    <input id="signupInputPassword" type="password" name="password" placeholder="Password" class="form-control lock-input"  />
                                </div>
                               
                                <button type="submit" name="submit" class="btn btn-block btn-primary">
                                Sign In
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
          
            </div>
            <!--===================================================-->
            <!-- End Login Screen -->
        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->
        <!--JAVASCRIPT-->
        <!--=================================================-->
  <?php include "inc/jquery.php"; ?>
    </body>

<!--  Design By Navjot Singh pages-lock-screen.html  Thu, 02 Aug 2018 16:36:53 GMT -->
</html>

<?php
}
?>