<?php

namespace Tests\Unit;

use Omlet\SmartCoop\Clients\ApiClient;
use Omlet\SmartCoop\DeviceHandler;
use Omlet\SmartCoop\Factories\TypeFactory;
use Omlet\SmartCoop\Types\Device;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Helpers\DeviceHelper;

class DeviceHandlerTest extends TestCase
{
    private Device $device;

    public function setUp(): void
    {
        $this->device = DeviceHelper::buildDevice();
    }

    public function testAction(): void
    {
        $action = $this->device->getActions()[0];

        $apiClient = $this->createMock(ApiClient::class);
        $apiClient->expects($this->once())
        ->method('sendRequest')
        ->with(
            '/device/NsAKflxaCkDLkiO9/open',
            'POST',
            []
        );

        $deviceHandler = new DeviceHandler(
            $apiClient,
            new TypeFactory(),
            $this->device
        );

        $deviceHandler->action($action);
    }

    public function testGetActions(): void
    {
        $apiClient = $this->createMock(ApiClient::class);
        $deviceHandler = new DeviceHandler(
            $apiClient,
            new TypeFactory(),
            $this->device
        );

        $actions = $deviceHandler->getActions();

        $this->assertEquals($actions, $this->device->getActions());
    }

    public function testGetData(): void
    {
        $apiClient = $this->createMock(ApiClient::class);
        $deviceHandler = new DeviceHandler(
            $apiClient,
            new TypeFactory(),
            $this->device
        );

        $actions = $deviceHandler->getData();

        $this->assertEquals($actions, $this->device);
    }

    public function testRefreshData(): void
    {
        $apiClient = $this->createMock(ApiClient::class);
        $apiClient->expects($this->once())
            ->method('sendRequest')
            ->with(
                '/device/NsAKflxaCkDLkiO9',
                'GET',
                []
            )->willReturn(DeviceHelper::buildDeviceArray());

        $deviceHandler = new DeviceHandler(
            $apiClient,
            new TypeFactory(),
            $this->device
        );

        $this->assertEquals('My Autodoor', $deviceHandler->getData()->getName());

        $refreshData = $deviceHandler->refreshData();

        $this->assertEquals('MyDevice', $refreshData->getName());
        $this->assertEquals('MyDevice', $deviceHandler->getData()->getName());
    }

    public function testUpdateConfiguration(): void
    {
        $apiClient = $this->createMock(ApiClient::class);
        $apiClient->expects($this->once())
            ->method('sendRequest')
            ->with(
                '/device/NsAKflxaCkDLkiO9/configuration',
                'PATCH',
                ['door' => ['openTime' => '09:00']]
            )->willReturn([]);

        $deviceHandler = new DeviceHandler(
            $apiClient,
            new TypeFactory(),
            $this->device
        );

        $configuration = $this->device->getConfiguration()->copy();
        $door = $configuration->getDoor();
        $door->setOpenTime('09:00');
        $configuration->setDoor($door);

        $deviceHandler->updateConfiguration($configuration);
    }
}