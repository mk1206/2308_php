<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/test_board/src/");
require_once(ROOT."lib/lib_db.php");

$http_method = $_SERVER["REQUEST_METHOD"];

try {
	$conn = null;

	if(!my_db_conn($conn)) {
		throw new Exception("DB Error : PDO Instance");
	}

    if($http_method === "GET") {
        if(!isset($_GET["id"]) || $_GET["id"] === "") {
            throw new Exception("Parameter ERROR : No id");
        }
    
        $id = $_GET;
    
        $result = db_select_detail($conn, $id);
        if($result === false) {
            throw new Exception("select_update Error");
        }
        $item = $result[0];
    } else {
        $id = isset($_POST["id"]) ? $_POST["id"] : "";

        $conn->beginTransaction();
        
        if(db_delete_boards($conn, $id) === false) {
            throw new Exception("delete_boards Error");
        }

        $conn->commit();
    
        header("Location: list.php");
        exit;
    }

} catch(Exception $e) {
    if($http_method === "POST") {
        $conn->rollBack();
    }
    echo $e->getMessage();
    exit;
} finally {
    db_destroy_conn($conn);
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
    <title>detail</title>
</head>
<body>
    <form action="/test_board/src/delete.php" method="post">
        <section class="section detail-box">
            <a href="/test_board/src/detail.php/?id=<?php echo $item["id"]; ?>" class="back">취소</a>
            <span style="color: red;">삭제하면 다시는 복구 못합니다 ㅠㅠ</span>
            <input type="hidden" name="id" value="<?php echo $item["id"]; ?>">
            <button type="submit" class="write-go">삭제</button>
        </section>
    </form>
    <section class="box">
        <div class="div1">
            <span class="create_at"><?php echo $item["Date"]; ?></span>
            <span class="title"><?php echo $item["title"]; ?></span>
            <img class="weather" src="/test_board/doc/<?php
            if($item["weather"] === 0) {
                echo "sun.png";
            } else if($item["weather"] === 1) {
                echo "rain.png";
            } else if($item["weather"] === 2) {
                echo "cloud.png";
            } else if($item["weather"] === 3) {
                echo "snow.png";
            }
            ?>"></img>
            <img class="mood" src="/test_board/doc/<?php
            if($item["mood"] === 0) {
                echo "good.png";
            } else if($item["mood"] === 1) {
                echo "sad.png";
            } else if($item["mood"] === 2) {
                echo "angry.png";
            } else if($item["mood"] === 3) {
                echo "tired.png";
            } else if($item["mood"] === 4) {
                echo "soso.png";
            }
            ?>"></img>
         </div>
        <p class="content"><?php echo $item["content"]; ?></p>
    </section>
</body>
</html>