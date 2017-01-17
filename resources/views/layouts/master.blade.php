<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
	<link rel="stylesheet" href="https://bootswatch.com/assets/css/custom.min.css">
	@yield('styles')
</head>
<body>
	@include('includes.header')
	<div class="container">
		@yield('content')
	</div>
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="https://bootswatch.com/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="https://bootswatch.com/assets/js/custom.js"></script>
</body>
</html>