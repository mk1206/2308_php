<?php

$arr_post = $_POST;
print_r($arr_post);

?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="/test_tng/src/tng_list.php" method="post">
	<input type="text" name="bar">
	<button type="submit">확인</button>
	<?php 
	foreach($arr_post as $item) { ?>
	<div>
		<progress value="<?php echo $item; ?>" max="100"></progress>
	</div>
	<?php } ?>
</form>
</body>
</html>