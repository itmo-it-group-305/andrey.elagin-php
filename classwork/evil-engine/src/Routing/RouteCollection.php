<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 15.02.16
 * Time: 19:07
 */
namespace Daddyingrave\EvilEngine\Routing;

class RouteCollection implements \IteratorAggregate, \Countable
{
    protected $routes = [];


    public function add($name, Route $route)
    {
        $this->routes[$name] = $route;
        return $this;
    }

    public function count()
    {
        return count($this->routes);
    }

    public function get($name)
    {
        return isset($this->routes[$name]) ? $this->routes[$name] : null;
    }

    public function getAll()
    {
        return $this->routes;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->routes);
    }

    public function remove($name)
    {
        unset($this->routes[$name]);
        return $this;
    }

    public function removeAll()
    {
        $this->routes = [];
        return $this;
    }
}