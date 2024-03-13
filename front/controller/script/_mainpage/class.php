<?php
abstract class controller
{
    // const _URL_API = 'http://192.168.101.39:4040/service-api/v1';
    const _URL_API = 'http://192.168.1.101:4040/service-api/v1';
    public $token_access;
    public $language;

    public function __construct()
    {
        $this->token_access = $_COOKIE['web_token'] ? base64_decode($_COOKIE['web_token']) : '';
        $this->language = $_COOKIE['web_language'];

        // print_pre();
    }

    function search_engine($infoSetting, $title = '', $desc = '', $keyword = '', $pic = '')
    {
        global $smarty;

        $list = array();
        if (!empty($title)) {
            if (!empty($infoSetting->metatitle)) {
                $list_last = $infoSetting->metatitle;
            } elseif (!empty($infoSetting->subject)) {
                $list_last = $infoSetting->subject;
            } else {
                $list_last = 'Template Website';
            }

            $list['title'] = trim($title) . " - " . $list_last;
        } else {
            if (!empty($infoSetting->metatitle)) {
                $list['title'] = $infoSetting->metatitle;
            } elseif (!empty($infoSetting->subject)) {
                $list['title'] = $infoSetting->subject;
            } else {
                $list['title'] = 'Template Website';
            }
        }

        if (!empty($desc)) {
            $list['desc'] = trim($desc);
        } else {
            $list['desc'] = $infoSetting->description;
        }

        if (!empty($keyword)) {
            $list['keyword'] = trim($keyword);
        } else {
            $list['keyword'] = $infoSetting->keywords;
        }

        if (!empty($pic)) {
            $list['pic'] = $pic;
        } else {
            $list['pic'] = "";
        }
        $smarty->assign("seo", $list);
    }

    protected static function sendCURL($url, $header, $type, $data = NULL)
    {
        $request = curl_init();

        if ($header != NULL) {
            curl_setopt($request, CURLOPT_HTTPHEADER, $header);
        }

        curl_setopt($request, CURLOPT_URL, $url);
        curl_setopt($request, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);

        if (strtoupper($type) === 'POST') {
            curl_setopt($request, CURLOPT_POST, TRUE);
            curl_setopt($request, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($request, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        
        $response = curl_exec($request);
        if (!empty($response)) {
            $response = json_decode($response);
        }
        return $response;
    }
}
