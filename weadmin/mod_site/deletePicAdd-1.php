<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");


	if(file_exists($mod_path_pictures."/".$_REQUEST['picnameCallape1'])) {
		@unlink($mod_path_pictures."/".$_REQUEST['picnameCallape1']);
	}

	if(file_exists($mod_path_office."/".$_REQUEST['picnameCallape1'])) {
		@unlink($mod_path_office."/".$_REQUEST['picnameCallape1']);
	}

	if(file_exists($mod_path_real."/".$_REQUEST['picnameCallape1'])) {
		@unlink($mod_path_real."/".$_REQUEST['picnameCallape1']);
	}
include("../lib/disconnect.php");
?>
