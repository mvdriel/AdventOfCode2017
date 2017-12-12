<?php
$data = file_get_contents('day12.txt');
$data = trim($data);
$data = explode("\n", $data);

$map = [];
foreach($data as $line) {
	list($src, $dst) = explode(' <-> ', $line);
	$src .= '';
	$dst = explode(', ', $dst);
	$map[$src] = $dst;
}

$visited = [];

function follow($src) {
	global $map, $visited;
	$visited[] = $src;
	$dst = $map[$src];
	foreach($dst as $d) {
		if (!in_array($d, $visited)) {
			follow($d);
		}
	}
}

follow(0);

var_dump(count($visited));
