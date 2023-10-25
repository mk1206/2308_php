// 원본은 보존하면서 오름차순 정렬
const ARR_SORT = [6, 8, 9, 45, 7 , 78, 23, 12, 4, 90];

let arr = Array.from(ARR_SORT);
arr.sort((a, b) => a - b);

// 짝수와 홀수를 분리해서 각각 새로운 배열을 만드새우 (다하면 함수로도)
const ARR2 = [5, 7, 8, 3, 6, 12, 4, 32];
// let Even = ARR2.filter(num => num % 2 === 0);
// let Odd =  ARR2.filter(num => num % 2 === 1);

function test(arr, flg) {
	arr.push(10000);

	// if(flg === 0) {
	// 	return arr.filter(num => num % 2 === 0);
	// } else {
	// 	return arr.filter(num => num % 2 === 1);
	// }
}

// 다음 문자열에서 구분문자를 '.'에서 ' '(공백)으로 변경
const STR1 = 'php504.meer.kat';

// let str = STR1.replaceAll('.', ' ');

// let str = STR1.split('.')
// str.join();

// STR1.replace(/\./g, ' ');