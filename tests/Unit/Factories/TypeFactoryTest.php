<?php

namespace Tests\Unit\Factories;

use Omlet\SmartCoop\Types\Group;
use Omlet\SmartCoop\Types\GroupSubset;
use Omlet\SmartCoop\Types\GroupUser;
use PHPUnit\Framework\TestCase;
use Omlet\SmartCoop\Types\Configuration;
use Omlet\SmartCoop\Types\ConfigurationConnectivity;
use Omlet\SmartCoop\Types\ConfigurationDoor;
use Omlet\SmartCoop\Types\ConfigurationGeneral;
use Omlet\SmartCoop\Types\ConfigurationLight;
use Omlet\SmartCoop\Types\Device;
use Omlet\SmartCoop\Types\OmletType;
use Omlet\SmartCoop\Types\State;
use Omlet\SmartCoop\Types\StateConnectivity;
use Omlet\SmartCoop\Types\StateDoor;
use Omlet\SmartCoop\Types\StateGeneral;
use Omlet\SmartCoop\Types\StateLight;
use Omlet\SmartCoop\Factories\TypeFactory;

class TypeFactoryTest extends TestCase
{
    public function testCreateConfigurationGeneralDTO()
    {
        $data = [
            'datetime' => '2024-04-20 12:00',
            'timezone' => 'UTC',
            'useDst' => true,
            'updateFrequency' => 60,
            'language' => 'en',
            'overnightSleepEnable' => false,
            'overnightSleepStart' => '22:00',
            'overnightSleepEnd' => '06:00',
            'pollFreq' => 5,
            'stayAliveTime' => 600,
            'statusUpdatePeriod' => 30,
        ];

        $configGeneral = TypeFactory::createDTO(OmletType::CONFIGURATION_GENERAL, $data);
        $this->assertInstanceOf(ConfigurationGeneral::class, $configGeneral);
    }

    public function testCreateConfigurationConnectivityDTO()
    {
        $data = [
            'bluetoothState' => 'on',
            'wifiState' => 'on',
        ];

        $configConnectivity = TypeFactory::createDTO(OmletType::CONFIGURATION_CONNECTIVITY, $data);
        $this->assertInstanceOf(ConfigurationConnectivity::class, $configConnectivity);
    }

    public function testCreateConfigurationDoorDTO()
    {
        $data = [
            'doorType' => 'sliding',
            'openMode' => 'light',
            'openDelay' => 10,
            'openLightLevel' => 15,
            'openTime' => '08:00',
            'closeMode' => 'light',
            'closeDelay' => 10,
            'closeLightLevel' => 8,
            'closeTime' => '20:30',
            'colour' => 'green',
        ];

        $configDoor = TypeFactory::createDTO(OmletType::CONFIGURATION_DOOR, $data);
        $this->assertInstanceOf(ConfigurationDoor::class, $configDoor);
    }

    public function testCreateConfigurationLightDTO()
    {
        $data = [
            'mode' => 'auto',
            'minutesBeforeClose' => 5,
            'maxOnTime' => 30,
            'equipped' => 2,
        ];

        $configLight = TypeFactory::createDTO(OmletType::CONFIGURATION_LIGHT, $data);
        $this->assertInstanceOf(ConfigurationLight::class, $configLight);
    }

    public function testCreateConfigurationDTO()
    {
        $data = [
            'general' => [
                'datetime' => '2024-04-20 12:00',
                'timezone' => 'UTC',
                'useDst' => true,
                'updateFrequency' => 60,
                'language' => 'en',
                'overnightSleepEnable' => false,
                'overnightSleepStart' => '22:00',
                'overnightSleepEnd' => '06:00',
                'pollFreq' => 5,
                'stayAliveTime' => 600,
                'statusUpdatePeriod' => 30,
            ],
            'connectivity' => [
                'bluetoothState' => 'on',
                'wifiState' => 'on',
            ],
            'door' => [
                'doorType' => 'sliding',
                'openMode' => 'light',
                'openDelay' => 10,
                'openLightLevel' => 15,
                'openTime' => '08:00',
                'closeMode' => 'light',
                'closeDelay' => 10,
                'closeLightLevel' => 8,
                'closeTime' => '20:30',
                'colour' => 'green',
            ],
            'light' => [
                'mode' => 'auto',
                'minutesBeforeClose' => 5,
                'maxOnTime' => 30,
                'equipped' => 2,
            ],
        ];

        $config = TypeFactory::createDTO(OmletType::CONFIGURATION, $data);
        $this->assertInstanceOf(Configuration::class, $config);
    }

