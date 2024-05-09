<?php
abstract class Controller
{
    const APP_TOKEN = 'website-token-api';
    const APP_API = 'dmsc-website-api';
    const APP_SECRET = 'M0y0HTyOrPOjMJ10q2yZp21vM2I0I2xtrRAjH21Aq0EZG20WewEb2SM2k0pzy1rPMjnJ1jq2SZYJ1yM3E0nJymrTWjMJ13ql1ZL21mM210MTyCrQ9jrJ1yq2gZqT1yM3W0L2yyrUZWewEb3Q';

    const CONTENT_TYPE_JSON = 'Content-Type: application/json';
    const AUTHORIZATION_HEADER = 'Authorization: Bearer ';


    
    public $recaptchaSitekey = "6LfqEYMpAAAAAIOLmCvCSh8rgF915x9GUHxOnYF6";
    public $recaptchaSecretkey = "6LfqEYMpAAAAAGw5Uoe0QEB84FWSHU1Qa89ewGlT";
    public $tokenAccess;
    public $language;
    public $tokenRevoke;
    public $urlAPI;
    public $medthodMasterkey;
    public $medthodModule;

    public function __construct()
    {
        global $url, $_CORE_ENV;

        if ($_CORE_ENV == 'DEV') {
            $this->urlAPI =  'http://192.168.101.249:4040/service-api/v1';
        }elseif($_CORE_ENV == 'PROD'){
            $this->urlAPI =  'http://192.168.200.146:4040/service-api/v1';
        }else{
            $this->urlAPI =  'http://api.wewebplus.com:4040/service-api/v1';
        }

        $this->medthodModule = array(
            'detailAll' => array(
                'action' => 'news',
                'method_detail' => 'getNewsDetail',
                'method_group' => 'getNewsGroup',
                'method_list' => 'getNews',
            ),
            'downloadAll' => array(
                'action' => 'news',
                'method_detail' => 'getNewsDetail',
                'method_group' => 'getNewsGroup',
                'method_list' => 'getNews',
            ),
            'download' => array(
                'action' => 'news',
                'method_detail' => 'getNewsDetail',
                'method_group' => 'getNewsGroup',
                'method_list' => 'getNews',
            ),
            'listAll' => array(
                'action' => 'news',
                'method_detail' => 'getNewsDetail',
                'method_group' => 'getNewsGroup',
                'method_list' => 'getNews',
            ),
            'weblinkAll' => array(
                'action' => 'news',
                'method_detail' => 'getNewsDetail',
                'method_group' => 'getNewsGroup',
                'method_list' => 'getNews',
            ),
            'rss' => array(
                'action' => 'news',
                'method_detail' => 'getNewsDetail',
                'method_group' => 'getNewsGroup',
                'method_list' => 'getNews',
            ),
            'json' => array(
                'action' => 'news',
                'method_detail' => 'getNewsDetail',
                'method_group' => 'getNewsGroup',
                'method_list' => 'getNews',
            ),
            'downloadBook' => array(
                'action' => 'news',
                'method_detail' => 'getNewsDetail',
                'method_group' => 'getNewsGroup',
                'method_list' => 'getNews',
            ),
            'mobile-application' => array(
                'action' => 'news',
                'method_detail' => 'getNewsDetail',
                'method_group' => 'getNewsGroup',
                'method_list' => 'getNews',
            ),
            'searchAll' => array(
                'action' => 'search',
                'method_list' => 'getSearch',
            ),
            'contact' => array(
                'action' => 'agency',
                'method_list' => 'getAgency',
                'method_list_service' => 'getService',
            ),
        );

        $this->medthodMasterkey = array(
            'sv' => array(
                'action' => 'service',
                'services' => 'getService',
                'loadGroup' => 'getServiceGroup',
            ),
            'rein' => array(
                'action' => 'innovation',
                'services' => 'getInnovation',
                'loadGroup' => 'getInnovationGroup',
            ),
            'faq' => array(
                'action' => 'faq',
                'faq' => 'getFaq',
                'loadGroup' => 'getFaq',
            ),
        );


        try {
            $this->tokenAccess = $_COOKIE['web_token'] ? decodeStr($_COOKIE['web_token']) : '';
            $this->language = $url->pagelang[4];
            $this->tokenRevoke = $_COOKIE['tokenRevoke'] ? $_COOKIE['tokenRevoke'] : '';
            if (!empty($this->tokenAccess)) {
                // revoke token
                if (empty($this->tokenRevoke) || empty($_SESSION['settingWeb'])) {
                    $loadCheckAuth = self::loadCheckAuth();
                    if ($loadCheckAuth->code === 1007) {
                        // authentication token
                        $authWebservice = self::authWebservice();
                        if ($authWebservice->code === 1001) {
                            setcookie("web_token", encodeStr($authWebservice->tokenid), ($authWebservice->expire_at), "/", false);
                            setcookie("tokenRevoke", 1, time() + (3600), "/", false); // life time 1 hour
                            self::revokeToken($authWebservice);
                        }
                    }else{
                        setcookie("tokenRevoke", 1, time() + (3600), "/", false); // life time 1 hour
                        $this->tokenRevoke = 1;
                    }
                }
            }else{
                // authentication token
                $authWebservice = self::authWebservice();
                if ($authWebservice->code === 1001) {
                    setcookie("web_token", encodeStr($authWebservice->tokenid), ($authWebservice->expire_at), "/", false);
                    setcookie("tokenRevoke", 1, time() + (3600), "/", false); // life time 1 hour
                    self::revokeToken($authWebservice);

                }
            }
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function searchEngine($infoSetting, $title = '', $desc = '', $keyword = '', $pic = '')
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
    
    public function loadUrlRedirect($req)
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->urlAPI . "/api";
        $header = [
            self::CONTENT_TYPE_JSON,
            self::AUTHORIZATION_HEADER . $this->tokenAccess,
        ];
        $data = [
            "method" => "loadRedirect",
            "table" => $req['table'],
            "masterkey" => $req['masterkey'],
            "id" => $req['id'],
            "language" => $req['language'],
            "action" => $req['action'],
            "download" => $req['download'],
            "view" => $req['view'],
            "urlc2" => $req['urlc2'],
        ];
        $response = $this->sendCURL($url, $header, 'POST', json_encode($data));
        return $response;
    }

    private function revokeToken($authWebservice){
        global $url;
        $this->tokenAccess = $authWebservice->tokenid;
        $this->language = $url->pagelang[4];
        $this->tokenRevoke = 1;
    }

    private function authWebservice(){
        $url = $this->urlAPI . "/gettoken";
        $header = [
            self::CONTENT_TYPE_JSON,
            self::AUTHORIZATION_HEADER . $this->tokenAccess,
        ];
        $data = [
            "apptoken" => self::APP_TOKEN,
            "user" => self::APP_API,
            "secretkey" => self::APP_SECRET,
        ];
        $response = $this->sendCURL($url, $header, 'POST', json_encode($data));
        return $response;
    }

    public function contentWebsite($content, $language){
        if (gettype($content) == 'object' && count((array)$content) > 0) {
            $array_content = array();
            foreach ($content as $keycontent => $valuecontent) {
                $array_content[$keycontent]['type'] = $valuecontent->type;
                
                foreach ($language as $valuelanguage) {
                    $current_lang = $valuelanguage->subject;
                    $array_content[$keycontent]['display'][$valuelanguage->short] = $valuecontent->display->$current_lang;
                }
            }

            if (count($array_content) > 0) {
                file_put_contents('./webservice_json/content_language_web.json', json_encode($array_content));
            }
        }
    }

    function loadInsertLogs($req){
        $url = $this->urlAPI . "/setting";
        $header = [
            self::CONTENT_TYPE_JSON,
            self::AUTHORIZATION_HEADER . $this->tokenAccess,
        ];
        $data = [
            "user" => self::APP_API,
            "secretkey" => self::APP_SECRET,
            "method" => $req['method'],
            "browser" => $req['browser'],
            "uniqid" => $req['uniqid'],
        ];
        $response = $this->sendCURL($url, $header, 'POST', json_encode($data));
        return $response;
    }

    private function loadCheckAuth()
    {
        $url = $this->urlAPI . "/getuser";
        $header = [
            self::CONTENT_TYPE_JSON,
            self::AUTHORIZATION_HEADER . $this->tokenAccess,
        ];
        $response = $this->sendCURL($url, $header, 'POST', '');
        return $response;
    }

    protected static function sendCURL($url, $header, $type, $data = null)
    {
        $request = curl_init();

        if ($header != null) {
            curl_setopt($request, CURLOPT_HTTPHEADER, $header);
        }

        curl_setopt($request, CURLOPT_URL, $url);
        curl_setopt($request, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);

        if (strtoupper($type) === 'POST') {
            curl_setopt($request, CURLOPT_POST, true);
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
