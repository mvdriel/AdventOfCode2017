<?php
$data = file_get_contents('day12.txt');
$data = trim($data);
$data = explode("\n", $data);

$map = [];
$groups = [];
foreach($data as $line) {
	list($src, $dst) = explode(' <-> ', $line);
	$src .= '';
	$dst = explode(', ', $dst);
	$map[$src] = $dst;
	$groups[$src] = null;
}

$srcs = array_keys($map);

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

foreach($groups as $src => $group) {
	if ($groups[$src] === null) {
		$visited = [];
		follow($src);

		$min = min($visited);
		foreach($visited as $v) {
			$groups[$v] = $min;
		}
	}
}

var_dump(count(array_unique(array_values($groups))));
