<?php

    define('SCRIPT_PATH', '/front/controller/script/');

/**
 * Description of url
 *
 * version 3.0
 *
 * @author Pandalittle CH
 */

class url
{
    public $url;
    public $parametter;
    public $segment;
    public $uri;
    public $pagelang;
    public $optionurl;
    public $rootDocument;
    public $rootDir;
    public $onFolder;
    public $onfolderType;
    public $onModulus;

    public $listfilemodulus = array("config.php", "modulus.php", "index.php");
    public $listcheckurl = array("");

    public function __construct()
    {
        global $url_show_lang, $lang_set, $lang_default, $url_show_default;
        $pathFirst = $this->onRoot();

        $this->rootDir = str_replace("\\", '/', dirname(__FILE__)); # _DIR
        $this->rootDocument = str_replace('//', '/', str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'] . "/" . $pathFirst));
        $this->url = end(explode($pathFirst, str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'])));

        define("_URL", _http . "://" . str_replace('//', '/', $_SERVER['HTTP_HOST'] . "/" . $this->onFolder) . "/");

        $urlall = explode("?", $this->url);
        $segment = cleanArray(explode('/', $urlall[0]));
        $this->segment = $segment;
        $this->onModulus = $segment['0'] ? $segment['0'] : $url_show_default;
        if (!empty($url_show_lang)) {
            if (isset($lang_set[$this->segment[0]])) {
                $this->pagelang = $lang_set[$this->segment[0]];
                array_splice($this->segment, 0, 1);
            } else {
                $this->pagelang = $lang_set[$lang_default];
                $urlNewDirect = str_replace('//', '/', "/" . $this->onFolder . "/" . $this->pagelang[2]);
                header("Location:" . $urlNewDirect);
                exit();
            }
        } else {
            if (!empty($_SESSION['pagelang'])) {
                $this->pagelang = $lang_set[$_SESSION['pagelang']];
            } else {
                $this->pagelang = $lang_set[$lang_default];
            }
        }

        foreach ($this->listcheckurl as $valueCheckurl) {
            if (!empty($this->segment[0]) && !empty($valueCheckurl)) {
                if (strpos($this->segment[0], $valueCheckurl) !== false) {
                    $listnewsegment = explode($valueCheckurl, $this->segment[0]);
                    $this->segment[0] = str_replace("-", "", $valueCheckurl);
                    foreach ($listnewsegment as $keyUrl => $valueUrl) {
                        if (!empty($valueUrl)) {
                            $this->optionurl[] = trim(str_replace("-", " ", urldecode($valueUrl)));
                        }
                    }
                }
            }
        }

        if (!empty($urlall[1])) {
            $this->parametter = $urlall[1];
            $uri_frist = cleanArray(explode('&', $urlall[1]));
            foreach ($uri_frist as $xuri) {
                $thum = explode('=', $xuri, 2);
                if (count($thum) == 2 && trim($thum[0]) != "") {
                    $uri[trim($thum[0])] = trim($thum[1]);
                }
            }
            $this->uri = $uri;
        }
    }

    public function onRoot()
    {
        $onDir = end(explode("/", _DIR));
        $onBase = end(explode("/", $_SERVER['DOCUMENT_ROOT']));

        if ($onDir != $onBase) {
            $this->onFolder = $onDir;
            $this->onfolderType = 'in folder';
            $trimPath = $onDir;
        } else {
            $this->onFolder = '';
            $this->onfolderType = 'out site folder';
            $trimPath = $onBase;
        }
        return $trimPath;
    }

    public function page()
    {
        $folderpage = _DIR . SCRIPT_PATH . $this->segment[0] . "/";
        if (file_exists($folderpage)) {
            $statuspage = $this->checkpagefile($folderpage);
            if (!empty($statuspage)) {

                $loderpage['pagename'] = $this->segment[0];
                $loderpage['load'][] = $folderpage . "lang/" . $this->pagelang[2] . ".php";
                foreach ($this->listfilemodulus as $value) {
                    $loderpage['load'][] = $folderpage . $value;
                }
                return $loderpage;
            } else {
                return $this->setpagedefault();
            }
        } else {
            return $this->setpagedefault();
        }
    }

    public function setpagedefault()
    {
        global $url_show_default;
        if (!empty($this->segment[0])) {
            $path = _DIR . '/front/controller/script/404';
            $loderpage['pagename'] = '404';
            $loderpage['load'][] = $path . "/lang/" . $this->pagelang[2] . ".php";
            foreach ($this->listfilemodulus as $value) {
                $loderpage['load'][] = $path . "/" . $value;
            }
        } else {
            $path = _DIR . SCRIPT_PATH . $url_show_default;
            $loderpage['pagename'] = $url_show_default;
            $loderpage['load'][] = $path . "/lang/" . $this->pagelang[2] . ".php";
            foreach ($this->listfilemodulus as $value) {
                $loderpage['load'][] = $path . "/" . $value;
            }
        }
        return $loderpage;
    }

    public function checkpagefile($page)
    {
        foreach ($this->listfilemodulus as $value) {
            $thischeckfile = file_exists($page . $value);
            if (empty($thischeckfile)) {
                return false;
            }
        }
        return true;
    }

    public function loadmodulus($array)
    {
        $listfile = array("config.php", "class.php", "modulus.php", "index.php");
        $loderpage = array();
        foreach ($array as $value) {
            $path = _DIR . SCRIPT_PATH . $value . "/";

            foreach ($listfile as $isfile) {
                $loderpage[] = $path . $isfile;
            }
        }
        return $loderpage;
    }
}
