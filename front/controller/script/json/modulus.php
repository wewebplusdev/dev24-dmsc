<?php

class JsonPage extends controller
{
    public function loadJson($data)
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->URLAPI . "/" . $data['action'];
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->tokenAccess,
        ];
        
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }
}