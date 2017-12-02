<?php

$data = file_get_contents('day02.txt');
$data = trim($data);
$data = explode("\n", $data);

$result = 0;

foreach($data as $row) {
    $values = explode("\t", $row);
    $min = null;
    $max = 0;

    foreach($values as $value) {
        if ($value > $max) $max = $value;
        if($min === null || $value < $min) $min = $value;
    }
    $result += ($max - $min);

}

var_dump($result);
