<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hi', function () {
    return '안녕하슈';
});

// 뷰 리턴(뷰 파일이 없으면 에러발생, 디버그모드 설정이 false면 500에러, true면 에러의 상세정보 출력)
Route::get('/myview', function () {
    return view('myview');
});


// -----------------------------
// HTTP 메소드 대응하는 라우터
// 여러 라우터에 해당될 경우 가장 마지막에 정의 된 것이 실행
// -----------------------------

// GET 메소드 loacalhost/home으로 접속했을 때 home이라는 뷰파일을 리턴해주세욘
Route::get('/home', function () {
    return view('home');
});

// POST
Route::post('/home', function () {
    return '메소드: POST';
});

// PUT
// view의 form에 [@method('PUT')]을 추가
Route::put('/home', function () {
    return '메소드: PUT';
});

// DELETE 요청
Route::delete('/home', function () {
    return '메소드: DELETE';
});


// -----------------------------
// 라우트에서 파라미터 제어
// -----------------------------

// 쿼리 스트링에 파라미터가 셋팅돼서 요청이 올 때 파라미터 획득
Route::get('/query', function (Request $request) {
    return $request->id.",".$request->name;
});

// URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}/{name}', function ($id) {
    return '세그먼트 파라미터: '.$id;
});

Route::get('/segment/{id}/{name}', function ($id, $name) {
    return '세그먼트 파라미터 2개 이상: '.$id.', '.$name;
});

Route::get('/segment2/{id}/{name}', function (Request $request, $id) {
    return '세그먼트 파라미터22222222: '.$request->id.",".$id.",".$request->name;
});

Route::get('segment3/{id?}', function ($id = 'base') {
    return 'segment3: '.$id;
});


// -----------------------------
// 라우트 매칭 실패시 대체 라우트 정의
// -----------------------------

Route::fallback(function () {
    return '잘못된 경로를 입력하셨습니다.';
});


// -----------------------------
// 라우트의 이름 지정
// -----------------------------
Route::get('/name', function () {
    return view('name');
});

Route::get('/name/home/php504/root', function () {
    return '이름 없는 라우트';
});

Route::get('/name/home/php504/user', function () {
    return '이름 있는 라우트';
})->name('name.user');


// -----------------------------
// 컨트롤러
// -----------------------------
// 커멘드로 컨트롤러 생성: php artisan make:controller 컨트롤러명

use App\Http\Controllers\TestController;

Route::get('/test', [TestController::class, 'index'])->name('test.index');

// php artisan make:controller 컨트롤러명 --resource
use App\Http\Controllers\TaskController;
Route::resource('/task', TaskController::class);