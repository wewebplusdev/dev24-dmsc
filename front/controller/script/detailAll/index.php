<?php
$menuActive = "detailAll";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

$DetailAllPage = new DetailAllPage;

$contentid = $url->segment[1];
$masterkey = $url->segment[2];
$groupid = $url->segment[3];
switch ($url->segment[0]) {
    default:
        if (empty($contentid) || empty($masterkey)) {
            header('location:' . $linklang . "/home");
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
        $load_data = $DetailAllPage->load_data($data);
        if ($load_data->code == 1001) {
            $smarty->assign("load_data", $load_data);
        }

        if ($load_data->code != 1001) {
            header('location:' . $linklang . "/home");
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
                "gid" => $load_data->item[0]->gid,
            	"masterkey" => $masterkey
            ];
			// print_pre($data);

            $load_data_other = $DetailAllPage->load_data($data);
            if ($load_data_other->code == 1001) {
                $key_list = array_search($load_data->item[0]->id, array_column($load_data_other->item, 'id'));
                unset($load_data_other->item[$key_list]);
                $smarty->assign("load_data_other", $load_data_other);
            }
        }

        /*#### Start Update View #####*/
        if (!isset($_COOKIE['VIEW_DETAIL_' . $load_data->item[0]->masterkey . '_' . urldecode($load_data->item[0]->id)])) {
            setcookie("VIEW_DETAIL_" . $load_data->item[0]->masterkey . '_' . urldecode($load_data->item[0]->id), true, time() + 600, "/");
            $array_req = array(
                'table' => $load_data->item[0]->tb,
                'masterkey' => $load_data->item[0]->masterkey,
                'id' => $load_data->item[0]->id,
                'language' => $load_data->item[0]->language,
                'action' => 'view',
            );
            $load_update_view = $DetailAllPage->loadUrlRedirect($array_req);
        }
        /*#### End Update View #####*/

        // setup seo and text modules
        $language_modules = array();
        $language_modules['breadcrumb1'] = trim($load_data->item[0]->group);
        $language_modules['list_ohter'] = $language_modules['breadcrumb1']."".$languageFrontWeb->newsrelated->display->$currentLangWeb;
        $language_modules['metatitle'] = $load_data->item[0]->metatitle ? $load_data->item[0]->metatitle : $load_data->item[0]->subject;
        $language_modules['metakeyword'] = $load_data->item[0]->metakeywords;
        $language_modules['metadescription'] = $load_data->item[0]->metadescription;
        $language_modules['pictures'] = $load_data->item[0]->pic->pictures;
        $smarty->assign("language_modules", $language_modules);
		
		$language_modules['breadcrumb2'] = trim($load_data->item[0]->subject);
		$data_display_breadcrumb=0;
		if($language_modules['breadcrumb1']==$language_modules['breadcrumb2'] || empty($load_data->item[0]->group)){
			$data_display_breadcrumb=1;
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
$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);
