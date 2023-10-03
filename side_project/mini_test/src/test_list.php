<?php

define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
require_once(ROOT."lib/test_lib_db.php");

$conn = null;

if(!my_db_conn($conn)) {
	throw new Exception("DB Error : PDO Instance");
}

$result = db_select_boards($conn);
if(!$result) {
	throw new Exception("DB Error : SELECT boards");
}

$type_method = $_SERVER["REQUEST_METHOD"];
if($type_method === "POST") {
	try {
		$arr_post = $_POST;

		$result = db_select_boards_category($conn, $arr_post);
		if(!$result) {
			throw new Exception("DB Error : SELECT category");
		}
		
	} catch(Exception $e) {
		echo $e->getMessage(); // 예외발생 메세지 출력
		exit; // 처리 종료
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
	<link rel="stylesheet" href="../css/test_common.css">
	<title>Document</title>
</head>
<body>
	<main>
		for($i)
	<?php
		foreach($result as $item) {
	?>
		<ul>
			<li><?php echo $item["id"]; ?></li>
			<li><?php echo $item["title"]; ?></li>
			<li><?php echo $item["create_at"]; ?></li>
			<li><?php echo $item["category"]; ?></li>
		</ul>
		<?php	} ?>
	</main>
</body>
</html> 