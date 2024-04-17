<?php

namespace Tests\Unit\Types;
use Omlet\SmartCoop\Enums\Access;
use Omlet\SmartCoop\Types\GroupUser;
use PHPUnit\Framework\TestCase;

class GroupUserTest extends TestCase
{
    public function testGroupUserDto(): void
    {
        $email = 'user@example.com';
        $firstName = 'John';
        $lastName = 'Doe';
        $access = 'Admin';

        $dto = new GroupUser($email, $firstName, $lastName, $access);

        $this->assertEquals($email, $dto->getEmailAddress());
        $this->assertEquals($firstName, $dto->getFirstName());
        $this->assertEquals($lastName, $dto->getLastName());
        $this->assertEquals(Access::ADMIN, $dto->getAccess());
    }
}