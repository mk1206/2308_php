<?php
// 성적
// 	범위 :
// 		이상 ~ 미만
// 		100	     : A+
// 		90 ~ 100 : A
// 		80 ~ 90  : B
// 		70 ~ 80  : C
// 		60 ~ 70  : D
// 		60 미만  : F

$num1 = 700;
$grade = "";

if($num1 <= 100 && $num1 >= 0){
	if($num1 === 100) {
		$grade = "A+";
	}
	else if($num1 >= 90 && $num1 < 100) {
		$grade = "A";
	}
	else if($num1 >= 80 && $num1 < 90) {
		$grade = "B";
	}
	else if($num1 >= 70 && $num1 < 80) {
		$grade = "C";
	}
	else if($num1 >= 60 && $num1 < 70) {
		$grade = "D";
	}
	else{
		$grade = "F";
	}
	
	echo "당신의 점수는 {$num1}점 입니다. <{$grade}>";
}
else{
	echo "잘못된 값을 입력 했습니다.";
}

?>