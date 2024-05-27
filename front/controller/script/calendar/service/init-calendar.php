<?php
// Load calendar list #############################################
$data = [
    "method" => 'getCalendar',
    "language" => $CalendarPage->language,
    "order" => 'desc',
    "page" => $page['on'],
    "limit" => $limit,
    "gid" => $req['gid'],
    "keyword" => $req['keyword'],
    "sdate" => $myStartDateOfMonth,
    "edate" => $myEndDateOfMonth,
];

// call list
$loadData = $CalendarPage->loadData($data);
$myCalendarEventCounter = array();
$myCalendarEventCounter[0] = 0;
$myCalendarEventList = array();
if ($loadData->code == 1001 && $loadData->_numOfRows > 0) {
    $smarty->assign("loadData", $loadData);
    $EventMonth = array();
    foreach ($loadData->item as $keyload_data => $valueload_data) {
        if (!empty($valueload_data->sdate->full)) {
            $sdate = date('Y-m-d', strtotime($valueload_data->sdate->full));
            $EventMonth['sdate'] = $sdate;
            if (!empty($valueload_data->edate->full) && $valueload_data->isdateto == 1) {
                $edate = date('Y-m-d', strtotime($valueload_data->edate->full));
                $EventMonth['edate'] = $edate;
            }else{
                $EventMonth['edate'] = "0000-00-00";
            }

            if (strcmp($EventMonth['sdate'], $myStartDateOfMonth) < 1) {
                $myCalendarDateStart = $myStartDateOfMonth;
            }else{
                $myCalendarDateStart = $EventMonth['sdate'];
            }

            $myStart = substr($myCalendarDateStart, 8, 2) * 1;
            if (!empty($EventMonth['edate'])) {
                if (strcmp($myEndDateOfMonth, $EventMonth['edate']) < 1) {
                    $myCalendarDateEnd = $myEndDateOfMonth;
                } else {
                    $myCalendarDateEnd = $EventMonth['edate'];
                }
            }else{
                $myCalendarDateEnd = "0000-00-00";
            }

            if ($myCalendarDateEnd == "0000-00-00") {
                $myCalendarEventCounter[$myStart]++;
                $myCalendarEventList[$myStart][$valueload_data->id]['subject'] = $valueload_data->subject;
                $myCalendarEventList[$myStart][$valueload_data->id]['color'] = $valueload_data->color;
                $myCalendarEventList[$myStart][$valueload_data->id]['tb'] = $valueload_data->tb;
                $myCalendarEventList[$myStart][$valueload_data->id]['language'] = $valueload_data->language;
                $myCalendarEventList[$myStart][$valueload_data->id]['masterkey'] = $valueload_data->masterkey;
                $myCalendarEventList[$myStart][$valueload_data->id]['url'] = $valueload_data->url;
                $myCalendarEventList[$myStart][$valueload_data->id]['id'] = $valueload_data->id;
            }else{
                $myEnd = substr($myCalendarDateEnd, 8, 2) * 1;
                for ($i = $myStart; $i <= $myEnd; $i++) {
                    $myCalendarEventCounter[$i]++;
                    $myCalendarEventList[$i][$valueload_data->id]['subject'] = $valueload_data->subject;
                    $myCalendarEventList[$i][$valueload_data->id]['color'] = $valueload_data->color;
                    $myCalendarEventList[$i][$valueload_data->id]['tb'] = $valueload_data->tb;
                    $myCalendarEventList[$i][$valueload_data->id]['language'] = $valueload_data->language;
                    $myCalendarEventList[$i][$valueload_data->id]['masterkey'] = $valueload_data->masterkey;
                    $myCalendarEventList[$i][$valueload_data->id]['url'] = $valueload_data->url;
                    $myCalendarEventList[$i][$valueload_data->id]['id'] = $valueload_data->id;
                }
            }
        }
    }
}
$smarty->assign("myCalendarEventCounter", $myCalendarEventCounter);
$smarty->assign("myCalendarEventList", $myCalendarEventList);
$smarty->assign("weekFullDay", $weekFullDay[$url->pagelang[2]]);