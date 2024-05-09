<?php
// setup seo and text modules
$language_modules = array();
// active menu header
$header_active = header_active($url->url);
$language_modules['breadcrumb1'] = $header_active['page'][0];
$language_modules['metatitle'] = $header_active['page'][0];
$smarty->assign("language_modules", $language_modules);

/*## Start SEO #####*/
$seo_desc = "";
$seo_title = $language_modules['metatitle'];
$seo_keyword = "";
$seo_pic = "";
$contactPage->searchEngine($MainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
/*## End SEO #####*/

$settingPage = array(
    "page" => $menuActive,
    "template" => "index-corruption.tpl",
    "display" => "page"
);
