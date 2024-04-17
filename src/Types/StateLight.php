<?php

namespace Omlet\SmartCoop\Types;

class StateLight
{
    private string $state;

    public function __construct(string $state)
    {
        $this->state = $state;
    }

    public function getState(): string
    {
        return $this->state;
    }
}
