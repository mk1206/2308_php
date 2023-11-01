<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/test_board/src/");
require_once(ROOT."lib/lib_db.php");

$http_method = $_SERVER["REQUEST_METHOD"];
$arr_post = [];

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
        $arr_post["id"] = isset($_POST["id"]) ? trim($_POST["id"]) : "";
        $arr_post["title"] = isset($_POST["title"]) ? trim($_POST["title"]) : "";
        $arr_post["content"] = isset($_POST["content"]) ? trim($_POST["content"]) : "";
        $arr_post["weather"] = isset($_POST["weather"]) ? trim($_POST["weather"]) : "";
        $arr_post["mood"] = isset($_POST["mood"]) ? trim($_POST["mood"]) : "";

        
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
                <input type="hidden" name="id" value="<?php echo $item["id"]; ?>">
                <span class="create_at"><?php echo $item["Date"]; ?></span>
                <input type="text" name="title" class="title" value="<?php echo $item["title"] ?>">
                <select name="weather" class="weather">
                    <option value="0" <?php echo $item["weather"] === 0 ? "selected" : ""; ?>>맑음</option>
                    <option value="1" <?php echo $item["weather"] === 1 ? "selected" : ""; ?>>비</option>
                    <option value="2" <?php echo $item["weather"] === 2 ? "selected" : ""; ?>>구름</option>
                    <option value="3" <?php echo $item["weather"] === 3 ? "selected" : ""; ?>>눈</option>
                </select>
                <select name="mood" class="mood">
                    <option value="0" <?php echo $item["mood"] === 0 ? "selected" : ""; ?>>좋음</option>
                    <option value="1" <?php echo $item["mood"] === 1 ? "selected" : ""; ?>>슬픔</option>
                    <option value="2" <?php echo $item["mood"] === 2 ? "selected" : ""; ?>>화남</option>
                    <option value="3" <?php echo $item["mood"] === 3 ? "selected" : ""; ?>>피곤</option>
                    <option value="4" <?php echo $item["mood"] === 4 ? "selected" : ""; ?>>쏘쏘</option>
                </select>
            </div>
            <textarea name="content" class="content insert-content" cols="30" rows="10"><?php echo $item["content"] ?></textarea>
        </section>
    </form>
</body>
</html>