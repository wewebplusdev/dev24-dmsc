<?php

class introPage extends controller
{
    public function load_intro()
    {
        if (empty($this->token_access)) {
            return false;
        }
        
        $url = $this->URL_API . "/setting";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
        ];
        $data = [
            "method" => "getIntro",
            "language" => $this->language,
        ];
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }
}