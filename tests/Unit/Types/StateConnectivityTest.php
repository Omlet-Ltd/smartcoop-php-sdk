<?php

namespace Tests\Unit\Types;

use PHPUnit\Framework\TestCase;
use Omlet\SmartCoop\Types\StateConnectivity;

class StateConnectivityTest extends TestCase
{
    public function testStateConnectivityDto(): void
    {
        $ssid = 'MyWiFi';
        $wifiStrength = '-60';

        $stateConnectivity = new StateConnectivity($ssid, $wifiStrength);

        $this->assertInstanceOf(StateConnectivity::class, $stateConnectivity);
        $this->assertSame($ssid, $stateConnectivity->getSsid());
        $this->assertSame($wifiStrength, $stateConnectivity->getWifiStrength());
    }
}
