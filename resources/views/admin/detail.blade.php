@extends('admin.layout')
@section('content')
<div class="container">
    <h1>Edit</h1>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Title </label>
            <input type="text" name="title" class="form-control" value="{{ $movie->title }}" readonly>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Poster</label><br>
            <img src="{{ asset('/storage/' . $movie->poster) }}" alt="{{ $movie->title }}" width="70px"
                height="70px">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Intro </label>
            <input type="text" name="intro" class="form-control" value="{{ $movie->intro }}" readonly>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Release Date </label>
            <input type="date" name="release_date" class="form-control"
                value="{{ $movie->release_date }}" readonly>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Genre Name </label>
            <input type="tex" name="release_date" class="form-control"
                value="{{ $movie->genre->name }}" readonly>
        </div>
        <div class="mb-3">
            <a href="{{ route('admin.index') }}" class="btn btn-primary">Back</a>
        </div>
    </form>

</div>
@endsection
