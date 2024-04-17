<?php

namespace Tests\Unit\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Omlet\SmartCoop\Clients\ApiClient;

class ApiClientTest extends TestCase
{
    public function testSendRequest()
    {
        $httpClientMock = $this->createMock(Client::class);

        $path = 'test';
        $method = 'POST';
        $payload = ['key' => 'value'];
        $expectedHeaders = [
            'Authorization' => 'Bearer token123',
            'Content-Type' => 'application/json',
        ];
        $expectedResponse = ['result' => 'success'];

        $response = new Response(200, [], json_encode($expectedResponse));

        $apiClient = new ApiClient($httpClientMock, 'token123');

        $httpClientMock->expects($this->once())
            ->method('request')
            ->with(
                $this->equalTo($method),
                $this->equalTo($apiClient->getApiUrl() . $path),
                $this->equalTo(['json' => $payload, 'headers' => $expectedHeaders])
            )
            ->willReturn($response);

        $actualResponse = $apiClient->sendRequest($path, $method, $payload);

        $this->assertEquals($expectedResponse, $actualResponse);
    }
}
