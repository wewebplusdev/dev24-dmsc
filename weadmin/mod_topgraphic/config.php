<?php

## Mod Table ###################################
$mod_tb_root = "md_tgp";
$mod_tb_root_lang = "md_tgpl";

## Mod Folder ###################################
$mod_fd_root = "mod_topgraphic";

## Setting Value ###################################
$modTxtTarget = array("", "เปิดหน้าต่างเดิม", "เปิดหน้าต่างใหม่");
$modTxtType = array("ประเภทข้อมูล", "รูปภาพ", "Youtube", "วีดีโอ");
$modStatus = array("Enable", "Disable");

## Size Pic ###################################
if ($_REQUEST['masterkey'] == 'popup') {
    $sizeWidthReal = "1024";
    $sizeHeightReal = "600";

    $sizeWidthPic = "1024";
    $sizeHeightPic = "600";
}else{
    $sizeWidthReal = "1920";
    $sizeHeightReal = "800";

    $sizeWidthPic = "1920";
    $sizeHeightPic = "800";
}


$sizeWidthOff = "50";
$sizeHeightOff = "50";

$sizeVDO = 64;

## Mod Path ###################################

$mod_path_office = $core_pathname_upload . "/" . $masterkey . "/office";
$mod_path_office_fornt = $core_pathname_upload_fornt . "/" . $masterkey . "/office";

$mod_path_real = $core_pathname_upload . "/" . $masterkey . "/real";
$mod_path_real_fornt = $core_pathname_upload_fornt . "/" . $masterkey . "/real";

$mod_path_pictures = $core_pathname_upload . "/" . $masterkey . "/pictures";
$mod_path_pictures_fornt = $core_pathname_upload_fornt . "/" . $masterkey . "/pictures";

$mod_path_webp = $core_pathname_upload . "/" . $masterkey . "/webp";
$mod_path_webp_fornt = $core_pathname_upload_fornt . "/" . $masterkey . "/webp";

$mod_path_vdo        = $core_pathname_upload."/".$masterkey."/vdo";
$mod_path_vdo_fornt  = $core_pathname_upload_fornt."/".$masterkey."/vdo";

$mod_inputseach = array("inputGh"
    ,"inputTh"
    ,"inputSearch"
    ,"inputSrchStatus"

);
?>
