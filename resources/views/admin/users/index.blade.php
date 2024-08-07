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

        <p>User</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="container">
    <h1>List account</h1>
    {{-- <a href="{{route('index')}}" class="btn btn-info">Infor</a> --}}
    @if (session('message'))
        .<div class="alert alert-success" role="alert">
            <strong>{{session('message')}}</strong>
        </div>
    @endif
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fullname</th>
                <th>Username</th>
                <th>Avatar</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->fullname }}</td>
                <td>{{ $p->username }}</td>
                <td>
                    <img src="{{asset('/storage/' .$p->avatar)}}" alt="" style="border-radius: 50% ;" height="100px" width="100px">
                </td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->role }}</td>
                <td>{{ $p->active ? 'Kích hoạt' : 'Ngừng hoạt động' }}</td>


                    <td>
                        @if ($p->role != 'admin')
                        @if ($p->active)
                            <a href="{{ route('admin.deactivate', $p->id) }}" class="btn btn-danger">Bỏ kích hoạt</a><br>
                        @else
                            <a href="{{ route('admin.activate', $p->id) }}" class="btn btn-success">Kích hoạt</a><br>
                        @endif
                        @endif
                        <a href="{{route('user.edit',$p->id)}}" class="btn btn-info">Edit</a>
                        @if (!(Auth::user()->id == $p->id))
                        <form action="{{ route('user.destroy', $p) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning"
                                onclick="return confirm('Are you sure?')"> Delete</button>
                            </form>
                        @endif


                    </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
