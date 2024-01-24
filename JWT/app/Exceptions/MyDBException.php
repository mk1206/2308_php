<?php
namespace App\Exceptions;
use Exception;
use Throwable;
class MyDBException extends Exception
{
    // public function render($request,Throwable $exception) {
    //     // 에러메세지 획득
    //     $errMsgList = $this->context();
    //     // 에러코드 획득
    //     $errCode = array_key_exists($exception->getMessage(), $errMsgList) ? $e->getMessage() : 'E99';
    //     return response()->json([
    //         'code' => $errCode,
    //         'msg' => $errMsgList[$errCode]['msg']
    //     ], $errMsgList[$errCode]['status']);
    // }
        /**
     * 에러 메세지 저장
     *
     *  @return Array 에러메세지 배열
     */
    public function context() {
        return [
            'E80' => ['status' => 500, 'msg' => 'DB 에러']
        ];
    }
}