<?php
namespace MasoudNiki\OutlineSDK;
use GuzzleHttp\Client;

class Outline
{
    private Client $client;
    public function __construct(
        public string $secretPath,
        ?Client $client=null
    ){
        if(!$client){
            $this->client=$client;
        }
    }
    public function server(){

    }
}