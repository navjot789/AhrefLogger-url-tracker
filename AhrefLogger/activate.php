<?php
    
	include("connection/connect.php");
      session_start();
      
      $get_ext_token = mysqli_real_escape_string($con, htmlspecialchars($_GET["token"]));
      
	if(!empty($get_ext_token))
	{
	
	
                		   $sql = mysqli_query($con,"select token,date from users WHERE token='" .$get_ext_token. "'");
                		   $fetch=mysqli_fetch_array($sql);
	
	
	  	if($fetch['token']==$get_ext_token) 
           	{
                            			    
	
                		 
                            $creation_date = $fetch['date']; //user creation date
                
                            //display the converted time added +4 hr
                            $expire_date = date('Y-m-d H:i',strtotime('+4 hour',strtotime($creation_date)));
                            //Times can be entered in a readable way:
                            
                            //+1 day = adds 1 day
                            //+1 hour = adds 1 hour
                            //+10 minutes = adds 10 minutes
                            //+10 seconds = adds 10 seconds
                            //To sub-tract time its the same except a - is used instead of a +
                            
                            
                             $now = date("Y-m-d H:i:s"); //current date_time
                            
                            
                        
                        if($now>$expire_date) {
                            //expired link
                            header('location:confirm/5'); 
                        }
                        else
                        { 
                            //still have a time out of 4hr
                           
                                     
                            			    $result = mysqli_query($con,"update users set status = '1' WHERE token='" .$fetch['token']. "'");
                            			    if($result)
                            			    {
                            			        header('location:confirm/1'); //confirmed
                            			    }
                            			    else
                            			    {
                            			        header('location:confirm/2'); //query error
                            			    }
                            			
                            				
                            		
                            		
                           
                        }
		 
		
           	}
           else 
            {
               header('location:confirm/3'); //token not matched
            }
          	
	}
	else
	{
	    header('location:confirm/4'); //not getting token
	}
?>