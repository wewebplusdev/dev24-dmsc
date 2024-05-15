<?php
define('LOCATION_HEADER', 'Location:');

if (!empty($url->segment[1]) && !empty($url->pagelang[2])) {
    if ($url->pagelang[2] != $url->segment[1]) {

        if (!empty($_SERVER['HTTP_REFERER'])) {
            $urlHistory = str_replace(str_replace('//', '/', _URL), '', str_replace('//', '/', $_SERVER['HTTP_REFERER']));

            $listUrl = explode("/", $urlHistory);
            $newUrl = _URL;
            foreach ($listUrl as $keyList => $settingLangLink) {
                if ($keyList == 0) {
                    $newUrl .= $url->segment[1];
                } else {
                    $newUrl .= "/" . $settingLangLink;
                }
            }

            header(LOCATION_HEADER . $newUrl);
        } else {
            header(LOCATION_HEADER . _URL . "/" . $url->segment[1]);
        }
    } else {

        header(LOCATION_HEADER . $_SERVER['HTTP_REFERER']);
    }
}