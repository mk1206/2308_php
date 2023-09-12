<?php
// trim() : 문자열의 공백을 없애주는 함수
// echo " adfs ", "\n", trim(" adfs ");

// strtoupper // strtolower : 문자열을 대/소문자로 변환하는 함수
// echo strtoupper("abcdef"), strtolower("ABCDEF");

// strlen() : 문자열의 길이를 반환
// mb_strlen() : 멀티바이트 문자열의 길이를 반환
// echo strlen("abc");
// echo "\n";
// echo mb_strlen("가나다");

// str_replace() : 특정 문자를 치환해주는 함수
// echo str_replace("a", "/", "awefdsafwgwef");

// substr() : 문자열을 자르는 함수
// mb_substr() : 멀티바이트 문자열을 자르는 함수
// echo substr("abcdefg", 0, 5);
// echo "\n";
// echo mb_substr("가나다라마바사", 0, 3);

// strpos() : 문자열에서 특정 문자의 위치를 반환
// mb_strpos() : 멀티바이트 문자열에서 특정 문자의 위치를 반환
// echo strpos("abcdefg", "d");
// echo "\n";
// echo mb_strpos("가나다라마바사", "바");

// substr() + strpos()
// $str ="abcdefg";
// echo substr($str, strpos($str, "d"));

// isset() : 변수의 존재를 확인하는 함수
// $str = "";
// var_dump(isset($str));

// empty() : 변수의 값이 비어있는지 확인하는 함수
// var_dump(empty($str));

// echo phpinfo();

// time() : 1970/01/01을 기준으로 타임스탬프(초단위) 시간 확인하는 함수
// echo time();

// date() : 원하는 형식으로 시간표시해주는 함수
// echo date("Y-m-d H:i:s", time() + (60 * 60 * 24 * 30));

// echo rand(1, 10);


?>