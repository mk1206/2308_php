<?php
// 몇 개일지 모르는 숫자를 다 더해주는 함수를 만드러
// function sum(...$item){
// 	$total = 0;
// 	foreach($item as $val){
// 		$total += $val;
// 	}
// 	return $total;
// }

// echo sum(2, 3, 2, 3, 6);

// $arr = [1, 2, 3, 4, 5, 6];
// echo array_sum($arr);

// 응용
// function sum($ope,...$item){
// 	$total = 0;
// 	foreach($item as $val){
// 		switch($ope){
// 			case "+":
// 				$total += $val;
// 				break;
// 			case "-":
// 				$total -= $val;
// 				break;
// 			case "*";
// 				$total *= $val;
// 				break;
// 			case "/":
// 				$total /= $val;
// 				break;
// 		}
// 	}
// 	return $total;
// }

// echo sum("-",2, 3, 2, 3, 6);

// $i = 1000;
// $j = 0;
// while($i >= 1){
// 	$j += $i;
// 	$i--;
// }
// echo $j;

// function sum($i){
// 	$j = 0;
// 	for($i; $i >= 1; $i--){
// 		$j += $i;
// 	}
// 	return $j;
// }

// echo sum(5)

// function my_rec($i){
// 	if($i <= 0){
// 		return 0;
// 	}
// 	return $i + my_rec($i - 1);
// }

// echo my_rec(4);

// 숫자로 이루어진 문자열을 하나 받습니다.
// 이 문자열의 모든 숫자를 더해주세요.
// 예) "3421"일 경우, 3+4+2+1해서 10이 리턴 되는 함수

// 배열로
// function my_sum($str){
// 	$j = 0;
// 	$arr = str_split($str);
// 	foreach($arr as $key){
// 		$j += $key;
// 	}
// 	return $j;
// }
// echo my_sum("134");

// function my_sum($str){
// 	$arr = str_split($str);
// 	return array_sum($arr);
// }
// echo my_sum("134");

// 문자열 길이로
$str = "3145";
function my_test(string $str){
	$len = mb_strlen($str);
	$sum = 0;
	for($idx = 0; $idx <= $len - 1; $idx++){
		$sum += (int)mb_substr($str, $idx, 1);
	}
	return $sum;
}

echo my_test($str);



?>