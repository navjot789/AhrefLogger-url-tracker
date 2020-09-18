
                        <div class="row">
                            <div class="col-md-3 eq-box-md grid">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> <span class="counter">
                                                	<?php
					
                        					$sql_prepare = 'SELECT * FROM shotner';
                                              $stmt = $con->prepare($sql_prepare); 
                                            $stmt->execute();
                                            $stmt->store_result();
                                            echo $numberofrows =  $stmt->num_rows;
                                            $stmt->close();
                                        ?>
                                                
                                                </span></h3>
                                                <p class="mar-ver-5"> Total Shotners Created </p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fas fa-link fa-3x text-info"></i> </div>
                                        </div>
                                        
                                        
                                    </div>
                                 </div>
                      </div>
                      
                        <div class="col-md-3 eq-box-md grid">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> <span class="counter">
                                                	<?php
					
                        					$sql_prepare = 'SELECT * FROM tracking_data';
                                            $stmt = $con->prepare($sql_prepare); 
                                            $stmt->execute();
                                            $stmt->store_result();
                                            echo $numberofrows =  $stmt->num_rows;
                                            $stmt->close();
                                        ?>
                                                
                                                </span></h3>
                                                <p class="mar-ver-5"> Total Clicks Served </p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2">  <i class="fas fa-mouse-pointer fa-3x text-info"></i></div>
                                        </div>
                                        
                                        
                                    </div>
                                 </div>
                      </div>
                      
                      
                      
                      <div class="col-md-3 eq-box-md grid">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> <span class="counter">
                                               <?php
					
                        					$sql_prepare = 'SELECT * FROM users';
                                               $stmt = $con->prepare($sql_prepare); 
                                            $stmt->execute();
                                            $stmt->store_result();
                                            echo $numberofrows =  $stmt->num_rows;
                                            $stmt->close();
                                        ?>
                                                
                                                </span></h3>
                                                <p class="mar-ver-5"> Total Registered Users </p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2">  <i class="fas fa-users fa-3x text-info"></i></div>
                                        </div>
                                        
                                        
                                    </div>
                                 </div>
                      </div>
                      
                      
                         <div class="col-md-3 eq-box-md grid">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> <span class="counter">
                                               <?php
					
                        					$sql_prepare = 'SELECT * FROM support';
                                               $stmt = $con->prepare($sql_prepare); 
                                            $stmt->execute();
                                            $stmt->store_result();
                                            echo $numberofrows =  $stmt->num_rows;
                                            $stmt->close();
                                        ?>
                                                
                                                </span></h3>
                                                <p class="mar-ver-5"> Total Messages</p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2">  <i class="fas fa-envelope fa-3x text-info"></i></div>
                                        </div>
                                        
                                        
                                    </div>
                                 </div>
                      </div>
                      
                      
                      
               </div>

 <div class="row">
                            <div class="col-md-3 eq-box-md grid">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> <span class="counter">
                                                	<?php
					
                                    					$sql_prepare = 'SELECT * FROM bundles';
                                                          $stmt = $con->prepare($sql_prepare); 
                                                        $stmt->execute();
                                                        $stmt->store_result();
                                                        echo $numberofrows =  $stmt->num_rows;
                                                        $stmt->close();
                                                    ?>
                                                
                                                </span></h3>
                                                <p class="mar-ver-5"> Total Active Bundles Created </p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fas fa-layer-group fa-3x text-info"></i> </div>
                                        </div>
                                        
                                        
                                    </div>
                                 </div>
                      </div>
                      
                      </div>
