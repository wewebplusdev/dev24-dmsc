<?php
$menuActive = "home";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

// $homePage = new homePage;

switch ($url->segment[0]) {
    default:
        // call top graphic
        // $load_topgraphic = $homePage->load_topgraphic();
        // $smarty->assign("load_topgraphic", $load_topgraphic);

        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $languageFrontWeb->menu_home->display->$currentLangWeb;
        $seo_keyword = "";
        $seo_pic = "";
        $mainPage->search_engine($mainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
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
