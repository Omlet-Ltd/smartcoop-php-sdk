<?php

namespace Tests\Unit\Types;

use Omlet\SmartCoop\Types\Group;
use PHPUnit\Framework\TestCase;

class GroupTest extends TestCase
{
    public function testGroupDto(): void
    {
        $groupId = 'Uhe92kLJb10Dbfj3';
        $groupName = 'Green Coop';
        $access = 'Admin';
        $devices = [];
        $admins = [];
        $users = [];

        $dto = new Group($groupId, $groupName, $access, $devices, $admins, $users);

        $this->assertEquals($groupId, $dto->getGroupId());
        $this->assertEquals($groupName, $dto->getGroupName());
        $this->assertEquals($access, $dto->getAccess());
        $this->assertEquals($devices, $dto->getDevices());
        $this->assertEquals($admins, $dto->getAdmins());
        $this->assertEquals($users, $dto->getUsers());
    }
}