<?php
$menuActive = "intro";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

$IntroPage = new IntroPage;

switch ($url->segment[0]) {
    case 'special_case':
        // Handle special case
        break;
        
    case 'another_case':
        // Handle another case
        break;

    default:
    
        // call intro
        $loadIntro = $IntroPage->loadIntro();
        if ($loadIntro->code != 1001) {
            header('location:' . $linklang . "/home");
        }
        $array_intro = array();
        $status_has_data = false;
        foreach ($loadIntro->item as $keyloadIntro => $valueloadIntro) {
            if (!empty($valueloadIntro->subject)) {
                $status_has_data = true;
            }
            $array_intro[] = $valueloadIntro;
        }
        $smarty->assign("array_intro", $array_intro);

        if (!$status_has_data) {
            header('location:' . $linklang . "/home");
        }

        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = "";
        $seo_keyword = "";
        $seo_pic = "";
        $IntroPage->searchEngine($MainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
        /*## End SEO #####*/

        $settingPage = array(
            "page" => $menuActive,
            "template" => "index.tpl",
            "display" => "page-script"
        );
        break;
}
$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);
