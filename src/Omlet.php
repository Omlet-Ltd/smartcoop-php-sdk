<?php

namespace Omlet\SmartCoop;

use GuzzleHttp\Client;
use Omlet\SmartCoop\Clients\ApiClient;
use Omlet\SmartCoop\Factories\TypeFactory;
use Omlet\SmartCoop\Types\OmletType;

class Omlet
{
    private ApiClient $apiClient;
    private TypeFactory $factory;

    public function __construct(ApiClient $apiClient, TypeFactory $factory)
    {
        $this->apiClient = $apiClient;
        $this->factory = $factory;
    }

    public static function create(string $token): Omlet
    {
        $apiClient = new ApiClient(new Client(), $token);
        $factory = new TypeFactory();
        return new self($apiClient, $factory);
    }

    public function getDevices(): array
    {
        $devicesData = $this->apiClient->sendRequest(
            '/device',
            'GET',
            [],
        );

        $devices = [];
        foreach ($devicesData as $deviceData) {
            $devices[] = new DeviceHandler(
                $this->apiClient,
                $this->factory,
                $this->factory->createDTO(OmletType::DEVICE, $deviceData)
            );
        }

        return $devices;
    }

    public function getDeviceById(string $deviceId): DeviceHandler
    {
        $deviceData = $this->apiClient->sendRequest(
            sprintf('/device/%s', $deviceId),
            'GET',
            [],
        );

        return new DeviceHandler(
            $this->apiClient,
            $this->factory,
            $this->factory->createDTO(OmletType::DEVICE, $deviceData)
        );
    }

    public function getGroups(): array
    {
        $groupData = $this->apiClient->sendRequest(
            '/group',
            'GET',
            [],
        );

        $groups = [];
        foreach ($groupData as $group) {
            $groups[] = new GroupHandler(
                $this->apiClient,
                $this->factory,
                $this->factory->createDTO(OmletType::GROUP, $group)
            );
        }

        return $groups;
    }

    public function createGroup(string $groupName): GroupHandler
    {
        $groupData = $this->apiClient->sendRequest(
            '/group',
            'POST',
            ['groupName' => $groupName],
        );

        return new GroupHandler(
            $this->apiClient,
            $this->factory,
            $this->factory->createDTO(OmletType::GROUP, $groupData)
        );
    }

    public function getGroupById(string $groupId): GroupHandler
    {
        $groupData = $this->apiClient->sendRequest(
            sprintf('/group/%s', $groupId),
            'GET',
            [],
        );

        return new GroupHandler(
            $this->apiClient,
            $this->factory,
            $this->factory->createDTO(OmletType::GROUP, $groupData)
        );
    }

    public function getUser(): UserHandler
    {
        $userData = $this->apiClient->sendRequest(
            '/whoami',
            'GET',
            [],
        );

        return new UserHandler(
            $this->apiClient,
            $this->factory,
            $this->factory->createDTO(OmletType::USER, $userData)
        );
    }
}
