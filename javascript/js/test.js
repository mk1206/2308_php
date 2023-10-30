
// // 두 수를 받아서 더한 값을 리턴해주는 함수를 만들ㅇ ㅓ봅시다.

// function sum(a, b) {
// 	return a + b;
// }


// // 콜백 함수 : 

// function callBack(fnc) {
// 	fnc();
// }

// callBack(function() {
// 	console.log('A');
// });

// callBack( () => console.log('A'));

// function myPrint() {
// 	console.log('123');
// }

// setTimeout(myPrint, 1000);


// ----------------------------------------

// // - php를 출력하는 함수
// // - 504를 출력하는 함수
// // - 풀스택을 출력하는 함수

// // 1번 함수는 3초 뒤에 출력
// function printPhp() {
// 	console.log('php');
// }

// // let printPhp = () => console.log('php');

// setTimeout(printPhp, 3000);


// // 2번 함수는 5초 뒤에 출력
// function printNum() {
// 	console.log('504');
// }

// // let printNum = () => console.log('504');

// setTimeout(printNum, 5000);

// // 3번 함수는 바로 출력

// function full() {
// 	console.log('풀스택');
// }

// // let full = () => console.log('풀스택');

// full();


// ----------------------------------------

// // 현재 시간 구하기

// const DIV = document.getElementById('div');
// const DIV2 = document.getElementById('div2');

// function time() {
// 	let now = new Date();
// 	let year = now.getFullYear();
// 	let month = '0'+(now.getMonth() + 1);
// 	let date = '0'+now.getDate();
// 	let hour = '0'+now.getHours();
// 	let min = '0'+now.getMinutes();
// 	let sec = '0'+now.getSeconds();

// 	DIV.innerHTML = hour.slice(-2) + ':' + min.slice(-2) + ':' + sec.slice(-2);
// 	DIV2.innerHTML = year + '-' + month.slice(-2) + '-' + date.slice(-2) + ' ' + hour.slice(-2) + ':' + min.slice(-2) + ':' + sec.slice(-2);
// }

// setInterval(time, 1000);

// ----------------------------------------

// 버튼 만들기
// 버튼 클릭시 네이버로 이동

const BTN = document.createElement('button');
document.body.appendChild(BTN);
BTN.innerHTML = 'naver'
BTN.style.backgroundColor = 'green';
BTN.style.border = 'none';
BTN.style.color = 'white';
BTN.style.cursor = 'pointer';

function btnNaver() {
	location.href = 'https:\/\/www.naver.com';
}

BTN.addEventListener('click', btnNaver);

