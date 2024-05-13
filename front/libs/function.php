<?php
## print pre ##
function printPre($expression, $return = false, $wrap = false)
{
    $css = 'border:1px dashed #06f;background:#69f;padding:1em;text-align:left;z-index:99999;font-size:12px;position:relative';
    if ($wrap) {
        $str = '<p style="' . $css . '"><tt>' . str_replace(
            array('  ', "\n"),
            array('&nbsp; ', '<br />'),
            htmlspecialchars(print_r($expression, true))
        ) . '</tt></p>';
    } else {
        $str = '<pre style="' . $css . '">' . print_r($expression, true) . '</pre>';
    }
    if ($return) {
        if (is_string($return) && $fh = fopen($return, 'a')) {
            fwrite($fh, $str);
            fclose($fh);
        }
        return $str;
    } else {
          echo $str;
    }
      
}

## clean array ##
function cleanArray($arr)
{
    $size = sizeof($arr);
    for ($i = 0; $i < $size; $i++) {
        $thum = trim($arr[$i]);
        if ($thum != "") {
            $r[] = $thum;
        }
    }
    return $r;
}

## include Page to template #####

function templateInclude($setting, $settemplate = null)
{
    #################################
    if (!empty($settemplate)) {
        return _DIR . "/front/controller/script/" . $setting['page'] . "/template/" . $settemplate;
    } else {
        return _DIR . "/front/controller/script/" . $setting['page'] . "/template/" . $setting['template'];
    }
}

## link lang ##

function configlang($lang)
{
    global $url_show_lang, $path_root;
    if (!empty($url_show_lang)) {
        return $path_root . "/" . $lang;
    } else {
        if (!empty($path_root)) {
            return $path_root;
        } else {
            return "";
        }
    }
}


define('SELECT_ALL_FROM', 'SELECT * FROM');
define('WHERE', 'WHERE');
define('SECONDS', ' วินาที');
define('MIN', ' นาที');
## sql insert ##
function sqlinsert($array, $dbname, $key)
{
    global $db;
    $sql_insert = SELECT_ALL_FROM . " " . $dbname . WHERE . $key . " = -1";
    $result_insert = $db->Execute($sql_insert);

    $sql_create_insert = $db->GetInsertSQL($result_insert, $array);
    $result_insert_execute = $db->Execute($sql_create_insert);

    $return['id'] = $db->Insert_ID();
    $return['sql'] = $sql_create_insert;
    $return['status'] = $result_insert_execute;
    $return['sqle'] = $sql_insert;
    return $return;
}

## sql update ##

function sqlupdate($array, $dbname, $key, $where = null)
{
    global $db;
    $listWhere = "";

    if (is_array($key)) {
        foreach ($key as $para => $value) {
            $listWhere .= " " . $para . " " . $value;
        }
    } else {
        $listWhere = $key;
    }

    if (!empty($where)) {
        $sql_update = SELECT_ALL_FROM . " " . $dbname . WHERE . $listWhere . " = " . $where;
    } else {
        $sql_update = SELECT_ALL_FROM . " " . $dbname . WHERE . $listWhere;
    }

    $result_update = $db->Execute($sql_update);

    $updateSQL = $db->GetUpdateSQL($result_update, $array);
    $result_update_execute = $db->execute($updateSQL);

    $return['where'] = $where;
    $return['sql'] = $sql_update;
    $return['sqlexecute'] = $updateSQL;
    $return['status'] = $result_update_execute;

    return $return;
}

## get ip ##
function getip()
{
    $ip = false;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) {
            array_unshift($ips, $ip);
            $ip = false;
        }
        for ($i = 0; $i < count($ips); $i++) {
            if (!preg_match("/^(10|172\.16|192\.168)\./i", $ips[$i])) {
                if (version_compare(phpversion(), "5.0.0", ">=")) {
                    if (ip2long($ips[$i]) !== false) {
                        $ip = $ips[$i];
                        break;
                    }
                } else {
                    if (ip2long($ips[$i]) !== -1) {
                        $ip = $ips[$i];
                        break;
                    }
                }
            }
        }
    }
    return $ip ? $ip : $_SERVER['REMOTE_ADDR'];
}


