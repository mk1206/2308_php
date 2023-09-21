<?php

function my_db_conn( &$conn ) {
    $db_host    = "localhost"; // host
    $db_user    = "root"; // user
    $db_pw      = "php504"; //password
    $db_name    = "mini_board"; // DB name
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

function db_select_boards_paging(&$conn, &$arr_param) {
    try {
        $sql = 
        " SELECT "
        ."      id "
        ."      ,title "
        ."      ,create_at "
        ." FROM "
        ."      boards "
        ." ORDER BY "
        ."      id DESC "
        ." LIMIT :list_cnt OFFSET :offset ";

        $arr_ps = [
            ":list_cnt" => $arr_param["list_cnt"]
            , ":offset" => $arr_param["offset"]
        ];

        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchAll();
        return $result; // 정상 : 쿼리 결과 리턴

    } catch(Exception $e) {
        return false; // 예외 발생 : false 리턴
    }
}

function db_select_boards_cnt(&$conn) {
    try {
        $sql =
        " SELECT "
        ." COUNT(id) as cnt "
        ." FROM "
        ." boards ";
    
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll();
        return (int)$result[0]["cnt"];
    } catch(Exception $e) {
        return false;
    }
}

function db_insert_boards(&$conn, &$arr_param) {
    $sql =
    " INSERT INTO boards ( "
    ." title "
    ." ,content "
    ." ) "
    ." VALUES ( "
    ." :title "
    ." ,:content "
    ." ) ";

    $arr_ps = [
        ":title" => $arr_param["title"]
        ,":content" => $arr_param["content"]
    ];
    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($arr_ps);
        return $result; // 정상 : 쿼리 결과 리턴
    } catch(Exception $e) {
        return false; // 예외 발생 : false 리턴
    }
}



// TODO : 나중에 지울 것
// $conn = null;
// my_db_conn($conn);
// echo db_select_boards_cnt($conn);
// $conn = null;

?>