    public function testCreateStateGeneralDTO()
    {
        $data = [
            'firmwareVersionCurrent' => '1.0.1',
            'firmwareVersionPrevious' => '1.0.0',
            'firmwareLastCheck' => '2023-06-22 23:00',
            'batteryLevel' => 83,
            'powerSource' => 'internal',
            'uptime' => 60,
            'displayLine1' => 'Hold OK to close',
            'displayLine2' => 'Battery: 80%',
        ];

        $stateGeneralDTO = TypeFactory::createDTO(OmletType::STATE_GENERAL, $data);
        $this->assertInstanceOf(StateGeneral::class, $stateGeneralDTO);
    }

    public function testCreateStateConnectivityDTO()
    {
        $data = [
            'ssid' => 'MyWiFi',
            'wifiStrength' => '-60',
            'wifiPowerLevel' => '20',
            'bluetoothStrength' => '0',
        ];

        $stateConnectivityDTO = TypeFactory::createDTO(OmletType::STATE_CONNECTIVITY, $data);
        $this->assertInstanceOf(StateConnectivity::class, $stateConnectivityDTO);
    }

    public function testCreateStateDoorDTO()
    {
        $data = [
            'state' => 'open',
            'lastOpenTime' => '2023-06-23 06:32',
            'lastCloseTime' => '2023-06-22 20:05',
            'fault' => 'none',
            'lightLevel' => 66,
        ];

        $stateDoorDTO = TypeFactory::createDTO(OmletType::STATE_DOOR, $data);
        $this->assertInstanceOf(StateDoor::class, $stateDoorDTO);
    }

    public function testCreateStateLightDTO()
    {
        $data = [
            'state' => 'off',
        ];

        $stateLightDTO = TypeFactory::createDTO(OmletType::STATE_LIGHT, $data);
        $this->assertInstanceOf(StateLight::class, $stateLightDTO);
    }

    public function testCreateStateDTO()
    {
        $data = [
            'general' => [
                'firmwareVersionCurrent' => '1.0.1',
                'firmwareVersionPrevious' => '1.0.0',
                'firmwareLastCheck' => '2023-06-22 23:00',
                'batteryLevel' => 83,
                'powerSource' => 'internal',
                'uptime' => 60,
                'displayLine1' => 'Hold OK to close',
                'displayLine2' => 'Battery: 80%',
            ],
            'connectivity' => [
                'ssid' => 'MyWiFi',
                'wifiStrength' => '-60',
                'wifiPowerLevel' => '20',
                'bluetoothStrength' => '0',
            ],
            'door' => [
                'state' => 'open',
                'lastOpenTime' => '2023-06-23 06:32',
                'lastCloseTime' => '2023-06-22 20:05',
                'fault' => 'none',
                'lightLevel' => 66,
            ],
            'light' => [
                'state' => 'off',
            ],
        ];

        $state = TypeFactory::createDTO(OmletType::STATE, $data);
        $this->assertInstanceOf(State::class, $state);
    }

    public function testCreateDeviceDTO()
    {
        // Sample data for Device DTO
        $data = [
            'deviceId' => 'ABC123',
            'name' => 'MyDevice',
            'deviceType' => 'autodoor',
            'state' => [
                'general' => [
                    'firmwareVersionCurrent' => '1.0.1',
                    'firmwareVersionPrevious' => '1.0.0',
                    'firmwareLastCheck' => '2023-06-22 23:00',
                    'batteryLevel' => 83,
                    'powerSource' => 'internal',
                    'uptime' => 60,
                    'displayLine1' => 'Hold OK to close',
                    'displayLine2' => 'Battery: 80%',
                ],
                'connectivity' => [
                    'ssid' => 'MyWiFi',
                    'wifiStrength' => '-60',
                    'wifiPowerLevel' => '20',
                    'bluetoothStrength' => '0',
                ],
                'door' => [
                    'state' => 'open',
                    'lastOpenTime' => '2023-06-23 06:32',
                    'lastCloseTime' => '2023-06-22 20:05',
                    'fault' => 'none',
                    'lightLevel' => 66,
                ],
                'light' => [
                    'state' => 'off',
                ],
            ],
            'configuration' => [
                'general' => [
                    'datetime' => '2024-04-20 12:00',
                    'timezone' => 'UTC',
                    'useDst' => true,
                    'updateFrequency' => 60,
                    'language' => 'en',
                    'overnightSleepEnable' => false,
                    'overnightSleepStart' => '22:00',
                    'overnightSleepEnd' => '06:00',
                    'pollFreq' => 5,
                    'stayAliveTime' => 600,
                    'statusUpdatePeriod' => 30,
                ],
                'connectivity' => [
                    'bluetoothState' => 'on',
                    'wifiState' => 'on',
                ],
                'door' => [
                    'doorType' => 'sliding',
                    'openMode' => 'light',
                    'openDelay' => 10,
                    'openLightLevel' => 15,
                    'openTime' => '08:00',
                    'closeMode' => 'light',
                    'closeDelay' => 10,
                    'closeLightLevel' => 8,
                    'closeTime' => '20:30',
                    'colour' => 'green',
                ],
                'light' => [
                    'mode' => 'auto',
                    'minutesBeforeClose' => 5,
                    'maxOnTime' => 30,
                    'equipped' => 2,
                ],
            ],
            'actions' => [],
        ];

        $deviceDTO = TypeFactory::createDTO(OmletType::DEVICE, $data);
        $this->assertInstanceOf(Device::class, $deviceDTO);
    }

