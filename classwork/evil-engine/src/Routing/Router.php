<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 12.02.16
 * Time: 21:06
 */
namespace Daddyingrave\EvilEngine\Routing;

use Daddyingrave\EvilEngine\Http\Request;

class Router
{
    protected $routes = [];

    public function addRoutes(array $routes)
    {
        foreach ($routes as $name => $route) {
            if (array_diff(['pattern', 'controller'], array_keys($route))) {
                throw new InvalidRouteException('Invalid route');
            }

            $route['params'] = isset($route['params']) ? $route['params'] : [];
            $this->routes[$name] = $route;
        }

        return $this;
    }

    public function createUrl($routeName, array $params = [])
    {

    }

    public function dispatch($requestUri)
    {

    }
}