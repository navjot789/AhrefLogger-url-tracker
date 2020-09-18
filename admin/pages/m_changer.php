
       <div class="col-sm-12" STYLE="overflow:auto;">      
		    <div class="panel" STYLE="overflow:auto;">
                            <div class="panel-heading">
                                <h3 class="panel-title">Manage Changer</h3>
                            </div>
                            <div class="panel-body">
                                    <div class="pad-btm form-inline">
                                        <div class="row">
                                            <div class="col-sm-6 text-xs-center">
                                                <div class="form-group">
                                                    <label class="control-label">Status</label>
                                                    <select id="demo-foo-filter-status" class="form-control">
                                                        <option value="">Show all</option>
                                                        <option value="domain">domain</option>
                                                        <option value="path">path</option>
                                                         <option value="extension">extension</option>
                                                        
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-xs-center text-right">
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Foo Table - Filtering -->
                                <!--===================================================-->
                                <table id="demo-foo-filtering" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                                    <thead>
                                        <tr>
                                            <th data-hide="phone, tablet">#BID</th>
                                            <th data-sort-ignore="true" >Bundle</th>
                                            <th data-sort-ignore="true" >Category</th>
                                           
                                            <th data-sort-ignore="true">Sub Category</th>
                                             <th data-sort-ignore="true">Action</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                      <?php
                                            $sql_prepare = 'SELECT b_id,bundle,cat,sub FROM bundles order by b_id DESC';
                                            $stmt = $con->prepare($sql_prepare); 
                                            $stmt->execute();
                                            $stmt->bind_result($b_id,$bundle,$cat,$sub);
                                          
                                              
                                  while($stmt->fetch()) 
                                        {
                                            $json = array();
                                                      
                                              
                                                $json = array('b_id'=>$b_id,
                                                              'bundle'=>$bundle,
                                                              'cat'=>$cat,
                                                              'sub'=>$sub);
                                          
                                        
                                        
                                        
                                        ?>
                                        
                                    
                                        
                                        
                                        
                                        
                                        <tr>
                                            <td><?php echo $json['b_id']; ?></td>
                                            <td>
                                                
                                               
                                                
                                                 <?php echo $json['bundle']; ?>
                                                                                                            
                                                
                                              
                                            
                                            </td>
                                            
                                            
                                            <td> <?php 
                                                     if($json['cat']=='domain')
                                                     {
                                                         echo '<button disabled   class=" domain btn btn-info">domain</button>';
                                                     }
                                                     else if($json['cat']=='path')
                                                     {
                                                           echo '<button disabled class=" path btn btn-info">path</button>';
                                                     }
                                                     else if($json['cat']=='extension')
                                                     {
                                                         echo '<button disabled class="extension btn btn-info">extension</button>';
                                                     }
                                            
                                            ?></td>
                                            
                                            
                                            
                                            <td><?php
                                            
                                                  if($json['cat']=='domain' && $json['sub']=='1')
                                                     {
                                                         echo '<button disabled   class=" domain btn btn-info">Main</button>';
                                                     }
                                                     else if($json['cat']=='domain' && $json['sub']=='2')
                                                     {
                                                           echo '<button disabled class=" path btn btn-secondary">Tech</button>';
                                                     }
                                                     else if($json['cat']=='domain' && $json['sub']=='3')
                                                     {
                                                         echo '<button disabled class="extension btn btn-secondary">Social</button>';
                                                     }
                                                     else if($json['cat']=='extension' && $json['sub']=='1')
                                                     {
                                                         echo '<button disabled class="extension btn btn-secondary"><i class="fas fa-image"></i></button>';
                                                     }
                                                      else if($json['cat']=='extension' && $json['sub']=='2')
                                                     {
                                                         echo '<button disabled class="extension btn btn-secondary"><i class="fas fa-music"></i></button>';
                                                     }
                                                      else if($json['cat']=='extension' && $json['sub']=='3')
                                                     {
                                                         echo '<button disabled class="extension btn btn-secondary"><i class="fas fa-video"></i></button>';
                                                     }
                                                      else if($json['cat']=='extension' && $json['sub']=='4')
                                                     {
                                                         echo '<button disabled class="extension btn btn-secondary"><i class="fas fa-file-archive"></i></button>';
                                                     }
                                                      else if($json['cat']=='extension' && $json['sub']=='5')
                                                     {
                                                         echo '<button disabled class="extension btn btn-secondary"><i class="fas fa-question-circle"></i></button>';
                                                     }
                                                     else
                                                     {
                                                          echo '<button disabled class="extension btn btn-secondary"><i class="fas fa-map-signs"></i></button>';
                                                     }
                                            
                                            
                                            ?></td>
                                            
                                            
                                              <td > 
                                                             
											<form action="pages/action/handler" method="post" >
                                                                   <input type="hidden"  value="<?php echo $json['b_id']; ?>" name="b_id">
                                                                 
                                                                 <button class="btn btn-danger btn-xs" name="submit_delete_bundle"><i class="fas fa-times-circle"></i> Delete</button>
                                                                   
                                                                                                                            
                                              </form>
                                              
                                                                                                                              
                                              </form>	
                                            
                                           
                                            
                                            
                                            
                                            </td>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        </tr>
                                        
                                        <?php   
                                                                        
                                           }  //$stmt->close();     

                          
                                                                 
                                        ?>
                                        
                                        
                                        
                                        
                                     
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="12">
                                                <div class="text-right">
                                                    <ul class="pagination"></ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!--===================================================-->
                                <!-- End Foo Table - Filtering -->
                            </div>
                        </div>
						
						  </div>
   


	
           