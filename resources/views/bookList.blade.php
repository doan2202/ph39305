@extends('layout')
@section('title', 'Trang Book')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<h2>8 Sản phẩm có giá thấp nhất</h2>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Sách</th>
            <th>Giá</th>
            <th>Thể loại</th>

            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($low as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->price }} $</td>
            <td>{{ $book->category_name }}</td>
            <td>
                <a href="{{ route('detail', $book->id) }}" class="btn btn-primary btn-sm">
                    Xem chi tiết
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2>8 sản phẩm có giá cao nhất</h2>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Sách</th>
            <th>Giá</th>
            <th>Thể loại</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($high as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->price }} $</td>
            <td>{{ $book->category_name }} </td>
            <td>
                <a href="{{ route('detail', $book->id) }}" class="btn btn-primary btn-sm">
                    Xem chi tiết
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
