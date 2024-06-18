<?php
// print_pre(rechangeQuot('กรมวิทย์ฯ ให้บริการ &ldquo;ตรวจแอลกอฮอล์ในเลือด&rdquo; เพื่อสนับสนุนการป้องกันและลดการเกิดอุบัติเหตุทางถนน ช่วงเทศกาลปีใหม่&nbsp;'));die;
$callOldpost = callOldpost();
if ($callOldpost->_numOfRows > 0) {

    $sql_check = "SET FOREIGN_KEY_CHECKS = 0";
    $db->execute($sql_check);

    $setup_group = array();
    foreach ($array_id_config as $keyarray_id_config => $valuearray_id_config) {
        $masterkey = array_keys($valuearray_id_config);
        $setup_group['masterkey'][] = "'".$masterkey[0]."'";
        $setup_group['id'][] = $keyarray_id_config;
    }
    // delete data
    $sql_del_data = "SELECT 
    " . $config['new']['cms'] . "_id as id 
    FROM " . $config['new']['cms'] . " 
    WHERE " . $config['new']['cms'] . "_masterkey in (" . implode(",", array_values($setup_group['masterkey'])) . ")
    AND " . $config['new']['cms'] . "_migrate = '1'
    ";
    
    $query_del_data = $db->execute($sql_del_data);
    foreach ($query_del_data as $keyquery_del_data => $valuequery_del_data) {
        $sql_del_subdata = "SELECT 
        " . $config['new']['cmsl'] . "_id as id 
        FROM " . $config['new']['cmsl'] . " 
        WHERE " . $config['new']['cmsl'] . "_masterkey in (" . implode(",", array_values($setup_group['masterkey'])) . ")
        AND " . $config['new']['cmsl'] . "_cid = '" . $valuequery_del_data['id'] . "'
        ";
        $query_del_subdata = $db->execute($sql_del_subdata);

        $sql_del = "DELETE FROM " . $config['new']['cmf'] . " WHERE   " . $config['new']['cmf'] . "_contantid='" . $query_del_subdata->fields['id'] . "'";
        $db->execute($sql_del);

        $sql_del = "DELETE FROM " . $config['new']['cmsl'] . " WHERE   " . $config['new']['cmsl'] . "_cid='" . $valuequery_del_data['id'] . "'";
        $db->execute($sql_del);
    }
    $sql_del = "DELETE FROM " . $config['new']['cms'] . " WHERE   " . $config['new']['cms'] . "_masterkey in (" . implode(",", array_values($setup_group['masterkey'])) . ") AND " . $config['new']['cms'] . "_migrate = '1'";
    $db->execute($sql_del);

    $sql = "SELECT MAX(" . $config['new']['cms'] . "_order) FROM " . $config['new']['cms'];
    $QueryNumRows = $db->execute($sql);
    $maxOrder = $QueryNumRows->fields[0] + 1;

    $sql = "SELECT MAX(" . $config['new']['cmg'] . "_order) FROM " . $config['new']['cmg'];
    $QueryNumRows = $db->execute($sql);
    $maxOrderGroup = $QueryNumRows->fields[0] + 1;

    foreach ($callOldpost as $keycallOldpost => $valuecallOldpost) {
        $current_data = $array_id_config[$valuecallOldpost['category_id']];
        $masterkey = array_keys($current_data);
        $groupid = array_values($current_data);
        // ckeditor
        if (!is_dir(_DIR . "/" . $core_pathname_ckeditor . "/upload/files/id1")) {
            mkdir(_DIR . "/" . $core_pathname_ckeditor . "/upload/files/id1", 0775);
        }

        if (!empty($valuecallOldpost['detail'])) {
            $html = '';
            $html = htmlspecialchars_decode($valuecallOldpost['detail']);
            
            $filename_html = "";
            if (!empty($html)) {
                // Load the HTML content
                $dom = new DOMDocument();
                libxml_use_internal_errors(true); // Suppress HTML parsing errors
                $dom->loadHTML($html);
                libxml_clear_errors();
    
                // Find all the <img> tags
                $images = $dom->getElementsByTagName('img');
    
                // Extract the image names from the <img> tags
                foreach ($images as $img) {
                    $src = $img->getAttribute('src');
                    $imageName = basename($src);
                    if (str_contains($src, 'assets/page/')) {
                        $inputGallery_html = '/var/www/html/dmsc_migrate/page/'.$imageName;
                        if (file_exists($inputGallery_html)) {
                            if (@file_exists(_DIR . $core_pathname_ckeditor . "/upload/files/id1" . "/" . $imageName)) {
                                @unlink(_DIR . $core_pathname_ckeditor . "/upload/files/id1" . "/" . $imageName);
                            }
                            copy($inputGallery_html, _DIR . $core_pathname_ckeditor . "/upload/files/id1" . "/" . $imageName);
                        }
                    }
                    if (str_contains($src, 'assets/post/')) {
                        $inputGallery_html = '/var/www/html/dmsc_migrate/post/'.$imageName;
                        if (file_exists($inputGallery_html)) {
                            if (@file_exists(_DIR . $core_pathname_ckeditor . "/upload/files/id1" . "/" . $imageName)) {
                                @unlink(_DIR . $core_pathname_ckeditor . "/upload/files/id1" . "/" . $imageName);
                            }
                            copy($inputGallery_html, _DIR . $core_pathname_ckeditor . "/upload/files/id1" . "/" . $imageName);
                        }
                    }
                }
                $html = str_replace("https://www3.dmsc.moph.go.th/assets/page", $core_pathname_ckeditor . "/upload/files/id1", $html);
                $html = str_replace("https://www3.dmsc.moph.go.th/assets/post", $core_pathname_ckeditor . "/upload/files/id1", $html);
                
                // htmlfilename
                if (!is_dir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "")) {
                    mkdir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "", 0775);
                }
                if (!is_dir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/html")) {
                    mkdir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/html", 0775);
                }
                $filename_html =  "migrate-Thai-ab-" . $valuecallOldpost['id'] . ".html";
                if (@file_exists(_DIR . $core_pathname_upload . "/" . $masterkey[0] . "/html" . "/" . $filename_html)) {
                    @unlink(_DIR . $core_pathname_upload . "/" . $masterkey[0] . "/html" . "/" . $filename_html);
                }
                // $HTMLToolContent = str_replace("\\\"", "\"", $html);
                // $fp = fopen(_DIR . $core_pathname_upload . "/" . $masterkey[0] . "/html/" . $filename_html, "w");
                // fwrite($fp, $HTMLToolContent);
                // fclose($fp);
            }
        }

        // pictues
        $picname = "";
        $picname_status = 1;
        if (!empty($valuecallOldpost['file_id'])) {
            $callOldfile = callOldfile($valuecallOldpost['file_id']);
            foreach ($callOldfile as $keycallOldfile => $valuecallOldfile) {
                $inputGallery_pic = '/var/www/html/dmsc_migrate/' . str_replace('assets/', '', str_replace('\\', '/', $valuecallOldfile['filepath']));
                if (file_exists($inputGallery_pic)) {
                    $filename_path = pathinfo($inputGallery_pic);
                    $picname = $filename_path['filename'] . "." . strtolower($filename_path['extension']);
                    $picname_status = 2;

                    if (!is_dir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "")) {
                        mkdir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "", 0775);
                    }
                    if (!is_dir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/real")) {
                        mkdir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/real", 0775);
                    }
                    if (!is_dir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/pictures")) {
                        mkdir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/pictures", 0775);
                    }
                    if (!is_dir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/office")) {
                        mkdir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/office", 0775);
                    }
                    if (!is_dir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/webp")) {
                        mkdir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/webp", 0777);
                    }

                    if (file_exists(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/real/" . $picname)) {
                        @unlink(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/real/" . $picname);
                    }
                    if (file_exists(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/pictures/" . $picname)) {
                        @unlink(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/pictures/" . $picname);
                    }
                    if (file_exists(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/office/" . $picname)) {
                        @unlink(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/office/" . $picname);
                    }
                    if (file_exists(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/webp/" . $picname)) {
                        @unlink(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/webp/" . $picname);
                    }

                    // ##  Real ################################################################################
                    // copy($inputGallery_pic, _DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/real/" . $picname);

                    // ##  Pictures ################################################################################
                    // $arrImgInfo = getimagesize($inputGallery_pic);
                    // if ($arrImgInfo[0] <= ($sizeWidthPic_nw + 10)) {

                    //     copy($inputGallery_pic, _DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/pictures/" . $picname);
                    // } else {
                    //     $newfilename = _DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/pictures/" . $picname; // New file name for thumb
                    //     $w = $sizeWidthPic_nw;
                    //     $h = $sizeHeightPic_nw;
                    //     $thumbnail = resize($inputGallery_pic, $w, $h, $newfilename);
                    // }
                    
                    // ##  Office ################################################################################
                    // $newfilename = _DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/office/" . $picname;; // New file name for thumb
                    // $w = $sizeWidthOff;
                    // $h = $sizeHeightOff;
                    // $thumbnail = resize($inputGallery_pic, $w, $h, $newfilename);
                }
            }
        }

        // file
        $file_path = "";
        $filename = "";
        $filenameCredate = "";
        $filename_status = 1;
        if (!empty($valuecallOldpost['pdf_id'])) {
            $callOldfile = callOldfile($valuecallOldpost['pdf_id']);
            foreach ($callOldfile as $keycallOldfile => $valuecallOldfile) {
                $inputGallery_file = '/var/www/html/dmsc_migrate/' . str_replace('assets/', '', str_replace('\\', '/', $valuecallOldfile['filepath']));
                if (file_exists($inputGallery_file)) {
                    $filename_path = pathinfo($inputGallery_file);
                    $file_path = $filename_path['basename'];
                    $filename = $filename_path['filename'];
                    $filenameCredate = $valuecallOldfile['ts'];
                    if (strtolower($filename_path['extension']) == 'pdf') {
                        $filename_status = 2;
                    }

                    if (!is_dir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/file")) {
                        mkdir(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/file", 0775);
                    }
                    if (file_exists(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/file/" . $filename_path['basename'])) {
                        @unlink(_DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/file/" . $filename_path['basename']);
                    }
                    // copy($inputGallery_file, _DIR . "/" . $core_pathname_upload . "/" . $masterkey[0] . "/file/" . $filename_path['basename']);
                }
            }
        }

        // $insert = array();
        // $insert[$config['new']['cms'] . "_masterkey"] = "'" . $masterkey[0] . "'";
        // $insert[$config['new']['cms'] . "_crebyid"] = "'1'";
        // $insert[$config['new']['cms'] . "_gid"] = "'" . $groupid[0] . "'";
        // $insert[$config['new']['cms'] . "_migrate"] = "'1'";
        // $insert[$config['new']['cms'] . "_creby"] = "'dmscadmin dmscadmin'";
        // $insert[$config['new']['cms'] . "_lastbyid"] = "'1'";
        // $insert[$config['new']['cms'] . "_lastby"] = "'dmscadmin dmscadmin'";

        // $insert[$config['new']['cms'] . "_sdate"] = "'" . $valuecallOldpost['publish_start'] . "'";
        // $insert[$config['new']['cms'] . "_edate"] = "'" . $valuecallOldpost['publish_end'] . "'";

        // $insert[$config['new']['cms'] . "_credate"] = "'" . $valuecallOldpost['ts'] . "'";

        // $insert[$config['new']['cms'] . "_lastdate"] = "'" . $valuecallOldpost['ts'] . "'";
        // $insert[$config['new']['cms'] . "_status"] = "'Disable'";
        // $insert[$config['new']['cms'] . "_order"] = "'" . $maxOrder . "'";
        // $insert[$config['new']['cms'] . "_view"] = "'" . $valuecallOldpost['view'] . "'";
        // $sql = "INSERT INTO " . $config['new']['cms'] . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
        // $db->execute($sql);
        // $content_id = $db->insert_id();
        // if ($content_id > 0) {
        //     $insertLang = array();
        //     $insertLang[$config['new']['cmsl'] . "_cid"] = "'" . $content_id . "'";
        //     $insertLang[$config['new']['cmsl'] . "_masterkey"] = "'" . $masterkey[0] . "'";
        //     $insertLang[$config['new']['cmsl'] . "_language"] = "'Thai'";
        //     $insertLang[$config['new']['cmsl'] . "_subject"] = "'" . changeQuot($valuecallOldpost['title']) . "'";
        //     $insertLang[$config['new']['cmsl'] . "_typec"] = "'" . $filename_status . "'";
        //     $insertLang[$config['new']['cmsl'] . "_picType"] = "'" . $picname_status . "'";
        //     $insertLang[$config['new']['cmsl'] . "_picDefault"] = "'1'";
        //     $insertLang[$config['new']['cmsl'] . "_pic"] = "'" . $picname . "'";
        //     $insertLang[$config['new']['cmsl'] . "_type"] = "'url'";
        //     $insertLang[$config['new']['cmsl'] . "_htmlfilename"] = "'" . $filename_html . "'";
        //     $insertLang[$config['new']['cmsl'] . "_lastbyid"] = "'1'";
        //     $insertLang[$config['new']['cmsl'] . "_lastby"] = "'dmscadmin dmscadmin'";
        //     $insertLang[$config['new']['cmsl'] . "_lastdate"] = "'" . $valuecallOldpost['ts'] . "'";
        //     $sql2 = "INSERT INTO " . $config['new']['cmsl'] . "(" . implode(",", array_keys($insertLang)) . ") VALUES (" . implode(",", array_values($insertLang)) . ")";
        //     $db->execute($sql2);
        //     $contantID =$db->insert_id();

        //     $insertLang = array();
        //     $insertLang[$config['new']['cmsl'] . "_cid"] = "'" . $content_id . "'";
        //     $insertLang[$config['new']['cmsl'] . "_masterkey"] = "'" . $masterkey[0] . "'";
        //     $insertLang[$config['new']['cmsl'] . "_language"] = "'Eng'";
        //     $insertLang[$config['new']['cmsl'] . "_lastbyid"] = "'1'";
        //     $insertLang[$config['new']['cmsl'] . "_lastby"] = "'dmscadmin dmscadmin'";
        //     $insertLang[$config['new']['cmsl'] . "_lastdate"] = "'" . $valuecallOldpost['ts'] . "'";
        //     $sqllang = "INSERT INTO " . $config['new']['cmsl'] . "(" . implode(",", array_keys($insertLang)) . ") VALUES (" . implode(",", array_values($insertLang)) . ")";
        //     $db->execute($sqllang);

        //     // file
        //     $sql_del = "DELETE FROM " . $config['new']['cmf'] . " WHERE   " . $config['new']['cmf'] . "_contantid='" . $contantID . "'";
        //     $db->execute($sql_del);

        //     if ($filename_status == 2) {
        //         $insert = array();
        //         $insert[$config['new']['cmf'] . "_contantid"] = "'" . $contantID . "'";
        //         $insert[$config['new']['cmf'] . "_filename"] = "'" . $file_path . "'";
        //         $insert[$config['new']['cmf'] . "_name"] = "'" . $filename . "'";
        //         $insert[$config['new']['cmf'] . "_language"] = "'Thai'";
        //         $insert[$config['new']['cmf'] . "_credate"] = "'" . $filenameCredate . "'";
    
        //         $sql_file = "INSERT INTO " . $config['new']['cmf'] . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
        //         $db->execute($sql_file);
        //     }
        // }
        $maxOrder++;
        $maxOrderGroup++;
    }

    $sql_check = "SET FOREIGN_KEY_CHECKS = 1";
    $db->execute($sql_check);

}
