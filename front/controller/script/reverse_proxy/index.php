<?php
header('Content-Type: application/json; charset=utf-8');
$menuActive = "pageredirect";
$ReverseProxy = new ReverseProxy;

$jsonData = file_get_contents('php://input');
$resultData = json_decode($jsonData, true);

switch ($resultData['case']) {
    case 'logs_Website':
        $req = [
            "method" => $resultData['method'],
            "browser" => $resultData['browser'],
            "uniqid" => $resultData['uniqid'],
        ];
        $loadFetchApi = $ReverseProxy->loadInsertLogs($req);

        break;

    case 'logs_pdpa':
        $req = [
            "method" => $resultData['method'],
            "browser" => $resultData['browser'],
            "uniqid" => $resultData['uniqid'],
        ];
        $loadFetchApi = $ReverseProxy->loadInsertLogs($req);

        break;

    case 'dynamic':
        $data = array();
        foreach ($resultData as $key => $value) {
            if ($key == 'case' || $key == 'Controller') {
                continue;
            }
            $data[$key] = $value;
        }
        $data['language'] = $ReverseProxy->language;
        $loadFetchApi = $ReverseProxy->loadFetchApi($data, $resultData['Controller']);

        break;

    default:
        $data = [
            "method" => $resultData['method'],
            "language" => $ReverseProxy->language,
            "gid" => $resultData['gid'],
            "order" => $resultData['order'],
            "page" => $resultData['page'],
            "limit" => $resultData['limit'],
        ];
        $loadFetchApi = $ReverseProxy->loadFetchApi($data, $resultData['Controller']);

        break;
}

echo json_encode($loadFetchApi);
