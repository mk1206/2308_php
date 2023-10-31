
// https://picsum.photos/v2/list?page=2&limit=5

const BTN_API = document.getElementById('btn-api');
BTN_API.addEventListener('click', my_fetch);

const BTN_CLEAR = document.getElementById('btn-clear');
BTN_CLEAR.addEventListener('click', clear);

function my_fetch() {
	const INPUT_URL = document.getElementById('input-url');
	fetch(INPUT_URL.value.trim())
	.then(response => response.json())
	.then(data => makeImg(data))
	.catch(error => console.log(error));
}

function makeImg(data) {
	data.forEach(item => {
		const BOX = document.getElementById('box');
		const DIV = document.createElement('div');
		const NEW_ID = document.createElement('div');
		const NEW_IMG = document.createElement('img');
		DIV.setAttribute('id', 'box');
		NEW_ID.setAttribute('id', 'id');
		NEW_IMG.setAttribute('id', 'img');

		DIV.style.width = '100%';
		DIV.style.backgroundColor = 'rgb(198, 198, 198)';
		DIV.style.padding = '10px';

		NEW_ID.innerHTML = item.id;
		NEW_ID.style.verticalAlign = 'top';
		NEW_ID.style.width = '100%';
		NEW_ID.style.fontSize = '1.5rem';
		NEW_ID.style.textAlign = 'center';
		NEW_ID.style.margin = '15px auto 0 auto';
		
		NEW_IMG.setAttribute('src', item.download_url);
		NEW_IMG.style.width = '100%';
		NEW_IMG.style.margin ='30px auto 0 auto';

		BOX.appendChild(DIV);
		DIV.appendChild(NEW_ID);
		DIV.appendChild(NEW_IMG);
	});
}

function clear() {
	const CLEAR_DIV = document.getElementById('box');
	const CLEAR_ID = document.getElementById('id');
	const CLEAR_IMG = document.getElementById('img');

	for(let i = 0; i < CLEAR_DIV.length; i++) {
		CLEAR_DIV[i].remove();
		CLEAR_ID[i].remove();
		CLEAR_IMG[i].remove();
	}
}