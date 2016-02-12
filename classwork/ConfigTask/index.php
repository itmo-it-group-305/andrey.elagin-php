<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 08.02.16
 * Time: 18:45
 */
use Daddyingrave\ConfigTask\ParamHandler;
use Daddyingrave\ConfigTask\XMLParamHandler;


require_once __DIR__ . '/vendor/autoload.php';

ParamHandler::addHandler('xml', XMLParamHandler::class);
ParamHandler::addHandler('test', 'Daddyingrave\ConfigTask\Test\TestParamHandler');

var_dump(
    ParamHandler::getInstance('Xml'),
    ParamHandler::getInstance('test')
);
