<!DOCTYPE html>
<html lang="en">

<head>
	{{--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />--}}
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DMCA App</title>

	<link href="{{ asset('/css/all.css') }}" rel="stylesheet">

</head>
<body>
	@include('flash::message')
	@include('partials.nav')

	<div class="container">
		@yield('content')
	</div>
 <?php
 	echo '<br>';
	$str = '提供';
	echo $str;
	echo '<br>';
	//$str = iconv("big5","UTF-8",$str); 
	//echo $str;
	echo '<br>';
	
	echo '<br>';
?>
	<div class="flash">
		Updated!
	</div>
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="/js/all.js"></script>
</body>
</html>
