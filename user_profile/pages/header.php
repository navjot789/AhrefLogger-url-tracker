<header class="app activeheadmenu">
        <div class="navbar" role="navigation">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-2">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="zmdi zmdi-more-vert"></i>
                  </button>
				  <button type="button" class="navbar-toggle pull-left quicklinks-toggle__btn">
                    <i class="zmdi zmdi-menu"></i>
                  </button>
                  <a  href="#">
                                        <img src="https://<?php echo $_SERVER['HTTP_HOST']; ?>/image/logo.png" alt="ahref - URL Shortener and iplogger" style="margin-top:0px;">
                                      </a>
                </div>            
              </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        
                         <li> <a href="https://<?php echo $_SERVER['HTTP_HOST']; ?>" class="active"><i class="fas fa-plus"></i> Create New</a> </li>
                        <li><a href='https://<?php echo $_SERVER['HTTP_HOST']; ?>/codetrack' target="_blank">Code-Tracking</a></li>
                        <li><a href='https://<?php echo $_SERVER['HTTP_HOST']; ?>/user_profile/dashboard'>My Account</a></li>
                        <li><a href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/user_profile/logout" ><i class="fas fa-sign-out-alt"></i></a></li>
                        </ul>
                </div>       
            </div>
          </div>
        </div>     
        
      </header>