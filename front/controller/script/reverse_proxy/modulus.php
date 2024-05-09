<?php

class reverse_proxy extends controller
{
    public function load_fetch_api($data, $controller)
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->URLAPI . "/" . $controller;
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->tokenAccess,
        ];
        
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }
}