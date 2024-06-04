<?php

function print_pre($array)
{
    echo "<pre class='printPRE'>";
    echo "<textarea>";

    print_r($array);

    echo "</textarea>";
    echo "</pre>";
    echo "<style>.printPRE{ z-index:1000; position: relative;background: #000;color: red;}</style>";
}

function changeQuot($Data)
{
    ############################################
    global $dbConnect;


    if (!is_numeric($Data) && !is_array($Data)) {
        $valTrim = trim($Data);
    } else {
        $valTrim = $Data;
    }
    $valChangeQuot = ms_escape_string($valTrim);
    $valChangeQuot = str_replace("'", "&rsquo;", str_replace('"', '&quot;', $valChangeQuot));

    return $valChangeQuot;
}

function ms_escape_string($data)
{
    ###################### Set Up Function ######################
    if (!isset($data) or empty($data))
        return '';
    if (is_numeric($data))
        return $data;

    $non_displayables = array(
        '/%0[0-8bcef]/', // url encoded 00-08, 11, 12, 14, 15
        '/%1[0-9a-f]/', // url encoded 16-31
        '/[\x00-\x08]/', // 00-08
        '/\x0b/', // 11
        '/\x0c/', // 12
        '/[\x0e-\x1f]/'             // 14-31
    );
    foreach ($non_displayables as $regex)
        $data = preg_replace($regex, '', $data);
    $data = str_replace("'", "''", $data);
    return $data;
}

function rechangeQuot($Data)
{
    ############################################
    $valChangeQuot = sanitize($Data);
    $valChangeQuot = htmlspecialchars(str_replace("&rsquo;", "'", str_replace('&quot;', '"', $valChangeQuot)));
    //$valChangeQuot = str_replace('\r\n','<br/>',$valChangeQuot);
    return $valChangeQuot;
}

function sanitize($input)
{
    ############################################
    global $coreLanguageSQL;
    $output = addslashes($input);
    return $output;
}

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
            return false;
            // trigger_error('Unsupported filetype!', E_USER_WARNING);
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
    if (($imgInfo[2] == 1) or ($imgInfo[2] == 3)) {
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

function callOldpage()
{
    global $dbOld, $config;

    $sql = "SELECT
    " . $config['old']['page'] . "_id as id
    ,title as title
    ,content as content
    ,publish_start as publish_start
    ,publish_end as publish_end
    ,last_publish as last_publish
    ,ts as ts
    ,created_date as created_date
    ,view as view
    ,pdf_id as pdf_id
    ,file_id as file_id
    FROM " . $config['old']['page'] . " 
    WHERE 1=1
    ";

    // print_pre($sql);die;
    return $dbOld->execute($sql);
}

function callOldpost()
{
    global $dbOld, $config;

    $sql = "SELECT
    " . $config['old']['post'] . "_id as id
    ,title as title
    ,detail as detail
    ,file_id as file_id
    ,category_id as category_id
    ,publish_start as publish_start
    ,publish_end as publish_end
    ,last_publish as last_publish
    ,ts as ts
    ,view as view
    ,pdf_id as pdf_id
    FROM " . $config['old']['post'] . " 
    WHERE 1=1
    AND category_id != ''
    ";

    // $sql .= " limit 10";

    // print_pre($sql);die;
    return $dbOld->execute($sql);
}

function callOldfile($id)
{
    global $dbOld, $config;

    $sql = "SELECT
    " . $config['old']['files'] . "_id as id
    ,filename as filename
    ,filepath as filepath
    ,thumbpath as thumbpath
    ,ts as ts
    FROM " . $config['old']['files'] . " 
    WHERE 1=1 
    AND " . $config['old']['files'] . "_id = '" . $id . "'
    ";

    // print_pre($sql);die;
    return $dbOld->execute($sql);
}
