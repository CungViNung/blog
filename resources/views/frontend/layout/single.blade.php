<!DOCTYPE html>
<html lang="en">
@include('frontend.partials.head')
<body>
	<!-- HEADER -->
	@include('frontend.partials.header')
    <!-- /HEADER -->
        @yield('page-header')
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					@yield('main')
					@include('frontend.partials.aside')
				</div>
			</div>
		</div>
<!-- FOOTER -->
@include('frontend.partials.footer')
<!-- /FOOTER -->

<!-- jQuery Plugins -->
@include('frontend.partials.script')

</body>

</html>