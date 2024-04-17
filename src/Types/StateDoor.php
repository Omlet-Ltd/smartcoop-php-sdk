<?php

namespace Omlet\SmartCoop\Types;

class StateDoor
{
    private string $state;
    private string $lastOpenTime;
    private string $lastCloseTime;
    private string $fault;
    private int $lightLevel;

    public function __construct(string $state, string $lastOpenTime, string $lastCloseTime, string $fault, int $lightLevel)
    {
        $this->state = $state;
        $this->lastOpenTime = $lastOpenTime;
        $this->lastCloseTime = $lastCloseTime;
        $this->fault = $fault;
        $this->lightLevel = $lightLevel;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getLastOpenTime(): string
    {
        return $this->lastOpenTime;
    }

    public function getLastCloseTime(): string
    {
        return $this->lastCloseTime;
    }

    public function getFault(): string
    {
        return $this->fault;
    }

    public function getLightLevel(): int
    {
        return $this->lightLevel;
    }
}
