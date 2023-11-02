<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/view/css/common.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>자유게시판 페이지</title>
</head>
<body>
	<? require_once("view/inc/header.php"); ?>

	<div class="text-center mt-5 mb-5">
		<h1>자유게시판</h1>
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
		<div class="card">
			<img src="/view/img/don.png" class="card-img-top" alt="...">
			<div class="card-body">
			  <h5 class="card-title">전원 돈까스</h5>
			  <p class="card-text">먹어라</p>
			  <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		</div>
		<div class="card">
			<img src="/view/img/don.png" class="card-img-top" alt="...">
			<div class="card-body">
			  <h5 class="card-title">전원 돈까스</h5>
			  <p class="card-text">먹어라</p>
			  <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		</div>
		<div class="card">
			<img src="/view/img/don.png" class="card-img-top" alt="...">
			<div class="card-body">
			  <h5 class="card-title">전원 돈까스</h5>
			  <p class="card-text">먹어라</p>
			  <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		</div>
		<div class="card">
			<img src="/view/img/don.png" class="card-img-top" alt="...">
			<div class="card-body">
			  <h5 class="card-title">전원 돈까스</h5>
			  <p class="card-text">먹어라</p>
			  <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		</div>
		<div class="card">
			<img src="/view/img/don.png" class="card-img-top" alt="...">
			<div class="card-body">
			  <h5 class="card-title">전원 돈까스</h5>
			  <p class="card-text">먹어라</p>
			  <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		</div>
	</main>

	<!-- 작성 modal -->
	<div class="modal fade" id="modalInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="">
					<div class="modal-header">
						<input type="text" class="form-control" placeholder="제목을 입력하세요">
					</div>
					<div class="modal-body">
						<textarea class="form-control" cols="30" rows="10" placeholder="내용을 입력하세요"></textarea>
						<br><br>
						<input type="file" accept="image/*">
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
					<button type="button" class="btn btn-primary" data-bs-dismiss="modal">작성</button>
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
				<h5 class="modal-title" id="exampleModalLabel">개발자 입니다.</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<span>
						에스프레소에 뜨거운 물을 희석시켜 만든 음료.

						아메리카노라고 줄여서 불리지만 정확한 명칭은 카페 아메리카노(Caffé Americano)이다. 이탈리아어인 'Caffè Americano'를 영역(英譯)하면 'American coffee'이지만 영어로 쓰이는 경우는 없다.
	
						단어를 해석하자면 '미국식 커피'로, 말 그대로 '유럽식 커피에 비해 옅은 농도인 미국식 커피 스타일'을 일컫는 말이다. 다만 후술되어있듯 미국 현지에서는 아메리카노를 그닥 즐겨 마시지 않는다. 현재 미국에서 가장 대중적인 커피 스타일은 카페라테이다.
	
						에스프레소보다는 농도가 연하고 양이 많다는 이유로 카페 룽고(Caffé Lungo; 줄여서 룽고)와 혼동할 수 있지만, 서로 다른 커피이다. 자세한 내용은 문서 참조.
	
						한국의 카페에서 자주 접할 수 있는 메뉴고 선호층도 가장 두터운 편이지만, 맛에 대해서는 호불호가 굉장히 크게 나뉘는 편이다.[2] 좋아하는 사람들은 안 마시면 금단증상까지 호소할 정도지만, 설탕이나 우유 등이 들어간 달짝지근한 맛에 익숙하거나 아니면 단 것을 싫어해도 커피 또한 좋아하지 않는 사람들은 그냥 물이나 주스를 마시지 무슨 이런 쓴 맹물 커피를 돈 주고 사먹냐고 생각할 수도 있는 맛이다. 또한 블랙 커피 특성상 원두빨과 바리스타 실력을 타는 것도 주의. 최악의 경우에는 커피향과 풍미는 없고 그냥 탄내와 탄맛이 나는 갈색 괴액체가 생성되어 버린다.[3]
	
						아메리카노와 브루잉 커피[4]는 비슷한 농도를 보이지만 그 특성이 완전히 다르다. 또한 물을 첨가했을 때 생두 본연의 맛이 그대로 느껴지기 위해서는 일반적인 에스프레소, 라떼용 에스프레소와 세팅값부터 다르게 잡아야 한다. 따라서 '물 탄 에스프레소'란 정의에서 느껴지는 인상과 달리, 맛있는 에스프레소에 물 탄다고 맛있는 아메리카노가 되는 게 아니며, 맛있는 아메리카노의 원액을 그대로 먹는다고 맛있는 에스프레소인 것도 아니다.[5]
	
						요약하자면, 이론상으론 물 탄 에스프레소가 아메리카노일지는 몰라도, 요리라는 관점에서 보면 아메리카노와 물 탄 에스프레소, 그리고 에스프레소와 아메리카노 원액은 각각 서로 다른 것이다.
	
						아메리카노의 농도는 에스프레소의 '샷' 수와, 더해지는 물의 양에 따라 달라진다. 물의 양은 취향 따라 원두 따라 다 다르다. 에스프레소와 1:2 비율로 넣으라는 이야기부터 에스프레소 30ml에 물 160~250ml를 쓰라는 등 천차만별.
	
						아메리카노 위에 황갈색의 옅은 거품 같은 것이 살짝 떠 있는 경우를 종종 보게 된다. 이는 에스프레소의 크레마가 물에 녹다 만 흔적이다</span>
					<img src="/view/img/don.png" class="card-img-top">
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
				</div>
			</div>
		</div>
	</div>

	<footer class="fixed-bottom bg-dark text-light text-center p-3">저작권</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="/view/js/common.js"></script>
</body>
</html>