<?php

// 없는 파일을 불러왔을 때 오류가 뜨고 다음 실행을 진행
// include("./02_070_ex1_include1.php");

// 없는 파일을 불러왔을 때 오류가 뜨고 바로 실행을 중단
// require("./02_070_ex1_include1.php");

// 파일을 불러올 때 이전에 실행했던 파일이면 중복실행 X
include_once("./02_070_ex1_include1.php");

// echo "include22222\n";

echo hello();

?>