@extends('frontend.layout.single')
@section('page-header')
		<!-- PAGE HEADER -->
		<div class="page-header">
			<div class="page-header-bg" style="background-image: url('{{asset('upload/'.$cates->thumbnail)}}'); " data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase">{{$cates->name}}</h1>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
@endsection
@section('main')
				<div class="col-md-8">
					<!-- post -->
					<?php $post1 = $posts_cate->shift(); ?>
					@if($cates->posts->count() > 0)
						@if($post1)
						<div class="post post-thumb">
							<a class="post-img" href="{{route('post-detail', ['id'=>$post1->id, 'slug'=>$post1->slug])}}"><img src="{{asset('upload/post/'.$post1->feature_image)}}" alt=""></a>
							<div class="post-body">
								<div class="post-category">
									<a href="{{route('front-cate', ['id'=>$post1->category->id, 'slug'=>$post1->category->slug])}}">{{$post1->category->name}}</a>
								</div>
								<h3 class="post-title title-lg"><a href="{{route('post-detail', ['id'=>$post1->id, 'slug'=>$post1->slug])}}">{{$post1->title}}</a></h3>
								<ul class="post-meta">
									<li><a href="{{route('author', ['id'=>$post1->users->id])}}">{{$post1->users->name}}</a></li>
									<li>{{date('F j, Y, H:i a', strtotime($post1['created_at'])) }}</li>
								</ul>
							</div>
						</div>
						<!-- /post -->
						@endif
						<!-- post -->
						@foreach($posts_cate as $post)
						<div class="post post-row">
							<a class="post-img" href="{{route('post-detail', ['id'=>$post->id, 'slug'=>$post->slug])}}"><img src="{{asset('upload/post/'.$post->feature_image)}}" alt=""></a>
							<div class="post-body">
								<div class="post-category">
									<a href="{{route('front-cate', ['id'=>$post->category->id, 'slug'=>$post->category->slug])}}">{{$post->category->name}}</a>
								</div>
								<h3 class="post-title"><a href="blog-post.html">{{$post->title}}</a></h3>
								<ul class="post-meta">
									<li><a href="author.html">{{$post->users->name}}</a></li>
									<li>{{date('F j, Y, H:i a', strtotime($post['created_at'])) }}</li>
								</ul>
								<p>{!!$post->description!!}</p>
							</div>
						</div>
						<!-- /post -->
						@endforeach
						<div class="section-row loadmore text-center">
							{{$posts_cate->links()}}
						</div>
					@else 
						<div class="section-row loadmore text-center">
							<h3 style="color: #EF4266; text-align: center; text-transform: uppercase;">Chưa có bài viết nào</h3>
							<a href="{{route('index')}}" class="primary-button">Quay lại trang chủ</a>
						</div>
					@endif
				</div>
@endsection