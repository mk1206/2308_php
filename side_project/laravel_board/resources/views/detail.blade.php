@extends('layout.layout')

@section('title', 'List')

@section('main')
<main>

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{$data->b_title}}</h5>
          <p class="card-text">{{$data->b_content}}</p>
          <p class="card-text">{{$data->b_hits}}</p>
          <p class="card-text">{{$data->b_created_at}}</p>
          <p class="card-text">{{$data->b_updated_at}}</p>
        </div>
    </div>

</main>
@endsection