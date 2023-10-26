// 1. DOM (Document Object Model)
// 웹 문서를 제어하기 위해서 웹 문서를 객체화한 것
// DOM API를 통해서 HTML의 구조나 내용 또는 스타일등을 동적으로 조작 가능

// 2. 요소 선택
// 	2-1. 고유한 ID로 요소를 선택
const TITLE = document.getElementById('title');
// TITLE.style.color = 'blue'; id가 title인 태그의 글씨를 blue로
// TITLE.style.fontSize = '40px'; 글씨크기를 40px로

const SUB = document.getElementById('subtitle');
// SUB.style.backgroundColor = 'beige'; id가 subtitle인 태그의 바탕색을 beige로

// 2-2. 태그명으로 요소를 선택 (해당 요소들을 컬랙션 객채로 가져온다.)
const H2 = document.getElementsByTagName('h2');
// H2[0].style.color = 'blue'; 서브서브의 글씨를 blue로
// H2[1].style.color = 'red'; 서브서브2222222의 글씨를 red로

// 2-3. 클래스로 요소를 선택
const NONE = document.getElementsByClassName('none-li');

// 2-4. CSS 선택자를 사용해 요소를 찾는 메소드
// 		querySelector() : 복수일 경우 가장 첫번째 요소만 선택
const S_ID = document.querySelector('#subtitle2');
const S_NONE = document.querySelector('.none-li');

// 		querySelectorALL() : 복수 요소라면 전부 선택
const S_NONE_ALL = document.querySelectorAll('.none-li');

// ---------------
// 3. 요소 조작
// ---------------
// textContent : 순수한 텍스트 데이터를 전달, 이전의 태그들은 모두 제거

const DIV1 = document.getElementById('div1');
// DIV1.textContent = '<p>탕슉</p>';

// innerHTML : 태그는 태그로 인식해서 전달, 이전의 태그들은 모두 제거
// TITLE.innerHTML = '<p>탕슉</p>';

const INPUT = document.getElementById('intxt');

// setAttribute('', ''); : 요소에 속성을 추가
// INPUT.setAttribute('placeholder', '하이하잉');

// ** 몇몇 속성들은 DOM객체에서 바로 설정 가능 **
// ex) INPUT.placeholder = '바로 접근가능';

// removeAttribute('') : 요소의 속성을 제거
// INPUT.removeAttribute('placeholder'); 
// INPUT.removeAttribute('class');

// ---------------
// 4. 요소 스타일링
// ---------------
// style : 인라인으로 스타일 추가
TITLE.style.color = 'red';

// classList : 클래스로 스타일 추가 또는 삭제
TITLE.classList.add('class1', 'class2', 'class3');
TITLE.classList.remove('class2');

// -------------------
// 5. 새로운 요소 생성
// -------------------
// 요소 만들기
const LI = document.createElement('li');

// 삽입할 부모 요소 접근
const UL = document.getElementById('ul');

// 부모요소의 가장 마지막 위치에 삽입
// 추가
UL.appendChild(LI);
// 삭제
LI.remove();
// LI 요소에 글씨 삽입
LI.innerHTML = 'ㅎㅇㅎㅇㅎㅇ';

// 요소를 특정 위치에 삽입
const SPACE = document.querySelector('li:nth-child(3)');
UL.insertBefore(LI, SPACE);



// 1. 사과 게임 위에 장기를 넣어주ㅝ
const LI1 = document.createElement('li');
LI1.innerHTML = '장기';
const SPACE1 = document.querySelector('li:nth-child(5)');
UL.insertBefore(LI1, SPACE1);

// 사과 게임에 id를 주고 getElementById 하기
// const LIJANGGI = document.createElement('li');
// LIJANGGI.innerHTML = '장기';
// const LIAPPLE = document.getElementById('apple');
// UL.insertBefore(LIJANGGI, LIAPPLE);

// 2. 어메이징 브릭에 베이지 배경색을 넣어주세요
const SPACE2 = document.querySelector('ul li:last-child');
SPACE2.style.backgroundColor = 'beige';
// SPACE2.setAttribute('style', 'background-color: beige');

// 3. 리스트에서 짝수는 빨간색 글씨, 홀수는 파란색 글씨
const LI_ALL = document.getElementsByTagName('li');

for(let i = 0; i < LI_ALL.length; i++) {
	if(i % 2 === 0) {
		LI_ALL[i].style.color = 'blue';
	} else {
		LI_ALL[i].style.color = 'red';
	}

	// 삼항 연산자로
	// LI_ALL[i].style.color = i % 2 === 0 ? 'blue' : 'red';
};

// 짝수, 홀수
// const EVEN = document.querySelectorAll('ul li:nth-child(even)');
// const ODD = document.querySelectorAll('ul li:nth-child(odd)');

// DOM
// https://developer.mozilla.org/ko/docs/Web/API/Document_Object_Model

