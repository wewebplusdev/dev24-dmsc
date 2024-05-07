<?php

class jsonPage extends controller
{
    public function load_json($data)
    {
        if (empty($this->token_access)) {
            return false;
        }
        
        $url = $this->URL_API . "/" . $data['action'];
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
        ];
        
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }
}