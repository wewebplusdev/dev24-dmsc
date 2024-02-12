<?php
## Mod Table ###################################
$mod_tb_root = "md_ban";
$mod_tb_root_group= "md_bag";
## Mod Folder ###################################
$mod_fd_root = "mod_weblink";

## Setting Value ###################################
$modTxtTarget=array("","เปิดหน้าต่างเดิม","เปิดหน้าต่างใหม่");

## Size Pic ###################################
$sizeWidthReal="240";
$sizeHeightReal="120";

$sizeWidthPic="190";
$sizeHeightPic="50";

$sizeWidthOff="50";
$sizeHeightOff="50";

## Mod Path ###################################

$mod_path_office        = $core_pathname_upload."/".$masterkey."/office";
$mod_path_office_fornt  = $core_pathname_upload_fornt."/".$masterkey."/office";

$mod_path_real        = $core_pathname_upload."/".$masterkey."/real";
$mod_path_real_fornt  = $core_pathname_upload_fornt."/".$masterkey."/real";

$mod_path_pictures        = $core_pathname_upload."/".$masterkey."/pictures";
$mod_path_pictures_fornt  = $core_pathname_upload_fornt."/".$masterkey."/pictures";

## Mod Lang Conf ###################################
if($_REQUEST['inputLt']=="Thai"){
	$mod_lang_set ="";
}else if($_REQUEST['inputLt']=="Eng"){
	$mod_lang_set ="en";
}else{
	$mod_lang_set ="";
}

?>
