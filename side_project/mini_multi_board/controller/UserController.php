<?php

namespace controller;

class UserController extends ParentsController {
	// 로그인 페이지 이동
	protected function loginGet() { // construct가 없어서 부모 construct를 상속 받아서 사용 (override)
		return "view/login.php"; 
	}

	// 회원가입 페이지 이동
	protected function registGet() {
		return "view/regist"._EXTENSION_PHP;
	}
}