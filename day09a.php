<?php
$data = file_get_contents('day09.txt');
$data = trim($data);
$data = str_split($data);

$i = 0;
$score = 0;
$level = 0;
$garbage = false;

while($i < count($data)){
	$char = $data[$i];

	if($garbage){
		if($char === '!'){
			$i++;
		} elseif($char === '>') {
			$garbage=false;
		}
	} else {
		switch($char){
			case '{':
				$level++;
				$score += $level;
				break;
			case '}':
				$level--;
				break;
			case '<':
				$garbage = true;
				break;
		}
	}

	$i++;
}

var_dump($score);
