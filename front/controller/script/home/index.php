<?php
$menuActive = "home";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js'.$lastModify.'"></script>';
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/controller.js'.$lastModify.'"></script>';
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/guides.js'.$lastModify.'"></script>';

$homePage = new homePage;

switch ($url->segment[0]) {
    default:
        // call popup
        $load_popup = $homePage->load_popup();
        // print_pre($load_popup);
        $smarty->assign("load_popup", $load_popup);
        // call top graphic
        $load_topgraphic = $homePage->load_topgraphic();
        $smarty->assign("load_topgraphic", $load_topgraphic);
        // call services
        $load_services = $homePage->load_services();
        $smarty->assign("load_services", $load_services);
        // call innovation
        $load_innovation = $homePage->load_innovation();
        $smarty->assign("load_innovation", $load_innovation);
        // call about
        $load_about = $homePage->load_about();
        $smarty->assign("load_about", $load_about);
        // call news
        $load_news = $homePage->load_news();
        $array_news_list = array();
        if (gettype($load_news->item->group) == 'array' && count($load_news->item->group) > 0) {
            foreach ($load_news->item->group as $keyNewsGroup => $valueNewsGroup) {
                $array_news_list['group'][] = $valueNewsGroup;
            }
        }
        if (gettype($load_news->item->list) == 'array' && count($load_news->item->list) > 0) {
            foreach ($load_news->item->list as $keyNewsList => $valueNewsList) {
                $array_news_list['list'][$valueNewsList->gid][] = $valueNewsList;
            }
        }
        $smarty->assign("array_news_list", $array_news_list);

        // active menu header
        $header_active = header_active($url->url);
        if (gettype($header_active) == 'array' && count($header_active) > 0) {
            $language_modules['breadcrumb2'] = $header_active['page'][0];
            $language_modules['metatitle'] = $header_active['page'][0];
        }

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
