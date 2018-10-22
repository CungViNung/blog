@extends('frontend.layout.single')
@section('page-header')
		<!-- PAGE HEADER -->
		<div id="post-header" class="page-header">
			<div class="page-header-bg" style="background-image: url('{{asset('upload/post/'.$posts->feature_image)}}');" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-category">
							<a href="{{route('front-cate', ['id'=>$posts->category->id, 'slug'=>$posts->category->slug])}}">{{$posts->category->name}}</a>
						</div>
						<h1>{{$posts->title}}</h1>
						<ul class="post-meta">
							<li><a href="{{route('author', ['id'=>$posts->users->id])}}">{{$posts->users->name}}</a></li>
							<li>{{date('F j, Y, H:i a', strtotime($posts['created_at'])) }}</li>
							<li><i class="fa fa-comments"></i> {{$posts->comment->count()}}</li>
							<li><i class="fa fa-eye"></i> {{$posts->view}}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
@endsection
@section('main')

				<div class="col-md-8">
					<!-- post share -->
					<div class="section-row">
						<div class="post-share">
							<a href="#" class="social-facebook"><i class="fa fa-facebook"></i><span>Share</span></a>
							<a href="#" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
							<a href="#" class="social-pinterest"><i class="fa fa-pinterest"></i><span>Pin</span></a>
							<a href="#" ><i class="fa fa-envelope"></i><span>Email</span></a>
						</div>
					</div>
					<!-- /post share -->

					<!-- post content -->
					<div class="section-row">
						<div class="contentt">
								{!!$posts->content!!}
						</div>
					</div>
					<!-- /post content -->

					<!-- post tags -->
					<div class="section-row">
						<div class="post-tags">
							<ul>
								<li>TAGS:</li>
								@foreach($posts->tag as $tag)
								<li><a href="#">{{$tag->name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<!-- /post tags -->

					<!-- post author -->
					<div class="section-row">
						<div class="section-title">
							<h3 class="title">Tác giả: <a href="{{route('author', ['id'=>$posts->users->id])}}">{{$posts->users->name}}</a></h3>
						</div>
						<div class="author media">
							<div class="media-left">
								<a href="{{route('author', ['id'=>$posts->users->id])}}">
									<img style="height: 80px; width: 80px;" class="author-img media-object" src="{{asset('upload/profile/'.$posts->users->avatar)}}" alt="">
								</a>
							</div>
							<div class="media-body">
								<p>{{$posts->users->description}}</p>
								<ul class="author-social">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /post author -->

					<!-- /related post -->
					<div>
						<div class="section-title">
							<h3 class="title">Bài viết liên quan</h3>
						</div>
						<div class="row">
							<!-- post -->
							@foreach($related as $lq)
							<div class="col-md-4">
								<div class="post post-sm">
									<a class="post-img" href="blog-post.html"><img src="{{asset('upload/post/'.$lq->feature_image)}}" alt=""></a>
									<div class="post-body">
										<div class="post-category">
											<a href="{{route('front-cate', ['id'=>$lq->category->id, 'slug'=>$lq->category->slug])}}">{{$lq->category->name}}</a>
										</div>
										<h3 class="post-title title-sm"><a href="{{route('post-detail', ['id'=>$lq->id, 'slug'=>$lq->slug])}}">{{$lq->title}}</a></h3>
										<ul class="post-meta">
											<li><a href="author.html">{{$lq->users->name}}</a></li>
											<li>{{date('F j, Y, H:i a', strtotime($lq['created_at'])) }}</li>
										</ul>
									</div>
								</div>
							</div>
							@endforeach
							<!-- /post -->
						</div>
					</div>
					<!-- /related post -->

					<!-- post comments -->
					<div class="section-row">
						<div class="section-title">
							<h3 class="title">{{$comments->count()}} Bình luận</h3>
						</div>
						<div class="post-comments">
							<!-- comment -->
							@if($comments->count() > 0)
								@foreach($comments as $cmt)
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="{{asset('upload/profile/'.$cmt->user->avatar)}}" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4>{{$cmt->user->name}}</h4>
											<span class="time">{{date('H:i a', strtotime($cmt['created_at'])) }}</span>
										</div>
										<p>{{$cmt->com_content}}</p>
									</div>
								</div>
								@endforeach
							@else
									<h3 style="color: #EF4266; text-align: center; text-transform: uppercase;">Chưa có bình luận nào!<br/> hãy là người đầu tiên để lại bình luận</h3>
							@endif
							<!-- /comment -->
						</div>
					</div>
					<!-- /post comments -->

					<!-- post reply -->
					<div class="section-row">
						<div class="section-title">
							<h3 class="title">Để lại bình luận</h3>
						</div>
						@if(Auth::check())
						<form class="post-reply" method="POST">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="input" name="message" placeholder="Lời nhắn"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input class="input" type="text" name="name" value="{{Auth::user()->name}}">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input class="input" type="email" name="email" value="{{Auth::user()->email}}">
									</div>
								</div>
								<div class="col-md-12">
									<button class="primary-button">Bình luận</button>
								</div>
							</div>
							{{csrf_field()}}
						</form>
						@else 
							<a href="{{route('login')}}" class="primary-button">Đăng nhập để bình luận</a>
						@endif
					</div>
					<!-- /post reply -->
				</div>

@endsection