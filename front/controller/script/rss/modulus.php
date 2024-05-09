<?php

class rssPage extends controller
{
    public function load_rss($data)
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->urlAPI . "/" . $data['action'];
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->tokenAccess,
        ];
        
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }
}