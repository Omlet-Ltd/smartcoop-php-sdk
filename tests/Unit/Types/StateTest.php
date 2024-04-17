<?php

namespace Tests\Unit\Types;

use PHPUnit\Framework\TestCase;
use Omlet\SmartCoop\Types\State;
use Omlet\SmartCoop\Types\StateGeneral;
use Omlet\SmartCoop\Types\StateConnectivity;
use Omlet\SmartCoop\Types\StateDoor;
use Omlet\SmartCoop\Types\StateLight;

class StateTest extends TestCase
{
    public function testStateDto(): void
    {
        $stateGeneral = new StateGeneral('1.0.1', '1.0.0', '2023-06-22 23:00', 83, 'internal', 60, 'Hold OK to close', 'Battery: 80%');
        $stateConnectivity = new StateConnectivity('MyWiFi', '-60', '20', '0');
        $stateDoor = new StateDoor('open', '2023-06-23 06:32', '2023-06-22 20:05', 'none', 66);
        $stateLight = new StateLight('off');

        $state = new State($stateGeneral, $stateConnectivity, $stateDoor, $stateLight);

        $this->assertInstanceOf(State::class, $state);
        $this->assertSame($stateGeneral, $state->getGeneral());
        $this->assertSame($stateConnectivity, $state->getConnectivity());
        $this->assertSame($stateDoor, $state->getDoor());
        $this->assertSame($stateLight, $state->getLight());
    }
}
