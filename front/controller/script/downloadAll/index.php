<?php
$menuActive = "downloadAll";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

$downloadAllPage = new downloadAllPage;

$masterkey = $url->segment[1];
switch ($url->segment[0]) {
    default:
        if (empty($masterkey)) {
            $masterkey = 'lar';
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
            "action" => $downloadAllPage->method_module[$menuActive]['action'],
            "method" => $downloadAllPage->method_module[$menuActive]['method_group'],
            "language" => $downloadAllPage->language,
            "order" => 'desc',
            "page" => $page['on'],
            "limit" => $limit,
            "masterkey" => $masterkey,
        ];

        // call group
        $load_group = $downloadAllPage->load_data($data_group);
        if ($load_group->code == 1001 && $load_group->_numOfRows > 0) {
            $smarty->assign("load_group", $load_group);
        }

        $data = [
            "action" => $downloadAllPage->method_module[$menuActive]['action'],
            "method" => $downloadAllPage->method_module[$menuActive]['method_list'],
            "language" => $downloadAllPage->language,
            "order" => $req['order'],
            "page" => $page['on'],
            "limit" => $limit,
            "keyword" => $req['keyword'],
            "gid" => $req['gid'],
            "masterkey" => $masterkey,
        ];

        // call list
        $load_data = $downloadAllPage->load_data($data);
        // print_pre($data);
        // print_pre($load_data);die;
        $smarty->assign("load_data", $load_data);

        // setup seo and text modules
        $language_modules = array();
        if ($masterkey == 'lar') {
            $language_modules['breadcrumb2'] = $languageFrontWeb->Lawsregulations->display->$currentLangWeb;
            $language_modules['metatitle'] = $languageFrontWeb->Lawsregulations->display->$currentLangWeb;
        }
        $smarty->assign("language_modules", $language_modules);
       
        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $language_modules['metatitle'];
        $seo_keyword = "";
        $seo_pic = "";
        $downloadAllPage->search_engine($mainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
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
