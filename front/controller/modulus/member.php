<?php

class Member {

    private $tokenTimeout;
    private $tokenCookieTimeout;
    private $tokenAction;
    const DATE_FORMAT = "Y:m:d H:i:s";

    public function __construct() {
        global $tokenTimeout, $tokenCookieTimeout, $tokenAction;
        $this->tokenTimeout = $tokenTimeout;
        $this->tokenCookieTimeout = $tokenCookieTimeout;
        $this->tokenAction = $tokenAction;
    }

   public function tokenCreate() {

        $list = array();
        $list['ip'] = getip();
        $list['loginStatus'] = false;
        $list['actionfail'] = false;
        $list['start'] = date(self::DATE_FORMAT);
        $list['exp'] = $this->generateExp();
        $list['cookie_id'] = $_COOKIE['PHPSESSID'];
        $list['member_info'] = false;
        $list['url'] = _URL;

        return $this->tokenSave($list);
    }

    public function tokenUpdate($array) {

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

    public function tokenCheck() {
        $tokenList = unserialize(decodeStr($_SESSION[_URL]["token"]));
        $dateNow = strtotime(date(self::DATE_FORMAT));
        $dateTokenExp = strtotime($tokenList['exp']);

        if ($tokenList['url'] != _URL) {
            $this->tokenClear();
        } else {
            if ($tokenList['actionfail'] >= $this->tokenAction) {
                $tokenList['loginStatus'] = false;
                $tokenList['msg'] = "TOKEN BLOCK WAIT " . $this->tokenCookieTimeout . " HR.";
                $tokenList['codeerror'] = 1;
            } elseif ($dateTokenExp <= $dateNow) {
                $tokenList['loginStatus'] = false;
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

    public function tokenSave($token) {
        $setToken = encodeStr(serialize($token));
        $_SESSION[_URL]['token'] = $setToken;
        return $_SESSION[_URL]['token'];
    }

    public function tokenGetUser() {
        return unserialize(decodeStr($_SESSION[_URL]["token"]));
    }

    public function generateExp() {
        $timestamp = strtotime(date(self::DATE_FORMAT)) + 60 * $this->token_timeout;
        $time = date(self::DATE_FORMAT, $timestamp);
        return $time;
    }

    public function codeerror() {
        $tokenList = unserialize(decodeStr($_SESSION[_URL]["token"]));
        return $tokenList['codeerror'];
    }

    public function loginStatus() {
        $tokenList = unserialize(decodeStr($_SESSION[_URL]["token"]));
        return $tokenList['loginStatus'];
    }

    public function tokenClear() {
        $_SESSION[_URL]['token'] = "";
        unset($_SESSION[_URL]['token']);
        $_SESSION[_URL]['reboot'] = true;

        setcookie("token", null, time() - ((60 * 60) * $this->tokenCookieTimeout), "/", false);
        unset($_COOKIE['token']);

        if (!empty($_SESSION[_URL]['token']) || !empty($_COOKIE['token'])) {
            return false;
        } else {
            return true;
        }
    }

    public function saveCookie() {
        $setPut = $_SESSION[_URL]['token'];
        $tokenList = unserialize(decodeStr($_SESSION[_URL]["token"]));
        $setToken = setcookie("token", $setPut, time() + ((60 * 60) * $this->tokenCookieTimeout), "/", _URL, true);

        if (!empty($tokenList['member_info']['md_mem_email'])) {
            $setEmailLast = setcookie("lastlogin", $tokenList['member_info']['md_mem_email'], time() + (86400 * 30));
        }
    }

    public function reloadUser() {
        $_SESSION[_URL]['reboot'] = false;
        $reloadToken = unserialize(decodeStr($_COOKIE['token']));
        if (!empty($reloadToken['member_info']) && !empty($reloadToken['loginStatus'])) {
            return $this->tokenSave($reloadToken);
        } else {
            $this->tokenCreate();
        }
    }

}
