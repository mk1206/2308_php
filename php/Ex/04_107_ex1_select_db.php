<?php

require_once("./04_107_ex1_fnc_db_connect.php");

$conn = null; // 객체 타입   : null;
              // int 타입    : 0;
              // string 타입 : "";
my_db_conn($conn);

// SQL 작성
$sql = " SELECT "
    ." * "
    ." FROM "
    ." employees "
    ." WHERE "
    ." emp_no = :emp_no ";

$arr_ps = [
    ":emp_no" => 10004
];

// Prepared Statement setting
$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();

print_r($result);

db_destroy_conn($conn);
?>