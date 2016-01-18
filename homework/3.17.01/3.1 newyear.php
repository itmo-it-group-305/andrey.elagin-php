<?php
date_default_timezone_set('UTC');
$now = strtotime("now");
$nextYear  = mktime(0, 0, 0, 1, 1, date("Y") + 1);
$eta = gmdate('z', $nextYear - 1) - gmdate('z', $now);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Friends List</title>
</head>
<body>
        <h2>До нового года осталось: <?= $eta ?> дней <br>Так то!</h2>
</body>
</html>
