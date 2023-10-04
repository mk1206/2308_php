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

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_test/src/css/test_common.css">
	<title>Document</title>
</head>
<body>
	<main>
		<form action="/mini_test/src/test_list.php" method="post">
			<button name="category" value="all">전체</button>
			<button name="category" value="study">공부</button>
			<button name="category" value="work_out">운동</button>
		</form>
		<?php
		foreach($_POST as $value) {
			foreach($result as $item) {
				if($value == "all") {
					?>
					<ul>
						<li><?php echo $item["id"]; ?></li>
						<li><?php echo $item["title"]; ?></li>
						<li><?php echo $item["create_at"]; ?></li>
						<li><?php echo $item["category"]; ?></li>
					</ul>
					<?php
				} else if($value == "study") {
					if($item["category"] == "공부") { ?>
					<ul>
						<li><?php echo $item["id"]; ?></li>
						<li><?php echo $item["title"]; ?></li>
						<li><?php echo $item["create_at"]; ?></li>
						<li><?php echo $item["category"]; } ?></li>
					</ul>
					<?php
				} else if($value == "work_out") {
					if($item["category"] == "운동") { ?>
					<ul>
						<li><?php echo $item["id"]; ?></li>
						<li><?php echo $item["title"]; ?></li>
						<li><?php echo $item["create_at"]; ?></li>
						<li><?php echo $item["category"]; } ?></li>
					</ul>
					<?php
				}
			}
		} ?>
	</main>
</body>
</html> 