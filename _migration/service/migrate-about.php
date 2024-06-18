<?php
$callOldpage = callOldpage();
if ($callOldpage->_numOfRows > 0) {

    $sql_check = "SET FOREIGN_KEY_CHECKS = 0";
    $db->execute($sql_check);

    // delete data group
    $sql_del_data = "SELECT 
    " . $config['new']['cmg'] . "_id as id 
    FROM " . $config['new']['cmg'] . " 
    WHERE " . $config['new']['cmg'] . "_masterkey = 'abs'
    AND " . $config['new']['cmg'] . "_migrate = '1'
    ";
    $query_del_data = $db->execute($sql_del_data);
    foreach ($query_del_data as $keyquery_del_data => $valuequery_del_data) {
        $sql_del = "DELETE FROM " . $config['new']['cmgl'] . " WHERE   " . $config['new']['cmgl'] . "_cid='" . $valuequery_del_data['id'] . "'";
        $db->execute($sql_del);
    }

    $sql_del = "DELETE FROM " . $config['new']['cmg'] . " WHERE   " . $config['new']['cmg'] . "_masterkey='abs' AND " . $config['new']['cmg'] . "_migrate = '1'";
    $db->execute($sql_del);

    // delete data
    $sql_del_data = "SELECT 
    " . $config['new']['cms'] . "_id as id 
    FROM " . $config['new']['cms'] . " 
    WHERE " . $config['new']['cms'] . "_masterkey = 'abs'
    AND " . $config['new']['cms'] . "_migrate = '1'
    ";
    $query_del_data = $db->execute($sql_del_data);
    foreach ($query_del_data as $keyquery_del_data => $valuequery_del_data) {
        $sql_del_subdata = "SELECT 
        " . $config['new']['cmsl'] . "_id as id 
        FROM " . $config['new']['cmsl'] . " 
        WHERE " . $config['new']['cmsl'] . "_masterkey = 'abs'
        AND " . $config['new']['cmsl'] . "_cid = '" . $valuequery_del_data['id'] . "'
        ";
        $query_del_subdata = $db->execute($sql_del_subdata);

        $sql_del = "DELETE FROM " . $config['new']['cmf'] . " WHERE   " . $config['new']['cmf'] . "_contantid='" . $query_del_subdata->fields['id'] . "'";
        $db->execute($sql_del);

        $sql_del = "DELETE FROM " . $config['new']['cmsl'] . " WHERE   " . $config['new']['cmsl'] . "_cid='" . $valuequery_del_data['id'] . "'";
        $db->execute($sql_del);
    }
    $sql_del = "DELETE FROM " . $config['new']['cms'] . " WHERE   " . $config['new']['cms'] . "_masterkey='abs' AND " . $config['new']['cms'] . "_migrate = '1'";
    $db->execute($sql_del);

    $sql = "SELECT MAX(" . $config['new']['cms'] . "_order) FROM " . $config['new']['cms'];
    $QueryNumRows = $db->execute($sql);
    $maxOrder = $QueryNumRows->fields[0] + 1;

    $sql = "SELECT MAX(" . $config['new']['cmg'] . "_order) FROM " . $config['new']['cmg'];
    $QueryNumRows = $db->execute($sql);
    $maxOrderGroup = $QueryNumRows->fields[0] + 1;

    foreach ($callOldpage as $keycallOldpage => $valuecallOldpage) {
        // print_pre($valuecallOldpage);

        // ckeditor
        if (!is_dir(_DIR . "/" . $core_pathname_ckeditor . "/upload/files/id1")) {
            mkdir(_DIR . "/" . $core_pathname_ckeditor . "/upload/files/id1", 0775);
        }

        if (!empty($valuecallOldpage['content'])) {
            $content_array = unserialize($valuecallOldpage['content']);
            $html = '';
            foreach ($content_array as $keycontent_array => $valuecontent_array) {
                $html = htmlspecialchars_decode(implode(array_values($valuecontent_array['content'])));
            }
            
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
                            // copy($inputGallery_html, _DIR . $core_pathname_ckeditor . "/upload/files/id1" . "/" . $imageName);
                        }
                    }
                    if (str_contains($src, 'assets/post/')) {
                        $inputGallery_html = '/var/www/html/dmsc_migrate/post/'.$imageName;
                        if (file_exists($inputGallery_html)) {
                            if (@file_exists(_DIR . $core_pathname_ckeditor . "/upload/files/id1" . "/" . $imageName)) {
                                @unlink(_DIR . $core_pathname_ckeditor . "/upload/files/id1" . "/" . $imageName);
                            }
                            // copy($inputGallery_html, _DIR . $core_pathname_ckeditor . "/upload/files/id1" . "/" . $imageName);
                        }
                    }
                }
                $html = str_replace("https://www3.dmsc.moph.go.th/assets/page", $core_pathname_ckeditor . "/upload/files/id1", $html);
                $html = str_replace("https://www3.dmsc.moph.go.th/assets/post", $core_pathname_ckeditor . "/upload/files/id1", $html);
                
                
                // htmlfilename
                if (!is_dir(_DIR . "/" . $core_pathname_upload . "/abs")) {
                    mkdir(_DIR . "/" . $core_pathname_upload . "/abs", 0775);
                }
                if (!is_dir(_DIR . "/" . $core_pathname_upload . "/abs/html")) {
                    mkdir(_DIR . "/" . $core_pathname_upload . "/abs/html", 0775);
                }
                $filename_html =  "migrate-Thai-ab-" . $valuecallOldpage['id'] . ".html";
                if (@file_exists(_DIR . $core_pathname_upload . "/abs/html" . "/" . $filename_html)) {
                    @unlink(_DIR . $core_pathname_upload . "/abs/html" . "/" . $filename_html);
                }
                // $HTMLToolContent = str_replace("\\\"", "\"", $html);
                // $fp = fopen(_DIR . $core_pathname_upload . "/abs/html/" . $filename_html, "w");
                // fwrite($fp, $HTMLToolContent);
                // fclose($fp);
            }
        }

        // pictues
        $picname = "";
        $picname_status = 1;
        if (!empty($valuecallOldpage['file_id'])) {
            $callOldfile = callOldfile($valuecallOldpage['file_id']);
            foreach ($callOldfile as $keycallOldfile => $valuecallOldfile) {
                $inputGallery_pic = '/var/www/html/dmsc_migrate/' . str_replace('assets/', '', str_replace('\\', '/', $valuecallOldfile['filepath']));
                if (file_exists($inputGallery_pic)) {
                    $picname = $valuecallOldfile['filename'];
                    $picname_status = 2;

                    if (!is_dir(_DIR . "/" . $core_pathname_upload . "/abs")) {
                        mkdir(_DIR . "/" . $core_pathname_upload . "/abs", 0775);
                    }
                    if (!is_dir(_DIR . "/" . $core_pathname_upload . "/abs/real")) {
                        mkdir(_DIR . "/" . $core_pathname_upload . "/abs/real", 0775);
                    }
                    if (!is_dir(_DIR . "/" . $core_pathname_upload . "/abs/pictures")) {
                        mkdir(_DIR . "/" . $core_pathname_upload . "/abs/pictures", 0775);
                    }
                    if (!is_dir(_DIR . "/" . $core_pathname_upload . "/abs/office")) {
                        mkdir(_DIR . "/" . $core_pathname_upload . "/abs/office", 0775);
                    }
                    if (!is_dir(_DIR . "/" . $core_pathname_upload . "/abs/webp")) {
                        mkdir(_DIR . "/" . $core_pathname_upload . "/abs/webp", 0777);
                    }

                    if (file_exists(_DIR . "/" . $core_pathname_upload . "/abs/real/" . $picname)) {
                        @unlink(_DIR . "/" . $core_pathname_upload . "/abs/real/" . $picname);
                    }
                    if (file_exists(_DIR . "/" . $core_pathname_upload . "/abs/pictures/" . $picname)) {
                        @unlink(_DIR . "/" . $core_pathname_upload . "/abs/pictures/" . $picname);
                    }
                    if (file_exists(_DIR . "/" . $core_pathname_upload . "/abs/office/" . $picname)) {
                        @unlink(_DIR . "/" . $core_pathname_upload . "/abs/office/" . $picname);
                    }
                    if (file_exists(_DIR . "/" . $core_pathname_upload . "/abs/webp/" . $picname)) {
                        @unlink(_DIR . "/" . $core_pathname_upload . "/abs/webp/" . $picname);
                    }

                    // ##  Real ################################################################################
                    // copy($inputGallery_pic, _DIR . "/" . $core_pathname_upload . "/abs/real/" . $picname);

                    // ##  Pictures ################################################################################
                    // $arrImgInfo = getimagesize($inputGallery_pic);
                    // if ($arrImgInfo[0] <= ($sizeWidthPic + 10)) {

                    //     copy($inputGallery_pic, _DIR . "/" . $core_pathname_upload . "/abs/pictures/" . $picname);
                    // } else {
                    //     $newfilename = _DIR . "/" . $core_pathname_upload . "/abs/pictures/" . $picname; // New file name for thumb
                    //     $w = $sizeWidthPic_abs;
                    //     $h = $sizeHeightPic_abs;
                    //     $thumbnail = resize($inputGallery_pic, $w, $h, $newfilename);
                    // }
                    
                    // ##  Office ################################################################################
                    // $newfilename = _DIR . "/" . $core_pathname_upload . "/abs/office/" . $picname;; // New file name for thumb
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
        if (!empty($valuecallOldpage['pdf_id'])) {
            $callOldfile = callOldfile($valuecallOldpage['pdf_id']);
            foreach ($callOldfile as $keycallOldfile => $valuecallOldfile) {
                $inputGallery_file = '/var/www/html/dmsc_migrate/' . str_replace('assets/', '', str_replace('\\', '/', $valuecallOldfile['filepath']));
                if (file_exists($inputGallery_file)) {
                    $filename_path = pathinfo($inputGallery_file);
                    $file_path = $filename_path['basename'];
                    $filename = $filename_path['filename'];
                    $filenameCredate = $valuecallOldfile['ts'];
                    $filename_status = 2;

                    if (!is_dir(_DIR . "/" . $core_pathname_upload . "/abs/file")) {
                        mkdir(_DIR . "/" . $core_pathname_upload . "/abs/file", 0775);
                    }
                    if (file_exists(_DIR . "/" . $core_pathname_upload . "/abs/file/" . $filename_path['basename'])) {
                        @unlink(_DIR . "/" . $core_pathname_upload . "/abs/file/" . $filename_path['basename']);
                    }
                    // copy($inputGallery_file, _DIR . "/" . $core_pathname_upload . "/abs/file/" . $filename_path['basename']);
                }
            }
        }

        // // insert
        // $insert_group = array();
        // $insert_group[$config['new']['cmg'] . "_masterkey"] = "'abs'";
        // $insert_group[$config['new']['cmg'] . "_crebyid"] = "'1'";
        // $insert_group[$config['new']['cmg'] . "_migrate"] = "'1'";
        // $insert_group[$config['new']['cmg'] . "_creby"] = "'dmscadmin dmscadmin'";
        // $insert_group[$config['new']['cmg'] . "_lastbyid"] = "'1'";
        // $insert_group[$config['new']['cmg'] . "_lastby"] = "'dmscadmin dmscadmin'";
        // $insert_group[$config['new']['cmg'] . "_credate"] = "'" . $valuecallOldpage['created_date'] . "'";
        // $insert_group[$config['new']['cmg'] . "_lastdate"] = "'" . $valuecallOldpage['ts'] . "'";
        // $insert_group[$config['new']['cmg'] . "_status"] = "'Disable'";
        // $insert_group[$config['new']['cmg'] . "_order"] = "'" . $maxOrderGroup . "'";
        // $sql_group = "INSERT INTO " . $config['new']['cmg'] . "(" . implode(",", array_keys($insert_group)) . ") VALUES (" . implode(",", array_values($insert_group)) . ")";
        // $db->execute($sql_group);
        // $group_id = $db->insert_id();
        // if ($group_id > 0) {
        //     $insertLang = array();
        //     $insertLang[$config['new']['cmgl'] . "_cid"] = "'" . $group_id . "'";
        //     $insertLang[$config['new']['cmgl'] . "_masterkey"] = "'abs'";
        //     $insertLang[$config['new']['cmgl'] . "_language"] = "'Thai'";
        //     $insertLang[$config['new']['cmgl'] . "_subject"] = "'" . $valuecallOldpage['title'] . "'";
        //     $sql2 = "INSERT INTO " . $config['new']['cmgl'] . "(" . implode(",", array_keys($insertLang)) . ") VALUES (" . implode(",", array_values($insertLang)) . ")";
        //     $db->execute($sql2);
        //     $contantID =$db->insert_id();

        //     $insertLang = array();
        //     $insertLang[$config['new']['cmgl'] . "_cid"] = "'" . $group_id . "'";
        //     $insertLang[$config['new']['cmgl'] . "_masterkey"] = "'abs'";
        //     $insertLang[$config['new']['cmgl'] . "_language"] = "'Eng'";
        //     $sqllang = "INSERT INTO " . $config['new']['cmgl'] . "(" . implode(",", array_keys($insertLang)) . ") VALUES (" . implode(",", array_values($insertLang)) . ")";
        //     $db->execute($sqllang);
        // }

        // $insert = array();
        // $insert[$config['new']['cms'] . "_masterkey"] = "'abs'";
        // $insert[$config['new']['cms'] . "_crebyid"] = "'1'";
        // $insert[$config['new']['cms'] . "_gid"] = "'" . $group_id . "'";
        // $insert[$config['new']['cms'] . "_migrate"] = "'1'";
        // $insert[$config['new']['cms'] . "_creby"] = "'dmscadmin dmscadmin'";
        // $insert[$config['new']['cms'] . "_lastbyid"] = "'1'";
        // $insert[$config['new']['cms'] . "_lastby"] = "'dmscadmin dmscadmin'";

        // $insert[$config['new']['cms'] . "_sdate"] = "'" . $valuecallOldpage['publish_start'] . "'";
        // $insert[$config['new']['cms'] . "_edate"] = "'" . $valuecallOldpage['publish_end'] . "'";

        // $insert[$config['new']['cms'] . "_credate"] = "'" . $valuecallOldpage['created_date'] . "'";

        // $insert[$config['new']['cms'] . "_lastdate"] = "'" . $valuecallOldpage['ts'] . "'";
        // $insert[$config['new']['cms'] . "_status"] = "'Disable'";
        // $insert[$config['new']['cms'] . "_order"] = "'" . $maxOrder . "'";
        // $insert[$config['new']['cms'] . "_view"] = "'" . $valuecallOldpage['view'] . "'";
        // $sql = "INSERT INTO " . $config['new']['cms'] . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
        // $db->execute($sql);
        // $content_id = $db->insert_id();
        // if ($content_id > 0) {
        //     $insertLang = array();
        //     $insertLang[$config['new']['cmsl'] . "_cid"] = "'" . $content_id . "'";
        //     $insertLang[$config['new']['cmsl'] . "_masterkey"] = "'abs'";
        //     $insertLang[$config['new']['cmsl'] . "_language"] = "'Thai'";
        //     $insertLang[$config['new']['cmsl'] . "_subject"] = "'" . $valuecallOldpage['title'] . "'";
        //     $insertLang[$config['new']['cmsl'] . "_typec"] = "'" . $filename_status . "'";
        //     $insertLang[$config['new']['cmsl'] . "_picType"] = "'" . $picname_status . "'";
        //     $insertLang[$config['new']['cmsl'] . "_picDefault"] = "'1'";
        //     $insertLang[$config['new']['cmsl'] . "_pic"] = "'" . $picname . "'";
        //     $insertLang[$config['new']['cmsl'] . "_type"] = "'url'";
        //     $insertLang[$config['new']['cmsl'] . "_htmlfilename"] = "'" . $filename_html . "'";
        //     $insertLang[$config['new']['cmsl'] . "_lastbyid"] = "'1'";
        //     $insertLang[$config['new']['cmsl'] . "_lastby"] = "'dmscadmin dmscadmin'";
        //     $insertLang[$config['new']['cmsl'] . "_lastdate"] = "'" . $valuecallOldpage['ts'] . "'";
        //     $sql2 = "INSERT INTO " . $config['new']['cmsl'] . "(" . implode(",", array_keys($insertLang)) . ") VALUES (" . implode(",", array_values($insertLang)) . ")";
        //     $db->execute($sql2);
        //     $contantID =$db->insert_id();

        //     $insertLang = array();
        //     $insertLang[$config['new']['cmsl'] . "_cid"] = "'" . $content_id . "'";
        //     $insertLang[$config['new']['cmsl'] . "_masterkey"] = "'abs'";
        //     $insertLang[$config['new']['cmsl'] . "_language"] = "'Eng'";
        //     $insertLang[$config['new']['cmsl'] . "_lastbyid"] = "'1'";
        //     $insertLang[$config['new']['cmsl'] . "_lastby"] = "'dmscadmin dmscadmin'";
        //     $insertLang[$config['new']['cmsl'] . "_lastdate"] = "'" . $valuecallOldpage['ts'] . "'";
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
