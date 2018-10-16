@extends('frontend.layout.layout')
@section('main')

	<!-- Main -->
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div id="hot-post" class="row hot-post">
				<div class="col-md-8 hot-post-left">
					<!-- post -->
					<?php $news = $posts->sortByDesc('created_at')->take(3);
						  $new1 = $news->shift();
					?>
					<div class="post post-thumb to">
						<a class="post-img" href="{{route('post-detail', ['id'=>$new1->id, 'slug'=>$new1->slug])}}"><img src="{{asset('upload/post/'.$new1->feature_image)}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{route('front-cate', ['id'=>$new1->category->id, 'slug'=>$new1->category->slug])}}">{{$new1->category->name}}</a>
							</div>
							<h3 class="post-title title-lg"><a href="{{route('post-detail', ['id'=>$new1->id, 'slug'=>$new1->slug])}}">{{$new1->title}}</a></h3>
							<ul class="post-meta">
								<li><a href="{{route('author', ['id'=>$new1->users->id])}}">{{$new1->users->name}}</a></li>
								<li>{{date('F j, Y, H:i a', strtotime($new1['created_at'])) }}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
				<div class="col-md-4 hot-post-right">
					<!-- post -->
					@foreach($news as $new)
					<div class="post post-thumb nho">
						<a class="post-img" href="{{route('post-detail', ['id'=>$new->id, 'slug'=>$new->slug])}}"><img src="{{asset('upload/post/'.$new->feature_image)}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{route('front-cate', ['id'=>$new->category->id, 'slug'=>$new->category->slug])}}">{{$new->category->name}}</a>
							</div>
							<h3 class="post-title"><a href="{{route('post-detail', ['id'=>$new->id, 'slug'=>$new->slug])}}">{{$new->title}}</a></h3>
							<ul class="post-meta">
								<li><a href="{{route('author', ['id'=>$new->users->id])}}">{{$new->users->name}}</a></li>
								<li>{{date('F j, Y, H:i a', strtotime($new['created_at'])) }}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
					@endforeach
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION --> 
				<div class="col-md-8">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Gần đây</h2>
							</div>
						</div>
						<!-- post -->
						<?php $recent = $posts->sortByDesc('id')->take(6); ?>
						@foreach($recent as $rc)
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="{{route('post-detail', ['id'=>$rc->id, 'slug'=>$rc->slug])}}"><img src="{{asset('upload/post/'.$rc->feature_image)}}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="{{route('front-cate', ['id'=>$rc->category->id, 'slug'=>$rc->category->slug])}}">{{$rc->category->name}}</a>
									</div>
									<h3 class="post-title"><a href="{{route('post-detail', ['id'=>$rc->id, 'slug'=>$rc->slug])}}">{{$rc->title}}</a></h3>
									<ul class="post-meta">
										<li><a href="{{route('author', ['id'=>$rc->users->id])}}">{{$rc->users->name}}</a></li>
										<li>{{date('F j, Y, H:i a', strtotime($new1['created_at'])) }}</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /post -->
						@endforeach
						<!-- <div class="clearfix visible-md visible-lg"></div> -->
					</div>
					<!-- /row -->

					<!-- row -->
					<?php $catebf = $cate->sortBy('id')->take(3); ?>
					@foreach($catebf as $cate)
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">{{$cate->name}}</h2>
							</div>
						</div>
						<!-- post -->
						<?php $posts = $cate->posts->where('status', 3)->sortByDesc('created_at')->take(3);
						?>
						@foreach($posts as $post)
						<div class="col-md-4">
							<div class="post post-sm">
								<a class="post-img" href="{{route('post-detail', ['id'=>$post->id, 'slug'=>$post->slug])}}"><img src="{{asset('upload/post/'.$post->feature_image)}}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="{{route('front-cate', ['id'=>$post->category->id, 'slug'=>$post->category->slug])}}">{{$post->category->name}}</a>
									</div>
									<h3 class="post-title title-sm"><a href="{{route('post-detail', ['id'=>$post->id, 'slug'=>$post->slug])}}">{{$post->title}}</a></h3>
									<ul class="post-meta">
										<li><a href="{{route('author', ['id'=>$post->users->id])}}">{{$post->users->name}}</a></li>
										<li>{{date('F j, Y, H:i a', strtotime($post['created_at'])) }}</li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						<!-- /post -->
					</div>
					<!-- /row -->
					@endforeach

				</div>
@endsection
@section('content')
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ad -->
				<div class="col-md-12 section-row text-center">
					<a href="#" style="display: inline-block;margin: auto;">
						<img class="img-responsive" src="./img/ad-2.jpg" alt="">
					</a>
				</div>
				<!-- /ad -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<?php $catelw = $cate->whereIn('id', [7, 9, 10])->get(); ?>
				@foreach($catelw as $cat)
				<div class="col-md-4">	
					<div class="section-title">
						<h2 class="title">{{$cat->name}}</h2>
					</div>
					<!-- post -->
					<?php $posts = $cat->posts->where('status', 3)->sortByDesc('id')->take(4);
						  $post1 = $posts->shift();
					?>
					@if($post1)
					<div class="post">
						<a class="post-img" href="{{route('post-detail', ['id'=>$post1->id, 'slug'=>$post1->slug])}}"><img src="{{asset('upload/post/'.$post1->feature_image)}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{route('front-cate', ['id'=>$post1->category->id, 'slug'=>$post1->category->slug])}}">{{$post1->category->name}}</a>
							</div>
							<h3 class="post-title"><a href="{{route('post-detail', ['id'=>$post1->id, 'slug'=>$post1->slug])}}">{{$post1->title}}</a></h3>
							<ul class="post-meta">
								<li><a href="{{route('author', ['id'=>$post1->users->id])}}">{{$post1->users->name}}</a></li>
								<li>{{date('F j, Y, H:i a', strtotime($post1['created_at'])) }}</li>
							</ul>
						</div>
					</div>
					@endif
					@foreach($posts as $post)
					<div class="post post-widget">
						<a class="post-img" href="{{route('post-detail', ['id'=>$post->id, 'slug'=>$post->slug])}}"><img src="{{asset('upload/post/'.$post->feature_image)}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{route('front-cate', ['id'=>$post->category->id, 'slug'=>$post->category->slug])}}">{{$post->category->name}}</a>
							</div>
							<h3 class="post-title"><a href="blog-post.html">{{$post->title}}</a></h3>
						</div>
					</div>
					@endforeach
					<!-- /post -->
				</div>
				@endforeach
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
@endsection
	
