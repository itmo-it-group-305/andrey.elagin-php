<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 10.02.16
 * Time: 19:28
 */
require_once __DIR__ . '/vendor/autoload.php';

use Daddyingrave\EvilEngine\Http\ParamsContainer;
use Daddyingrave\EvilEngine\Http\Request;
use Daddyingrave\EvilEngine\Routing\Router;

//$pattern = '~{(?P<params>\w+)}~';
//$url = '/post/{cat}/{name}';
//
//preg_match_all($pattern, $url, $matches);
//var_dump($matches['params']);

$routes = [
    'post_index' => [
        'pattern' => '/',
        'controller' => '\Daddyingrave\MegaBlog\Controller\PostController:index',
    ],
    'post_show' => [
        'pattern' => '/post/{id}',
        'controller' => '\Daddyingrave\MegaBlog\Controller\PostController:show',
        'params' => [
            'id' => '\d+',
        ],
    ],
    'post_new' => [
        'pattern' => '/post/new',
        'controller' => '\Daddyingrave\MegaBlog\Controller\PostController:new',
    ],
    'post_edit' => [
        'pattern' => 'post/{id}/edit',
        'controller' => '\Daddyingrave\MegaBlog\Controller\PostController:edit',
        'params' => [
            'id' => '\d+',
        ],
    ],
    'test_route' => [
        'pattern' => '/test/{cat}/{id}/{some}',
        'controller' => 'Controller',
        'params' => [
            'id' => '\d+',
            'some' => 'AA[a-z]*?BB',
        ],
    ],
];

//foreach ($routes as $name => $value) {
//    var_dump($name, $value);
//}


$router = new Router();
$router->addRoutes($routes);

var_dump($router->createUrl('post_show', ['id' => 1]));


//var_dump($router->createUrl('post_show', ['id' => 666,]));

//todo спросить у Кирилла почему так работает foreach
//$replacePairs = ['4len' => 27];
//var_dump($replacePairs);
//foreach ($replacePairs as $key => $value) {
//    $replacePairs[$value * 2] = $key;
//    var_dump($replacePairs);
//}
//var_dump($replacePairs);

//$uri = 'http://huy.com/path/argvalue';
//$url = parse_url($uri, PHP_URL_PATH);
//var_dump($url);

//$name = '4len';
//$value = 'Satan';
//$replacePairs["{{$name}}"] = $value;
//var_dump($replacePairs);
//$trans = array("h" => "-", "hello" => "hi", "hi" => "hello", 'i' => 'G');
//echo strtr("hi all, I said hello h", $trans);

//var_dump($router->dispatch('/post/0'));

//var_dump(
//    $router
//);
//$pattern = '/post/{id}';
//preg_match_all('~{(?P<names>\w+)}~i', $pattern, $matches);
//var_dump($matches['names']);

//реализовать createUrl и dispatch