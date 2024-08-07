@extends('admin.layout')
@section('content')


<div class="container">
    <h1>Update</h1>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif
    <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Avatar</label><br>
            <img src="{{ asset('/storage/' . $user->avatar) }}" id="img" alt="{{ $user->avatar }}" width="170px"
                height="170px" style="border-radius: 50% ;" class=" mx-auto d-block">
            <input type="file" id="fileImage" name="avatar" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fullname </label>
            <input type="text" name="fullname" class="form-control" value="{{ $user->fullname }}" >
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Username </label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}" >
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email </label>
            <input type="text" name="email" class="form-control" value="{{ $user->email }}" >
        </div>
        @if (Auth::user()->role == 'admin')
            <div class="mb-3">
                        <label for="" class="form-label">Role </label>
                        <select name="role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
        @endif

      <button type="submit" class="btn btn-warning">Update</button>
      <a href="{{route('user.list')}}" class="btn btn-danger">Back</a>
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
