<?php

class introPage extends controller
{
    public function load_intro()
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->urlAPI . "/setting";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->tokenAccess,
        ];
        $data = [
            "method" => "getIntro",
            "language" => $this->language,
        ];
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }
}