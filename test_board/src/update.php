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

    $id = $_GET;

    $result = db_select_detail($conn, $id);
    if($result === false) {
        throw new Exception("select_update Error");
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
	<link rel="stylesheet" href="/test_board/src/css/common.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Gaegu:wght@300&display=swap" rel="stylesheet">
	<title>update</title>
</head>
<body>
	<form action="/test_board/src/update.php" method="post">
        <section class="section">
            <a href="/test_board/src/detail.php/?id=<?php echo $item["id"]; ?>" class="cancel">취소</a>
            <button type="submit" class="write-go">확인</button>
        </section>
        <section class="box">
            <div class="div1">
                <span class="create_at"><?php echo $item["Date"]; ?></span>
                <input type="text" name="title" placeholder="제목" class="title">
                <select name="weather" class="weather">
                    <option value="0">맑음</option>
                    <option value="1">비</option>
                    <option value="2">구름</option>
                    <option value="3">눈</option>
                </select>
                <select name="mood" class="mood">
                    <option value="0">좋음</option>
                    <option value="1">슬픔</option>
                    <option value="2">화남</option>
                    <option value="3">피곤</option>
                    <option value="4">쏘쏘</option>
                </select>
            </div>
            <textarea name="content" class="content insert-content" cols="30" rows="10"></textarea>
        </section>
    </form>
</body>
</html>