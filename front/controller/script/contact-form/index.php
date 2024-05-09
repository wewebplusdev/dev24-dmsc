<?php
$menuActive = "contact-form";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';
$listjs[] = '<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render='. $recaptcha_sitekey .'"></script>';

$menuActiveApi = "contact";

$contactPage = new contactPage;

$masterkey = $url->segment[1];
switch ($url->segment[1]) {
    case 'insert-corruption':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/service/insert-corruption.php'; #load service
        break;

    case 'insert-global':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/service/insert-global.php'; #load service
        break;

    case 'corruption':
        $listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/corruption.js"></script>';
        require_once _DIR . '/front/controller/script/' . $menuActive . '/service/corruption.php'; #load service
        break;

    default:
        $listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/form.js"></script>';
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
        $contactPage->searchEngine($mainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
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
