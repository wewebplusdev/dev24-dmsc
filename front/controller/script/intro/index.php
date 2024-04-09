<?php
$menuActive = "intro";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

$introPage = new introPage;

switch ($url->segment[0]) {
    default:
        // call intro
        $load_intro = $introPage->load_intro();
        if (count($load_intro->item) < 1) {
            header('location:' . $linklang . "/home");
        }
        $array_intro = array();
        $status_has_data = false;
        foreach ($load_intro->item as $keyload_intro => $valueload_intro) {
            if (!empty($valueload_intro->subject)) {
                $status_has_data = true;
            }
            $array_intro[] = $valueload_intro;
        }
        $smarty->assign("array_intro", $array_intro);

        if (!$status_has_data) {
            header('location:' . $linklang . "/home");
        }

        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = "";
        $seo_keyword = "";
        $seo_pic = "";
        $introPage->search_engine($mainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
        /*## End SEO #####*/

        $settingPage = array(
            "page" => $menuActive,
            "template" => "index.tpl",
            "display" => "page-script"
        );
        break;
}
$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);
