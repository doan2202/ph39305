@extends('admin.layout')
@section('content')


<div class="container">
    <h1>Edit</h1>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif
    <form action="{{ route('admin.update', $movie) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Title </label>
            <input type="text" name="title" class="form-control" value="{{ $movie->title }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Poster</label><br>
            <input   type="file" name="poster" id="fileImage"><br>
            <img id="img" src="{{ asset('/storage/' . $movie->poster) }}" alt="{{ $movie->title }}" width="70px"
                height="70px">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Intro </label>
            <textarea type="text" name="intro" class="form-control" value="{{ $movie->intro }}"></textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Release Date </label>
            <input type="date" name="release_date" class="form-control"
                value="{{ $movie->release_date }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Genre Name </label>
            <select name="genre_id" class="form-control">
                @foreach ($genres as $g)
                    <option value="{{ $g->id }}"
                        @if ($g->id == $movie->genre_id) selected @endif>
                        {{ $g->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.index') }}" class="btn btn-primary">Back</a>
        </div>
    </form>

</div>
@endsection
