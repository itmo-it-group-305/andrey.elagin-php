<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 17.01.16
 * Time: 17:09
 */

$data = [
    [
        'id' => 1,
        'title' => 'News #1',
        'description' => 'Short description for news',
        'date' => date('Y-m-d H:i:s'),
        'preview' => 'some.jpg',
    ],
    [
        'id' => 2,
        'title' => 'News #1',
        'description' => 'Short description for news',
        'date' => date('Y-m-d H:i:s'),
        'preview' => 'some.jpg',
    ],
    [
        'id' => 3,
        'title' => 'News #1',
        'description' => 'Short description for news',
        'date' => date('Y-m-d H:i:s'),
        'preview' => 'some.jpg',
    ],
    [
        'id' => 4,
        'title' => 'News #1',
        'description' => 'Short description for news',
        'date' => date('Y-m-d H:i:s'),
        'preview' => 'some.jpg',
    ],
    [
        'id' => 5,
        'title' => 'News #1',
        'description' => 'Short description for news',
        'date' => date('Y-m-d H:i:s'),
        'preview' => 'some.jpg',
    ]
];
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
</head>
<body>
<?php foreach ($data as $post): ?>
    <section>
        <h2><?= $post['title'] ?></h2>
        <p class="preview"><img src="<?= $post['preview'] ?>" alt=""></p>
        <p class="date"><?= $post['date'] ?></p>
        <p class="description"><?= $post['description'] ?></p>
        <p class="link">post.php?id=<?= $post['id'] ?></p>
    </section>
<?php endforeach; ?>
</body>
</html>
