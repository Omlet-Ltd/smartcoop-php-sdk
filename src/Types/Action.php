<?php

namespace Omlet\SmartCoop\Types;

class Action
{
    private string $name;
    private string $description;
    private string $value;
    private ?string $pending;
    private string $url;

    public function __construct(string $name, string $description, string $value, ?string $pending, string $url)
    {
        $this->name = $name;
        $this->description = $description;
        $this->value = $value;
        $this->pending = $pending;
        $this->url = $url;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getPending(): ?string
    {
        return $this->pending;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
