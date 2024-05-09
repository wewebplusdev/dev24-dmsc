<?php

class homePage extends controller
{
    public function load_topgraphic()
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->URLAPI . "/home";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->tokenAccess,
        ];
        $data = [
            "method" => "getTopgraphic",
            "language" => $this->language,
            "order" => 'DESC',
            "page" => 1,
            "limit" => 15,
        ];
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }
    
    public function load_services()
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->URLAPI . "/home";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->tokenAccess,
        ];
        $data = [
            "method" => "getService",
            "language" => $this->language,
            "order" => 'DESC',
            "page" => 1,
            "limit" => 15,
        ];
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }

    public function load_popup()
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->URLAPI . "/home";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->tokenAccess,
        ];
        $data = [
            "method" => "getPopup",
            "language" => $this->language,
            "order" => 'DESC',
            "page" => 1,
            "limit" => 15,
        ];
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }

    public function load_innovation()
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->URLAPI . "/home";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->tokenAccess,
        ];
        $data = [
            "method" => "getInnovationGroup",
            "language" => $this->language,
            "order" => 'DESC',
            "page" => 1,
            "limit" => 15,
        ];
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }

    public function load_about()
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->URLAPI . "/home";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->tokenAccess,
        ];
        $data = [
            "method" => "getAbout",
            "language" => $this->language,
            "order" => 'DESC',
            "page" => 1,
            "limit" => 15,
        ];
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }

    public function load_news()
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->URLAPI . "/home";
        $header = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->tokenAccess,
        ];
        $data = [
            "method" => "getNews",
            "language" => $this->language,
            "order" => 'DESC',
            "page" => 1,
            "limit" => 15,
        ];
        return $this->sendCURL($url, $header, 'POST', json_encode($data));
    }
}