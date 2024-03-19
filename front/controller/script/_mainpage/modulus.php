<?php

class mainPage extends controller
{
    public $settingWeb;
    
    public function __construct()
    {
        // super class init
        parent::__construct();
        try {
            if ($this->token_revoke) {
                $settingWeb = self::load_setting_web();
                if ($settingWeb->code === 1001) {
                    $_SESSION['settingWeb'] = $settingWeb->item;
                    $this->settingWeb = $_SESSION['settingWeb'];
                }
            }
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

    }

    private function load_setting_web()
    {
        if (empty($this->token_access)) {
            return false;
        }
        
        $url = $this->URL_API . "/setting";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
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
        if (empty($this->token_access)) {
            return false;
        }
        
        $url = $this->URL_API . "/setting";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
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