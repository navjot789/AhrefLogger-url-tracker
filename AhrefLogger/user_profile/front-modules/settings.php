
<?php
$private = $_POST['private'];
$Public = $_POST['Public'];
$update = $_POST['update'];

$session_userid =$_SESSION['u_id'];
$session_username =$_SESSION['username'];

if(isset($_GET['error']) )
{
    
    if($_GET['error'] == 0)
    {
    $error = ' <div class="alert alert-danger">  
                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                            <strong>Profile Access Fail!</strong> Public profile is Deactivated, inorder to access it first Activate your Public profile.
                                        </div>  ';
    }
    else
    {
          $error = ' <div class="alert alert-danger">  
                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                           <strong>Profile Access Fail!</strong> Public profile is Deactivated, inorder to access it first Activate your Public profile.
                                        </div>  ';
    }
}










if(isset($private))
{
  
  if($private == '0')
  {

   
   
    
    $stmt = $con->prepare('UPDATE users SET public = ? WHERE u_id = ? && username = ?');
                 
                    	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
                    	$stmt->bind_param('sss', $private, $session_userid, $session_username);
                    	$stmt->execute();
                    	$stmt->close();
                    	
    
    if($stmt)
    {
        echo '<div class="alert alert-success" role="alert">
            <i class="zmdi zmdi-check-circle"></i> Updated Success.  Status: Offline
            </div>';
    }
    else
    {
           echo '<div class="alert alert-danger" role="alert">
           <i class="fas fa-times"></i> ERROR: Update Fail.
            </div>';
    }

  }

}

if(isset($Public)){

if($Public == '1')
  {
        
        
           $stmt = $con->prepare('UPDATE users SET public = ? WHERE u_id = ? && username = ?');
                 
                    	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
                    	$stmt->bind_param('sss', $Public, $session_userid, $session_username);
                    	$stmt->execute();
                    	$stmt->close();
        
        if($stmt)
        {
            echo '<div class="alert alert-success" role="alert" >
                 <i class="zmdi zmdi-check-circle"></i> Updated Success. Status: Online
                </div>';
        }
        else
        {
               echo '<div class="alert alert-danger" role="alert">
             <i class="fas fa-times"></i> ERROR: Update Fail.
                </div>';
        }
  }

}



if(isset($update)){

                                     $password = mysqli_real_escape_string($con, htmlspecialchars($_POST["old_password"]));
                            		 $n_password = mysqli_real_escape_string($con, htmlspecialchars($_POST["new_password"]));
                            		 
                            		 
					                    
  
   
                            		  if (empty($password) ||  empty($n_password) ) 
                            		  {
                	                    // Could not get the data that should have been sent.
                	
                                    	
                                                    echo '    <div class="alert alert-danger" role="alert">
                                                                 <i class="fas fa-times"></i> ERROR: Empty Fields, Both fields are required.
                                                                    </div>  ';	                                                         
                                                                                                        
                                        }
                                        elseif(strlen($password) < 6 || strlen($n_password) < 6)  //cal password length
                	                    {
            	
                                        echo '    <div class="alert alert-danger" role="alert">
                                                                 <i class="fas fa-times"></i> ERROR: Password is too short, Must be More than 6 Charactors.
                                                                    </div>  ';	    
            		
                                    	}
                                    
                                    	else
                                    	{
                                    	    
                                    	    	$sql_prepare = 'SELECT password FROM users  WHERE u_id = ? && username = ?';
                            					$stmt = $con->prepare($sql_prepare); 
                                               
                                                	// Bind parameters (s = string, i = int, b = blob, etc), in our case the u_id is a int && username is string so we use "is"
                                                	$stmt->bind_param('is', $session_userid, $session_username);
                                                	$stmt->execute();
                                              
                                                
                                                	$stmt->bind_result($user_old_password);
                                                     $json = array();
                                                     if($stmt->fetch()) {
                                                                $json = array('user_old_password'=>$user_old_password);
                                                                
                                                         
                                                            }
                                             
                            					$stmt->close();
                                    	    
                                    	    
                                    	    
                                    	    
                                    	    
                                    	    
  
                                                     if(password_verify($password, $json['user_old_password']))
                                                     {
                                                         
                                                               $encrypt_passwords = password_hash($n_password, PASSWORD_DEFAULT);
                                                     
                                                               $stmt = $con->prepare('UPDATE users SET password = ? WHERE u_id = ? && username = ?');
                                                                     
                                                                        	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
                                                                        	$stmt->bind_param('sss', $encrypt_passwords, $session_userid, $session_username);
                                                                        	$stmt->execute();
                                                                        	$stmt->close();
                                                            
                                                            if($stmt)
                                                            {
                                                                echo '<div class="alert alert-success" role="alert" >
                                                                     <i class="zmdi zmdi-check-circle"></i> Password Updated Success.
                                                                    </div>';
                                                            }
                                                            else
                                                            {
                                                                   echo '<div class="alert alert-danger" role="alert">
                                                                 <i class="fas fa-times"></i> ERROR: Password Update Fail.
                                                                    </div>';
                                                            }
                                                            
                                                     }
                                                     else
                                                     {
                                                           echo '<div class="alert alert-danger" role="alert">
                                                                 <i class="fas fa-times"></i> ERROR: Your Old Password is incorrect.
                                                                    </div>';
                                                     }
                                    	}
  

}




