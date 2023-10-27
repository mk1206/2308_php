// 타이머 함수

// 1. setTimeout(콜백함수, 시간(ms)) : 일정 시간이 흐른 후에 콜백 함수를 실행

// setTimeout(() => console.log('시간'), 3000);

// 1초 뒤에 'A', 2초 뒤에 'B', 3초 뒤에 'c'

// setTimeout(() => console.log('A'), 1000);
// setTimeout(() => console.log('B'), 2000);
// setTimeout(() => console.log('C'), 3000);

// let arr = ['A', 'B', 'C'];

// for(let i = 0; i < arr.length; i++){
// 	setTimeout(() => console.log(arr[i]), (i+1)*1000);
// }

// function print(chr, ms) {
// 	setTimeout(() => console.log(chr), ms);
// }

// print('A', 1000);
// print('B', 2000);
// print('C', 3000);

// 2. clearTimeout(해당 setTimeout 객체) : 타이머를 삭제
// let mySet = setTimeout(() => console.log('C'), 1000);
// console.log(mySet);
// clearTimeout(mySet);

// 3. setInterval(콜백함수, 시간(ms)) : 일정 시간마다 반복
// let myInter = setInterval(() => console.log('안 자요 ㅜㅜ'), 1000);

// 4. clearInterval(해당 setInterval) : 인터벌 삭제
// clearInterval(myInter);


// 화면을 로드하고 5초 뒤에 '두둥 등장'이라는 매우 큰 글씨가 나타나게 해즈ㅓ

setTimeout(() => {
	const DIV = document.createElement('div');
	DIV.innerHTML = '두둥등장';
	DIV.style.fontSize = '1000px';
	document.body.appendChild(DIV);
}, 5000);