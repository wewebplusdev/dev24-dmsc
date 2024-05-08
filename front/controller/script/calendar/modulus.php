<?php

class calendarPage extends controller
{
    public function load_data($data)
    {
        if (empty($this->token_access)) {
            return false;
        }
        
        $url = $this->URL_API . "/calendar";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token_access,
        ];
        
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }
}