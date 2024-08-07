@extends('admin.layout')
@section('dm')
 <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Thể loại</span>
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
@if (session('message'))
<div class="alert alert-success mt-5">{{session('message')}}</div>
  @endif
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
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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

        <p>Users</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{{route('user.list')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
            <a href="{{route('g.create')}}" class="btn btn-success">Add</a>

        </tr>
    </thead>
    <tbody>
        @foreach ($genres as $m)
            <tr>
                <td scope="row">{{ $m->id }}</td>
                <td scope="row">{{ $m->name }}</td>
                <td scope="row" class="d-flex">
                <a href="{{ route('g.edit', $m) }}" class="btn btn-primary">Edit</a>
                <form action="{{route('g.destroy', $m) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure?')"> Delete</button>
                    </form>

                </td>

            </tr>
        @endforeach

    </tbody>
</table>

@endsection
