<?php

// $i = 1;
// while($i < 6){
// 	$j = 1;
// 	$z = 0;
// 	while($j < 6 - $i){
// 		echo " ";
// 		$j++;
// 	}
// 	while($z < $i){
// 		echo "*";
// 		$z++;
// 	}
// 	echo "\n";
// 	$i++;
// }

$i = 1;
while($i < 10) {
	$j = 1;
	echo "{$i}단\n";
	while($j < 10) {
		$mul = $i * $j;
		echo "{$i} X {$j} = {$mul}\n";
		$j++;
	}
	$i++;
}