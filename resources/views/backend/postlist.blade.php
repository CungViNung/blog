@extends('backend.layout')
@section('title', 'Post list')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post list
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{route('add-post')}}" class="btn btn-success">Thêm bài viết</a>
            </div>
            @include('notification.error')
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">#</th>
                  <th width="25%">Tiêu đề</th>
                  <th>Tác giả</th>
                  <th>Chuyên mục</th>
                  <th>Tag</th>
                  <th>Status</th>
                  <th>Thời gian</th>
                </tr>
                </thead>
                <tbody>
                {{-- //foreach --}} 
                @foreach($posts as $post)
                <tr class="@switch($post->status)
                    @case(1) {{'bg-warning'}} @break; 
                    @case(2) {{'bg-danger'}} @break;
                    @case(3) {{'bg-success'}} @break;    
                @endswitch">
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('edit-post', ['id'=>$post->id])}}">{{$post->title}}</a></td>
                    <td>{{$post->users->name}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>@foreach($post->tag as $tags)
                            {{$tags->name}}
                        @endforeach</td>
                    <td>@switch($post->status)
                            @case(1) {{'Chờ phê duyệt'}} @break; 
                            @case(2) {{'Không phê duyệt'}} @break;
                            @case(3) {{'Đã phê duyệt'}} @break;
                        @endswitch</td>
                    <td>{{$post->created_at}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th width="5%">#</th>
                  <th width="25%">Tiêu đề</th>
                  <th>Tác giả</th>
                  <th>Chuyên mục</th>
                  <th>Tag</th>
                  <th>Status</th>
                  <th>Thời gian</th>
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