<?php

require_once("../Ex/04_107_ex1_fnc_db_connect.php");

$conn = null; // 객체 타입   : null;
              // int 타입    : 0;
              // string 타입 : "";
my_db_conn($conn);

// // ------------1번------------
// $sql = " INSERT INTO employees ( "
// 	." emp_no "
// 	." , birth_date "
// 	." , first_name "
// 	." , last_name "
// 	." , gender "
// 	." , hire_date) "
// ." VALUES ( "
// 	." :emp_no"
// 	." , :birth_date"
// 	." , :first_name"
// 	." , :last_name"
// 	." , :gender"
// 	." , :hire_date)";

// $arr_ps = [
//     ":emp_no" => 500001
//     ,":birth_date" => 20011206
//     ,":first_name" => 'Mingyeong'
//     ,":last_name" => 'Park'
//     ,":gender" => 'F'
//     ,":hire_date" => 20230918
// ];

// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $conn->commit();

// var_dump($result);

// db_destroy_conn($conn);

// // ------------2번------------
// $sql = " UPDATE employees "
//     ." SET first_name= '둘리', last_name= '호잇' "
//     ." WHERE emp_no = :emp_no ";

// $arr_ps = [
//     ":emp_no" => 500001
// ];

// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $conn->commit();

// var_dump($result);

// db_destroy_conn($conn);

// // ------------3번------------
// $sql = " SELECT "
//     ." * "
//     ." FROM "
//     ." employees "
//     ." WHERE "
//     ." emp_no = :emp_no ";
    
// // Prepared Statement setting
// $arr_ps = [
//     ":emp_no" => 500001
// ];

// $stmt = $conn->prepare($sql);
// $stmt->execute($arr_ps);
// $result = $stmt->fetchAll();
// print_r($result);

// db_destroy_conn($conn);

// // ------------4번------------
// $sql = " DELETE from employees "
//     ." WHERE emp_no = :emp_no ";

// $arr_ps = [
//     ":emp_no" => 500001
// ];

// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $conn->commit();

// db_destroy_conn($conn);




?>