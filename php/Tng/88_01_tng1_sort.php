<?php

// 버블 정렬
$arr = [5, 4, 3, 2, 6, 7, 12];
// asort($arr);

// print_r($arr);

// $arr2 = [3, 2, 1];

// $tmp = $arr2[0];
// $arr2[0] = $arr2[1];
// $arr2[1] = $tmp;

// print_r($arr2);
$len = count($arr);
for($i = 0; $i < $len; $i++){
	for($j = 0; $j < $len - $i - 1; $j++){
		if($arr[$j] > $arr[$j + 1]) {
			$tmp = $arr[$j];
			$arr[$j] = $arr[$j + 1];
			$arr[$j + 1] = $tmp;
		}
		echo "{$i} : {$j}\n";
	}
}

// print_r($arr);


?>