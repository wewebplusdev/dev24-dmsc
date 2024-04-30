<?php
$menuActive = "contact";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

$contactPage = new contactPage;

switch ($url->segment[1]) {
    case 'googlemap-agencies':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/service/googlemap-agencies.php';
        break;

    default:
        if (empty($masterkey)) {
            $masterkey = 'agif';
        }
        
        // agency
        $data_agency = [
            "action" => $contactPage->method_module[$menuActive]['action'],
            "method" => $contactPage->method_module[$menuActive]['method_list'],
            "language" => $contactPage->language,
            "order" => 'desc',
            "page" => $page['on'],
            "limit" => 100,
            "masterkey" => $masterkey,
        ];

        // call list
        $load_data_agency = $contactPage->load_data($data_agency);
        $array_agency = array();
        if ($load_data_agency->_numOfRows > 0) {
            foreach ($load_data_agency->item as $keyarray_agency => $valuearray_agency) {
                $array_agency[$valuearray_agency->group_order]['group']['id'] = $valuearray_agency->gid;
                $array_agency[$valuearray_agency->group_order]['group']['subject'] = $valuearray_agency->group;
                $array_agency[$valuearray_agency->group_order]['list'][] = $valuearray_agency;
            }
        }
        rsort($array_agency);
        // print_pre($array_agency);
        $smarty->assign("array_agency", $array_agency);


        // service
        $masterkey_service = 'csv';
        $data_service = [
            "action" => $contactPage->method_module[$menuActive]['action'],
            "method" => $contactPage->method_module[$menuActive]['method_list_service'],
            "language" => $contactPage->language,
            "order" => 'desc',
            "page" => $page['on'],
            "limit" => 100,
            "masterkey" => $masterkey_service ,
        ];

        // call list
        $load_data_service = $contactPage->load_data($data_service);
        print_pre($data_service);
        print_pre($load_data_service);
        $smarty->assign("load_data_service", $load_data_service);

        // setup seo and text modules
        $language_modules = array();
        // active menu header
        $header_active = header_active($url->url);
        if (gettype($header_active) == 'array' && count($header_active) > 0) {
            $language_modules['breadcrumb1'] = $header_active['page'][0];
            $language_modules['metatitle'] = $header_active['page'][0];
        }
        $smarty->assign("language_modules", $language_modules);
       
        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $language_modules['metatitle'];
        $seo_keyword = "";
        $seo_pic = "";
        $contactPage->search_engine($mainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
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
