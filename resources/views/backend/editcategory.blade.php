@extends('backend.layout')
@section('title', 'Danh mục')
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            General Form Elements
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Chỉnh sửa danh mục</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nameCate">Tên danh mục</label>
                      <input type="text" name="name" class="form-control" id="nameCate" value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                      <label for="slugCate">Slug</label>
                      <input type="text" class="form-control" id="slugCate" value="{{$category->slug}}">
                    </div>
                    <div class="form-group">
                      <label>Thumbnail</label>
                        <img id="avatar" class="img-responsive" name="thumbnail" src="{{asset('upload/'.$category->thumbnail)}}" alt="">
                        <input id="img" type="file" name="thumbnail" class="form-control hidden" onchange="changeImg(this)">
                      
                    </div>
                  </div>
                  <!-- /.box-body -->
    
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{route('delete-cate', ['id'=>$category->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục?')">Xóa danh mục</a>
                  </div>
                  {{csrf_field()}}
                </form>
              </div>
              <!-- /.box -->
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
@stop