<?php
$menuActive = "detailAll";
$listjs[] = '<script src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

$DetailAllPage = new DetailAllPage;

$contentid = $url->segment[1];
$masterkey = $url->segment[2];
$groupid = $url->segment[3];
switch ($url->segment[0]) {
    case 'special_case':
        // Handle special case
        break;

    case 'another_case':
        // Handle another case
        break;

    default:
        if (empty($contentid) || empty($masterkey)) {
            header('location:' . $linklang . "/home");
            break;
        }

        $req['gid'] = $_REQUEST['gid'];

        $data = [
            "action" => $DetailAllPage->medthodModule[$menuActive]['action'],
            "method" => $DetailAllPage->medthodModule[$menuActive]['method_detail'],
            "language" => $DetailAllPage->language,
            "contentid" => $contentid,
            "gid" => $groupid,
            "masterkey" => $masterkey
        ];

        // call detail
        $loadData = $DetailAllPage->loadData($data);
        if ($loadData->code == 1001) {
            $smarty->assign("loadData", $loadData);
        }

        if ($loadData->code != 1001) {
            header('location:' . $linklang . "/home");
            break;
        }

        if ($masterkey != 'lar') {
            // content other
            $limit = 12;
            $data = [
                "action" => $DetailAllPage->medthodModule[$menuActive]['action'],
                "method" => $DetailAllPage->medthodModule[$menuActive]['method_list'],
                "language" => $DetailAllPage->language,
                "order" => 'desc',
                "page" => 1,
                "limit" => $limit,
                "gid" => $loadData->item[0]->gid,
                "masterkey" => $masterkey
            ];

            $load_data_other = $DetailAllPage->loadData($data);
            if ($load_data_other->code == 1001) {
                $key_list = array_search($loadData->item[0]->id, array_column($load_data_other->item, 'id'));
                unset($load_data_other->item[$key_list]);
                $smarty->assign("load_data_other", $load_data_other);
            }
        }

        /*#### Start Update View #####*/
        if (!isset($_COOKIE['VIEW_DETAIL_' . $loadData->item[0]->masterkey . '_' . urldecode($loadData->item[0]->id)])) {
            // Determine if the connection is secure
            $secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';

            // Set the VIEW_DETAIL cookie
            setcookie(
                "VIEW_DETAIL_" . $loadData->item[0]->masterkey . '_' . urldecode($loadData->item[0]->id),
                true,
                time() + 600,
                "/",
                "",
                $secure,
                true
            );

            $array_req = array(
                'table' => $loadData->item[0]->tb,
                'masterkey' => $loadData->item[0]->masterkey,
                'id' => $loadData->item[0]->id,
                'language' => $loadData->item[0]->language,
                'action' => 'view',
            );

            $load_update_view = $DetailAllPage->loadUrlRedirect($array_req);
        }

        /*#### End Update View #####*/

        // setup seo and text modules
        $language_modules = array();
        $language_modules['breadcrumb1'] = trim($loadData->item[0]->group);
        $language_modules['list_ohter'] = $language_modules['breadcrumb1'] . "" . $languageFrontWeb->newsrelated->display->$currentLangWeb;
        $language_modules['metatitle'] = $loadData->item[0]->metatitle ? $loadData->item[0]->metatitle : $loadData->item[0]->subject;
        $language_modules['metakeyword'] = $loadData->item[0]->metakeywords;
        $language_modules['metadescription'] = $loadData->item[0]->metadescription;
        $language_modules['pictures'] = $loadData->item[0]->pic->pictures;
        $smarty->assign("language_modules", $language_modules);

        $language_modules['breadcrumb2'] = trim($loadData->item[0]->subject);
        $data_display_breadcrumb = 0;
        if ($language_modules['breadcrumb1'] == $language_modules['breadcrumb2'] || empty($loadData->item[0]->group)) {
            $data_display_breadcrumb = 1;
        }
        $smarty->assign("data_display_breadcrumb", $data_display_breadcrumb);

        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $language_modules['metatitle'];
        $seo_keyword = "";
        $seo_pic = $language_modules['pictures'];
        $DetailAllPage->searchEngine($MainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
        /*## End SEO #####*/

        $settingPage = array(
            "page" => $menuActive,
            "template" => "index.tpl",
            "display" => "page"
        );
        break;
}

$headerActive = headerActive($masterkey);
$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);