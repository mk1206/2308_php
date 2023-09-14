<?php

// rock scissor paper

$in_str = trim(fgets(STDIN));
$arr = ["rock", "scissor", "paper"];

$random = array_rand($arr);
echo $arr[$random];

if($in_str == "rock"){
	if($random == 0){
		echo "비김";
	}
	else if($random == 1){
		echo "이김";
	}
	else if($random == 2){
		echo "짐";
	}
}
else if($in_str == "scissor"){
	if($random == 0){
		echo "짐";
	}
	else if($random == 1){
		echo "비김";
	}
	else if($random == 2){
		echo "이김";
	}
}
else if($in_str == "paper"){
	if($random == 0){
		echo "이김";
	}
	else if($random == 1){
		echo "짐";
	}
	else if($random == 2){
		echo "비김";
	}
}


// php 88_02_tng1_rsp.php
?>