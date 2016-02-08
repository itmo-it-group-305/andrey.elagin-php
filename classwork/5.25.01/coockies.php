<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 25.01.16
 * Time: 18:56
 */


if (isset($_COOKIE['some'])) {
    $a = $_COOKIE['some'] +=1;
} else {
    $a = 0;
}

setcookie('some', $a);

echo $a;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<p></p>
</body>
</html>
