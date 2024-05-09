<?php

class feedPage extends controller
{
    public function __construct()
    {
        // super class init
        parent::__construct();
    }

    public function load_data($data)
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->URLAPI . "/" . $data['action'];
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->tokenAccess,
        ];
        
        $response = $this->sendCURL($url, $header, 'POST', json_encode($data));
        return $response;
    }

    public function curXML($url)
    {
        $request = curl_init();
        curl_setopt($request, CURLOPT_URL, $url);
        curl_setopt($request, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($request, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        
        $response = curl_exec($request);
        return $response;
    }
}