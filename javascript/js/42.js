// Javascript는 동기적인(synchronous) 프로그래밍 언어
// 즉, 호이스팅이 된 이후부터 개발자가 작성한 코드의 순서대로 실행

// 비동기적(asynchronous)이라는 것은 특정 코드의 연산이 끝낼 때까지 


// console.log('A');
// console.log('B');
// console.log('C');

// console.log('A');
// setTimeout(() => {
// 	console.log('B');
// }, 1000);
// console.log('C');



// const NOW = new Date();
// let loop1 = new Date();

// while(loop1 - NOW < 1000) {
// 	loop1 = new Date();
// }
// console.log('A');


// // 함수로
// function mySetTimeout(callback, ms) {
// 	const NOW = new Date();
// 	let loop1 = new Date();

// 	while(loop1 - NOW < 1000) {
// 		loop1 = new Date();
// 	}
// 	callback();
// }

// mySetTimeout(() => console.log('1'), 1000);
// mySetTimeout(() => console.log('2'), 1000);
// mySetTimeout(() => console.log('3'), 1000);
// mySetTimeout(() => console.log('4'), 1000);
// mySetTimeout(() => console.log('5'), 1000);



// 비동기 처리

// setTimeout(() => {
// 	console.log('A');
// }, 3000);
// setTimeout(() => {
// 	console.log('B');
// }, 2000);
// setTimeout(() => {
// 	console.log('C');
// }, 1000);


// 비동기 처리를 동기처리로 하고 싶을 때
// 콜백 지옥 : 콜백 함수를 이용하여 비동기 처리를 동기처리 하도록 만들 때 나타나는 난잡한 소스코드 ㄷㄷ
setTimeout(() => {
	console.log('A');
	setTimeout(() => {
		console.log('B');
		setTimeout(() => {
			console.log('C');
		}, 1000);
	}, 2000);
}, 3000);
