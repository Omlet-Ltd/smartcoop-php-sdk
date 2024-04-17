<?php

namespace Omlet\SmartCoop\Clients;

use GuzzleHttp\Client;
use Omlet\SmartCoop\Exceptions\ApiError;

class ApiClient
{
    private Client $httpClient;
    private string $token;

    private string $apiUrl = 'https://x107.omlet.co.uk/api/v1';

    public function __construct(Client $httpClient, string $token)
    {
        $this->httpClient = $httpClient;
        $this->token = $token;
    }

    public function sendRequest(string $path, string $method, array $payload): ?array
    {
        $headers = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
        ];

        $options = ['json' => $payload, 'headers' => $headers];

        try {
            $response = $this->httpClient->request(
                $method,
                $this->apiUrl . $path,
                $options
            );
        } Catch (\Exception) {
            throw new ApiError('Request failed');
        }

        $responseBody = (string) $response->getBody();

        return json_decode($responseBody, true);
    }

    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }
}