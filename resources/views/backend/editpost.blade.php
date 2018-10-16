@extends('backend.layout')
@section('title', 'Sửa bài viết')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <form method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nameCate">Tên bài viết</label>
            <input type="text" name="title" class="form-control" value="{{$posts->title}}" id="nameCate">
            </div>
            <div class="form-group">
              <label>Chuyên mục</label>
              <select class="form-control" name="category">
                @foreach($category as $cate)
                    <option value="{{ $cate->id }}" @if($posts->category_id == $cate->id) selected @endif >{{ $cate->name }}</option>
                @endforeach
              </select>
            </div> 
            <div class="form-group">
              <label>Tóm Tắt</label>
            <textarea name="description" class="form-control" rows="3">{{$posts->description}}</textarea>
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
                      <textarea class="ckeditor" id="editor1" name="content">{{$posts->content}}</textarea>
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
                <img id="avatar" class="img-responsive" src="{{asset('upload/post/'.$posts->feature_image)}}" alt="Feature picture">
                <input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
            </div>
            <div class="form-group" >
              <label>Bài viết nổi bật</label><br>
              Có: <input type="radio" name="hot" value="1" @if($posts->hot==1) {{'checked'}} @endif>
              Không: <input type="radio" name="hot" value="0" @if($posts->hot==0) {{'checked'}} @endif>
            </div>
            <div class="form-group">
                <select class="js-example-basic-multiple" name="tags" multiple="multiple" style="width: 100%">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach 
                </select>
            </div>
            <div class="control-group">
                    <div class="controls" style="margin: 15px">
                        <select name="status" id="">
                            <option @if($posts->status == 1) selected @endif value="1">Chờ phê duyệt</option>
                            <option @if($posts->status == 2) selected @endif value="2">Không phê duyệt</option>
                            <option @if($posts->status == 3) selected @endif value="3">Đã phê duyệt</option>
                        </select>
                    </div>
                </div>
            <a href="{{asset('admin/post/delete/'.$posts->id  )}}" class="btn btn-danger">Xóa bài viết</a>
            <button type="submit" class="btn btn-primary">Cập nhật bài viết</button>
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