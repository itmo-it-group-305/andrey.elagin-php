<?php

//function fact($x)
//{
//    return $x == 0 ? 1 : $x * fac($x - 1);
//}
//
//echo fact(0);

//localhost:8000/index.php?action=show&id=1
//localhost:8000/index.php?action=about

//localhost:8000/show/1
//localhost:8000/about

//include 'actions.php'; // скрипт завершается. работает быстро
//include_once 'actions.php';
//require 'actions.php'; // скрипт прерывается?? работает медленно
require_once 'actions.php';

function runAction($name = null, ...$args)
{
    $name = $name ?: 'index';
    $action = $name . 'Action';

    if (!function_exists($action)) {
        header('HTTP/1.1 404 Not found');
        exit('Satan welcomes');
    }

    $action(...$args);
}

$action = isset($_GET['action']) ? $_GET['action'] : null;

ini_set('display_errors', 1);

runAction($action, $_GET);

// < 5.6 ...
// call_user_func_array('', []);










