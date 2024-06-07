<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

		
	if(file_exists($mod_path_pictures."/".$_REQUEST['picname2'])) {
		@unlink($mod_path_pictures."/".$_REQUEST['picname2']);
	}	
		
	if(file_exists($mod_path_office."/".$_REQUEST['picname2'])) {
		@unlink($mod_path_office."/".$_REQUEST['picname2']);
	}	

	if(file_exists($mod_path_real."/".$_REQUEST['picname2'])) {
		@unlink($mod_path_real."/".$_REQUEST['picname2']);
	}	

	if(file_exists($mod_path_webp."/".$_REQUEST['picname2'] . '.webp')) {
		@unlink($mod_path_webp."/".$_REQUEST['picname2'] . '.webp');
	}	
			
include("../lib/disconnect.php");
?>