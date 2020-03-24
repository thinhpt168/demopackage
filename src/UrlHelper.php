<?php

namespace demopackage\UrlHelper;
class UrlHelper
{
    public static function validateUrl($Url){
        if (filter_var($Url, FILTER_VALIDATE_URL)) {
            return true;
        } else {
            return false;
        }
    }
    public static function getUrlByPartAndBaseurl($baseurl,$subfolder,$path){
        $check_path =   substr($path,  0, 1);
        if($check_path != "/") {
            $url= $baseurl . "/" . $subfolder . "/" . $path;
        } else {
            $url= $baseurl.$path;
        }
        return $url;
    }
    public static function getInfoServer()
    {
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $protocol = "https";
        }else{
            $protocol = "http";
        }
        $host = $_SERVER['HTTP_HOST'];
        $port = $_SERVER['SERVER_PORT'];
        $pageURL = $_SERVER["REQUEST_URI"];
        $arrInfo = array($protocol, $port, $host, $pageURL);
        return $arrInfo;
    }
}