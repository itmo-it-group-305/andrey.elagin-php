<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 20.01.16
 * Time: 18:49
 */

const DB_DIR = 'db';

function createFilenameItem($entity, $id)
{
    return DB_DIR . DIRECTORY_SEPARATOR . sprintf(getFileNamePattern($entity), $id);
}


// entityName_id.json => post_1.json, user_1.json
function getFileNamePattern($entity)
{
    return $entity . '_%d.json';
}


function storageGetAll($entity)
{
    $items = [];

    $dir = @opendir(DB_DIR);

    if (!$dir) {
        return $items;
    }

    do {
        $filename = readdir($dir);

        list($id) = sscanf($filename, getFileNamePattern($entity));

        if ($id) {
            $items[] = storageGetItemByID($entity, $id);
        }

    } while ($filename);

    closedir($dir);

    return $items;
}


function storageGetItemByID($entity, $id)
{
    $fileName = createFilenameItem($entity, $id);

    if (!is_readable($fileName)) {
        return null;
    }

    return json_decode(file_get_contents($fileName), true);
}


function storageSaveItem($entity, &$item)
{
    $id = isset($item['id']) ? $item['id'] : 0;
    $storedItem = storageGetItemByID($entity, (int) $id) ?: [];

    if ($id && !$storedItem) {
        return false;
    }

    $item = array_merge($storedItem, $item);

    if (!$id) {
        $items = storageGetAll($entity);

        foreach ($items as $storedItem) {
            if ($storedItem['id'] > $id) {
                $id = $storedItem['id'];
            }
        }

        $id += 1;
    }

    $item['id'] = (int) $id;

    $filename = createFilenameItem($entity, $id);
    $status = file_put_contents($filename, json_encode($item), LOCK_EX);

    return (bool) $status;
}






























