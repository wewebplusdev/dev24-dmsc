<?php
$menuActive = "calendar";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/calendar.js'.$lastModify.'"></script>';

$calendarPage = new calendarPage;
$limit = 100;

switch ($url->segment[1]) {
    case 'load-calendar':
        $req = array();
        $req['gid'] = $_REQUEST['gid'];
        $req['keyword'] = $_REQUEST['keyword'];
        $smarty->assign("req", $req);

        require_once _DIR . '/front/controller/script/' . $menuActive . '/service/config-calendar.php'; #load calendar
        require_once _DIR . '/front/controller/script/' . $menuActive . '/service/init-calendar.php'; #load calendar

        $settingPage = array(
            "page" => $menuActive,
            "template" => "calendar.tpl",
            "display" => "page-single"
        );
        break;
    case 'load-list':
        $req = array();
        $req['gid'] = $_REQUEST['gid'];
        $req['keyword'] = $_REQUEST['keyword'];
        $smarty->assign("req", $req);

        require_once _DIR . '/front/controller/script/' . $menuActive . '/service/config-calendar.php'; #load calendar
        require_once _DIR . '/front/controller/script/' . $menuActive . '/service/init-calendar.php'; #load calendar

        $settingPage = array(
            "page" => $menuActive,
            "template" => "list.tpl",
            "display" => "page-single"
        );
        break;
    default:        
        $req = array();
        $req['date'] = $_REQUEST['date'] ? $_REQUEST['date'] : strtotime(date('Y-m-d'));
        $smarty->assign("req", $req);

        require_once _DIR . '/front/controller/script/' . $menuActive . '/service/config-calendar.php'; #load calendar

        $data_group = [
            "method" => 'getCalendarGroup',
            "language" => $calendarPage->language,
            "order" => 'desc',
            "page" => $page['on'],
            "limit" => $limit,
        ];

        // call group
        $load_group = $calendarPage->load_data($data_group);
        if ($load_group->code == 1001 && $load_group->_numOfRows > 0) {
            $smarty->assign("load_group", $load_group);
        }

        // setup seo and text modules
        $language_modules = array();
        $language_modules['breadcrumb1'] = $languageFrontWeb->eventcalendar->display->$currentLangWeb;
        $language_modules['breadcrumb2'] = $languageFrontWeb->eventcalendar->display->$currentLangWeb;
        $language_modules['metatitle'] = $languageFrontWeb->eventcalendar->display->$currentLangWeb;
        $smarty->assign("language_modules", $language_modules);
       
        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $language_modules['metatitle'];
        $seo_keyword = "";
        $seo_pic = "";
        $calendarPage->search_engine($mainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
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
