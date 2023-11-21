<template>
	<div>
		<div v-for="(item, i) in data" :key="i">
			<!-- <h4 @click="modalFlg = true; key = i">{{ item.name }}</h4> -->
			<h4 @click="$emit('openModal', item)">{{ item.name }}</h4>
			<p>{{ item.price }}</p>
			<button @click="$emit('plus', i)">허위 매물 신고</button>
			<span>신고수 : {{ item.reportCnt }}</span>
		</div>
	</div>
</template>
<script>
export default {
	name: 'Content',

	props: {
		data: Array,
	},
}
</script>
<style lang="">
	
</style>