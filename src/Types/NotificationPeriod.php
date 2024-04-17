<?php

namespace Omlet\SmartCoop\Types;

class NotificationPeriod
{
    private string $start;
    private string $end;
    public function __construct(string $start, string $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function getStart(): bool
    {
        return $this->start;
    }

    public function getEnd(): bool
    {
        return $this->end;
    }
}