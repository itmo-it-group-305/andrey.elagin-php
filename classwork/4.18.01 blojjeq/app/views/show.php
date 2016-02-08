<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 25.01.16
 * Time: 21:24
 */
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


