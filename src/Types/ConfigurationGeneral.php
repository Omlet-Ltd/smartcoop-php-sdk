<?php

namespace Omlet\SmartCoop\Types;

use Omlet\SmartCoop\Interfaces\Arrayable;

class ConfigurationGeneral implements Arrayable
{
    private string $datetime;
    private string $timezone;
    private ?bool $useDst;
    private int $updateFrequency;
    private string $language;
    private bool $overnightSleepEnable;
    private string $overnightSleepStart;
    private string $overnightSleepEnd;
    private int $pollFreq;
    private int $stayAliveTime;
    private int $statusUpdatePeriod;

    public function __construct(string $datetime, string $timezone, ?bool $useDst, int $updateFrequency, string $language, bool $overnightSleepEnable, string $overnightSleepStart, string $overnightSleepEnd, int $pollFreq, int $stayAliveTime, int $statusUpdatePeriod)
    {
        $this->datetime = $datetime;
        $this->timezone = $timezone;
        $this->useDst = $useDst;
        $this->updateFrequency = $updateFrequency;
        $this->language = $language;
        $this->overnightSleepEnable = $overnightSleepEnable;
        $this->overnightSleepStart = $overnightSleepStart;
        $this->overnightSleepEnd = $overnightSleepEnd;
        $this->pollFreq = $pollFreq;
        $this->stayAliveTime = $stayAliveTime;
        $this->statusUpdatePeriod = $statusUpdatePeriod;
    }

    public function getDatetime(): string
    {
        return $this->datetime;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function getUseDst(): bool
    {
        return $this->useDst;
    }

    public function getUpdateFrequency(): int
    {
        return $this->updateFrequency;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getOvernightSleepEnable(): bool
    {
        return $this->overnightSleepEnable;
    }

    public function getOvernightSleepStart(): string
    {
        return $this->overnightSleepStart;
    }

    public function getOvernightSleepEnd(): string
    {
        return $this->overnightSleepEnd;
    }

    public function getPollFreq(): int
    {
        return $this->pollFreq;
    }

    public function getStayAliveTime(): int
    {
        return $this->stayAliveTime;
    }

    public function getStatusUpdatePeriod(): int
    {
        return $this->statusUpdatePeriod;
    }

    public function setDatetime(string $datetime): void
    {
        $this->datetime = $datetime;
    }

    public function setTimezone(string $timezone): void
    {
        $this->timezone = $timezone;
    }

    public function setUseDst(?bool $useDst): void
    {
        $this->useDst = $useDst;
    }

    public function setUpdateFrequency(int $updateFrequency): void
    {
        $this->updateFrequency = $updateFrequency;
    }

    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    public function setOvernightSleepEnable(bool $overnightSleepEnable): void
    {
        $this->overnightSleepEnable = $overnightSleepEnable;
    }

    public function setOvernightSleepStart(string $overnightSleepStart): void
    {
        $this->overnightSleepStart = $overnightSleepStart;
    }

    public function setOvernightSleepEnd(string $overnightSleepEnd): void
    {
        $this->overnightSleepEnd = $overnightSleepEnd;
    }

    public function setPollFreq(int $pollFreq): void
    {
        $this->pollFreq = $pollFreq;
    }

    public function setStayAliveTime(int $stayAliveTime): void
    {
        $this->stayAliveTime = $stayAliveTime;
    }

    public function setStatusUpdatePeriod(int $statusUpdatePeriod): void
    {
        $this->statusUpdatePeriod = $statusUpdatePeriod;
    }

    public function toArray(): array
    {
        return [
            'datetime' => $this->datetime,
            'timezone' => $this->timezone,
            'useDst' => $this->useDst,
            'updateFrequency' => $this->updateFrequency,
            'language' => $this->language,
            'overnightSleepEnable' => $this->overnightSleepEnable,
            'overnightSleepStart' => $this->overnightSleepStart,
            'overnightSleepEnd' => $this->overnightSleepEnd,
            'pollFreq' => $this->pollFreq,
            'stayAliveTime' => $this->stayAliveTime,
            'statusUpdatePeriod' => $this->statusUpdatePeriod,
        ];
    }
}