?>

	<?php
					
					$sql_prepare = 'SELECT username, email, public FROM users WHERE u_id = ?';
                   
					$stmt = $con->prepare($sql_prepare); 
                   
                    	// Bind parameters (s = string, i = int, b = blob, etc), in our case the u_id is a int so we use "i"
                    	$stmt->bind_param('i', $session_userid);
                    	$stmt->execute();
                  
                    
                    	$stmt->bind_result($username,$email,$public);
                         $json = array();
                         if($stmt->fetch()) {
                                    $json = array('username'=>$username,'email'=>$email,'public'=>$public);
                                    
                             
                                }else{
                                    $json = array('error'=>'no record found');
                                }
                 
					$stmt->close();
?>
					


<div id="user-content" class="col-md-11 no-padding-right">  	
			
			<?php echo  $error; ?>
			
				  			
		<div class="main-content panel panel-default panel-body" style="">
			<h3>Account Settings</h3>

						
			
			<form action="" role="form" class="form-horizontal" method="post">
				<div class="setting-panel row">
											<div class="avatar-holder row">
							<img src="http://www.gravatar.com/avatar/3234745411d648bbe493138afdd7867e?s=150" alt="ns789's Avatar" class="avatar pull-left">
							<div class="infoz pull-left">
								<strong title="<?php echo $json['username']; ?>"><?php echo $json['username']; ?></strong>
								<a href="https://gravatar.com/" target="_blank" class="chavatlink">
									Change Avatar								</a>
							</div>
						</div>
					<hr>
										<div class="form-group col-lg-6">
						<label class="col-md-12 control-label">Email</label>			
						<div class="col-md-12">
							<input type="text" value="<?php echo $json['email']; ?>" name="email" class="form-control" disabled wtx-context="D277A876-3499-4BAC-817D-0DB04344203E">
													</div>
					</div>
					<div class="form-group col-lg-6">
						<label class="col-md-12 control-label">Username</label>			
						<div class="col-md-12">
							<input type="text"  value="<?php echo $json['username']; ?>" name="username" class="form-control" disabled="" style="" wtx-context="0411720A-B981-472F-8C95-01D9C477C148">
							<p class="help-block">A username is required for your public profile to be visible.</p>
						</div>
					</div>
				</div>
		
		
				
				
				
				<div class="setting-panel">
											
					<ul class="form_opt" data-id="public">
						<li class="text-label">Profile Access	
							<?php 
                                    if($json['public']==1)
                                    {
                                       echo  "<span class='label label-primary '>Online</span>";
                                     
                                    }
                                if($json['public']==0)
                                    {
                                         echo  "<span class='label label-warning'>Offline</span>";
                                       
                                    }
                         ?>
						
						
						<small>Public profile will be activated only when this option is public. Username is required.</small></li>
				
					
					
						<li><button style="
                                    color: #fff;
                                    padding: 5px 10px;
                                    font-weight: normal;
                                    border: 2px solid #9b9b9b;
                                    transition: all 0.2s linear;
                                   
                                    <?php 
                                     if($json['public']==0)
                                    {
                                       echo  $background = 'background:#337ab7';
                                    }
                                    else
                                    {
                                       echo $background = 'background:#9b9b9b';
                                    }
                                    
                                    
                                    ?>" class="last" value="0"  name="private">Private</button>
                                    
						<li><button  style="
                                    color: #fff;
                                    padding: 5px 10px;
                                    font-weight: normal;
                                    border: 2px solid #9b9b9b;
                                    transition: all 0.2s linear;
                                    <?php
                                    
                                     if($json['public']==1)
                                    {
                                       echo  $background = ' background:#337ab7';
                                      
                                    }
                                    else
                                    {
                                       echo $background = 'background:#9b9b9b';
                                    }
                                    
                                    
                                    ?>"  class="first current" value="1" name="Public">Public</button></li>
				
				
				
					</ul>
				
	
			
				</div>
				
				
				<div class="setting-panel row">
					<h2>Password</h2>
					<hr>
					<div class="form-group col-lg-6">
						<label class="col-md-12 control-label">Current Password</label>
						<div class="col-md-12">
							<input type="password" value="" name="old_password" class="form-control" style="" >
							<p class="help-block">Enter your Old Password.</p>
						</div>
					</div>
					<div class="form-group col-lg-6">
						<label class="col-md-12 control-label">New Password</label>
						<div class="col-md-12">
							<input type="password" value="" name="new_password" class="form-control" style="" >
							<p class="help-block">Enter your New Password.</p>
						</div>
					</div>
						<div class="text-center"><button type="submit" name="update" class="btn btn-primary setting-panel-mdbtn pull-right" style=""><i class="zmdi zmdi-check-circle"></i> Update</button></div>	
				</div>
				
					
					   
			</form>
		</div>	
		
		
		
	
		</div>