<?php

namespace Omlet\SmartCoop\Types;

use Omlet\SmartCoop\Interfaces\Arrayable;

class ConfigurationDoor implements Arrayable
{
    private string $doorType;
    private string $openMode;
    private int $openDelay;
    private int $openLightLevel;
    private string $openTime;
    private string $closeMode;
    private int $closeDelay;
    private int $closeLightLevel;
    private string $closeTime;
    private string $colour;

    public function __construct(string $doorType, string $openMode, int $openDelay, int $openLightLevel, string $openTime, string $closeMode, int $closeDelay, int $closeLightLevel, string $closeTime, string $colour)
    {
        $this->doorType = $doorType;
        $this->openMode = $openMode;
        $this->openDelay = $openDelay;
        $this->openLightLevel = $openLightLevel;
        $this->openTime = $openTime;
        $this->closeMode = $closeMode;
        $this->closeDelay = $closeDelay;
        $this->closeLightLevel = $closeLightLevel;
        $this->closeTime = $closeTime;
        $this->colour = $colour;
    }

    public function getDoorType(): string
    {
        return $this->doorType;
    }

    public function getOpenMode(): string
    {
        return $this->openMode;
    }

    public function getOpenDelay(): int
    {
        return $this->openDelay;
    }

    public function getOpenLightLevel(): int
    {
        return $this->openLightLevel;
    }

    public function getOpenTime(): string
    {
        return $this->openTime;
    }

    public function getCloseMode(): string
    {
        return $this->closeMode;
    }

    public function getCloseDelay(): int
    {
        return $this->closeDelay;
    }

    public function getCloseLightLevel(): int
    {
        return $this->closeLightLevel;
    }

    public function getCloseTime(): string
    {
        return $this->closeTime;
    }

    public function getColour(): string
    {
        return $this->colour;
    }

    public function setDoorType(string $doorType): void
    {
        $this->doorType = $doorType;
    }

    public function setOpenMode(string $openMode): void
    {
        $this->openMode = $openMode;
    }

    public function setOpenDelay(int $openDelay): void
    {
        $this->openDelay = $openDelay;
    }

    public function setOpenLightLevel(int $openLightLevel): void
    {
        $this->openLightLevel = $openLightLevel;
    }

    public function setOpenTime(string $openTime): void
    {
        $this->openTime = $openTime;
    }

    public function setCloseMode(string $closeMode): void
    {
        $this->closeMode = $closeMode;
    }

    public function setCloseDelay(int $closeDelay): void
    {
        $this->closeDelay = $closeDelay;
    }

    public function setCloseLightLevel(int $closeLightLevel): void
    {
        $this->closeLightLevel = $closeLightLevel;
    }

    public function setCloseTime(string $closeTime): void
    {
        $this->closeTime = $closeTime;
    }

    public function setColour(string $colour): void
    {
        $this->colour = $colour;
    }

    public function toArray(): array
    {
        return [
            'doorType' => $this->doorType,
            'openMode' => $this->openMode,
            'openDelay' => $this->openDelay,
            'openLightLevel' => $this->openLightLevel,
            'openTime' => $this->openTime,
            'closeMode' => $this->closeMode,
            'closeDelay' => $this->closeDelay,
            'closeLightLevel' => $this->closeLightLevel,
            'closeTime' => $this->closeTime,
            'colour' => $this->colour,
        ];
    }
}
