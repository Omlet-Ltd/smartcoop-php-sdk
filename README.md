# Omlet PHP SDK
This SDK is designed to facilitate seamless authentication with Omlet and provide interaction with 
devices. With our SDK, developers can easily retrieve device information, and execute actions 
tailored to their devices and groups.

## Introduction
- [Getting Started](#getting-started)
- [Authentication](#authentication)
- [Omlet](#omlet)
- [Device Handler](#device-handler)
- [Group Handler](#group-handler)
- [User Handler](#user-handler)
- [Types](#types)

## Getting Started

### Overview
To use this SDK the user will already be registered with omlet as you will use the same email and password credentials to authenticate.
We will go through the steps for including this SDK in your application and how to interact with your devices.

### Installation
To install the SmartCoop SDK, ensure you have Composer installed on your system. Then, create or navigate to your project 
directory and execute the following command:

```bash
composer require omlet/smartcoop-sdk
```

From the root of your project, now run:

```bash
composer install
```

Once installed you will use your email and password to generate an API key that will be used subsequently for all interactions. 

## Authentication

### Create API Key

To generate an API key you'll need to login to the developer console with the email
and password that use for the App. Once logged in navigate to "API Keys" and click 
"Generate Key". Take note of this key.

Create a .env file in your project root and then copy the contents of env.example into it. Use the token generated above for API_KEY

## Omlet

### Overview
The Omlet object offers the ability to retrieve all of your devices, get a single device, create a
group handler and create a user handler.

### Creating an Instance
```php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$token = $_ENV['API_TOKEN'];
if (!$token) {
    throw new Exception('token environment variable is not set.');
}

$omlet = \Omlet\SmartCoop\Omlet::create($token);
```
### Retrieving Devices
```php
$devices = $omlet->getDevices();
foreach ($devices as $device) {
    // a list of your devices
}

// a single device
$device = $omlet->getDeviceById('123456');
```
These functions will return a [Device Handler](#device-handler) that will allow you to interact with individual devices.

### Create a Group
```php
$group = $omlet->createGroup("New Group name");
```

### Retrieving Groups
```php
$groups = $omlet->getGroups();
foreach ($groups as $$group) {
    // a list of your groups
}

// a single group
$group = $omlet->getGroupById('groupID')
```

### Retrieving the User
```php
$user = $omlet->getUser();
```

## Device Handler
The Device Handler offers a way to interact with a specific device and also see the [Device data](#device).

### Device Data
The Device Handler will hold a [data](#device) object with the latest [state](#state) and [configuration](#configuration) of the device. You can
access each of the attributes through getter methods.

### Device Actions
Device [actions](#action) are used to interact with the device. A list of available actions is present on the device data. We can 
perform actions on the device by retrieving one from the list:

```php
$deviceHandler = $omlet->getDeviceById('123456');
$deviceHandler->getActions();
```

The [action](#action) object contains a description of the action. To perform an action,
filter out the action you want to perform, such as opening the door and pass it to the `action` function

```php
$deviceHandler->action($action)
```

### Updating Device Configuration
To update the devices configuration, we will need to interact with the [Configuration](#configuration) object.

```php
$configuration = $deviceHandler->getData()->getConfiguration()->copy();
```

This object will give you the current configuration of your device. You can then use setter methods to change the values.

For example, if we want to change the time that your device door opens:

```php
$configuration = $deviceHandler->getData()->getConfiguration()->copy();
$doorConfiguration = $configuration->getDoor();
$doorConfiguration->setOpenTime("07:30");
$configuration->setDoor($doorConfiguration);

$device->updateConfiguration($configuration);
```

## Group Handler
The Group Handler offers a way to interact with a specific group and also see the group data.

### Group Data
The Group Handler will hold a [data](#group-data) object with group information, users, admins and devices belonging to the group

## Update Group Name
We can update a single groups name.

```php
$groupHandler->updateGroupName("New Name");
```

## Delete Group
We can remove the group associated with the handler.

```php
$groupHandler->deleteGroup();
```

## Invite User
We can invite users to the current group by email and specify their access.

```php
// invite a user with User access
$groupHandler->inviteUser("user@example.com", Acccess::USER);

// invite a user with Admin access
$groupHandler->inviteUser("user@example.com", Acccess::ADMIN);
```

## Remove User
We can remove users from the group by their email address.

```php
$groupHandler->removeUser("user@example.com");
```

## Update User Access
We can update the users access level by their email address.

```php
$groupHandler->updateUserAccess("user@example.com", Acccess::ADMIN);
```

## User Handler
The User Handler offers a way to interact with features for the authenticated user.

### User Data
The User Handler will hold a [data](#user) object with users information and invites.

### Accept Invite
We can accept an invite by retrieving one from the data objects invites array"

```php
$invites = $userHandler->getData()->getInvites();

// invites is an array containing GroupSubset objects. Pass one of these
// to acceptInvite

$userHandler->acceptInvite($groupSubset);
```

### Reject Invite
We can reject an invite by retrieving one from the data objects invites array:

```php
$invites = $userHandler->getData()->getInvites();

// invites is an array containing GroupSubset objects. Pass one of these
// to rejectInvite

$userHandler->rejectInvite($groupSubset);
```

## Types
We have the following data types that we use response and request from the Omlet API

### Action
The `Action` object provides the following details

#### Methods
- `getName()`: Returns the name of the action.
- `getDescription()`: Returns the description of the action.
- `getValue()`: Returns the value associated with the action.
- `getPending()`: Returns the pending status of the action. Can return null if not applicable.
- `getUrl()`: Returns the URL that the action can be performed against the API

### Configuration
The `Configuration` object will give you an overview of the current configuration of the device after retrieval

#### Methods
- `getGeneral()`: Returns the [General](#configuration-general) settings.
- `getConnectivity()`: Returns the [Connectivity](#configuration-connectivity) settings.
- `getDoor()`: Returns the [Door](#configuration-door) settings.
- `getLight()`: Returns the [Light](#configuration-light) settings.
- `copy()`: Returns the NEW [Configuration](#configuration) type with the same details. Important to use when updating configuration.

### Configuration Connectivity
The `Configuration Connectivity` object provides the following details

#### Methods
- `getBluetoothState()`: Returns the state of Bluetooth connectivity.
- `getWifiState()`: Returns the state of Wi-Fi connectivity.

### Configuration Door
The `Configuration Door` object provides the following details

#### Methods
- `getDoorType()`: Returns the type of the door.
- `getOpenMode()`: Returns the mode in which the door opens.
- `getOpenDelay()`: Returns the delay before the door opens.
- `getOpenLightLevel()`: Returns the light level when the door opens.
- `getOpenTime()`: Returns the time when the door opens.
- `getCloseMode()`: Returns the mode in which the door closes.
- `getCloseDelay()`: Returns the delay before the door closes.
- `getCloseLightLevel()`: Returns the light level when the door closes.
- `getCloseTime()`: Returns the time when the door closes.
- `getColour()`: Returns the color of the door.

### Configuration General
The `Configuration General` object provides the following details

#### Methods
- `getDatetime()`: Returns the current date and time.
- `getTimezone()`: Returns the timezone.
- `getUseDst()`: Returns whether daylight saving time is used.
- `getUpdateFrequency()`: Returns the update frequency.
- `getLanguage()`: Returns the language setting.
- `getOvernightSleepEnable()`: Returns whether overnight sleep mode is enabled.
- `getOvernightSleepStart()`: Returns the start time of overnight sleep mode.
- `getOvernightSleepEnd()`: Returns the end time of overnight sleep mode.
- `getPollFreq()`: Returns the polling frequency.
- `getStayAliveTime()`: Returns the stay alive time.
- `getStatusUpdatePeriod()`: Returns the status update period.

### Configuration Light
The `Configuration Light` object provides the following details

#### Methods
- `getMode()`: Returns the mode of the light.
- `getMinutesBeforeClose()`: Returns the number of minutes before the light automatically closes.
- `getMaxOnTime()`: Returns the maximum time the light can stay on.
- `getEquipped()`: Returns whether the light is equipped or not.

### Device
The `Device` object represents an individual SmartCoop device.

#### Methods

- `getDeviceId()`: Returns the unique identifier of the device.
- `getName()`: Returns the name of the device.
- `getDeviceType()`: Returns the type of the device.
- `getState()`: Returns the current [State](#state) of the device.
- `getConfiguration()`: Returns the [Configuration](#configuration) settings of the device.
- `getActions()`: Returns an array of [Actions](#action) that can be performed on the device.

### Group
The `Group` object represents a group the user belongs to.

#### Methods
- `getGroupId()`: Returns the unique identifier of the group.
- `getGroupName()`: Returns the friendly name assigned to the group.
- `setGroupName(string $groupName)`: void: Sets the friendly name of the group.
- `getAccess(`): Returns the access level the user has to this group. Can be Admin or User.
- `getDevices()`: Returns an array of devices associated with this group.
- `getAdmins()`: Returns an array of users who are administrators of this group.
- `getUsers()`: Returns an array of users who are members of this group.

### Group Subset
#### Methods:
- `getGroupId()`: Returns the unique identifier of the group subset.
- `getGroupName()`: Returns the friendly name assigned to the group subset.
- `getAccess()`: Returns the access level the user has to this group subset.

### Group User
#### Methods
- `getEmailAddress()`: Returns the email address of the user.
- `getFirstName()`: Returns the first name of the user.
- `getLastName()`: Returns the last name of the user.
- `getAccess()`: Returns the access level the user has to the group.

### State
The `State` object will give you an overview of the current state of the device after retrieval

#### Methods
- `getGeneral()`: Returns the [StateGeneral](#state-general) object representing general state information.
- `getConnectivity()`: Returns the [StateConnectivity](#state-connectivity) object representing connectivity state information.
- `getDoor()`: Returns the [StateDoor](#state-door) object representing door state information.
- `getLight()`: Returns the [StateLight](#state-light) object representing light state information.

### State Connectivity
The `State Connectivity` object provides the following details

#### Methods
- `getSsid()`: Returns the SSID (Service Set Identifier) of the device's Wi-Fi network.
- `getWifiStrength()`: Returns the strength of the device's Wi-Fi signal.
- `getWifiPowerLevel()`: Returns the power level of the device's Wi-Fi.
- `getBluetoothStrength()`: Returns the strength of the device's Bluetooth signal.

### State Door
The `State Door` object provides the following details

#### Methods
- `getState()`: Returns the current state of the door: "open" or "closed".
- `getLastOpenTime()`: Returns the timestamp when the door was last opened.
- `getLastCloseTime()`: Returns the timestamp when the door was last closed.
- `getFault()`: Returns any fault information related to the door.
- `getLightLevel()`: Returns the light level of the door.

### State General
The `State General` object provides the following details

#### Methods
- `getFirmwareVersionCurrent()`: Returns the current firmware version of the device.
- `getFirmwareVersionPrevious()`: Returns the previous firmware version of the device.
- `getFirmwareLastCheck()`: Returns the date and time when the firmware was last checked.
- `getBatteryLevel()`: Returns the battery level of the device.
- `getPowerSource()`: Returns the power source of the device.
- `getUptime()`: Returns the uptime of the device.
- `getDisplayLine1()`: Returns the first display line content.
- `getDisplayLine2()`: Returns the second display line content.

### State Light
The `State Light` object provides the following details

#### Methods
- `getState()`: Returns the current state of the light: "on" or "off".

### User
The `User` object represents the authenticated user.

#### Methods:
- `getUserId()`: Returns the unique identifier of the user.
- `getFirstName()`: Returns the first name of the user.
- `getLastName()`: Returns the last name of the user.
- `getEmailAddress()`: Returns the email address of the user.
- `getSiteLink()`: Returns the website link associated with the user.
- `getInvites()`: Returns an array of [Group Subsite](#group-subset) invitations.