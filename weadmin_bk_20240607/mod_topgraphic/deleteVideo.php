<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

if (file_exists($mod_path_vdo . "/" . $_REQUEST['vdoname'])) {
	@unlink($mod_path_vdo . "/" . $_REQUEST['vdoname']);
}

$update = array();
$update[] = $mod_tb_root_lang . "_filevdo  	=''";
$sql = "UPDATE " . $mod_tb_root_lang . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root_lang . "_id='" . $_REQUEST["valCid"] . "'  ";
$Query = wewebQueryDB($coreLanguageSQL, $sql);


include("../lib/disconnect.php");
