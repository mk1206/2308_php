import { createStore } from 'vuex';
import axios from 'axios';

const store = createStore({
	// state(): data를 저장하는 영역
	state() {
		return {
			boardData: [], // 게시글 저장용
			flgTabUI: 0, // 탭ui용 플래그
			imgURL: '', // 작성탭 표시용 이미지 URL 저장용
			postFileData: null, // 글작성 파일데이터 저장용
			lastBoardId: 0, // 가장 마지막 로드 된 게시글 번호 저장용
		}
	},

	// mutations: data 수정용 함수 저장 영역
	mutations: {
		setBoardList(state, data) {
			state.boardData = data;
			state.lastBoardId = data[data.length - 1].id;
		},
		// 탭ui 셋팅용
		setFlgTabUI(state, num) {
			state.flgTabUI = num;
		},
		// 작성탭 표시용 이미지 URL 저장용
		setImgURL(state, url) {
			state.imgURL = url;
		},
		// 글작성 파일데이터 저장용
		setPostFileData(state, file) {
			state.postFileData = file;
		},
		// 작성된 글 삽입용
		setUnshiftBoard(state, data) {
			state.boardData.unshift(data);
		},
		// 작성 후 초기화 처리
		setClearAddData(state) {
			state.imgURL = '';
			state.postFileData = null;
		},
		setboardListShow(state, data) {
			state.boardData.push(data);
			state.lastBoardId = state.boardData[state.boardData.length - 1].id;
		}
	},

	// actions: ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
	actions: {
		// 초기 게시글 데이터 획득 ajax 처리
		actionGetBoardList(context) {
			const url = 'http://112.222.157.156:6006/api/boards';
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat'
				}
			};
			axios.get(url, header)
			.then(res => {
				context.commit('setBoardList', res.data);
			})
			.catch(err => {
				console.log(err);
			})
		},
		// 글 작성 처리
		actionPostBoardAdd(context) {
			const url = 'http://112.222.157.156:6006/api/boards';
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat',
					'Content-Type': 'multipart/form-data',
				}
			};
			const data = {
				name: '',
				img: context.state.postFileData,
				content: document.getElementById('content').value,
			};
			axios.post(url, data, header)
			.then(res => {
				// 작성글 데이터 저장
				context.commit('setUnshiftBoard', res.data);

				// 리스트 UI로 전환
				context.commit('setFlgTabUI', 0);

				// 작성 후 초기화 처리
				context.commit('setClearAddData');
			})
			.catch(err => {
				console.log(err);
			})
		},
		actionGetBoardShow(context) {
			const url = 'http://112.222.157.156:6006/api/boards/'+context.state.lastBoardId;
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat'
				}
			};
			axios.get(url, header)
			.then(res => {
				context.commit('setboardListShow', res.data);
			})
			.catch(err => {
				console.log(err);
			})
		},
	}
});

export default store;