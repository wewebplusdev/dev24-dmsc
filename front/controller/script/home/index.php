<?php
$menuActive = "home";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js'.$lastModify.'"></script>';
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/controller.js'.$lastModify.'"></script>';

$HomePage = new HomePage;

switch ($url->segment[0]) {
    case 'special_case':
        // Handle special case
        break;
        
    case 'another_case':
        // Handle another case
        break;

    default:
        // call popup
        $loadPopup = $HomePage->loadPopup();
        $smarty->assign("loadPopup", $loadPopup);
        // call top graphic
        $loadTopgraphic = $HomePage->loadTopgraphic();
        $smarty->assign("loadTopgraphic", $loadTopgraphic);
        // call services
        $loadServices = $HomePage->loadServices();
        $smarty->assign("load_services", $loadServices);
        // call innovation
        $loadInnovation = $HomePage->loadInnovation();
        $smarty->assign("load_innovation", $loadInnovation);
        // call about
        $load_about = $HomePage->loadAbout();
        $smarty->assign("load_about", $load_about);
        // call news
        $loadNews = $HomePage->loadNews();
        $array_news_list = array();
        if (gettype($loadNews->item->group) == 'array' && count($loadNews->item->group) > 0) {
            foreach ($loadNews->item->group as $keyNewsGroup => $valueNewsGroup) {
                $array_news_list['group'][] = $valueNewsGroup;
            }
        }
        if (gettype($loadNews->item->list) == 'array' && count($loadNews->item->list) > 0) {
            foreach ($loadNews->item->list as $keyNewsList => $valueNewsList) {
                $array_news_list['list'][$valueNewsList->gid][] = $valueNewsList;
            }
        }
        $smarty->assign("array_news_list", $array_news_list);

        // active menu header
        $headerActive = headerActive($url->url);
        if (is_array($headerActive) && !empty($headerActive)) {
            $language_modules['breadcrumb2'] = $headerActive['page'][0];
            $language_modules['metatitle'] = $headerActive['page'][0];
        }
        

        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $languageFrontWeb->menu_home->display->$currentLangWeb;
        $seo_keyword = "";
        $seo_pic = "";
        $HomePage->searchEngine($MainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
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
