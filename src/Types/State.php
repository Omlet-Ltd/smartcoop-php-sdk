<?php

namespace Omlet\SmartCoop\Types;

class State
{
    private StateGeneral $general;
    private StateConnectivity $connectivity;
    private ?StateDoor $door;
    private ?StateLight $light;

    public function __construct(StateGeneral $general, StateConnectivity $connectivity, ?StateDoor $door, ?StateLight $light)
    {
        $this->general = $general;
        $this->connectivity = $connectivity;
        $this->door = $door;
        $this->light = $light;
    }

    public function getGeneral(): StateGeneral
    {
        return $this->general;
    }

    public function getConnectivity(): StateConnectivity
    {
        return $this->connectivity;
    }

    public function getDoor(): ?StateDoor
    {
        return $this->door;
    }

    public function getLight(): ?StateLight
    {
        return $this->light;
    }
}
