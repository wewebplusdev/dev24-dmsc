<?php
if (empty($masterkey)) {
    $masterkey = 'agif';
}
$contentid = $url->segment[2];
if (empty($contentid)) {
    header('location:' . $linklang . '/' . $menuActive);
}
// agency
$data_agency = [
    "action" => $ContactPage->medthodModule[$menuActive]['action'],
    "method" => $ContactPage->medthodModule[$menuActive]['method_list'],
    "language" => $ContactPage->language,
    "order" => 'desc',
    "page" => $page['on'],
    "limit" => 100,
    "contentid" => $contentid,
    "masterkey" => $masterkey,
];

// call list
$load_data_agency = $ContactPage->loadData($data_agency);
if ($load_data_agency->code != 1001) {
    header('location:' . $linklang . '/' . $menuActive);
}
$smarty->assign("load_data_agency", $load_data_agency);

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
$seo_title = $load_data_agency->item[0]->subject;
$seo_keyword = "";
$seo_pic = "";
$ContactPage->searchEngine($mainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
/*## End SEO #####*/

$settingPage = array(
    "page" => $menuActive,
    "template" => "googlemap-agencies.tpl",
    "display" => "page-map"
);