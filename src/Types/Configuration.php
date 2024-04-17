<?php

namespace Omlet\SmartCoop\Types;

use Omlet\SmartCoop\Interfaces\Arrayable;

class Configuration implements Arrayable
{
    private ConfigurationGeneral $general;
    private ConfigurationConnectivity $connectivity;
    private ?ConfigurationDoor $door;
    private ?ConfigurationLight $light;

    public function __construct(ConfigurationGeneral $general, ConfigurationConnectivity $connectivity, ?ConfigurationDoor $door, ?ConfigurationLight $light)
    {
        $this->general = $general;
        $this->connectivity = $connectivity;
        $this->door = $door;
        $this->light = $light;
    }

    public function getGeneral(): ConfigurationGeneral
    {
        return $this->general;
    }

    public function getConnectivity(): ConfigurationConnectivity
    {
        return $this->connectivity;
    }

    public function getDoor(): ?ConfigurationDoor
    {
        return $this->door;
    }

    public function getLight(): ?ConfigurationLight
    {
        return $this->light;
    }

    public function setGeneral(ConfigurationGeneral $general): void
    {
        $this->general = $general;
    }

    public function setConnectivity(ConfigurationConnectivity $connectivity): void
    {
        $this->connectivity = $connectivity;
    }

    public function setDoor(ConfigurationDoor $door): void
    {
        $this->door = $door;
    }

    public function setLight(ConfigurationLight $light): void
    {
        $this->light = $light;
    }

    public function copy(): Configuration
    {
        return new Configuration(
            clone $this->general,
            clone $this->connectivity,
            clone $this->door,
            clone $this->light,
        );
    }

    public function toArray(): array
    {
        return [
            'general' => $this->general->toArray(),
            'connectivity' => $this->connectivity->toArray(),
            'door' => $this->door ? $this->door->toArray() : [],
            'light' => $this->light ? $this->light->toArray() : [],
        ];
    }
}
