<?php 
include "../../../connection/connect.php";

	  
if(!empty($_SESSION["m_id"]))
{
	header('location:https://'.$_SERVER['HTTP_HOST']);
}
else
{
                                          //block status in users table
                                            if(isset($_POST['submit_status_block']))
                                               {
                                                
                                                            if (isset($_POST['u_id']) && is_numeric($_POST['u_id']))
                                                            {
                                                            
                                                                
                                                          echo   $u_id = $_POST['u_id'];
                                                                 $status= 2;
                                                            
                                                                if ($stmt = $con->prepare("UPDATE users SET status = ? WHERE u_id= ?"))
                                                                {
                                                                    $stmt->bind_param("ii",$status,$u_id);
                                                                    $stmt->execute();
                                                                    $stmt->close();
                                                                    header('location:../../dashboard?page=users');
                                                                   
                                                                }
                                                                 else
                                                                    {
                                                                        echo "ERROR: SQL";
                                                                    }
                                                               
                                                                $con->close();
                                                            
                                                            
                                                               
                                                            }
                                                            
                                               }
                                            //verify status   in users table
                                                if(isset($_POST['submit_status_verify']))
                                               {
                                                
                                                            if (isset($_POST['u_id']) && is_numeric($_POST['u_id']))
                                                            {
                                                            
                                                                
                                                          echo   $u_id = $_POST['u_id'];
                                                                 $status= 1;
                                                            
                                                                if ($stmt = $con->prepare("UPDATE users SET status = ? WHERE u_id= ?"))
                                                                {
                                                                    $stmt->bind_param("ii",$status,$u_id);
                                                                    $stmt->execute();
                                                                    $stmt->close();
                                                                    header('location:../../dashboard?page=users');
                                                                   
                                                                }
                                                                 else
                                                                    {
                                                                        echo "ERROR: SQL";
                                                                    }
                                                               
                                                                $con->close();
                                                            
                                                            
                                                               
                                                            }
                                                            
                                               }
                                               
                                             // delete in users table  
                                                if(isset($_POST['submit_user_del']))
                                               {
                                                
                                                            if (isset($_POST['u_id']) && is_numeric($_POST['u_id']))
                                                            {
                                                            
                                                                
                                                          echo   $u_id = $_POST['u_id'];
                                                                 
                                                            
                                                                if ($stmt = $con->prepare("DELETE FROM users WHERE u_id= ?"))
                                                                {
                                                                    $stmt->bind_param("i",$u_id);
                                                                    $stmt->execute();
                                                                    $stmt->close();
                                                                    
                                                                    //deleting user login activity as well
                                                                    $stmts = $con->prepare("DELETE FROM user_activity WHERE u_id= ?");
                                                                    $stmts->bind_param("i",$u_id);
                                                                    $stmts->execute();
                                                                    $stmts->close();
                                                                    
                                                                    header('location:../../dashboard?page=users');
                                                                    exit();
                                                                    
                                                                   
                                                                }
                                                                 else
                                                                    {
                                                                        echo "ERROR: SQL";
                                                                    }
                                                               
                                                                $con->close();
                                                            
                                                            
                                                               
                                                            }
                                                            
                                               }
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                          //settingup public_private (shotner) by admin on user profile     
                                          //public
                                                if(isset($_POST['submit_public_public']))
                                               {
                                                
                                                            if (isset($_POST['uid']) && is_numeric($_POST['uid']))
                                                            {
                                                            
                                                                
                                                               $uid = $_POST['uid'];
                                                                 $public= 1;
                                                            
                                                                if ($stmt = $con->prepare("UPDATE shotner SET public = ? WHERE uid= ?"))
                                                                {
                                                                    $stmt->bind_param("ii",$public,$uid);
                                                                    $stmt->execute();
                                                                    $stmt->close();
                                                                    header('location:../../dashboard?page=Shorten');
                                                                   
                                                                }
                                                                 else
                                                                    {
                                                                        echo "ERROR: SQL";
                                                                    }
                                                               
                                                                $con->close();
                                                            
                                                            
                                                               
                                                            }
                                               }
                                               
                                        //settingup public_private shotner by admin on user profile         
                                           //private    
                                                if(isset($_POST['submit_public_private']))
                                               {
                                                
                                                            if (isset($_POST['uid']) && is_numeric($_POST['uid']))
                                                            {
                                                            
                                                                
                                                               $uid = $_POST['uid'];
                                                                 $public= 0;
                                                            
                                                                if ($stmt = $con->prepare("UPDATE shotner SET public = ? WHERE uid= ?"))
                                                                {
                                                                    $stmt->bind_param("ii",$public,$uid);
                                                                    $stmt->execute();
                                                                    $stmt->close();
                                                                    header('location:../../dashboard?page=Shorten');
                                                                   
                                                                }
                                                                 else
                                                                    {
                                                                        echo "ERROR: SQL";
                                                                    }
                                                               
                                                                $con->close();
                                                            
                                                            
                                                               
                                                            }
                                               }
                                               
                                               
                                               
                                             //settingup email_notfication shotner by admin on user profile         
                                           //enable    
                                                if(isset($_POST['submit_e_enable']))
                                               {
                                                
                                                            if (isset($_POST['uid']) && is_numeric($_POST['uid']))
                                                            {
                                                            
                                                                
                                                               $uid = $_POST['uid'];
                                                                 $public= 1;
                                                            
                                                                if ($stmt = $con->prepare("UPDATE shotner SET notify = ? WHERE uid= ?"))
                                                                {
                                                                    $stmt->bind_param("ii",$public,$uid);
                                                                    $stmt->execute();
                                                                    $stmt->close();
                                                                    header('location:../../dashboard?page=Shorten');
                                                                   
                                                                }
                                                                 else
                                                                    {
                                                                        echo "ERROR: SQL";
                                                                    }
                                                               
                                                                $con->close();
                                                            
                                                            
                                                               
                                                            }
                                               }
                                               
                                        //settingup email_notfication shotner by admin on user profile         
                                           //disable    
                                                if(isset($_POST['submit_e_disable']))
                                               {
                                                
                                                            if (isset($_POST['uid']) && is_numeric($_POST['uid']))
                                                            {
                                                            
                                                                
                                                               $uid = $_POST['uid'];
                                                                 $public= 0;
                                                            
                                                                if ($stmt = $con->prepare("UPDATE shotner SET notify = ? WHERE uid= ?"))
                                                                {
                                                                    $stmt->bind_param("ii",$public,$uid);
                                                                    $stmt->execute();
                                                                    $stmt->close();
                                                                    header('location:../../dashboard?page=Shorten');
                                                                   
                                                                }
                                                                 else
                                                                    {
                                                                        echo "ERROR: SQL";
                                                                    }
                                                               
                                                                $con->close();
                                                            
                                                            
                                                               
                                                            }
                                               }
                                               
                                            //delete shotner from shotner   
                                                if(isset($_POST['submit_delete_shotner']))
                                               {
                                                
                                                            if (isset($_POST['uid']) && is_numeric($_POST['uid']))
                                                            {
                                                            
                                                                
                                                               $uid = $_POST['uid'];
                                                                $shorturl = $_POST['shorturl'];
                                                              
                                                            
                                                                if ($stmt = $con->prepare("DELETE FROM shotner WHERE uid= ?"))
                                                                {
                                                                    $stmt->bind_param("i",$uid);
                                                                    $stmt->execute(); //deleting the perticular shorturl decided by admin
                                                                    $stmt->close();
                                                                    
                                                                            
                                                                       if ($stmts = $con->prepare("DELETE FROM tracking_data WHERE shorturl= ?"))
                                                                        {
                                                                            $stmts->bind_param("s",$shorturl);
                                                                            $stmts->execute(); //deleting the all the IP associated with above shorturl
                                                                        
                                                                            
                                                                            if($stmts->execute())
                                                                            {
                                                                                 header('location:../../dashboard?page=Shorten');
                                                                            }
                                                                              $stmts->close();
                                                                    
                                                                        }else
                                                                        {
                                                                              echo "ERROR: SQL";
                                                                        }
                                                                        
                                                                    
                                                                }
                                                                 else
                                                                    {
                                                                        echo "ERROR: SQL";
                                                                    }
                                                               
                                                                $con->close();
                                                            
                                                            
                                                               
                                                            }
                                               }
                                               
                                             
                                           
                                            //delete tracking data from tracking table   
                                                if(isset($_POST['submit_delete_track_data']))
                                               {
                                                
                                                            if (isset($_POST['track_id']) && is_numeric($_POST['track_id']))
                                                            {
                                                            
                                                                
                                                               $track_id = $_POST['track_id'];
                                                          
                                                              
                                                            
                                                                if($stmt = $con->prepare("DELETE FROM tracking_data WHERE track_id= ?"))
                                                                {
                                                                    $stmt->bind_param("i",$track_id);
                                                                   
                                                                            if($stmt->execute())
                                                                            {
                                                                                 header('location:../../dashboard?page=tracking');
                                                                            }
                                                                            else
                                                                            {
                                                                                  echo "ERROR: SQL";
                                                                            }
                                                                             $stmt->close();
                                                                    
                                                                }
                                                                else
                                                                {
                                                                                  echo "ERROR: SQL";
                                                                    }
                                                                 
                                                                $con->close();
                                                            
                                                            
                                                               
                                                            }
                                               }
                                               
                                               
                                               
                                               //delete messages data from support table   
                                                if(isset($_POST['submit_delete_messages']))
                                               {
                                                
                                                            if (isset($_POST['s_id']) && is_numeric($_POST['s_id']))
                                                            {
                                                            
                                                                
                                                               $s_id = $_POST['s_id'];
                                                          
                                                              
                                                            
                                                                if($stmt = $con->prepare("DELETE FROM support WHERE s_id= ?"))
                                                                {
                                                                    $stmt->bind_param("i",$s_id);
                                                                   
                                                                            if($stmt->execute())
                                                                            {
                                                                                 header('location:../../dashboard?page=messages');
                                                                            }
                                                                            else
                                                                            {
                                                                                  echo "ERROR: SQL";
                                                                            }
                                                                             $stmt->close();
                                                                    
                                                                }
                                                                else
                                                                {
                                                                                  echo "ERROR: SQL";
                                                                    }
                                                                 
                                                                $con->close();
                                                            
                                                            
                                                               
                                                            }
                                               }
                                               
                                               
                                                //delete bundle data from bundles table   
                                                if(isset($_POST['submit_delete_bundle']))
                                               {
                                                
                                                            if (isset($_POST['b_id']) && is_numeric($_POST['b_id']))
                                                            {
                                                            
                                                                
                                                               $b_id = $_POST['b_id'];
                                                          
                                                              
                                                            
                                                                if($stmt = $con->prepare("DELETE FROM bundles WHERE b_id= ?"))
                                                                {
                                                                    $stmt->bind_param("i",$b_id);
                                                                   
                                                                            if($stmt->execute())
                                                                            {
                                                                                 header('location:../../dashboard?page=manage_changer');
                                                                            }
                                                                            else
                                                                            {
                                                                                  echo "ERROR: SQL";
                                                                            }
                                                                             $stmt->close();
                                                                    
                                                                }
                                                                else
                                                                {
                                                                                  echo "ERROR: SQL";
                                                                    }
                                                                 
                                                                $con->close();
                                                            
                                                            
                                                               
                                                            }
                                               }

}

?>