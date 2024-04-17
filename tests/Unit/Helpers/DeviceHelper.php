<?php

namespace Tests\Unit\Helpers;

use Omlet\SmartCoop\Types\Action;
use Omlet\SmartCoop\Types\Configuration;
use Omlet\SmartCoop\Types\ConfigurationConnectivity;
use Omlet\SmartCoop\Types\ConfigurationDoor;
use Omlet\SmartCoop\Types\ConfigurationGeneral;
use Omlet\SmartCoop\Types\ConfigurationLight;
use Omlet\SmartCoop\Types\Device;
use Omlet\SmartCoop\Types\State;
use Omlet\SmartCoop\Types\StateConnectivity;
use Omlet\SmartCoop\Types\StateDoor;
use Omlet\SmartCoop\Types\StateGeneral;
use Omlet\SmartCoop\Types\StateLight;

class DeviceHelper
{
    public static function buildDevice(?string $name = null): Device
    {
        $deviceId = 'NsAKflxaCkDLkiO9';
        $name = $name ?? 'My Autodoor';
        $deviceType = 'autodoor';
        $stateGeneral = new StateGeneral('1.0.1', '1.0.0', '2023-06-22 23:00', 83, 'internal', 60, 'Hold OK to close', 'Battery: 80%');
        $stateConnectivity = new StateConnectivity('MyWiFi', '-60', '20', '0');
        $stateDoor = new StateDoor('open', '2023-06-23 06:32', '2023-06-22 20:05', 'none', 66);
        $stateLight = new StateLight('off');
        $state = new State($stateGeneral, $stateConnectivity, $stateDoor, $stateLight);

        $datetime = 'Thu Sep  7 09:44:47 2023';
        $timezone = '0';
        $useDst = true;
        $updateFrequency = 86400;
        $language = 'en';
        $overnightSleepEnable = true;
        $overnightSleepStart = '23:00';
        $overnightSleepEnd = '05:00';
        $pollFreq = 30;
        $stayAliveTime = 5;
        $statusUpdatePeriod = 21600;
        $general = new ConfigurationGeneral($datetime, $timezone, $useDst, $updateFrequency, $language, $overnightSleepEnable, $overnightSleepStart, $overnightSleepEnd, $pollFreq, $stayAliveTime, $statusUpdatePeriod);

        $bluetoothState = 'on';
        $wifiState = 'on';
        $connectivity = new ConfigurationConnectivity($bluetoothState, $wifiState);

        $doorType = 'sliding';
        $openMode = 'light';
        $openDelay = 10;
        $openLightLevel = 15;
        $openTime = '08:00';
        $closeMode = 'light';
        $closeDelay = 10;
        $closeLightLevel = 8;
        $closeTime = '20:30';
        $colour = 'green';
        $door = new ConfigurationDoor($doorType, $openMode, $openDelay, $openLightLevel, $openTime, $closeMode, $closeDelay, $closeLightLevel, $closeTime, $colour);

        $mode = 'auto';
        $minutesBeforeClose = 5;
        $maxOnTime = 30;
        $equipped = 2;
        $light = new ConfigurationLight($mode, $minutesBeforeClose, $maxOnTime, $equipped);

        $configuration = new Configuration($general, $connectivity, $door, $light);

        $actionName = 'Open';
        $description = 'Open door';
        $value = 'open';
        $pending = 'openpending';
        $url = '/device/NsAKflxaCkDLkiO9/open';

        $actions = [new Action($actionName, $description, $value, $pending, $url)];

        return new Device($deviceId, $name, $deviceType, $state, $configuration, $actions);
    }

    public static function buildDeviceArray(): array
    {
        return [
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
            'actions' => [
                [
                    'actionName' => 'open',
                    'description' => 'Open Door',
                    'actionValue' => 'open',
                    'actionPending' => 'openpending',
                    'url' => '/device/APC123/open',
                ]
            ],
        ];

    }
}