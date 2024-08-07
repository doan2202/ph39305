@extends('admin.layout')
@section('content')
<div class="container">
    <h1>Edit</h1>
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <form action="{{ route('g.update',$genre->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Name </label>
            <input type="text" name="name" class="form-control" value="{{$genre->name}}">
          </div>
          <br>
          <div class="mb-3 mt-5">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('g.index')}}" class="btn btn-primary">Back</a>
         </div>
    </form>

</div>
@endsection
