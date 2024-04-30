<?php
$menuActive = "weblinkAll";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

$weblinkAllPage = new weblinkAllPage;

$masterkey = $url->segment[1];
switch ($url->segment[0]) {
    default:
        if (empty($masterkey)) {
            $masterkey = 'pus';
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
            "action" => $weblinkAllPage->method_module[$menuActive]['action'],
            "method" => $weblinkAllPage->method_module[$menuActive]['method_group'],
            "language" => $weblinkAllPage->language,
            "order" => 'desc',
            "page" => $page['on'],
            "limit" => $limit,
            "masterkey" => $masterkey,
        ];
        
        // call group
        $load_group = $weblinkAllPage->load_data($data_group);
        // print_pre($data_group);
        // print_pre($load_group);die;
        if ($load_group->code == 1001 && $load_group->_numOfRows > 0) {
            $smarty->assign("load_group", $load_group);
        }

        $data = [
            "action" => $weblinkAllPage->method_module[$menuActive]['action'],
            "method" => $weblinkAllPage->method_module[$menuActive]['method_list'],
            "language" => $weblinkAllPage->language,
            "order" => $req['order'],
            "page" => $page['on'],
            "limit" => $limit,
            "keyword" => $req['keyword'],
            "gid" => $req['gid'],
            "masterkey" => $masterkey,
        ];

        // call list
        $load_data = $weblinkAllPage->load_data($data);
        // print_pre($data);
        // print_pre($load_data);die;
        $smarty->assign("load_data", $load_data);

        // setup seo and text modules
        $language_modules = array();
        // active menu header
        $header_active = header_active($url->url);
        if (gettype($header_active) == 'array' && count($header_active) > 0) {
            $language_modules['breadcrumb2'] = $header_active['page'][0];
            $language_modules['metatitle'] = $header_active['page'][0];
        }
        $smarty->assign("language_modules", $language_modules);
       
        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $language_modules['metatitle'];
        $seo_keyword = "";
        $seo_pic = "";
        $weblinkAllPage->search_engine($mainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
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
