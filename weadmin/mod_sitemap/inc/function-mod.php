<?php
$sitemapWebsite = new sitemapWebsite('sm');

class sitemapWebsite {
    private $menu_masterkey;

    function __construct($masterkey){
        global $valSiteManage, $mod_tb_root, $mod_tb_group, $mod_tb_subgroup, $core_full_path;

        $this->menu_masterkey = $masterkey;

        $site_lang = $_SESSION[$valSiteManage . 'core_session_multilang'];
        if (gettype($site_lang) == 'array' && count($site_lang) > 0) {
            $array_sitemap = array();
            foreach ($site_lang as $valueLang) {
                $callGroup = self::callGroup($this->menu_masterkey, $valueLang['key']);
                foreach ($callGroup as $keycallGroup => $valuecallGroup) {
                    $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['id'] = $valuecallGroup['id'];
                    $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['subject'] = $valuecallGroup['subject'];
                    $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['url'] = $valuecallGroup['url'];
                    $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['tb'] = $mod_tb_group;
                    $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['masterkey'] = $_REQUEST['masterkey'];
                    $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['layout'] = $valuecallGroup['layout'];
                    
                    $upload_path = "../../upload/" . $valuecallGroup['masterkey'];
                    $fullpath_upload_path = $core_full_path . "/upload/" . $valuecallGroup['masterkey'];
                    $valPic = $upload_path . "/pictures/" . $valuecallGroup['pic'];
                    $valPicWebp = $upload_path . "/webp/" . $valuecallGroup['pic'] . ".webp";
                    if (!empty($valuecallGroup['pic'])) {
                        if (is_file($valPicWebp)) {
                            $valPic = $fullpath_upload_path . "/webp/" . $valuecallGroup['pic'] . ".webp";
                        }else if(is_file($valPic)) {
                            $valPic = $fullpath_upload_path . "/pictures/" . $valuecallGroup['pic'];
                        }else{
                            $valPic = "";
                        }
                    }else{
                        $valPic = "";
                    }
                    $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['pic'] = $valPic;

                    if ($valuecallGroup['target'] == 2) {
                        $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['target'] = '_blank';
                    }else{
                        $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['target'] = '_self';
                    }

                    $callSubGroup = self::callSubGroup($this->menu_masterkey, $valueLang['key'], $valuecallGroup['id']);
                    if ($callSubGroup->_numOfRows > 0) {
                        $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['count_lv2'] = true;
                    }else{
                        $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['count_lv2'] = false;
                    }
                    foreach ($callSubGroup as $keycallSubGroup => $valuecallSubGroup) {
                        $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['id'] = $valuecallSubGroup['id'];
                        $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['subject'] = $valuecallSubGroup['subject'];
                        $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['url'] = $valuecallSubGroup['url'];
                        $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['tb'] = $mod_tb_subgroup;
                        $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['masterkey'] = $_REQUEST['masterkey'];
                        if ($valuecallSubGroup['target'] == 2) {
                            $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['target'] = '_blank';
                        }else{
                            $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['target'] = '_self';
                        }

                        $callContent = self::callContent($this->menu_masterkey, $valueLang['key'], $valuecallGroup['id'], $valuecallSubGroup['id']);
                        if ($callContent->_numOfRows > 0) {
                            $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['count_lv3'] = true;
                            $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['count_lv3'] = true;
                        }else{
                            $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['count_lv3'] = false;
                            $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['count_lv3'] = false;
                        }
                        foreach ($callContent as $keycallContent => $valuecallContent) {
                            $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['level_3'][$valuecallContent['id'].'-'.$keycallContent]['id'] = $valuecallContent['id'];
                            $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['level_3'][$valuecallContent['id'].'-'.$keycallContent]['subject'] = $valuecallContent['subject'];
                            $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['level_3'][$valuecallContent['id'].'-'.$keycallContent]['url'] = $valuecallContent['url'];
                            $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['level_3'][$valuecallContent['id'].'-'.$keycallContent]['tb'] = $mod_tb_root;
                            $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['level_3'][$valuecallContent['id'].'-'.$keycallContent]['masterkey'] = $_REQUEST['masterkey'];
                            if ($valuecallContent['target'] == 2) {
                                $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['level_3'][$valuecallContent['id'].'-'.$keycallContent]['target'] = '_blank';
                            }else{
                                $array_sitemap['level_1'][$valueLang['key']][$valuecallGroup['id'].'-'.$keycallGroup]['level_2'][$valuecallSubGroup['id'].'-'.$keycallSubGroup]['level_3'][$valuecallContent['id'].'-'.$keycallContent]['target'] = '_self';
                            }
                        }
                    }
                }
            }
            // print_pre($array_sitemap);die;
            // create json
            $put_content = file_put_contents('../../webservice_json/sitemap.json', json_encode($array_sitemap));
            // if ($put_content) {
            //     $arrJson = array(
            //         'status' => true,
            //         'msg' => 'create sitemap successfully.',
            //     );
            //     echo json_encode($arrJson);
            // }else{
            //     $arrJson = array(
            //         'status' => false,
            //         'msg' => 'create sitemap fail.',
            //     );
            //     echo json_encode($arrJson);
            // }
        }
    }

