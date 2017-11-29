<?php
$data = file_get_contents('warmup.txt');
$data = explode(',', $data);

$x = 0;
$y = 0;

$maxDistance = 0;

$markersA = [];
$markersB = [];

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
			$markersA[] = [
				'x' => $x,
				'y' => $y
			];
			break;
		case 'B':
			$markersB[] = [
				'x' => $x,
				'y' => $y
			];
	}
}

foreach($markersA as $markerA) {
	foreach($markersB as $markerB) {
		$distance = abs($markerA['x'] - $markerB['x']) + abs($markerA['y'] - $markerB['y']);
		if ($distance > $maxDistance) $maxDistance = $distance;
	}
}

var_dump($maxDistance);
