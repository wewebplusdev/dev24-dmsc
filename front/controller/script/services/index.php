<?php
$menuActive = "services";
$ServicePage = new ServicePage;
$limit = 15;
define('SCRIPT_TAG', '<script defer src="');
define('SCRIPT_PATH', 'front/controller/script/');

$masterkey = $url->segment[1];
switch ($url->segment[2]) {
    case 'special_case':

        break;

    case 'pagination':
        $listjs[] = SCRIPT_TAG. _URL . SCRIPT_PATH. $menuActive . '/js/pagination.js"></script>';

        $jsonData = file_get_contents('php://input');
        $resultData = json_decode($jsonData, true);

        $resultData['action'] = $ServicePage->medthodMasterkey[$masterkey]['action'];
        $resultData['language'] = $ServicePage->language;

        // call list
        $loadData = $ServicePage->loadData($resultData);
        $smarty->assign("loadData", $loadData);

        /*## Set up pagination #####*/
        $page['page'] = str_replace("/pagination", "", $page['page']);
        $pagination['total'] = $loadData->_maxRecordCount;
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
        $listjs[] = SCRIPT_TAG. _URL .SCRIPT_PATH . $menuActive . '/js/script.js"></script>';
        $listjs[] = SCRIPT_TAG. _URL . SCRIPT_PATH . $menuActive . '/js/controller.js"></script>';
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
            "action" => $ServicePage->medthodMasterkey[$masterkey]['action'],
            "method" => $ServicePage->medthodMasterkey[$masterkey]['loadGroup'],
            "language" => $ServicePage->language,
            "order" => 'desc',
            "page" => $page['on'],
            "limit" => 100,
        ];
        
        // call group
        $load_group = $ServicePage->loadData($data_group);
        if ($load_group->code == 1001 && $load_group->_numOfRows > 0) {
            $smarty->assign("load_group", $load_group);
        }

        $init_gid = array();
        if (!empty($req['gid'])) {
            array_push($init_gid , $req['gid']);
        }

        $data = [
            "action" => $ServicePage->medthodMasterkey[$masterkey]['action'],
            "method" => $ServicePage->medthodMasterkey[$masterkey][$menuActive],
            "language" => $ServicePage->language,
            "order" => $req['order'],
            "page" => $page['on'],
            "limit" => $limit,
            "keyword" => $req['keyword'],
            "tid" => $init_gid,
        ];
        $smarty->assign("dataOption",$data);
        
        // call list
        $loadData = $ServicePage->loadData($data);
        $smarty->assign("loadData", $loadData);

        // setup seo and text modules
        $language_modules = array();
        // active menu header
        $headerActive = headerActive($url->url);
        if (is_array($headerActive) && !empty($headerActive)) {
            $language_modules['breadcrumb2'] = $headerActive['page'][0];
            $language_modules['metatitle'] = $headerActive['page'][0];
        }
        if ($masterkey == 'sv') {
            $language_modules['breadcrumb1'] = $languageFrontWeb->newstitle->display->$currentLangWeb;
            $language_modules['breadcrumb2'] = $languageFrontWeb->servicepage->display->$currentLangWeb;
            $language_modules['metatitle'] = $languageFrontWeb->servicepage->display->$currentLangWeb;
        }elseif ($masterkey == 'rein') {
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
        $ServicePage->searchEngine($MainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
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
