<?php

namespace YTickets\Client;

class YTicketsRequest {
    
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';
    const METHOD_PATCH = 'PATCH';
    const URL = 'https://api.tickets.yandex.net/api/agent/';
    
    private $auth;
    
    public function __construct($username, $password){
        $this->auth = $username .':'. sha1( md5($password).time() ) .':'. time();
    }
    
    public function execute($parameters = [], $method = 'GET') {
        $parametersURL = array_merge($parameters,[
            'auth'=>$this->auth,
            'uid'=>$this->getGUID()
        ]);
        return $this->requestCurl(self::URL, $parametersURL, $method);
    }

    public function requestCurl($url, $parameters = [], $method = 'GET', $timeout = 30) {
        $ch = curl_init();
        if (count($parameters)) {
            $url .= '?' . http_build_query($parameters);
        }

        if ($method === self::METHOD_POST) {
            curl_setopt($ch, CURLOPT_POST, true);
        } elseif ($method === self::METHOD_PUT) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::METHOD_PUT);
        } elseif ($method === self::METHOD_DELETE) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::METHOD_DELETE);
        } elseif ($method === self::METHOD_PATCH) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::METHOD_PATCH);
        }        
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Length: 0"
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_HEADER, false);        
        $response = curl_exec($ch);

        $errno = curl_errno($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($errno) {
            throw new YTicketsException('Запрос произвести не удалось: ' . $error, $errno);
        }
        $json = json_decode($response, true);
        if ($json['status'] != 0){
            throw new YTicketsException('Запрос API вернулся с ошибкой: ' . $json['error'], $json['status']);
        }
        return $json['result'];
        
    }
    
    private function getGUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

}
