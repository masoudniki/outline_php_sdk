<?php

namespace MasoudNiki\OutlineSDK\Domains\AccessKey;

use GuzzleHttp\Client;

class AccessKey
{
    public function __construct(
        public Client $client
    ){}
    public function getListOfAccessKeys(){
        return $this->client->get("access-keys");
    }
    public function getAccessKey($accessKey){
        return $this->client->get("access-keys/$accessKey");
    }
    public function deleteAnAccessKey($accessKey){
        return $this->client->delete("access-keys/$accessKey");
    }
    public function createNewAccessKey(string $method="aes-192-gcm"){
        return $this->client->post("access-keys",[
            "json"=>[
                "method"=>$method
            ]
        ]);
    }
    public function renameAnAccessKey(string $accessKey,string $newName){
        return $this->client->put("access-keys/$accessKey/name",[
            "json"=>[
                "name"=>$newName
            ]
        ]);
    }
    public function changeDefaultPortForNewlyCreatedAcessKey($port){
        return $this->client->put("server/port-for-new-access-keys",[
            "json"=>[
                "port"=>$port
            ]
        ]);
    }






}