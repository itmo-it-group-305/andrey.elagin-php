<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12.01.16
 * Time: 22:32
 */

$year = 2016;
$yearCheck = ($year % 400 == 0 ? true : ($year % 100 == 0 ? false : ($year % 4 == 0 ? true : false)));
var_dump($yearCheck);