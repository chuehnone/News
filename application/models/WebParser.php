<?php

class Application_Model_WebParser
{
    public $webContent;     //Html source content
    public $title;
    public $abstract;
    public $timeout = 15;   //time limit seconds
    public $userAgent = 'Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.2.13) Gecko/20101206 Ubuntu/10.10 (maverick) Firefox/3.6.13';
    public $referer = 'http://www.google.com.tw';

    /**
     * 
     *
     * @param string $url
    **/
    public function saveWebContent($url){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER,$this->referer);         //可模擬referer
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);   // set the user agent
        curl_setopt($ch, CURLOPT_TIMEOUT , $this->timeout);

        $this->webContent = curl_exec($ch);

        curl_close($ch);
    }

    /**
     *
     *
    **/
    public function parseTitle(){
        if (empty($this->webContent))   throw new Exception("Could not find html");

    }
}

