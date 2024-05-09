<?php
$menuActive = "listAll";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

$ListAllPage = new ListAllPage;

$masterkey = $url->segment[1];

switch ($url->segment[0]) {
    default:
        if (empty($masterkey)) {
            $masterkey = 'nw';
            header('location:' . $linklang . "/" . $menuActive . "/" . $masterkey);
        }
        $smarty->assign("masterkey", $masterkey);
        
        $req = array();
        $req['keyword'] = $_GET['keyword'];
        $req['gid'] = $_GET['gid'];
        $req['sort'] = $_GET['sort'] ? $_GET['sort'] : 1;
        if ($_GET['sort'] == 2) {
            $req['order'] = 'asc';
        }else{
            $req['order'] = 'desc';
        }
        $smarty->assign("req", $req);

        $limit = 12;

        $data_group = [
            "action" => $ListAllPage->medthodModule[$menuActive]['action'],
            "method" => $ListAllPage->medthodModule[$menuActive]['method_group'],
            "language" => $ListAllPage->language,
            "order" => 'desc',
            "page" => $page['on'],
            "limit" => $limit,
            "masterkey" => $masterkey,
        ];
        
        // call group
        $load_group = $ListAllPage->load_data($data_group);
        if ($load_group->code == 1001 && $load_group->_numOfRows > 0) {
            $smarty->assign("load_group", $load_group);
        }

        $data = [
            "action" => $ListAllPage->medthodModule[$menuActive]['action'],
            "method" => $ListAllPage->medthodModule[$menuActive]['method_list'],
            "language" => $ListAllPage->language,
            "order" => $req['order'],
            "page" => $page['on'],
            "limit" => $limit,
            "keyword" => $req['keyword'],
            "gid" => $req['gid'],
            "masterkey" => $masterkey,
        ];

        // call list
        $load_data = $ListAllPage->load_data($data);
        $smarty->assign("load_data", $load_data);

        // setup seo and text modules
        $language_modules = array();
        // active menu header
        $headerActive = headerActive($url->url);
        if (gettype($headerActive) == 'array' && count($headerActive) > 0) {
            $language_modules['breadcrumb2'] = $headerActive['page'][0];
            $language_modules['metatitle'] = $headerActive['page'][0];
        }

        if ($masterkey == 'nw') {
            $language_modules['breadcrumb2'] = $languageFrontWeb->pressrelease->display->$currentLangWeb;
            $language_modules['metatitle'] = $languageFrontWeb->pressrelease->display->$currentLangWeb;
        }elseif($masterkey == 'nwa'){
            $language_modules['breadcrumb2'] = $languageFrontWeb->news_nwa->display->$currentLangWeb;
            $language_modules['metatitle'] = $languageFrontWeb->news_nwa->display->$currentLangWeb;
        }elseif($masterkey == 'km'){
            $language_modules['breadcrumb2'] = $languageFrontWeb->kmpage->display->$currentLangWeb;
            $language_modules['metatitle'] = $languageFrontWeb->kmpage->display->$currentLangWeb;
        }elseif($masterkey == 'god'){
            $language_modules['breadcrumb2'] = $languageFrontWeb->governmentopendata->display->$currentLangWeb;
            $language_modules['metatitle'] = $languageFrontWeb->governmentopendata->display->$currentLangWeb;
        }elseif($masterkey == 'nwp'){
            $language_modules['breadcrumb2'] = $languageFrontWeb->newspeople->display->$currentLangWeb;
            $language_modules['metatitle'] = $languageFrontWeb->newspeople->display->$currentLangWeb;
        }elseif($masterkey == 'abs'){
            $language_modules['breadcrumb2'] = $languageFrontWeb->aboutus->display->$currentLangWeb;
            $language_modules['metatitle'] = $languageFrontWeb->aboutus->display->$currentLangWeb;
        }elseif($masterkey == 'dcio'){
            $language_modules['breadcrumb2'] = $languageFrontWeb->dcio->display->$currentLangWeb;
            $language_modules['metatitle'] = $languageFrontWeb->dcio->display->$currentLangWeb;
        }
        $smarty->assign("language_modules", $language_modules);
       
        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $language_modules['metatitle'];
        $seo_keyword = "";
        $seo_pic = "";
        $ListAllPage->searchEngine($MainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
        /*## End SEO #####*/
        
        /*## Set up pagination #####*/
        $pagination['total'] = $load_data->_maxRecordCount;
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