## encodeStr ##
function encodeStr($variable)
{

    ############################################
    $key = "xitgmLwmp";
    $index = 0;
    $temp = "";
    $variable = str_replace("=", "?O", $variable);
    for ($i = 0; $i < strlen($variable); $i++) {
        $temp .= $variable[$i] . $key[$index];
        $index++;
        if ($index >= strlen($key)){
            $index = 0;
        }
    }
    $variable = strrev($temp);
    $variable = base64_encode($variable);
    $variable = utf8_encode($variable);
    $variable = urlencode($variable);
    $variable = str_rot13($variable);
    $variable = str_replace("%", "WewEb", $variable);
    return $variable;
}

## decodeStr ##
function decodeStr($enVariable)
{
    $enVariable = str_replace("WewEb", "%", $enVariable);
    $enVariable = str_rot13($enVariable);
    $enVariable = urldecode($enVariable);
    $enVariable = utf8_decode($enVariable);
    $enVariable = base64_decode($enVariable);
    $enVariable = strrev($enVariable);
    $current = 0;
    $temp = "";
    for ($i = 0; $i < strlen($enVariable); $i++) {
        if ($current % 2 == 0) {
            $temp .= $enVariable[$i];
        }
        $current++;
    }
    $temp = str_replace("?O", "=", $temp);
    parse_str($temp, $variable);
    return $temp;
}

## add sql date start end ##
function checkStartEnd($dbname, $namestart = "_sdate", $nameend = "_edate")
{
    if (!empty($dbname)) {

        $sqlReturn = " and ((" . $dbname . "" . $namestart . "='0000-00-00 00:00:00' AND " . $dbname . "" . $nameend . "='0000-00-00 00:00:00')  ";
        $sqlReturn .= " OR (" . $dbname . "" . $namestart . "='0000-00-00 00:00:00' AND TO_dayS(" . $dbname . "" . $nameend . ")>=TO_dayS(NOW()) )";
        $sqlReturn .= " OR (TO_dayS(" . $dbname . "" . $namestart . ")<=TO_dayS(NOW()) AND " . $dbname . "" . $nameend . "='0000-00-00 00:00:00' ) ";
        $sqlReturn .= " OR (TO_dayS(" . $dbname . "" . $namestart . ")<=TO_dayS(NOW()) AND  TO_dayS(" . $dbname . "" . $nameend . ")>=TO_dayS(NOW())  )";
        $sqlReturn .= " OR ( " . $dbname . "." . $dbname . "_sdate Is Null and " . $dbname . "." . $dbname . "_edate Is Null )) ";


        return $sqlReturn;
    } else {
        return false;
    }
}

##############################################

