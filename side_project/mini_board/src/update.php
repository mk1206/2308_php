<?php

define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

$conn = null;
$id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"]; // id 셋팅
$page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"]; // page 셋팅
$http_method = $_SERVER["REQUEST_METHOD"];
try {
	if(!my_db_conn($conn)) {
        // DB Instance 에러
        throw new Exception("DB Error : PDO Instance"); // 강제 예외발생 : DB Instance
    }

	if(($http_method) === "GET") {
		// GET Method의 경우
		// 게시글 데이터 조회를 위한 파라미터 셋팅
		$arr_param = [
			"id" => $id
		];

		// 게시글 데이터 조회
		$result = db_select_boards_id($conn, $id);
		// 게시글 조회 예외처리
		if($result === false) {
			throw new Exception("DB Error : PDO Select_id");
		} else if(!(count($result) === 1)) {
			// 게시글 조회 count 에러
			throw new Exception("DB Error : PDO Select_id Count, ".count($result));
		}
		$item = $result[0];
	} else {
		// POST Method의 경우
		// 게시글 수정을 위해 파라미터 처리
		$arr_param = [
			"id" => $id
			,"title" => $_POST["title"]
			,"content" => $_POST["content"]
		];
		// 게시글 수정 처리
		$conn->beginTransaction(); // 트랜잭션 시작

		if(!db_update_boards_id($conn, $arr_param)) {
			throw new Exception("DB Error : Update_Boards_id");
		}
		$conn->commit();

		header("Location: detail.php/?id={$id}&page={$page}");
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
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>수정 페이지</title>
</head>
<body>
	<?php 
		require_once(FILE_HEADER);
	?>
	<form action="/mini_board/src/update.php" method="post">
		<table>
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<input type="hidden" name="page" value="<?php echo $page ?>">
			<tr>
				<th>글 번호</th>
				<td><?php echo $item["id"]; ?></td>
			</tr>
			<tr>
				<th>제목</th>
				<td><input type="text" name="title" value="<?php echo $item["title"]; ?>"></td>
			</tr>
			<tr>
				<th>내용</th>
				<td><textarea name="content" id="content" cols="30" rows="10"><?php echo $item["content"]; ?></textarea></td>
			</tr>
		</table>
		<button class="update-btn" type="submit">수정확인</button>
		<a class="update-btn" href="/mini_board/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">수정취소</a>
	</form>
</body>
</html>