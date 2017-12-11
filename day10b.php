<?php
$data = file_get_contents('day10.txt');
$data = trim($data);
$data = str_split($data);

$items = [];
foreach($data as $item) {
	$items[] = ord($item);
}

$items[] = 17;
$items[] = 31;
$items[] = 73;
$items[] = 47;
$items[] = 23;

$size = 256;
$array = [];
for ($i = 0; $i < $size; $i++) {
	$array[] = $i;
}

$position = 0;
$skip = 0;

for($j = 0; $j < 64; $j++) {
	foreach($items as $item) {
		$part = array_slice($array, $position, $item);
		if(($position + $item) > $size) {
			$part = array_merge($part, array_slice($array, 0, $position + $item - $size));
		}
		$part = array_reverse($part);

		for($i = 0; $i < $item; $i++) {
			$index = $position + $i;
			$index %= $size;
			$array[$index] = $part[$i];
		}

		$position += $item + $skip;
		$position %= $size;
		$skip++;
	}
}

$result = '';
for($i = 0; $i < count($array); $i++) {
	if (($i % 16) === 0) {
		$value = $array[$i];
	} else {
		$value ^= $array[$i];
	}
	if (($i % 16) === 15) {
		$result .= dechex($value);
	}
}

var_dump($result);
