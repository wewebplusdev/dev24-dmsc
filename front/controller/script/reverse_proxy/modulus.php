<?php

class ReverseProxy extends Controller
{
    public function loadFetchApi($data, $controller)
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->urlAPI . "/" . $controller;
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->tokenAccess,
        ];
        
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }
}