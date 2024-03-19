<?php

if ($load_rss->_numOfRows > 0) {
    header("Content-Type: application/xml; charset=utf-8");
    $copyright = str_replace("http://", "", _URL);
    $copyright = str_replace("www.", "", _URL);
    $copyright = "&amp;copy; " . date("Y") . " " . $copyright;
    $data = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n";
    $data .= "<rss version=\"2.0\">\r\n";
    $data .= "<channel>\r\n";
    
    $data .= "<title>" . $TitleRSS . "</title>\r\n";
    $data .= "<description>" . $mainPage->settingWeb->setting->subject . "</description>\r\n";
    $data .= "<link>" . $urlRss . "</link>\r\n";
    $data .= "<lastBuildDate>" . date("r") . "</lastBuildDate>\r\n";
    $data .= "<copyright>" . $copyright . "</copyright>\r\n";
    $data2 = "";
    foreach ($load_rss->item as $value) {
        /* ###### Start Img ##############*/
        $url_pic = $value->pic->pictures;
        $urlrelative = str_replace(_URL, "", $value->pic->pictures);
        $length = filesize($urlrelative);
        $mime = @getimagesize($urlrelative);
        $type = $mime['mime'];
        /* ###### End Img ##############*/

        $timestmp = strtotime($value->createDate->full);
        $data2 .= '<item>' . "\n";
        $data2 .= '<title>' . $value->subject . '</title>' . "\n";
        $data2 .= '<description>' . chkSyntaxAnd($value->title) . '</description>' . "\n";
        $data2 .= '<link>' . $value->url . '</link>' . "\n";
        $data2 .= "<enclosure url=\"" . $url_pic . "\" length=\"" . $length . "\" type=\"" . $type . "\" />\r\n";
        $data2 .= '<pubDate>' . date('Y-m-d H:i:s', $timestmp) . '</pubDate>' . "\n";
        $data2 .= '</item>' . "\n";
    }

    $data .= $data2;
    $data .= "</channel>" . "\n";
    $data .= "</rss>" . "\n";
    echo $data;
}else{
    echo "no rss";
}