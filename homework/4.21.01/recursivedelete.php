<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 22.01.16
 * Time: 15:59
 * @param $path
 */

function deleteRec($path)
{
    if (is_dir($path)) {
        $temp = opendir($path);
        while ($newTemp = readdir($temp)) {
            if ($newTemp == '.' || $newTemp == '..') continue;
            if (is_file($newTemp)) {
                unlink("$path/$newTemp");
            }
            else {
                deleteRec("$path/$newTemp");
            }
        }
        closedir($temp);
        rmdir($path);
    } else {
        unlink($path);
    }
}

$currentDir = '/home/daddyingrave/Storage/home/daddyingrave/Yandex.Disk/Study/andrey.elagin-php/homework/4.21.01/testfolder';
deleteRec($currentDir);