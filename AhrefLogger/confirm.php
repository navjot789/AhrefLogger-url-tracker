<?php
    ob_start();
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
  
 <?php include 'pages/head.php';?>
 
  <div id="focus-overlay"></div>
  <body id="body">
                
    




<section class="under-head-cont">
	<div class="container">    
		<div class="centered form">      
			 
	
	
	<?php
				          
        				          if($_GET['confirm_msg']==1)
        				          {
        				                echo '
                            				   <div class="col-sm-12 col-md-12">
                            				   
                            				 <div class="alert alert-success">
                                              <strong>Success!</strong> Account Successfully Activated.
                                              
                                              <div id="timeCounterHolder">
                                                            <div id="row">
                                                                <p id="displayTimer"></p>
                                               </div> 
                                               
                                            </div>
                                                              				   
                            				   
                                             
                                                         <script>
                                                        
                                                    /* Countdown seconds */
                                                        var count = 5;
                                                        /* Website to redirect */
                                                        var url = "https://ahrefs.tech/login.php";
                                                        /* Call function at specific intervals */
                                                        var countdown = setInterval(function() { 
                                                            /* Display Countdown with txt */
                                                            $("#displayTimer").text("Redirection in: " + count-- + " seconds");
                                                            
                                                            /* If count is smaller than 0 ...*/
                                                            if (count < 0) {
                                                                $("#displayTimer").text("Redirecting now....");
                                                                /* Clear timer set with setInterval */
                                                                clearInterval(countdown);
                                                                /* Redirect */
                                                                $(location).attr("href", url);
                                                           } 
                                                            // milliseconds
                                                        }, 1000);
                                                        
                                                    </script>
                                                        
                                                       
                                                    <small>If you unable to redirect <a href="login.php"> Click here</a>.</small>
                                                   </p>
                                                </div>
                                            </div>';
        				          }
        				          elseif($_GET['confirm_msg']==2)
        				          {
        				              echo '
        				              <div class="alert alert-danger">
                                              <strong> Query Error!!</strong> There is a problem with SQL Query Contact the webmaster.
                                         </div>';
        				              
        				          }
        				     elseif($_GET['confirm_msg']==3)
        				          {
        				              echo '
        				              <div class="alert alert-danger">
                                              <strong>  Invalid Key or Token!</strong> The Key Or Token that Your Using is Invaild or Broken.
                                         </div>';
        				              
        				          }
        				         elseif($_GET['confirm_msg']==4)
        				          {
        				              echo '
        				               <div class="alert alert-danger">
                                              <strong>key or Token Not Found!</strong> The Key Or Token were Not Found. Please try again or Resend the confirmation link.
                                         </div>';
        				              
        				          }
        				            elseif($_GET['confirm_msg']==5)
        				          {
        				              echo '
        				               <div class="alert alert-danger">
                                              <strong>Token Expired!</strong> The Key Or Token Expired. Please try again or Resend the confirmation link.
                                         </div>';
        				              
        				          }
        				           else
        				          {
        				              echo '
        				              
        				             <div class="alert alert-danger">
                                              <strong> Error!</strong> Dont Try to be OverSmart Hacker! try again or Resend the confirmation link.
                                         </div> ';
        				              
        				          }
        				          
        				        
				        
				          
				             ?>
	
	
	
	</div>
	</div>

     		
</section>           


<?php include 'pages/jquery.php';?>
	</body>

</html>