    private function callGroup($masterkey, $lang){
        global $dbConnect,$mod_tb_group,$mod_tb_group_lang;
        $sql = "SELECT
        " . $mod_tb_group . "_id as id,
        " . $mod_tb_group . "_masterkey as masterkey,
        " . $mod_tb_group_lang . "_subject as subject,
        " . $mod_tb_group_lang . "_target as target,
        " . $mod_tb_group_lang . "_url as url,
        " . $mod_tb_group_lang . "_pic as pic,
        " . $mod_tb_group_lang . "_layout as layout 
        FROM " . $mod_tb_group . " 
        INNER JOIN " . $mod_tb_group_lang . " ON " . $mod_tb_group_lang . "_cid = " . $mod_tb_group . "_id 
        WHERE " . $mod_tb_group . "_masterkey = '" . $masterkey . "' 
        AND " . $mod_tb_group_lang . "_language = '" . $lang . "' 
        AND " . $mod_tb_group . "_status != 'Disable' 
        ORDER BY " . $mod_tb_group . "_order DESC
        ";

        $result = $dbConnect->execute($sql);
        return $result;
    }

    private function callSubGroup($masterkey, $lang, $gid){
        global $dbConnect,$mod_tb_subgroup,$mod_tb_subgroup_lang;
        $sql = "SELECT
        " . $mod_tb_subgroup . "_id as id,
        " . $mod_tb_subgroup . "_gid as gid,
        " . $mod_tb_subgroup_lang . "_subject as subject,
        " . $mod_tb_subgroup_lang . "_target as target,
        " . $mod_tb_subgroup_lang . "_url as url 
        FROM " . $mod_tb_subgroup . " 
        INNER JOIN " . $mod_tb_subgroup_lang . " ON " . $mod_tb_subgroup_lang . "_cid = " . $mod_tb_subgroup . "_id 
        WHERE " . $mod_tb_subgroup . "_masterkey = '" . $masterkey . "' 
        AND " . $mod_tb_subgroup_lang . "_language = '" . $lang . "' 
        AND " . $mod_tb_subgroup . "_gid = '" . $gid . "' 
        AND " . $mod_tb_subgroup . "_status != 'Disable' 
        ORDER BY " . $mod_tb_subgroup . "_order DESC
        ";

        $result = $dbConnect->execute($sql);
        return $result;
    }

    private function callContent($masterkey, $lang, $gid, $sgid){
        global $dbConnect,$mod_tb_root,$mod_tb_root_lang;
        $sql = "SELECT
        " . $mod_tb_root . "_id as id,
        " . $mod_tb_root . "_gid as gid,
        " . $mod_tb_root_lang . "_subject as subject,
        " . $mod_tb_root_lang . "_target as target,
        " . $mod_tb_root_lang . "_url as url 
        FROM " . $mod_tb_root . " 
        INNER JOIN " . $mod_tb_root_lang . " ON " . $mod_tb_root_lang . "_cid = " . $mod_tb_root . "_id 
        WHERE " . $mod_tb_root . "_masterkey = '" . $masterkey . "' 
        AND " . $mod_tb_root_lang . "_language = '" . $lang . "' 
        AND " . $mod_tb_root . "_gid = '" . $gid . "' 
        AND " . $mod_tb_root . "_sgid = '" . $sgid . "' 
        AND " . $mod_tb_root . "_status != 'Disable' 
        ORDER BY " . $mod_tb_root . "_order DESC
        ";

        $result = $dbConnect->execute($sql);
        return $result;
    }
}