    public function testCreatesGroupUserDTO(): void
    {
        $data = [
            'emailAddress' => 'user@example.com',
            'firstName' => 'John',
            'lastName' => 'Doe',
            'access' => 'Admin',
        ];

        $groupUserDTO = TypeFactory::createDTO(OmletType::GROUP_USER, $data);
        $this->assertInstanceOf(GroupUser::class, $groupUserDTO);
    }

    public function testCreatesGroupSubsetDTO(): void
    {
        $data = [
            'groupId' => '1',
            'groupName' => 'Group',
            'access' => 'Admin',
        ];

        $groupSubsetDTO = TypeFactory::createDTO(OmletType::GROUP_SUBSET, $data);
        $this->assertInstanceOf(GroupSubset::class, $groupSubsetDTO);
    }

    public function testCreatesGroupDTO(): void
    {
        $data = [
            'groupId' => '1',
            'groupName' => 'Group',
            'access' => 'Admin',
            'devices' => [
                [
                    'deviceId' => 'ABC123',
                    'name' => 'MyDevice',
                    'deviceType' => 'autodoor',
                    'state' => [
                        'general' => [
                            'firmwareVersionCurrent' => '1.0.1',
                            'firmwareVersionPrevious' => '1.0.0',
                            'firmwareLastCheck' => '2023-06-22 23:00',
                            'batteryLevel' => 83,
                            'powerSource' => 'internal',
                            'uptime' => 60,
                            'displayLine1' => 'Hold OK to close',
                            'displayLine2' => 'Battery: 80%',
                        ],
                        'connectivity' => [
                            'ssid' => 'MyWiFi',
                            'wifiStrength' => '-60',
                            'wifiPowerLevel' => '20',
                            'bluetoothStrength' => '0',
                        ],
                        'door' => [
                            'state' => 'open',
                            'lastOpenTime' => '2023-06-23 06:32',
                            'lastCloseTime' => '2023-06-22 20:05',
                            'fault' => 'none',
                            'lightLevel' => 66,
                        ],
                        'light' => [
                            'state' => 'off',
                        ],
                    ],
                    'configuration' => [
                        'general' => [
                            'datetime' => '2024-04-20 12:00',
                            'timezone' => 'UTC',
                            'useDst' => true,
                            'updateFrequency' => 60,
                            'language' => 'en',
                            'overnightSleepEnable' => false,
                            'overnightSleepStart' => '22:00',
                            'overnightSleepEnd' => '06:00',
                            'pollFreq' => 5,
                            'stayAliveTime' => 600,
                            'statusUpdatePeriod' => 30,
                        ],
                        'connectivity' => [
                            'bluetoothState' => 'on',
                            'wifiState' => 'on',
                        ],
                        'door' => [
                            'doorType' => 'sliding',
                            'openMode' => 'light',
                            'openDelay' => 10,
                            'openLightLevel' => 15,
                            'openTime' => '08:00',
                            'closeMode' => 'light',
                            'closeDelay' => 10,
                            'closeLightLevel' => 8,
                            'closeTime' => '20:30',
                            'colour' => 'green',
                        ],
                        'light' => [
                            'mode' => 'auto',
                            'minutesBeforeClose' => 5,
                            'maxOnTime' => 30,
                            'equipped' => 2,
                        ],
                    ],
                    'actions' => [],
                ]
            ],
            'admins' => [
                [
                    'emailAddress' => 'user@example.com',
                    'firstName' => 'John',
                    'lastName' => 'Doe',
                    'access' => 'Admin',
                ]
            ],
            'users' => [
                [
                    'emailAddress' => 'user2@example.com',
                    'firstName' => 'Jane',
                    'lastName' => 'Doe',
                    'access' => 'User',
                ]
            ]
        ];

        $groupDTO = TypeFactory::createDTO(OmletType::GROUP, $data);
        $this->assertInstanceOf(Group::class, $groupDTO);
        $this->assertInstanceOf(Device::class, $groupDTO->getDevices()[0]);
        $this->assertInstanceOf(GroupUser::class, $groupDTO->getUsers()[0]);
        $this->assertInstanceOf(GroupUser::class, $groupDTO->getAdmins()[0]);
    }
}
