// 1. 현재 시간을 화면에 표시
const DIV = document.getElementById('div');
time();

function time() {
	let now = new Date(); // 현재 Date
	let utc = now.getTime() + (now.getTimezoneOffset() * 60 * 1000); // utc

	let lon_diff = 1 * 60 * 60 * 1000;					// 런던 시차
	let lon_time = new Date(utc + lon_diff); 			// utc - 런던 시차

	let wc_diff = 4 * 60 * 60 * 1000; 					// 워싱턴 시차
	let wc_time = new Date(utc - wc_diff); 				// utc - 워싱턴 시차

	let hour = now.getHours();							// 한국 시
	let min = '0'+now.getMinutes(); 					// 한국 분
	let sec = '0'+now.getSeconds(); 					// 한국 초

	let lon_hour = lon_time.getHours(); 				// 런던 시
	let lon_min = '0'+lon_time.getMinutes(); 			// 런던 분
	let lon_sec = '0'+lon_time.getSeconds(); 			// 런던 초

	let wc_hour = wc_time.getHours(); 					// 워싱턴 시
	let wc_min = '0'+wc_time.getMinutes();				// 워싱턴 분
	let wc_sec = '0'+wc_time.getSeconds(); 				// 워싱턴 초

	let AMPM = hour > 12 ? '오후' : '오전'; 
	let lon_AMPM = lon_hour > 12 ? '오후' : '오전';
	let wc_AMPM = wc_hour > 12 ? '오후' : '오전';
	
	hour = hour > 12 ? hour - 12 : hour;
	lon_hour = lon_hour > 12 ? lon_hour - 12 : lon_hour;
	wc_hour = wc_hour > 12 ? wc_hour - 12 : wc_hour;

	// 시간을 더 예쁘게 줌.....
	// now.toLocaleTimeString();

	DIV.innerHTML = '현재 시각 '+'<br>'+
					'한국 '+AMPM+' '+hour+':'+min.slice(-2)+':'+sec.slice(-2)+'<br>'+
					'영국 '+lon_AMPM+' '+lon_hour+':'+lon_min.slice(-2)+':'+lon_sec.slice(-2)+'<br>'+
					'미국 '+wc_AMPM+' '+wc_hour+':'+wc_min.slice(-2)+':'+wc_sec.slice(-2);
}

// 2. 실시간으로 시간을 화면에 표시
let test = setInterval(time, 1000);

function stop() {
	clearInterval(test);
}
function start() {
	time();
	test = setInterval(time, 1000);
}

// 3. 멈춰 버튼을 누르면, 시간이 정지할 것
const BTNSTOP = document.getElementById('stop');
BTNSTOP.addEventListener('click', stop);

// 4,. 재시작 버튼을 누르면, 버튼을 누른 시점의 시간부터 다시 실시간으로 화면에 표시
const BTNSTART = document.getElementById('start');
BTNSTART.addEventListener('click', start);


