// Date
let now = new Date();
let sDate = new Date('2023-09-30 19:23:30');

// getFullYear() : 연도만 가져오는 메소드
now.getFullYear();
let year = now.getFullYear();

// getMonth() : 월만 가져오는 메소드(+1을 해줘야지 현재달이 됨)
now.getMonth() + 1;
let month = now.getMonth() + 1;

// getDate() : 날짜만 가져오는 메소드
now.getDate();
let date = now.getDate();

// getDay() : 요일만 가져오는 메소드 (0: 일요일 ~ 6:토요일)
now.getDay();
let day = now.getDay();
w_day = '';

switch(day) {
	case 1:
		w_day = ' 월요일';
		break;
	case 2:
		w_day = ' 화요일';
		break;
	case 3:
		w_day = ' 수요일';
		break;
	case 4:
		w_day = ' 목요일';
		break;
	case 5:
		w_day = ' 금요일';
		break;
	case 6:
		w_day = ' 토요일';
		break;
	default:
		w_day = ' 일요일';
		break;
}

// getHours() : 시만 가져오는 메소드
now.getHours();
let hours = now.getHours();

// getMinutes() : 분만 가져오는 메소드now.getMilliseconds();
now.getMinutes();
let minutes = now.getMinutes();

// getSeconds() : 초만 가져오는 메소드
now.getSeconds();
let seconds = now.getSeconds();

// getMilliseconds(); : 밀리초를 가져오는 메소드
now.getMilliseconds();
let milliseconds = now.getMilliseconds();

console.log(year + '년 ' + month + '월 ' + date + '일 ' + hours + '시 ' + minutes + '분 ' + seconds + '초 ' + milliseconds + w_day)


// now.getTime() : 1970/01/01 기준으로 얼마나 지났는지 밀리초 단위로 가져옴


// 오늘로부터 며칠 전인지 구해봅시다.

let now2 = new Date(year, month - 1, date, 0, 0, 0); // 오늘 날짜 0시 0분 0초 0밀리초 가져오는 방법
let sDate2 = new Date('2023-09-30 00:00:00');

let tt = now2 - sDate2
tt / (1000 * 60 * 60 * 24);

let n_d = now2 - sDate2;
Math.floor(n_d / (1000 * 60 * 60 * 24));
