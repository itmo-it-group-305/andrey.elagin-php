<?php
$someArr = [1, 2, 3, 8, 14, 89, 45];
print_r($someArr);
for ($i = 0; $i < count($someArr) - 1; $i++) {
    $someArr[$i] = $someArr[count($someArr) - $i];
}
print_r($someArr);

$a = [2, 7];
$b = [6, 1];
$c = [12, 5];

$ab = (pow(($b[0] - $a[0]), 2) + (pow(($b[1] - $a[1]), 2)));
$ac = (pow(($c[0] - $a[0]), 2) + (pow(($c[1] - $a[1]), 2)));
$bc = (pow(($c[0] - $b[0]), 2) + (pow(($c[1] - $b[1]), 2)));

$first = 0;
$second = 0;
$third = 0;

if ($ab > $ac && $ab > $bc) {
    $first = $ab;
    $second = $ac;
    $third = $bc;
} else if ($ac > $bc && $ac > $ab) {
    $first = $ac;
    $second = $ab;
    $third = $bc;
} else if ($bc > $ac && $bc > $ab) {
    $first = $bc;
    $second = $ab;
    $third = $ac;
}

$answer = ($first == $second + $third) ? "Right-angled triangle" : "Maybe that's a round? Think about it...";
var_dump($answer);
