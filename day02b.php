<?php

$data = file_get_contents('day02.txt');
$data = trim($data);
$data = explode("\n", $data);

$result = 0;

foreach($data as $row) {
    $values = explode("\t", $row);
    foreach($values as $i) {
        foreach($values as $j) {
            if ($i > $j && (($i % $j) === 0)) {
                $result += ($i / $j);
            }
        }
    }
}

var_dump($result);
