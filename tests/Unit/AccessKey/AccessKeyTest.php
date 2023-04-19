<?php

namespace MasoudNiki\OutlineSDKTests\Unit\AccessKey;
use MasoudNiki\OutlineSDKTests\TestCase;
use MasoudNiki\OutlineSDK\Domains\AccessKey\AccessKey;
use GuzzleHttp\Psr7\Response;
class AccessKeyTest extends TestCase
{
    public AccessKey $accessKey;
    public function setUp(): void
    {
        parent::setUp();
        dd($this->outlineApiClient->getClient());
        $this->accessKey=new AccessKey($this->outlineApiClient);
    }
    public function test_get_list_of_access_keys_is_successful(){
        $this->mockHandler->append(new Response(200,[],file_get_contents(__DIR__."/fixtures/get_list_of_access_keys_with_200_response.json")));
        $response=$this->accessKey->getListOfAccessKeys();
        dd($response);
    }
}