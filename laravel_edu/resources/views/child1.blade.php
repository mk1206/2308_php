{{-- 상속 --}}
@extends('inc.layout')

{{-- section: 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '자식1 타이틀')


{{-- 부모 show 테스트용 --}}
@section('show')
<h2>자식1 show입니다</h2>
<p>자식1자식1자식1</p>
<hr>
@endsection


{{-- @section ~ @endsection:  처리해야 될 코드가 많을 경우 --}}
@section('main')
<h2>자식1 화면입니다.</h2>
<p>여러 데이터를 표시함니다.</p>


{{-- 조건문 --}}
@if($gender === '0')
    <span>남자</span>
@elseif($gender === '1')
    <span>여자</span>
@else
    <span>반반</span>
@endif
<br>


{{-- 반복문 --}}
@for($i = 0; $i < 5; $i++)
    <span>{{$i}}</span>
@endfor
<br>


{{-- main 섹션에 생성: 구구단 찍어주세요 --}}
@for($i = 1; $i < 10; $i++)
    <hr>
    <span>{{$i}}단</span>
    @for($j = 1; $j < 10; $j++)
        <br>
        <span>{{$i}} X {{$j}} = {{$i*$j}}</span>
    @endfor
@endfor


<hr>
{{-- foreach와 forelse의 경우, $loop 변수가 생성되고 사용 할 수 있다. --}}
<h3>foreach문</h3>
@foreach($data as $key => $val)
    <p>{{$loop->count.' >> '.$loop->iteration}}</p>
    <span>{{$key.' : '.$val}}</span>
    <br>
@endforeach


<h3>forelse</h3>
@forelse($data2 as $key => $val)
    <span>{{$key.' : '.$val}}</span>
    <br>
@empty
    <span>빈배열입니다.</span>
@endforelse


@endsection