<?php

namespace Tests\Unit\Types;

use Omlet\SmartCoop\Enums\Access;
use Omlet\SmartCoop\Types\GroupSubset;
use Omlet\SmartCoop\Types\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserDto(): void
    {
        $userId = '1';
        $firstName = 'John';
        $lastName = 'Doe';
        $emailAddress = 'john.doe@omlet.co.uk';
        $siteLink = '/url';
        $invites = [
            new GroupSubset(
                '1',
                'New Group',
                'User'
            )
        ];

        $user = new User(
            $userId,
            $firstName,
            $lastName,
            $emailAddress,
            $siteLink,
            $invites
        );

        $this->assertInstanceOf(User::class, $user);
        $this->assertSame($userId, $user->getUserId());
        $this->assertSame($firstName, $user->getFirstName());
        $this->assertSame($lastName, $user->getLastName());
        $this->assertSame($emailAddress, $user->getEmailAddress());
        $this->assertSame($siteLink, $user->getSiteLink());
        $this->assertSame($invites, $user->getInvites());
    }
}
