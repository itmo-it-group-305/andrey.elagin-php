<?php
/**
* Created by PhpStorm.
* User: daddyingrave
* Date: 18.01.16
* Time: 18:54
*/

require_once __DIR__ . '/app/models/post.php';
require_once __DIR__ . '/libs/storage.php';

$posts = getAllPosts();

//var_dump(
//    storageSaveItem('post', ['title' => 'post#1', 'content' => 'first'])
//)

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blojjeq</title>
</head>
<body>
    <?php foreach ($posts as $post): ?>
    <article>
        <header>
            <h2>
            <a href="show.php?id=<?= $post['id'] ?>">
                <?= $post['title'] ?></a>
            </h2>
            <ul>
                <li>Создан: <?= date('Y-m-d H:i', $post['created']) ?></li>
                <li>Обновлен: <?= date('Y-m-d H:i', $post['updated']) ?></li>
            </ul>
        </header>
        <?= $post['content'] ?>
    </article>
    <?php endforeach ?>
</body>
</html>
