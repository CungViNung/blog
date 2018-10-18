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
                  <img id="avatar" class="profile-user-img img-responsive img-circle" style="width: 150px; position: relative;" name="img" src="../../public/frontend/img/df.png" alt="User profile picture">
                  <input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
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
                </ul>

                  <div class="tab-pane active" id="settings" style="padding: 20px 0;">
                    
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                          <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">Password</label>
        
                            <div class="col-sm-10">
                              <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                            </div>
                          </div>
                      <div class="form-group">
                        <label for="inputDescription" class="col-sm-2 control-label">Description</label>

                        <div class="col-sm-10">
                          <textarea class="form-control" name="description" id="inputDescription" placeholder="Description"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="selectRole" class="col-sm-2 control-label">Role</label>

                        <div class="col-sm-10">
                          <select name="role">
                            <option value="admin">Admin</option>
                            <option value="author" selected>Author</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Add User</button>
                        </div>
                      </div>
                      
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        {{csrf_field()}}
        </form>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop