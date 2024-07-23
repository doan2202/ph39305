@extends('layout')
@section('title', 'Trang Post')
@section('content')
    <h1>Danh sach bai viet</h1>
    <hr>
    @foreach ($post as $post )
    <div>
        <a href="">
            <h3>{{$post -> title}}</h3>
        </a>
        <p>{{$post -> description}}</p>
        <hr>
    </div>

    @endforeach
@endsection
