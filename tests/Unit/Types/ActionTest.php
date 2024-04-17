<?php

namespace Tests\Unit\Types;

use PHPUnit\Framework\TestCase;
use Omlet\SmartCoop\Types\Action;

class ActionTest extends TestCase
{
    public function testActionDto(): void
    {
        $actionName = 'Open';
        $description = 'Open door';
        $value = 'open';
        $pending = 'openpending';
        $url = '/device/NsAKflxaCkDLkiO9/open';

        $action = new Action($actionName, $description, $value, $pending, $url);

        $this->assertEquals($actionName, $action->getName());
        $this->assertEquals($description, $action->getDescription());
        $this->assertEquals($value, $action->getValue());
        $this->assertEquals($pending, $action->getPending());
        $this->assertEquals($url, $action->getUrl());
    }
}
