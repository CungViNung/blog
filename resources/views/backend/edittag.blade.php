@extends('backend.layout')
@section('title', 'Danh mục')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      General Form Elements
    </h1>
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
                <label for="nameCate">Tên tag</label>
                <input type="text" name="name" class="form-control" id="nameCate" value="{{$tags->name}}">
              </div>
              <div class="form-group">
                <label for="slugCate">Slug</label>
                <input type="text" class="form-control" id="slugCate" value="{{$tags->slug}}">
              </div>
            </div>
            <!-- /.box-body -->
            
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Cập nhật</button>
              <a href="{{route('delete-tag', ['id'=>$tags->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tag?')">Xóa danh mục</a>
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