<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 18.01.16
 * Time: 18:56
 */

const ENTITY_POST = 'post';

function getAllPosts()
{
    return storageGetAll(ENTITY_POST);
}


function getPostById($id)
{
    return storageGetItemByID(ENTITY_POST, $id);
}


function savePost(array $data, array &$errors = null)
{
    $id = isset($data['id']) ? $data['id'] : null;
    $post = $data; // => результат после очистки и валидации

    if ($errors) {
        return $post;
    }

    $post['updated'] = mktime();

    if (!$id) {
        $post['created'] = mktime();
    }

    $status = storageSaveItem(ENTITY_POST, $post);

    if (!$status) {
        $errors['db'] = 'Не удалось записать данные в базу';
    }

    return $post;
}