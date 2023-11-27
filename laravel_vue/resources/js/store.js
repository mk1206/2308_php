import { createStore } from 'vuex';

const store = createStore({
	state() {
		return {
			testStr: 'vuex 테스트용',
			laravelData: null,
		}
	},

	mutations: {
		// 초기 데이터 셋팅(라라벨에서 받음)
		setLaravelData(state, data) {
			state.laravelData = data;
		}
	},

	actions: {
		
	},
});

export default store;