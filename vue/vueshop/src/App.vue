<template>
  <img alt="Vue logo" src="./assets/logo.png">

  <!-- 헤더 -->
  <!-- <div class="nav"> -->
    <!-- <a href="#">홈</a>
    <a href="#">상품</a>
    <a href="#">기타</a> -->

    <!-- 반복문 -->
    <!-- 컴포넌트로 이관 -->
    <!-- <a v-for="item in navList" :key="item">{{ item }}</a> -->
    <!-- <a v-for="(item, i) in navList" :key="i">{{ i + ' : ' + item }}</a> -->
  <Header :data="navList"></Header>

  <!-- 할인 배너 -->
  <!-- 컴포넌트로 이관 -->
  <!-- <div class="discount">
    <p>지금 당장 구매하시면, 100% 할인</p>
  </div> -->
  <Discount></Discount>

  <!-- 모달 -->
  <transition name="modalAni">
    <Modal 
      v-if="modalFlg"
      :data = "modalProduct"
      @closeModal = "modalClose"
    ></Modal>
    <!-- <div class="bg_black" v-if="modalFlg">
      <div class="bg_white"> -->
        <!-- <h4>{{ products[key].name }}</h4>
        <p>{{ products[key].content }}</p>
        <p>{{ products[key].price }}</p>
        <p>신고수 : {{ products[key].reportCnt }}</p> -->
        
        <!-- <img :src="modalProduct.img" alt="">
        <h4>{{ modalProduct.name }}</h4>
        <p>{{ modalProduct.content }}</p>
        <p>{{ modalProduct.price }}</p>
        <p>신고수 : {{ modalProduct.reportCnt }}</p>
        <button @click="modalClose()">닫기</button>
      </div>
    </div> -->
  </transition>


  <!-- 상품 리스트 -->
  <!-- <div>
    <div>
      <h4 :style="sty_color_blue">{{ products[0] }}</h4>
      <p>{{ prices[0] }} 원</p>
    </div>
    <div>
      <h4>{{ products[1] }}</h4>
      <p>{{ prices[1] }} 원</p>
    </div>
    <div>
      <h4>{{ products[2] }}</h4>
      <p>{{ prices[2] }} 원</p>
    </div>
  </div> -->
<!-- <div>
  <div v-for="(item, i) in products" :key="i">
    <h4 @click="modalFlg = true; key = i">{{ item.name }}</h4>
      <h4 @click="modalOpen(item)">{{ item.name }}</h4>
      <p>{{ item.price }}</p>
      <button @click="plusOne(i)">허위 매물 신고</button>
      <span>신고수 : {{ item.reportCnt }}</span>
  </div>
</div> -->
<Content 
  :data = "products"
  @openModal = "modalOpen"
  @plus = "plusOne"
></Content>

</template>

<script>
import data from './assets/js/data.js';
import Discount from './components/Discount.vue';
import Header from './components/Header.vue';
import Modal from './components/Modal.vue';
import Content from './components/Content.vue';

export default {
  name: 'App',

  // 데이터 바인딩: 우리가 사용할 데이터를 저장하는 공간
  data() {
    return {
      navList: ['홈', '상품', '기타', '문의'],
      sty_color_blue: 'color: blue;',
      // products: ['양말', '티셔츠', '바지'],
      // prices: [180, 3000, 200],
      products: data,
      modalFlg: false,
      // key: null,
      modalProduct: {},
    }
  },

  // methods(): 함수를 정의하는 영역
  methods: {
    plusOne(i) {
      this.products[i].reportCnt++;
    },
    modalOpen(item) {
      this.modalFlg = true;
      this.modalProduct = item;
    },
    modalClose() {
      this.modalFlg = false;
    }
  },

  // components: 컴포넌트를 등록하는 영역
  components: {
    Discount,
    Header,
    Modal,
    Content,
  }, 
}
</script>

<style>
@import url('./assets/css/common.css');

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

/* css파일로 이관 */
/* .nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}

.nav a {
  color: #fff;
  padding: 10px;
  text-decoration: none;
} */

</style>
