<?php
namespace MasoudNiki\OutlineSDK;
use GuzzleHttp\Client;
use MasoudNiki\OutlineSDK\Domains\Server\Server;
use MasoudNiki\OutlineSDK\Domains\AccessKey\AccessKey;
use MasoudNiki\OutlineSDK\Domains\Limit\Limit;

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
        return new Server($this->client);
    }
    public function accessKeys(){
        return new AccessKey($this->client);
    }
    public function limit(){
        return new Limit($this->client);
    }
}