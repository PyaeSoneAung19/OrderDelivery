<!DOCTYPE html>
<html>
<head>
	<title> Order Successful </title>
    <link rel="stylesheet" href="{{asset('Frontend/vendor/bootstrap/css/bootstrap.min.css')}}">

</head>
<body>
	<div class="justify-content-center text-center my-5">
		<h1 class="text-info"> Order Successful Message </h1>
		<img src="{{asset('ordersuccess.png') }}" style="width: 15%;" class="img-fluid my-5"> <br>
		<a href="{{ route('index') }}" class="btn mainfullbtncolor btn-secondary px-3 mt-3" > 
			<i class="icofont-shopping-cart"></i>
			Go Back		
		</a>
	</div>
</body>
</html>