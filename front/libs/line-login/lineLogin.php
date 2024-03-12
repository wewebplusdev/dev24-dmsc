<?php
require_once _DIR . '/front/libs/function.php'; #load function

class LineLogin
{
    #### change your id
    // line login
    private const CLIENT_ID = '2000810221';
    private const CLIENT_SECRET = '3e8ec5829b6a5bdd9868ad46b08028d4';
    // line OA
    private const CLIENT_ID_OA = '2001756143';
    private const CLIENT_SECRET_OA = '74475741a308a01ea04abfe90bd8cd86';

    private const _URL_LOCALHOST = 'localhost';
    private const _URL_STAGING= 'mommy.jairak.co';
    private const _URL_PROD = 'mommycleanfood.com';

    private const REDIRECT_URL_LOCALHOST = 'https://'.self::_URL_LOCALHOST.'/mommy/callback/callback-line-login';
    private const REDIRECT_URL_LOCALHOST_DOCKER = 'http://'.self::_URL_LOCALHOST.':7070/mommy/callback/callback-line-login';
    private const REDIRECT_URL_STAGING = 'https://'.self::_URL_STAGING.'/callback/callback-line-login';
    private const REDIRECT_URL_PROD = 'https://'.self::_URL_PROD.'/callback/callback-line-login';

    private const AUTH_URL = 'https://access.line.me/oauth2/v2.1/authorize';
    private const PROFILE_URL = 'https://api.line.me/v2/profile';
    private const TOKEN_URL = 'https://api.line.me/oauth2/v2.1/token';
    private const REVOKE_URL = 'https://api.line.me/oauth2/v2.1/revoke';
    private const VERIFYTOKEN_URL = 'https://api.line.me/oauth2/v2.1/verify';
    private const URL_OAUTH_ACCESS_TOKEN = 'https://api.line.me/v2/oauth/accessToken';
    private const API_PUSH = 'https://api.line.me/v2/bot/message/push';
    private const API_REPLY = 'https://api.line.me/v2/bot/message/reply';

    function getLink()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['state_line_login'] = hash('sha256', $_SERVER['REMOTE_ADDR']);
      
        if (_URL == 'https://localhost/mommy/') {
            $link = self::AUTH_URL . '?response_type=code&client_id=' . self::CLIENT_ID . '&redirect_uri=' . self::REDIRECT_URL_LOCALHOST . '&scope=profile%20openid%20email&state=' . $_SESSION['state_line_login'];
        } else if(_URL == 'http://localhost:7070/mommy/'){
            $link = self::AUTH_URL . '?response_type=code&client_id=' . self::CLIENT_ID . '&redirect_uri=' . self::REDIRECT_URL_LOCALHOST_DOCKER . '&scope=profile%20openid%20email&state=' . $_SESSION['state_line_login'];
        } else if(_URL == 'https://mommycleanfood.com/main-branch/'){
            $link = self::AUTH_URL . '?response_type=code&client_id=' . self::CLIENT_ID . '&redirect_uri=' . self::REDIRECT_URL_PROD . '&scope=profile%20openid%20email&state=' . $_SESSION['state_line_login'];
        } else {
            $link = self::AUTH_URL . '?response_type=code&client_id=' . self::CLIENT_ID . '&redirect_uri=' . self::REDIRECT_URL_STAGING . '&scope=profile%20openid%20email&state=' . $_SESSION['state_line_login'];
        }

