<?php //dd($Name);?>
<html>
<head> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
.btncls{
 background-color:#498694;    width: 100px;
}
.txtcolor{
  color:#498694;
}
.backbtn{
  background-color: #498694;
    padding: 4px;
    color: #fff;
    width: 60px;
    text-align: center;
}
.welcometxtcls h1 {
    font-size: 30px !important;
    color: #498694;
    border-color: #498694 !important;

}
</style>
</head>

<body>
<body style="background-color: #e0dddd;">
<div class="container">
<!-- <a href="index.php"  class="float-right backbtn">Back</a> -->
<div class="welcometxtcls">
<h1 class="text-center mt-4 txtcolor">Forgot password</h1>
</div>

          @if (session('status'))
          <div class="alert alert-success">
          {{ session('status') }}
          </div>
          @endif

<form method="POST" action="{{url('reg/userForgs')}}" class="forgotpwd p-4 w-50 mx-auto border mt-4 bg-white">
{{ csrf_field() }}


<div class="form-group">
    <label for="">Old Password</label>
    <input type="Password" class="form-control" value="" id="" name="old_password" placeholder="Enter Old password">
        
          @if ($errors->has('old_password'))
          <span class="help-block">
          <strong>{{ $errors->first('old_password') }}</strong>
          </span>
          @endif
    </div>



    <div class="form-group">
    <label for="">New Password</label>
    <input type="password" class="form-control" value="" id="" name="new_password" placeholder="Enter New password">
           
            @if ($errors->has('new_password'))
            <span class="help-block">
            <strong>{{ $errors->first('new_password') }}</strong>
            </span>
            @endif
    </div>


    <button type="submit" class="btn btn-primary btncls w-50">Change Password</button>
</form>
</html>