<?php

namespace Tests\Unit\Types;

use PHPUnit\Framework\TestCase;
use Omlet\SmartCoop\Types\StateGeneral;

class StateGeneralTest extends TestCase
{
    public function testStateGeneralDto(): void
    {
        $firmwareVersionCurrent = '1.0.1';
        $firmwareVersionPrevious = '1.0.0';
        $firmwareLastCheck = '2023-06-22 23:00';
        $batteryLevel = 83;
        $powerSource = 'internal';
        $uptime = 60;
        $displayLine1 = 'Hold OK to close';
        $displayLine2 = 'Battery: 80%';

        $stateGeneral = new StateGeneral($firmwareVersionCurrent, $firmwareVersionPrevious, $firmwareLastCheck, $batteryLevel, $powerSource, $uptime, $displayLine1, $displayLine2);

        $this->assertInstanceOf(StateGeneral::class, $stateGeneral);
        $this->assertSame($firmwareVersionCurrent, $stateGeneral->getFirmwareVersionCurrent());
        $this->assertSame($firmwareVersionPrevious, $stateGeneral->getFirmwareVersionPrevious());
        $this->assertSame($firmwareLastCheck, $stateGeneral->getFirmwareLastCheck());
        $this->assertSame($batteryLevel, $stateGeneral->getBatteryLevel());
        $this->assertSame($powerSource, $stateGeneral->getPowerSource());
        $this->assertSame($uptime, $stateGeneral->getUptime());
        $this->assertSame($displayLine1, $stateGeneral->getDisplayLine1());
        $this->assertSame($displayLine2, $stateGeneral->getDisplayLine2());
    }
}
