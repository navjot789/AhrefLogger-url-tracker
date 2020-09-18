
<?php include "../connection/connect.php";
	  error_reporting(0); ?>
	  
<?php	  
if(!empty($_SESSION["m_id"]))
{
	header('location:index.php');
}
else
{
?>
	  
<!DOCTYPE html>
<html lang="en">	  
<!--  Design By Navjot Singh   Thu, 02 Aug 2018 16:29:33 GMT -->
<?php include "inc/head.php"; ?>
    <!--TIPS-->
    <!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
    <body>
        <div id="container" class="effect mainnav-sm navbar-fixed mainnav-fixed">
            <!--NAVBAR Header-->
            <!--===================================================-->
           <?php include "inc/header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                <div class="pageheader hidden-xs">
                  <h3><a href="dashboard?page=home"><i class="fa fa-home"></i> Dashboard </a></h3>
                    <div class="breadcrumb-wrapper">
                      <span class="label">You are here:</span>
                         <ol class="breadcrumb">
                            <li> <a href="#"> Home </a> </li>
                            <li class="active"><?php if($_GET['page'])
                                                      { echo $_GET['page']; 
                                                      }else if($_GET['page']== '')
                                                      { 
                                                          echo $_GET['page']='home';
                                                      
                                                      } ?> </li>
                         </ol>
                    </div>
                </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
					
					<?php
				
				
						switch($_GET['page'])
						{
							case home: include("pages/home.php");
							break;
							case users: include("pages/all_users.php");
							break;
							case activity: include("pages/user_activity.php");
							break;
							
							case tracking: include("pages/tracked.php");
							break;
						    case Shorten: include("pages/shorten.php");
							break;
							case messages: include("pages/support.php");
							break;
							case compose: include("pages/compose_reply.php"); //mail but without any excess link
							break;
							
							case domain_changer: include("pages/changer.php");
							break;
							case manage_changer: include("pages/m_changer.php");
							break;
						
							
							default : include("pages/home.php");
							break;
						}
				
				?>  
                   
					
                    <!--===================================================-->
                    <!--End page content-->
                </div>
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->
                <!--MAIN NAVIGATION-->
                <!--===================================================-->
                  <?php include "inc/nav.php"; ?>
                <!--===================================================-->
                <!--END MAIN NAVIGATION-->
            </div>
            <!-- FOOTER -->
            <!--===================================================-->
            <footer id="footer">
                <!-- Visible when footer positions are fixed -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <div class="show-fixed pull-right">
                    <ul class="footer-list list-inline">
                        <li>
                            <p class="text-sm">SEO Proggres</p>
                            <div class="progress progress-sm progress-light-base">
                                <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
                            </div>
                        </li>
                        <li>
                            <p class="text-sm">Online Tutorial</p>
                            <div class="progress progress-sm progress-light-base">
                                <div style="width: 80%" class="progress-bar progress-bar-primary"></div>
                            </div>
                        </li>
                        <li>
                            <button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
                        </li>
                    </ul>
                </div>
             
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <p class="pad-lft">&#0169; 2019 <a href="https://<?php echo $_SERVER['HTTP_HOST']; ?>">@<?php echo $_SERVER['HTTP_HOST']; ?></a></p>
            </footer>
            <!--===================================================-->
            <!-- END FOOTER -->
            <!-- SCROLL TOP BUTTON -->
            <!--===================================================-->
            <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
            <!--===================================================-->
        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->
		
		
		
        <!--JAVASCRIPT-->
        <!--=================================================-->
   
        <?php include "inc/jquery.php"; ?>
           
	
    
       
      
    </body>

<!--  Design By Navjot Singh   Thu, 02 Aug 2018 16:30:50 GMT -->
</html>
<?php
}?>