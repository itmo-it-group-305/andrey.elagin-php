<?php
$someArr = [4, 8, 15, 16, 23, 42, 42];
$length = (int)((count($someArr)) / 2);

for ($i = 0; $i <= $length - 1; $i++) {
   $someArr[$i] = $someArr[$i] + $someArr[count($someArr) - 1 - $i];
   $someArr[count($someArr) - 1 - $i] = $someArr[$i] - $someArr[count($someArr) - 1 - $i];
   $someArr[$i] = $someArr[$i] - $someArr[count($someArr) - 1 - $i];
}

print_r($someArr);





