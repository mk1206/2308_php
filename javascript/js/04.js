// console.log("반갑습니다. JS파일입니다.");

// ---------------
// 변수 (var, let, const)
// ---------------

// var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
// var u_name = "홍길동";
// console.log(u_name);
// u_name = "갑순이";
// console.log(u_name);

// let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프
// let u_name = "홍길동";
// console.log(u_name);
// u_name = "갑순이";
// console.log(u_name);

// const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프
// const AGE = 19;
// // AGE = 20;
// console.log(AGE);

// ---------------
// 스코프
// ---------------

// // 전역 스코프
// let gender = "M";

// // 함수레벨 스코프
// function test() {
// 	let test1 = "test1";
// 	console.log(test1);
// 	console.log(gender);
// }

// // 블록레벨 스코프
// function test1() {
// 	var test1 = "test1";
// 	if(true) {
// 		var test1 = "test2";
// 	}
// 	console.log(test1);
// }

// function test2() {
// 	let test2 = "test1";
// 	if(true) {
// 		let test2 = "test2";
// 	}
// 	console.log(test2);
// }

// ---------------
// 호이스팅(hoisting)
// ---------------

// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당 하는 것
// (인터프리터: 프로그래밍 언어의 소스 코드를 바로 실행하는 컴퓨터 프로그램 또는 환경)
// 코드가 실행되기 전에 변수와 함수를 최상단에 끌어 올려지는 것

// console.log(htest1());
// console.log(hvar);
console.log(hlet);

function htest1() {
	return "htest1 함수입니다.";
}


var hvar = "var로 선언";
let hlet ="let으로 선언";

// console.log(hvar);
console.log(hlet);