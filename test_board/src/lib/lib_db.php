<?php

function my_db_conn( &$conn ) {
    $db_host    = "localhost"; // host
    $db_user    = "root"; // user
    $db_pw      = "php504"; //password
    $db_name    = "test_board"; // DB name
    $db_charset = "utf8mb4"; //charset
    $db_dns     = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

    try {
        $db_options = [
            // DB의 Prepared Statement 기능을 사용하도록 설정
            PDO::ATTR_EMULATE_PREPARES      => false
            // PDO Exception을 Throws 하도록 설정
            ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
            // 연상배열로 Fetch를 하도록 설정
            ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
        ];

        // PDO Class로 DB 연동
        $conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
        return true;
    } catch (Exception $e){
        $conn = null;
        return false;
    }
}

function db_destroy_conn(&$conn) {
    $conn = null;
}

function db_select_boards(&$conn, &$arr_month) {
    try {
        $sql = " SELECT "
        ." id, DAYOFMONTH(create_at) as create_at, mood "
        ." FROM "
        ." boards "
        ." WHERE "
        ." MONTH(create_at) = :month ";

        $arr_ps = [
            ":month" => (int)$arr_month["month"]
        ];

        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchAll();
        return $result;
    } catch(Exception $e) {
        echo $e->getMessage();
        return false;
    }
}

function db_select_month(&$conn, &$arr_month) {
    try {
        $sql = " SELECT "
        ." month(create_at) as month "
        ." FROM "
        ." boards "
        ." WHERE "
        ." MONTH(create_at) = :month ";

        $arr_ps = [
            ":month" => (int)$arr_month["month"]
        ];

        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchAll();
        return $result;
    } catch(Exception $e) {
        echo $e->getMessage();
        return false;
    }
}

function db_select_detail(&$conn, $id) {
    try {
        $sql = " SELECT "
        ." id, title, content, create_at, weather, mood "
        ." FROM "
        ." boards "
        ." WHERE "
        ." id = :id ";

        $arr_ps = [
            ":id" => $id["id"]
        ];
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchAll();
        return $result;
    } catch(Exception $e) {
        echo $e->getMessage();
        return false;
    }
}