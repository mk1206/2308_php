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
        ." WHERE "
        ."      delete_flg = '0' "
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
        ."      boards "
        ." WHERE "
        ."      delete_flg = '0' ";
    
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll();
        return (int)$result[0]["cnt"];
    } catch(Exception $e) {
        echo $e->getMessage();
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
        echo $e->getMessage();
        return false; // 예외 발생 : false 리턴
    }
}

function db_select_boards_id(&$conn, &$id){
    $sql =
    " SELECT "
    ." id "
    ." , title "
    ." , content "
    ." , create_at "
    ." FROM "
    ." boards "
    ." WHERE "
    ." id = :id "
    ." AND "
    ."  delete_flg = '0' ";

    $arr_ps = [
        ":id" => $id
    ];

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchAll();
        return $result;
    } catch(Exception $e) {
        echo $e->getMessage();
        return false;
    }
}

function db_update_boards_id(&$conn, &$arr_param) {
    $sql = " UPDATE "
        ." boards "
        ." SET "
        ." title = :title "
        ." , content = :content "
        ." WHERE id = :id ";
        $arr_ps = [
            ":title" => $arr_param["title"]
            , ":content" => $arr_param["content"]
            , ":id" => $arr_param["id"]
        ];

        try {
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute($arr_ps);
            return $result;
        } catch(Exception $e) {
            echo $e->getMessage();
            return false;
        }
}

function db_delete_boards_id(&$conn, &$arr_param) {
    $sql = 
    " UPDATE boards "
    ." SET "
    ." delete_at = NOW() "
    ." ,delete_flg = '1' "
    ." WHERE "
    ." id = :id ";

    $arr_ps = [
        ":id" => $arr_param["id"]
    ];

    try {
        // 2. Query 실행
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($arr_ps);

        return $result; // 정상 종료일 때 true를 리턴
    } catch(Exception $e) {
        echo $e->getMessage(); // Exception 메세지 출력
        return false; // 예외발생 : false 리턴
    }
}

function db_select_boards_search(&$conn, &$arr_param) {
    $sql = 
    " SELECT "
    ." id "
    ." , title "
    ." , create_at "
    ." FROM "
    ." boards "
    ." WHERE "
    ." title "
    ." LIKE :str "
    ." AND "
    ." delete_flg = '0' ";

    $arr_ps = [
        ":str" => "%".$arr_param["search"]."%"
    ];

    try {
        // 2. Query 실행
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchAll();
        return $result; // 정상 종료일 때 true를 리턴
    } catch(Exception $e) {
        echo $e->getMessage(); // Exception 메세지 출력
        return false; // 예외발생 : false 리턴
    }
}


// TODO : 나중에 지울 것
// $conn = null;
// my_db_conn($conn);
// echo db_select_boards_cnt($conn);
// $conn = null;

?>