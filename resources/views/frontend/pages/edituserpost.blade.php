@include('frontend.partials.head')
@include('frontend.partials.header')
<div class="container lol">
  <div class="row">
    <div class="col-md-12">
      <div class="user-tab">
        <h3 class="tit">Viết bài mới</h3>
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nameCate">Tên bài viết</label>
            <input type="text" name="title" class="form-control" id="nameCate" value="{{$posts->title}}">
          </div>
          <div class="form-group">
            <label>Chuyên mục</label>
            <select class="form-control" name="category">
              @foreach($categories as $cate)
              <option value="{{ $cate->id }}" @if($posts->category_id == $cate->id) selected @endif>{{ $cate->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Tóm Tắt</label>
            <textarea name="description" class="form-control" rows="3">{!!$posts->description!!}</textarea>
          </div>
          <div class="box box-info">
            <div class="box-header">
              <label>Nội dung</label>
              <div class="box-body pad">
                <textarea class="ckeditor" id="editor1" name="content">{!!$posts->content!!}</textarea>
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
              <img id="avatar" style="height: auto;" type="file" src="{{asset('upload/post/'.$posts->feature_image)}}" name="feature" class="form-control">
              <input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
            </div>
            <div class="form-group">
              <label>Tags</label>
              <select class="js-example-basic-multiple" name="tags" multiple="multiple" style="width: 100%">
                @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
              </select>
            </div>
            <a href="{{route('userdelete-post', ['id'=>$posts->id])}}" class="btn btn-danger">Xóa bài viết</a>
            <button type="submit" class="btn btn-primary">Cập nhật bài viết</button>
            {{csrf_field()}}
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('frontend.partials.footer')
  @include('frontend.partials.script')