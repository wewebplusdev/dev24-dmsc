<?php
$menuActive = "feed";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

$FeedPage = new FeedPage;
define('HOME_PATH', '/home');
define('LOCATION_PREFIX', 'location:');

$contentID = $url->segment[1];

switch ($url->segment[0]) {
    default:
        if (empty($contentID)) {
            header(LOCATION_PREFIX . $linklang . HOME_PATH);
        }
        $smarty->assign("contentID", $contentID);

        $data = [
            "action" => 'feed',
            "method" => 'getFeed',
            "language" => $FeedPage->language,
            "contentid" => $contentID,
        ];

        // call list
        $load_data = $FeedPage->load_data($data);
        if ($load_data->code != 1001) {
            header(LOCATION_PREFIX . $linklang . HOME_PATH);
        }

        $context = stream_context_create(array('ssl'=>array(
            'verify_peer' => false, 
            "verify_peer_name"=>false
        )));
        
        libxml_set_streams_context($context);
        $sxml = simplexml_load_file($load_data->item[0]->api);
        
        // Check if the XML was loaded successfully
        if ($sxml !== false) {
            $array_data = array();
            if (isset($sxml->channel) && isset($sxml->channel->item) && count($sxml->channel->item) > 0) {
                // Iterate over each item in the feed
                $array_data = array();
                $keyRss = 0;
                foreach ($sxml->channel->item as $item) {
                    $array_data[$keyRss]['title'] = (string) $item->title;
                    $array_data[$keyRss]['description'] = (string) $item->description;
                    $array_data[$keyRss]['pubDate'] = (string) $item->pubDate;
                    $array_data[$keyRss]['url'] = (string) $item->link;
                    $array_data[$keyRss]['enclosure'] = (string) $item->enclosure->attributes()->url;
                    $keyRss++;
                }

                $smarty->assign("array_data", $array_data);
            } else {
                header(LOCATION_PREFIX . $linklang . HOME_PATH);
            }
        } else {
            header(LOCATION_PREFIX . $linklang . HOME_PATH);
        }

        // setup seo and text modules
        $language_modules = array();
        $language_modules['breadcrumb2'] = $load_data->item[0]->subject;
        $language_modules['metatitle'] = $load_data->item[0]->subject;
        // active menu header
        $header_active = header_active($url->url);
        if (gettype($header_active) == 'array' && count($header_active) > 0) {
            $language_modules['breadcrumb2'] = $header_active['page'][0];
            $language_modules['metatitle'] = $header_active['page'][0];
        }
        $smarty->assign("language_modules", $language_modules);
       
        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $language_modules['metatitle'];
        $seo_keyword = "";
        $seo_pic = "";
        $FeedPage->searchEngine($MainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
        /*## End SEO #####*/
        
        $settingPage = array(
            "page" => $menuActive,
            "template" => "index.tpl",
            "display" => "page"
        );
        break;
}
$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);
