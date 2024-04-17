<?php


namespace Omlet\SmartCoop\Types;

use Omlet\SmartCoop\Enums\Access;

class GroupSubset
{
    private string $groupId;
    private string $groupName;
    private Access $access;

    public function __construct(string $groupId, string $groupName, string $access)
    {
        $this->groupId = $groupId;
        $this->groupName = $groupName;
        $this->access = Access::tryFrom($access);
    }

    public function getGroupId(): string
    {
        return $this->groupId;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function getAccess(): Access
    {
        return $this->access;
    }
}
