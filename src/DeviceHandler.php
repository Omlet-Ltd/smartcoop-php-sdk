<?php

namespace Omlet\SmartCoop;

use Omlet\SmartCoop\Clients\ApiClient;
use Omlet\SmartCoop\Clients\Services\PatchBuilder;
use Omlet\SmartCoop\Types\Action;
use Omlet\SmartCoop\Types\Configuration;
use Omlet\SmartCoop\Types\Device as DeviceData;
use Omlet\SmartCoop\Types\OmletType;
use Omlet\SmartCoop\Factories\TypeFactory;

class DeviceHandler
{
    private ApiClient $apiClient;
    private TypeFactory $factory;
    private DeviceData $data;

    public function __construct(ApiClient $apiClient, TypeFactory $factory, DeviceData $data)
    {
        $this->apiClient = $apiClient;
        $this->factory = $factory;
        $this->data = $data;
    }

    public function action(Action $action): void
    {
        $this->apiClient->sendRequest(
            $action->getUrl(),
            'POST',
            [],
        );
    }

    public function getActions(): array
    {
        return $this->getData()->getActions();
    }

    public function getData(): DeviceData
    {
        return $this->data;
    }

    public function refreshData()
    {
        $deviceResponse = $this->apiClient->sendRequest(
            sprintf('/device/%s', $this->data->getDeviceId()),
            'GET',
            [],
        );

        $deviceData = $this->factory->createDTO(OmletType::DEVICE, $deviceResponse);

        $this->setData($deviceData);

        return $deviceData;
    }

    public function updateConfiguration(Configuration $configuration): void
    {
        $this->apiClient->sendRequest(
            sprintf('/device/%s/configuration', $this->data->getDeviceId()),
            'PATCH',
            PatchBuilder::buildRequestArray($this->data->getConfiguration(), $configuration),
        );

        $this->data->setConfig($configuration);
    }

    private function setData(DeviceData $data): void
    {
        $this->data = $data;
    }
}