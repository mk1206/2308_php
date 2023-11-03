<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/test_board/src/");
require_once(ROOT."lib/lib_db.php");

$http_method = $_SERVER["REQUEST_METHOD"];
$arr_param = [];

if($http_method === "POST") {
    try {
        $conn = null;
    
        if(!my_db_conn($conn)) {
            throw new Exception("DB Error : PDO Instance");
        }
    
        $arr_param["title"] = isset($_POST["title"]) ? trim($_POST["title"]) : "";
        $arr_param["content"] = isset($_POST["content"]) ? trim($_POST["content"]) : "";
        $arr_param["select_at"] = isset($_POST["select_at"]) ? trim($_POST["select_at"]) : "";
        $arr_param["weather"] = isset($_POST["weather"]) ? trim($_POST["weather"]) : "";
        $arr_param["mood"] = isset($_POST["mood"]) ? trim($_POST["mood"]) : "";
    
        $conn->beginTransaction();

        if(!db_insert_boards($conn, $arr_param)) {
            throw new Exception("DB insert Error");
        }

        $conn->commit();
    
        header("Location: list.php");
        exit;
    
    } catch(Exception $e) {
        $conn->rollBack();
        echo $e->getMessage();
        exit;
    } finally {
        db_destroy_conn($conn);
    }
}


?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/test_board/src/css/common.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Gaegu:wght@300&display=swap" rel="stylesheet">
    <title>insert</title>
</head>
<body>
    <form action="/test_board/src/insert.php" method="post">
        <section class="section">
            <a href="/test_board/src/list.php" class="cancel">안 쓸래</a>
            <button type="submit" class="write-go">쓸래</button>
        </section>
        <section class="box">
            <div class="div1">
                <input type="date" name="select_at" class="select_at">
                <input type="text" name="title" placeholder="제목" class="title">
                <select name="weather" class="weather">
                    <option value="0">맑음</option>
                    <option value="1">비</option>
                    <option value="2">구름</option>
                    <option value="3">눈</option>
                </select>
                <select name="mood" class="mood">
                    <option value="0">좋음</option>
                    <option value="1">슬픔</option>
                    <option value="2">화남</option>
                    <option value="3">피곤</option>
                    <option value="4">쏘쏘</option>
                </select>
            </div>
            <textarea name="content" class="content insert-content" cols="30" rows="10" spellcheck="false"></textarea>
        </section>
    </form>
</body>
</html>