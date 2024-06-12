<?php

if (!function_exists('checkPermission')) {

    /**
     * Check permission from current user
     *
     * @param string $permission
     * @return bool
     */
    function checkPermission($permission)
    {
        return auth()->user()->hasPermissionTo($permission);
    }
}

if (!function_exists('customPriceFormat')) {

    /**
     * Check permission from current user
     *
     * @param $value
     * @return string
     */
    function customPriceFormat($value): string
    {
        return number_format($value, 0, ',', '.');
    }
}

if (!function_exists('checkPermissions')) {

    /**
     * Check permissions from current user
     *
     * @param array $permissions
     * @return bool
     */
    function checkPermissions($permissions)
    {
        return auth()->user()->hasAnyPermission($permissions);
    }
}

if (!function_exists('layoutConfig')) {
    function layoutConfig()
    {
        // Login
        if (Request::is('login')) {

            $__getConfiguration = Config::get('app-config.layout.vlm');

        } else {
            $__getConfiguration = Config::get('app-config.layout.vlm');
        }

        return $__getConfiguration;
    }
}

if (!function_exists('getRouterValue')) {
    function getRouterValue()
    {

        if (Request::is('modern-light-menu/*')) {

            $__getRoutingValue = '/modern-light-menu';

        } elseif (Request::is('modern-dark-menu/*')) {

            $__getRoutingValue = '/modern-dark-menu';

        } elseif (Request::is('collapsible-menu/*')) {

            $__getRoutingValue = '/collapsible-menu';

        } elseif (Request::is('horizontal-light-menu/*')) {

            $__getRoutingValue = '/horizontal-light-menu';

        } elseif (Request::is('horizontal-dark-menu/*')) {

            $__getRoutingValue = '/horizontal-dark-menu';

        } // RTL

        elseif (Request::is('rtl/modern-light-menu/*')) {

            $__getRoutingValue = '/rtl/modern-light-menu';

        } elseif (Request::is('rtl/modern-dark-menu/*')) {

            $__getRoutingValue = '/rtl/modern-dark-menu';

        } elseif (Request::is('rtl/collapsible-menu/*')) {

            $__getRoutingValue = '/rtl/collapsible-menu';

        } elseif (Request::is('rtl/horizontal-light-menu/*')) {

            $__getRoutingValue = '/rtl/horizontal-light-menu';

        } elseif (Request::is('rtl/horizontal-dark-menu/*')) {

            $__getRoutingValue = '/rtl/horizontal-dark-menu';

        } // Login

        elseif (Request::is('login')) {

            $__getRoutingValue = '/modern-light-menu';

        } else {
            $__getRoutingValue = '';
        }

        return $__getRoutingValue;
    }
}
