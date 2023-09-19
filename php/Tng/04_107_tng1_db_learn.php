<?php

// // 1. db_conn 이라는 함수를 만들기
// //      1-1. db설정 및 pdo객체 생성
function db_conn( &$conn ) {
    $db_host    = "localhost";
    $db_user    = "root";
    $db_pw      = "php504";
    $db_name    = "employees";
    $db_charset = "utf8mb4";
    $db_dns     = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;
    
    $db_options = [
        PDO::ATTR_EMULATE_PREPARES      => false
        ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
    ];
    
    $conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
}

$conn = null;
db_conn($conn);

// // 2. 사원별 현재 급여를 조회하기

// $sql = " SELECT "
//     ." emp_no "
//     ." , salary "
//     ." FROM "
//     ." salaries "
//     ." WHERE "
//     ." to_date >= NOW() "
//     ." AND "
//     ." salary >= :salary ";

// $arr_ps = [
//     ":salary" => 80000
// ];

// $stmt = $conn->prepare($sql);
// $stmt->execute($arr_ps);
// $result = $stmt->fetchAll();
// // print_r($result);


// // 3. 조회한 데이터를 루프하면서 100,000 이상이면 사원 번호 출력

// $i = 0;
// // $arr_result = [];

// foreach($result as $key => $val){
//     if($val["salary"] >= 100000){
//         echo $val["emp_no"]."\n";
//         $i++;
//         // $arr_result[] = $val;
//     }
// }

// echo "총 합: {$i}명";
// // echo count($arr_result);

// 1. titles 테이블에 데이터가 없는 사원을 검색
$sql = " SELECT "
    ." * "
    ." FROM "
    ." employees "
    ." WHERE "
    ." emp_no "
    ." NOT IN(SELECT emp_no FROM titles) ";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
print_r($result);

// 2. [1]번에 해당하는 사원의 직책 정보를 insert
//  2-1. 직책은 "green", 시작일은 현재시간, 종료일은 99990101

$emp = "";

foreach($result as $val){
    $emp = ($val["emp_no"]);
}

$sql = " INSERT INTO "
    ." titles "
    ." VALUES ( "
	." :emp_no "
	." , 'green' "
	." , date(NOW()) "
	." , :to_date) "; 

$arr_ps = [
    ":emp_no" => $emp
    ,":to_date" => 99990101
];

$stmt = $conn->prepare($sql);
$result = $stmt->execute($arr_ps);
$conn->commit();

var_dump($result);
$conn = null;
