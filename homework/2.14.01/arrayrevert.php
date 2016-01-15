<?php

$someArr = [4, 8, 15, 16, 23, 42, 42];
$length = (int)((count($someArr)) / 2);
$a = 0;
$b = 0;

for ($i = 0; $i <= $length - 1; $i++) {
   $a = $someArr[$i];
   $b = $someArr[count($someArr) - 1 - $i];
   $someArr[$i] = $b;
   $someArr[count($someArr) - 1 - $i] = $a;
}

print_r($someArr);





