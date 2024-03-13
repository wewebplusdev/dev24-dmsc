<?php

class pageredirectage extends controller
{
    public function __construct()
    {
        // super class init
        parent::__construct();
    }

    public function load_url_redirect($req)
    {
        if (empty($this->token_access)) {
            return false;
        }
        
        $url = self::_URL_API . "/api";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
        ];
        $data = [
            "method" => "loadRedirect",
            "table" => $req['table'],
            "masterkey" => $req['masterkey'],
            "id" => $req['id'],
            "language" => $req['language'],
            "action" => $req['action'],
        ];
        $response = $this->sendCURL($url, $header, 'POST', json_encode($data));
        return $response;
    }
}