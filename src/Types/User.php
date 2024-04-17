<?php

namespace Omlet\SmartCoop\Types;

class User
{
    private ?string $userId;
    private string $firstName;
    private string $lastName;
    private ?string $emailAddress;
    private ?string $siteLink;
    private ?array $invites;

    public function __construct(
        ?string $userId,
        string $firstName,
        string $lastName,
        ?string $emailAddress = null,
        ?string $siteLink = null,
        ?array $invites = null
    ) {
        $this->userId = $userId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->emailAddress = $emailAddress;
        $this->siteLink = $siteLink;
        $this->invites = $invites;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    public function getSiteLink(): ?string
    {
        return $this->siteLink;
    }

    public function getInvites(): ?array
    {
        return $this->invites;
    }
}
