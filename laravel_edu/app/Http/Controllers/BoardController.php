<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function index() {
        // ---------
        // 쿼리빌더
        // ---------
        // ------------ select ------------
        $result = DB::select('SELECT * FROM boards limit 10');

        $result = DB::select('SELECT * FROM boards limit :no offset :no2', ['no' => 1, 'no2' => 10]);
        $result = DB::select('SELECT * FROM boards limit ? offset ?', [2, 10]);

        // 카테고리가 4, 7, 8 인 게시글의 수를 출력해주세ㅛㅇ

        $result = DB::select(
            'SELECT COUNT(id)
            FROM boards
                where categories_no = :no 
                    OR categories_no = :no2 
                    OR categories_no = :no3', ['no' => 4, 'no2' => 7, 'no3' => 8]);

        // 카테고리별 게시글 갯수를 출력
        $result = DB::select(
            'SELECT 
                COUNT(categories_no) cnt
            FROM boards
            GROUP BY categories_no');                                               

        // 위에 거에 + 카테고리 명도 같이 출력
        $result = DB::select(
            'SELECT 
                c.name
                , COUNT(c.no) cnt
            FROM boards b
                JOIN categories c
                    ON b.categories_no = c.no
            GROUP BY c.no, c.name');

        // 트랜잭션
        // DB::beginTransaction();
        // DB::쿼리문
        // DB::commit();

        // ------------ insert ------------
        $sql = 
            'INSERT INTO boards(
                title
                , content
                , created_at
                , updated_at
                , categories_no)
            VALUES(?, ?, ?, ?, ?)';

        $arr = [
            '제목1'
            , '내용내용1'
            , now()
            , now()
            , '0'
        ];

        // DB::beginTransaction();
        // DB::insert($sql, $arr);
        // DB::commit();

        $result = DB::select('SELECT * FROM boards ORDER BY id DESC LIMIT 1');

        // ------------ update ------------
        // DB::beginTransaction();
        // DB::update('UPDATE boards SET title = ?, content = ? WHERE id = ?', ['업데이트1', '업업', $result[0]->id]);
        // DB::commit();

        // ------------ delete ------------
        // DB::beginTransaction();
        // DB::delete('DELETE FROM boards WHERE id = ?', [$result[0]->id]);
        // DB::commit();

        // --------------
        // 쿼리 빌더 체이닝
        // --------------
        // select * from boards where id = 300;
        $result = 
            DB::table('boards')
            ->where('id', '=', 300)
            ->get();

        // select * from boards where id = 300 or id = 400 order by id DESC;
        $result =
            DB::table('boards')
            ->where('id', '=', 300)
            ->orWhere('id', '=', 400)
            ->get();

        // select * from categories where no in (1, 2, 3);
        $result =
            DB::table('categories')
            ->whereIn('no', [1, 2, 3])
            ->get();

        // select * from categories where no not in (1, 2, 3);
        $result =
        DB::table('categories')
        ->whereNotIn('no', [1, 2, 3])
        ->get();

        // first(): limit1하고 비슷하게 동작
        $result = DB::table('boards')->orderBy('id', 'desc')->first();

        // count(): 결과의 레코드 수를 반환
        $result = DB::table('boards')->count();

        // max(): 해당 컬럼의 최대값
        $result = DB::table('categories')->max('no');

        // 타이틀, 내용, 카테고리명까지 100개 출력
        $result = DB::table('boards')
        ->select('boards.title', 'boards.content', 'categories.name')
        ->join('categories', 'categories.no', 'boards.categories_no')
        ->limit(100)
        ->get();

        // 카테고리별 게시글 갯수와 카테고리명을 출력해 줏
        $result = DB::table('boards')
        ->select('categories.no', 'categories.name', DB::raw('count(categories.no) cnt'))
        ->join('categories', 'categories.no', 'boards.categories_no')
        ->groupBy('categories.no', 'categories.name')
        ->get();

        return var_dump($result);
    }
}