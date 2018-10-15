@extends('frontend.layout.single')
@section('page-header')
		<!-- PAGE HEADER -->
		<div class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<div class="author">
							<img class="author-img center-block" src="{{asset('upload/profile/'.$author->avatar)}}" alt="">
							<h1 class="text-uppercase">{{$author->name}}</h1>
							<p class="lead">{{$author->description}}</p>
							<ul class="author-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
@endsection
@section('main')

				<div class="col-md-8">
					<!-- post -->
					@if($author->post->count() > 0)
						@foreach($author_post as $post)
						<div class="post post-row">
							<a class="post-img" href="{{route('post-detail', ['id'=>$post->id, 'slug'=>$post->slug])}}"><img src="{{asset('upload/post/'.$post->feature_image)}}" alt=""></a>
							<div class="post-body">
								<div class="post-category">
									<a href="{{route('front-cate', ['id'=>$post->category->id, 'slug'=>$post->category->slug])}}">{{$post->category->name}}</a>
								</div>
								<h3 class="post-title"><a href="{{route('post-detail', ['id'=>$post->id, 'slug'=>$post->slug])}}">{{$post->title}}</a></h3>
								<ul class="post-meta">
									<li><a href="{{route('author', ['id'=>$post->users->id])}}">{{$post->users->name}}</a></li>
									<li>{{date('F j, Y, H:i a', strtotime($post['created_at'])) }}</li>
								</ul>
								<p>{!! $post->description !!}</p>
							</div>
						</div>
						<!-- /post -->
						@endforeach
						<div class="section-row loadmore text-center">
							{{$author_post->links()}}
						</div>
					@else
						<div class="section-row loadmore text-center">
							<h3 style="color: #EF4266; text-align: center; text-transform: uppercase;">Chưa có bài viết nào</h3>
							<a href="{{route('index')}}" class="primary-button">Quay lại trang chủ</a>
						</div>
					@endif
				</div>

@stop
