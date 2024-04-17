<?php

namespace Tests\Unit\Types;

use PHPUnit\Framework\TestCase;
use Omlet\SmartCoop\Types\ConfigurationConnectivity;

class ConfigurationConnectivityTest extends TestCase
{
    public function testConfigurationConnectivityDto(): void
    {
        $wifiState = 'on';

        $configurationConnectivity = new ConfigurationConnectivity($wifiState);

        $this->assertInstanceOf(ConfigurationConnectivity::class, $configurationConnectivity);
        $this->assertSame($wifiState, $configurationConnectivity->getWifiState());
    }
}
