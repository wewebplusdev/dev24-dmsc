<?php
define('DATE_FORMAT', "%04d-%02d-%02d");



if (!empty($_REQUEST['date'])) {
    $myCalendarDate = date('Y-m-d', $_REQUEST['date']);
} else {
    $myCalendarDate = '';
}
if ($myCalendarDate == "") {
    $myCalendarDate = getDateNow();
}
$myCalendarDateArray = explode("-", $myCalendarDate);
$myCalendarDate_Day = $myCalendarDateArray[2];
$myCalendarDate_Year2 = $myCalendarDateArray[0];
$myCalendarDate_Month = $myCalendarDateArray[1];

// Find Start Week Day ##############################################
$today = getdate(mktime(0, 0, 0, $myCalendarDateArray[1], 1, $myCalendarDateArray[0]));

// Next Month ##############################################
$NextMonthArray = getdate(mktime(0, 0, 0, $myCalendarDateArray[1] + 1, 1, $myCalendarDateArray[0]));
$Day = $NextMonthArray['mday'];
$Month = $NextMonthArray['mon'];
$Year = $NextMonthArray['year'];
$NextMonth = strtotime(sprintf(DATE_FORMAT, $Year, $Month, $Day));

// Prev Month ##############################################
$PrevMonthArray = getdate(mktime(0, 0, 0, $myCalendarDateArray[1] - 1, 1, $myCalendarDateArray[0]));
$Day = $PrevMonthArray['mday'];
$Month = $PrevMonthArray['mon'];
$Year = $PrevMonthArray['year'];
$PrevMonth = strtotime(sprintf(DATE_FORMAT, $Year, $Month, $Day));

$startWeekDay = $today['wday'];
$myCalendarDateYear = $today['year'];
$myCalendarDateMonth = $today['mon'];
$endDayOfMonth = getEndDayOfMonth($myCalendarDate);

$myStartDateOfMonth = sprintf(DATE_FORMAT, $myCalendarDateArray[0], $myCalendarDateArray[1], 1);
$myEndDateOfMonth = sprintf(DATE_FORMAT, $myCalendarDateArray[0], $myCalendarDateArray[1], $endDayOfMonth);

// Load calendar display #############################################
$Checktoday = date('Y-m-d');
$mCount = 1;

$myCalendarDateArr = explode("-", $myCalendarDate);
if ($myCalendarDateArr[1] < 1) {
    $thisMonth = substr($myCalendarDateArr[1], 1, 1);
} else {
    $thisMonth = $myCalendarDateArr[1];
}

$smarty->assign("startWeekDay",$startWeekDay);
$smarty->assign("Checktoday",$Checktoday);
$smarty->assign("myCalendarDate",$myCalendarDate);
$smarty->assign("myCalendarDate_Day",$myCalendarDate_Day);
$smarty->assign("myCalendarDateArr",$myCalendarDateArr);
$smarty->assign("mCount", $mCount);
$smarty->assign("endDayOfMonth", $endDayOfMonth);
$smarty->assign("strMonthCut", $strMonthCut['full'][$url->pagelang[2]]);
$smarty->assign("weekDay", $weekDay[$url->pagelang[2]]);
$smarty->assign("myCalendarDateMonth", $myCalendarDateMonth);
$smarty->assign("NextMonth", $NextMonth);
$smarty->assign("PrevMonth", $PrevMonth);
if ($url->pagelang[2] == 'th') {
    $YearNow = date('Y')+543;
    $YearCurrent = $myCalendarDate_Year2+543;
}else{
    $YearNow = date('Y');
    $YearCurrent = $myCalendarDate_Year2;
}
$smarty->assign("yearNow", $YearNow);
$smarty->assign("dateNow", strtotime(date('Y-m-d')));
$smarty->assign("YearCurrent", $YearCurrent);
$smarty->assign("MonthCurrent", $strMonthCut['full'][$url->pagelang[2]][intval($myCalendarDate_Month)]);