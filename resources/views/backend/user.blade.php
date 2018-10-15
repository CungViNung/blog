@extends('backend.layout')
@section('title', 'User list')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User list
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{route('add-user')}}" class="btn btn-success">Thêm người dùng</a>
            </div>
            @include('notification.error')
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">#</th>
                  <th width="10%">Avatar</th>
                  <th width="30%">Username</th>
                  <th width="30%">Email</th>
                  <th width="10%">Role</th>
                  <th width="10%">Ngày tham gia</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td><a href="{{route('user-detail', ['id'=>$user->id])}}"><img src="{{asset('upload/profile/'.$user->avatar)}}" width="50px" class="img-circle" alt="User Image"></a></td>
                  <td><a href="{{route('user-detail', ['id'=>$user->id])}}">{{$user->name}}</a></td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->role}}</td>
                  <td>{{$user->created_at}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th width="5%">#</th>
                  <th width="10%">Avatar</th>
                  <th width="30%">Username</th>
                  <th width="30%">Email</th>
                  <th width="10%">Role</th>
                  <th width="10%">Ngày tham gia</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop