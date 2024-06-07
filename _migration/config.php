<?php
error_reporting(0);
define("_DIR", str_replace("\\", '/', dirname(__FILE__)));

$array_id_config = array(
    10 => array(
        'nw' => 25,
    ),
    11 => array(
        'nwa' => 119,
    ),
);

$core_pathname_upload = '/upload';
$core_pathname_ckeditor = '/ckeditor';

$coreLanguageSQL = 'mysqli';
$core_db_charecter_set = array(
    'charset' => "utf8",
    'collation' => "utf8_general_ci"
);
$_env = array(
    'old' => array(
        'hostname' => 'DB',
        'username' => 'root',
        'password' => 'MYSQL_ROOT_PASSWORD',
        'dbname' => '2024_dmsc_migrate',
    ),
    'new' => array(
        'hostname' => 'DB',
        'username' => 'root',
        'password' => 'MYSQL_ROOT_PASSWORD',
        'dbname' => '2024_dmsc',
    ),
);

$sizeWidthPic_abs = "90";
$sizeHeightPic_abs = "90";
$sizeWidthPic_nw = "400";
$sizeHeightPic_nw = "300";
$sizeHeightPic = "600";
$sizeWidthPic = "600";

$sizeWidthOff = 50;
$sizeHeightOff = 50;

$config = array();
$config['old']['page'] = 'page';
$config['old']['post'] = 'post';
$config['old']['files'] = 'files';

$config['new']['cmg'] = 'md_cmg';
$config['new']['cmgl'] = 'md_cmgl';
$config['new']['cms'] = 'md_cms';
$config['new']['cmsl'] = 'md_cmsl';
$config['new']['cma'] = 'md_cma';
$config['new']['cmal'] = 'md_cmal';
$config['new']['cmf'] = 'md_cmf';
$config['new']['cmfl'] = 'md_cmfl';