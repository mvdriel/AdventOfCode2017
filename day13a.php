<?php
$data = file_get_contents('day13.txt');
$data = trim($data);
$data = explode("\n", $data);

$lines = [];

foreach($data as $line) {
	list($depth, $range) = explode(': ', $line);
	$lines[$depth] = $range;
}

$sum = 0;

$size = max(array_keys($lines)) + 1;

for($i = 0; $i < $size; $i++) {
	if (isset($lines[$i])) {
		if ($i % (($lines[$i] * 2) - 2) === 0) {
			$sum += ($i * $lines[$i]);
		}
	}
}

var_dump($sum);
