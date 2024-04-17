<?php

namespace Tests\Unit\Clients\Services;

use Omlet\SmartCoop\Clients\Services\PatchBuilder;
use PHPUnit\Framework\TestCase;
use Omlet\SmartCoop\Types\Configuration;
use Omlet\SmartCoop\Types\ConfigurationConnectivity;
use Omlet\SmartCoop\Types\ConfigurationGeneral;

class PatchBuilderTest extends TestCase
{
    public function testBuildPatchPayload()
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

        $configurationGeneral = new ConfigurationGeneral($datetime, $timezone, $useDst, $updateFrequency, $language, $overnightSleepEnable, $overnightSleepStart, $overnightSleepEnd, $pollFreq, $stayAliveTime, $statusUpdatePeriod);

        $wifiState = 'on';
        $connectivity = new ConfigurationConnectivity($wifiState);

        $config1 = new Configuration(
            $configurationGeneral,
            $connectivity,
            null,
            null
        );

        $newUpdateFrequency = 9000;
        $newPollFreq = 20;
        $configurationDifferent = new ConfigurationGeneral($datetime, $timezone, $useDst, $newUpdateFrequency, $language, $overnightSleepEnable, $overnightSleepStart, $overnightSleepEnd, $newPollFreq, $stayAliveTime, $statusUpdatePeriod);

        $wifiState = 'off';
        $connectivityNew = new ConfigurationConnectivity($wifiState);

        $config2 = new Configuration(
            $configurationDifferent,
            $connectivityNew,
            null,
            null
        );

        $differences = PatchBuilder::buildRequestArray($config1, $config2);

        $expectedDifferences = [
            'general' => ['updateFrequency' => 9000, 'pollFreq' => 20],
            'connectivity' => ['wifiState' => 'off'],
        ];

        $this->assertEquals($expectedDifferences, $differences);
    }
}