<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 13.01.16
 * Time: 19:13
 */

//$varSome = 1;
//while ($varSome < 11) {
//    echo $varSome . " фунт " . $varSome * 0.453 . "кг";
//    $varSome++;
//}

$cleaner = 13;
$tarelka = 15;

while ($cleaner > 0 && $tarelka > 0) {
    $tarelka--;
    $cleaner -= 0.5;
    echo 'У вас осталось: ' . $tarelka . ' тарелок' . ' и ' . $cleaner . ' чистящего средства' . "\r";
}
if ($tarelka == 0) {
    echo "тарелки кончились так то...\r";
} else if ($cleaner == 0) {
    echo "чот приуныл средсво кончилось...\r";

}

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
//    "
////    <section>
//        <h2>{$post['title']}</h2>
//        <p class=\"date\"></p>
//        </section>
//    ";

foreach ($data as $post) {
    echo
    '<section>',
        '<h2>' . $post['title'] . '</h2>',
        '<p class="date">' . $post['date'] . '</p>',
    '<section>';
}
?>
<!doctype html>
<html>

<?php foreach ($data as $post): ?>
<section>
    <h2><?= $data[0]['title']?></h2>
    <p class="preview">
        <img src="<?= $post['preview'] ?>" alt="">
    </p>
    <p class="date"><?= $post['date'] ?></p>
    <p class="description"><?= $post['description'] ?></p>
</section>
<?php endforeach; ?>

</html>

