<?php
$data = file_get_contents('warmup.txt');
$data = explode(',', $data);

$x = 0;
$y = 0;

$maxDistance = 0;

foreach($data as $command) {
	$command = trim($command);
	switch($command) {
		case 'Down':
			$y--;
			break;
		case 'Up':
			$y++;
			break;
		case 'Left':
			$x--;
			break;
		case 'Right':
			$x++;
		case 'A':
		case 'B':
			$distance = abs($x) + abs($y);
			if ($distance > $maxDistance) {
				$maxDistance = $distance;
			}
	}
}

var_dump($maxDistance);
