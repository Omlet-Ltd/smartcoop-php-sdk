<?php

namespace Omlet\SmartCoop;

use Omlet\SmartCoop\Clients\ApiClient;
use Omlet\SmartCoop\Enums\Access;
use Omlet\SmartCoop\Factories\TypeFactory;
use Omlet\SmartCoop\Types\Group as GroupData;

class GroupHandler
{
    private ApiClient $apiClient;
    private TypeFactory $factory;
    private GroupData $data;

    public function __construct(ApiClient $apiClient, TypeFactory $factory, GroupData $data)
    {
        $this->apiClient = $apiClient;
        $this->factory = $factory;
        $this->data = $data;
    }

    public function updateGroupName(string $groupName): void
    {
        $this->apiClient->sendRequest(
            sprintf('/group/%s', $this->data->getGroupId()),
            'PATCH',
            ['groupName' => $groupName],
        );

        $this->data->setGroupName($groupName);
    }

    public function deleteGroup(): void
    {
        $this->apiClient->sendRequest(
            sprintf('/group/%s', $this->data->getGroupId()),
            'DELETE',
            [],
        );
    }

    public function inviteUser(string $emailAddress, Access $access): void
    {
        $this->apiClient->sendRequest(
            sprintf('/group/%s/user', $this->data->getGroupId()),
            'POST',
            ['emailAddress' => $emailAddress, 'access' => $access->value],
        );
    }

    public function removeUser(string $emailAddress): void
    {
        $this->apiClient->sendRequest(
            sprintf('/group/%s/user', $this->data->getGroupId()),
            'DELETE',
            ['emailAddress' => $emailAddress],
        );
    }

    public function updateUserAccess(string $emailAddress, Access $access): void
    {
        $this->apiClient->sendRequest(
            sprintf('/group/%s/user', $this->data->getGroupId()),
            'PATCH',
            ['emailAddress' => $emailAddress, 'access' => $access->value],
        );
    }

    public function getData(): GroupData
    {
        return $this->data;
    }
}