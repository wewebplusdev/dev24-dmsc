<?php

class FeedPage extends Controller
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
        
        $url = $this->urlAPI . "/" . $data['action'];
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
        curl_setopt($request, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, 2);

        curl_setopt($request, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        
        $response = curl_exec($request);
        return $response;
    }
}