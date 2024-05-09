<?php

class HomePage extends controller
{
    const HOME_PATH = "/home";
    const CONTENT_TYPE_JSON = 'Content-Type: application/json';
    const AUTHORIZATION_HEADER = 'Authorization: Bearer ';
    
    public function loadTopgraphic()
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->urlAPI . self::HOME_PATH;
        $header = [
            self::CONTENT_TYPE_JSON,
            self::AUTHORIZATION_HEADER . $this->tokenAccess,
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
        
        $url = $this->urlAPI . self::HOME_PATH;
       $header = [
            self::CONTENT_TYPE_JSON,
            self::AUTHORIZATION_HEADER . $this->tokenAccess,
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

    public function loadPopup()
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->urlAPI . self::HOME_PATH;
       $header = [
            self::CONTENT_TYPE_JSON,
            self::AUTHORIZATION_HEADER . $this->tokenAccess,
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
        
        $url = $this->urlAPI . self::HOME_PATH;
       $header = [
            self::CONTENT_TYPE_JSON,
            self::AUTHORIZATION_HEADER . $this->tokenAccess,
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
        
        $url = $this->urlAPI . self::HOME_PATH;
       $header = [
            self::CONTENT_TYPE_JSON,
            self::AUTHORIZATION_HEADER . $this->tokenAccess,
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

    public function loadNews()
    {
        if (empty($this->tokenAccess)) {
            return false;
        }
        
        $url = $this->urlAPI . self::HOME_PATH;
       $header = [
            self::CONTENT_TYPE_JSON,
            self::AUTHORIZATION_HEADER . $this->tokenAccess,
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