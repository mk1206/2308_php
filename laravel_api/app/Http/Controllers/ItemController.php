<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Item;

class ItemController extends Controller
{
    // 전체 게시글 조회
    public function index() {
        $responsData = [
            'code' => '0'
            , 'msg' => ''
            , 'data' => []
        ];

        $result = Item::orderBy('created_at', 'desc')->get();

        if($result->count() < 1) {
            $responsData['code'] = 'E01';
            $responsData['msg'] = 'No Data.';
        } else {
            $responsData['data'] = $result;
        }

        return $responsData;
    }

    // 게시글 작성
    public function store(Request $request) {
        $responsData = [
            'code' => '0'
            , 'msg' => ''
            , 'data' => []
        ];

        $result = Item::create($request->data);

        $responsData['data'] = $result;

        return $responsData;

    }

    public function update(Request $request, $id) {
        $responsData = [
            'code' => '0'
            , 'msg' => ''
            , 'data' => []
        ];

        $result = Item::find($id);

        if(!$result) {
            // 예외 처리: 데이터 0건
            $responsData['code'] = 'E01';
            $responsData['msg'] = 'No Data.';
        } else {
            // 정상 처리
            $result->completed = $request->data['completed'];
            $result->completed_at = $request->data['completed'] === '1' ? Carbon::now() : null;
            $result->save();
            $responsData['data'] = $result;
        }

        return $responsData;
    }

    // 게시글 삭제
    public function destroy($id) {
        $responsData = [
            'code' => '0'
            , 'msg' => ''
        ];

        $result = Item::find($id);

        if(!$result) {
            // 예외 처리: 데이터 0건
            $responsData['code'] = 'E01';
            $responsData['msg'] = 'No Data.';
        } else {
            // 정상 처리
            $result->delete();
        }

        return $responsData;
    }
}
