
<?php
include 'connection/connect.php';
session_start();
error_reporting(0);


if(empty($_SESSION['TRACK_CODE']))
{
   
    header('Location:'.$_SERVER['HTTP_HOST']);
}
else
{
?>



<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

 <?php include 'pages/head.php';?>
 <style type="text/css">
    .show-read-more .more-text{
        display: none;
    }
</style>



  <div id="focus-overlay"></div>
  <body id="body">
    <a href="#body" id="back-to-top"><i class="zmdi zmdi-chevron-up"></i></a>
              
          <?php include 'pages/header.php';?>  
          <?php include 'pages/m_header.php';?>   
            
                <section class="dark under-head-cont" id="infinity-breadcrumb">
              <div class="container">
                <h2>AHREF - TRACK</h2>
                <ol class="breadcrumb">
                  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/">Home</a></li>
                  <?php
                     if(isset($_SESSION['u_id']) &&  $_SESSION['loggedin'] == TRUE)
                     {
                         echo ' <li class="active">'.$_SESSION['username'].'</li>';
                     }
                     else
                     {
                         echo '<li class="active">Guest</li>';
                     }
                  ?>
                 
                </ol>
              </div>
            </section>
            
         
             
            
            <section class="breadcrumb-section">
              <div class="container content">
                <div class="row main-content">
                  <div class="col-md-8">        
                    <div class="panel panel-body panel-default">
                      <h3>LINK INFORMATION:</h3>
                    <?php
                    
                                         $fetch  = "SELECT * FROM shotner WHERE track_code = '".$_SESSION['TRACK_CODE']."' ";
                                                                                  $records = mysqli_query($con,$fetch);
                                                                                  $row = mysqli_fetch_array($records);
                    ?>
                    
                    
                    <?php
                     //showing email updation notification to user and  in database 0/1
  
                                                                     if(!empty($_GET['e_s']) && isset($_SESSION['loggedin']))
                                                                                     {
                                                                                         if($_GET['e_s'] == 1)
                                                                                         {
                                                                                            echo '  
                                                                                                                <div class="alert alert-success">  
                                                                                                                    <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                                                    <strong>Email Notification updated!</strong> You can change it Anytime.
                                                                                                                </div> ';
                                                                                             
                                                                                         }
                                                                                         
                                                                                   }
                                                                                
                    ?>
                    
            
                            <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                             
                              <tbody>
                                  <tr>
                                      <th>Original URL</th>
                                        <td class ="text-left">
                                            <img src="https://www.google.com/s2/favicons?domain=<?php echo  $row['urlinput']; ?>" alt="Favicon"> <span class="show-read-more" style="font-weight:600;" ><?php echo  $row['urlinput']; ?></span>
                                       </td>
                                        
                                        
                                    </tr>
                                    <tr>
                                      <th>New URL</th>
                                        <td  class ="text-left" style="font-weight:700;" > 
                                        
                                    <span id="c1">
                                        
                                        <span id='mydiv1'><span style="color:#59c053;">https</span>://<span style="color:#2196f3;"><?php echo $_SERVER['HTTP_HOST']; ?></span></span><span id='divpath1'>/url/</span><span style="color:#282525;font-weight:900;"><?php echo $row['shorturl']; ?><span id="divExten2"></span></span>
                                        
                                         </span>
                                                <button style="margin-left:5px;float:;" onclick="copyToClipboard('#c1')" type="button" class="btn btn-info btn-xs">Copy</button>
                                                 
                                        <!-- Button trigger modal -->
                                            <button style="float:right;"  type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModalLong">
                                            Make a custom link
                                            </button>
                                        </td>
                                        
                                       
                                    </tr>
                                    <tr>
                                      <th>Other Links</th>
                                        <td  class ="text-left">
                                            
                                              <!-- Button trigger modal -->
                                            <button   type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModalLong2">
                                           View Other link Shorteners
                                            </button>
                                            
                                        </td>
                                        
                                    </tr>
                                  <tr>
                                      <th>Tracking Code</th>
                                        <td  class ="text-left" style="font-weight:700;"><span  style="color:#2196f3;"><?php echo $_SESSION['TRACK_CODE'];?></span>
                                        &nbsp;&nbsp; (Kindly keep this code at safe Place). </td>
                                       
                                    </tr>
                                     
                                     <style>
                                                
                                          
                                         .crop {
                                                width: 118px;
                                                height: 118px;
                                                overflow: hidden;
                                            }
                                            
                                            .crop img {
                                                width: 150px;
                                                height: 150px;
                                                margin: -21px 0px 0px -21px;
                                            }
                                            
                                            </style>
                                           
                                          <tr>
                                              
                                          <th>QR Code</th>
                                            <td  class ="text-left">
                                                
                                            <?php
                                                  $long_url = $row['urlinput'];
                                                  
                                                echo '<div class="crop img-thumbnail img-responsive">
                                                        <img  class=" crop" src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl='.$long_url.'&choe=UTF-8" title="'.$long_url.'" />
                                                        </div>';
                                                     
                                             ?>
                                              
                                          
                                            
                                          
                                          </td>
                                            
                                        </tr>
                                        
                                        
                                       
                                      
                                     <tr>
                                      <th>Email Notifications</th>
                                        <td  class ="text-left">
                                            
                                            
  
                                           
                                            
                                             <?php
                                             
                                              if(isset($_SESSION['loggedin']))
                                              {
                                             
                                                     if($row['notify'] == 0 )
                                                            {
                                                                ?>
                                                                
                                                         <form  action="pages/email_handler" method="POST"> 
                                                         
                                                          <input type="checkbox"  name="email_notify_on_off"  value="1" data-toggle="toggle" data-size="small" data-onstyle="success" >
                                                          <input type="submit" style="float:right;" name="notification" value="update" class="btn btn-primary btn-xs" >
                                                         
                                                         </form>
                                                         
                                                    <?php }else {?>
                                                    
                                                     <form  action="pages/email_handler" method="POST">
                                                         
                                                      <input type="checkbox" checked data-toggle="toggle"  data-size="small" data-onstyle="success" >
                                                      <input type="hidden" name="email_notify_on_off" value="0"  >
                                                      <input type="submit" style="float:right;" name="notification" value="update" class="btn btn-primary btn-xs" >
                                                      </form>
                                                      
                                            <?php                }
                                            }else
                                            {
                                                echo '
                                                Please <a href="https://'.$_SERVER['HTTP_HOST'].'/login" style="color:#008aff;font-weight:bold;">login</a> or <a href="'.$_SERVER['HTTP_HOST'].'/register" style="color:#008aff;font-weight:bold;">register</a> to Activate Email Notification.
                                                
                                               ';
                                            }
                                            
                                            
                                            
                                            ?>
                                            
                                      </td>
                                       
                                    </tr>
                                      
                                      
                                      
                                      <tr>
                                          <th>Memo</th>
                                          <?php
                                          
                                          if(isset($_SESSION['u_id']) &&  $_SESSION['loggedin'] == TRUE)
                                          {
                                              
                                              $memo = mysqli_real_escape_string($con,htmlentities($_POST['memo']));
                                              
                                              if(isset($_POST['update']))
                                              {
                                                  
                                                               if(!empty($memo))
                                                               {
                                                                   $update_query = "update shotner set memo = '".$memo."' where u_id='".$_SESSION['u_id']."' && track_code='".$_SESSION['TRACK_CODE']."' ";
                                                                   $update_res = mysqli_query($con, $update_query);
                                                                
                                                                    
                                                                   
                                                                                   if($update_res)
                                                                                   {
                                                                                    echo '  
                                                                                                        <div class="alert alert-success">  
                                                                                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                                            <strong>Memo updated!</strong> You can change it Anytime.
                                                                                                        </div>  
                                                                     
                                                                        
                                                                                                   ';
                                                                                   }
                                                                                   else
                                                                                   {
                                                                                          echo '  
                                                                                       
                                                                                                       
                                                                                                        <div class="alert alert-danger">  
                                                                                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                                            <strong>Critical Error!</strong> contact your webmaster ASAP.
                                                                                                        </div>  
                                                                     
                                                                                                    ';
                                                                                   }
                                                                   
                                                                   
                                                                   
                                                               
                                                       
                                                                       
                                                                   }
                                                                     else
                                                                   {
                                                                          echo '  
                                                                       
                                                                                       
                                                                                        <div class="alert alert-danger">  
                                                                                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                                                                            <strong>Empty Textfield!</strong> It cannot be blank.
                                                                                        </div>  
                                                     
                                                                                    ';
                                                                   }
                                                 
                                                  
                                                  
                                              }
                                              
                                              
                                              
                                              
                                          $memo_select_query= mysqli_query($con, "select memo from shotner where u_id='".$_SESSION['u_id']."' && track_code='".$_SESSION['TRACK_CODE']."' ");
                                           $fetch_memo_data = mysqli_fetch_array($memo_select_query);
                                                                   
                                                              
                                       
                                              
                                              
                                              
                                              
                                               echo '<td  class ="text-left" >
                                                  
                                                          <button name="update" class="btn btn-primary label label-primary pull-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                              <i class="far fa-edit"></i>
                                                            </button>
                                                            
                                                    
                                               
                                                    
                                                <span class="show-read-more"  >'.$fetch_memo_data['memo'].'</span>
                                               
                                                  
                                                    
                                                        <div class="collapse" id="collapseExample">
                                                          <div class="card card-body">
                                                         
                                                            <form  method="post">
                                                            
                                                             <div class="form-group">
                                                                <label for="comment">Comment:</label>
                                                            
                                                                <textarea name="memo" class=" form-control" rows="5" id="comment" >'.$fetch_memo_data['memo'].'</textarea>
                                                            </div>
                                                            
                                                              <button name="update" type="submit" class="btn btn-default">Submit</button>
                                                          </form>
                                                               
                                                          
                                                          </div>
                                                        </div>
                                                      
                                                        </td>';
                                                        
                                              
                                              
                                              
                                              
                                          }
                                          else
                                          {
                                           echo     '<td  class ="text-left">Please <a href="'.$_SERVER['HTTP_HOST'].'/login" style="color:#008aff;font-weight:bold;">login</a> or <a href="https://'.$_SERVER['HTTP_HOST'].'/register" style="color:#008aff;font-weight:bold;">register</a> to create a Memo.</td>';
                                          }
                                          
                                          ?>
                                          
                                         
                                        </tr>
                            
                            
                            
                          </tbody>
                        </table>
                        </div>
            
            
            
                          <!-- other links Modal -->
                                    <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                     <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                       <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLongTitle" style="display: inline-block;">LINK SHORTENERS</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button> 
                                      </div>
                                      <div class="modal-body">
                                                    <form>
                                                        <p><h3 style="margin-bottom:0px;">Here are a list of link shorteners that you can also use</h3>
                                                        </p>
                                                        
                                                     
                                                        <table class="table table-bordered table-striped table-hover"><tbody>
                                                          
                                                                
                                                                <tr id="fold">
                                                                    <th><a href="#" style="color: rgb(44, 62, 80);">bit.ly</a></th> 
                                                                    <td><span id="fold_p" style="color: #fff;background-color: #24282f;padding:5px;">Generate bit.ly</span></td>
                                                                </tr> 
                                                                <tr id="fold2">
                                                                    <th><a style="color: rgb(44, 62, 80);">tinyurl</a></th> 
                                                                    <td><span id="fold_p2"   style="color: #fff;background-color: #24282f;padding:5px;">Generate tinyurl</span></td>
                                                                </tr> 
                                                                <tr id="fold3">
                                                                    <th><a  style="color: rgb(44, 62, 80);">shorte.st</a></th> 
                                                                    <td><span id="fold_p3"  style="color: #fff;background-color: #24282f;padding:5px;">Generate shorte.st </span></td>
                                                                </tr> 
                                                                
                                                       </tbody>
                                                        </table>
                                                        
                                                           <div class="modal-footer">
                                                   
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </form>
                                    
                                      </div>
                                    </div>
                                    </div>
                                    </div>
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                    
            
       
            
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                     <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                       <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLongTitle" style="display: inline-block;">Custom Link</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button> 
                                      </div>
                                      <div class="modal-body">
                                                    <form>
                                                        <p><h3 style="margin-bottom:0px;">Here you can make a custom link to send.</h3>
                                                        (All custom links will stay active) </p>
                                                        
                                                        <p><h3 >
                                                            <span id="c2">
                                                                
                                                                <span id='mydiv2'><span style="color:#59c053;">https</span>://<span style="color:#2196f3;"><?php echo $_SERVER['HTTP_HOST']; ?></span></span><span id='divpath2'>/url/</span><span style="color:#665959;"><?php echo $row['shorturl']; ?><span id="divExten1"></span> </span>
                                                                
                                                               </span>     
                                                                    
                                                                   
                                                            
                                                            </h3>
                                                         </p>
                                                      <div class="form-row">
                                                           
                                                        <div class="form-group col-md-12" style="margin-top: 10px;">
                                                          <label for="inputState">Domain:</label>
                                                          
                                                          <select id="inputState" class="form-control" onchange='changeText(this.value)' style="color:#2196f3;">
                                                              
                                                                   <!--heading Main-->  <option disabled>MAIN</option>
                                                            <?php
                                                                 
                                                                
                                                                
                                                                //category
                                                                $domain = 'domain';
                                                                $path = 'path';
                                                                $extension = 'extension';
                                                                
                                                                //sub_category
                                                                $main ='1';
                                                                $tech ='2';
                                                                $social = '3';
                                                                
                                                                
                                                             //sql_query 1 for main category      
                                                                
                                                                  $sql1 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                                                          $st1 = $con->prepare($sql1); 
                                                                $st1->bind_param('ss', $domain, $main);
                                                                $st1->execute();
                                                                $st1->bind_result($main_domains);
                                                                $json1 = array();
                                                                    
                                                              while($st1->fetch())
                                                              {
                                                                                $json1 = array('main_domains'=>$main_domains);
                                                                                $json1['main_domains'];
                                                                         
                                                                            
                                                                  
                                                            
                                                                      ?>
                                                               
                                                       
                                                   
                                                         
                                                             
                                                              <option value="<?php echo $json1['main_domains'];?>"><?php echo $json1['main_domains'];?></option>
                                                              
                                                        
                                                        
                                                                    <?php
                                                              }
                                                                
                                                                  $st1->close(); //close 1
                                                                
                                                                ?>
                                                                
                                                                
                                                            <!--heading Tech--><option disabled>TECH</option>
                                                                
                                                                
                                                                
                                                                
                                                                <?php
                                                    //sql_query 2 for tech category       
                                                                  
                                                                $sql2 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                                                          $st2 = $con->prepare($sql2); 
                                                                $st2->bind_param('ss', $domain, $tech);
                                                                $st2->execute();
                                                                $st2->bind_result($tech_domains);
                                                                $json2 = array();
                                                                    
                                                              while($st2->fetch())
                                                              {
                                                                                $json2 = array('tech_domains'=>$tech_domains);
                                                                                $json2['tech_domains'];
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                              ?>
                                                    
                                                    
                                                                <option value="<?php echo $json2['tech_domains'];?>"><?php echo $json2['tech_domains'];?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }    $st2->close(); // close 2
                                                             ?>
                                                            
                                             <!--heading Social--><option disabled>SOCIAL</option>
                                                                
                                                     <?php
                                                    //sql_query 3 for SOCIAL category     
                                                                  
                                                                $sql3 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                                                          $st3 = $con->prepare($sql3); 
                                                                $st3->bind_param('ss', $domain, $social);
                                                                $st3->execute();
                                                                $st3->bind_result($social_domains);
                                                                $json3 = array();
                                                                    
                                                              while($st3->fetch())
                                                              {
                                                                                $json3 = array('social_domains'=>$social_domains);
                                                                                $json3['social_domains'];
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                              ?>
                                                    
                                                    
                                                                <option value="<?php echo $json3['social_domains'];?>"><?php echo $json3['social_domains'];?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }    $st3->close(); // close 3
                                                             ?>
                                                               
                                                    
                                                             
                                                              
                                                              
                                                          </select>
                                                          
                                                         
                                                        </div>
                                                        
                                                        
                                                        
                                                           
                                                        <div class="form-group col-md-12" style="margin-top: 1px;">
                                                          <label for="inputState">Path:</label>
                                                          
                                                          <select id="inputState" class="form-control" onchange='changePath(this.value)' style="color:#2196f3;">
                                                            
                                                                             
                                                     <?php
                                                    //sql_query 4 for path category       
                                                                  
                                                                $sql4 = 'SELECT bundle FROM bundles WHERE cat = ?';
                                                                          $st4 = $con->prepare($sql4); 
                                                                $st4->bind_param('s', $path);
                                                                $st4->execute();
                                                                $st4->bind_result($domain_path);
                                                                $json4 = array();
                                                                    
                                                              while($st4->fetch())
                                                              {
                                                                                $json4 = array('domain_path'=>$domain_path);
                                                                                $json4['domain_path'];
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                              ?>
                                                    
                                                    
                                                                <option value="<?php echo $json4['domain_path'];?>"><?php echo $json4['domain_path'];?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }    $st4->close(); // close 4
                                                             ?>
                                                               
                                                       
                                                                
                                                            
                                                              
                                                              
                                                          </select>
                                                          
                                                         
                                                        </div>
                                                        
                                                        
                                                        
                                                          <div class="form-group col-md-12" style="margin-top: 1px;">
                                                          <label for="inputState">Extension:</label>
                                                          
                                                          <select id="inputState" class="form-control" onchange='changeExtension(this.value)' style="color:#2196f3;">
                                                          
                                                                <!--heading None-->                <option value="">None</option>
                                                  <!--heading image formats-->      <option disabled>image formats</option>
                                                        <?php
                                                    //sql_query 5 for ext category  

                                                             //sub_category_extension
                                                                $image = '1';
                                                                $audio = '2';
                                                                $video = '3';
                                                                $compress = '4';
                                                                $other = '5';
                                                    
                                                                  
                                                                $sql5 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                                                          $st5 = $con->prepare($sql5); 
                                                                $st5->bind_param('ss', $extension,$image);
                                                                $st5->execute();
                                                                $st5->bind_result($image_ext);
                                                                $json5 = array();
                                                                    
                                                              while($st5->fetch())
                                                              {
                                                                                $json5 = array('image_ext'=>$image_ext);
                                                                                $ext = str_replace( '.', '',  $json5['image_ext'] ); //removing comma from  extension
                                                                  
                                                                  
                                                                  
                                                                  
                                                              ?>
                                                    
                                                    
                                                                <option value="<?php echo $json5['image_ext'];?>"><?php echo  $ext;?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }    $st5->close(); // close 5
                                                             ?>
                                                    
                                                    
                     <!--heading audio formats-->          <option disabled>Audio formats</option>
                                                    
                                                    
                                                        <?php
                                                    //sql_query 6 for ext category  

                                                                  
                                                                $sql6 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                                                          $st6 = $con->prepare($sql6); 
                                                                $st6->bind_param('ss', $extension,$audio);
                                                                $st6->execute();
                                                                $st6->bind_result($audio_ext);
                                                                $json6 = array();
                                                                    
                                                              while($st6->fetch())
                                                              {
                                                                                $json6 = array('audio_ext'=>$audio_ext);
                                                                                $ext = str_replace( '.', '',  $json6['audio_ext'] ); //removing comma from  extension
                                                                  
                                                                  
                                                                  
                                                                  
                                                              ?>
                                                    
                                                    
                                                                <option value="<?php echo $json6['audio_ext'];?>"><?php echo  $ext;?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }    $st6->close(); // close 6
                                                             ?>
                                                    
                                                    
                                                   <!--heading Video formats--><option disabled>Video formats</option>
                                                    
                                                    
                                                        <?php
                                                    //sql_query 7 for ext category  

                                                                  
                                                                $sql7 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                                                          $st7 = $con->prepare($sql7); 
                                                                $st7->bind_param('ss', $extension,$video);
                                                                $st7->execute();
                                                                $st7->bind_result($video_ext);
                                                                $json7 = array();
                                                                    
                                                              while($st7->fetch())
                                                              {
                                                                                $json7 = array('video_ext'=>$video_ext);
                                                                                $ext = str_replace( '.', '',  $json7['video_ext'] ); //removing comma from  extension
                                                                  
                                                                  
                                                                  
                                                                  
                                                              ?>
                                                    
                                                    
                                                                <option value="<?php echo $json7['video_ext'];?>"><?php echo  $ext;?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }    $st7->close(); // close 7
                                                             ?> 
                                                    
                                                    
                                         <!--heading Compressed formats--><option disabled>Compressed formats</option>
                                                    
                                                    
                                                        <?php
                                                    //sql_query 8 for ext category  

                                                                  
                                                                $sql8 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                                                          $st8 = $con->prepare($sql8); 
                                                                $st8->bind_param('ss', $extension,$compress);
                                                                $st8->execute();
                                                                $st8->bind_result($compress_ext);
                                                                $json8 = array();
                                                                    
                                                              while($st8->fetch())
                                                              {
                                                                                $json8 = array('compress'=>$compress_ext);
                                                                                $ext = str_replace( '.', '',  $json8['compress'] ); //removing comma from  extension
                                                                  
                                                                  
                                                                  
                                                                  
                                                              ?>
                                                    
                                                    
                                                                <option value="<?php echo $json8['compress'];?>"><?php echo  $ext;?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }    $st8->close(); // close 8
                                                             ?> 
                                                    
                                                    
                                                     <!--heading Other formats--><option disabled>Other formats</option>
                                                    
                                                    
                                                        <?php
                                                    //sql_query 9 for ext category  

                                                                  
                                                                $sql9 = 'SELECT bundle FROM bundles WHERE cat = ? && sub = ?';
                                                                          $st9 = $con->prepare($sql9); 
                                                                $st9->bind_param('ss', $extension,$other);
                                                                $st9->execute();
                                                                $st9->bind_result($other_ext);
                                                                $json9 = array();
                                                                    
                                                              while($st9->fetch())
                                                              {
                                                                                $json9 = array('other'=>$other_ext);
                                                                                $ext = str_replace( '.', '',  $json9['other'] ); //removing comma from  extension
                                                                  
                                                                  
                                                                  
                                                                  
                                                              ?>
                                                    
                                                    
                                                                <option value="<?php echo $json9['other'];?>"><?php echo  $ext;?></option>
                                                              
                                                        
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                             <?php }    $st9->close(); // close 9
                                                             ?> 
                                                    
                                                    
                                                                
                                                            
                                                              
                                                              
                                                          </select>
                                                          
                                                         
                                                        </div>
                                                        
                                                        
                                                        
                                                      </div>
                                                        
                                                           <div class="modal-footer">
                                                   
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </form>
                                    
                                      </div>
                                    </div>
                                    </div>
                                    </div>
                                    
            
               <style>
             .swipe
             {
                   display:none;
             }
                @media only screen and (max-width: 500px) {
              .swipe
              {
                   display:block;
                   margin-top:20px;
                  
                  
              }
                }
                
                
            </style>
            
            <div class="swipe">
                  <div class="col-md-4">
                            <div class="panel panel-default panel-body text-center" id="widget_social_count">
                                <h3>Swipe Right <i class="fas fa-hand-point-right"></i></h3><p><em></em> Start swipe Right from <strong>New URL</strong> row.</p></div>   
                </div>
            </div>
            
                    </div>
                    
                  
                    
                      
                  </div>
                                  <div class="col-md-4">
                            <div class="panel panel-default panel-body" id="widget_social_count">
                                <h3>We are social</h3>
                                <p><em></em> Facebook Likes</p>
                                <a href='https://www.facebook.com/AhrefLogger' target='blank' class='btn-block btn btn-facebook'>Like us on Facebook</a>
                                
                            </div>
                            
                            
                                        
              </div>
            </section>    
            
         
            
            
            
           <section class="breadcrumb-section" style="margin-top:5px;">
              <div class="container content">
                <div class="row main-content">
                  <div class="col-md-12">       
                    <div class="panel panel-body panel-default">
                        
                     <?php
                                          
                                
                                                                                                  
                                                $fetch_record  = "SELECT * FROM tracking_data WHERE shorturl = '".$row['shorturl']."' ";
                                                                                                  $record = mysqli_query($con,$fetch_record);                                               
                                                                                                  $totalrow =mysqli_num_rows($record); //getting total only
                    
                    
                    ?>
                    
                    
                    
                  
                            <h2>Views: <?php echo number_format($totalrow); ?> </h2>
                            
                            
                            <p>Note: If you have posted your link on Facebook or Twitter, you may see results from various "bots" (TwitterBot, FacebookBot, etc.) </p>
                            
                         
                            <button type="button" class="hideoddrows btn btn-info">Hide</button>
                            
                                    <div class="table-responsive" style="margin-top:10px;">
                                    <table id="example"  class="table table-hover table-bordered"  style="padding:0px;">
                                      <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                        
                                          <th scope="col">IP Address</th>
                                          <th scope="col">Browser </th>
                                          <th scope="col">Operating System</th>
                                          <th scope="col">User-Agent</th>
                                          <th scope="col">Country </th>
                                          <th scope="col">Region </th>
                                          <th scope="col">ISP</th>
                                          <th scope="col">LAT</th>
                                          <th scope="col">LON</th>
                                 
                                        </tr>
                                      </thead>
                                    
                                      <tfoot>
                                            <tr>  
                                                  <th scope="col">#</th>
                                               
                                                  <th scope="col">IP Address</th>
                                                  <th scope="col">Browser </th>
                                                  <th scope="col">Operating System</th>
                                                  <th scope="col">User-Agent</th>
                                                  <th scope="col">Country </th>
                                                  <th scope="col">Region </th>
                                                  <th scope="col">ISP</th>
                                                  <th scope="col">LAT</th>
                                                  <th scope="col">LON</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                         
                                    
                                    
                                    </div>
            
            
                    </div>
                    
                      
                  </div>
                
                </div>    
              </div>
            </section>    
         

            
         
            
            

 <?php include 'pages/footer.php';?>  
     
      
  <?php include 'pages/jquery.php';?>  
  
 
 
  <!-- DataTables -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
  <script>
  
  $(document).ready(function(e){
    $('#example').dataTable({
        "order": [[ 0, "desc" ]],
      "bProcessing": true,
          "serverSide": true,
          "ajax":{
              url :"loader/fetch",
              type: "POST",
              error: function(){
                $("#post_list_processing").css("display","none");
              }
            }
        });
  });


    </script>
  <!-- DataTables end -->
 
 
 
 
 
 
 
 

  <script src="js/custom.js"></script>
   
<script>

    
    <?php 
    
     $other_shotner = mysqli_query($con,"select bitly,tiny,shortest from shotner where track_code = '".$_SESSION['TRACK_CODE']."' ");
     $base_codec = mysqli_fetch_array($other_shotner);
                                                                              
   ?>
  /*other shotnen links*/ 
        $(document).ready(function () {
            $("#fold").click(function () {
                $("#fold_p").fadeOut(function () {
                    $("#fold_p").text(($("#fold_p").text() == 'Generate bit.ly') ? '<?php echo 'http://bit.ly/'.$base_codec['bitly']; ?>' : '<?php echo 'http://bit.ly/'.$base_codec['bitly']; ?>').fadeIn(10);
                })
            })
        });
         
         $(document).ready(function () {
            $("#fold2").click(function () {
                $("#fold_p2").fadeOut(function () {
                    $("#fold_p2").text(($("#fold_p2").text() == 'Generate tinyurl') ? '<?php echo 'http://tinyurl.com/'.$base_codec['tiny']; ?>' : '<?php echo 'http://tinyurl.com/'.$base_codec['tiny']; ?>').fadeIn(10);
                })
            })
        });
        
         $(document).ready(function () {
            $("#fold3").click(function () {
                $("#fold_p3").fadeOut(function () {
                    $("#fold_p3").text(($("#fold_p3").text() == 'Generate shorte.st') ? '<?php echo 'http://ceesty.com/'.$base_codec['shortest']; ?>' : '<?php echo 'http://ceesty.com/'.$base_codec['shortest']; ?>').fadeIn(10);
                })
            })
        });


    
    </script>





  </body>


</html>
<?php
}
?>