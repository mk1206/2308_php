<?php

// 가위바위보

// $arr = ["rock", "scissor", "paper"];

// while(true){
	// echo "입력값 :";
// 	$in_str = trim(fgets(STDIN));
// 	$random = array_rand($arr);

// 	if($in_str == "rock"){
// 		if($random == 0){
// 			echo "비김\n";
// 		}
// 		else if($random == 1){
// 			echo "이김\n";
// 		}
// 		else if($random == 2){
// 			echo "짐\n";
// 		}
// 		echo "컴퓨터: ".$arr[$random]."\n";
// 	}
// 	else if($in_str == "scissor"){
// 		if($random == 0){
// 			echo "짐\n";
// 		}
// 		else if($random == 1){
// 			echo "비김\n";
// 		}
// 		else if($random == 2){
// 			echo "이김\n";
// 		}
// 		echo "컴퓨터: ".$arr[$random]."\n";
// 	}
// 	else if($in_str == "paper"){
// 		if($random == 0){
// 			echo "이김\n";
// 		}
// 		else if($random == 1){
// 			echo "짐\n";
// 		}
// 		else if($random == 2){
// 			echo "비김\n";
// 		}
// 		echo "컴퓨터: ".$arr[$random]."\n";
// 	}
// 	else if($in_str == "end"){
// 		echo "시마이";
// 		break;
// 	}
// }


// 숫자 맞추기 게임
// 1 ~ 100의 랜덤한 숫자를 맞추는 게임
// 총 5번의 기회
// 입력한 숫자가 정답보다 클 경우 "더 큼" 출력
// 입력한 숫자가 정답보다 작을 경우 "더 작음" 출력
// 정답일 경우 "정답" 출력, 끝
// 5번의 기회를 다 썼을 경우 정답과 "실패" 출력

// $arr = ["rock", "scissor", "paper"];
// $input = trim(fgets(STDIN));
$num = rand(1, 100);
$i = 0;

while($i < 5){
	$i++;
	echo "입력값 :";
	$input = trim(fgets(STDIN));
	if($input == $num){
		echo "\n----------정답----------\n";
		break;
	}
	else if($input > $num){
		echo "down\n\n";
	}
	else if($input < $num){
		echo "up\n\n";
	}
	if($i == 5){
		echo "실패\n";
		echo "정답은: {$num}\n";
	}
}
	

// php 88_02_tng1_rsp.php
?>