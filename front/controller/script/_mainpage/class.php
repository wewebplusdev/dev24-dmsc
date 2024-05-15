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

        $this->setApiUrl($_CORE_ENV);

        $this->initializeMethodModule();

        $this->initializeMethodMasterkey();

        $this->processTokenAccess($url);
    }
    private function setApiUrl($_CORE_ENV)
        {
            if ($_CORE_ENV == 'DEV') {
                $this->urlAPI =  'http://192.168.101.249:4040/service-api/v1';
                $this->urlAPI =  'http://api.wewebplus.com:4040/service-api/v1';
            } elseif ($_CORE_ENV == 'PROD') {
                $this->urlAPI =  'http://192.168.200.146:4040/service-api/v1';
            } else {
                $this->urlAPI =  'http://api.wewebplus.com:4040/service-api/v1';
            }
        }

        private function initializeMethodModule()
{
    $this->medthodModule = [
        'detailAll' =>[
            'action' => 'news',
            'method_detail' => 'getNewsDetail',
            'method_group' => 'getNewsGroup',
            'method_list' => 'getNews',
        ],
        'downloadAll' =>[
            'action' => 'news',
            'method_detail' => 'getNewsDetail',
            'method_group' => 'getNewsGroup',
            'method_list' => 'getNews',
        ],
        'download' =>[
            'action' => 'news',
            'method_detail' => 'getNewsDetail',
            'method_group' => 'getNewsGroup',
            'method_list' => 'getNews',
        ],
        'listAll' =>[
            'action' => 'news',
            'method_detail' => 'getNewsDetail',
            'method_group' => 'getNewsGroup',
            'method_list' => 'getNews',
        ],
        'weblinkAll' =>[
            'action' => 'news',
            'method_detail' => 'getNewsDetail',
            'method_group' => 'getNewsGroup',
            'method_list' => 'getNews',
        ],
        'rss' =>[
            'action' => 'news',
            'method_detail' => 'getNewsDetail',
            'method_group' => 'getNewsGroup',
            'method_list' => 'getNews',
        ],
        'json' =>[
            'action' => 'news',
            'method_detail' => 'getNewsDetail',
            'method_group' => 'getNewsGroup',
            'method_list' => 'getNews',
        ],
        'downloadBook' =>[
            'action' => 'news',
            'method_detail' => 'getNewsDetail',
            'method_group' => 'getNewsGroup',
            'method_list' => 'getNews',
        ],
        'mobile-application' =>[
            'action' => 'news',
            'method_detail' => 'getNewsDetail',
            'method_group' => 'getNewsGroup',
            'method_list' => 'getNews',
        ],
        'searchAll' =>[
            'action' => 'search',
            'method_list' => 'getSearch',
        ],
        'contact' =>[
            'action' => 'agency',
            'method_list' => 'getAgency',
            'method_list_service' => 'getService',
        ],
    ];
}
       
