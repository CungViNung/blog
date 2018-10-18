<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript" src="../editor/ckeditor/ckeditor.js"></script>
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