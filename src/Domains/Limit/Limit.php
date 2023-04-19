<?php

namespace MasoudNiki\OutlineSDK\Domains\Limit;

use GuzzleHttp\Client;

class Limit
{
    public function __construct(
        public Client $client
    ){}
    public function setDataTransferLimitForAllAccessKeys(string $limitAmount){
        return $this->client->put("server/access-key-data-limit",[
            "json"=>[
                "limit"=>[
                    "bytes"=>$limitAmount
                ]
            ]
        ]);
    }
    public function removeAccessKeyDataLimit(){
        return $this->client->delete("server/access-key-data-limit");
    }
    public function setDataLimitForGivenAccessKey($accessKey,$limitAmount){
        return $this->client->put("access-keys/$accessKey/data-limit",[
            "json"=>[
                "limit"=>[
                    "bytes"=>$limitAmount
                ]
            ]
        ]);
    }
    public function removeDataLimitForGivenAccessKey($accessKey){
        return $this->client->delete("access-keys/$accessKey/data-limit");
    }
}