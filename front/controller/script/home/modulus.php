<?php

class homePage extends controller
{
    public function __construct()
    {
        // super class init
        parent::__construct();
    }
    
    public function load_topgraphic()
    {
        if (empty($this->token_access)) {
            return false;
        }
        
        $url = $this->URL_API . "/home";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
        ];
        $data = [
            "method" => "getTopgraphic",
            "language" => $this->language,
            "order" => 'DESC',
            "page" => 1,
            "limit" => 15,
        ];
        $response = $this->sendCURL($url, $header, 'POST', json_encode($data));
        return $response;
    }
    
    public function load_services()
    {
        if (empty($this->token_access)) {
            return false;
        }
        
        $url = $this->URL_API . "/home";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
        ];
        $data = [
            "method" => "getService",
            "language" => $this->language,
            "order" => 'DESC',
            "page" => 1,
            "limit" => 15,
        ];
        $response = $this->sendCURL($url, $header, 'POST', json_encode($data));
        return $response;
    }

    public function load_popup()
    {
        if (empty($this->token_access)) {
            return false;
        }
        
        $url = $this->URL_API . "/home";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
        ];
        $data = [
            "method" => "getPopup",
            "language" => $this->language,
            "order" => 'DESC',
            "page" => 1,
            "limit" => 15,
        ];
        $response = $this->sendCURL($url, $header, 'POST', json_encode($data));
        return $response;
    }
}