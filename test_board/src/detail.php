<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/test_board/src/");
require_once(ROOT."lib/lib_db.php");

try {
	$conn = null;

	if(!my_db_conn($conn)) {
		throw new Exception("DB Error : PDO Instance");
	}

    if(!isset($_GET["id"]) || $_GET["id"] === "") {
        throw new Exception("Parameter ERROR : No id");
    }

    $id = $_GET["id"];

    $result = $db_select_detail($conn, $id);
    if(!$result) {
        throw new Exception("select_detail Error");
    }
    $item = $result[0];

} catch(Exception $e) {
    echo $e->getMessage();
} finally {
    db_destroy_conn($conn);
}


?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/common.css">
    	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Gaegu:wght@300&display=swap" rel="stylesheet">
    <title>detail</title>
</head>
<body>
    <section class="section detail-box">
        <a href="/test_board/src/list.php" class="back">돌아가기</a>
        <a href="" class="delete">삭제하기</a>
        <a href="" class="update">수정하기</a>
    </section>
    <section class="box">
        <div class="div1">
            <span class="create_at"><?php echo $item["create_at"]; ?></span>
            <span class="title"><?php echo $item["title"]; ?></span>
            <span class="mood"><?php echo $item["weather"]; ?></span>
            <span class="weather"><?php echo $item["mood"]; ?></span>
         </div>
        <p class="content"><?php echo $item["content"]; ?></p>
    </section>
</body>
</html>