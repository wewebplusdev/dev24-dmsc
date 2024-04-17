<?php
abstract class controller
{
    const _APP_TOKEN = 'website-token-api';
    const _APP_USER = 'dmsc-website-api';
    const _APP_SERCRET = 'M0y0HTyOrPOjMJ10q2yZp21vM2I0I2xtrRAjH21Aq0EZG20WewEb2SM2k0pzy1rPMjnJ1jq2SZYJ1yM3E0nJymrTWjMJ13ql1ZL21mM210MTyCrQ9jrJ1yq2gZqT1yM3W0L2yyrUZWewEb3Q';
    public $token_access;
    public $language;
    public $token_revoke;
    public $URL_API;
    public $method_masterkey;

    public function __construct()
    {
        global $url, $_CORE_ENV;

        if ($_CORE_ENV == 'DEV') {
            // $this->URL_API = 'http://192.168.101.39:4040/service-api/v1';
            $this->URL_API = 'http://192.168.1.102:4040/service-api/v1';
            // $this->URL_API = 'http://192.168.1.101:4040/service-api/v1';
        }else if($_CORE_ENV == 'PROD'){
            $this->URL_API = 'http://13.229.72.11:4040/service-api/v1';
        }else{
            $this->URL_API = 'http://192.168.101.43:4040/service-api/v1';
        }

        $this->method_masterkey = array(
            'nw' => array(
                'action' => 'news',
                'download' => 'getNews',
                'loadGroup' => 'getNewsGroup',
                'listAll' => 'getNews',
                'detailAll' => 'getNewsDetail',
            ),
            'cal' => array(
                'action' => 'calendar',
                'download' => 'getCalendarDetail',
                'listAll' => 'getCalendar',
                'detailAll' => 'getCalendarDetail',
            ),
            'lar' => array(
                'action' => 'laws',
                'download' => 'getLaws',
                'loadGroup' => 'getLawsGroup',
                'downloadAll' => 'getLaws',
                // 'listAll' => 'getLaws',
                'detailAll' => 'getLawsDetail',
            ),
            'nwa' => array(
                'action' => 'announcer',
                'download' => 'getAnnouncer',
                'loadGroup' => 'getAnnouncerGroup',
                'listAll' => 'getAnnouncer',
                'detailAll' => 'getAnnouncerDetail',
            ),
        );


        try {
            $this->token_access = $_COOKIE['web_token'] ? decodeStr($_COOKIE['web_token']) : '';
            $this->language = $url->pagelang[4];
            $this->token_revoke = $_COOKIE['token_revoke'] ? $_COOKIE['token_revoke'] : '';
            if (!empty($this->token_access)) {
                // revoke token
                if (empty($this->token_revoke) || empty($_SESSION['settingWeb'])) {
                    $load_check_auth = self::load_check_auth();
                    if ($load_check_auth->code === 1007) {
                        // authentication token
                        $auth_webservice = self::auth_webservice();
                        if ($auth_webservice->code === 1001) {
                            setcookie("web_token", encodeStr($auth_webservice->tokenid), ($auth_webservice->expire_at), "/");
                            setcookie("token_revoke", 1, time() + (3600), "/"); // life time 1 hour
                            self::revoke_token($auth_webservice);
                        }
                    }else{
                        setcookie("token_revoke", 1, time() + (3600), "/"); // life time 1 hour
                        $this->token_revoke = 1;
                    }
                }
            }else{
                // authentication token
                $auth_webservice = self::auth_webservice();
                if ($auth_webservice->code === 1001) {
                    setcookie("web_token", encodeStr($auth_webservice->tokenid), ($auth_webservice->expire_at), "/");
                    setcookie("token_revoke", 1, time() + (3600), "/"); // life time 1 hour
                    self::revoke_token($auth_webservice);
                }
            }
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
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

    private function revoke_token($auth_webservice){
        global $url;
        $this->token_access = $auth_webservice->tokenid;
        $this->language = $url->pagelang[4];
        $this->token_revoke = 1;
    }

    private function auth_webservice(){
        $url = $this->URL_API . "/gettoken";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
        ];
        $data = [
            "apptoken" => self::_APP_TOKEN,
            "user" => self::_APP_USER,
            "secretkey" => self::_APP_SERCRET,
        ];
        $response = $this->sendCURL($url, $header, 'POST', json_encode($data));
        return $response;
    }

    function load_insert_logs($req){
        $url = $this->URL_API . "/setting";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
        ];
        $data = [
            "user" => self::_APP_USER,
            "secretkey" => self::_APP_SERCRET,
            "method" => $req['method'],
            "browser" => $req['browser'],
            "uniqid" => $req['uniqid'],
        ];
        $response = $this->sendCURL($url, $header, 'POST', json_encode($data));
        return $response;
    }

    private function load_check_auth()
    {
        $url = $this->URL_API . "/getuser";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
        ];
        $response = $this->sendCURL($url, $header, 'POST', '');
        return $response;
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
