@extends('admin.layout')
@section('content')
<div class="container">
    <h1>Create</h1>
    <form action="{{ route('g.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Name </label>
            <input type="text" name="name" class="form-control">
          </div>
          <br>
          <div class="mb-3 mt-5">
            <button type="submit" class="btn btn-success">Add</button>
            <a href="{{ route('g.index')}}" class="btn btn-primary">Back</a>
         </div>
    </form>

</div>
@endsection
