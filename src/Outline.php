<?php
namespace MasoudNiki\OutlineSDK;
use GuzzleHttp\Client;
use MasoudNiki\OutlineSDK\Domains\Server\Server;
use MasoudNiki\OutlineSDK\Domains\AccessKey\AccessKey;
use MasoudNiki\OutlineSDK\Domains\Limit\Limit;

class Outline
{
    public Client $client;
    public function __construct(
        public string $secretPath,
        array $config=[],
        Client $client=null
    ){
        if(!$client){
            $this->client=new Client(
                [
                    'base_uri'=>$this->secretPath
                ]+$config
            );
        }
    }
    public function getClient():Client{
        return $this->client;
    }
    public function setClient(Client $client):void{
        $this->client=$client;
    }
    public function server():Server{
        return new Server($this->client);
    }
    public function accessKeys():AccessKey{
        return new AccessKey($this->client);
    }
    public function limit():Limit{
        return new Limit($this->client);
    }
}