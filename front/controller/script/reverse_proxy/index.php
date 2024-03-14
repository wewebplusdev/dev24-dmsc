<?php
header('Content-Type: application/json; charset=utf-8');
$menuActive = "pageredirect";
$reverse_proxy = new reverse_proxy;

$jsonData = file_get_contents('php://input');
$resultData =json_decode($jsonData, true);
$data = [
    "method" => $resultData['method'],
    "language" => $reverse_proxy->language,
    "gid" => $resultData['gid'],
    "order" => $resultData['order'],
    "page" => $resultData['page'],
    "limit" => $resultData['limit'],
];

$load_fetch_api = $reverse_proxy->load_fetch_api($data, $resultData['controller']);

echo json_encode($load_fetch_api);
exit(0);
