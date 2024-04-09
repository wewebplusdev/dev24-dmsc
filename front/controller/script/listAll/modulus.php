<?php

class listAllPage extends controller
{
    public function __construct()
    {
        // super class init
        parent::__construct();
    }

    public function load_data($data)
    {
        if (empty($this->token_access)) {
            return false;
        }
        
        $url = $this->URL_API . "/news";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
        ];
        
        $response = $this->sendCURL($url, $header, 'POST', json_encode($data));
        return $response;
    }
}