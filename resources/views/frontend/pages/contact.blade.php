@extends('frontend.layout.single')
@section('page-header')
		<!-- PAGE HEADER -->
		<div class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase">Contacts</h1>
						<p class="lead">Đây chỉ là demo</p>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
@endsection
@section('main')
				<div class="col-md-8">
					<div class="section-row">
						<div class="section-title">
							<h2 class="title">Thông tin liên hệ</h2>
						</div>
						<p>Mọi thông tin xin liên hệ: </p>
						<ul class="contact">
							<li><i class="fa fa-phone"></i> 0976.420.055</li>
							<li><i class="fa fa-envelope"></i> <a href="#">leduchuy191197@gmail.com</a></li>
							<li><i class="fa fa-map-marker"></i> 23 Thái Hà, Đống Đa, Hà Nội</li>
						</ul>
					</div>
				</div>
@endsection