<?php

class mainPage extends controller
{
    public $settingWeb;
    
    public function __construct()
    {
        // super class init
        parent::__construct();
        try {
            if ($this->tokenRevoke) {
                $settingWeb = self::load_setting_web();
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

    private function load_setting_web()
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->URLAPI . "/setting";
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

    function load_policy()
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->URLAPI . "/setting";
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