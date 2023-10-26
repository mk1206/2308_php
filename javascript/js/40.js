// 인라인 이벤트
// html파일 9 ~ 10 라인 확인

// 프로퍼티 리스너
const BTNGOOGLE = document.getElementById('btn_google');
BTNGOOGLE.onclick = function() {
	location.href = 'http://www.google.com';
}


// addEventListener(eventType, function)
// -----------
// 팝업창 열기
// -----------
function popOpen() {
	winOpen = open('http:\/\/www.daum.net', '', 'width=500 height=500');
}									// 크기 조절 안 해주면 현재 창에서 새 탭으로 추가됨

const BTNDAUM = document.getElementById('btn_daum');
let winOpen;
BTNDAUM.addEventListener('click', popOpen);

// -----------
// 팝업창 닫기
// -----------
function popClose() {
	winOpen.close()
}

const BTNCLOSE = document.getElementById('btn_close');
BTNCLOSE.addEventListener('click', popClose);

// -----------
// 이벤트 삭제
// -----------
// BTNDAUM.removeEventListener('click', popOpen);

// 창 열려있을 때 remove하면 닫기 버튼 실행 X
// BTNCLOSE.removeEventListener('click', popClose);


// 'test'를 콘솔에 출력하는 함수
function test() {
	console.log("test");
}

// 콜백함수를 실행하는 함수
function cb(fnc) {
	fnc();
}


// 이벤트 타입
// 1. 마우스 이벤트
// - mousedown - 마우스가 요소 안에서 클릭이 눌릴 때
// - mouseup - 마우스가 요소안에서 클릭이 해제될 때
// - mouseenter - 마우스 포인터가 요소 안으로 진입 했을 때
const DIV1 = document.getElementById('div1');
DIV1.addEventListener('mouseenter', () => {
	alert('DIV1에 들어와씀.');
	DIV1.style.backgroundColor = 'white';
});
// - mouseleave - 마우스 포인터가 요소 바깥으로 나갔을 때
// - mousemove - 마우스 포인터가 요소 안에서 움직일 때
// - event.pageX, event.pageY - 전체화면 기준(스크롤 포함) X, Y 좌표
// - event.target.getBoundingclientRect() - 요소의 크기와 뷰포트로

// 2. 키보드 이벤트
// - keydown
// - keypress
// - keyup
// - event.key - 사용자가 누른 키 값을 반환합니다.
// - event.keycode - 사용자가 누른 키 코드(ASCII) 값을 반환

// const INTXT = document.getElementById('intxt');
// INTXT.addEventListener('keyup', (e) => console.log(e.key));

// 3. 포커스 이벤트
// - focus
// - blur
// - change

// 4. 폼 이벤트
// - submit : 양식(Form)이 제출하기전에 발생하는 이벤트

// 5. 진행(progress) 이벤트
// - load
// - error