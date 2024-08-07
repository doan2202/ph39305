@extends('admin.layout')
@section('content')


<div class="container">
    <h1>User</h1>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif
    @if (session('err'))
        <div class="alert alert-danger" role="alert">
            <strong>{{ session('err') }}</strong>
        </div>
    @endif
    <form action="{{ route('user.edit',$user->id) }}" enctype="multipart/form-data">
        @csrf--
        <div class="mb-3">
            <img src="{{ asset('/storage/' . $user->avatar) }}" alt="" width="170px"
                height="170px" style="border-radius: 50% ;" class=" mx-auto d-block">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">ID </label>
            <input type="text" name="id" class="form-control" value="{{ $user->id }}" readonly>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fullname </label>
            <input type="text" name="fullname" class="form-control" value="{{ $user->fullname }}" readonly>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Username </label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}" readonly>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email </label>
            <input type="text" name="email" class="form-control" value="{{ $user->email }}" readonly>
        </div>
        @if (Auth::user()->role === 'admin')
        <div class="mb-3">
            <label for="" class="form-label">Role </label>
            <input type="text" name="email" class="form-control" value="{{ $user->role }}" readonly>
        </div>
        @endif

        <button type="submit" class="btn btn-warning">Edit</button>
        {{-- <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a> --}}
        <a href="{{route('change')}}" class="btn btn-success">Change Pass</a>
        <a href="{{route('admin.index')}}" class="btn btn-info">Home</a>

    </form>

</div>
@endsection
