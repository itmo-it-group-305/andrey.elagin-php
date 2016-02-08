<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 18.01.16
 * Time: 18:55
 */

require_once __DIR__ . '/app/init.php';

$data = isset($_POST['post']) ? $_POST['post'] : [];
$post = [];
$errors = [];

if (isset($data['id'])) {
    $id = $data['id'];
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($id)) {
    $post = getPostById((int) $id);

    if (!$post) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not found');
        exit('Post not found');
    }
}

if ($data) {
    $msg = 'Запись успешно ' . isset($post['id']) ? 'изменена' : 'добавлена';
    $post = savePost($data, $errors);

    if (!$errors) {
        addFlashMessage($msg);
        //Запись успешно сохарнена
        header('location: edit.php?id=' . $post['id']);
        exit;
    }
}

require_once __DIR__ . 'app/views/edit.php';