
<div class="row">
                             <div class="col-md-12">

                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Messages</h3>
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
                                            <th class="all">#SID</th>
                                            <th  class="min-desktop">Name</th>
                                            <th class="min-desktop">email</th>
                                            <th class="min-desktop ">Message</th>
                                            <th class="min-desktop">Date</th>
                                            <th class="min-desktop" style="width:125px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                          <?php
                                            $sql_prepare = 'SELECT s_id,name,email,message,date FROM support order by s_id DESC';
                                            $stmt = $con->prepare($sql_prepare); 
                                            $stmt->execute();
                                            $stmt->bind_result($s_id,$name,$email,$message,$date);
                                          
                                              
                                  while($stmt->fetch()) 
                                        {
                                            $json = array();
                                                      
                                              
                                                $json = array('s_id'=>$s_id,
                                                              'name'=>$name,
                                                              'email'=>$email,
                                                              'message'=>$message,
                                                              'date'=>$date);
                                          
                                        
                                        ?>
                                        
                                    
                                        
                                        
                                        
                                        
                                        <tr>
                                            <td><?php echo $json['s_id']; ?></td>
                                            <td><?php echo $json['name']; ?> </td>
                                            <td><?php echo $json['email']; ?></td>
                                            <td><span class="show-read-more" ><?php echo $json['message']; ?></span></td>
                                            <td><?php echo $json['date']; ?></td>
                                            
                                              <td> 
											<form action="pages/action/handler" method="post" class="text-right" style="display:inline-block;float:right;margin-left:5px;">
                                                                   <input type="hidden" value="<?php echo $json['s_id']; ?>" name="s_id">
                                                                 
                                                                 <button  class="btn btn-danger btn-xs"  name="submit_delete_messages"><i class="fas fa-times-circle"></i> Delete</button>
                                                                   
                                                                                                                            
                                              </form>
                                              	<form action="dashboard?page=compose" method="post"  style="float:right;">
                                                                     <input type="hidden" value="<?php echo $json['name']; ?>" name="name">
                                                                     <input type="hidden" value="<?php echo $json['email']; ?>" name="email">
                                                                   <button  class="btn btn-success btn-xs" ><i class="fas fa-comment-dots"></i> reply</button>
                                                                                                                              
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
                        
                