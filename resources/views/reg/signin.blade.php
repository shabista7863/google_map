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
<body style="background-color: #e0dddd;">
<div class="container">
<a href="index.php"  class="float-right backbtn">Back</a>
<div class="welcometxtcls">
<h1 class="text-center mt-4 txtcolor">LogIn Form</h1>
</div>

@if (count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session::has('error'))
    <p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif

<?php //dd(isset($message));?>
<!-- @if (isset($message) )
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif  -->



<form method = "POST" action="{{url('userLogin')}}" class="p-4 w-50 mx-auto border mt-5 bg-white">
{{ csrf_field() }}




  <div class="form-group">
  <label for="exampleInputEmail1">Email</label>
  <input type="name" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Enter email" value=""><br><br>
  <!-- @if ($errors->has('email')) -->
      <span class="text-danger">{{ $errors->first('name') }}</span>
   <!-- @endif -->
  <label for="exampleInputEmail1">Email</label>
  <input type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email" value=""><br><br>
  <!-- @if ($errors->has('email')) -->
      <span class="text-danger">{{ $errors->first('email') }}</span>
   <!-- @endif -->

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control {{ $errors->has('password') ? 'has-error' : '' }}" id="exampleInputPassword1" name="password" placeholder="Enter password" value=""><br><br>
    <!-- @if ($errors->has('password')) -->
    <span class="text-danger">{{ $errors->first('password') }}</span>
    <!-- @endif -->
  </div>
  
  <button type="submit" class="btn btn-primary btncls">Login</button>
  <a href="{{url('userForgs')}}" class="forgotpwd">Forgot Password?</a>
  </div>
</body>
</form>
</html>