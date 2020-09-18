<?php
					
					$sql_prepare = 'SELECT username,public,date FROM users WHERE u_id = ?';
                   
					$stmt = $con->prepare($sql_prepare); 
                   
                    	// Bind parameters (s = string, i = int, b = blob, etc), in our case the u_id is a int so we use "i"
                    	$stmt->bind_param('i', $_SESSION['u_id']);
                    	$stmt->execute();
                  
                    
                    	$stmt->bind_result($username,$public,$date);
                         $json = array();
                         if($stmt->fetch()) {
                                    $json = array('username'=>$username,'public'=>$public,'date'=>$date);
                                    
                             
                                }
                 
					$stmt->close();
					

if($json['public'] == 0)
{
    header('location:dashboard?page=settings&error=0');
}
else
{

	
					   $sql = "select * from shotner where u_id='".$_SESSION['u_id']."' && public=1 order by date desc ";
                       $res=mysqli_query($con,$sql);
                       $user_total_rows =mysqli_num_rows($res);
?>




<div class="infinity-profile">
	<div class="infinity-profile-nav" style="">
		<div class="container">
			<div class="text-center">
				<div class="col-md-2"></div>
				<div class="col-md-8">			
					<div class="avatar-holder row">
						<img src="http://www.gravatar.com/avatar/3234745411d648bbe493138afdd7867e?s=150"  class="avatar pull-left" style="max-width: 108px;">
						<div class="infoz">
							<strong title="<?php echo $json['username']; ?>"><?php echo $json['username']; ?></strong>
							<a href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/public/<?php echo $json['username']; ?>" class="btn mdbtn btn-primary pull-right pro-mdbtn" target="_blank">View Profile</a>
							<br>
							
							<span>Since <?php  
                                            $new = date(' F Y', strtotime($json['date']));
                                            echo $new;?></span>
							
							
						</div>
						<div class="btn-group">
							<a href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/public/<?php echo $json['username']; ?>" class="btn mdbtn btn-primary pro-mdbtn mobile-btn" style="display: none;">View Profile</a>
																
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

	<div class="container content addmargin">
		<div class="row" id="user-content">
			<div class="col-md-8 no-padding-right">
			<div class="panel panel-default panel-body return-ajax" id="data-container" style="">
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
                    				<a href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/url/<?php echo $data['shorturl']; ?>" target="_blank"><?php echo $data['title']; ?></a>
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
                    			?></p>
                    		
                    		
                    		
                    			<div class="short-url">
                    				<i class="zmdi zmdi-link"></i> <a href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/url/<?php echo $data['shorturl']; ?>" target="_blank">https://<?php echo $_SERVER['HTTP_HOST']; ?>/url/<?php echo $data['shorturl']; ?></a>
                    				
                    				&nbsp;&nbsp;•&nbsp;&nbsp;<i class="zmdi zmdi-time"></i><?php echo get_time_ago( strtotime($data['date']) ); ?></div>
                    		</div>
                    		<div class="col-sm-2 url-stats">
                    			<a href="#" class=""><i class="zmdi zmdi-mouse"></i><span> <?php echo $totalrows; ?></span> Clicks</a>
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
				<div class="panel panel-default panel-body" id="widget_social_count" style=""><h3>We are social</h3><a href="https://www.facebook.com/AhrefLogger" target="blank" class="btn-block btn btn-facebook" style="">Like us on Facebook</a><a href="#" target="blank" class="btn-block btn btn-twitter" style="">Follow us on Twitter</a></div>							</div>
		</div>
	</div>

<?php

}
?>
