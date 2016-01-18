<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 18.01.16
 * Time: 18:55
 */

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

    if ($errors) {
        //atata
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
            <label for="title"></label>
            <input name="post[title]" type="text">
        </div>
        <div>
            <label for=""></label>
            <textarea name="post[content]" id="" cols="30" rows="10"></textarea>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</body>
</html>
