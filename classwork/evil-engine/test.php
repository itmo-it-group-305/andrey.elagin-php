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

$pattern = '~{(?P<params>\w+)}~';
$url = '/post/{cat}/{name}';

preg_match_all($pattern, $url, $matches);
var_dump($matches['params']);

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
];

$router = new Router();
$router->addRoutes($routes);

$router->createUrl('post_show', ['id' => 1,]);

$router->dispatch('/post/1');

var_dump(
    $router
);

//реализовать createUrl и dispatch