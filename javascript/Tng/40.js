// 1. 버튼을 클릭시 아래 내용의 알러트가 나온다
	// 안녕하세요
	// 숨어있는 div를 찾아보슈

	const BTN = document.getElementById('btn');
	BTN.addEventListener('click', () => alert('안녕하세요'+'\n'+'숨어있는 div를 찾아보슈'));

// 2. 특정 영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옴
	// 들킨 상태에서는 알러트가 안 나옴
	// 두근두근

	const DIV1 = document.getElementById('div1');
	DIV1.addEventListener('mouseenter', () => {
		if(getComputedStyle(DIV1).backgroundColor == 'rgb(255, 255, 255)') {
			alert('두근두근')
		}
	});

// 3. 2번의 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 베이지 색으로 바뀌어 나타남
	// 들켰다

// 4. 3번의 상태에서 다시 한번 더 클릭하면 아래의 알러트를 출력하고, 배경색이 흰색으로 바뀌어 안보이게됨
	// 다시 숨는다

	DIV1.addEventListener('click', () => {
		if(getComputedStyle(DIV1).backgroundColor == 'rgb(255, 255, 255)'){
			alert('들켰당');
			DIV1.style.backgroundColor = 'beige';
		} else if(getComputedStyle(DIV1).backgroundColor == 'rgb(245, 245, 220)') {
			alert('다시 숨는다');
			DIV1.style.backgroundColor = 'white';

			let randX = Math.ceil(Math.random() * 2000);
			let randY = Math.ceil(Math.random() * 1000);
			DIV1.style.right = randX+'px';
			DIV1.style.bottom = randY+'px';
		}
	});

