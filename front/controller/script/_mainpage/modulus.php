<?php

class MainPage extends controller
{
    public $settingWeb;
    
    public function __construct()
    {
        // super class init
        parent::__construct();
        try {
            if ($this->tokenRevoke) {
                $settingWeb = self::loadSettingWeb();
                if ($settingWeb->code === 1001) {
                    $_SESSION['settingWeb'] = $settingWeb->item;
                    $this->settingWeb = $_SESSION['settingWeb'];
                }
            }
            // generate content_language_Web
            self::content_website($this->settingWeb->language_front, $this->settingWeb->language);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

    }

    private function loadSettingWeb()
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->urlAPI . "/setting";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->tokenAccess,
        ];
        $data = [
            "method" => "getWebSetting",
            "language" => $this->language,
        ];
        $response = $this->sendCURL($url, $header, 'POST', json_encode($data));
        return $response;
    }

    function loadPolicy()
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->urlAPI . "/setting";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->tokenAccess,
        ];
        $data = [
            "method" => "getPolicy",
            "language" => $this->language,
            "order" => "DESC",
            "page" => 1,
            "limit" => 15
        ];
        $response = $this->sendCURL($url, $header, 'POST', json_encode($data));
        return $response;
    }
}