<div class="col-md-4">
	<!-- ad widget-->
	<div class="aside-widget text-center">
		<a href="#" style="display: inline-block;margin: auto;">
			<img class="img-responsive" src="./img/ad-3.jpg" alt="">
		</a>
	</div>
	<!-- /ad widget -->

	<!-- social widget -->
	<div class="aside-widget">
		<div class="section-title">
			<h2 class="title">mạng xã hội</h2>
		</div>
		<div class="social-widget">
			<ul>
				<li>
					<a href="#" class="social-facebook">
						<i class="fa fa-facebook"></i>
						<span>21.2K<br>Followers</span>
					</a>
				</li>
				<li>
					<a href="#" class="social-twitter">
						<i class="fa fa-twitter"></i>
						<span>10.2K<br>Followers</span>
					</a>
				</li>
				<li>
					<a href="#" class="social-google-plus">
						<i class="fa fa-google-plus"></i>
						<span>5K<br>Followers</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /social widget -->

	<!-- category widget -->
	<div class="aside-widget">
		<div class="section-title">
			<h2 class="title">danh mục</h2>
		</div>
		<div class="category-widget">
			<ul>
				@foreach($cates as $cate)
				<li><a href="{{route('front-cate', ['id'=>$cate->id, 'slug'=>$cate->slug])}}">{{$cate->name}} <span>{{$cate->posts->count()}}</span></a></li>
				@endforeach
			</ul>
		</div>
	</div>
	<!-- /category widget -->


	<!-- post widget -->
	<div class="aside-widget">
		<div class="section-title">
			<h2 class="title">Được xem nhiều</h2>
		</div>
		<!-- post -->
		@foreach($posts as $post)
		<div class="post post-widget">
			<a class="post-img" href="{{route('post-detail', ['id'=>$post->id, 'slug'=>$post->slug])}}"><img src="{{asset('upload/post/'.$post->feature_image)}}" alt=""></a>
			<div class="post-body">
				<div class="post-category">
					<a href="{{route('front-cate', ['id'=>$post->category->id, 'slug'=>$post->category->slug])}}">{{$post->category->name}}</a>
				</div>
				<h3 class="post-title"><a href="{{route('post-detail', ['id'=>$post->id, 'slug'=>$post->slug])}}">{{$post->title}}</a></h3>
				<p><i class="fa fa-eye"></i> {{$post->view}} lượt xem</p>
			</div>
		</div>
		@endforeach
		<!-- /post -->
	</div>
	<!-- /post widget -->
</div>