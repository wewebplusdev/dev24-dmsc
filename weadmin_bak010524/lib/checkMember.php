<?php
// is login
if($_SESSION[$valSiteManage."core_session_logout"]<=0){
	header( "Location:../index.php"); 	
}
// life time login
if((time() - $_SESSION[$valSiteManage . "core_session_login_time"]) > $core_login_lifetime){
	header( "Location:../index.php"); 	
}
// no activity
if((time() - $_SESSION[$valSiteManage . "core_session_last_activity"]) > $core_login_last_activity){
	header( "Location:../index.php"); 	
}
$_SESSION[$valSiteManage . "core_session_last_activity"] = time(); // update last activity time stamp
?>