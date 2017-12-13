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

for($d = 0; true; $d++) {
	$failed = false;
	for($i = 0; $i < $size; $i++) {
		if (isset($lines[$i])) {
			if ((($d + $i) % (($lines[$i] * 2) - 2)) === 0) {
				$failed = true;
				break;
			}
		}
	}
	if (!$failed) {
		var_dump($d);
		exit;
	}
}
