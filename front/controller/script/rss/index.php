<?php
define('NO_RSS_MESSAGE', 'no rss');

$menuActive = "rss";
$RssPage = new RssPage;

if (!empty($url->segment[1])) {
    $explo1 = explode(".xml", $url->segment[1]);
    $explo2 = explode("Feed", $explo1[0]);
    $masterkey = $explo2[0]; //masterkey
    $group = intval($explo2[1]); //group

    if (!empty($masterkey)) {
        $data_group = [
            "action" => $RssPage->medthodModule[$menuActive]['action'],
            "method" => $RssPage->medthodModule[$menuActive]['method_group'],
            "language" => $url->pagelang[4],
            "order" => 'DESC',
            "id" => $group,
            "page" => 1,
            "limit" => 15,
            "masterkey" => $masterkey,
        ];
        $load_rss_group = $RssPage->loadRss($data_group, 'news');

        $data = [
            "action" => $RssPage->medthodModule[$menuActive]['action'],
            "method" => $RssPage->medthodModule[$menuActive]['method_list'],
            "language" => $url->pagelang[4],
            "order" => 'DESC',
            "gid" => $group,
            "page" => 1,
            "limit" => 100,
            "masterkey" => $masterkey,
        ];
        $loadRss = $RssPage->loadRss($data, 'news');
        if ($loadRss->_numOfRows > 0) {
            $TitleRSS = 'กรมวิทยาศาสตร์การแพทย์ กระทรวงสาธารณสุข';
            $urlRss = _URL . 'listAll/' . $loadRss->item[0]->masterkey . "/" . $loadRss->item[0]->gid;
            require_once _DIR . '/front/controller/script/' . $menuActive . '/service/create.php';
        } else {
            echo NO_RSS_MESSAGE;
        }
    } else {
        echo NO_RSS_MESSAGE;
    }
} else {
    echo NO_RSS_MESSAGE;
}
