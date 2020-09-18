<?php 
session_start();
//User session in ['user']
if($_SESSION['u_id']){
    
 
    session_unset(); //unset all sessions
    session_destroy(); //destroy all sessions
    session_write_close();
    setcookie(session_name(),'',0,'/');
    
    //unset all cookies
    setcookie("username", NULL, 0, "/"); 
    setcookie("pass_salt", NULL, 0, "/");
    setcookie("loggedin", NULL, 0, "/");
    setcookie("u_id", NULL, 0, "/");
   
 
    session_regenerate_id(true); //randomly generate new session ids
	$path =parse_url($_SERVER['REQUEST_URI'], PHP_URL_HOST); 
    header("location:".$path."/login");
    exit();


}
else
{
    echo 'not getting any session';
}
?>