<?php

/**
 * File Acl.php
 *
 * @author Giang Vu
 *
 * @version 1.0
 */

namespace App\Acl;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final class Acl
{
    const ROLE_SUPER_ADMIN = 'super admin';

    const ROLE_ADMIN = 'admin';

    const ROLE_STAFF = 'staff';

    const ROLE_CUSTOMER = 'customer';

    const PERMISSION_ASSIGNEE = 'assignee';

    const PERMISSION_VIEW_MENU_PERMISSION = 'view menu permission';

    const PERMISSION_VIEW_MENU_DASHBOARD = 'view menu dashboard';

    const PERMISSION_VIEW_MENU_ADMIN = 'view menu admin';

    const PERMISSION_VIEW_MENU_STAFF = 'view menu partner';

    const PERMISSION_VIEW_MENU_ROLE_PERMISSION = 'view menu role-permission';

    const PERMISSION_VIEW_MENU_ACCOUNT = 'view menu account';

    const PERMISSION_VIEW_TELESCOPE = 'view telescope';

    const PERMISSION_PERMISSION_MANAGE = 'manage permission';

    const PERMISSION_USER_MANAGE = 'manage user';

    const PERMISSION_USER_LIST = 'user list';

    const PERMISSION_USER_ADD = 'user add';

    const PERMISSION_USER_EDIT = 'user edit';

    const PERMISSION_USER_DELETE = 'user delete';

    const PERMISSION_CUSTOMER_MANAGE = 'manage customer';

    const PERMISSION_CUSTOMER_LIST = 'customer list';

    const PERMISSION_CUSTOMER_ADD = 'customer add';

    const PERMISSION_CUSTOMER_EDIT = 'customer edit';

    const PERMISSION_CUSTOMER_DELETE = 'customer delete';

    const PERMISSION_EDIT_GENERAL_SETTING = 'general setting edit';

    const PERMISSION_EDIT_INTEGRATION_SETTING = 'integration setting edit';

    const PERMISSION_VIEW_MENU_SYSTEM_PROPERTIES_PERMISSION = 'view menu system properties';

    /**
     * @param  array  $exclusives Exclude some permissions from the list
     */
    public static function permissions(array $exclusives = []): array
    {
        try {
            $class = new \ReflectionClass(__CLASS__);
            $constants = $class->getConstants();
            $permissions = Arr::where($constants, function ($value, $key) use ($exclusives) {
                return ! in_array($value, $exclusives) && Str::startsWith($key, 'PERMISSION_');
            });

            return array_values($permissions);
        } catch (\ReflectionException $exception) {
            return [];
        }
    }

    public static function menuPermissions(): array
    {
        try {
            $class = new \ReflectionClass(__CLASS__);
            $constants = $class->getConstants();
            $permissions = Arr::where($constants, function ($value, $key) {
                return Str::startsWith($key, 'PERMISSION_VIEW_MENU_');
            });

            return array_values($permissions);
        } catch (\ReflectionException $exception) {
            return [];
        }
    }

    public static function roles(): array
    {
        try {
            $class = new \ReflectionClass(__CLASS__);
            $constants = $class->getConstants();
            $roles = Arr::where($constants, function ($value, $key) {
                return Str::startsWith($key, 'ROLE_');
            });

            return array_values($roles);
        } catch (\ReflectionException $exception) {
            return [];
        }
    }
}
