@extends('backend.layout')
@section('title', 'Profile')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin-panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('user-panel')}}">User list</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                <img id="avatar" class="profile-user-img img-responsive img-circle" src="{{asset('upload/profile/'.$user->avatar)}}" alt="User profile picture">
                <input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
                <h3 class="profile-username text-center">{{$user->name}}</h3>
                <p class="text-muted text-center">{{$user->role}}</p>
                <a href="{{route('delete-user', ['id'=>$user->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">Xóa tài khoản</a>
                <a href="#" class="btn btn-warning" onclick="return confirm('Bạn có chắc chắn muốn khóa tài khoản này?')">Khóa tài khoản</a>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">About</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                <p class="text-muted">
                  {{$user->email}}
                </p>

                <hr>

                <strong><i class="fa fa-book margin-r-5"></i> Description</strong>

                <p class="text-muted">{{$user->description}}</p>

                <hr>

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">         
                <li class="active"><a href="#settings" data-toggle="tab">Thông tin chi tiết</a></li>
                <li><a href="#post" data-toggle="tab">Bài viết</a></li>
              </ul>
              <div class="tab-content">
                
                <div class="tab-pane active" id="settings">
                  
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Name</label>

                      <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="inputName" value="{{$user->name}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                      <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail" value="{{$user->email}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputDescription" class="col-sm-2 control-label">Description</label>

                      <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="inputDescription">{{$user->description}}</textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="selectRole" class="col-sm-2 control-label">Role</label>

                      <div class="col-sm-10">
                        <select name="role">
                          <option @if($user->role == 'admin') selected @endif value="admin">Admin</option>
                          <option @if($user->role == 'author') selected @endif value="author">Author</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Update</button>
                      </div>
                    </div>
                    
                </div>
                <!-- /.tab-pane -->
                {{csrf_field()}}
        </form>
            @if($posts)
              @foreach($posts as $post)
              <div class="tab-pane row" id="post">
                  <div class="col-md-4">
                    <img style="width=150px; height: 50px;" src="{{asset('upload/post/'.$post->feature_image)}}" alt="">
                  </div>
                  <!-- Post -->
                  <div class="post col-md-8">
                      <h3 style="font-size: 20px; color: black;">
                          {{$post->title}}
                      </h3>
                      <p>{!!$post->content!!}</p>
                    <div class="user-block">
                      <img class="img-circle img-bordered-md" src="{{asset('upload/profile/'.$post->users->avatar)}}" alt="user image">
                          <span class="username">
                            <a href="#">{{$post->users->name}}</a>
                          </span>
                      <span class="description">@switch($post->status)
                          @case(1) {{'Chờ phê duyệt'}} @break; 
                          @case(2) {{'Không phê duyệt'}} @break;
                          @case(3) {{'Đã phê duyệt'}} @break;
                      @endswitch</span>
                    </div>
                    <!-- /.user-block -->
                    
                  </div>
                  <!-- /.post -->
                </div>
                <!-- /.tab-pane -->
              </div>
              @endforeach
              <!-- /.tab-content -->
            @else
              <input type="text" disabled class="br-primary" value="Chưa có bài viết nào">
            @endif
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop