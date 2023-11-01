
// https://picsum.photos/v2/list?page=2&limit=5

const BTN_API = document.getElementById('btnApi');
BTN_API.addEventListener('click', my_fetch);

function my_fetch() {
	const INPUT_URL = document.getElementById('inputUrl');
	fetch(INPUT_URL.value.trim())
	.then(response => response.json())
	.then(data => makeImg(data))
	.catch(error => console.log(error));
}

function makeImg(data) {
	data.forEach(item => {
		// article 관련 요소 생성
		const ARTICLE = document.createElement('article');
		const ARTICLE_ID = document.createElement('div');
		const ARTICLE_IMG = document.createElement('img');

		// article 관련 요소의 속성 및 컨텐츠 셋팅
		ARTICLE_ID.className = 'articleId';
		ARTICLE_ID.innerHTML = item.id;
		ARTICLE_IMG.className = 'articleImg';
		ARTICLE_IMG.setAttribute('src', item.download_url);

		// article 관련 요소 구조 셋팅
		ARTICLE.appendChild(ARTICLE_ID);
		ARTICLE.appendChild(ARTICLE_IMG);

		const SECTION_CONTENT = document.querySelector('.sectionContents');
		SECTION_CONTENT.appendChild(ARTICLE);
	});
}

// 지우기 버튼
const BTN_REMOVE = document.getElementById('btnRemove');
BTN_REMOVE.addEventListener('click', clear);

function clear() {
	const SECTION_CON = document.querySelector('.sectionContents')
	SECTION_CON.innerHTML = '';
}