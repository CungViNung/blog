@extends('backend.layout')
@section('title', 'Dashboard')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bài viết</span>
              <span class="info-box-number">{{count($post)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Danh mục</span>
              <span class="info-box-number">{{count($cate)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Thành viên</span>
              <span class="info-box-number">{{count($user)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Người dùng mới</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <?php $users = $user->sortByDesc('id')->take(4); ?>
                    @foreach($users as $us)
                      <li>
                        <img style="width: 100px; height: 100px;" src="{{asset('upload/profile/'.$us->avatar)}}" alt="User Image">
                        <a class="users-list-name" href="{{route('user-detail', ['id'=>$us->id])}}">{{$us->name}}</a>
                        <span class="users-list-date">{{$us->created_at}}</span>
                      </li>
                    @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{route('user-panel')}}" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Bài viết mới</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                @foreach($post as $posts)
                <li class="item"> 
                  <div class="product-img">
                    <img style="width: 100px; height: 70px; padding-right: 10px;" src="{{asset('upload/post./'.$posts->feature_image)}}" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="{{route('edit-post',['id'=>$posts->id])}}" class="product-title">{{$posts->title}}
                      <span class="pull-right @switch($posts->status)
                        @case(1) {{'label label-warning'}} @break
                        @case(2) {{'label label-danger'}} @break
                        @case(3) {{'label label-success'}} @break
                        @endswitch">
                      @switch($posts->status)
                          @case(1) {{'Chờ phê duyệt'}} @break  
                          @case(2) {{'Không phê duyệt'}} @break
                          @case(3) {{'Đã phê duyệt'}} @break
                      @endswitch</span></a>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="{{route('post-panel')}}" class="uppercase">View All Post</a>
            </div>
            <!-- /.box-footer -->
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
 
