<?php

$data = file_get_contents('day11.txt');
$data = trim($data);
$data = explode(',', $data);

$x = $y = 0;
$max = 0;

foreach($data as $item) {
	$size = 2 / strlen($item);

	$items = str_split($item);
	foreach($items as $item) {
		switch($item){
			case 'n':
				$y += $size;
				break;
			case 'e':
				$x += $size;
				break;
			case 's':
				$y -= $size;
				break;
			case 'w':
				$x -= $size;
				break;
		}
	}
	$max = max($max, (abs($x) + abs($y)) / 2);
}

var_dump($max);
