<?php

$data = file_get_contents('day01.txt');
$data = trim($data);
$data = str_split($data);

$sum = 0;

for($i = 0; $i < count($data); $i++) {
    $next = ($i + 1) % count($data);
    if($data[$i] === $data[$next]) {
        $sum += $data[$i];
    }
}

var_dump($sum);
