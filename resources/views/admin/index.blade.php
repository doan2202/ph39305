@extends('admin.layout')
@section('info')
<ul class="nav navbar-nav">

    <li class="dropdown user user-menu">
        @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{ asset('/storage/' . $user->avatar) }}" class="user-image" alt="User Image">
        <span class="hidden-xs"> {{$user->username}}</span>
        </a>
        <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="{{ asset('/storage/' . $user->avatar) }}" class="img-circle" alt="User Image">

            <p>
           {{$user->username}}
            <small>Member since Nov. 2012</small>
            </p>
        </li>

        <li class="user-footer">
            <div class="pull-left">
            <a href="{{route('user.detail',$user->id)}}" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
            <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
        </ul>
    </li>
  <!-- Control Sidebar Toggle Button -->
  <li>
    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
  </li>
</ul>
@endsection
@section('dm')
 <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Danh mục</span>
            <span class="label label-primary pull-right">{{$totals}}</span>
          </a>
          <ul class="treeview-menu">
            @foreach ($g as $g )
                <li><a href="{{route('admin.mindex',$g->id)}}"><i class="fa fa-circle-o"></i> {{$g->name}}</a></li>
            @endforeach

          </ul>
        </li>
@endsection
@section('content')
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$totals}}</h3>

        <p>Tổng số thể loại</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="{{route('g.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$views}}</h3>

        <p>Tổng lượt xem</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$films}}</h3>

        <p>Tổng số phim</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="{{route('admin.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{$u}}</h3>

        <p>User</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{{route('user.list')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @if (session('message'))
        <div class="alert alert-succes">{{session('message')}}</div>
  @endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Title</th>
            <th scope="col">Poster</th>
            <th scope="col">Intro</th>
            <th scope="col">View</th>
            <th scope="col">Release Date</th>
            <th scope="col">Genre name</th>
            <th scope="col">Action</th>
            <a href="{{route('admin.create')}}" class="btn btn-success">Add</a>

        </tr>
    </thead>
    <tbody>
        @foreach ($movies as $m)
            <tr>
                <td scope="row">{{ $m->id }}</td>
                <td scope="row">{{ $m->title }}</td>
                <td scope="row">
                    <img src="{{ asset('/storage/' . $m->poster) }}" alt="{{ $m->title }}"
                        width="120px" height="120px">
                </td>
                <td scope="row">{{ $m->intro }}</td>
                <td scope="row">{{ $m->view }}</td>
                <td scope="row">{{ $m->release_date }}</td>
                <td scope="row">{{ $m->genre->name }}</td>
                <td scope="row" class="d-flex">
                <a href="{{ route('admin.edit', $m) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('admin.destroy', $m) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure?')"> Delete</button>
                    </form>
                    <a href="{{ route('admin.detail', $m) }}" class="btn btn-warning">Detail</a>
                </td>

            </tr>
        @endforeach

    </tbody>
</table>
    {{$movies->links()}}
@endsection
