@extends('layout.layout')

@section('title', 'Detail')

@section('main')
<main>
<form action="{{route('board.update', ['board' => $data->b_id])}}" method="POST">
    @include('layout.errorlayout')
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-body">
          <p class="card-text">글 번호</p>
          글 제목<input type="text" name="b_title" value="{{$data->b_title}}">
          <br>
          글 내용<textarea style="height: 400px" name="b_content">{{$data->b_content}}</textarea>
          <p class="card-text">조회수</p>
          <p class="card-text">생성일</p>
          <p class="card-text">수정일</p>

        <a class="btn btn-secondary" href="{{route('board.show', ['board' => $data->b_id])}}">돌아가기</a>
        <button class="btn btn-secondary float-end" type="submit">수정</button>
    </div>
  </form>
</main>
@endsection