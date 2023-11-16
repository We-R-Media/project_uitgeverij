<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class RouteHelper
{
    /**
     * Check if a given route is currently active.
     *
     * This method compares the provided route name with the current route name
     * and returns true if they match, indicating that the route is currently active.
     *
     * @param string $routeName The name of the route to check for activity.
     * @return bool True if the route is currently active, otherwise false.
     */
    public static function isActivePage($routeName, $dynamicPath = null)
    {
        $isActive = Route::currentRouteName() == $routeName || request()->routeIs([ $dynamicPath ]);

        return $isActive ? 'navigation__link--active' : '';
    }

    /**
     * Check if a given route is currently active.
     *
     * This method compares the provided route name with the current route name
     * and returns true if they match, indicating that the route is currently active.
     *
     * @param string $routeName The name of the route to check for activity.
     * @return bool True if the route is currently active, otherwise false.
     */
    public static function isActiveSubpage($routeName)
    {
        return Route::currentRouteName() == $routeName ? "class=subpage--active" : '';
    }
}
