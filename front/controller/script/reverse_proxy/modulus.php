<?php

class reverse_proxy extends controller
{
    public function load_fetch_api($data, $controller)
    {
        if (empty($this->token_access)) {
            return false;
        }
        
        $url = $this->URL_API . "/" . $controller;
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
        ];
        
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }
}