
<div class="row">
                             <div class="col-md-12">

                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">User Login Activity</h3>
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
                                            <th class="all">#ACID</th>
                                            <th  class="min-desktop">#UID</th>
                                            <th class="min-desktop">IP</th>
                                            <th class="min-desktop ">Login At</th>
                                            <th class="min-desktop">Logout At</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                          <?php
                                            $sql_prepare = 'SELECT ac_id,u_id,activity_ip,login_at,logout_at FROM user_activity order by ac_id DESC';
                                            $stmt = $con->prepare($sql_prepare); 
                                            $stmt->execute();
                                            $stmt->bind_result($ac_id,$u_id,$activity_ip,$login_at,$logout_at);
                                          
                                              
                                  while($stmt->fetch()) 
                                        {
                                            $json = array();
                                                      
                                              
                                                $json = array('ac_id'=>$ac_id,
                                                              'u_id'=>$u_id,
                                                              'activity_ip'=>$activity_ip,
                                                              'login_at'=>$login_at,
                                                              'logout_at'=>$logout_at);
                                          
                                        
                                        ?>
                                        
                                    
                                        
                                        
                                        
                                        
                                        <tr>
                                            <td><?php echo $json['ac_id']; ?></td>
                                            <td><?php echo $json['u_id']; ?></td>
                                            <td><?php echo $json['activity_ip']; ?> </td>
                                            <td><?php echo $json['login_at']; ?></td>
                                           
                                            <td><?php echo $json['logout_at']; ?></td>
                                            
                                            
                                           
                                            
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
                        
                