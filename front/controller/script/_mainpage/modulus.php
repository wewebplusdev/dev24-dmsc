<?php

class mainPage extends controller
{
    public $settingWeb;
    
    public function __construct()
    {
        parent::__construct();

        $settingWeb = self::load_setting_web();
        if ($settingWeb->code === 1001) {
            $this->settingWeb = $settingWeb->item;
        }
    }
    
    private function load_setting_web()
    {
        $url = self::_URL_API . "/setting";
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
}