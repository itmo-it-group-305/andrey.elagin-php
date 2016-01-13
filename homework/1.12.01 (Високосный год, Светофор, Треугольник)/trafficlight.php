<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12.01.16
 * Time: 23:14
 */

$time = date(i) % 5;
//не правильно понял условие видимо $color = ($time > 3 && $time < 6) ? "red" : "green";
$color = ($time <= 3) ? "green" : "red";
echo $color;