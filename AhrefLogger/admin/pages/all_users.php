
       <div class="col-sm-12" STYLE="overflow:auto;">      
		    <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Registered Users</h3>
                            </div>
                            <div class="panel-body">
                                    <div class="pad-btm form-inline">
                                        <div class="row">
                                            <div class="col-sm-6 text-xs-center">
                                                <div class="form-group">
                                                    <label class="control-label">Status</label>
                                                    <select id="demo-foo-filter-status" class="form-control">
                                                        <option value="">Show all</option>
                                                        <option value="verified">verified</option>
                                                        <option value="unverified">unverified</option>
                                                         <option value="blocked">blocked</option>
                                                         <option value="online">online</option>
                                                          <option value="offline">offline</option>
                                                       
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
                                            <th data-hide="phone, tablet">#UID</th>
                                            <th >Username</th>
                                            <th data-hide="all">Password</th>
                                           
                                            <th data-hide="all">Gen.Token</th>
                                             <th data-hide="phone, tablet">Email</th>
                                            <th data-hide="phone, tablet">TOS Agreement</th>
                                          
                                            <th data-hide="phone, tablet" >Public</th>
                                            <th data-hide="phone, tablet">Join Date</th>
                                             <th data-hide="phone, tablet">Pass Update Date</th> 
                                             <th >Status</th>
											<th data-sort-ignore="true" >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        
                                   <?php     
                                        $sql="SELECT * FROM users order by u_id desc";
												$query=mysqli_query($con,$sql);
												
													if(!mysqli_num_rows($query) > 0 )
														{
															echo '<td colspan="12"><center>NO DATA FOUND!</center></td>';
														}
													else
														{				
																	while($rows=mysqli_fetch_array($query))
																		{
																					
																				
																				
																					echo ' <tr><td>'.$rows['u_id'].'</td>
																								<td>'.$rows['username'].'</td>
																								<td>'.$rows['password'].'</td>
																							    <td>'.$rows['token'].'</td>
																								<td>'.$rows['email'].'</td>';
																								
																								
																							if($rows['tos']==1)
																								{
																									echo '<td><span class="label label-table label-success"><i class="fas fa-check-square"></i> check</span></td>';
																								}
																								else
																								{
																									echo '<td><span class="label label-table label-danger"><i class="far fa-square"></i> uncheck</span></td>';
																								}		
																						
																						
																							
																								
																								if($rows['public']==1)
																								{
																									echo '<td class="online"><span class="label label-table label-success">online</span></td>';
																								}
																								else
																								{
																									echo '<td class="offline"><span class="label label-table label-warning">offline</span></td>';
																								}	
																								
																								echo '<td>'.$rows['date'].'</td>';
																								
																								if($rows['upd_d']==0)
																								{
																									echo '<td><span class="label label-table label-info">No update</span></td>';
																								}
																								else
																								{
																									echo '<td>'.$rows['upd_d'].'</td>';
																								}	
																									  
																								
																								
																								if($rows['status']==1)
																								{
																									echo '<td class="verified"><span class="label  label-table label-success">verified</span></td>';
																								}
																								else if($rows['status']==2)
																								{
																								    	echo '<td class="blocked"><span class="label  label-table label-danger">Blocked</span></td>';
																								}
																								else
																								{
																									echo '<td class="unverified"><span class="label label-table label-danger">unverified</span></td>';
																								}
																								
																							echo 	'	
																								
																									 <td> 
																									
																							        	<div class="dropdown">
                                                                                                          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Option
                                                                                                          <span class="caret"></span></button>
                                                                                                          
                                                                                                          <ul class="dropdown-menu dropdown-menu-right">';
                                                                                                      
                                                                                                            if($rows['status']==0)
            																								{
            																									echo '<li><form action="pages/action/handler" method="post">
                                                                                                                             <input type="hidden" value="'.$rows['u_id'].'" name="u_id">
                                                                                                                       
                                                                                                                            <button style="width:100%;background:none;border:0;" name="submit_status_verify">verify
                                                                                                                            
                                                                                                                            </form></li>';
            																								}
            																								else if($rows['status']==1)
            																								{
            																								    	echo '<li><form action="pages/action/handler" method="post">
                                                                                                                             <input type="hidden" value="'.$rows['u_id'].'" name="u_id">
                                                                                                                       
                                                                                                                            <button style="width:100%;background:none;border:0;" name="submit_status_block">block
                                                                                                                            
                                                                                                                            </form></li>';
            																								}
            																								else
            																								{
            																								    	echo '<li><form action="pages/action/handler" method="post">
                                                                                                                             <input type="hidden" value="'.$rows['u_id'].'" name="u_id">
                                                                                                                       
                                                                                                                            <button style="width:100%;background:none;border:0;" onclick="myFunction()" name="submit_status_verify">unblock
                                                                                                                            
                                                                                                                            </form></li>';
            																								}
            																							
                                                                                                            
                                                                                                           
                                                                                                            
                                                                                                          echo'
                                                                                                            <li><form action="pages/action/handler" method="post">
                                                                                                                             <input type="hidden" value="'.$rows['u_id'].'" name="u_id">
                                                                                                                    
                                                                                                                        <button  style="width:100%;background:none;border:0;" name="submit_user_del">Delete
                                                                                                                            
                                                                                                                            </form></li>
                                                                                                          </ul>
                                                                                                        </div>
																									</td>
																									
																									</tr>';
																					 
																						
																						
																		}	
														}
												
											
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
   


	
           