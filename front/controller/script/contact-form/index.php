<?php
define('JS_SCRIPT_START', '<script src="');
define('SCRIPT_PATH', 'front/controller/script/');
define('FULL_SCRIPT_PATH', '/front/controller/script/');
$menuActive = "contact-form";
$listjs[] = JS_SCRIPT_START . _URL . SCRIPT_PATH . $menuActive . '/js/script.js"></script>';
$listjs[] = JS_SCRIPT_START . 'https://www.google.com/recaptcha/api.js?render='. $recaptchaSitekey .'"></script>';

$menuActiveApi = "contact";

$ContactPage = new ContactPage;

$masterkey = $url->segment[1];
switch ($url->segment[1]) {
    case 'insert-corruption':
        require_once _DIR . FULL_SCRIPT_PATH . $menuActive . '/service/insert-corruption.php'; #load service
        break;

    case 'insert-global':
        require_once _DIR . FULL_SCRIPT_PATH . $menuActive . '/service/insert-global.php'; #load service
        break;

    case 'corruption':
        $listjs[] = JS_SCRIPT_START . _URL . SCRIPT_PATH . $menuActive . '/js/corruption.js"></script>';
        require_once _DIR . FULL_SCRIPT_PATH . $menuActive . '/service/corruption.php'; #load service
        break;

    default:
        $listjs[] = JS_SCRIPT_START . _URL . SCRIPT_PATH . $menuActive . '/js/form.js"></script>';
        // setup seo and text modules
        $language_modules = array();
        // active menu header
        $headerActive = headerActive($url->url);
        $language_modules['breadcrumb1'] = $headerActive['page'][0];
        $language_modules['metatitle'] = $headerActive['page'][0];
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
