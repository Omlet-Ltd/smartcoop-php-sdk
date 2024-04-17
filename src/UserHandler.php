<?php

namespace Omlet\SmartCoop;

use Omlet\SmartCoop\Clients\ApiClient;
use Omlet\SmartCoop\Factories\TypeFactory;
use Omlet\SmartCoop\Types\GroupSubset;
use Omlet\SmartCoop\Types\User as UserData;

class UserHandler
{
    private ApiClient $apiClient;
    private TypeFactory $factory;
    private UserData $data;

    public function __construct(ApiClient $apiClient, TypeFactory $factory, UserData $data)
    {
        $this->apiClient = $apiClient;
        $this->factory = $factory;
        $this->data = $data;
    }

    public function getData(): UserData
    {
        return $this->data;
    }

    public function acceptInvite(GroupSubset $groupSubset): void
    {
        $this->apiClient->sendRequest(
            sprintf('/invite/%s', $groupSubset->getGroupId()),
            'POST',
            [],
        );
    }

    public function rejectInvite(GroupSubset $groupSubset): void
    {
        $this->apiClient->sendRequest(
            sprintf('/invite/%s', $groupSubset->getGroupId()),
            'DELETE',
            [],
        );
    }
}