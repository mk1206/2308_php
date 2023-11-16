@extends('layout.layout')

@section('title', 'Detail')

@section('main')
<main>
<form action="{{route('board.destroy', ['board' => $data->b_id])}}" method="POST">
  @csrf
  @method('DELETE')
    <div class="card">
        <div class="card-body">
          <p class="card-text">글 번호: {{$data->b_id}}</p>
          <p class="card-text">글 제목: {{$data->b_title}}</p>
          <p class="card-text">글 내용: {{$data->b_content}}</p>
          <p class="card-text">조회수: {{$data->b_hits}}</p>
          <p class="card-text">생성일: {{$data->created_at}}</p>
          <p class="card-text">수정일: {{$data->updated_at}}</p>
        </div>
        <a href="{{route('board.index')}}">돌아가기</a>
        <button type="submit">삭제</button>
    </div>
  </form>
</main>
@endsection