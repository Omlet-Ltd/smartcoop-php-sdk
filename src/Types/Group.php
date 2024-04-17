<?php

namespace Omlet\SmartCoop\Types;

class Group
{
    private string $groupId;
    private string $groupName;
    private ?string $access;
    private array $devices;
    private array $admins;
    private array $users;

    public function __construct(string $groupId, string $groupName, ?string $access, array $devices, array $admins, array $users)
    {
        $this->groupId = $groupId;
        $this->groupName = $groupName;
        $this->access = $access;
        $this->devices = $devices;
        $this->admins = $admins;
        $this->users = $users;
    }

    public function getGroupId(): string
    {
        return $this->groupId;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function setGroupName(string $groupName): void
    {
        $this->groupName = $groupName;
    }

    public function getAccess(): ?string
    {
        return $this->access;
    }

    public function getDevices(): array
    {
        return $this->devices;
    }

    public function getAdmins(): array
    {
        return $this->admins;
    }

    public function getUsers(): array
    {
        return $this->users;
    }
}
