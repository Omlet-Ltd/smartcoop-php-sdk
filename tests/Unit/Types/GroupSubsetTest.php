<?php

namespace Tests\Unit\Types;

use Omlet\SmartCoop\Enums\Access;
use Omlet\SmartCoop\Types\GroupSubset;
use PHPUnit\Framework\TestCase;

class GroupSubsetTest extends TestCase
{
    public function testGroupSubsetDto(): void
    {
        $groupId = 'Uhe92kLJb10Dbfj3';
        $groupName = 'Green Coop';
        $access = 'Admin';

        $dto = new GroupSubset($groupId, $groupName, $access);

        $this->assertEquals($groupId, $dto->getGroupId());
        $this->assertEquals($groupName, $dto->getGroupName());
        $this->assertEquals(Access::ADMIN, $dto->getAccess());
    }
}