<?php
$menuActive = "json";
$jsonPage = new jsonPage;

header('Content-Type: application/json; charset=utf-8');
if (!empty($url->segment[1])) {
    $explo1 = explode(".xml", $url->segment[1]);
    $explo2 = explode("Feed", $explo1[0]);
    $masterkey = $explo2[0]; //masterkey
    $group = intval($explo2[1]); //group

    $req = array();
    $req['limit'] = (isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])) ? $_REQUEST['limit'] : 15;
    $req['page'] = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;

    $data_group = [
        "action" => $jsonPage->method_masterkey[$masterkey]['action'],
        "method" => $jsonPage->method_masterkey[$masterkey]['rssGroup'],
        "language" => $url->pagelang[4],
        "order" => 'DESC',
        "id" => $group,
        "page" => 1,
        "limit" => 15,
    ];
    $load_json_group = $jsonPage->load_json($data_group, 'news');
    if ($load_json_group->_numOfRows > 0) {
        $data = [
            "action" => $jsonPage->method_masterkey[$masterkey]['action'],
            "method" => $jsonPage->method_masterkey[$masterkey]['rss'],
            "language" => $url->pagelang[4],
            "order" => 'DESC',
            "gid" => $group,
            "page" => $req['page'],
            "limit" => $req['limit'],
        ];
        $load_json = $jsonPage->load_json($data, 'news');
        echo json_encode($load_json);
    } else {
        $arrJson = array(
            'code' => 400,
            'msg' => 'Data Not found.',
        );
        echo json_encode($arrJson);
    }
}else{
    $arrJson = array(
        'code' => 1008,
        'msg' => 'Unknown method.',
    );
    echo json_encode($arrJson);
}
