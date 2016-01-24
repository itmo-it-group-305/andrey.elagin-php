<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 20.01.16
 * Time: 18:49
 */
//добавил два директории для юзернэймов и постов
const DB_DIR_POST = 'db/posts';
const DB_DIR_USER = 'db/users';

function createFilenameItem($entity, $id)
{
    if ($entity == 'post') {
        return DB_DIR_POST . DIRECTORY_SEPARATOR . sprintf(getFileNamePattern($entity), $id);
    } else {
        return DB_DIR_USER . DIRECTORY_SEPARATOR . sprintf(getFileNamePattern($entity), $id);
    }
}


// entityName_id.json => post_1.json, user_1.json
function getFileNamePattern($entity)
{
    return $entity . '_%d.json';
}


function storageGetAll($entity)
{
    $items = [];
    $dir = $entity == 'user' ? @opendir(DB_DIR_USER) : @opendir(DB_DIR_POST);

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
    $some = json_decode(file_get_contents($fileName), true);
    return $some;
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






























