<?php
// Define constant for script path
define('SCRIPT_PATH', '/front/controller/script/');

$menuActive = "calendar";
$listjs[] = '<script type="text/javascript" src="' . _URL . SCRIPT_PATH . $menuActive . '/js/script.js"></script>';
$listjs[] = '<script type="text/javascript" src="' . _URL . SCRIPT_PATH . $menuActive . '/js/calendar.js'.$lastModify.'"></script>';
define('CALENDAR_CONFIG_PATH', SCRIPT_PATH . 'calendar/config-calendar.php');
define('CALENDAR_INIT_PATH', SCRIPT_PATH . 'calendar/init-calendar.php');

$CalendarPage = new CalendarPage;
$limit = 100;

switch ($url->segment[1]) {
    case 'load-calendar':
    case 'load-list':
        $req = array();
        $req['gid'] = $_REQUEST['gid'];
        $smarty->assign("req", $req);

        include_once _DIR . SCRIPT_PATH . $menuActive . '/service/config-calendar.php'; #load calendar
        include_once _DIR . SCRIPT_PATH . $menuActive . '/service/init-calendar.php'; #load calendar
        

        $settingPage = array(
            "page" => $menuActive,
            "template" => ($url->segment[1] == 'load-calendar') ? "calendar.tpl" : "list.tpl",
            "display" => "page-single"
        );
        break;
    default:
        $req = array();
        $req['date'] = $_REQUEST['date'] ? $_REQUEST['date'] : strtotime(date('Y-m-d'));
        $smarty->assign("req", $req);

        require_once _DIR . SCRIPT_PATH . $menuActive . '/service/config-calendar.php'; #load calendar

        $data_group = [
            "method" => 'getCalendarGroup',
            "language" => $CalendarPage->language,
            "order" => 'desc',
            "page" => $page['on'],
            "limit" => $limit,
        ];

        // call group
        $load_group = $CalendarPage->loadData($data_group);
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
        $CalendarPage->searchEngine($MainPage->settingWeb->setting, $seo_title, $seo_desc, $seo_keyword, $seo_pic);
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

