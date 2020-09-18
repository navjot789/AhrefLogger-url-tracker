 
                                 <?php
                                 $bundle = mysqli_real_escape_string($con,htmlentities($_POST['bundle'])); 
                	             $bundle_type = mysqli_real_escape_string($con,htmlentities($_POST['bundle_type']));
                                 $domain_sub_bundle = mysqli_real_escape_string($con,htmlentities($_POST['domain_sub_bundle']));
                                 $ext_bundle = mysqli_real_escape_string($con,htmlentities($_POST['ext_bundle']));
                                 
                                 
                           if(isset($_POST['submit']))      
                           {
                                             
                                            
                                            
                                             
                                                       if(!empty($_POST['bundle']) && !empty($_POST['bundle_type']) && !empty($_POST['domain_sub_bundle']))
                                                         {
                                                             //domain_cat_sub
                                                       
                                                                              
                                                                    		            	
                                                                                                    $sql_prepare = 'insert into bundles(bundle,cat,sub) values(?, ?, ?)';
                                                                                                    $stmt = $con->prepare($sql_prepare); 
                                                                                                    $stmt->bind_param('sss',$bundle,$bundle_type,$domain_sub_bundle);
                                                                                                     if($stmt->execute())
                                                                                                    {
                                                                                                                $success =  '
                                                                                                 
                                                                                                       
                                                                                                        <div class="alert alert-success">  
                                                                                                            <button type="button" class="close" data-dismiss="alert" style="top:10px;">×</button>  
                                                                                                            <strong>Bundle Added Successfully.</strong> 
                                                                                                        </div>   '; 
                                                                                                    }else
                                                                                                    {
                                                                                                         $error =  '
                                                                                                 
                                                                                                       
                                                                                                        <div class="alert alert-danger">  
                                                                                                            <button type="button" class="close" data-dismiss="alert" style="top:10px;">×</button>  
                                                                                                            <strong>ERROR:</strong>SQL 
                                                                                                        </div>   ';
                                                                                                        
                                                                                                    }
                                                                                                    
                                                                                                     /* close statement and connection */
                                                                                                    $stmt->close();
                                                                                                
                                                                                                  
                                                            
                                                                                   
                                                        
                                                        }
                                                        
                                                        
                                                        
                                                    else if(!empty($_POST['bundle']) && !empty($_POST['bundle_type']) && !empty($_POST['ext_bundle']))
                                                         {
                                                             
                                                         //ext_cat_sub
                                                             $bundle = '.'.$bundle; //adding comma before inserting in extension
                                                         
                                                                                $sql_prepare = 'insert into bundles(bundle,cat,sub) values(?, ?, ?)';
                                                                                $stmt = $con->prepare($sql_prepare); 
                                                                                $stmt->bind_param('sss',$bundle,$bundle_type,$ext_bundle);
                                                                                if($stmt->execute())
                                                                                {
                                                                                            $success =  '
                                                                             
                                                                                   
                                                                                    <div class="alert alert-success">  
                                                                                        <button type="button" class="close" data-dismiss="alert" style="top:10px;">×</button>  
                                                                                        <strong>Bundle Added Successfully.</strong> 
                                                                                    </div>   '; 
                                                                                }else
                                                                                {
                                                                                     $error =  '
                                                                             
                                                                                   
                                                                                    <div class="alert alert-danger">  
                                                                                        <button type="button" class="close" data-dismiss="alert" style="top:10px;">×</button>  
                                                                                        <strong>ERROR:</strong>SQL 
                                                                                    </div>   ';
                                                                                    
                                                                                }
                                                                                
                                                                                 /* close statement and connection */
                                                                                $stmt->close();
                                                                            
                                                                               
                                                                                
                                                                 
                                                        }    
                                                        
                                                        
                                                  else  if( !empty($_POST['bundle']) && !empty($_POST['bundle_type'])  )
                                                        {
                                                            //path_cat
                                                           
                                                           
                                                           
                                                                     
                                                                                                    $sql_prepare = 'insert into bundles(bundle,cat) values(?, ?)';
                                                                                                            $stmt = $con->prepare($sql_prepare); 
                                                                                                            $stmt->bind_param('ss',$bundle,$bundle_type);
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            if($stmt->execute())
                                                                                                            {
                                                                                                                        $success =  '
                                                                                                         
                                                                                                               
                                                                                                                <div class="alert alert-success">  
                                                                                                                    <button type="button" class="close" data-dismiss="alert" style="top:10px;">×</button>  
                                                                                                                    <strong>Bundle Added Successfully.</strong> 
                                                                                                                </div>   '; 
                                                                                                            }else
                                                                                                            {
                                                                                                                 $error =  '
                                                                                                         
                                                                                                               
                                                                                                                <div class="alert alert-danger">  
                                                                                                                    <button type="button" class="close" data-dismiss="alert" style="top:10px;">×</button>  
                                                                                                                    <strong>ERROR:</strong>SQL 
                                                                                                                </div>   ';
                                                                                                                
                                                                                                            }
                                                                                                            
                                                                                                             /* close statement and connection */
                                                                                                            $stmt->close();
                                                                                                        
                                                                                                           
                                                                                    
                                                                        
                                                                    
                                                        }
                                                        
                                                        else{
                                                            
                                                            
                                        		            	$error =  '
                                                         
                                                               
                                                                <div class="alert alert-danger">  
                                                                    <button type="button" class="close" data-dismiss="alert" style="top:10px;">×</button>  
                                                                    <strong>ERROR:</strong>404 
                                                                </div>   ';
                                                            
                                                            
                                                        }
                                                
                                           
                                            
                           }
                                  ?>
                            
                            
                            
                            
                            
                            <div class="col-md-10" style="float:none; margin:0 auto;" >
                                <?php echo $error.$success; ?>
                                
                              <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                    
                                            <a href="https://ahref.tech/" class="btn btn-default" >visit site</a>
                                        </div>
                                        <h3 class="panel-title"><i class="fas fa-link"></i> Domain Customizer</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p>Presented view of Active Avaliable Domains.</p>
                                        <form class="form-horizontal form-bordered">
                                            <div class="form-group">
                                                <label class="control-label col-md-4"> Domain </label>
                                                <div class="col-md-8">
                                                    
                                                    
                                                    
                                                    
                                                    <!-- Default Bootstrap Select -->
                                                    <!--===================================================-->
                                                    <div class="btn-group bootstrap-select form-control">
                                                        
                                                   <select class="form-control selectpicker" tabindex="-98"> 
                                                   
                                                   
                                                   
                                                   <!--heading Main-->  <option disabled>MAIN</option>
                                                            <?php
                                                                 
                                                                
                                                                
                                                                //category
                                                                $domain = 'domain';
                                                                $path = 'path';
                                                                $extension = 'extension';
                                                                
                                                                //sub_category
                                                                $main ='1';
                                                                $tech ='2';
                                                                $social = '3';
                                                                
                                                                
                                                             //sql_query 1 for main category      
                                                                
                                                            	$sql1 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                    					        $st1 = $con->prepare($sql1); 
                                                                $st1->bind_param('ss', $domain, $main);
                                                                $st1->execute();
                                                                $st1->bind_result($main_domains);
                                                                $json1 = array();
                                                                    
                                                              while($st1->fetch())
                                                              {
                                                                                $json1 = array('main_domains'=>$main_domains);
                                                                                $json1['main_domains'];
                                                                         
                                                                            
                                            				
                                                            
                                                                      ?>
                                                               
                                                       
                                                   
                                                         
                                                             
                                                              <option ><?php echo $json1['main_domains'];?></option>
                                                              
                                                        
                                                        
                                                                    <?php
                                                              }
                                                                
                                                                	$st1->close(); //close 1
                                                                
                                                                ?>
                                                                
                                                                
                                                            <!--heading Tech--><option disabled>TECH</option>
                                                                
                                                                
                                                                
                                                                
                                                                <?php
                                                    //sql_query 2 for tech category  	
                                                                	
                                                                $sql2 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                    					        $st2 = $con->prepare($sql2); 
                                                                $st2->bind_param('ss', $domain, $tech);
                                                                $st2->execute();
                                                                $st2->bind_result($tech_domains);
                                                                $json2 = array();
                                                                    
                                                              while($st2->fetch())
                                                              {
                                                                                $json2 = array('tech_domains'=>$tech_domains);
                                                                                $json2['tech_domains'];
                                                                	
                                                                	
                                                                	
                                                                	
                                                                	
                                                                	
                                                              ?>
                                                    
                                                    
                                                                <option ><?php echo $json2['tech_domains'];?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }	$st2->close(); // close 2
                                                             ?>
                                                            
                                             <!--heading Social--><option disabled>SOCIAL</option>
                                                                
                                                     <?php
                                                    //sql_query 3 for SOCIAL category  	
                                                                	
                                                                $sql3 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                    					        $st3 = $con->prepare($sql3); 
                                                                $st3->bind_param('ss', $domain, $social);
                                                                $st3->execute();
                                                                $st3->bind_result($social_domains);
                                                                $json3 = array();
                                                                    
                                                              while($st3->fetch())
                                                              {
                                                                                $json3 = array('social_domains'=>$social_domains);
                                                                                $json3['social_domains'];
                                                                	
                                                                	
                                                                	
                                                                	
                                                                	
                                                                	
                                                              ?>
                                                    
                                                    
                                                                <option ><?php echo $json3['social_domains'];?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }	$st3->close(); // close 3
                                                             ?>
                                                               
                                                    
                                                    
                                                    </select>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    </div>
                                                    <!--===================================================-->
                                                </div>
                                            </div>
                                            
                                            
                                             <div class="form-group">
                                                <label class="control-label col-md-4"> Path </label>
                                                <div class="col-md-8">
                                                    <!-- Default Bootstrap Select -->
                                                    <!--===================================================-->
                                                    <div class="btn-group bootstrap-select form-control">
                                                       
                                                       
                                                    <select class="form-control selectpicker" tabindex="-98">
                                                       
                                                       
                                                        
                                                                
                                                     <?php
                                                    //sql_query 4 for path category  	
                                                                	
                                                                $sql4 = 'SELECT bundle FROM bundles WHERE cat = ?';
                                    					        $st4 = $con->prepare($sql4); 
                                                                $st4->bind_param('s', $path);
                                                                $st4->execute();
                                                                $st4->bind_result($domain_path);
                                                                $json4 = array();
                                                                    
                                                              while($st4->fetch())
                                                              {
                                                                                $json4 = array('domain_path'=>$domain_path);
                                                                                $json4['domain_path'];
                                                                	
                                                                	
                                                                	
                                                                	
                                                                	
                                                                	
                                                              ?>
                                                    
                                                    
                                                                <option ><?php echo $json4['domain_path'];?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }	$st4->close(); // close 4
                                                             ?>
                                                               
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                    </select>
                                                    </div>
                                                    <!--===================================================-->
                                                </div>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label class="control-label col-md-4"> extension </label>
                                                <div class="col-md-8">
                                                    <!-- Default Bootstrap Select -->
                                                    <!--===================================================-->
                                                    <div class="btn-group bootstrap-select form-control">
                                                       
                                                       
                                                    <select class="form-control selectpicker" tabindex="-98">
                                                 <!--heading None-->                <option value="">None</option>
                                                  <!--heading image formats-->      <option disabled>image formats</option>
                                                        <?php
                                                    //sql_query 5 for ext category  

                                                             //sub_category_extension
                                                                $image = '1';
                                                                $audio = '2';
                                                                $video = '3';
                                                                $compress = '4';
                                                                $other = '5';
                                                    
                                                                	
                                                                $sql5 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                    					        $st5 = $con->prepare($sql5); 
                                                                $st5->bind_param('ss', $extension,$image);
                                                                $st5->execute();
                                                                $st5->bind_result($image_ext);
                                                                $json5 = array();
                                                                    
                                                              while($st5->fetch())
                                                              {
                                                                                $json5 = array('image_ext'=>$image_ext);
                                                                                $ext = str_replace( '.', '',  $json5['image_ext'] ); //removing comma from  extension
                                                                	
                                                                	
                                                                	
                                                                	
                                                              ?>
                                                    
                                                    
                                                                <option ><?php echo  $ext;?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }	$st5->close(); // close 5
                                                             ?>
                                                    
                                                    
                     <!--heading audio formats-->          <option disabled>Audio formats</option>
                                                    
                                                    
                                                        <?php
                                                    //sql_query 6 for ext category  

                                                                	
                                                                $sql6 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                    					        $st6 = $con->prepare($sql6); 
                                                                $st6->bind_param('ss', $extension,$audio);
                                                                $st6->execute();
                                                                $st6->bind_result($audio_ext);
                                                                $json6 = array();
                                                                    
                                                              while($st6->fetch())
                                                              {
                                                                                $json6 = array('audio_ext'=>$audio_ext);
                                                                                $ext = str_replace( '.', '',  $json6['audio_ext'] ); //removing comma from  extension
                                                                	
                                                                	
                                                                	
                                                                	
                                                              ?>
                                                    
                                                    
                                                                <option ><?php echo  $ext;?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }	$st6->close(); // close 6
                                                             ?>
                                                    
                                                    
                                                   <!--heading Video formats--><option disabled>Video formats</option>
                                                    
                                                    
                                                        <?php
                                                    //sql_query 7 for ext category  

                                                                	
                                                                $sql7 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                    					        $st7 = $con->prepare($sql7); 
                                                                $st7->bind_param('ss', $extension,$video);
                                                                $st7->execute();
                                                                $st7->bind_result($video_ext);
                                                                $json7 = array();
                                                                    
                                                              while($st7->fetch())
                                                              {
                                                                                $json7 = array('audio_ext'=>$video_ext);
                                                                                $ext = str_replace( '.', '',  $json7['audio_ext'] ); //removing comma from  extension
                                                                	
                                                                	
                                                                	
                                                                	
                                                              ?>
                                                    
                                                    
                                                                <option ><?php echo  $ext;?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }	$st7->close(); // close 7
                                                             ?> 
                                                    
                                                    
                                         <!--heading Compressed formats--><option disabled>Compressed formats</option>
                                                    
                                                    
                                                        <?php
                                                    //sql_query 8 for ext category  

                                                                	
                                                                $sql8 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                    					        $st8 = $con->prepare($sql8); 
                                                                $st8->bind_param('ss', $extension,$compress);
                                                                $st8->execute();
                                                                $st8->bind_result($compress_ext);
                                                                $json8 = array();
                                                                    
                                                              while($st8->fetch())
                                                              {
                                                                                $json8 = array('compress'=>$compress_ext);
                                                                                $ext = str_replace( '.', '',  $json8['compress'] ); //removing comma from  extension
                                                                	
                                                                	
                                                                	
                                                                	
                                                              ?>
                                                    
                                                    
                                                                <option ><?php echo  $ext;?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }	$st8->close(); // close 8
                                                             ?> 
                                                    
                                                    
                                                     <!--heading Other formats--><option disabled>Other formats</option>
                                                    
                                                    
                                                        <?php
                                                    //sql_query 9 for ext category  

                                                                	
                                                                $sql9 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                    					        $st9 = $con->prepare($sql9); 
                                                                $st9->bind_param('ss', $extension,$other);
                                                                $st9->execute();
                                                                $st9->bind_result($other_ext);
                                                                $json9 = array();
                                                                    
                                                              while($st9->fetch())
                                                              {
                                                                                $json9 = array('other'=>$other_ext);
                                                                                $ext = str_replace( '.', '',  $json9['other'] ); //removing comma from  extension
                                                                	
                                                                	
                                                                	
                                                                	
                                                              ?>
                                                    
                                                    
                                                                <option ><?php echo  $ext;?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }	$st9->close(); // close 9
                                                             ?> 
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    </select>
                                                    
                                                    
                                                    
                                                    
                                          
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    </div>
                                                    <!--===================================================-->
                                                </div>
                                            </div>
                                          
                                                    <!--===================================================-->
                                                </div>
                                            </form>
                                            
                                            </div>
                                        
                                    </div>
                                    
                                    
                                      <div class="col-md-10" style="float:none; margin:0 auto;">                    
                                                  <div class="panel">
                                                    <div class="panel-heading">
                                                       
                                                        <h3 class="panel-title">Domain || Path || Extension  </h3>
                                                    </div>
                                                    <p></p>
                                                               
                                                               
                                                                <div class="panel-body" >
                                                                       
                                                                        <div class="form-group mar-hor">
                                                                          
                                                                            <pre style="max-width: 350px;"><code>Note: Add domain without Protocol.</code></br><code>Note: Add Domain with TLD </code></pre>
                                                                          
                                                                            
                                                                        </div>
                                                                  </div>      
                                                                
                                                    <div class="panel-body">
                                                        <!-- Inline Form  -->
                                                        <!--===================================================-->
                                                        <form class="form-inline" method="post">
                                                            
                                                            <style>
                                                            
                                                                @media only screen and (min-width: 600px) {
                                                                  .minwidth{
                                                                      min-width: 400px;
                                                                  }
                                                                }
                                                                                                                                
                                                                
                                                            </style>
                                                            <div class="form-group mar-hor">
                                                               
                                                                <input type="text" placeholder="Domain OR Path OR Extension" class="form-control minwidth" name="bundle" >
                                                            
                                                            </div>
                                                           
                                                           <!--hide select tag script can be found in jquery page-->
                                                            <div class="form-group mar-hor">
                                                               
                                                                <div class="btn-group bootstrap-select form-control">
                                                       
                                                           
                                                                        <select class="form-control selectpicker" tabindex="-98" name="bundle_type" id="bundle">
                                                                        <option selected disabled>---Category---</option>    
                                                                        <option value="domain">Domain</option>
                                                                        <option value="path">Path</option>
                                                                        <option value="extension">Extension</option>
                                                                     
                                                                    </select>
                                                               </div>
                                                            </div>
                                                            
                                                            <div class="hidingDiv form-group mar-hor">
                                                               
                                                               
                                                                <div class="domain btn-group bootstrap-select form-control ">
                                                       
                                                           
                                                                        <select class=" form-control selectpicker" tabindex="-98" name="domain_sub_bundle" >
                                                                        <option selected disabled value="">---Sub-Category---</option>  
                                                                        <option value="1">Main</option>
                                                                        <option value="2">Tech</option>
                                                                        <option value="3">Social</option>
                                                                        
                                                                     
                                                                    </select>
                                                               </div>
                                                               
                                                               
                                                                 <div class="extension btn-group bootstrap-select form-control ">
                                                       
                                                           
                                                                    <select class="form-control selectpicker" tabindex="-98" name="ext_bundle">
                                                                        
                                                                        <option selected disabled>---Sub-type---</option>    
                                                                        <option value="1">image</option>
                                                                        <option value="2">audio</option>
                                                                        <option value="3">video</option>
                                                                        <option value="4">compress</option>
                                                                        <option value="5">other</option>
                                                                        
                                                                     
                                                                    </select>
                                                                    
                                                                    
                                                               </div>
                                                               
                                                               
                                                               
                                                               
                                                               
                                                               
                                                               
                                                            </div>
                                                            
                                                         
                                                            
                                                            
                                                           
                                                           
                                                            <button class="btn btn-info" name="submit" type="submit"><i class="fas fa-plus"></i> Add</button> 
                                                        </form>
                                                     </div>
                                                        
                                                        
                                                       
                                                        
                                                        
                                                    </div>
                                                 </div>
                                               </div>                      
                                    
                                    
                                