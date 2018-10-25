@include('frontend.partials.head')
@include('frontend.partials.header')
<div class="container lol">
    <div class="row">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="col-md-3 sidenav">
                <div class="image-left">
                    <img id="avatar" class="profile-user-img img-responsive img-circle" src="{{asset('upload/profile/'.Auth::user()->avatar)}}" alt="User profile picture">

                    <input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">

                    <h3 class="profile_name">{{Auth::user()->name}}</h3>
                    <a href="{{route('logout')}}" class="btn btn-danger">Đăng xuất</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="user-tab">
                    @include('notification.error')
                    <h3 class="tit">Thông tin</h3>
                    
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="inputName" value="{{Auth::user()->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="inputEmail" value="{{Auth::user()->email}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription" class="col-sm-2 control-label">Giới thiệu</label>
                        
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" id="inputDescription">{{Auth::user()->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                    {{csrf_field()}}
                    
                </div>
            </div>
        </form>
    </div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12" style="background: #f1f1f1; padding: 20px; border: 2px solid red;">
            <div class="user-tab">
                <h3 class="tit">Bài viết đã đăng</h3>
                <a href="{{route('useradd-post')}}" class="btn btn-success"> Đăng bài viết</a>
                <table class="table">
                    <thead>
                      <tr>
                        <th width="5%">#</th>
                        <th width="30%">Tiêu đề</th>
                        <th width="15%">Chuyên mục</th>
                        <th width="10%">Tag</th>
                        <th width="25%">Status</th>
                        <th>Ngày đăng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr class="@switch($post->status)
                        @case(1) {{'bg-warning'}} @break
                        @case(2) {{'bg-danger'}} @break
                        @case(3) {{'bg-success'}} @break
                        @endswitch">
                        <td>{{$post->id}}</td>
                        <td><a href="{{route('useredit-post', ['id'=>$post->id])}}">{{$post->title}}</a></td>
                        <td>{{$post->category->name}}</td>
                        <td>@foreach($post->tag as $tags)
                            {{$tags->name}}
                        @endforeach</td>
                        <td>@switch($post->status)
                            @case(1) {{'Chờ phê duyệt'}} @break; 
                            @case(2) {{'Không phê duyệt'}} @break;
                            @case(3) {{'Đã phê duyệt'}} @break;
                        @endswitch</td>
                        <td>{{date('d.m.Y', strtotime($post['created_at']))}}</td>
                    </tr>      
                    @endforeach
                </tbody>
            </table>
            {{$posts->links()}}
        </div>
    </div>
    
</div>
</div>
@include('frontend.partials.footer')
@include('frontend.partials.script')