<?php

$menuActive = "404";
$listjs[] = '<script defer src="'._URL.'front/controller/script/'.$menuActive.'/js/script.js'.$lastModify.'"></script>';

$errorPage = new ErrorPage;

/*## Start SEO #####*/
$seo_desc = "";
$seo_title = $languageFrontWeb->pageerror->display->$currentLangWeb;
$seo_keyword = "";
$seo_pic = "";
$errorPage->searchEngine($MainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
/*## End SEO #####*/

$settingPage = array(
    "page" => $menuActive,
    "template" => "index.tpl",
    "display" => "page-script"
);

$urlfull = _FullUrl;
$smarty->assign("urlfull", $urlfull);
$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);