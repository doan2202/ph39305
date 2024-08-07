@extends('admin.layout')
@section('content')
    <div class="container">
        <h1>Create</h1>
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Title </label>
                <input type="text" name="title" class="form-control" value="{{old('title')}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Poster</label><br>
                <input id="fileImage" type="file" name="poster" value="{{old('poster')}}"><br>
                <img src="" alt="" id="img" height="100px" width="100px">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Intro</label>
                <textarea name="intro" class="form-control">{{old('intro')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Release Date </label>
                <input type="date" name="release_date" class="form-control" value="{{old('release_date')}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Genre Name </label>
                <select name="genre_id" class="form-control">
                    @foreach ($genres as $g)
                        <option value="{{ $g->id }}">
                            {{ $g->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Add</button>
                <a href="{{ route('admin.index') }}" class="btn btn-primary">Back</a>
            </div>
        </form>

    </div>
    <script>
        var fileImage=document.querySelector("#fileImage")
        var img=document.querySelector("#img")
        fileImage.addEventListener('change',function(e){
            e.preventDefault()
            img.src= URL.createObjectURL(this.files[0])
        })
    </script>
@endsection
