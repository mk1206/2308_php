<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

$err_msg = isset($_GET["err_msg"]) ? $_GET["err_msg"] : "";

?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <title>에러 페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
	<main>
		<p>미안합니다</p>
		<p><?php echo $err_msg ?></p>
		<a class="back-btn" href="/mini_board/src/list.php">돌아갑시다</a>
	</main>
</body>
</html>