        return $link;
    }

    function refresh($token)
    {
        $header = ['Content-Type: application/x-www-form-urlencoded'];
        $data = [
            "grant_type" => "refresh_token",
            "refresh_token" => $token,
            "client_id" => self::CLIENT_ID,
            "client_secret" => self::CLIENT_SECRET
        ];

        $response = $this->sendCURL(self::TOKEN_URL, $header, 'POST', $data);
        return json_decode($response);
    }

    function token($code, $state)
    {
        if ($_SESSION['state_line_login'] != $state) {
            header('location:' . _URL . 'home');
        }
        
        $header = ['Content-Type: application/x-www-form-urlencoded'];

        if (_URL == 'https://localhost/mommy/') {
            $data = [
                "grant_type" => "authorization_code",
                "code" => $code,
                "redirect_uri" => self::REDIRECT_URL_LOCALHOST,
                "client_id" => self::CLIENT_ID,
                "client_secret" => self::CLIENT_SECRET
            ];
        }else if (_URL == 'http://localhost:7070/mommy/') {
            $data = [
                "grant_type" => "authorization_code",
                "code" => $code,
                "redirect_uri" => self::REDIRECT_URL_LOCALHOST_DOCKER,
                "client_id" => self::CLIENT_ID,
                "client_secret" => self::CLIENT_SECRET
            ];
        }else if (_URL == 'https://mommycleanfood.com/main-branch/') {
            $data = [
                "grant_type" => "authorization_code",
                "code" => $code,
                "redirect_uri" => self::REDIRECT_URL_PROD,
                "client_id" => self::CLIENT_ID,
                "client_secret" => self::CLIENT_SECRET
            ];
        } else {
            $data = [
                "grant_type" => "authorization_code",
                "code" => $code,
                "redirect_uri" => self::REDIRECT_URL_STAGING,
                "client_id" => self::CLIENT_ID,
                "client_secret" => self::CLIENT_SECRET
            ];
        }

        $response = $this->sendCURL(self::TOKEN_URL, $header, 'POST', $data);
        return json_decode($response);
    }

    function profileFormIdToken($token = null)
    {
        $payload = explode('.', $token->id_token);
        $ret = array(
            'access_token' => $token->access_token,
            'refresh_token' => $token->refresh_token,
            'name' => '',
            'picture' => '',
            'email' => ''
        );

        if (count($payload) == 3) {
            $data = json_decode(base64_decode($payload[1]));
            if (isset($data->name))
                $ret['name'] = $data->name;

            if (isset($data->picture))
                $ret['picture'] = $data->picture;

            if (isset($data->email))
                $ret['email'] = $data->email;
        }
        return (object) $ret;
    }

    function profile($token)
    {
        $header = ['Authorization: Bearer ' . $token];
        $response = $this->sendCURL(self::PROFILE_URL, $header, 'GET');
        return json_decode($response);
    }

    function verify($token)
    {
        $url = self::VERIFYTOKEN_URL . '?access_token=' . $token;
        $response = $this->sendCURL($url, NULL, 'GET');
        return $response;
    }

    function getTokenForChanal()
    {
        $data = [
            "grant_type" => "client_credentials",
            "client_id" => self::CLIENT_ID_OA,
            "client_secret" => self::CLIENT_SECRET_OA
        ];
        $url = self::URL_OAUTH_ACCESS_TOKEN;
        $response = $this->sendCURL($url, NULL, 'POST', $data);
        return $response;
    }

    function revoke($token)
    {
        $header = ['Content-Type: application/x-www-form-urlencoded'];
        $data = [
            "access_token" => $token,
            "client_id" => self::CLIENT_ID,
            "client_secret" => self::CLIENT_SECRET
        ];
        $response = $this->sendCURL(self::REVOKE_URL, $header, 'POST', $data);
        return $response;
    }

    function pushMsg($header, $data)
    {
        $url = self::API_PUSH;
        $response = $this->sendCURLMsg($url, $header, 'POST', $data);
        return $response;
    }

    private function sendCURL($url, $header, $type, $data = NULL)
    {

        $request = curl_init();

        if ($header != NULL) {
            curl_setopt($request, CURLOPT_HTTPHEADER, $header);
        }

        curl_setopt($request, CURLOPT_URL, $url);
        curl_setopt($request, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);

        if (strtoupper($type) === 'POST') {
            curl_setopt($request, CURLOPT_POST, TRUE);
            curl_setopt($request, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        curl_setopt($request, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($request);
        return $response;
    }
    
    private function sendCURLMsg($url, $header, $type, $data = NULL)
    {

        $request = curl_init();

        if ($header != NULL) {
            curl_setopt($request, CURLOPT_HTTPHEADER, $header);
        }

        curl_setopt($request, CURLOPT_URL, $url);
        curl_setopt($request, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);

        if (strtoupper($type) === 'POST') {
            curl_setopt($request, CURLOPT_POST, TRUE);
            curl_setopt($request, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($request, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($request);
        return $response;
    }
}
