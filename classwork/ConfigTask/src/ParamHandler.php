<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 08.02.16
 * Time: 20:58
 */

namespace Daddyingrave\ConfigTask;

class ParamHandler
{
    protected static $handlers = [];

    public static function addHandler($type, $className)
    {
        if (!is_subclass_of($className, self::class)) {
            throw new \Exception('class is not paramHandler');
        }
        $type = strtolower($type);
        self::$handlers[$type] = $className;
    }

    public static function getInstance($type)
    {
        $type = strtolower($type);
        $className = isset(self::$handlers[$type]) ? self::$handlers[$type] : null;

        $obj = new $className();
        return $obj;
    }
}