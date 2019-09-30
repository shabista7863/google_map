
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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
.custable th{
	font-size: 14px;
    font-weight: 600;
}
.custable td{
	font-size: 14px;
}
</style>


</head>

<body style="background-color: #e0dddd;">

<div class="container">

<p align="right"><a  href="{{url('userVideos')}}" class="btn btn-info btn-sm mt-3" >
		<span  class="glyphicon glyphicon-log-out btncls" ></span>Back
	</a>
</p>
<div class="welcometxtcls">
<h1 class="text-center mt-4 txtcolor">Video Lists</h1>
</div>
           
	<table class="custable table table-condensed table-bordered p-4 bg-white">
		<thead>
			<tr>
			
				<th>Sno.</th>
				<th>name</th>
				<th>email</th>
				<th>phone_no</th>		
				<th>Video_type</th>
				<th>Video_url</th>
				<th>Video_price</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php //print_r($users); die;?>
		<?php $i = 0; ?>
			@foreach($users as $key=>$usr) 
				<tr>
				<td>{{ $i }}</td>
				<?php $i++; ?>
				<td>{{$usr->name}} </td>
				<td>{{$usr->email}} </td>
				<td>{{$usr->phone_no}} </td>
				<td>{{$usr->video_type}} </td>
				<td>{{$usr->video_url}} </td>
				<td>{{$usr->price}} </td>
				<td>
            <a type="button" class="btn btn-sm btn-info" href="{{url('userVideos')}}">Update
            </a>
            <a type="button" class="btn btn-sm btn-danger" href="{{url('reg/video_list')}}">Delete
            </a>
        </td> 
			</tr>
			@endforeach
			
		</tr>
        </td>
		</tbody>
	</table>
</div>


</body>
</html>
