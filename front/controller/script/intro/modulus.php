<?php

class introPage extends controller
{
    public function __construct()
    {
        // super class init
        parent::__construct();
    }

    public function load_intro()
    {
        if (empty($this->token_access)) {
            return false;
        }
        
        $url = self::_URL_API . "/setting";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
        ];
        $data = [
            "method" => "getIntro",
            "language" => $this->language,
        ];
        $response = $this->sendCURL($url, $header, 'POST', json_encode($data));
        return $response;
    }
}