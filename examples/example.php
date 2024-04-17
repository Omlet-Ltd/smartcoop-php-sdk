<?php

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$apiKey = $_ENV['API_KEY'];

if (!$apiKey) {
    throw new Exception('API key not set');
}

$omlet = \Omlet\SmartCoop\Omlet::create($apiKey);

// list devices
//$devices = $omlet->getDevices();
//foreach ($devices as $device) {
//    $id = $device->getData()->getDeviceId();
//    $name = $device->getData()->getName();
//    $type = $device->getData()->getDeviceType();
//    $rows[] = [$id, $name, $type];
//}
//
//echo "ID\tName\tType\n";
//
//foreach ($rows as $row) {
//    echo implode("\t", $row) . "\n";
//}

// list device action
//$device = $omlet->getDeviceById($devices[0]->getData()->getDeviceId());
//foreach ($device->getActions() as $action) {
//    echo $action->getDescription() . "\n";
//}

// Open door
//$device->action(\Omlet\SmartCoop\Enums\ActionType::OPEN_DOOR);

// retrieve groups
//$groups = $omlet->getGroups();

// create groups
//$group = $omlet->createGroup('Examples');

//get group
//$group = $omlet->getGroupById('123');

// update group
//$group->updateGroupName("Updated James");

// retrieve user
//$user = $omlet->getUser();
//print_r($user->getData()->getInvites());