<?php

namespace Omlet\SmartCoop\Types;

class StateGeneral
{
    private string $firmwareVersionCurrent;
    private string $firmwareVersionPrevious;
    private string $firmwareLastCheck;
    private int $batteryLevel;
    private string $powerSource;
    private int $uptime;
    private string $displayLine1;
    private string $displayLine2;

    public function __construct(string $firmwareVersionCurrent, string $firmwareVersionPrevious, string $firmwareLastCheck, int $batteryLevel, string $powerSource, int $uptime, string $displayLine1, string $displayLine2)
    {
        $this->firmwareVersionCurrent = $firmwareVersionCurrent;
        $this->firmwareVersionPrevious = $firmwareVersionPrevious;
        $this->firmwareLastCheck = $firmwareLastCheck;
        $this->batteryLevel = $batteryLevel;
        $this->powerSource = $powerSource;
        $this->uptime = $uptime;
        $this->displayLine1 = $displayLine1;
        $this->displayLine2 = $displayLine2;
    }

    public function getFirmwareVersionCurrent(): string
    {
        return $this->firmwareVersionCurrent;
    }

    public function getFirmwareVersionPrevious(): string
    {
        return $this->firmwareVersionPrevious;
    }

    public function getFirmwareLastCheck(): string
    {
        return $this->firmwareLastCheck;
    }

    public function getBatteryLevel(): int
    {
        return $this->batteryLevel;
    }

    public function getPowerSource(): string
    {
        return $this->powerSource;
    }

    public function getUptime(): int
    {
        return $this->uptime;
    }

    public function getDisplayLine1(): string
    {
        return $this->displayLine1;
    }

    public function getDisplayLine2(): string
    {
        return $this->displayLine2;
    }
}
