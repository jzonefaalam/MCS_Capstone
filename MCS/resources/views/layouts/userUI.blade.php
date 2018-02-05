<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="{{ asset('USER_UI/bootstrap/css/bootstrap.min.css') }}">				
		<link rel="stylesheet" href="{{ asset('USER_UI/bootstrap/css/bootstrap.css') }}">	
		<link rel="stylesheet" href="{{ asset('USER_UI/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ asset('USER_UI/bootstrap1.css') }}">
		<link rel="stylesheet" href="{{ asset('USER_UI/css/bootstrap-theme.min.css') }}">
		<link href="{{ asset('USER_UI/business-casual.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}">
		
		
		<title> Home | Margareth's Catering </title>
		<link rel="icon" type="image/gif" href="img/logo_2.png">
	</head>

<body style = "background-image:url(img/bg.jpg); background-size: cover; background-attachment: fixed; background-position: center; background-repeat: no-repeat;">
	<div id="body-container" class="container-fluid bg-3 text-center">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container" style = "background-color:black; width:100%; cursor: pointer;">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>       
					</button>
					<a class="navbar-brand" href="Base.php"><img src="img/logo.png" style ="float:left ; width 40px;height :40px;padding-bottom :10px"></a>
				</div>
			<div class="collapse navbar-collapse" id="myNavbar"style = "width:100%;">
				<ul class ="nav navbar-nav navbar-right">
					<li>
						<a href="UserBasePage"> Home </a>
					</li>
					<li class="dropdown">
						<a class="dropdown" data-toggle="dropdown" type="button">Menu <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="Package.php"> Packages </a></li>
							<li><a href="Food.php"> Foods </a></li>
							<li><a href="Service.php"> Services </a></li>
						</ul>
					</li>
					<li><a href="UserReservationPage">Make a Reservation </a></li>
					<li><a href="UserAboutPage"> Contact Us </a></li>
				</ul>
			</div>
			</div>
		</nav><br><br>
	</div>
	<!-- Body -->
	@yield('contents')
	<!-- End Body -->

	<script src="{{ asset('USER_UI/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
	<script src="{{ URL::asset('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('USER_UI/js/bootstrap.min.js') }}">
		
	</script><script src="{{ asset('USER_UI/dist/js/app.min.js') }}"></script>
	    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	    <script src="{{ asset('USER_UI/dist/js/pages/dashboard.js') }}"></script>
	    <!-- AdminLTE for demo purposes -->
	    <script src="{{ asset('USER_UI/dist/js/demo.js') }}"></script>
	    <!-- 
	    <script type="text/javascript" src="vendor/jquery/jquery-1.10.2.min.js"></script>
	    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="dist_1/js/bootstrapValidator.js"></script> -->
		<!--   Core JS Files   -->
	    <script src="{{ asset('USER_UI/assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('USER_UI/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('USER_UI/assets/js/jquery.bootstrap.js') }}" type="text/javascript"></script>
		<script src="{{ asset('USER_UI/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
		<script src="(( asset('USER_UI/https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') }}"></script>
		<script src="{{ asset('USER_UI/js/bootstrap.min.js') }}"></script>
		<!--  Plugin for the Wizard -->
		<script src="{{ asset('USER_UI/assets/js/material-bootstrap-wizard.js') }}"></script>

	    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
		<script src="{{ asset('USER_UI/assets/js/jquery.validate.min.js') }}"></script>
	@yield('scripts')

</body>
</html>
