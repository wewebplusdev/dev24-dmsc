<?php
$path_root = "/dev24-dmsc"; #ถ้า root ไม่ได้อยู่ public
require_once 'config.php';
require_once 'lib/connect.php';
require_once 'lib/classpic.php';
require_once 'function.php';

$segment = array_values(array_filter(explode("/", str_replace($path_root, "", $_SERVER['REQUEST_URI']))));

switch ($segment[1]) {
    case 'about':
        require_once 'service/migrate-about.php';
        break;

    case 'news':
        require_once 'service/migrate-news.php';
        break;
    
    default:
        header('Content-Type: application/json; charset=utf');
        $arrJson = array(
            'code' => 400,
            'msg' => 'not found method'
        );
        echo json_encode($arrJson);
        exit();
        break;
}
