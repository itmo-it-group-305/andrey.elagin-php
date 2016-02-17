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


    public function __construct()
    {
        $this->routes = new RouteCollection();
    }


    public function addRoutes(array $routes)
    {
        foreach ($routes as $name => $route) {
            if (array_diff(['pattern', 'controller'], array_keys($route))) {
                throw new InvalidRouteException('Invalid route');
            }

            $route['params'] = isset($route['params']) ? $route['params'] : [];
            $this->routes->add($name, new Route(
                $route['pattern'], $route['controller'], $route['params']
            ));
        }

        return $this;
    }

    public function createUrl($routeName, array $params = [])
    {
        $route = $this->routes->get($routeName);

        if (!$route) {
            throw new InvalidRouteException('fig');
        }

        $srcNames = $route->getParamNames();
        $names = array_keys($params);

        if (array_diff($srcNames, $names)) {
            throw new \LogicException('Missing params');
        }

        $replacePairs = [];

        foreach ($params as $name => $value) {
            $replacePairs["{{$name}}"] = urlencode($value);
        }

        return strtr($route->getPattern(), $replacePairs);

    }


    public function dispatch($requestUri)
    {
        $uri = parse_url($requestUri, PHP_URL_PATH);

        foreach ($this->routes as $name => $route) {
            if (preg_match($route->compile(), $uri, $matches)) {
                return (object) [
                    'controller' => $route->getController(),
                    'params' => array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY),
                ];
            }

        }
        throw new InvalidRouteException('Route not found');
    }



    protected function getParamNames($pattern)
    {
        preg_match_all('~{(?P<names>\w+)}~i', $pattern, $matches);
        return $matches['names'];
    }
}

