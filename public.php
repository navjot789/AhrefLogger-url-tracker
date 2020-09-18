<?php
include 'connection/connect.php';
session_start();
date_default_timezone_set('Asia/Kolkata');




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





					
            				$sql_prepare = 'SELECT u_id,username,public,date FROM users WHERE username = ?';
                           
        					$stmt = $con->prepare($sql_prepare); 
                           
                            	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a int so we use "s"
                            	$stmt->bind_param('s', $_GET['external_username']);
                            	$stmt->execute();
                                $stmt->bind_result($u_id,$username,$public,$date);
                                $stmt->store_result();
                                
                         $json = array();
                         if($stmt->fetch()) {
                                    $json = array('u_id'=>$u_id,'username'=>$username,'public'=>$public,'date'=>$date);
                                    
                             
                                }
                 	
				
            					
                         
                               
    if($stmt->num_rows > 0)         
          {                    
                 if($json['public'] == 0)
                       {
                           
                       	$stmt->close();
                        header('location:https://ahref.tech/user_profile_not_active');
                        
                                        
                        
                      }
                    else
                    {
                        					   $sql = "select * from shotner where u_id='".$json['u_id']."' && public=1 order by date desc ";
                                               $res=mysqli_query($con,$sql);
                                               $user_total_rows =mysqli_num_rows($res);
            
            


?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

  <?php include 'pages/head.php';?>
  
 
  <div id="focus-overlay"></div>
  <body class='light home' id="body">
        <a href="#body" id="back-to-top"><i class="zmdi zmdi-chevron-up"></i></a>
            
  <?php include 'pages/header.php';?>  
  <?php include 'pages/m_header.php';?>  
	   
	   
	   <section class="under-head-cont">
	       
<div class="infinity-profile">
	<div class="infinity-profile-nav" >
		<div class="container">
			<div class="text-center">
				<div class="col-md-2"></div>
				<div class="col-md-8">			
					<div class="avatar-holder row">
						<img src="http://www.gravatar.com/avatar/3234745411d648bbe493138afdd7867e?s=150" alt="ns789's Avatar" class="avatar pull-left">
						<div class="infoz">
							<strong title="<?php echo $json['username']; ?>"><?php echo $json['username']; ?></strong>
						
							    
							    
							    <ul class="nav navbar-nav pull-right  " >
                                    
                                
                                    <li class="dropdown">
                                      <button class="dropdown-toggle btn-primary pro-mdbtn" data-toggle="dropdown" style="border-radius:30px;"><i class="fas fa-share-alt"></i> <b class="caret"></b></button>
                                      <ul class="dropdown-menu">
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://ahref.tech/public/<?php echo $json['username'];?>">facebook</a></li>
                                        <li><a href="https://api.whatsapp.com/send?text=https://ahref.tech/public/<?php echo $json['username'];?>">twitter</a></li>
                                       
                                        <li class="divider"></li>
                                        <li><a href="https://api.whatsapp.com/send?text=https://ahref.tech/public/<?php echo $json['username'];?>">WhatsApp</a></li>
                                       
                                      </ul>
                                    </li>
                                  </ul>
							    
							    
							    
							    
							    
							    
							    
							    
							    
							
							
							
							
							
						
							<br>
							<span>Since <?php  
                                            $new = date('l, F Y', strtotime($json['date']));
                                            echo $new;?></span>
						</div>
					
					</div>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-12">
					<div class="row clearfix">
					
						<div class="nav-item">
							<h2><?php echo $user_total_rows; ?></h2>
							<strong>Public URLs</strong>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<div class="container content addmargin" style="    min-height: 300px;">
		<div class="row" id="user-content">
			<div class="col-md-8 no-padding-right">
								<div class="panel panel-default panel-body return-ajax" id="data-container" >
					<h3>Public URLs</h3>
				
							
			<?php
			
        if($user_total_rows > 0)
                       {   
                      
                    while($data =mysqli_fetch_array($res))
                        {                                	
                                    
                               
                                                                                            	 
            	         		$fetch_records  = "SELECT * FROM tracking_data WHERE shorturl = '".$data['shorturl']."'";
                                                                                            	    $records = mysqli_query($con,$fetch_records);
                                                                                            	    $totalrows =mysqli_num_rows($records);
            				
                   
			
			?>
					
					
				<div class="url-list fix" id="url-container-33462" data-id="33462">
            	<div class="row">
            		<div class="col-sm-10 url-info">
            			<h3 class="title">
            			<img src="https://www.google.com/s2/favicons?domain=<?php echo $data['urlinput']; ?>" alt="Favicon">
                    				<a  style="color: #6091c1 !important;" href="https://ahref.tech/url/<?php echo $data['shorturl']; ?>" target="_blank"><?php echo $data['title']; ?></a>
            			</h3>
            			
            			
            		<p class="description"><?php 
            		
            		if($data['description'] !== '')
                    			{
                    			echo $data['description']; 
                    			}
                    			else
                    			{
                    			    echo 'No Description Found.';
                    			}
            		
            		?>
            		</p>
            		
            		
            			<div class="short-url">
            				<i class="zmdi zmdi-link"></i> <a href="https://ahref.tech/url/<?php echo $data['shorturl']; ?>" target="_blank">https://ahref.tech/url/<?php echo $data['shorturl']; ?></a>				
            				&nbsp;&nbsp;&nbsp;&nbsp;<i class="zmdi zmdi-time"></i><?php echo get_time_ago( strtotime($data['date']) ); ?>		
            				
            				</div>
            		</div>
            		<div class="col-sm-2 url-stats">
            			<a href="#" target="_blank" class=""><i class="zmdi zmdi-mouse"></i><span><?php echo $totalrows; ?></span> Clicks</a>
            		</div>
            	</div>
                </div><!-- /.url-list -->	
                
                
                 <?php
                        } 
                           
                       }
                       else
                       {
                           echo '<div class="center">
                           
                                           <span class="zmdi-hc-stack zmdi-hc-lg" style="-webkit-filter: drop-shadow(0px 9px 7px rgba(195, 116, 74, 0.49));filter: drop-shadow(0px 9px 7px rgba(195, 116, 74, 0.49));width: 5em;height: 5em;line-height: 5em;margin-bottom: 19px;">
                                           
                                                   <i class="zmdi zmdi-circle zmdi-hc-stack-2x" style="color: #e06c2c;font-size: 5em;"></i>
                                                   <i class="zmdi zmdi-cloud-off zmdi-hc-stack-1x zmdi-hc-inverse" style="font-size: 33px;"></i>
                                                   </span>
                                                   
                                           <br>
                							<h3>No Public URL Found</h3>
        							
        						        </div>';
                       }
                 ?>
                
                
 											
												
		</div>	
			</div>
			<div class="col-md-4">
				<div class="panel panel-default panel-body" id="widget_social_count" ><h3>We are social</h3><a href="https://www.facebook.com/AhrefLogger" target="blank" class="btn-block btn btn-facebook" style="background: rgb(35, 53, 91) !important;">Like us on Facebook</a><a href="#" target="blank" class="btn-block btn btn-twitter" style="background: rgb(29, 71, 96) !important;">Follow us on Twitter</a></div>							</div>
		</div>
	</div>
</section>
	      



  <?php include 'pages/footer.php';?>  

  <?php include 'pages/jquery.php';?>  

	</body>


</html>

 <?php
 
}
          }
          else{
               header('location:https://ahref.tech/user_profile_not_exist');
          }
          
           
            


?>