private function initializeMethodMasterkey()
{
    $this->medthodMasterkey = [
        'sv' => [
            'action' => 'service',
            'services' => 'getService',
            'loadGroup' => 'getServiceGroup',
        ],
        'rein' => [
            'action' => 'innovation',
            'services' => 'getInnovation',
            'loadGroup' => 'getInnovationGroup',
        ],
        'faq' => [
            'action' => 'faq',
            'faq' => 'getFaq',
            'loadGroup' => 'getFaq',
        ],
    ];
}


        private function processTokenAccess($url)
        {
            try {
                $this->tokenAccess = isset($_COOKIE['web_token']) ? decodeStr($_COOKIE['web_token']) : '';
                $this->language = isset($url->pagelang[4]) ? $url->pagelang[4] : '';
                $this->tokenRevoke = isset($_COOKIE['tokenRevoke']) ? $_COOKIE['tokenRevoke'] : '';

                if (!empty($this->tokenAccess)) {
                    $this->handleTokenAccess();
                } else {
                    $this->handleAuthWebservice();
                }
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }

        private function handleTokenAccess()
{
    if (empty($this->tokenRevoke) || empty($_SESSION['settingWeb'])) {
        $this->handleCheckAuth();
    } else {
        $this->tokenRevoke = 1;
        $secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
        setcookie("tokenRevoke", 1, time() + 3600, "/", "", $secure, true);
    }
}


        private function handleCheckAuth()
        {
            $loadCheckAuth = self::loadCheckAuth();
            if ($loadCheckAuth->code === 1007) {
                $this->authenticateWebservice();
            } else {
                $this->tokenRevoke = 1;
                $secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
                setcookie("tokenRevoke", 1, time() + 3600, "/","",$secure, true);
            }
        }

        private function authenticateWebservice()
{
    $authWebservice = self::authWebservice();
    if ($authWebservice->code === 1001) {
        $secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
        setcookie("web_token", encodeStr($authWebservice->tokenid), $authWebservice->expire_at, "/", "", $secure, true);
        $this->revokeToken($authWebservice);
    }
}


    private function handleAuthWebservice()
    {
        $authWebservice = self::authWebservice();
        if ($authWebservice->code === 1001) {
            $secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
            setcookie("web_token", encodeStr($authWebservice->tokenid), $authWebservice->expire_at, "/", "", $secure, true);
            setcookie("tokenRevoke", 1, time() + 3600, "/", "", $secure, true);
            $this->revokeToken($authWebservice);
        }
    }


        public function searchEngine($infoSetting, $title = '', $desc = '', $keyword = '', $pic = '')
        {
            global $smarty;
        
            $list = array();
            $list['title'] = $this->generateTitle($infoSetting, $title);
            $list['desc'] = $this->generateDescription($infoSetting, $desc);
            $list['keyword'] = $this->generateKeywords($infoSetting, $keyword);
            $list['pic'] = $pic ?: '';
        
            $smarty->assign("seo", $list);
        }
        
        private function generateTitle($infoSetting, $title)
            {
                $list_last = !empty($infoSetting->metatitle) ? $infoSetting->metatitle : $infoSetting->subject;
                $list_last = !empty($list_last) ? $list_last : 'Template Website';

                $titlePrefix = !empty($title) ? trim($title) . " - " : '';

                return $titlePrefix . $list_last;
            }


        
        private function generateDescription($infoSetting, $desc)
        {
            return !empty($desc) ? trim($desc) : $infoSetting->description;
        }
        
        private function generateKeywords($infoSetting, $keyword)
        {
            return !empty($keyword) ? trim($keyword) : $infoSetting->keywords;
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
        return $this->sendCURL($url, $header, 'POST', json_encode($data));

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
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
        
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

            if (!empty($array_content)) {
                file_put_contents('./webservice_json/content_language_web.json', json_encode($array_content));
            }
            
        }
    }

    private function loadInsertLogs($req){
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
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }
    
    private function loadCheckAuth()
    {
        $url = $this->urlAPI . "/getuser";
        $header = [
            self::CONTENT_TYPE_JSON,
            self::AUTHORIZATION_HEADER . $this->tokenAccess,
        ];
        return $this->sendCURL($url, $header, 'POST', '');
       
    }

    protected static function sendCURL($url, $header, $type, $data = null)
    {
        $request = curl_init();
    
        if ($header != null) {
            curl_setopt($request, CURLOPT_HTTPHEADER, $header);
        }
    
        curl_setopt($request, CURLOPT_URL, $url);
        curl_setopt($request, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, 2);
    
        if (strtoupper($type) === 'POST') {
            curl_setopt($request, CURLOPT_POST, true);
            curl_setopt($request, CURLOPT_POSTFIELDS, $data);
        }
    
        curl_setopt($request, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        
        $response = curl_exec($request);
        return !empty($response) ? json_decode($response) : $response;
    }
    
}
