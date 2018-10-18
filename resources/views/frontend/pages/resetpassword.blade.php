@include('frontend.partials.head')
@include('frontend.partials.header')

<div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-offset-4" style="margin-top: 30px; border: 2px solid #ee4266; padding: 30px;">
                <h3>Reset Password</h3>
                <form action="" method="POST">
                    <label>Email</label>
                    <div class="form-group pass_show"> 
                        <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control"> 
                    </div> 
                    <label>New Password</label>
                    <div class="form-group pass_show"> 
                        <input type="password" name="password" class="form-control"> 
                    </div> 
                    <label>Confirm Password</label>
                    <div class="form-group pass_show"> 
                        <input type="password" name="password_confirmation" class="form-control"> 
                    </div>
                    <input type="submit" class="btn btn-danger" value="Reset Password">
                    {{csrf_field()}} 
                </form>
                
            </div>  
        </div>
    </div>
@include('frontend.partials.footer')
@include('frontend.partials.script')