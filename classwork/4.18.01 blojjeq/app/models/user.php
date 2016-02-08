<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 24.01.16
 * Time: 17:21
 */

const ENTITY_USER = 'user';

function getAllUsers()
{
    return storageGetAll(ENTITY_USER);
}


function getUserById($id)
{
    return storageGetItemByID(ENTITY_USER, $id);
}


function saveUser(array $data, array &$errors = null)
{
    $id = isset($data['id']) ? $data['id'] : null;
    $user = $data;

    if ($errors) {
        var_dump($user . ' error');
        return $user;
    }

    $user['updated'] = mktime();

    if (!$id) {
        $user['created'] = mktime();
    }

    $status = storageSaveItem(ENTITY_USER, $user);

    if (!$status) {
        $errors['db'] = 'Не удалось записать данные в базу';
    }
    var_dump($user . ' its okay');
    return $user;
}