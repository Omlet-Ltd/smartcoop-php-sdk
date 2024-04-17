<?php

namespace Omlet\SmartCoop\Types;

class Device
{
    private string $deviceId;
    private string $name;
    private string $deviceType;
    private State $state;
    private Configuration $configuration;
    private array $actions;

    public function __construct(string $deviceId, string $name, string $deviceType, State $state, Configuration $configuration, array $actions)
    {
        $this->deviceId = $deviceId;
        $this->name = $name;
        $this->deviceType = $deviceType;
        $this->state = $state;
        $this->configuration = $configuration;
        $this->actions = $actions;
    }

    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDeviceType(): string
    {
        return $this->deviceType;
    }

    public function getState(): State
    {
        return $this->state;
    }

    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }

    public function getActions(): array
    {
        return $this->actions;
    }

    public function setConfig(Configuration $configuration): void
    {
        $this->configuration = $configuration;
    }
}
