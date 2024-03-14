<?php
$menuActive = "home";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

$homePage = new homePage;

switch ($url->segment[0]) {
    default:
        // call popup
        $load_popup = $homePage->load_popup();
        $smarty->assign("load_popup", $load_popup);
        // call top graphic
        $load_topgraphic = $homePage->load_topgraphic();
        $smarty->assign("load_topgraphic", $load_topgraphic);
        // call services
        $load_services = $homePage->load_services();
        $smarty->assign("load_services", $load_services);

        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $languageFrontWeb->menu_home->display->$currentLangWeb;
        $seo_keyword = "";
        $seo_pic = "";
        $homePage->search_engine($mainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
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
