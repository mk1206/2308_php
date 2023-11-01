<?php

function my_db_conn( &$conn ) {
    $db_host    = "localhost";
    $db_user    = "root";
    $db_pw      = "php504";
    $db_name    = "test_board";
    $db_charset = "utf8mb4";
    $db_dns     = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

    try {
        $db_options = [
            PDO::ATTR_EMULATE_PREPARES      => false
            ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
            ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
        ];

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
        ." MONTH(create_at) = :month "
        ." ORDER BY create_at ";

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

function db_select_detail(&$conn, &$id) {
    try {
        $sql = " SELECT "
        ." id, title, content, Date(create_at) AS Date, weather, mood "
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

function db_insert_boards(&$conn, &$arr_param) {
    try {
        $sql = " INSERT INTO "
        ." boards ( "
        ."    title "
        ."    , content "
        ."    , create_at "
        ."    , weather "
        ."    , mood "
        ." ) VALUES " 
        ." ( "
        ."    :title "
        ."    , :content "
        ."    , :create_at "
        ."    , :weather "
        ."    , :mood ) ";

        $arr_ps = [
            ":title" => $arr_param["title"]
            , ":content" => $arr_param["content"]
            , ":create_at" => $arr_param["create_at"]
            , ":weather" => $arr_param["weather"]
            , ":mood" => $arr_param["mood"]
        ];

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($arr_ps);
        return $result;
    } catch(Exception $e) {
        echo $e->getMessage();
        return false;
    }
}
