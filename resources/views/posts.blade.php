@extends('layout')
@section('title', 'Trang Book')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <h1>Danh sach bai viet</h1>
    @if (session('message'))
        .<div class="alert alert-success" role="alert">
            <strong>{{session('message')}}</strong>
        </div>
    @endif
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>IMG</th>
                <th>Description</th>
                <th>View</th>
                <th>Cate Name</th>
                <th><a href="{{route('post.create')}}" class="btn btn-success">Add new</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->title }}</td>
                <td>
                    <img src="{{asset('/storage/' .$p->image)}}" alt="" height="100px" width="100px">
                </td>
                <td>{{ $p->description }}</td>
                <td>{{ $p->view }}</td>
                <td>{{ $p->category->name }}</td>
                <td class="">
                    <a href="{{route('post.edit', $p)}}" class="btn btn-info">Edit</a>
                    <form action="{{route('post.destroy',$p)}}" method="POST" class="pt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    {{$posts->links()}}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
