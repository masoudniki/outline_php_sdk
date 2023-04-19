<?php

namespace MasoudNiki\OutlineSDKTests\Unit\Server;
use GuzzleHttp\Psr7\Response;
use MasoudNiki\OutlineSDK\Domains\Limit\Limit;
use MasoudNiki\OutlineSDK\Domains\Server\Server;
use MasoudNiki\OutlineSDKTests\TestCase;

class ServerTest extends TestCase
{
    public Server $server;
    public function setUp(): void
    {
        parent::setUp();
        $this->server=new Server($this->outlineApiClient->getClient());
    }

    public function test_set_limit_on_all_access_keys_is_successful(){
        $this->mockHandler->append(new Response(204,[]));
        $response=$this->server->getServerInformation();
        $this->assertLastRequestEquals("GET","/server");
        $this->assertLastRequestBodyIsEmpty();
    }

}