function dateThai($strDate, $function = null, $lang = "th", $type = "shot")
{

    global $strMonthCut, $url;

    ##############################################
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strYear2 = date("Y", strtotime($strDate));
    $strYear_mini = substr($strYear, 2, 4);
    $strYear_mini_en = substr($strYear2, 2, 4);
    $strMonth = date("n", strtotime($strDate));
    $strMonth_real = date("n", strtotime($strDate));
    $strMonth_full = date("n", strtotime($strDate));
    $strMonth_number = date("n", strtotime($strDate));
    $strday = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));

    $strMonth = $strMonthCut[$type][$lang][$strMonth];
    $strMonth_full = $strMonthCut['full'][$lang][$strMonth_full];
    if (!empty($strDate)) {
        switch ($function) {
            case '1':
                $day = "$strday $strMonth $strYear";
                break;
            case '2':
                $day = "$strday $strMonth $strYear2";
                break;
            case '3':
                $day = "$strday $strMonth $strYear_mini";
                break;
            case '4':
                $day = "$strday $strMonth $strYear , $strHour:$strMinute ";
                break;

            case '5':
                $day = "$strday $strMonth $strYear , $strHour:$strMinute:$strSeconds ";
                break;
            case '6':
                $day = "$strday";
                break;
            case '7':
                $day = "$strMonth $strYear";
                break;
            case '8':
                $day = "$strHour:$strMinute";
                break;
            case '9':
                $day = "$strMonth";
                break;
            case '10':
                $day = "$strYear";
                break;
            case '11':
                $day = "วันที่ $strday $strMonth $strYear | เวลา $strHour:$strMinute น.";
                break;
            case '12':

                $previousTimeStamp = strtotime(str_replace("-", "/", $strDate));
                $lastTimeStamp = strtotime(str_replace("-", "/", date("Y-m-d H:i:s")));

                // strtotime("2013/09/17 12:34:11");

                $menos = $lastTimeStamp - $previousTimeStamp;

                $mins = $menos / 60;
                if ($mins < 1) {
                    $showing = $menos . SECONDS;
                } else {
                    $minsfinal = floor($mins);
                    $secondsfinal = $menos - ($minsfinal * 60);
                    $hours = $minsfinal / 60;
                    if ($hours < 1) {
                        $showing = $minsfinal . MIN . $secondsfinal . SECONDS;
                    } else {
                        $hoursfinal = floor($hours);
                        $minssuperfinal = $minsfinal - ($hoursfinal * 60);
                        $days = $hoursfinal / 24;
                        if ($days < 1) {
                            $showing = $hoursfinal . " ชั่วโมง " . $minssuperfinal . MIN . $secondsfinal . SECONDS;
                        } else {
                            $daysfinal = floor($days);
                            $hourssuperfinal = $hoursfinal - ($daysfinal * 24);
                            $showing = "ผ่านมาแล้ว " . $daysfinal . " วัน " . $hourssuperfinal . " ชั่วโมง " . $minssuperfinal . MIN . $secondsfinal . SECONDS;
                        }
                    }
                }
                $day = $showing;
                break;

            case '13':
                $day = "$strday<br/>$strMonth";
                break;
            case '14':
                $day = "$strday" . "th" . " $strMonth_full $strYear2";
                break;
            case '15':
                $day = "$strMonth_full $strday, $strYear2";
                break;
            case '16':
                $day = "$strday.$strMonth_number.$strYear_mini_en";
                break;
            case '17':
                $day = "$strday.$strMonth_number.$strYear2";
                break;
            case '18':
                $strMonth_number = sprintf("%02d", $strMonth_number);
                $day = "<strong>$strday</strong>$strMonth_number.$strYear2";
                break;
            case '19':
                $strMonth_number = sprintf("%02d", $strMonth_number);
                $day = "$strday.$strMonth_number.$strYear2";
                break;
            case '20':
                $strMonth = $strMonthCut['shot2']['en'][$strMonth_real];
                $day = "$strMonth $strday, $strYear2";
                break;
            case '21':
                $day = "$strday $strMonth";
                break;
            case '22':
                $day = "$strday $strMonth $strYear " . "เวลา" . $strHour . ":" . $strMinute . " น. ";
                break;
            case '23':
                $day = "$strday $strMonth $strYear - " . $strHour . ":" . $strMinute . " น. ";
                break;
            case '24':
                $day = "$strday $strMonth $strYear";
                break;
            case '25':
                $day = $strYear . '' . sprintf("%02d", $strMonth_number);
                break;
            default:
                break;
        }
    } else {
        $day = "-";
    }
    return $day;
}

############################################

function changeQuot($Data)
{
    ############################################
    global $coreLanguageSQL;

    $valTrim = trim($Data);
    //    $valChangeQuot = wewebEscape($coreLanguageSQL, $valTrim);
    $valChangeQuot = $valTrim;
    //$valChangeQuot=str_replace("'","&rsquo;",str_replace('"','&quot;',$valChangeQuot));
    $valChangeQuot = str_replace("'", "&rsquo;", str_replace('"', '&quot;', $valChangeQuot));

    return $valChangeQuot;
}

function rechangeQuot($Data)
{
    ############################################
    $valChangeQuot = sanitize($Data);
    // $valChangeQuot = htmlspecialchars(str_replace("&rsquo;", "'", str_replace('&quot;', '"', $valChangeQuot)));
    $valChangeQuot = str_replace("&rsquo;", "'", str_replace('&quot;', '"', $valChangeQuot));
    //$valChangeQuot = str_replace('\r\n','<br/>',$valChangeQuot);
    return $valChangeQuot;
}

