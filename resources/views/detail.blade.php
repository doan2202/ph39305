@extends('layout')
@section('title', 'Trang Chi Tiết')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<table class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <td>{{ $book->id }}</td>
    </tr>
    <tr>
        <th>Tiêu đề</th>
        <td>{{ $book->title }}</td>
    </tr>
    <tr>
        <th>Ảnh bìa</th>
        <td><img src="{{ $book->thumbnail }}" alt="" class="img-fluid"></td>
    </tr>
    <tr>
        <th>Tác giả</th>
        <td>{{ $book->author }}</td>
    </tr>
    <tr>
        <th>Nhà xuất bản</th>
        <td>{{ $book->publisher }}</td>
    </tr>
    <tr>
        <th>Ngày xuất bản</th>
        <td>{{ $book->publication }}</td>
    </tr>
    <tr>
        <th>Số lượng</th>
        <td>{{ $book->quantity }}</td>
    </tr>
    <tr>
        <td colspan="2" class="text-center">
            <a href="/" class="btn btn-secondary">Quay lại</a>
        </td>
    </tr>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
