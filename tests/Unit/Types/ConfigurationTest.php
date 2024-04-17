<?php

namespace Tests\Unit\Types;

use PHPUnit\Framework\TestCase;
use Omlet\SmartCoop\Types\Configuration;
use Omlet\SmartCoop\Types\ConfigurationGeneral;
use Omlet\SmartCoop\Types\ConfigurationConnectivity;
use Omlet\SmartCoop\Types\ConfigurationDoor;
use Omlet\SmartCoop\Types\ConfigurationLight;

class ConfigurationTest extends TestCase
{
    public function testConfigurationDto(): void
    {
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

        $this->assertInstanceOf(Configuration::class, $configuration);
        $this->assertInstanceOf(ConfigurationGeneral::class, $configuration->getGeneral());
        $this->assertInstanceOf(ConfigurationConnectivity::class, $configuration->getConnectivity());
        $this->assertInstanceOf(ConfigurationDoor::class, $configuration->getDoor());
        $this->assertInstanceOf(ConfigurationLight::class, $configuration->getLight());
    }
}
