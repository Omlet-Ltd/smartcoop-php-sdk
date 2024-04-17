<?php

namespace Tests\Unit\Types;

use PHPUnit\Framework\TestCase;
use Omlet\SmartCoop\Types\ConfigurationGeneral;

class ConfigurationGeneralTest extends TestCase
{
    public function testConfigurationGeneralDto(): void
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

        $this->assertInstanceOf(ConfigurationGeneral::class, $configurationGeneral);
        $this->assertSame($datetime, $configurationGeneral->getDatetime());
        $this->assertSame($timezone, $configurationGeneral->getTimezone());
        $this->assertSame($useDst, $configurationGeneral->getUseDst());
        $this->assertSame($updateFrequency, $configurationGeneral->getUpdateFrequency());
        $this->assertSame($language, $configurationGeneral->getLanguage());
        $this->assertSame($overnightSleepEnable, $configurationGeneral->getOvernightSleepEnable());
        $this->assertSame($overnightSleepStart, $configurationGeneral->getOvernightSleepStart());
        $this->assertSame($overnightSleepEnd, $configurationGeneral->getOvernightSleepEnd());
        $this->assertSame($pollFreq, $configurationGeneral->getPollFreq());
        $this->assertSame($stayAliveTime, $configurationGeneral->getStayAliveTime());
        $this->assertSame($statusUpdatePeriod, $configurationGeneral->getStatusUpdatePeriod());
    }
}
