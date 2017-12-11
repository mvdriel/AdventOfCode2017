<?php
$data = file_get_contents('day10.txt');
$data = trim($data);
$data = explode(',', $data);

$size = 256;
$array = [];
for ($i = 0; $i < $size; $i++) {
	$array[] = $i;
}

$position = 0;
$skip = 0;

foreach($data as $item) {
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

	$position += $item+$skip;
	$position %= $size;
	$skip++;
}

var_dump($array[0] * $array[1]);
