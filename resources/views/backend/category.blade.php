@extends('backend.layout')
@section('title', 'Danh mục')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
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
        <div class="col-xs-4">
            <!-- general form elements -->
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Thêm danh mục</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tên danh mục</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Tải thumbnail</label>
                      <input type="file" name="thumbnail" id="exampleInputFile">
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                  </div>
                  {{csrf_field()}}
                </form>
              </div>
              <!-- /.box -->
        </div>
        <div class="col-xs-8">
          <div class="box">
            @include('notification.error')
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">#</th>
                  <th width="10%">Thumbnail</th>
                  <th width="30%">Tên danh mục</th>
                  <th width="30%">Slug</th>
                  <th width="10%">Số bài viết</th>
                </tr>
                </thead>
                <tbody>
                @foreach($category as $cate)
                <tr>
                  <td>{{$cate->id}}</td>
                  <td><a href="{{route('edit-cate',['id'=>$cate->id])}}"><img src="{{asset('upload/'.$cate->thumbnail)}}" width="114px" height="72px" alt="Image"></a></td>
                  <td><a href="{{route('edit-cate',['id'=>$cate->id])}}">{{$cate->name}}</a></td>
                  <td>{{$cate->slug}}</td>
                  <td></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th width="5%">#</th>
                  <th width="10%">Thumbnail</th>
                  <th width="30%">Tên danh mục</th>
                  <th width="30%">Slug</th>
                  <th width="10%">Số bài viết</th>
                </tr>
                </tfoot>
              </table>
              <div aria-label="Page navigation">
                <ul class="pagination">
                    {{$category->links()}}
                </ul>
              </div>
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