<?php

namespace Omlet\SmartCoop\Types;

class StateConnectivity
{
    private string $ssid;
    private string $wifiStrength;

    public function __construct(string $ssid, string $wifiStrength)
    {
        $this->ssid = $ssid;
        $this->wifiStrength = $wifiStrength;
    }

    public function getSsid(): string
    {
        return $this->ssid;
    }

    public function getWifiStrength(): string
    {
        return $this->wifiStrength;
    }
}
