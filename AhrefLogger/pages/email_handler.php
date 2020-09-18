 <?php
  include "../connection/connect.php";
 session_start();
 
 if(!isset($_SESSION['loggedin'])) {
	header('Location: ../login');
	exit();
}

                                        
                                        if(isset($_POST['notification']))
                                               {
                                                
                                                            if (isset($_POST['email_notify_on_off']) && is_numeric($_POST['email_notify_on_off']))
                                                            {
                                                            
                                                                $email_notify_on_off = $_POST['email_notify_on_off'];
                                                                
                                                            
                                                                if ($stmt = $con->prepare("UPDATE shotner SET notify = ? WHERE track_code= ?"))
                                                                {
                                                                    $stmt->bind_param("is",$email_notify_on_off,$_SESSION['TRACK_CODE']);
                                                                    $stmt->execute();
                                                                    $stmt->close();
                                                                 
                                                                   header('location:../track?e_s=1');
                                                                  
                                                                }
                                                                 else
                                                                    {
                                                                        header('location:../track?error=sql_error');
                                                                      
                                                                    }
                                                               
                                                                $con->close();
                                                            
                                                            
                                                               
                                                            }
                                                           
                                                
                                                  }
                                        
                                        
                                        
                                        
?>