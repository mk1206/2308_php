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

// ---------------
// 4. 요소 스타일링
// ---------------
// style : 인라인으로 스타일 추가
TITLE.style.color = 'red';

// classList : 클래스로 스타일 추가 또는 삭제
TITLE.classList.add('class1', 'class2', 'class3');
TITLE.classList.remove('class2');