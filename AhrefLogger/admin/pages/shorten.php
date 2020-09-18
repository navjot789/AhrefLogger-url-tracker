<div class="row">
                             <div class="col-md-12">

                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Shotner</h3>
                            </div>
                            <div class="panel-body table-responsive">
                                <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                            <style>
                                            td{
                                                font-size: 13px;
                                            }
                                            
                                        </style>
                                        <tr>
                                            <th class="all">#UID</th>
                                            <th  class="min-desktop">#UserID</th>
                                            <th class="min-desktop">Memo</th>
                                            <th class="min-desktop ">Long URL</th>
                                            <th class="min-desktop">Title</th>
                                            <th class="min-desktop">Desc</th>
                                            <th class="min-desktop">S-CODE</th>
                                            <th class="min-desktop">T-CODE</th>
                                            <th class="min-desktop">Bitly</th>
                                            <th class="min-desktop">Tiny</th>
                                            <th class="min-desktop">Shote.st</th>
                                             <th class="min-desktop">Public</th>
                                             <th class="min-desktop">E-notify</th>
                                             <th class="min-desktop">Date</th>
                                             <th class="min-desktop">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                          <?php
                                            $sql_prepare = 'SELECT uid,u_id,memo,urlinput,title,description,shorturl,track_code,bitly,tiny,shortest,public,notify,date FROM shotner';
                                            $stmt = $con->prepare($sql_prepare); 
                                            $stmt->execute();
                                            $stmt->bind_result($uid,$u_id,$memo,$urlinput,$title,$description,$shorturl,$track_code,$bitly,$tiny,$shortest,$public,$notify,$date);
                                          
                                              
                                  while($stmt->fetch()) 
                                        {
                                            $json = array();
                                                      
                                              
                                                $json = array('uid'=>$uid,
                                                              'u_id'=>$u_id,
                                                              'memo'=>$memo,
                                                              'urlinput'=>$urlinput,
                                                              'title'=>$title,
                                                              'description'=>$description,
                                                              'shorturl'=>$shorturl,
                                                              'track_code'=>$track_code,
                                                              'bitly'=>$bitly,
                                                              'tiny'=>$tiny,
                                                              'shortest'=>$shortest,
                                                              'public'=>$public,
                                                              'notify'=>$notify,
                                                              'date'=>$date);
                                          
                                        
                                        
                                        
                                        ?>
                                        
                                    
                                        
                                        
                                        
                                        
                                        <tr>
                                            <td><?php echo $json['uid']; ?></td>
                                            <td>
                                                
                                                <?php 
                                                
                                                  if($json['u_id'] == 0){
            																								    
            													 echo '
                                                                                                                           
                                                                     <button disabled class="btn btn-xm btn-disabled " >Guest</button>
                                                                                                                            
                                                                            ';
            																								    
            																}
            																else
            																{
            																   echo $json['u_id']; 
            																}
            																
                                                
                                                ?>
                                            
                                            </td>
                                            
                                            
                                            <td><?php echo '<span style="font-size:13px;" class="show-read-more" >'.$json['memo'].'</span>'; ?></td>
                                            <td><span class="show-read-more"><?php echo $json['urlinput']; ?></span></td>
                                            
                                            
                                            <td>
                                              
                                               
                                                                                      <?php if($json['title']=='')
                                                                                         { echo '<STRONG style="font-size:13px;">ERROR: 404</STRONG>';}
                                                                                        else
                                                                                        {echo '<img src="https://www.google.com/s2/favicons?domain='.$json['urlinput'].'" alt="Favicon">
                                                                                                <span style="font-size:13px;" class="show-read-more" >'.$json['title'].'</span>';
                                                                                        }?>
                                                    
                                                    
                            		            
                            		          
                                                
                                                </td>
                                            
                                            
                                            <td> <span class="show-read-more"><?php if($json['description']=='')
                                                                                         { echo '<STRONG>ERROR: 404</STRONG>';}
                                                                                        else
                                                                                        {echo $json['description'];
                                                                                        }?>
                                           </span></td>
                                           
                                            <td><?php echo $json['shorturl']; ?></td>
                                            <td><?php echo $json['track_code']; ?></td>
                                            <td><?php echo $json['bitly']; ?></td>
                                            <td><?php echo $json['tiny']; ?></td>
                                            <td><?php echo $json['shortest']; ?></td>
                                            
                                            <td>
                                                <?php
                                                                                                         if($json['u_id'] == 0 && $json['public']==0){
            																								    
            																								    echo '<form >
                                                                                                                           
                                                                                                                            <button  disabled class="btn btn-disabled btn-sm" >N/A</button>
                                                                                                                            
                                                                                                                            </form>';
            																								    
            																								}
                                               
                                                                                                           else if($json['public']==0)
            																								{
            																									echo '<form action="pages/action/handler" method="post">
                                                                                                                             <input type="hidden" value="'.$json['uid'].'" name="uid">
                                                                                                                       
                                                                                                                            <button  class="btn btn-sm"  name="submit_public_public"><i class="fas fa-eye"></i> Public
                                                                                                                            
                                                                                                                            </form>';
            																								}
            																								
            																								else
            																								{
            																								    	echo '<form action="pages/action/handler" method="post">
                                                                                                                             <input type="hidden" value="'.$json['uid'].'" name="uid">
                                                                                                                       
                                                                                                                            <button  class="btn btn-success btn-sm" name="submit_public_private"><i class="fas fa-eye-slash"></i> Private
                                                                                                                            
                                                                                                                            </form>';
            																								}
            																								
            																							
                                                                                                            
                                                                                                       
                                              
                                                
                                                
                                                ?>
                                            </td>
                                            
                                            
                                            <td> <?php
                                               
                                                                                                         if($json['u_id'] == 0 && $json['notify']==0){
            																								    
            																								    echo '<form >
                                                                                                                           
                                                                                                                            <button  disabled class="btn btn-disabled btn-sm" >N/A</button>
                                                                                                                            
                                                                                                                            </form>';
            																								    
            																								}
                                                                                                            
                                                                                                           else if($json['notify']==0)
            																								{
            																									echo '<form action="pages/action/handler" method="post">
                                                                                                                             <input type="hidden" value="'.$json['uid'].'" name="uid">
                                                                                                                       
                                                                                                                            <button  class="btn btn-sm" name="submit_e_enable"> <i class="fas fa-bell"></i> Enable
                                                                                                                            
                                                                                                                            </form>';
            																								}else
            																								{
            																								    	echo '<form action="pages/action/handler" method="post">
                                                                                                                             <input type="hidden" value="'.$json['uid'].'" name="uid">
                                                                                                                       
                                                                                                                            <button  class="btn btn-success btn-sm" name="submit_e_disable"><i class="fas fa-bell-slash"></i> Disable
                                                                                                                            
                                                                                                                            </form>';
            																								}
            																								
            																							
                                                                                                            
                                                                                                       
                                              
                                                
                                                
                                                ?></td>
                                            <td><?php echo $json['date']; ?></td>
                                            <td> 
											<form action="pages/action/handler" method="post">
                                                                   <input type="hidden" value="<?php echo $json['uid']; ?>" name="uid">
                                                                    <input type="hidden" value="<?php echo $json['shorturl']; ?>" name="shorturl">
                                                                                       <button  class="btn btn-danger btn-xs"  name="submit_delete_shotner"><i class="fas fa-times-circle"></i> Delete
                                                                                                                            
                                              </form>														
											</td>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        </tr>
                                        
                                        <?php   
                                                                        
                                           }  //$stmt->close();     

                          
                                                                 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
					</div>
				</div>
                        <!--===================================================-->
                        <!-- End Striped Table -->
                        <!-- Row selection (single row) -->