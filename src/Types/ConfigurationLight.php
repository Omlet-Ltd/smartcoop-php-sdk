<?php

namespace Omlet\SmartCoop\Types;

use Omlet\SmartCoop\Interfaces\Arrayable;

class ConfigurationLight implements Arrayable
{
    private string $mode;
    private int $minutesBeforeClose;
    private int $maxOnTime;
    private int $equipped;

    public function __construct(string $mode, int $minutesBeforeClose, int $maxOnTime, int $equipped)
    {
        $this->mode = $mode;
        $this->minutesBeforeClose = $minutesBeforeClose;
        $this->maxOnTime = $maxOnTime;
        $this->equipped = $equipped;
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function getMinutesBeforeClose(): int
    {
        return $this->minutesBeforeClose;
    }

    public function getMaxOnTime(): int
    {
        return $this->maxOnTime;
    }

    public function getEquipped(): int
    {
        return $this->equipped;
    }

    public function setMode(string $mode): void
    {
        $this->mode = $mode;
    }

    public function setMinutesBeforeClose(int $minutesBeforeClose): void
    {
        $this->minutesBeforeClose = $minutesBeforeClose;
    }

    public function setMaxOnTime(int $maxOnTime): void
    {
        $this->maxOnTime = $maxOnTime;
    }

    public function setEquipped(int $equipped): void
    {
        $this->equipped = $equipped;
    }

    public function toArray(): array
    {
        return [
            'mode' => $this->mode,
            'minutesBeforeClose' => $this->minutesBeforeClose,
            'maxOnTime' => $this->maxOnTime,
            'equipped' => $this->equipped,
        ];
    }
}
