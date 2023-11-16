@extends('layout.layout')

@section('title', 'Detail')

@section('main')
<form action="{{route('board.store')}}" method="post">
    @include('layout.errorlayout')
    @csrf
    <main style="width: 500px">
        <label for="b_title">제목</label>
        <input type="text" name="b_title">
        <label for="b_content">내용</label>
        <textarea style="height: 400px" name="b_content"></textarea>
        <a href="{{route('board.index')}}" class="btn btn-secondary">취소</a>
        <button type="submit" class="btn btn-dark">작성</button>
    </main>
</form>
@endsection