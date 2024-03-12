<?php

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

            header("Location:" . $newUrl);
        } else {
            header("Location:" . _URL . "/" . $url->segment[1]);
        }
    } else {

        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}