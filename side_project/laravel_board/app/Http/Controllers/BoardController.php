<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // 유저 권한
use Illuminate\Support\Facades\DB; // DB 쿼리빌더 사용하려면
use Illuminate\Support\Facades\Log;
use App\Models\Board;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /* del 231116 미들웨어로 이관
        // 로그인 체크
        if(!Auth::check()) {
            return redirect()->route('user.login.get');
        }
        */

        // 게시글 획득
        $result = Board::get();
        
        return view('list')->with('data', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 작성 처리
        $arrInputData = $request->only('b_title', 'b_content');
        $result = Board::create($arrInputData);

        // $b_title = $request->input('b_title');
        // $b_content = $request->input('b_content');

        // $model = new Board(['b_title' => $b_title, 'b_content' => $b_content]);
        // $model->save();

        return redirect()->route('board.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Board::find($id);
        // Board::where('b_id', $id)->get();
        // DB::table('boards')->where('b_id', $id)->get();

        // 조회수 올리기
        $result->b_hits++; // 조회수 1증가

        // 업데이트 하기 전에 timestamps false로 해놓기
        $result->timestamps = false;

        // 업데이트 처리
        $result->save();
        
        return view('detail')->with('data', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Board::find($id);
        return view('update')->with('data', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = Board::find($id);
        $arrInputData = $request->only('b_title', 'b_content');
        $result->update($arrInputData);

        // $result->b_title = $request->b_title;
        // $result->b_content = $request->b_content;
        // $result->save();

        return redirect()->route('board.show', ['board' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::debug("------------ 삭제 처리 시작 ------------");
        try {
            DB::beginTransaction();
            Log::debug("트랜잭션 시작");
            Board::destroy($id);
            Log::debug("삭제 완료");
        } catch (Exception $e) {
            DB::rollback();
            Log::debug("롤백 완료");
            // return redirect()->route('error')->withErrors($e->getMessage());
        }
        DB::commit();
        Log::debug("커밋완료");
        return redirect()->route('board.index');
    }
}
