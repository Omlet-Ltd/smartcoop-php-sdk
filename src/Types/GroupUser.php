<?php

namespace Omlet\SmartCoop\Types;

use Omlet\SmartCoop\Enums\Access;

class GroupUser
{
    private string $emailAddress;
    private string $firstName;
    private string $lastName;
    private Access $access;

    public function __construct(string $emailAddress, string $firstName, string $lastName, string $access)
    {
        $this->emailAddress = $emailAddress;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->access = Access::tryFrom($access);
    }

    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getAccess(): Access
    {
        return $this->access;
    }
}
