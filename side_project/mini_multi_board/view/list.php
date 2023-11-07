<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/view/css/common.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title><?php echo $this->titleBoardName ?></title>
</head>
<body>
	<? require_once("view/inc/header.php");?>

	<div class="text-center mt-5 mb-5">
		<h1><?php echo $this->titleBoardName ?></h1>
		<svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-controller" viewBox="0 0 16 16"  data-bs-toggle="modal" data-bs-target="#modalInsert">
			<path d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z"/>
			<path d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.34 2.34 0 0 1 .433-.335.504.504 0 0 1-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 0 0-.748 2.295 12.351 12.351 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 0 0-.339-2.406 13.753 13.753 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z"/>
		  </svg>
	</div>

	<!-- 모달 test -->
	<!-- <div id="modal" class="displayNone">
		<div id="modalW"></div>
		<button id="btnModalClose">닫기</button>
	</div> -->

	<main>
		<?php 
			foreach($this->arrBoardInfo as $item) { ?>
		<div class="card" id="card<?php echo $item['id']; ?>">
			<img src="<?php echo isset($item["b_img"]) ? "/"._PATH_USERIMG.$item["b_img"] : ""; ?>" class="card-img-top" alt="이미지 없음">
			<div class="card-body">
			  <h5 class="card-title"><?php echo $item["b_title"]; ?></h5>
			  <p class="card-text"><?php echo mb_substr($item["b_content"], 0, 10)."..."; ?></p>
			  <!-- <button type="submit" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button> -->
			  <button
			  class="btn btn-primary"
			  onclick="openDetail(<?php echo $item['id'] ?>); return false;">상세</button>
			</div>
		</div>
		<?php } ?>
	</main>

	<!-- 작성 modal -->
	<div class="modal fade" id="modalInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="/board/add" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="b_type" value="<?php echo $this->boardType; ?>">
					<div class="modal-header">
						<input type="text" class="form-control" placeholder="제목을 입력하세요" name="b_title">
					</div>
					<div class="modal-body">
						<textarea class="form-control" cols="30" rows="10" placeholder="내용을 입력하세요" name="b_content"></textarea>
						<br><br>
						<input type="file" accept="image/*" name="b_img">
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
					<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">작성</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- 상세 Modal -->
	<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title" id="b_title">개발자 입니다.</h5>
				<button type="button" onclick="closeDetailModal(); return false;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<p>작성일: <span id="created_at">작성</span></p>
				<p>수정일: <span id="updated_at">수정</span></p>
				<br>
					<span id="b_content">
						ㅁ</span>
					<img src="" class="card-img-top" id="b_img">
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" onclick="closeDetailModal(); return false;" data-bs-dismiss="modal">닫기</button>
				</div>
			</div>
		</div>
	</div>

	<footer class="fixed-bottom bg-dark text-light text-center p-3">저작권</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="/view/js/common.js"></script>
</body>
</html>