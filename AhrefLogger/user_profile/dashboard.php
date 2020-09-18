<?php
include "../connection/connect.php";
// We need to use sessions, so you should always start sessions using the below code.
session_start();
date_default_timezone_set('Asia/Kolkata');
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../login');
	exit();
}


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





?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
    
    
    <?php 
     
    include "../pages/head.php";
    
    
    ?>
  
    
  
  <div id="focus-overlay"></div>
  
  <body id="body">
    <a href="#body" id="back-to-top"><i class="zmdi zmdi-chevron-up"></i></a>
    
    
  <?php include "pages/header.php"; ?>
      
      
      
      
      
      <section class="under-head-cont">
        <div class="container-fluid">          
          <div class="row" >
            <div class="col-md-2 sidebar">
				<div id="offnavmenu">
				    
					<ul class="nav nav-sidebar nav-sidebarz">
						<li>
							<a href="dashboard?page=home">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" /></svg>
								Dashboard							</a>
						</li>
						
			<hr>
					
			
			
						<li>
						    
						    	
				
				
					
						    
						    
							<a href="dashboard?page=profile">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg>
								Public Profile  
								
								
                                    
										
								
								
								
								</a>
						</li>
						
											
						<li>
							<a href="dashboard?page=settings">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z" /></svg>
								Settings							</a>
						</li>
						<hr>
										
					</ul>
					
					<h3>Account info<span class="label label-primary pull-right">Free</span>            	
					</h3>
					<?php
					

					
                   
					$stmt = $con->prepare('SELECT uid,shorturl FROM shotner WHERE u_id = ?'); 
                   
                    	// Bind parameters (s = string, i = int, b = blob, etc), in our case the u_id is a int so we use "i"
                    	$stmt->bind_param("i",$_SESSION['u_id']);
                    	$stmt->execute();
                    	$stmt->store_result();
                    	$stmt -> bind_result($uid,$shorturl);
                    	$numberofrows_of_shotner = $stmt->num_rows;
                      	
                    while($stmt -> fetch())
                    {
                            	
                            	
                                $jsons = array(); 
                                $jsons = array('shorturl'=>$shorturl);
                              
                            
                                	$stmts = $con->prepare('SELECT track_id FROM tracking_data WHERE shorturl = ?'); 
                   
                                	// Bind parameters (s = string, i = int, b = blob, etc), in our case the u_id is a int so we use "i"
                                	$stmts->bind_param("s",$jsons['shorturl']);
                                	$stmts->execute();
                                	$stmts->store_result();
                                	$stmts -> bind_result($track_id);
                                    $sum += $numberofrows_of_tracking_data = $stmts->num_rows;
                            
                           
                            
                            
                    }
                   
                 
					$stmt->close();
                    ?>
					
					<div class="side-stats side-statz">
						<div><p><i class="zmdi zmdi-link"></i> <span><?php   echo  $numberofrows_of_shotner; ?></span> <br>URLs</p></div>
						<div><p><i class="zmdi zmdi-mouse"></i> <span><?php   echo  $sum; ?></span> <br>Clicks</p></div>   
					
					</div>
					
									</div>
            </div> 
            
            
<div class="col-md-10 content">     


<div class="row" style="min-height:569px;">	

            <?php 
            
            if($_GET['page']=='settings')
            {
                include "front-modules/settings.php";
            }
            else if($_GET['page']=='profile')
            {
                include "front-modules/profile.php";
            }
            else
            {
                 include "front-modules/home.php";
            }
            
            
            
            
            ?>

   
</div><!--/.row-->    







<?php include "pages/footer.php"?>
            
            
            
            
          </div><!--/.content-->
          
          
        </div><!--/.row-->
        
      </div><!--/.container-->      
    </section>
     
     
    <?php 
    include "../pages/jquery.php";
    ?>
 
	<script>
	
	//dynamic copy button script
	function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).parents('.code-container').find('.code span').text()).select();
    document.execCommand("copy");
    $temp.remove();
}


    // 4sec auto disappear error messages
    $(document).ready(function () {
    
     $('.alert-danger').fadeIn();
    
    setTimeout(function(){
      $('.alert-danger').fadeOut()
    }, 4000); 
     
    });
    
      	/*dISPLAY DATATABLES*/	
      $(document).ready(function() {
    $('#example').DataTable();
} );
	
	</script>
	</body>
</html>