<div class="row">
                             <div class="col-md-12">

                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Tracked Data</h3>
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
                                            <th class="all">#TrackID</th>
                                            <th  class="min-desktop">#IP</th>
                                            <th class="min-desktop">Browser</th>
                                            <th class="min-desktop ">O.S</th>
                                            <th class="min-desktop">Full Spec</th>
                                            <th class="min-desktop">Bot</th>
                                            <th class="min-desktop">Country</th>
                                            <th class="min-desktop">Region</th>
                                            <th class="min-desktop">ISP</th>
                                            <th class="min-desktop">LAT</th>
                                            <th class="min-desktop">LON</th>
                                             <th class="min-desktop">Shorturl</th>
                                             <th class="min-desktop">Date</th>
                                            
                                             <th class="min-desktop">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                          <?php
                                            $sql_prepare = 'SELECT track_id,ip,browser,os,complete,bot_status,country,region,isp,lat,lon,shorturl,date_time FROM tracking_data';
                                            $stmt = $con->prepare($sql_prepare); 
                                            $stmt->execute();
                                            $stmt->bind_result($track_id,$ip,$browser,$os,$complete,$bot_status,$country,$region,$isp,$lat,$lon,$shorturl,$date_time);
                                          
                                              
                                  while($stmt->fetch()) 
                                        {
                                            $json = array();
                                                      
                                              
                                                $json = array('track_id'=>$track_id,
                                                              'ip'=>$ip,
                                                              'browser'=>$browser,
                                                              'os'=>$os,
                                                              'complete'=>$complete,
                                                              'bot_status'=>$bot_status,
                                                              'country'=>$country,
                                                              'region'=>$region,
                                                              'isp'=>$isp,
                                                              'lat'=>$lat,
                                                              'lon'=>$lon,
                                                              'shorturl'=>$shorturl,
                                                              'date_time'=>$date_time);
                                          
                                        
                                        
                                        
                                        ?>
                                        
                                    
                                        
                                        
                                        
                                        
                                        <tr>
                                            <td><?php echo $json['track_id']; ?></td>
                                            <td>
                                                
                                               
                                                
                                                 <?php echo $json['ip']; ?>
            																
                                                
                                              
                                            
                                            </td>
                                            
                                            
                                            <td>  <?php echo $json['browser']; ?></td>
                                            <td><?php echo $json['os']; ?></td>
                                            
                                            
                                            <td>
                                              
                                              
                                                                                      <?php if($json['complete']=='')
                                                                                         { echo '<STRONG style="font-size:13px;">ERROR:404 USER-AGENT!</STRONG>';}
                                                                                        else
                                                                                        {echo '
                                                                                                <span style="font-size:13px;margin-top:0px;" class="show-read-more" >'.$json['complete'].'</span>';
                                                                                        }?>
                                                    
                                                    
                            		            
                            		                 
                            	            
                                                
                                                </td>
                                            
                                            
                                            <td> <span class="show-read-more"><?php if($json['bot_status'] == 1)
                                                                                        {
                                                                                           echo '<button class="btn btn-xm" disabled><i class="fas fa-robot"></i></button>';
                                                                                        }
                                                                                        else
                                                                                        { echo '<button class="btn btn-xm" disabled><i class="fas fa-user"></i></button>';
                                                                                        }?>
                                           </span></td>
                                           
                                            <td><?php echo $json['country']; ?></td>
                                            <td><?php echo $json['region']; ?></td>
                                            <td><?php echo $json['isp']; ?></td>
                                            <td><?php echo $json['lat']; ?></td>
                                            <td><?php echo $json['lon']; ?></td>
                                            <td><?php echo $json['shorturl']; ?></td>
                                            <td><?php echo $json['date_time']; ?></td>
                                            
                                              <td> 
											<form action="pages/action/handler" method="post">
                                                                   <input type="hidden" value="<?php echo $json['track_id']; ?>" name="track_id">
                                                                   
                                                                                       <button  class="btn btn-danger btn-xs"  name="submit_delete_track_data"><i class="fas fa-times-circle"></i> Delete
                                                                                                                            
                                              </form>		
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
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