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
function is_active($page, $class = 'active')
{
	return Request::is($page) ? $class : '';
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
	return Route::currentRouteNamed($name) ? $class : '';
}
