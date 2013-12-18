<?php

/**
 * Return a CSS class for active page if it matches the given page.
 *
 * @param  string $page  The page name to test against.
 * @param  string $class A custom class name to be returned, 'active' by
 *                       default.
 * @return string        If the user is on the given page, will return
 *                       the active class, otherwise blank string.
 */
function is_active($name, $class = 'active')
{
	if(!is_array($name))
		return Request::is($name) ? $class : '';
	else
	{
		foreach($name as $page)
		{
			if(Route::is($page))
				return $class;
		}

		return '';
	}
}

/**
 * Return a CSS class for active page if the current page matches the
 * given named route.
 *
 * @param  string $name  The route name to test against.
 * @param  string $class A custom class name to be returned, 'active' by
 *                       default.
 * @return string        If the user is on the given route, will return
 *                       the active class, otherwise blank string.
 */
function route_active($name, $class = 'active')
{
	if(!is_array($name))
		return Route::currentRouteNamed($name) ? $class : '';
	else
	{
		foreach($name as $route)
		{
			if(Route::currentRouteNamed($route))
				return $class;
		}

		return '';
	}
}
