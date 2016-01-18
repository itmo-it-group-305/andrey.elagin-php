<?php

$friendsGet = [
    'user_id' => '53083705',
    'order' => 'hints',
    'fields' => 'bdate,photo_200_orig,relation,last_seen',
];

$queryString = 'https://api.vk.com/method/friends.get?' . http_build_query($friendsGet);
$friendsGet1 = file_get_contents($queryString);
$friends = json_decode($friendsGet1, true);
$content = $friends['response'];

//при попытке отобразить все полученные данные, по какой то причине отображается только ограниченное количество
//элемнтов массива.
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Friends List</title>
</head>
<body>
<?php foreach ($content as $friend): ?>
    <section>
        <h2><?= $friend['first_name'] . ' ' . $friend['last_name'] ?></h2>
        <p class="preview"><img src="<?= $friend['photo_200_orig'] ?>" alt=""></p>
<!--        <p class="date">Дата рождения: --><?//= $friend['bdate'] ?><!--</p>-->
        <p class="relation">Семейное положение: <?= $friend['relation'] ?></p>
<!--        <p class="last-online">Последний раз в сети: --><?//= $friend['last_seen'] ?><!--</p>-->
    </section>
<?php endforeach; ?>
</body>
</html>