function sanitize($input)
{
    ############################################
    global $coreLanguageSQL;

    // if (get_magic_quotes_gpc()) { //check if magic_quotes is on;
    //     $input = stripslashes($input); //it is, so strip any slashes and prepare for next step;
    // }
    //if get_magic_quotes_gpc() is on, slashes were already stripped .. if it's off, mysqli_real_escape_string() will take care of the rest;
    $output = addslashes($input);

    return $output;
}

## page pagination ##

function pagepagination($uri, $limit = null)
{
    global $limitpage;
    $pageOn = array();
    if (!empty($limit)) {
        $pageOn['limit'] = $limit;
    } else {
        $pageOn['limit'] = $limitpage['showperPageSeller'];
    }
    $pagemain = str_replace($uri->pagelang[2] . "/", "", explode("?", $uri->url));

    $pageOn['page'] = $pagemain[0];
    $listparameter = array();

    foreach ($uri->uri as $key => $value) {
        if ($key != "page") {
            $listparameter[] = $key . "=" . $value;
        }
    }

    $countPara = count($listparameter);

    if ($countPara >= 1) {
        $pageOn['parambefor'] = "?" . implode("&", $listparameter);
        $pageOn['parameter'] = "&page=";
    } else {
        $pageOn['parambefor'] = "";
        $pageOn['parameter'] = "?page=";
    }

    if (gettype($uri->uri) == 'array') {
        if (array_key_exists('page', $uri->uri)) {
            $pageOn['on'] = $uri->uri['page'];
        } else {
            $pageOn['on'] = 1;
        }
    } else {
        $pageOn['on'] = 1;
    }
    return $pageOn;
}

############################################

function resize($img, $w, $h, $newfilename)
{
    ############################################
    //Check if GD extension is loaded
    if (!extension_loaded('gd') && !extension_loaded('gd2')) {
        trigger_error("GD is not loaded", E_USER_WARNING);
        return false;
    }

    //Get Image size info
    $imgInfo = getimagesize($img);
    switch ($imgInfo[2]) {
        case 1:
            $im = imagecreatefromgif($img);
            break;
        case 2:
            $im = imagecreatefromjpeg($img);
            break;
        case 3:
            $im = imagecreatefrompng($img);
            break;
        default:
            trigger_error('Unsupported filetype!', E_USER_WARNING);
            break;
    }

    //If image dimension is smaller, do not resize
    if ($imgInfo[0] <= $w && $imgInfo[1] <= $h) {
        $nHeight = $imgInfo[1];
        $nWidth = $imgInfo[0];
    } else {
        //yeah, resize it, but keep it proportional
        if ($w / $imgInfo[0] > $h / $imgInfo[1]) {
            $nWidth = $w;
            $nHeight = $imgInfo[1] * ($w / $imgInfo[0]);
        } else {
            $nWidth = $imgInfo[0] * ($h / $imgInfo[1]);
            $nHeight = $h;
        }
    }
    $nWidth = round($nWidth);
    $nHeight = round($nHeight);

    $newImg = imagecreatetruecolor($nWidth, $nHeight);

    /* Check if this image is PNG or GIF, then set if Transparent */
    if (($imgInfo[2] == 1) || ($imgInfo[2] == 3)) {
        imagealphablending($newImg, false);
        imagesavealpha($newImg, true);
        $transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
        imagefilledrectangle($newImg, 0, 0, $nWidth, $nHeight, $transparent);
    }
    imagecopyresampled($newImg, $im, 0, 0, 0, 0, $nWidth, $nHeight, $imgInfo[0], $imgInfo[1]);

    //Generate the file, and rename it to $newfilename
    switch ($imgInfo[2]) {
        case 1:
            imagegif($newImg, $newfilename);
            break;
        case 2:
            imagejpeg($newImg, $newfilename);
            break;
        case 3:
            imagepng($newImg, $newfilename);
            break;
        default:
            trigger_error('Failed resize image!', E_USER_WARNING);
            break;
    }

    return $newfilename;
}

