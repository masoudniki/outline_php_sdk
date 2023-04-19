<?php

namespace MasoudNiki\OutlineSDK\Domains\AccessKey;

use GuzzleHttp\Client;

class AccessKey
{
    public function __construct(
        public Client $client
    ){}


}