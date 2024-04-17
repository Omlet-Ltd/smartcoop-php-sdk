<?php

namespace Tests\Unit\Types;

use PHPUnit\Framework\TestCase;
use Omlet\SmartCoop\Types\StateLight;

class StateLightTest extends TestCase
{
    public function testStateLightDto(): void
    {
        $state = 'off';

        $stateLight = new StateLight($state);

        $this->assertInstanceOf(StateLight::class, $stateLight);
        $this->assertSame($state, $stateLight->getState());
    }
}
