<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 22.01.16
 * Time: 15:59
 */

$currentDir = __DIR__;
$dir = opendir($currentDir);

while (($file = readdir($dir)) !== false) {
    if (!is_dir($file)) {

    }
}

$content = readdir($dir);
//var_dump(is_dir($dir));

//
//
//if (is_dir($dir)) {
//    if ($dh = opendir($dir)) {
//        while (($file = readdir($dh)) !== false) {
//            echo "файл: $file : тип: " . filetype($dir . $file) . "\n";
//        }
//        closedir($dh);
//    }
//}
