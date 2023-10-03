<?php

function my_db_conn( &$conn ) {
    $db_host    = "localhost"; // host
    $db_user    = "root"; // user
    $db_pw      = "1234"; //password
    $db_name    = "test_mini_board"; // DB name
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

function db_select_boards(&$conn) {
    try {
        $sql = 
        " SELECT "
        ."      id "
        ."      ,title "
        ."      ,create_at "
        ."      ,category"
        ." FROM "
        ."      boards ";

        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    } catch(Exception $e) {
        return false;
    }
}

function db_select_boards_study(&$conn) {
    $sql = 
    " SELECT "
    ."      id "
    ."      ,title "
    ."      ,create_at "
    ."      ,category"
    ." FROM "
    ."      boards "
    ." WHERE "
    ."      category = '공부' ";
    
    try {
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    } catch(Exception $e) {
        return false;
    }
}

function db_select_boards_work_out(&$conn) {
    $sql = 
    " SELECT "
    ."      id "
    ."      ,title "
    ."      ,create_at "
    ."      ,category"
    ." FROM "
    ."      boards "
    ." WHERE "
    ."      category = '운동' ";
    
    try {
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    } catch(Exception $e) {
        return false;
    }
}