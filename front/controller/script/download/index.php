<?php
$menuActive = "download";

$DownloadPage = new DownloadPage;

$contentid = $url->segment[1];
$masterkey = $url->segment[2];
$file_id = $url->segment[3];
switch ($url->segment[0]) {
    
    case 'special_case':
        // Handle special case
        break;
        
    case 'another_case':
        // Handle another case
        break;

    default:
        if (empty($contentid) || empty($masterkey) || empty($file_id)) {
            header('location:' . $linklang . "/home");
        }

        $req['gid'] = $_REQUEST['gid'];

        $data = [
            "action" => $DownloadPage->method_module[$menuActive]['action'],
            "method" => $DownloadPage->method_module[$menuActive]['method_list'],
            "language" => $DownloadPage->language,
            "order" => 'DESC',
            "page" => 1,
            "limit" => 1,
            "contentid" => $contentid,
            "file_id" => $file_id,
            "masterkey" => $masterkey,
        ];

        // call detail
        $loadData = $DownloadPage->loadData($data);
        if ($loadData->code == 1001) {
            $smarty->assign("load_data", $loadData);
        }
        if ($loadData->code != 1001 || (gettype($loadData->item[0]->attachment) != 'array' || count($loadData->item[0]->attachment) < 1)) {
            header('location:' . $linklang . "/home");
        }

        $filename = explode(".", $loadData->item[0]->attachment[0]->filename);
        $file_extension = $filename[count($filename) - 1];
        $file_name = $loadData->item[0]->attachment[0]->name ? $loadData->item[0]->attachment[0]->name : $loadData->item[0]->attachment[0]->filename;
        if ($file_extension == 'pdf' || $file_extension == 'PDF') {
            $action_type = "view";
        } else {
            $action_type = "download";
        }

        $path_file = fileinclude($loadData->item[0]->attachment[0]->filename, 'file', $loadData->item[0]->masterkey, 'other');
        if ($action_type == 'download') {
            if (file_exists($path_file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/' . $file_extension);
                header('Content-Disposition: attachment; filename="' . $file_name . '.' . $file_extension . '"');
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($path_file));
                ob_clean();
                ob_end_flush();
                $handle = fopen($path_file, "rb");
                while (!feof($handle)) {
                    echo fread($handle, 1000);
                }
            } else {
                echo "no have";
            }
            exit();
        } else {
            if ($file_extension == 'pdf' || $file_extension == "PDF") {
                header('Content-type:application/pdf');
                header('Content-disposition: inline; filename="' . $file_name . '.' . $file_extension . '"');
                header('content-Transfer-Encoding:binary');
                header('Accept-Ranges:bytes');
                @readfile($path_file);
            }
            else {
                if (file_exists($path_file)) {
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/' . $file_extension);
                    header('Content-Disposition: attachment; filename="' . $file_name . '.' . $file_extension . '"');
                    header('Content-Transfer-Encoding: binary');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($path_file));
                    ob_clean();
                    ob_end_flush();
                    $handle = fopen($path_file, "rb");
                    while (!feof($handle)) {
                        echo fread($handle, 1000);
                    }
                } else {
                    echo "no have";
                }
                exit();
            }
        }

        break;
}