function fileinclude($filename, $mod_tb_about_masterkey, $for = 'check', $crop = false, $cropthumb = false, $fileType = 'html') {

    global $path_upload, $path_upload_url, $path_template, $templateweb, $core_pathname_upload, $detectDivice;

    if ($for == 'linkthumb') {
        $fileType = "album";
        $filename = "reO_" . $filename;
    }

    if (!empty($fileType)) {
        $checkFile = $path_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
    } else {
        $checkFile = $path_upload . "/" . $mod_tb_about_masterkey . "/" . $filename;
    }
    $path_url_vdo = _URL . 'upload/';
    $checkFileCrop = $path_upload . "/" . $mod_tb_about_masterkey . "/crop/" . $filename;

    if (!empty($cropthumb)) {
        $checkFileCropThumb = $path_upload . "/" . $mod_tb_about_masterkey . "/cropthumb/" . $filename;
    }

    if (file_exists($checkFile) && $filename) {
        $setFoldet = $path_upload_url;
        $setimg = str_replace($path_upload, "", $checkFile);

        if (!empty($crop) && file_exists($checkFileCrop)) {
            $setimg = str_replace($path_upload, "", $checkFileCrop);
        }
        
        if (!empty($cropthumb) && file_exists($checkFileCropThumb)) {
            $setimg = str_replace($path_upload, "", $checkFileCropThumb);
        }
        
    } else {
        $setFoldet = _URL . $path_template[$templateweb][0];
        $setimg = "/assets/img/static/brand.png";
    }

    switch ($for) {
        case 'linkthumb':
        case 'link':
            $pathFile = $setFoldet . $setimg;
            break;

        case 'download':
            $fileLoad = encodeStr($path_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename);
            $pathFile = "?file=" . $fileLoad;
            break;
        case 'vdo':
            $pathFile = $path_url_vdo . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
            break;

        default:
            $pathFile = $path_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
            break;
    }
    return $pathFile;
}

function callhtml($valhtml)
{
    if (is_file($valhtml)) {
        $fd = @fopen($valhtml, "r");
        $contents = @fread($fd, @filesize($valhtml));
        @fclose($fd);
        echo txtReplaceHTML($contents);
    }
}

####################################################

function txtReplaceHTML($data)
{
    ####################################################
    $dataHTML = str_replace("\\", "", $data);
    return $dataHTML;
}

####################################################

function getIconSize($linkRelativePath)
{
    ####################################################
    $filesize = @filesize($linkRelativePath);
    if ($filesize < 10485) {
        $sizeFile = number_format($filesize / 1024, 2) . " Kb";
    } else {
        $sizeFile = number_format($filesize / (1024 * 1024), 2) . " Mb";
    }
    return $sizeFile;
}
####################################################

function getIcon($downloadFile, $type = "")
{
    ####################################################

    $imageType = strrchr($downloadFile, '.');

    if (($imageType == ".jpg") || ($imageType == ".png") || ($imageType == ".gif") || ($imageType == ".bmp")) {
        $tocss = "picture";
        $typeImgFile = "file-picture-o";
    } elseif ($imageType == ".pdf") {
        $tocss = "pdf";
        $typeImgFile = "file-pdf-o";
    } elseif ($imageType == ".txt") {
        $tocss = "txt";
        $typeImgFile = "file-text-o";
    } elseif (($imageType == ".zip") || ($imageType == ".rar")) {
        $tocss = "achive";
        $typeImgFile = "file-zip-o";
    } elseif ($imageType == ".xls" || $imageType == ".xlsx") {
        $tocss = "xls";
        $typeImgFile = "file-excel-o";
    } elseif ($imageType == ".ppt" || $imageType == ".pptx") {
        $tocss = "ppt";
        $typeImgFile = "file-powerpoint-o";
    } elseif ($imageType == ".rtf" || $imageType == ".doc" || $imageType == ".docx") {
        $tocss = "doc";
        $typeImgFile = "file-word-o";
    } else {
        $tocss = "other";
        $typeImgFile = "file-o";
    }


    $fileCheck = array(
        "icon" => $typeImgFile,
        "type" => $imageType,
        "tocss" => $tocss
    );
    if (!empty($type)) {
        return $fileCheck[$type];
    } else {
        return $fileCheck;
    }
}

// function loadSendEmailTo($mailTo, $mailFrom = null, $subjectMail = null, $messageMail = null, $typeMail = 1, $pdfFile = null)
// {
// }


