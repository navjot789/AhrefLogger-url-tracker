<header>
			<div class="navbar" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" onclick="In_headerFunction()">
							<i class="zmdi zmdi-menu"></i>
						</button>
						<a class="navbar-brand" href="https://<?php echo $_SERVER['HTTP_HOST']; ?>">
												<img src="https://<?php echo $_SERVER['HTTP_HOST']; ?>/image/logo.png" alt="image">
											</a>
					</div>
					<div class="navbar-collapse collapse">
					    <ul class="nav navbar-nav navbar-right">
							<li><a href='https://www.youtube.com/channel/UCVlSbZdK_7tTF_X91gpD48g' target="_blank">Created by Codelone</a></li>
					         <li><a href="expander">URL-Expander</a></li>
					        <li><a href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/codetrack">Code-Tracking</a></li>
					       <?php
                            
                                          if(isset($_SESSION['u_id']) &&  $_SESSION['loggedin'] == TRUE)
                                          {
                                              echo ' <li><a href="https://'.$_SERVER['HTTP_HOST'].'/user_profile/dashboard">Profile</a></li>
                                                      <li><a href="https://'.$_SERVER['HTTP_HOST'].'/user_profile/logout"><i class="fas fa-sign-out-alt"></i></a></li>';
                                          }else
                                          {
                                              echo ' <li><a href="https://'.$_SERVER['HTTP_HOST'].'/login">Login</a></li>
                                                     <li><a href="https://'.$_SERVER['HTTP_HOST'].'/register" class="active"> <i class="fas fa-user-plus"></i> Get Started</a></li>';
                                          }
                        ?>
					        </ul>
					        </div>
					        </div>
			</div>    
		</header>