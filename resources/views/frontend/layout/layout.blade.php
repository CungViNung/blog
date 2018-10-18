<!DOCTYPE html>
<html lang="en">
@include('frontend.partials.head')
<body>
	<!-- HEADER -->
	@include('frontend.partials.header')
	<!-- /HEADER -->
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
		@yield('content')
<!-- FOOTER -->
@include('frontend.partials.footer')
<!-- /FOOTER -->

<!-- jQuery Plugins -->
@include('frontend.partials.script')
<script>
        function changeImg(input){
              //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
              if(input.files && input.files[0]){
                  var reader = new FileReader();
                  //Sự kiện file đã được load vào website
                  reader.onload = function(e){
                      //Thay đổi đường dẫn ảnh
                      $('#avatar').attr('src',e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);
              }
            }
            $(document).ready(function() {
              $('#avatar').click(function(){
                  $('#img').click();
              });
            });
      </script>
</body>

</html>