///  FORMAT FORM NUM VALUE /////
function addZero($value)
{
    $valueLen = strlen($value);
    $paddingLength = 7 - $valueLen;
    if ($paddingLength > 0 && $paddingLength <= 6) {
        return str_repeat('0', $paddingLength) . $value;
    } else {
        return $value;
    }
}


############################################
function getDateNow()
{
    ############################################
    $today = getdate();
    $day = $today['mday'];
    $month = $today['mon'];
    $year = $today['year'];
    $dateIs = sprintf("%04d-%02d-%02d", $year, $month, $day);
    return $dateIs;
}

//#################################################
function getEnddayOfMonth($myDate)
{
    $myEndOfMonth = array(0, 31, 0, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    $mydataArray = explode("-", $myDate);
    $myMonth = $mydataArray[1] * 1;
    $myYear = $mydataArray[0] * 1;
    $endDay = 0;
    if ($myMonth >= 1 && $myMonth <= 12) {
        if ($myMonth == 2) {
            // Check leap year
            if (($myYear % 4) == 0) {
                $endDay = 29;
            } else {
                $endDay = 28;
            }
        } else {
            $endDay = $myEndOfMonth[$myMonth];
        }
    }
    return $endDay;
}


//#################################################
function dateFormatInsert($dateTime, $timeAgre = null)
{
    //#################################################
    global $url;
    if ($dateTime == "") {
        $dateTime = "00-00-0000";
    }

    if (!empty($timeAgre)) {
        $time = $timeAgre;
    } else {
        $time = "00:00:00";
    }

    $dataArr = explode("/", $dateTime);
    $dataYear = $dataArr[2];
    if ($dataArr[1] >= 1) {
        $dataM = $dataArr[1];
    } else {
        $dataM = "00";
    }

    if ($dataArr[0] >= 1) {
        $dataD = $dataArr[0];
    } else {
        $dataD = "00";
    }

    $valReturn = $dataYear . "-" . $dataM . "-" . $dataD . " " . $time;
    return $valReturn;
}

function page_redirect($table = '', $masterkey = '', $id = '', $language = '', $download = '')
{
    return encodeStr($table) . "|" . encodeStr($masterkey) . "|" . encodeStr($id) . "|" . encodeStr($language) . "|" . encodeStr($download);
}


function chkSyntaxAnd($var)
{
    return str_replace("&", "And", $var);
}

function check_url($url){
    return ($url != "" && $url != "#") ? true : false;
}

#################################################
function format($num,$length) {
#################################################

    $formated_num = strval($num);
    while (strlen($formated_num) < $length) {
        $formated_num = "0".$formated_num;
    }
    return $formated_num;
}

//#################################################
function formatNum($myNumber) {
    //#################################################
    $myNumber = intval($myNumber);
    if ($myNumber < 10) {
        return "0" . $myNumber;
    } else {
        return $myNumber;
    }
}


function headerActive($link){
    global $sitemapWeb, $currentLangWeb;
    $array_page = array();
    if (!empty($link)) {
        foreach ($sitemapWeb->level_1->$currentLangWeb as $valueSitemapLv1) {
            if (count((array)$valueSitemapLv1->level_2) > 0){
                foreach ($valueSitemapLv1->level_2 as $valueLv2){
                    if (count((array)$valueLv2->level_3) > 0){
                        foreach ($valueLv2->level_3 as $valueLv3) {
                            if (str_contains($valueLv3->url, $link)) {
                                $array_page['page'][] = $valueLv3->subject;
                                $array_page['header'][] = "menu-" . $valueSitemapLv1->id;
                            }
                        }
                    }else{
                        if (str_contains($valueLv2->url, $link)) {
                            $array_page['page'][] = $valueLv2->subject;
                            $array_page['header'][] = "menu-" . $valueSitemapLv1->id;
                        }
                    }
                }
            }else{
                if (str_contains($valueSitemapLv1->url, $link)) {
                    $array_page['page'][] = $valueSitemapLv1->subject;
                    $array_page['header'][] = "menu-" . $valueSitemapLv1->id;
                }
            }
        }
    }
    return $array_page;
}