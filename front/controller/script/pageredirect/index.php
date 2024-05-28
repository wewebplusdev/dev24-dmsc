<?php
$menuActive = "pageredirect";

define('LOCATION_HEADER', 'Location:');

$Pageredirectage = new Pageredirectage;
if (!empty($url->segment[1])) {
    $case_slug = explode("@", urldecode($url->segment[1]));

    /*#### Start Update View #####*/
    if (!isset($_COOKIE['VIEW_DETAIL_' . decodeStr($case_slug[1]) . '_' . urldecode(decodeStr($case_slug[2]))])) {
        // Determine if the connection is secure
        $secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
        
        // Set the VIEW_DETAIL cookie
        setcookie(
            "VIEW_DETAIL_" . decodeStr($case_slug[1]) . '_' . urldecode(decodeStr($case_slug[2])),
            true,
            time() + 600,
            "/",
            "",
            $secure,
            true
        );
    
        $view = 1;
    } else {
        $view = 0;
    }
    /*#### End Update View #####*/
   

    $array_req = array(
        'table' => decodeStr($case_slug[0]),
        'masterkey' => decodeStr($case_slug[1]),
        'id' => decodeStr($case_slug[2]),
        'language' => decodeStr($case_slug[3]),
        'action' => 'link',
        'download' => decodeStr($case_slug[4]),
        'urlc2' => decodeStr($case_slug[5]),
        'view' => $view,
    );
    
    $loadUrlRedirect = $Pageredirectage->loadUrlRedirect($array_req);
    if ($loadUrlRedirect->code === 1001 && !empty($loadUrlRedirect->item->url)) {
        header(LOCATION_HEADER . $loadUrlRedirect->item->url);
    }else{
        header(LOCATION_HEADER . $linklang . "/home");
    }
}else{
    header(LOCATION_HEADER . $linklang . "/home");
}

exit(0);
