<?php

namespace MasoudNiki\OutlineSDK\Domains\Server;

use GuzzleHttp\Client;

class Server
{
    public function __construct(public Client $client){}
    public function getServerInformation(){
        return $this->client->get("server");
    }
    public function changeHostNameForAccessKey(string $hostname){
        return $this->client->put('server/hostname-for-access-keys',[
            "json"=>[
                "hostname"=>$hostname
            ]
        ]);
    }
    public function changeServerName(string $name){
        return $this->client->put("name",[
            "json"=>[
                "name"=>$name
            ]
        ]);
    }
    public function metriceStatus(){
        return $this->client->get("metrics/enabled");
    }
    public function changeMetricSharing(bool $change){
        return $this->client->put("metrics/enabled",[
            "json"=>[
                "metricsEnabled"=>$change
            ]
        ]);
    }

}