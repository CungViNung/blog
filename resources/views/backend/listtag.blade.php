@extends('backend.layout')
@section('title', 'Danh mục')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tags
      </h1>
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
                      <label for="exampleInputEmail1">Tên tag</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên Tag">
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Thêm Tag</button>
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
                  <th width="30%">Tên danh mục</th>
                  <th width="30%">Slug</th>
                  <th>Ngày tạo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                <tr>
                  <td>{{$tag->id}}</td>
                  <td><a href="{{route('edit-tag',['id'=>$tag->id])}}">{{$tag->name}}</a></td>
                  <td>{{$tag->slug}}</td>
                  <td>{{$tag->created_at}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th width="5%">#</th>
                  <th width="30%">Tên danh mục</th>
                  <th width="30%">Slug</th>
                  <th>Ngày tạo</th>
                </tr>
                </tfoot>
              </table>
              <div aria-label="Page navigation">
                <ul class="pagination">
                    {{$tags->links()}}
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