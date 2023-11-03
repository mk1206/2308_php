<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/test_board/src/");
define("ERROR_MSG_PARAM", "%s 필수 입력 사항입니다.");
require_once(ROOT."lib/lib_db.php");

$http_method = $_SERVER["REQUEST_METHOD"];
$arr_err_msg = [];
$arr_param = [];
$arr_param["title"] = "";
$arr_param["content"] = "";
$arr_param["select_at"] = "";

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

        if($arr_param["title"] === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목은");
        }
        if($arr_param["content"] === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용은");
        }
        if($arr_param["select_at"] === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "날짜는");
        }

        if(count($arr_err_msg) === 0) {
            // ex) 12월 2일 일기가 있는 상태에서 12월 2일 일기를 또 추가하려할 때 오류
            $result = db_insert_chk($conn, $arr_param);
            if(!$result) {

                if(!db_insert_boards($conn, $arr_param)) {
                    throw new Exception("DB insert Error");
                }
                    
                header("Location: list.php");
                exit();
            } else {
                throw new Exception("현재 선택하신 날짜는 이미 일기가 있는 날짜입니다");
            }
        }
    
    } catch(Exception $e) {
        header("Location: error.php/?err_msg={$e->getMessage()}");
        exit();
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
        <?php
        foreach($arr_err_msg as $val) {
        ?>
            <p><?php echo $val ?></p>
        <?php
        }
        ?>
            <a href="/test_board/src/list.php" class="cancel">안 쓸래</a>
            <button type="submit" class="write-go">쓸래</button>
        </section>
        <section class="box">
            <div class="div1">
                <input type="date" name="select_at" class="select_at" value="<?php echo $arr_param["select_at"]; ?>">
                <input type="text" name="title" placeholder="제목" class="title" value="<?php echo $arr_param["title"]; ?>">
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
            <textarea name="content" class="content insert-content" cols="30" rows="10" spellcheck="false"><?php echo $arr_param["content"]; ?></textarea>
        </section>
    </form>
</body>
</html>