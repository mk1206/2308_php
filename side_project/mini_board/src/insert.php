<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

// POST로 request가 있을 때 처리
$http_method = $_SERVER["REQUEST_METHOD"];
if($http_method === "POST") {
    try{
        $arr_post = $_POST;
        $conn = null; // DB Connection 변수

        // DB 접속
        if(!my_db_conn($conn)) {
            // DB Instance 에러
            throw new Exception("DB Error : PDO Instance");
        }
        $conn->beginTransaction(); // 트랜잭션 시작

        if(!db_insert_boards($conn)) {
            throw new Exception("DB Error : Insert Boards");
        }

        $conn->commit(); // 모든 처리 완료 시 커밋

        // 리스트 페이지로 이동
        header("Location: list.php");
        exit;
    } catch(Exception $e) {
        $conn->rollBack();
        echo $e->getMessage(); // Exception 메세지 출력
        exit;
    } finally {
        db_destroy_conn($conn); // DB 파기
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <title>작성 페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
    <form action="/mini_board/src/insert.php" method="post">
            <label for="title">제목</label>
            <input id="title" name="title" type="text">
            <br>
            <label for="content">내용</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
            <br>
            <button type="submit">작성</button>
            <a href="/mini_board/src/list.php">취소</a>
    </form>
    
</body>
</html>