<?php
$menuActive = "contact-form";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';
$listjs[] = '<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render='. $recaptcha_sitekey .'"></script>';
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/form.js"></script>';

$menuActiveApi = "contact";

$contactPage = new contactPage;

$masterkey = $url->segment[1];
switch ($url->segment[1]) {
    case 'insert-global':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/service/insert-global.php'; #load service
        break;

    default:
        $masterkey = 'nw';
        
        $data = [
            "action" => $contactPage->method_module[$menuActiveApi]['action'],
            "method" => $contactPage->method_module[$menuActiveApi]['method_list'],
            "language" => $contactPage->language,
            "order" => $req['order'],
            "page" => $page['on'],
            "limit" => $limit,
            "keyword" => $req['keyword'],
            "gid" => $req['gid'],
            "masterkey" => $masterkey,
        ];

        // call list
        $load_data = $contactPage->load_data($data);
        // print_pre($languageFrontWeb);
        // print_pre($load_data);die;
        $smarty->assign("load_data", $load_data);
 //print_pre($load_data);
        // setup seo and text modules
        $language_modules = array();
        $language_modules['breadcrumb1'] = $languageFrontWeb->contact_form->display->$currentLangWeb;
        $language_modules['metatitle'] = $languageFrontWeb->contact_form->display->$currentLangWeb;
        $smarty->assign("language_modules", $language_modules);
       
        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $language_modules['metatitle'];
        $seo_keyword = "";
        $seo_pic = "";
        $contactPage->search_engine($mainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
        /*## End SEO #####*/
        
        // /*## Set up pagination #####*/
        // $pagination['total'] = $load_data->_maxRecordCount;
        // $pagination['totalpage'] = ceil(($pagination['total'] / $limit));
        // $pagination['limit'] = $limit;
        // $pagination['curent'] = $page['on'];
        // $pagination['method'] = $page;
        // $smarty->assign("pagination",$pagination);
        // /*## Set up pagination #####*/

        $settingPage = array(
            "page" => $menuActive,
            "template" => "index.tpl",
            "display" => "page"
        );
        break;
}
$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);
