<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 18.01.16
 * Time: 18:55
 */

require_once __DIR__ . '/libs/storage.php';
require_once __DIR__ . '/libs/view.php';
require_once __DIR__ . '/app/models/post.php';

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
    $post = savePost($data, $errors);

    if (!$errors) {
        //Запись успешно сохарнена
        header('location: edit.php?id=' . $post['id']);
        exit;
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blojjeq</title>
</head>
<body>
    <form method="post">
        <div>
            <div class="error"><?= e($errors, 'title') ?></div>
            <label for="post-title">Title</label>
            <input id="post-title" name="post[title]" type="text" value="<?= e($post, 'title') ?>">
        </div>
        <div>
            <div class="error"><?= e($errors, 'content') ?></div>
            <label for="post-content">Content</label>
            <textarea name="post[content]" id="post-content"><?= e($post, 'content') ?></textarea>
        </div>
        <?php  if (isset($post['id'])): ?>
        <div>
            <input type="hidden" name="post[id]" value="<?= e($post, 'id') ?>">
        </div>
        <?php endif; ?>
        <div>
            <input type="submit">
        </div>
    </form>
</body>
</html>
