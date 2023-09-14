<?php

// namespace : 클래스를 구분해주기 위해 설, 보통은 해당파일의 패스로 작성
namespace up;

class Class_1 {

	public function __construct(){
		echo "up class";
	} 
}

namespace down;

class Class_1 {
	public function __construct(){
		echo "down class";
	}
}

// $obj_class1 = new \up\Class_1();

namespace test;

use \up\Class_1;
// use \down\Class_1;

$obj_class1 = new Class_1();




?>