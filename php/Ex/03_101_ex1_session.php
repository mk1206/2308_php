<?php

// session : 데이터를 웹서버에 저장, 쿠키보다 보안성과 속도도 빠름
// *** 주의사항 ***
// 개인정보, 민감한 정보들은 되도록 저장하지 말아야함

// session 시작
session_start();

$_SESSION["green"] = "PHP";
$_SESSION["green2"] = "JAVA";

// 특정 세션 삭제
// unset($_SESSION["green"]);

// 모든 세션 삭제
session_destroy();

print_r($_SESSION);







?>