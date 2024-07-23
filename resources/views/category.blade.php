@extends('layout')
@section('title', 'Trang cate')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<h2>Danh mục:</h2>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Sách</th>
            <th>Giá</th>
            <th>Ảnh</th>
            <th>Tác giả</th>
            <th>Nhà xuất bản</th>
            <th>Ngày xuất bản</th>
            <th>Số lượng</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cate as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->price }} $</td>
            <td> <img src="{{ $book->thumbnail }}" alt="" class="img-fluid">  </td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->publisher }}</td>
            <td>{{ $book->publication }}</td>
            <td>{{ $book->quantity }}</td>
            <td>
                <a href="{{ route('detail', $book->id) }}" class="btn btn-primary btn-sm">
                    Xem chi tiết
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="/" class="btn btn-secondary">Quay lại</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
