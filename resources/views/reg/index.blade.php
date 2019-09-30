<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
.loginlist li {
    list-style-type: none;
    display: inline-block;
    padding-left: 10px;
    background-color: #498694;
    padding: 6px;
    border-radius: 4px;
   
}

.loginlist li a { font-size: 15px;
    text-decoration: none;
}
.welcometxt h1 {
    font-size: 50px !important;
    color: #498694;
    border-color: #498694 !important;

}
.homelist li {
    width: 100%;
    max-width: 520px;
    list-style-type: none;
    /* height: 200px; */
    margin-left: 10px;
    text-align: center;
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
}
.homelist li a {
    color: #498694;
    font-size: 16px;
    text-decoration:none;
}
.price{ text-align position:absolute}

.upperheader {
    background-color: #e0dddd;
}
.paypal-btn{
    background: #ffc43a;
    border: none;
    border-radius: 25px;
    padding: 10px;
    color: #002c85;
    font-weight: bold;
}
</style>
</head>
<body>
    <div class="upperheader">
    <div class="container">
    <div class="row">
    <div class="offset-md-6 col-md-6 ">
    <ul class="loginlist float-right m-4">
    <li><a href="signin" class="text-white">Login</a></li>
    <li><a href="signup"  class="text-white">Registration</a></li>
    </ul>
    </div>
    </div>
<div class="row mt-5">
    <div class="col-md-12">
    <div class="welcometxt mt-5">
    
    <h1 class="text-center border-bottom"> WELCOME TO LARAVEL</h1>
    </div>
   </div>

    </div>

    <ul class="row mt-5 homelist ml-0 mr-0">

    @foreach($videos as $vdo)

    <?php //echo $vdo->video; die;
    
    ?>
    <?php  $url = Storage::url($vdo->video); ?>
    <li class="">  
    <video width="480" controls>
        <source src="<?php echo $url;?>" type="video/mp4" style="height:240px">
    </video> 
    <div class="video-content">
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="accounts@freelanceswitch.com">
        <input type="hidden" name="amount" value="{{$vdo->price}}">
        <input type="hidden" name="no_note" value="1">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="bn" value="PP-BuyNowBF">
        <input type="hidden" name="cancel_return" value="http://demo.expertphp.in/payment-cancel/">
   <input type="hidden" name="return" value="https://net.tutsplus.com/payment-complete/">
        <br />
        <input type="submit" value="Pay with PayPal!" class="paypal-btn">
    </form>
   
    <span class="price">$ {{$vdo->price}}</span> <br>
     <span class="title"> <b>{{$vdo->video_type}}</b> </span>
     </div>
     </li>

     @endforeach

    </ul>
    </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>