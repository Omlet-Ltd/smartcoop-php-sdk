<?php

namespace Tests\Unit\Types;

use PHPUnit\Framework\TestCase;
use Omlet\SmartCoop\Types\ConfigurationDoor;

class ConfigurationDoorTest extends TestCase
{
    public function testConfigurationDoorDto(): void
    {
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

        $configurationDoor = new ConfigurationDoor($doorType, $openMode, $openDelay, $openLightLevel, $openTime, $closeMode, $closeDelay, $closeLightLevel, $closeTime, $colour);

        $this->assertInstanceOf(ConfigurationDoor::class, $configurationDoor);
        $this->assertSame($doorType, $configurationDoor->getDoorType());
        $this->assertSame($openMode, $configurationDoor->getOpenMode());
        $this->assertSame($openDelay, $configurationDoor->getOpenDelay());
        $this->assertSame($openLightLevel, $configurationDoor->getOpenLightLevel());
        $this->assertSame($openTime, $configurationDoor->getOpenTime());
        $this->assertSame($closeMode, $configurationDoor->getCloseMode());
        $this->assertSame($closeDelay, $configurationDoor->getCloseDelay());
        $this->assertSame($closeLightLevel, $configurationDoor->getCloseLightLevel());
        $this->assertSame($closeTime, $configurationDoor->getCloseTime());
        $this->assertSame($colour, $configurationDoor->getColour());
    }
}
