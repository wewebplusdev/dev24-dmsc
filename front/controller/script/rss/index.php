<?php
$menuActive = "rss";
$rssPage = new rssPage;

if (!empty($url->segment[1])) {
    $explo1 = explode(".xml", $url->segment[1]);
    $explo2 = explode("Feed", $explo1[0]);
    $masterkey = $explo2[0]; //masterkey
    $group = intval($explo2[1]); //group

    switch ($masterkey) {
        case 'nw':
            $data_group = [
                "method" => "getNewsGroup",
                "language" => $url->pagelang[4],
                "order" => 'DESC',
                "id" => $group,
                "page" => 1,
                "limit" => 15,
            ];
            $load_rss_group = $rssPage->load_rss($data_group, 'news');
            if ($load_rss_group->_numOfRows > 0) {
                $data = [
                    "method" => "getNews",
                    "language" => $url->pagelang[4],
                    "order" => 'DESC',
                    "gid" => $group,
                    "page" => 1,
                    "limit" => 100,
                ];
                $load_rss = $rssPage->load_rss($data, 'news');

                $TitleRSS = $load_rss_group->item[0]->subject;
                $urlRss = _URL . 'listAll/' . $load_rss_group->item[0]->masterkey . "/" . $load_rss_group->item[0]->id;
                require_once _DIR . '/front/controller/script/'.$menuActive.'/service/create.php';
            } else {
                echo ('no rss');
            }
            break;
        case 'km':
            $data_group = [
                "method" => "getKmGroup",
                "language" => $url->pagelang[4],
                "order" => 'DESC',
                "id" => $group,
                "page" => 1,
                "limit" => 15,
            ];
            $load_rss_group = $rssPage->load_rss($data_group, 'km');
            if ($load_rss_group->_numOfRows > 0) {
                $data = [
                    "method" => "getKm",
                    "language" => $url->pagelang[4],
                    "order" => 'DESC',
                    "gid" => $group,
                    "page" => 1,
                    "limit" => 100,
                ];
                $load_rss = $rssPage->load_rss($data, 'km');

                $TitleRSS = $load_rss_group->item[0]->subject;
                $urlRss = _URL . 'listAll/' . $load_rss_group->item[0]->masterkey . "/" . $load_rss_group->item[0]->id;
                require_once _DIR . '/front/controller/script/'.$menuActive.'/service/create.php';
            } else {
                echo ('no rss');
            }
            break;
        default:
            echo ('no rss');
            break;
    }
}
