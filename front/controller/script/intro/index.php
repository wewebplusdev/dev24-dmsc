<?php
$menuActive = "intro";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

$introPage = new introPage;

switch ($url->segment[0]) {
    default:
        // call intro
        $load_intro = $introPage->load_intro();
        $array_intro = array();
        foreach ($load_intro->item as $keyload_intro => $valueload_intro) {
            $array_intro[] = $valueload_intro;
        }
        $smarty->assign("array_intro", $array_intro);

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
