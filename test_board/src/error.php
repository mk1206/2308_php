<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/test_board/src/");
require_once(ROOT."lib/lib_db.php");

$err_msg = isset($_GET["err_msg"]) ? $_GET["err_msg"] : "";


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
    <title>error</title>
</head>
<body>
<section class="section detail-box">
        <a href="/test_board/src/list.php" class="back">돌아가기</a>
        <?php if($err_msg === "현재 달에는 일기가 없습니다 ㅠㅠ") { ?>
        <a href="/test_board/src/insert.php" class="write-go">일기쓰기</a>
        <?php } ?>
    </section>
    <section class="box">
        <p><?php echo $err_msg ?></p>
    </section>
</body>
</html>