<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12.01.16
 * Time: 23:14
 */

$time = date(i) % 8;
$color = ($time > 3 && $time < 6) ? "red" : "green";
echo $color;