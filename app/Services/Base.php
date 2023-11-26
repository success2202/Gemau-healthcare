<?php 
namespace App\Services;

use GuzzleHttp\Client;

class Base {

    public $url;
    public $method;
    public $jsonBody;
    public $apiKey;

    public function __construct($url, $method, $apiKey,  $jsonBody = [])
    {
        $this->url = $url;
        $this->method = $method;
        $this->jsonBody = $jsonBody;
        $this->apiKey = $apiKey;
    }

    public function Client(){
    $client = new Client();
    $res = $client->request($this->method, $this->url, [
        'headers' => [
            'Authorization' => 'Bearer '.config('app.GIDIAPIKey'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'X-API-KEY' => $this->apiKey
        ],
        'json' => $this->jsonBody
    ]);
  
    return $res;
    }



}



