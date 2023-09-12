<?php
// 두 숫자를 받아서 더해주는 함수
// 리턴이 없는 함수
// function my_sum($a, $b) {
// 	echo $a + $b;
// }

// my_sum(5, 7);

// 리턴이 있는 함수
// function my_sum2($a, $b){
// 	return $a + $b;
// }

// $result = my_sum2(1, 2);
// echo $result;

// 두 수를 받아서 - * / %를 리턴하는 함수를 만들어 줘엉
// function my_sub($a, $b){
// 	return $a - $b;
// }
// function my_mul($a, $b){
// 	return $a * $b;
// }
// function my_div($a, $b){
// 	return $a / $b;
// }
// function my_rem($a, $b){
// 	return $a % $b;
// }

// $sub = my_sub(4, 2);
// $mul = my_mul(4, 2);
// $div = my_div(4, 2);
// $rem = my_rem(5, 2); 

// echo $sub, "\n"
// 	, $mul, "\n"
// 	, $div, "\n"
// 	, $rem;

// 파라미터의 기본값이 설정되어 있는 함수
// function my_sum3($a, $b = 5, $c = 2) {
// 	return $a + $b + $c;
// }

// echo my_sum3(4);

// 가변 파라미터
// php-5.6 이상 가능
function my_args_param(...$items){
	echo $items[1];
}

my_args_param("a", "b", "c");

?>