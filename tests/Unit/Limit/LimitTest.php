<?php

namespace MasoudNiki\OutlineSDKTests\Unit\Limit;
use GuzzleHttp\Psr7\Response;
use MasoudNiki\OutlineSDK\Domains\AccessKey\AccessKey;
use MasoudNiki\OutlineSDK\Domains\Limit\Limit;
use MasoudNiki\OutlineSDKTests\TestCase;

class LimitTest extends TestCase
{
    public Limit $limit;
    public function setUp(): void
    {
        parent::setUp();
        $this->limit=new Limit($this->outlineApiClient->getClient());
    }

    public function test_set_limit_on_all_access_keys_is_successful(){
        $this->mockHandler->append(new Response(204,[]));
        $response=$this->limit->setDataTransferLimitForAllAccessKeys(25000);
        $this->assertLastRequestEquals("PUT","/server/access-key-data-limit");
        $this->assertLastRequestBody(json_decode(file_get_contents(__DIR__."/fixtures/set_limit_on_all_access_keys_request.json")));
    }

}