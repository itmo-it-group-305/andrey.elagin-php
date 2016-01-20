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


function savePost($data, &$errors = null)
{
    $id = isset($data['id']) ? $data['id'] : null;
    $post = getPostById($id) ?: [];

    if ($id && !$post) {
        return false;
    }

    $post = array_merge($post, $data); //объединили данные. данные в хранилище заменены новыми

    $post['updated'] = mktime();

    if (!$id) {
        $post['created'] = mktime();
    }

    //fixme: нужно возвращать другое значение, передать post по ссылке
    $post = storageSaveItem(ENTITY_POST, $post);

    if (!$post) {
        $errors['db'] = 'Не удалось записать данные в базу';
    }

    return $post;
}