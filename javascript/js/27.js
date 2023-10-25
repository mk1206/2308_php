let arr = [1, 2, 3, 4, 5];

// push() 메소드 : 배열에 값을 추가
arr.push(6);

// splice() : 배열의 요소를 삭제 또는 교체
// arr.splice(2, 1); // 배열의 arr[2]에서부터 n개를 삭제
// arr.splice(4, 1);
// arr.splice(2, 0, '십'); // 배열의 arr[2]에 값이 10인 인덱스를 추가
// arr.splice(2, 0, 10, 11, 12, 13); // 3번째 아규먼트부터는 가변파라미터로서 모든 값을 추가

// indexOf() : 배열에서 특정 요소를 찾는데 사용
// arr.indexOf(4);


// lastIndexOf() : 배열에서 특정 요소 중 가장 마지막에 위치한 요소를 찾는데 사용
arr = [1, 1, 1, 3, 4, 5, 6, 6, 6, 10];

// pop : 배열의 가장 마지막 요소를 삭제
let i_pop = arr.pop();

// sort() : 배열을 정렬
arr = [4, 7, 9, 2, 5, 1];
// let arr_sort = arr.sort(function(a, b) {
// 	return a - b;
// });

// 오름차순 정렬
// arr.sort((a, b) => a - b);

//내림차순 정렬
// arr.sort((a, b) => b - a);

// arr1는 arr 원본 데이터 주소 참조
let arr1 = arr;

// 원본 데이터와 별도의 새로 배열을 만드는 방법 (value copy 방식)
let arr2 = Array.from(arr);

// includes() : 배열의 특정요소를 가지고 있는지 판별 (리턴 boolean)
arr = ['치킨', '육회비빔밥', '비엔나'];

let boo_includes = arr.includes('짜장면');

// join() : 배열의 모든 요소를 연결해서 하나의 문자열을 리턴
arr.join(); // '치킨,육회비빔밥,비엔나'
arr.join(''); // '치킨육회비빔밥비엔나'
arr.join(' / '); // '치킨 / 육회비빔밥 / 비엔나'

// map() : 배열의 모든 요소에 대해서 주어진 함수의 결과를 모아서 새 배열을 리턴
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];

// 모든 요소의 값 * 2의 결과를 배열로 얻고 싶넹
let arr_map = arr.map(num => num * 2);

// 3의 배수는 '짝'
arr_map = arr.map( num => {
	if(num % 3 === 0) {
		return '짝';
	} else {
		return num;
	}
});

// some() : 주어진 함수를 만족해서 요소가 있는지 판별해서 하나라도 있으면 true 없으면 false (return boolean)
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
let boo_some = arr.some(num => num === 5);

// every() : 배열의 모든 요소가 주어진 함수에 만족하면 true, 하나라도 만족 안 하면 false
let boo_every = arr.every(num => num > 0);

// filter() : 배열의 요소 중에 주어진 함수에 만족한 요소만 모아서 새로운 배열을 리턴
let fil = arr.filter(num => num % 3 === 0);