<header id="header">
    <!-- NAV -->
    <div id="nav">
        <!-- Top Nav -->
        <div id="nav-top">
            <div class="container">
                <!-- social -->
                <ul class="nav-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
                <!-- /social -->

                <!-- logo -->
                <div class="nav-logo">
                    <a href="{{route('index')}}" class="logo"><img src="./img/logo.png" alt=""></a>
                </div>
                <!-- /logo -->

                <!-- search & aside toggle -->
                @if(Auth::guest())
                <div class="nav-btns">
                    <a href="{{route('register')}}" class="btn btn-primary">Đăng ký</a>
                    <a href="{{route('login')}}" class="btn btn-danger">Đăng nhập</a>
                </div>
                @else 
                <div class="authorr">
                    <a href="{{route('profile')}}"><img class="authorimg" src="{{asset('upload/profile/'.Auth::user()->avatar)}}" /></a>
                    <h3>Xin chào <a href="{{route('profile')}}">{{Auth::user()->name}}</a></h3>
                </div>
                @endif
                <div class="nav-btns">
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div id="nav-search">
                        <form>
                            <input class="input" name="search" placeholder="Enter your search...">
                        </form>
                        <button class="nav-close search-close">
                            <span></span>
                        </button>
                    </div>
                </div>
                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Top Nav -->

        <!-- Main Nav -->
        <div id="nav-bottom">
            <div class="container">
                <!-- nav -->
                <ul class="nav-menu">
                    <li>
                        <a href="{{route('index')}}">Trang chủ</a>
                    </li>
                    <li class="has-dropdown">
                        <a href="#">hệ điều hành</a>
                        <div class="dropdown">
                         <div class="dropdown-body">
                            <ul class="dropdown-list">
                                @foreach($cates as $cate)
                                <li><a href="{{route('front-cate', ['id'=>$cate->id, 'slug'=>$cate->slug])}}">{{$cate->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
                @foreach($acate as $cate)
                <li><a href="{{route('front-cate', ['id'=>$cate->id, 'slug'=>$cate->slug])}}">{{$cate->name}}</a></li>
                @endforeach
            </ul>
            <!-- /nav -->
        </div>
    </div>
    <!-- /Main Nav -->

    
</div>
<!-- /NAV -->
</header>