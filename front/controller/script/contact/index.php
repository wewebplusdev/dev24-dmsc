<?php
define('SCRIPT_PATH', '/front/controller/script/');



$menuActive = "contact";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

$ContactPage = new ContactPage;

switch ($url->segment[1]) {
    case 'googlemap-agencies':
        require_once _DIR . SCRIPT_PATH . $menuActive . '/service/googlemap-agencies.php';
        break;

    case 'map-google':
        require_once _DIR . SCRIPT_PATH . $menuActive . '/service/map-google.php';
        break;

    case 'map-graphic':
        require_once _DIR . SCRIPT_PATH . $menuActive . '/service/map-graphic.php';
        break;

    default:
        if (empty($masterkey)) {
            $masterkey = 'agif';
        }
        
        // agency
        $data_agency = [
            "action" => $ContactPage->method_module[$menuActive]['action'],
            "method" => $ContactPage->method_module[$menuActive]['method_list'],
            "language" => $ContactPage->language,
            "order" => 'desc',
            "page" => $page['on'],
            "limit" => 100,
            "masterkey" => $masterkey,
        ];

        // call list
        $load_data_agency = $ContactPage->loadData($data_agency);
        $array_agency = array();
        if ($load_data_agency->_numOfRows > 0) {
            foreach ($load_data_agency->item as $keyarray_agency => $valuearray_agency) {
                $array_agency[$valuearray_agency->group_order]['group']['id'] = $valuearray_agency->gid;
                $array_agency[$valuearray_agency->group_order]['group']['subject'] = $valuearray_agency->group;
                $array_agency[$valuearray_agency->group_order]['list'][] = $valuearray_agency;
            }
        }
        rsort($array_agency);
        $smarty->assign("array_agency", $array_agency);


        // service
        $masterkey_service = 'csv';
        $data_service = [
            "action" => $ContactPage->method_module[$menuActive]['action'],
            "method" => $ContactPage->method_module[$menuActive]['method_list_service'],
            "language" => $ContactPage->language,
            "order" => 'desc',
            "page" => $page['on'],
            "limit" => 100,
            "masterkey" => $masterkey_service ,
        ];

        // call list
        $load_data_service = $ContactPage->loadData($data_service);
        $smarty->assign("load_data_service", $load_data_service);

        // setup seo and text modules
        $language_modules = array();
        // active menu header
        $headerActive = headerActive($url->url);
        if (is_array($headerActive) && !empty($headerActive)) {
            $language_modules['breadcrumb1'] = $headerActive['page'][0];
            $language_modules['metatitle'] = $headerActive['page'][0];
        }
        
        $smarty->assign("language_modules", $language_modules);
       
        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $language_modules['metatitle'];
        $seo_keyword = "";
        $seo_pic = "";
        $ContactPage->searchEngine($mainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
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
