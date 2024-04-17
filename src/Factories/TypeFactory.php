<?php

namespace Omlet\SmartCoop\Factories;

use Omlet\SmartCoop\Types\Action;
use Omlet\SmartCoop\Types\Configuration;
use Omlet\SmartCoop\Types\ConfigurationConnectivity;
use Omlet\SmartCoop\Types\ConfigurationDoor;
use Omlet\SmartCoop\Types\ConfigurationGeneral;
use Omlet\SmartCoop\Types\ConfigurationLight;
use Omlet\SmartCoop\Types\Device;
use Omlet\SmartCoop\Types\Group;
use Omlet\SmartCoop\Types\GroupSubset;
use Omlet\SmartCoop\Types\GroupUser;
use Omlet\SmartCoop\Types\NotificationPeriod;
use Omlet\SmartCoop\Types\NotificationSettings;
use Omlet\SmartCoop\Types\OmletType;
use Omlet\SmartCoop\Types\State;
use Omlet\SmartCoop\Types\StateConnectivity;
use Omlet\SmartCoop\Types\StateDoor;
use Omlet\SmartCoop\Types\StateGeneral;
use Omlet\SmartCoop\Types\StateLight;
use Omlet\SmartCoop\Types\User;

class TypeFactory
{
    public static function createDTO(OmletType $type, array $data): mixed
    {
        switch ($type) {
            case OmletType::CONFIGURATION:
                return new Configuration(
                    self::createDTO(OmletType::CONFIGURATION_GENERAL, $data['general']),
                    self::createDTO(OmletType::CONFIGURATION_CONNECTIVITY, $data['connectivity']),
                    self::createDTO(OmletType::CONFIGURATION_DOOR, $data['door']),
                    self::createDTO(OmletType::CONFIGURATION_LIGHT, $data['light']),
                );
            case OmletType::CONFIGURATION_GENERAL:
                return new ConfigurationGeneral(
                    $data['datetime'],
                    $data['timezone'],
                    $data['useDst'] ?? null,
                    $data['updateFrequency'],
                    $data['language'],
                    $data['overnightSleepEnable'],
                    $data['overnightSleepStart'],
                    $data['overnightSleepEnd'],
                    $data['pollFreq'],
                    $data['stayAliveTime'],
                    $data['statusUpdatePeriod']
                );
            case OmletType::CONFIGURATION_CONNECTIVITY:
                return new ConfigurationConnectivity(
                    $data['wifiState']
                );
            case OmletType::CONFIGURATION_DOOR:
                return new ConfigurationDoor(
                    $data['doorType'],
                    $data['openMode'],
                    $data['openDelay'],
                    $data['openLightLevel'],
                    $data['openTime'],
                    $data['closeMode'],
                    $data['closeDelay'],
                    $data['closeLightLevel'],
                    $data['closeTime'],
                    $data['colour']
                );
            case OmletType::CONFIGURATION_LIGHT:
                return new ConfigurationLight(
                    $data['mode'],
                    $data['minutesBeforeClose'],
                    $data['maxOnTime'],
                    $data['equipped'],
                );
            case OmletType::STATE:
                return new State(
                    self::createDTO(OmletType::STATE_GENERAL, $data['general']),
                    self::createDTO(OmletType::STATE_CONNECTIVITY, $data['connectivity']),
                    self::createDTO(OmletType::STATE_DOOR, $data['door']),
                    self::createDTO(OmletType::STATE_LIGHT, $data['light']),
                );
            case OmletType::STATE_GENERAL:
                return new StateGeneral(
                    $data['firmwareVersionCurrent'],
                    $data['firmwareVersionPrevious'],
                    $data['firmwareLastCheck'],
                    $data['batteryLevel'],
                    $data['powerSource'],
                    $data['uptime'],
                    $data['displayLine1'],
                    $data['displayLine2']
                );
            case OmletType::STATE_CONNECTIVITY:
                return new StateConnectivity(
                    $data['ssid'],
                    $data['wifiStrength']
                );
            case OmletType::STATE_DOOR:
                return new StateDoor(
                    $data['state'],
                    $data['lastOpenTime'],
                    $data['lastCloseTime'],
                    $data['fault'],
                    $data['lightLevel']
                );
            case OmletType::STATE_LIGHT:
                return new StateLight(
                    $data['state']
                );
            case OmletType::DEVICE:
                return new Device(
                    $data['deviceId'],
                    $data['name'],
                    $data['deviceType'],
                    self::createDTO(OmletType::STATE, $data['state']),
                    self::createDTO(OmletType::CONFIGURATION, $data['configuration']),
                    array_map(
                        fn (array $action) => self::createDTO(OmletType::ACTION, $action),
                        $data['actions']
                    )
                );
            case OmletType::ACTION:
                return new Action(
                    $data['actionName'],
                    $data['description'],
                    $data['actionValue'],
                    $data['actionPending'] ?? null,
                    $data['url']
                );
            case OmletType::GROUP_USER:
                return new GroupUser(
                    $data['emailAddress'],
                    $data['firstName'],
                    $data['lastName'],
                    $data['access'],
                );
            case OmletType::GROUP_SUBSET:
                return new GroupSubset(
                    $data['groupId'],
                    $data['groupName'],
                    $data['access'],
                );
            case OmletType::GROUP:
                return new Group(
                    $data['groupId'],
                    $data['groupName'],
                    $data['access'],
                    array_map(
                        fn (array $device) => self::createDTO(OmletType::DEVICE, $device),
                        $data['devices']
                    ),
                    array_map(
                        fn (array $admin) => self::createDTO(OmletType::GROUP_USER, $admin),
                        $data['admins']
                    ),
                    array_map(
                        fn (array $user) => self::createDTO(OmletType::GROUP_USER, $user),
                        $data['users']
                    )
                );
            case OmletType::NOTIFICATION_PERIOD:
                return new NotificationPeriod(
                    $data['start'],
                    $data['end'],
                );
            case OmletType::NOTIFICATION_SETTINGS:
                return new NotificationSettings(
                    $data['additionalSettings'] ?? null
                );
            case OmletType::USER:
                return new User(
                    $data['userId'] ?? null,
                    $data['firstName'],
                    $data['lastName'],
                    $data['emailAddress'] ?? null,
                    $data['siteLink'] ?? null,
                    $data['notificationSettings'] ?
                        self::createDTO(OmletType::NOTIFICATION_SETTINGS, $data['notificationSettings']) :
                        null,
                    $data['notificationPeriod'] ?
                        self::createDTO(OmletType::NOTIFICATION_PERIOD, $data['notificationPeriod']) :
                        null,
                    array_map(
                        fn (array $invite) => self::createDTO(OmletType::GROUP_SUBSET, $invite),
                        $data['invites']
                    )
                );
            default:
                throw new \InvalidArgumentException("Unknown DTO type: $type->value");
        }
    }

}