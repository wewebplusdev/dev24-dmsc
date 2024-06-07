<?php

$langModExcel = array();
$langModExcel["meu:group2"] = "กลุ่มติดต่อเรา";
$langModExcel["txt:name"] = "ชื่อ-นามสกุล";
$langModExcel["txt:email"] = "E-mail";
$langModExcel["txt:tel"] = "เบอร์โทรศัพท์";
$langModExcel["txt:subject"] = "หัวข้อ";
$langModExcel["txt:title"] = "รายละเอียด";
$langModExcel["txt:ip"] = "IP";
$langModExcel["txt:credate"] = "วันที่สร้าง";
$langModExcel["txt:status"] = "สถานะ";
$langModExcel["txt:address"] = "ที่อยู่";

$langModExcel["txt:name_report"] = "ชื่อ-นามสกุล ของผู้ถูกร้อง";
$langModExcel["txt:rank_report"] = "ช่วงเวลาที่กระทำความผิด";
$langModExcel["txt:fac_report"] = "ข้อเท็จจริงหรือพฤติการณ์การทุจริต";
$langModExcel["txt:corruption_report"] = "กระทำความผิดต่อตำแหน่งหน้าที่ราชการ";
$langModExcel["txt:rich_report"] = "ร่ำรวยผิดปกติ";
$langModExcel["txt:confirm_report"] = "ข้าพเจ้าขอรับรองว่าเรื่องดังกล่าวที่ข้าพเจ้าได้ร้องเรียน/แจ้งเบาะแสข้างต้น เป็นเรื่องจริง";

function print_pre($array)
{
    echo "<pre class='printPRE'>";
    echo "<textarea>";

    print_r($array);

    echo "</textarea>";
    echo "</pre>";
    echo "<style>.printPRE{ z-index:1000; position: relative;background: #000;color: red;}</style>";
}

function DateFormat($DateTime)
{
    //#################################################
    global $core_session_language;
    $DateTime = date("Y-m-d H:i", strtotime($DateTime));

    $DateTimeArr = explode(" ", $DateTime);
    $Date = $DateTimeArr[0];
    $Time = $DateTimeArr[1];

    $DateArr = explode("-", $Date);

    if ($core_session_language == "Thai")
        $DateArr[0] = ($DateArr[0] + 543);

    return $DateArr[2] . "/" . $DateArr[1] . "/" . $DateArr[0] . " " . $Time;
}

############################################
function str_replaceExportExcel($valSql, $typeReplaca)
{
    ############################################
    $valReplaceBefore = " ";
    $valReplaceAfter = "|x|";
    if ($typeReplaca >= 1) {
        $valReplacaReturn = str_replace($valReplaceBefore, $valReplaceAfter, $valSql);
    } else {
        $valReplacaReturn = str_replace($valReplaceAfter, $valReplaceBefore, $valSql);
        $valReplacaReturn = str_replace('\\', '', $valReplacaReturn);
    }

    return $valReplacaReturn;
}

function sanitize($input)
{
    ############################################
    global $coreLanguageSQL;

    //if get_magic_quotes_gpc() is on, slashes were already stripped .. if it's off, mysqli_real_escape_string() will take care of the rest;
    $output = addslashes($input);

    return $output;
}

function rechangeQuot($Data)
{
    ############################################
    $valChangeQuot = sanitize($Data);
    $valChangeQuot = htmlspecialchars(str_replace("&rsquo;", "'", str_replace('&quot;', '"', $valChangeQuot)));
    //$valChangeQuot = str_replace('\r\n','<br/>',$valChangeQuot);
    return $valChangeQuot;
}

function changeQuot($Data)
{
    ############################################
    global $coreLanguageSQL;

    $valTrim = trim($Data);
    $valChangeQuot = wewebEscape($coreLanguageSQL, $valTrim);
    // print_pre($valChangeQuot);
    //$valChangeQuot=str_replace("'","&rsquo;",str_replace('"','&quot;',$valChangeQuot));
    $valChangeQuot = str_replace("'", "&rsquo;", str_replace('"', '&quot;', $valChangeQuot));
    // print_pre($Data);
    return $valChangeQuot;
}
