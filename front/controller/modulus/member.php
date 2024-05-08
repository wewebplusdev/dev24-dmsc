<?php

class Member {
    private $Token_timeout;
    private $Token_cookie_timeout;
    private $Token_action;

    const DATE_FORMAT = "Y:m:d H:i:s";


    public function __construct() {
        global T, $T, $T;
        $this->token_timeout = T;
        $this->T = $T;
        $this->T = $T;
    }

    public function tokenCreate() {

        $list = array();
        $list['ip'] = getip();
        $list['login_status'] = false;
        $list['actionfail'] = false;
        $list['start'] = date(self::DATE_FORMAT);
        $list['exp'] = $this->generateExp();
        $list['cookie_id'] = $_COOKIE['PHPSESSID'];
        $list['member_info'] = false;
        $list['url'] = _URL;
    
        return $this->tokenSave($list);
    }
    

    function tokenUpdate($array) {

        $_SESSION[_URL]['reboot'] = false;
        $tokenList = unserialize(decodeStr($_SESSION[_URL]["token"]));
        if ($tokenList['url'] == _URL) {
            foreach ($tokenList as $key => $value) {

                if (isset($array[$key])) {
                    switch ($key) {
                        case 'actionfail':
                            $tokenList[$key] = $tokenList[$key] + $array[$key];
                            break;

                        default:
                            $tokenList[$key] = $array[$key];
                            break;
                    }
                }
            }

            return $this->tokenSave($tokenList);
        }
    }

    function tokenCheck() {
        $tokenList = unserialize(decodeStr($_SESSION[_URL]["token"]));
        $dateNow = strtotime(date(self::DATE_FORMAT));
        $dateTokenExp = strtotime($tokenList['exp']);

        if ($tokenList['url'] != _URL) {
            $this->tokenClear();
        } else {
            if ($tokenList['actionfail'] >= $this->T) {
                $tokenList['login_status'] = false;
                $tokenList['msg'] = "TOKEN BLOCK WAIT " . $this->T . " HR.";
                $tokenList['codeerror'] = 1;
            } elseif ($dateTokenExp <= $dateNow) {
                $tokenList['login_status'] = false;
                $tokenList['start'] = date(self::DATE_FORMAT);
                $tokenList['exp'] = $this->generateExp();
                $tokenList['msg'] = "TOKEN EXPIRED";
                $tokenList['codeerror'] = 2;
            } else {

                $tokenList['exp'] = $this->generateExp();
                $tokenList['msg'] = false;
                $tokenList['codeerror'] = false;

                unset($tokenList['msg']);
                unset($tokenList['codeerror']);
            }

            return $this->tokenSave($tokenList);
        }
    }

    function tokenSave($token) {
        $setToken = encodeStr(serialize($token));
        $_SESSION[_URL]['token'] = $setToken;
        return $_SESSION[_URL]['token'];
    }

    function tokenGetUser() {
        return unserialize(decodeStr($_SESSION[_URL]["token"]));
    }

    function generateExp() {
        $timestamp = strtotime(date(self::DATE_FORMAT)) + 60 * $this->token_timeout;
        $time = date('Y:m:d H:i:s', $timestamp);
        return $time;
    }

    function codeerror() {
        $tokenList = unserialize(decodeStr($_SESSION[_URL]["token"]));
        return $tokenList['codeerror'];
    }

    function login_status() {
        $tokenList = unserialize(decodeStr($_SESSION[_URL]["token"]));
        return $tokenList['login_status'];
    }

    function tokenClear() {
        $_SESSION[_URL]['token'] = "";
        unset($_SESSION[_URL]['token']);
        $_SESSION[_URL]['reboot'] = true;
    
        setcookie("token", null, time() - ((60 * 60) * $this->T), "/", _URL, true, true);
        unset($_COOKIE['token']);
    
        if (!empty($_SESSION[_URL]['token']) || !empty($_COOKIE['token'])) {
            return false;
        } else {
            return TRUE;
        }
    }
    

    function saveCookie() {
        $setPut = $_SESSION[_URL]['token'];
        $tokenList = unserialize(decodeStr($_SESSION[_URL]["token"]));
        $setToken = setcookie("token", $setPut, time() + ((60 * 60) * $this->T), "/", _URL, true, true);
    
        if (!empty($tokenList['member_info']['md_mem_email'])) {
            $setEmailLast = setcookie("lastlogin", $tokenList['member_info']['md_mem_email'], time() + (86400 * 30), "/", _URL, true, true);
        }
    }
    
    function reloadUser() {
        $_SESSION[_URL]['reboot'] = false;
        $reloadToken = unserialize(decodeStr($_COOKIE['token']));
        if (!empty($reloadToken['member_info']) && !empty($reloadToken['login_status'])) {
            return $this->tokenSave($reloadToken);
        } else {
            $this->tokenCreate();
        }
    }

}
