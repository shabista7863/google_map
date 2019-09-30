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
<a href="{{url('signin')}}"  class="float-right backbtn">Back</a>
<div class="welcometxtcls">
<h1 class="text-center mt-4 txtcolor">Updated Profile</h1>
</div>

<form method = "POST" action="{{url('userProf')}}" class="p-4 w-50 mx-auto border mt-4 bg-white">
{{ csrf_field() }}

<input type="hidden" name="id" value="<?php echo $profileDetails[0]->id ?? ''; ?>">

 @if (count($errors))
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<?php //dd($success);?>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif 


  <div class="form-group">
 
  <label for="exampleInputEmail1">Name</label>
  <input type="name" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" value="<?php echo $profileDetails[0]->name ?? ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp"  name="name" placeholder="Enter name"><br><br>
  <span class="text-danger">{{ $errors->first('name') }}</span>

  <label for="exampleInputEmail1">Email</label>
  <input type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" value="<?php echo $profileDetails[0]->email ?? ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email"><br><br>
  <span class="text-danger">{{ $errors->first('email') }}</span>

  <label for="exampleInputEmail1">Phone no</label>
  <input type="text" class="form-control {{ $errors->has('phone_no') ? 'has-error' : '' }}" value="<?php echo $profileDetails[0]->phone_no ?? ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone_no" placeholder="Enter phoneNo"><br><br>
   <span class="text-danger">{{ $errors->first('phone_no') }}</span>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" class="form-control {{ $errors->has('Password') ? 'has-error' : '' }}" value="<?php echo $profileDetails[0]->Password ?? ''; ?>" id="exampleInputPassword1" name="password" placeholder="Enter password"><br><br>
   <span class="text-danger">{{ $errors->first('Password') }}</span>

  </div>
  


  <button type="submit" class="btn btn-primary btncls">Submit</button>
  </div>
  </body>
</form>
</html>