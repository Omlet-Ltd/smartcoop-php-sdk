<?php

namespace Omlet\SmartCoop\Types;

enum OmletType: string {
    case CONFIGURATION = 'configuration';
    case CONFIGURATION_GENERAL = 'configuration_general';
    case CONFIGURATION_CONNECTIVITY = 'configuration_connectivity';
    case CONFIGURATION_DOOR = 'configuration_door';
    case CONFIGURATION_LIGHT = 'configuration_light';
    case STATE = 'state';
    case STATE_GENERAL = 'state_general';
    case STATE_CONNECTIVITY = 'state_connectivity';
    case STATE_DOOR = 'state_door';
    case STATE_LIGHT = 'state_light';
    case DEVICE = 'device';
    case ACTION = 'action';

    case GROUP = 'group';
    case GROUP_SUBSET = 'group_subset';
    case GROUP_USER = 'group_user';
    case USER = 'user';
    case NOTIFICATION_SETTINGS = 'notification_settings';
    case NOTIFICATION_PERIOD = 'notification_period';
}
