<?php

namespace Tests\Integration;

use PHPUnit\Framework\TestCase;
use Omlet\SmartCoop\Clients\ApiClient;
use Omlet\SmartCoop\Types\ConfigurationDoor;
use Omlet\SmartCoop\DeviceHandler;
use Omlet\SmartCoop\Types\OmletType;
use Omlet\SmartCoop\Types\State;
use Omlet\SmartCoop\Types\StateConnectivity;
use Omlet\SmartCoop\Types\StateDoor;
use Omlet\SmartCoop\Types\StateGeneral;
use Omlet\SmartCoop\Types\StateLight;
use Omlet\SmartCoop\Factories\TypeFactory;
use Omlet\SmartCoop\Omlet;

class OmletTest extends TestCase
{
    private DeviceHandler $device;

    protected function setUp(): void
    {
        parent::setUp();
        $jsonData = file_get_contents( __DIR__ . '/json/device.json');
        $this->devicesData = json_decode($jsonData, true);
    }

    public function testDevices(): void
    {
        $jsonData = file_get_contents( __DIR__ . '/json/device.json');
        $devicesData = json_decode($jsonData, true);
        $this->deviceData = TypeFactory::createDTO(OmletType::DEVICE, $devicesData[0]);

        $apiClient = $this->createMock(ApiClient::class);
        $apiClient->method('sendRequest')
            ->willReturnMap([
                ['/device', 'GET', [], $devicesData],
                ['/device/FVhHis7DRqa2', 'GET', [], $devicesData[0]],
            ]);

        $omlet = new Omlet($apiClient, new TypeFactory());

        $devices = $omlet->getDevices();
        $this->device = $devices[0];

        $this->assertInstanceOf(DeviceHandler::class, $this->device);
        $this->assertEquals('FVhHis7DRqa2', $this->device->getData()->getDeviceId());
        $this->assertEquals('New autodoor', $this->device->getData()->getName());
        $this->assertEquals('Autodoor', $this->device->getData()->getDeviceType());

        $state = $this->device->getData()->getState();
        $this->assertInstanceOf(State::class, $state);

        $generalState = $state->getGeneral();
        $this->assertInstanceOf(StateGeneral::class, $generalState);
        $this->assertEquals('1.0.20-a61515d5', $generalState->getFirmwareVersionCurrent());
        $this->assertEquals('2024-04-21T05:09:17+00:00', $generalState->getFirmwareLastCheck());
        $this->assertEquals(98, $generalState->getBatteryLevel());

        $connectivityState = $state->getConnectivity();
        $this->assertInstanceOf(StateConnectivity::class, $connectivityState);
        $this->assertEquals('BT-WSAFCT', $connectivityState->getSsid());
        $this->assertEquals(-52, $connectivityState->getWifiStrength());

        $doorState = $state->getDoor();
        $this->assertInstanceOf(StateDoor::class, $doorState);
        $this->assertEquals('open', $doorState->getState());
        $this->assertEquals('2024-04-21T10:55:13+00:00', $doorState->getLastOpenTime());

        $lightState = $state->getLight();
        $this->assertInstanceOf(StateLight::class, $lightState);
        $this->assertEquals('off', $lightState->getState());

        $doorConfig = $this->device->getData()->getConfiguration()->getDoor();
        $this->assertInstanceOf(ConfigurationDoor::class, $doorConfig);
        $this->assertEquals('sliding', $doorConfig->getDoorType());
        $this->assertEquals('light', $doorConfig->getOpenMode());
        $this->assertEquals(0, $doorConfig->getOpenDelay());
        $this->assertEquals(0, $doorConfig->getCloseDelay());
        $this->assertEquals(6, $doorConfig->getCloseLightLevel());
        $this->assertEquals('19:00', $doorConfig->getCloseTime());
        $this->assertEquals(27, $doorConfig->getOpenLightLevel());
        $this->assertEquals('06:30', $doorConfig->getOpenTime());

        $connectivityConfig = $this->device->getData()->getConfiguration()->getConnectivity();
        $this->assertEquals('on', $connectivityConfig->getWifiState());
        
        $generalConfig = $this->device->getData()->getConfiguration()->getGeneral();
        $this->assertEquals('Europe/London', $generalConfig->getTimezone());
        $this->assertEquals('2024-04-21T13:35:07+00:00', $generalConfig->getDatetime());
        $this->assertEquals(86400, $generalConfig->getUpdateFrequency());
        $this->assertEquals('en', $generalConfig->getLanguage());
        $this->assertTrue($generalConfig->getOvernightSleepEnable());
        $this->assertEquals('21:00', $generalConfig->getOvernightSleepStart());
        $this->assertEquals('05:00', $generalConfig->getOvernightSleepEnd());
        $this->assertEquals(0, $generalConfig->getStayAliveTime());
        $this->assertEquals(21600, $generalConfig->getStatusUpdatePeriod());
        $this->assertEquals(600, $generalConfig->getPollFreq());

        $lightConfig = $this->device->getData()->getConfiguration()->getLight();
        $this->assertEquals('auto', $lightConfig->getMode());
        $this->assertEquals(5, $lightConfig->getMinutesBeforeClose());
        $this->assertEquals(5, $lightConfig->getMaxOnTime());
        $this->assertEquals(2, $lightConfig->getEquipped());
    }
}