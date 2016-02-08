<?php
/**
* Created by PhpStorm.
* User: daddyingrave
* Date: 18.01.16
* Time: 18:54
*/

require_once __DIR__ . '/app/init.php';

$posts = getAllPosts();

require_once __DIR__ . 'app/views/list.php';

