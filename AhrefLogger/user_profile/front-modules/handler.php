<?php
include "../../connection/connect.php";
session_start();

if(!isset($_SESSION['loggedin'])) {
	header('Location: ../../../login');
	exit();
}

					              	     if(isset($_POST['submit_public']))
                                               {
                                                
                                                            if (isset($_POST['public']) && is_numeric($_POST['public']))
                                                            {
                                                            
                                                                $public = $_POST['public'];
                                                                $url_id = $_POST['url_id'];
                                                            
                                                                if ($stmt = $con->prepare("UPDATE shotner SET public = ? WHERE uid= ? && u_id = ?"))
                                                                {
                                                                    $stmt->bind_param("iii",$public,$url_id,$_SESSION['u_id']);
                                                                    $stmt->execute();
                                                                    $stmt->close();
                                                                    header('location:../dashboard?page=home');
                                                                   
                                                                }
                                                                 else
                                                                    {
                                                                        echo "ERROR: SQL";
                                                                    }
                                                               
                                                                $con->close();
                                                            
                                                            
                                                               
                                                            }
                                                           
                                                
                                                  }
                                                  
                    			    
                    			    
                    			    
                    			         if(isset($_POST['submit_private']))
                                                   {
                                                    
                                                                if (isset($_POST['private']) && is_numeric($_POST['private']))
                                                                {
                                                                
                                                                    $private = $_POST['private'];
                                                                      $url_id = $_POST['url_id'];
                                                                    
                                                                
                                                                
                                                                    if ($stmt = $con->prepare("UPDATE shotner SET public = ? WHERE uid= ? && u_id = ?"))
                                                                    {
                                                                        $stmt->bind_param("iii",$private,$url_id,$_SESSION['u_id']);
                                                                        $stmt->execute();
                                                                        $stmt->close();
                                                                        header('location:../dashboard?page=home');
                                                                      
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "ERROR: SQL";
                                                                    }
                                                                   
                                                                 
                                                                
                                                                
                                                                
                                                                }
                                                               
                                                    
                                                      }


?>