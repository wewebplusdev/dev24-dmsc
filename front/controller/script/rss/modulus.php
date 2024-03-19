<?php

class rssPage extends controller
{
    public function __construct()
    {
        // super class init
        parent::__construct();
    }

    public function load_rss($data, $method)
    {
        if (empty($this->token_access)) {
            return false;
        }
        
        $url = $this->URL_API . "/" . $method;
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
        ];
        
        $response = $this->sendCURL($url, $header, 'POST', json_encode($data));
        return $response;
    }
}