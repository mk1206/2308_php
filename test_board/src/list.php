<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/test_board/src/");
require_once(ROOT."lib/lib_db.php");

$arr_get = [];

try {
	$conn = null;

	if(!my_db_conn($conn)) {
		throw new Exception("DB Error : PDO Instance");
	}
	
	$arr_month["month"] = isset($_GET["month"]) ? $_GET["month"] : 10;
	
	$result_month = db_select_month($conn, $arr_month);
	if(!$result_month) {
		throw new Exception("DB select_month Error");
	}
	
	$result = db_select_boards($conn, $arr_month);
	if(!$result) {
		throw new Exception("DB select_boards Error");
	}

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
	<link rel="stylesheet" href="/test_board/src/css/common.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Gaegu:wght@300&display=swap" rel="stylesheet">
	<title>list</title>
</head>
<body>
	<form action="/test_board/src/list.php" method="get">
		<section class="section">
			<P class="year">2023</P>
			<button class="month" name="month" value="<?php echo $result_month[0]["month"] - 1; ?>"><</button>
			<P class="month"><?php echo $result_month[0]["month"]; ?></P>
			<button class="month" name="month" value="<?php echo $result_month[0]["month"] + 1; ?>">></button>
			<a class="write" href="/test_board/src/insert.php">일기쓰기</a>
		</section>
	</form>
	<section class="section2">
		<?php foreach($result as $item) { ?>
		<a class="detail_go" href="/test_board/src/detail.php/?id=<?php echo $item["id"]; ?>">
			<span><?php echo $item["select_at"]; ?>일</span>
			<br>
			<img src="/test_board/doc/<?php
			if($item["mood"] === "0") {
				echo "good.png";
			} else if($item["mood"] === "1") {
				echo "sad.png";
			} else if($item["mood"] === "2") {
				echo "angry.png";
			} else if($item["mood"] === "3") {
				echo "tired.png";
			} else if($item["mood"] === "4") {
				echo "soso.png";
			}
			?>">
		</a>
		<?php } ?>
	</section>
</body>
</html>