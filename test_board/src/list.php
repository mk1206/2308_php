<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/test_board/src/");
require_once(ROOT."lib/lib_db.php");

$arr_get = [];

try {
	$conn = null;

	
	if(!my_db_conn($conn)) {
		throw new Exception("DB Error : PDO Instance");
	}
	
	$http_method = $_SERVER["REQUEST_METHOD"];
	$arr_month["month"] = isset($_GET["month"]) ? $_GET["month"] : 10;
	
	$result = db_select_boards($conn, $arr_month);
	if(!$result) {
		throw new Exception("DB select_boards Error");
		
	}

	if($http_method === "GET") {
		$result_month = db_select_month($conn, $arr_month);
		if(!$result_month) {
			throw new Exception("DB select_month Error");
		}
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
	<link rel="stylesheet" href="../src/css/common.css">
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
		<a class="content" href="/test_board/src/detail.php/?id=<?php echo $item["id"]; ?>">
			<span><?php echo $item["create_at"]; ?>일</span>
			<br>
			<span><?php echo $item["mood"]; ?></span>
		</a>
		<?php } ?>
	</section>
</body>
</html>