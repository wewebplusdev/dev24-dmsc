<?php

$menuActive = "coming";
$listjs[] = '<script type="text/javascript" src="'._URL.'front/controller/script/'.$menuActive.'/js/script.js'.$lastModify.'"></script>';

$errorPage = new ErrorPage;

/*## Start SEO #####*/
$seo_desc = "";
$seo_title = 'Coming Soon';
$seo_keyword = "";
$seo_pic = "";
$errorPage->search_engine($mainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
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