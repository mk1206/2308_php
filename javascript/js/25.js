// 1. JavaScript에서의 Class란?
// 	javaScript는 기본적으로 Prototype 기반의 객체지향 언어
// 	하지만 Class 기반 언어에 익숙한 개발자들에게는 어렵게 느껴질 수 있고,
// 	이는 JavaScript의 진입장벽으로 인식되어 있다
// 	그래서 ES6에서 JavaScript에도 Class를 도입하여 Class 기반 언어와 흡사한 객체 생성 메커니즘을 도입했다
// 	(어디까지나 유사하다는 것이지 같은 것은 아니며, JavaScript는 여전히 Prototype 기반의 객체지향 언어이다)

class Food {

	strFood; // public 프로퍼티
	#country; // private 프로퍼티
}