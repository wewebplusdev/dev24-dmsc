<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

if (file_exists($mod_path_pictures . "/" . $_REQUEST['picname'])) {
	@unlink($mod_path_pictures . "/" . $_REQUEST['picname']);
}

if (file_exists($mod_path_office . "/" . $_REQUEST['picname'])) {
	@unlink($mod_path_office . "/" . $_REQUEST['picname']);
}

if (file_exists($mod_path_real . "/" . $_REQUEST['picname'])) {
	@unlink($mod_path_real . "/" . $_REQUEST['picname']);
}

if(file_exists($mod_path_webp."/".$_REQUEST['picname'] . '.webp')) {
	@unlink($mod_path_webp."/".$_REQUEST['picname'] . '.webp');
}

$update = array();
$update[] = $mod_tb_group_lang . "_pic  	=''";
$sql = "UPDATE " . $mod_tb_group_lang . " SET " . implode(",", $update) . " WHERE " . $mod_tb_group_lang . "_id='" . $_REQUEST["valCid"] . "'  ";
$Query = wewebQueryDB($coreLanguageSQL, $sql);


include("../lib/disconnect.php");
