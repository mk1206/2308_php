
const BTN1 = document.getElementById('btnOn');
BTN1.addEventListener('click', getItem);

const BTN2 = document.getElementById('btnAdd');
BTN2.addEventListener('click', addItem);

const BTN3 = document.getElementById('btnUpdate');
BTN3.addEventListener('click', updateItem);

const BTN4 = document.getElementById('btnDelete');
BTN4.addEventListener('click', deleteItem);

function getItem() {
    fetch('http://localhost:8000/api/item')
    .then(response => response.json())
    .then(data => {
		let content = data.data[0].content;
		let cp = document.createElement('p');
		cp.innerHTML = content;
		document.body.appendChild(cp);
	})
    .catch(error => console.log(error));
    return false;
}


function addItem() {
	fetch('http://localhost:8000/api/item', {
		method: 'POST',
		headers: {
			"Content-Type": "application/json"
		},
		body: JSON.stringify({
			"data": {
				"content": "히히"
			}
		})
	})
	.then(response => response.json())
	.then(data => console.log(data))
	.catch(error => console.log(error))
}

// 게시글 수정
function updateItem() {
	fetch('http://localhost:8000/api/item/3', {
		method: 'PUT',
		headers: {
			"Content-Type": "application/json"
		},
		body: JSON.stringify({
			"data": {
				"completed": "1"
			}
		})
	})
	.then(response => response.json())
	.then(data => console.log(data))
	.catch(error => console.log(error))
}

// 게시글 삭제
function deleteItem() {
	fetch('http://localhost:8000/api/item/6', {
		method: 'DELETE'
	})
	.then(response => response.json())
	.then(data => console.log(data))
	.catch(error => console.log(error))
}