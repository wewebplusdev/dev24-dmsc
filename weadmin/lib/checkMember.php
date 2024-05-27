<?php
// is login
if($_SESSION[$valSiteManage."core_session_logout"]<=0){
	header( "Location:../index.php"); // logout
}
// life time login 60 minutes
if((time() - $_SESSION[$valSiteManage . "core_session_login_time"]) > $core_login_lifetime){
	header( "Location:../index.php"); // logout	
}
// no activity 15 minutes
if((time() - $_SESSION[$valSiteManage . "core_session_last_activity"]) > $core_login_last_activity){
	header( "Location:../index.php"); // logout
}
$_SESSION[$valSiteManage . "core_session_last_activity"] = time(); // revoke session activity