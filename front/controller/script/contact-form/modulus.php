<?php

class ContactPage extends Controller
{
    public function loadData($data)
    {
         
        if (empty($this->tokenAccess)) {
            return false;
        }
       
        $url = $this->urlAPI . "/" . $data['action'];
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->tokenAccess,
        ];
        // printPre($data);
        // printPre($url);
        // die;
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }
}