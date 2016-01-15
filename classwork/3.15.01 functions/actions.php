<?php

function indexAction()
{
    echo '<p>My blog</p>';
}

function showAction($id)
{
    echo '<p>Show post with UID:' . $id . '</p>';
}

function aboutAction()
{
    echo '<p>About us</p>';
}

function testAction($a1, $a2 = null, $a3 = [])
{
    var_dump($a1, $a2, $a3);
}