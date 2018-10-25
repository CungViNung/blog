@extends('backend.layout')
@section('title', 'User list')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User list
    </h1>
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
                  <th width="25%">Username</th>
                  <th width="25%">Email</th>
                  <th width="10%">Role</th>
                  <th width="15%">Ngày tham gia</th>
                  <th width="10%">Bài viết</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td><a href="{{route('user-detail', ['id'=>$user->id])}}"><img style="width: 50px; height: 50px;" src="{{asset('upload/profile/'.$user->avatar)}}" width="50px" class="img-circle" alt="User Image"></a></td>
                  <td><a href="{{route('user-detail', ['id'=>$user->id])}}">{{$user->name}}</a></td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->role}}</td>
                  <td>{{$user->created_at}}</td>
                  <td>{{$user->post->count()}}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th width="5%">#</th>
                  <th width="10%">Avatar</th>
                  <th width="25%">Username</th>
                  <th width="25%">Email</th>
                  <th width="10%">Role</th>
                  <th width="15%">Ngày tham gia</th>
                  <th width="10%">Bài viết</th>
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