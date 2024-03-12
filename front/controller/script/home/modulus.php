<?php

class homePage extends controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function load_topgraphic()
    {
        $url = self::_URL_API . "/home";
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
}