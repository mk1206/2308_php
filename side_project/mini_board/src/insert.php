<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
define("ERROR_MSG_PARAM", "%s은 필수 입력 사항입니다.");
require_once(ROOT."lib/lib_db.php");

// POST로 request가 있을 때 처리
$conn = null; // DB Connection 변수
$http_method = $_SERVER["REQUEST_METHOD"];
$arr_err_msg = [];
$title = "";
$content = "";

if($http_method === "POST") {
    try{
        $arr_post = $_POST;

        $title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
        $content = isset($_POST["content"]) ? trim($_POST["content"]) : "";

        if($title === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "title");
        }
        if($content === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "content");
        }

        if(count($arr_err_msg) === 0) {
            // DB 접속
            if(!my_db_conn($conn)) {
                // DB Instance 에러
                throw new Exception("DB Error : PDO Instance");
            }
            $conn->beginTransaction(); // 트랜잭션 시작
    
            if(!db_insert_boards($conn, $arr_post)) {
                throw new Exception("DB Error : Insert Boards");
            }
    
            $conn->commit(); // 모든 처리 완료 시 커밋
    
            // 리스트 페이지로 이동
            header("Location: list.php");
            exit;
        }
        // if(count($arr_err_msg) >= 1) {
        //     throw new Exception(implode("<br>", $arr_err_msg));
        // }

    } catch(Exception $e) {
        $conn->rollBack();
        // echo $e->getMessage(); // Exception 메세지 출력
        header("Location: error.php/?err_msg={$e->getMessage()}");
        exit;
    } finally {
        db_destroy_conn($conn); // DB 파기
    }
}

?>

<!DOCTYPE html>
<html lang="ko">
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
    <main>
        <?php
        foreach($arr_err_msg as $val) {
        ?>
            <p><?php echo $val ?></p>
        <?php
        }
        ?>
    <form class="insert_form" action="/mini_board/src/insert.php" method="post">
        <label for="title">제목</label>
        <input class="title" id="title" name="title" type="text" value="<?php echo $title ?>">
        <br>
        <label class="content-label" for="content">내용</label>
        <textarea class="content-area" name="content" id="content" cols="30" rows="20"><?php echo $content ?></textarea>
        <br>
        <div class="button">
            <button type="submit">작성</button>
            <a href="/mini_board/src/list.php">취소</a>
        </div>
    </form>
</main>
</body>
</html>