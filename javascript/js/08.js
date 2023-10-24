// ---------------
// 조건문 (if, switch)
// ---------------

// if(조건) {
// 	// 처리
// } else if(조건) {
// 	// 처리
// } else {
// 	// 처리
// }

// let age = 30;
// switch(age) {
// 	case 20:
// 		console.log("20대");
// 		break;
// 	case 30:
// 		console.log("30대");
// 		break;
// 	default:
// 		console.log("모르겠수");
// 		break;
// }

// ------------------------------------------
// 반복문 (while, do_while, for, foreach, for...in, for...of)
// ------------------------------------------

// foreach : 배열만 사용 가능
// let arr = [1, 2, 3, 4];
// arr.forEach(function(val, key){
// 	console.log(`${key} : ${val}`);
// });

// for...in : 모든 객체를 루프 가능, key에만 접근 가능
// let obj = {
// 	key1: 'val1'
// 	, key2: 'val2'
// }
// for(let key in obj) {
// 	console.log(obj[key]);
// }

// for...of : 모든 iterable객체를 루프 가능, value에만 접근 가능 (String, Array, Map, Set, TypeArray...)



// 정렬해주세요.

let sort_arr = [3, 5, 2, 10, 7];
// let save;

// for(let i = 1; i <= sort_arr.length; i++) {
// 	for(let j = 1; j <= sort_arr.length - i; j++) {
// 		if(sort_arr[j-1] > sort_arr[j]) {
// 			save = sort_arr[j-1];
// 			sort_arr[j-1] = sort_arr[j];
// 			sort_arr[j] = save;
// 		}
// 	}
// }

sort_arr.sort((a, b) => a - b);

// sort_arr.sort(function(a, b) {
// 	return a - b
// });