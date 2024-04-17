<?php

namespace Tests\Unit\Types;

use PHPUnit\Framework\TestCase;
use Omlet\SmartCoop\Types\StateDoor;

class StateDoorTest extends TestCase
{
    public function testStateDoorDto(): void
    {
        $state = 'open';
        $lastOpenTime = '2023-06-23 06:32';
        $lastCloseTime = '2023-06-22 20:05';
        $fault = 'none';
        $lightLevel = 66;

        $stateDoor = new StateDoor($state, $lastOpenTime, $lastCloseTime, $fault, $lightLevel);

        $this->assertInstanceOf(StateDoor::class, $stateDoor);
        $this->assertSame($state, $stateDoor->getState());
        $this->assertSame($lastOpenTime, $stateDoor->getLastOpenTime());
        $this->assertSame($lastCloseTime, $stateDoor->getLastCloseTime());
        $this->assertSame($fault, $stateDoor->getFault());
        $this->assertSame($lightLevel, $stateDoor->getLightLevel());
    }
}
