<?php

namespace Omlet\SmartCoop\Types;

class NotificationSettings
{
    private ?bool $additionalSettings;
    public function __construct(?bool $additionalSettings)
    {
        $this->additionalSettings = $additionalSettings;
    }

    public function getAdditionalSettings(): ?bool
    {
        return $this->additionalSettings;
    }
}