<?php
$menuActive = "services";
$servicePage = new servicePage;
$limit = 15;

$masterkey = $url->segment[1];
switch ($url->segment[2]) {
    case 'pagination':
        $listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/pagination.js"></script>';

        $jsonData = file_get_contents('php://input');
        $resultData = json_decode($jsonData, true);

        $resultData['action'] = $servicePage->medthodMasterkey[$masterkey]['action'];
        $resultData['language'] = $servicePage->language;

        // call list
        $load_data = $servicePage->load_data($resultData);
        $smarty->assign("load_data", $load_data);

        /*## Set up pagination #####*/
        $page['page'] = str_replace("/pagination", "", $page['page']);
        $pagination['total'] = $load_data->_maxRecordCount;
        $pagination['totalpage'] = ceil(($pagination['total'] / $limit));
        $pagination['limit'] = $limit;
        $pagination['curent'] = $page['on'];
        $pagination['method'] = $page;
        $smarty->assign("pagination",$pagination);
        /*## Set up pagination #####*/

        $settingPage = array(
            "page" => $menuActive,
            "template" => "pagination.tpl",
            "display" => "page-single"
        );
        break;

    default:
        $listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';
        $listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/controller.js"></script>';
        if (empty($masterkey)) {
            $masterkey = 'sv';
            header('location:' . $linklang . "/" . $menuActive . "/" . $masterkey);
        }
        $smarty->assign("masterkey", $masterkey);
        
        $req = array();
        $req['keyword'] = $_GET['keyword'];
        $req['gid'] = $url->segment[2];
        $req['sort'] = $_GET['sort'] ? $_GET['sort'] : 1;
        if ($_GET['sort'] == 2) {
            $req['order'] = 'asc';
        }else{
            $req['order'] = 'desc';
        }
        $smarty->assign("req", $req);

        $data_group = [
            "action" => $servicePage->medthodMasterkey[$masterkey]['action'],
            "method" => $servicePage->medthodMasterkey[$masterkey]['loadGroup'],
            "language" => $servicePage->language,
            "order" => 'desc',
            "page" => $page['on'],
            "limit" => 100,
        ];
        
        // call group
        $load_group = $servicePage->load_data($data_group);
        if ($load_group->code == 1001 && $load_group->_numOfRows > 0) {
            $smarty->assign("load_group", $load_group);
        }

        $init_gid = array();
        if (!empty($req['gid'])) {
            array_push($init_gid , $req['gid']);
        }

        $data = [
            "action" => $servicePage->medthodMasterkey[$masterkey]['action'],
            "method" => $servicePage->medthodMasterkey[$masterkey][$menuActive],
            "language" => $servicePage->language,
            "order" => $req['order'],
            "page" => $page['on'],
            "limit" => $limit,
            "keyword" => $req['keyword'],
            "tid" => $init_gid,
        ];
        $smarty->assign("dataOption",$data);

        // call list
        $load_data = $servicePage->load_data($data);
        $smarty->assign("load_data", $load_data);

        // setup seo and text modules
        $language_modules = array();
        if ($masterkey == 'sv') {
            $language_modules['breadcrumb1'] = $languageFrontWeb->newstitle->display->$currentLangWeb;
            $language_modules['breadcrumb2'] = $languageFrontWeb->servicepage->display->$currentLangWeb;
            $language_modules['metatitle'] = $languageFrontWeb->servicepage->display->$currentLangWeb;
        }else if ($masterkey == 'rein') {
            $language_modules['breadcrumb1'] = $languageFrontWeb->newstitle->display->$currentLangWeb;
            $language_modules['breadcrumb2'] = $languageFrontWeb->ResearchAndInnovation->display->$currentLangWeb;
            $language_modules['metatitle'] = $languageFrontWeb->ResearchAndInnovation->display->$currentLangWeb;
        }
        $smarty->assign("language_modules", $language_modules);
       
        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $language_modules['metatitle'];
        $seo_keyword = "";
        $seo_pic = "";
        $servicePage->searchEngine($MainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
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
