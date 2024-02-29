<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");


	if(file_exists($mod_path_pictures."/".$_REQUEST['picnameCallape2'])) {
		@unlink($mod_path_pictures."/".$_REQUEST['picnameCallape2']);
	}

	if(file_exists($mod_path_office."/".$_REQUEST['picnameCallape2'])) {
		@unlink($mod_path_office."/".$_REQUEST['picnameCallape2']);
	}

	if(file_exists($mod_path_real."/".$_REQUEST['picnameCallape2'])) {
		@unlink($mod_path_real."/".$_REQUEST['picnameCallape2']);
	}
include("../lib/disconnect.php");
?>
