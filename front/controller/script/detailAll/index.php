<?php
$menuActive = "detailAll";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

$detailAllPage = new detailAllPage;

$contentid = $url->segment[1];
$masterkey = $url->segment[2];
$class_action = 'nw';
$groupid = $url->segment[3];
switch ($url->segment[0]) {
    default:
        if (empty($contentid) || empty($masterkey) || empty($groupid)) {
            header('location:'.$linklang . "/home");
         
           
        }
        
        $req['gid'] = $_REQUEST['gid'];

        $data = [
            "action" => $detailAllPage->method_masterkey[$class_action]['action'],
            "method" => $detailAllPage->method_masterkey[$class_action][$menuActive],
            "language" => $detailAllPage->language,
            "contentid" => $contentid,
            "masterkey" => $masterkey
        ];

       //print_pre($data);

        // call detail
        $load_data = $detailAllPage->load_data($data);
        if ($load_data->code == 1001) {
            $smarty->assign("load_data", $load_data);
        }

        if ($load_data->code != 1001) {
           header('location:'.$linklang . "/home");
          
        }

        if ($masterkey != 'lar') {
            // content other
            $limit = 12;
            $data = [
                "action" => $detailAllPage->method_masterkey[$class_action]['action'],
                "method" => $detailAllPage->method_masterkey[$class_action]['listAll'],
                "language" => $detailAllPage->language,
                "order" => 'desc',
                "page" => 1,
                "limit" => $limit,
                "gid" => $load_data->item[0]->gid,
            ];
            
            $load_data_other = $detailAllPage->load_data($data);
            if ($load_data_other->code == 1001) {
                $key_list = array_search($load_data->item[0]->id, array_column($load_data_other->item, 'id'));
                unset($load_data_other->item[$key_list]);
                $smarty->assign("load_data_other", $load_data_other);
            }
        }

        // setup seo and text modules
        $language_modules = array();
        if ($masterkey == 'nw' || $class_action == 'nw') {
            $language_modules['breadcrumb1'] = $languageFrontWeb->newstitle->display->$currentLangWeb;
            $language_modules['breadcrumb2'] = $load_data->item[0]->group;
            $language_modules['list_ohter'] = $languageFrontWeb->newsrelated->display->$currentLangWeb;
            $language_modules['metatitle'] = $load_data->item[0]->metatitle ? $load_data->item[0]->metatitle :$load_data->item[0]->subject;
            $language_modules['metakeyword'] = $load_data->item[0]->metakeywords;
            $language_modules['metadescription'] = $load_data->item[0]->metadescription;
            $language_modules['pictures'] = $load_data->item[0]->pic->pictures;
        }else if($masterkey == 'cal'){
            $language_modules['breadcrumb1'] = $languageFrontWeb->eventcalendar->display->$currentLangWeb;
            $language_modules['breadcrumb2'] = $languageFrontWeb->eventcalendar->display->$currentLangWeb;
            $language_modules['list_ohter'] = $languageFrontWeb->relatedeventcalendar->display->$currentLangWeb;
            $language_modules['metatitle'] = $load_data->item[0]->metatitle ? $load_data->item[0]->metatitle :$load_data->item[0]->subject;
            $language_modules['metakeyword'] = $load_data->item[0]->metakeywords;
            $language_modules['metadescription'] = $load_data->item[0]->metadescription;
            $language_modules['pictures'] = $load_data->item[0]->pic->pictures;
        }else if($masterkey == 'lar'){
            $language_modules['breadcrumb1'] = $languageFrontWeb->Lawsregulations->display->$currentLangWeb;
            $language_modules['breadcrumb2'] = $languageFrontWeb->Lawsregulations->display->$currentLangWeb;
            $language_modules['metatitle'] = $load_data->item[0]->metatitle ? $load_data->item[0]->metatitle :$load_data->item[0]->subject;
            $language_modules['metakeyword'] = $load_data->item[0]->metakeywords;
            $language_modules['metadescription'] = $load_data->item[0]->metadescription;
            $language_modules['pictures'] = $load_data->item[0]->pic->pictures;
        }else if($masterkey == 'nwa'){
            $language_modules['breadcrumb1'] = $languageFrontWeb->news_nwa->display->$currentLangWeb;
            $language_modules['breadcrumb2'] = $languageFrontWeb->news_nwa->display->$currentLangWeb;
            $language_modules['list_ohter'] = $languageFrontWeb->newsagenrelated->display->$currentLangWeb;
            $language_modules['metatitle'] = $load_data->item[0]->metatitle ? $load_data->item[0]->metatitle :$load_data->item[0]->subject;
            $language_modules['metakeyword'] = $load_data->item[0]->metakeywords;
            $language_modules['metadescription'] = $load_data->item[0]->metadescription;
            $language_modules['pictures'] = $load_data->item[0]->pic->pictures;
        }else if($masterkey == 'km'){
            $language_modules['breadcrumb1'] = $languageFrontWeb->kmpage->display->$currentLangWeb;
            $language_modules['breadcrumb2'] = $languageFrontWeb->kmpage->display->$currentLangWeb;
            $language_modules['list_ohter'] = $languageFrontWeb->relatekmpage->display->$currentLangWeb;
            $language_modules['metatitle'] = $load_data->item[0]->metatitle ? $load_data->item[0]->metatitle :$load_data->item[0]->subject;
            $language_modules['metakeyword'] = $load_data->item[0]->metakeywords;
            $language_modules['metadescription'] = $load_data->item[0]->metadescription;
            $language_modules['pictures'] = $load_data->item[0]->pic->pictures;
        }else if($masterkey == 'god'){
            $language_modules['breadcrumb1'] = $languageFrontWeb->governmentopendata->display->$currentLangWeb;
            $language_modules['breadcrumb2'] = $languageFrontWeb->governmentopendata->display->$currentLangWeb;
            $language_modules['list_ohter'] = $languageFrontWeb->relategovernmentopendata->display->$currentLangWeb;
            $language_modules['metatitle'] = $load_data->item[0]->metatitle ? $load_data->item[0]->metatitle :$load_data->item[0]->subject;
            $language_modules['metakeyword'] = $load_data->item[0]->metakeywords;
            $language_modules['metadescription'] = $load_data->item[0]->metadescription;
            $language_modules['pictures'] = $load_data->item[0]->pic->pictures;
        }else if($masterkey == 'nwp'){
            $language_modules['breadcrumb1'] = $languageFrontWeb->newspeople->display->$currentLangWeb;
            $language_modules['breadcrumb2'] = $languageFrontWeb->newspeople->display->$currentLangWeb;
            $language_modules['list_ohter'] = $languageFrontWeb->relatenewspeople->display->$currentLangWeb;
            $language_modules['metatitle'] = $load_data->item[0]->metatitle ? $load_data->item[0]->metatitle :$load_data->item[0]->subject;
            $language_modules['metakeyword'] = $load_data->item[0]->metakeywords;
            $language_modules['metadescription'] = $load_data->item[0]->metadescription;
            $language_modules['pictures'] = $load_data->item[0]->pic->pictures;
        }
        $smarty->assign("language_modules", $language_modules);
       
        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $language_modules['metatitle'];
        $seo_keyword = "";
        $seo_pic = $language_modules['pictures'];
        $detailAllPage->search_engine($mainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
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
