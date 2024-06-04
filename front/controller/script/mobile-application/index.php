<?php
$menuActive = "mobile-application";
$listjs[] = '<script defer src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

$MobileApplicationPage = new MobileApplicationPage;

$masterkey = $url->segment[1];
switch ($url->segment[0]) {
    case 'special_case':
        // Handle special case
        break;
        
    case 'another_case':
        // Handle another case
        break;

    default:
        if (empty($masterkey) && $masterkey != 'mobile') {
            $masterkey = 'mobile';
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
            "action" => $MobileApplicationPage->medthodModule[$menuActive]['action'],
            "method" => $MobileApplicationPage->medthodModule[$menuActive]['method_group'],
            "language" => $MobileApplicationPage->language,
            "order" => 'desc',
            "page" => $page['on'],
            "limit" => $limit,
            "masterkey" => $masterkey,
        ];
        
        // call group
        $load_group = $MobileApplicationPage->loadData($data_group);
        if ($load_group->code == 1001 && $load_group->_numOfRows > 0) {
            $smarty->assign("load_group", $load_group);
        }

        $data = [
            "action" => $MobileApplicationPage->medthodModule[$menuActive]['action'],
            "method" => $MobileApplicationPage->medthodModule[$menuActive]['method_list'],
            "language" => $MobileApplicationPage->language,
            "order" => $req['order'],
            "page" => $page['on'],
            "limit" => $limit,
            "keyword" => $req['keyword'],
            "gid" => $req['gid'],
            "masterkey" => $masterkey,
        ];

        // call list
        $loadData = $MobileApplicationPage->loadData($data);
        $smarty->assign("loadData", $loadData);

        // setup seo and text modules
        $language_modules = array();
        // active menu header
        $headerActive = headerActive($url->url);
        if (is_array($headerActive) && !empty($headerActive)) {
            $language_modules['breadcrumb2'] = $headerActive['page'][0];
            $language_modules['metatitle'] = $headerActive['page'][0];
        }
        $smarty->assign("language_modules", $language_modules);
       
        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $language_modules['metatitle'];
        $seo_keyword = "";
        $seo_pic = "";
        $MobileApplicationPage->searchEngine($MainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
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
