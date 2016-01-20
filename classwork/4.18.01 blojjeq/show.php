<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 18.01.16
 * Time: 18:54
 */

require_once __DIR__ . '/libs/storage.php';
require_once __DIR__ . '/app/models/post.php';

$post = getPostById(
    isset($_GET['id']) ? $_GET['id'] : ''
);

if (!$post) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not found');
    exit('Post not found');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $post['title'] ?></title>
</head>
<body>
    <h1><?= $post['title'] ?></h1>
    <p>Создан: <?= date('Y-m-d H:i', $post['created']) ?></p>
    <p>Обновлен: <?= date('Y-m-d H:i', $post['updated']) ?></p>
    <?= $post['title'] ?>
</body>
</html>

