<?php

namespace Tests\Unit\Types;

use PHPUnit\Framework\TestCase;
use Omlet\SmartCoop\Types\ConfigurationLight;

class ConfigurationLightTest extends TestCase
{
    public function testConfigurationLightDto(): void
    {
        $mode = 'auto';
        $minutesBeforeClose = 5;
        $maxOnTime = 30;
        $equipped = 2;
        $configurationLight = new ConfigurationLight($mode, $minutesBeforeClose, $maxOnTime, $equipped);

        $this->assertInstanceOf(ConfigurationLight::class, $configurationLight);
        $this->assertSame($mode, $configurationLight->getMode());
        $this->assertSame($minutesBeforeClose, $configurationLight->getMinutesBeforeClose());
        $this->assertSame($maxOnTime, $configurationLight->getMaxOnTime());
    }
}
