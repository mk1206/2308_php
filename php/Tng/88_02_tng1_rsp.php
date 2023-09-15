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

// $num = rand(1, 100);
// $i = 0;

// while($i < 5){
// 	$i++;
// 	echo "입력값 :\n";
// 	echo $num;
// 	$input = trim(fgets(STDIN));
// 	if(is_numeric($input)){
// 		if($input == $num){
// 			echo "\n----------정답----------\n";
// 			break;
// 		}
// 		else if($input > $num){
// 			echo "down\n\n";
// 		}
// 		else if($input < $num){
// 			echo "up\n\n";
// 		}
// 		if($i == 5){
// 			echo "실패\n";
// 			echo "정답은: {$num}\n";
// 		}
// 	}
// 	else{
// 		echo "문자열을 입력함";
// 		break;
// 	}
// }

// 반복문을 이용하여 숫자를 1~10까지 출력
// for($i = 1; $i <= 10; $i++){
// 	echo "{$i}\n";
// }

// 구구단 8단 출력
// for($i = 1; $i < 10; $i++){
// 	$mul = 8*$i;
// 	echo "8 X {$i} = {$mul}\n";
// }

// 구구단 19단 출력
// for($i = 1; $i < 10; $i++){
// 	$mul = 19*$i;
// 	echo "19 X {$i} = {$mul}\n";
// }

// 두 숫자를 더해주는 함수
// function sum($i, $j){
// 	$sum = $i + $j;
// 	return $sum;
// }
	
// echo sum(11, 6);

// 짜장면이면 중식, 비빔밥이면 한식, 그외는 양식으로 출력

// function food($menu){
// 	switch($menu){
// 		case "짜장면":
// 			echo "중식";
// 			break;
// 		case "비빔밥":
// 			echo "한식";
// 			break;
// 		default:
// 			echo "양식";
// 			break;
// 	}
// }

// echo food("비빔밥");

// php 88_02_tng1_rsp.php

// random으로 뽑으면 배열에서 제거

$rand = [1, 2, 3, 4, 5, 6, 7, 8, 9];

for($i = 0; $i < 3; $i++){
	$array = array_rand($rand);
	echo $rand[$array];
	unset($rand[$array]);
	print_r($rand);
}
?>