<?php

namespace Omlet\SmartCoop\Types;

use Omlet\SmartCoop\Interfaces\Arrayable;

class ConfigurationConnectivity implements Arrayable
{
    private string $wifiState;

    public function __construct(string $wifiState)
    {
        $this->wifiState = $wifiState;
    }


    public function getWifiState(): string
    {
        return $this->wifiState;
    }

    public function setWifiState(string $wifiState): void
    {
        $this->wifiState = $wifiState;
    }


    public function toArray(): array
    {
        return [
            'wifiState' => $this->wifiState,
        ];
    }
}
