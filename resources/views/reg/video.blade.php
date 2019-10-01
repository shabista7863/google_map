<?php //dd($videoDetails[0]->video_type);?>
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
<a href="{{url('userProf',Session::get('id'))}}"  class=" ml-3 float-right backbtn">Edit</a>
 <a href="{{url('logout')}}"  class="float-right backbtn">Logout</a> 

<div class="welcometxtcls">
<h1 class="text-center mt-4 txtcolor">Add Video</h1>
</div>


<ul class="loginlist">
<li><a href="{{url('reg/video_list')}}"  class="btn btncls text-white" >Video List</a></li>
<!-- <li><a href="{{url('videoInsert')}}"  class="btn btncls text-white" >Home</a></li>  -->
<li><a href="{{url('')}}"  class="btn btncls text-white" >Home</a></li>   
</ul>


<form method = "POST" action="{{url('userVideos')}}" enctype='multipart/form-data' class="bg-white p-4 w-50 mx-auto border mt-4">
{{ csrf_field() }}
<input type="hidden" name="id" value="<?php echo $videoDetails[0]->id ?? ''; ?>">

<!-- 
@if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        </div>
@endif -->

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
 <label for="">Video Type</label>
 <input type="text" name="video_type" id="" placeholder="Video Type" value="<?php echo $videoDetails[0]->video_type ?? ''; ?>" class="form-control ">
 </div>
 <div class="form-group">
 <label for="">Video Url</label>
 <input type="text" name="video_url" id="" placeholder="Video URL"  value="<?php echo $videoDetails[0]->video_url ?? ''; ?>" class="form-control">
 </div>

 <div class="form-group">
 <label for="">Price</label>
 <input type="text" name="price" id="" placeholder="Video Price" value="<?php echo $videoDetails[0]->price ?? ''; ?>"  class="form-control">
 </div>

 <div class="form-group">
 <label for="">Files Upload</label>
 <input type="file" name="video" id="" placeholder="Video Type" value="{{ old('video') }}">
 </div>

 <button type="submit" class="btn btncls text-white">save</button>
</form>
</body>

</html>