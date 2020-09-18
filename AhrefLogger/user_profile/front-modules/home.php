   <div id="user-content" class="col-md-8 no-padding-right">  	
    		  	
    
      	<!-- Shortener Form -->
      	<div class="overlaylink">
    	<div class="link-shared" id="modal">
    		<!-- close trigger -->
    		<div class="closelink">
    			<span><i class="zmdi zmdi-close"></i></span>
    		</div>
    		<!-- modal content -->
    		<div class="modal-contentlink">
    		</div>
    	</div>
    </div>




  			<div class="main-content panel panel-default"  >
		
			
			<div id="data-container">
						<style rel="stylesheet">
						@media only screen and (max-width: 600px) {
                          .url-container
                          {
                              max-width:380px;overflow:auto;
                          }
                        }
						    
						</style>					
 
                   
			
					<div class="url-container"   style="padding:20px;">
					    
						<table id="example" class="table  table-striped table-bordered  table-hover" style="padding:0px;">
							<thead>
								<tr>
							
									<th  style="min-width:280px"> <i class="fas fa-link"></i> Link</th>
									<th> <i class="fas fa-map-marker-alt"></i> Track Code</th>
									<th style="min-width:80px"> <i class="fas fa-eye"></i> Views</th>
									<th style="text-align:center;"><i class="fas fa-cog" ></i></th>
								</tr>
							</thead>
							<tbody>
						
						
						
						
						
						
							    
							    
					<?php
					
                   
                       $sql = "select * from shotner where u_id='".$_SESSION['u_id']."' order by date desc ";
                       $res=mysqli_query($con,$sql);
                       $user_total_rows =mysqli_num_rows($res);
                       
                       
                       
        if($user_total_rows > 0)
                       {   
                      
                    while($data =mysqli_fetch_array($res))
                        {                                	
                                    
                               
                                                                                            	 
            	         		$fetch_records  = "SELECT * FROM tracking_data WHERE shorturl = '".$data['shorturl']."'";
                                                                                            	    $records = mysqli_query($con,$fetch_records);
                                                                                            	    $totalrows =mysqli_num_rows($records);
            				
                 
                     
                    ?>
                    
					
							    
							    
								<tr class="url-list" >

                            	<td >
                            		<h3 class="title">
                            			<img src="https://www.google.com/s2/favicons?domain=<?php echo  $data['urlinput']; ?>" alt="Favicon">
                            			<a href="<?php echo $data['urlinput'];?>" style="color:#15568d;text-decoration:underline;" ><?php echo $data['title']; ?></a>
                            		</h3>
                            
                            		<p>
										 
										
							
				                    	</p>
                    		<ul class="toggle">
                    		    
                    		    
                    		    
                    			<li class="lock-url-33462">
                    			    
                    			   <?php
                    			   
                    			    
                    			    
                    			      
                    			    
                    			    
                    			    
                    			   
                    			   
                    			    if($data['public'] == 0)
                                    {
                                          
                                          
                                          
                                           
                                             echo '<form  action="front-modules/handler.php" method="post">
                                			        <input type="hidden" name="public" value="1"> 
                                			         <input type="hidden" name="url_id" value="'.$data['uid'].'"> 
                                			         
                                            			    <button class="btn btn-xs btn-success"   name="submit_public" >
                                                            
                                                             <i class="glyphicon glyphicon-eye-open"></i> public
                                                                
                                                            </button>
                                                </form>';
                                                
                                               
                                          
                                          
                                         
                                    }
                                    else
                                    {
                                        
                                        
                                            echo '  <form  method="POST"  action="front-modules/handler.php">
                                        			        <input type="hidden" name="private" value="0"> 
                                        			          <input type="hidden" name="url_id" value="'.$data['uid'].'"> 
                                        			          
                                                    			    <button class="btn btn-xs btn-default"   name="submit_private" >
                                                                    
                                                                     <i class="glyphicon glyphicon-eye-close"></i> private
                                                                        
                                                                    </button>
                                                           </form>  ';
                                        
                                        
                                        
                                              
                                    
                                    }
                                    
                                    
                                    
                                    
                                      
                                    
                                    
                    			   ?>
                    			    
                    						
                    		
                    		
                    		
                    		
                    		
                    		
                    		
                    		
                    		
                    			</li>
                    			
                    			
                    			
                    			
                    			
                    			
                    			
                    			<li>
                    				<span><i class='glyphicon glyphicon-time'></i> <?php echo get_time_ago( strtotime($data['date']) ); ?> </span>
                    			</li>
                    			
                    	    	<li>
                    					
                            	<button type="button" class="btn btn-success btn-xs" data-toggle="collapse" data-target="#<?php echo  $data['shorturl']; ?>">Orignal URL<i class="fas fa-chevron-down"></i></button>
                                 
                            	</li>	
                            	
                            	
                            	<li>
                    					
                            	<button type="button" class="btn btn-success btn-xs" data-toggle="collapse" data-target="#<?php echo  $data['track_code']; ?>">Shot URL<i class="fas fa-chevron-down"></i></button>
                                 
                            	</li>
                            	
                            		<p class="title" style="margin: 10px;"  >		
                            		  <div id="<?php echo  $data['shorturl']; ?>" class="collapse">
                                       <span style="font-weight:bold;"><?php echo $data['urlinput']; ?></span> 
                                      </div>
                    			   </p>
                    			   
                    			   	<p class="title" style="margin: 10px;"  >		
                            		  <div id="<?php echo  $data['track_code']; ?>" class="collapse">
                                       <span style="font-weight:bold;">https://<?php echo $_SERVER['HTTP_HOST']; ?>/url/<?php echo $data['shorturl']; ?>
                                        (<a style="color:#2891e9;text-decoration:underline;" href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/codetrack?val=<?php echo  $data['track_code']; ?>" target="_blank">looking for desire choice?</a>)</span>
                                      </div>
                    			   </p>
                    			
                    			
                    			
                    		</ul>
                    		
                    		
                    		
            	</td>
            	
            	
            	
	
                	<td class="va-middle">
                	   
                	    <!--jquery dynamic button copy code can be found in dashboard page at the bottom-->
                	    
                		<div class="short-url  code-container" style="text-align: center;">
                			<a  id='c1' class="code" href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/codetrack?val=<?php echo  $data['track_code']; ?>" target="_blank">
                				<span  style="font-weight:bold;color:#7cb340;text-decoration:underline;"><?php echo  $data['track_code']; ?></span>
                			</a>
                		
                			 <button class="copy matbtn" style="margin-left:5px;float:;" onclick="copyToClipboard(this)" type="button" class="btn btn-info btn-xs">Copy</button>
                		</div>
                		
                		             		
                		
                	</td>
                	
                	
                	<td class="center">
                		<span class="link-clickz"> <?php 
                		
                		echo $totalrows; 

                		?> </span>
                	</td>
	
                	<td class="center">
                	   
                
                              
                           
                                
                                <?php
                                
                                
                                      if(isset($_POST['submit']))
                                               {
                                
                                                        if (isset($_POST['del']) && is_numeric($_POST['del']) && isset($_POST['del_data_track']))
                                                        {
                                                        
                                                            $uid = $_POST['del'];
                                                            $del_data_track = $_POST['del_data_track'];
                                                            
                                                        
                                                        
                                                            if ($stmt = $con->prepare("DELETE FROM shotner WHERE uid = ? LIMIT 1"))
                                                            {
                                                                $stmt->bind_param("i",$uid);
                                                                $stmt->execute();
                                                                $stmt->close();
                                                                
                                                                //delete all tracking data with the shorturl
                                                                    $stmts = $con->prepare("DELETE FROM tracking_data WHERE shorturl = ?");
                                                                    $stmts->bind_param("s",$del_data_track);
                                                                    $stmts->execute();
                                                                    $stmts->close();
                                                                 
                                                                header("Location: dashboard?page=home");
                                                                exit();
                                                            }
                                                            else
                                                            {
                                                                echo "ERROR: could not prepare SQL statement.";
                                                            }
                                                            $con->close();
                                                        
                                                        
                                                           // header("Location: dashboard?page=settings");
                                                        }
                                                        else
                                                        
                                                        {
                                                           header("Location: dashboard?page=profile");
                                                        }
                                            
                                              }
                                  
                                
                                
                                ?>
                              	    
                         
                          <ul  style="list-style:none; padding: 5px;">  
                                
                           
                               
                              
                            
                         <li>  <a style="color: #337ab7;" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $data['urlinput']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a> </li>
                            
                            <li><a style="color: #337ab7;" href="https://twitter.com/intent/tweet?url=<?php echo $data['urlinput'];  ?>" target="_blank"><i class="fab fa-twitter"></i> </a></li>
                            
                             <li> <form  method="POST">
                                   <input type="hidden" name="del" value="<?php echo $data['uid']; ?>">
                                   <input type="hidden" name="del_data_track" value="<?php echo $data['shorturl']; ?>">
                                 
                                <button class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this?')"  name="submit" >
                                    
                                      <i class="fas fa-times"></i>
                                        
                                    </button>
                               </form>  
                            </li>
                          </ul>
                        
                	       
                	    
                	    
                	    
                	
	
            </tr><!-- /.url-list -->			


                                <?php
                                }
                       }
                           else
                               {
                               echo '<td colspan="8"  style="text-align:center;"><span style="text-align:center;font-weight:bold;">
                                                                                            	       RECORDS NOT FOUND!</span></td>';
                                  }    
                                  
                                  ?>


            											
                </tbody>
						</table>
															
						</div><!-- /.url-conainer -->

			</div><!-- /#data-container -->
		</div><!-- /.main-content -->
  </div><!--/#user-content-->
  <div id="widgets" class="col-md-4">
  			<div class='panel panel-default panel-body' id='widget_news'><h3>Announcement</h3>Hello,

website is now updated to the latest version, now it will work absolutely fine with latest script version. Please clear your browser cache, if you are facing any issue.

Thanks</div> 


    <div class='panel panel-default panel-body' id='widget_top_urls'><h3>Top URLs</h3>
    
    <ul>
        <li>
        		  <a href='#' target='_blank'>
        		      
        		  &nbsp;<img src='https://www.google.com/s2/favicons?domain=https://www.youtube.com/' alt='favicon'>
        		  
        		  YouTube
        		  </a> - <strong>1 Click</strong> <span>6 hours ago </span>
        		  
        </li>
        		  
         <li>
        		  <a href='#' target='_blank'>
        		  &nbsp;<img src='https://www.google.com/s2/favicons?domain=https://www.w3schools.com/JQuery/jquery_get_started.asp' alt='favicon'>
        		  jQuery Get Started
        		  </a> - <strong>1 Click</strong> <span>6 hours ago </span>
        </li>
        		
     </ul>
        		  
 </div>  </div><!--/#widgets-->