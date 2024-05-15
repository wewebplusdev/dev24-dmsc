<?php
$menuActive = "faq";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

$FaqPage = new FaqPage;

$masterkey = $url->segment[1];
switch ($url->segment[0]) {
    case 'special_case':
        // Handle special case
        break;
        
    case 'another_case':
        // Handle another case
        break;

    default:
        $masterkey = 'faq';

        $req = array();
        $req['keyword'] = $_GET['keyword'];
        $req['sort'] = $_GET['sort'] ? $_GET['sort'] : 1;
        if ($_GET['sort'] == 2) {
            $req['order'] = 'asc';
        }else{
            $req['order'] = 'desc';
        }
        $smarty->assign("req", $req);

        $limit = 12;
        $data = [
            "action" => $FaqPage->medthodMasterkey[$masterkey]['action'],
            "method" => $FaqPage->medthodMasterkey[$masterkey][$menuActive],
            "language" => $FaqPage->language,
            "order" => $req['order'],
            "page" => $page['on'],
            "limit" => $limit,
            "keyword" => $req['keyword'],
        ];

        // call list
        $loadData = $FaqPage->loadData($data);
        $smarty->assign("loadData", $loadData);

        // setup seo and text modules
        $language_modules = array();
        // active menu header
        $headerActive = headerActive($url->url);
        if (is_array($headerActive) && !empty($headerActive)) {
            $language_modules['breadcrumb2'] = $headerActive['page'][0];
            $language_modules['metatitle'] = $headerActive['page'][0];
        }
        // printPre(str_replace("?".$url->parametter, "", $url->url));
        // printPre($url);
       
        $smarty->assign("language_modules", $language_modules);
       
        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $language_modules['metatitle'];
        $seo_keyword = "";
        $seo_pic = "";
        $FaqPage->searchEngine($MainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
        /*## End SEO #####*/
        
        /*## Set up pagination #####*/
        $pagination['total'] = $loadData->_maxRecordCount;
        $pagination['totalpage'] = ceil(($pagination['total'] / $limit));
        $pagination['limit'] = $limit;
        $pagination['curent'] = $page['on'];
        $pagination['method'] = $page;
        $smarty->assign("pagination",$pagination);
        /*## Set up pagination #####*/

        $settingPage = array(
            "page" => $menuActive,
            "template" => "index.tpl",
            "display" => "page"
        );
        break;
}
$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);
