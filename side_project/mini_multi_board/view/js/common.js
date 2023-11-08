// const BTN_DETAIL = document.getElementById('btnDetail');
// const BTN_MODAL_CLOSE = document.getElementById('btnModalClose');

// BTN_DETAIL.addEventListener('click', () => {
// 	const MODAL = document.getElementById('modal');
// 	MODAL.classList.remove('displayNone');
// });

// BTN_MODAL_CLOSE.addEventListener('click', () => {
// 	const MODAL = document.getElementById('modal');
// 	MODAL.classList.add('displayNone');
// });

// 상세 모달
function openDetail(id) {
	const URL = '/board/detail?id='+id;
	console.log(URL);
	fetch(URL)
	.then(response => response.json())
	.then(data => {
		// 요소에 데이터 셋팅
		const TITLE = document.getElementById('b_title');
		const CONTENT = document.getElementById('b_content');
		const IMG = document.getElementById('b_img');
		const CREATEDAT = document.getElementById('created_at');
		const UPDATEAT = document.getElementById('updated_at');

		TITLE.innerHTML = data.data.b_title;
		CONTENT.innerHTML = data.data.b_content;
		IMG.setAttribute('src', data.data.b_img);
		CREATEDAT.innerHTML = data.data.created_at;
		UPDATEAT.innerHTML = data.data.updated_at;

		// 모달 오픈
		openModal();
	})
	.catch(error => console.log(error))
}

function openModal() {
	const MODAL = document.getElementById('modalDetail');
	MODAL.classList.add('show');
	MODAL.style = 'display: block; background-color: rgba(0, 0, 0, 0.7);';
}

// 모달 닫기
function closeDetailModal() {
	const MODAL = document.getElementById('modalDetail');
	MODAL.classList.remove('show');
	MODAL.style = 'display: none;';
}

function idChk() {
	const USERID = document.getElementById('u_id').value;
	const IDCHK = document.getElementById('idChk');
	const ERROR = document.getElementById('errorMsg');
	const URL = '/user/idchk?u_id='+USERID;
	ERROR.innerHTML = "";

	// POST로 하는 방법
	// const URL = '/user/idchk
	// const formData = new FormData();
	// formData.append("u_id", INPUT_ID.value);

	// const HEADER = {
	// 	method: "POST"
	// 	, body: formData
	// };

	fetch(URL)
	.then(response => response.json())
	.then(data => {
		if(data.errflg === "1") {
			IDCHK.innerHTML = '사용 불가';
			IDCHK.classList = 'text-danger';
		} else {
			IDCHK.innerHTML = '사용 가능';
			IDCHK.classList = 'text-success';
		}
		ERROR.innerHTML = data.msg;
	})
	.catch(error => console.log(error))
}