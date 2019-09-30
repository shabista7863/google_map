<?php //dd($Name);?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
.loginlist li {
    list-style-type: none;
    display: inline-block;
    padding-left: 10px;
   
}

.loginlist li a {
    color: #323232; font-size: 16px;
}
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
</style>
</head>
<body style="background-color: #e0dddd;">
<div class="container">
<a class="btn btncls float-right text-white" style="cursor:pointer;" href="{{url('logout')}}">Logout</a>


<div class="container">

<div class="row mt-4">
    <div class="col-md-12">
    <div class="welcometxt mt-4">
    <ul class="loginlist text-center">
<li><a href="index"><button class="btn btncls text-white">Files Lists</button></a></li>
<li><a href="{{url('userVideos')}}"><button class="btn btncls text-white">Add Items</button></a></li>
</ul>
    <h1 class="text-center mt-5"> WELCOME  SCREEN {{ @session::get('name')}}</h1>
    </div>
   </div>

    </div>
    </div>
</body>

</html>