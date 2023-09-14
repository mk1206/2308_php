<?php

// class는 동종의 객체들이 모여있는 집합을 정의한 것
class ClassRoom{
	// 멤버 필드

	// 멤버 변수
	// 접근제어 지시자 : public, private, protected
	public $computer; // 어디에서나 접근 가능
	private $book; // class 내에서만 접근 가능
	protected $bag; // class와 나를 상속 받은 자식 class내에서만 접근 가능
	private $now;

	// 메소드(method) : class내에 있는 함수
	public function class_room_set_value() {
		$this->computer = "컴퓨터";
		$this->book = "책";
		$this->bag = "가방";
	}

	// 생성자(constructor):
	// 		- 클래스를 이용하여 객체를 생성할 때 사용
	// 		- 생성자를 정의 하지 않을 때는 디폴트 생성자가 선언 됨
	// 		- 클래스를 인스턴스 할 때 자동으로 실행되는 메소드
	// 외부에서도 실행 시켜야 하기 때문에 무조건 public으로 해야 됨
	public function __construct(){
		echo "컨스트럭트 실행\n";
		$this->now = date("Y-m-d H:i:s");
	}

	// 컴퓨터, 북, 백의 값을 출력하는 메소드를 만들어 주세욘
	public function classRoomPrint() {
		$str = $this->computer."\n"
				.$this->book."\n"
				.$this->bag;
		echo $str;
	}

	// getter 메소드
	public function get_now(){
		return $this->now;
	}

	public function set_now(){
		$this->now = "9999-01-01 00:00:00";
	}

	// static
	public static function static_test(){
		echo "스테틱 메소드";
	}
}

// class instance 생성
// $obj_classroom = new ClassRoom;
// $obj_classroom->computer = "test";
// $obj_classroom->class_room_set_value();
// var_dump($obj_classroom->computer);
// $obj_classroom->classRoomPrint();
// __construct 사용법
// echo $obj_classroom->now;
// $obj_classroom->set_now();
// echo $obj_classroom->get_now();
// static 사용법
ClassRoom::static_test();
?>