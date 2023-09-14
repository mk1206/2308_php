<?php
// 폴더(디렉토리) 만들기
// mkdir("../Tng/testdir", 777);

// if(mkdir("../Tng/testdir", 777) ){
// 	echo "성공";
// }
// else {
// 	echo "실패";
// }

// 폴더(디렉토리) 제거
// rmdir("../Tng/testdir")

///////////파일///////////
// 파일 열기
// a : 쓰기, w : 모두 지우기, r : 읽기
$file = fopen("zz.txt", "r");
// var_dump($file);

// $test = "abc";
// if($test){
// 	echo "참";
// } else {
// 	echo "거짓";
// }

// 파일 닫기
// fclose($file);

// 파일 쓰기
// $f_write = fwrite($file, "오리고기\n");

// 파일 읽기
// $line = fread($file, "62");
// echo $line;

// echo fgets($file);
// echo fgets($file);
// echo fgets($file);

// while($line = fgets($file)){
// 	echo $line;
// }

show_source("02_070_ex1_include1.php")

?>