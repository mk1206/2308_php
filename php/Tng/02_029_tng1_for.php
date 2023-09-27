<?php
// 1부터 10까지 숫자를 출력
// for($i = 1; $i <=10; $i++){
// 	echo $i, "\n";
// }

// 구구단 2단
// for($i = 1; $i <= 9; $i++){
// 	echo "2 X {$i} = ", 2*$i, "\n";
// }

// 구구단 1~9단
for($i = 1; $i <= 9; $i++){
	echo "{$i}단\n";
	for($j = 1; $j <= 9; $j++){
		$mul = $i * $j;
		echo "{$i} X {$j} = {$mul}\n";
	}
}

// 2~8단은 출력 X
// for($i = 1; $i <= 9; $i++){
// 	if($i >= 2 && $i <= 8){
// 		continue;
// 	}
// 	echo "{$i}단\n";
// 	for($j = 1; $j <= 9; $j++){
// 		$mul = $i * $j;
// 		echo "{$i} X {$j} = {$mul}\n";
// 	}
// } 

// 짝수단만 출력
// for($i = 1; $i <= 9; $i++){
// 	if($i % 2 == 0){
// 		echo "{$i}단\n";
// 		for($j = 1; $j <= 9; $j++){
// 			$mul = $i * $j;
// 			echo "{$i} X {$j} = {$mul}\n";
// 		}
// 	}
// } 

// *
// **
// *** 출력
// for($i = 0; $i < 5; $i++){
// 	for($j = 0; $j < $i + 1; $j++){
// 		echo "*";
// 	}
// 	echo "\n";
// }

// $int_line = 1;
// while($int_line <= 5){
// 	$int_star = 1;
// 	while($int_star <= $int_line){
// 		echo "*";
// 		$int_star++;
// 	}
// 	echo "\n";
// 	$int_line++;
// }

// ***
// **
// *
// for($i = 4; $i >= 0 ; $i--){
// 	for($j = 0; $j < $i + 1; $j++){
// 		echo "*";
// 	}
// 	echo "\n";
// }

//   *
//  **
// ***
// $num = 5;
// for($i = 1; $i <= $num; $i++){
// 	for($j = $num - $i; $j >= 0; $j--){
// 		echo " ";
// 	}
// 	for($z = 0; $z < $i; $z++){
// 		echo "*";
// 	}
// 	echo "\n";
// }

//   *
//  ***
// *****
// $num = 6;
//  for($i = 0; $i < $num; $i++){
//   for($j = $num - $i; $j > 0; $j--){
//     echo " ";
//   }
//   for($q = 0; $q < 2*$i-1; $q++){
//     echo "*";
//   }
//   echo "\n";
//  }

//   *
//  ***
// *****
//  ***
//   *
// $num = 6;
//  for($i = 1; $i < $num; $i++){
//   for($j = $num - $i; $j > 0; $j--){
//     echo " ";
//   }
//   for($q = 0; $q < 2*$i-1; $q++){
//     echo "*";
//   }
//   echo "\n";
//  }

//  for($z = 0; $z < $num - 2; $z++){
// 	for($x = 0; $x < $z + 2; $x++){
// 		echo " ";
// 	}
// 	for($y = $num; $y > 2*$z-1; $y--){
// 		echo "*";
// 	}
// 	echo"\n";
//  }



?>