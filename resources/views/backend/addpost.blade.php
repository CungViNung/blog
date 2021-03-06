@extends('backend.layout')
@section('title', 'Thêm bài viết mới')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Text Editors
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nameCate">Tên bài viết</label>
            <input type="text" name="title" class="form-control" id="nameCate">
          </div>
          <div class="form-group">
            <label>Chuyên mục</label>
            <select class="form-control" name="category">
              @foreach($categories as $cate)
              <option value="{{ $cate->id }}">{{ $cate->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Tóm Tắt</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
          </div>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Nội dung
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                title="Remove">
                <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <textarea class="ckeditor" id="editor1" name="content"></textarea>
              <script type="text/javascript">
                var editor = CKEDITOR.replace('description',{
                  language:'vi',
                  filebrowserImageBrowseUrl: '../../public/editor/ckfinder/ckfinder.html?Type=Images',
                  filebrowserFlashBrowseUrl: '../../public/editor/ckfinder/ckfinder.html?Type=Flash',
                  filebrowserImageUploadUrl: '../../public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                  filebrowserFlashUploadUrl: '../../public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                });
              </script>
            </div>
          </div>
          <div class="form-group">
            <label>Hình Ảnh</label>
            <input type="file" name="feature" class="form-control" placeholder="">
          </div>
          <div class="form-group" >
            <label>Bài viết nổi bật</label><br>
            Có: <input type="radio" name="hot" value="1">
            Không: <input type="radio" checked name="hot" value="0">
          </div>
          <div class="form-group">
            <select class="js-example-basic-multiple" name="tags" multiple="multiple" style="width: 100%">
              @foreach($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
            </select>
          </div>
          <button type="reset" class="btn btn-default">Làm Mới</button>
          <button type="submit" class="btn btn-primary">Thêm bài viết</button>
          {{csrf_field()}}
        </form>
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop