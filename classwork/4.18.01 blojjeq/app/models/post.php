<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 18.01.16
 * Time: 18:56
 */


function getAllPosts()
{
    return [
        [
            'id' => 1,
            'title' => 'Post #1',
            'content' => 'First post',
            'created' => mktime(),
            'updated' => mktime(),
        ],
            [
            'id' => 2,
            'title' => 'Post #2',
            'content' => 'Second post',
            'created' => mktime(),
            'updated' => mktime(),
        ],
        [
            'id' => 3,
            'title' => 'Post #3',
            'content' => 'Third post',
            'created' => mktime(),
            'updated' => mktime(),
        ],
    ];
}


function getPostById($id)
{
    $items = getAllPosts();
    foreach ($items as $storedItem) {
        if ($storedItem['id'] == $id) {
            return $storedItem;
        }
    }
    return null;
}


function savePost($data, &$errors = null)
{

}