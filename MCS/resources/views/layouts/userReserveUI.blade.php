<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
		<link rel="icon" type="image/png" href="assets/img/favicon.png" />
		<title>Margareth's Catering</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	    <meta name="viewport" content="width=device-width" />

		
		<!-- Form Wizard CSS Files -->
	    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
		<link href="{{ asset('assets/css/paper-bootstrap-wizard.css')}}" rel="stylesheet" />

		<!-- CSS Just for demo purpose, don't include it in your project -->
		<link href="{{ asset('assets/css/demo.css')}}" rel="stylesheet" />


		<!-- Fonts and Icons -->
	    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
		<link href="assets/css/themify-icons.css" rel="stylesheet">
		


		<!-- Full Calendar -->		
		<link href="{{ asset('fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet" media="print" />


		<!-- Validator -->		
		<link rel="stylesheet" type="text/css" href="{{ asset('validator/dist/css/bootstrapValidator.css') }}"/>

		<!--     Fonts and icons     -->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
		


	</head>

<body style = "background-image:url(img/bg1.jpg); background-size: cover; background-attachment: fixed; background-position: center; background-repeat: no-repeat">
		<div class="container-fluid">

			<!-- <nav class="navbar navbar-default navbar-fixed-top" style="background-color:black;">
				<div class="container" style = "background-color:black; width:100%; cursor: pointer;">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="navbar-brand" href="Base.php"><img src="img/logo.png" style ="float:left ; width 40px;height :40px;padding-bottom :10px"></a>
					</div>

					<div class="collapse navbar-collapse" id="myNavbar" style = "background-color:black; width:100%">
						<ul class ="nav navbar-nav navbar-right">
							<li><a href="UserBasePage"> Home </a></li>

							<li class="dropdown">
								<a class="dropdown-toggle" type = "button" data-toggle="dropdown">
									Menu <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="UserPackagePage"> Packages </a></li>
									<li><a href="UserDishPage"> Dishes </a></li>
									<li><a href="UserServicePage"> Services </a></li>
								</ul>
							</li>

							<li><a href="UserReservationPage">Make a Reservation </a></li>
							<li><a href="UserAboutPage"> Contact Us </a></li>
						</ul>
					</div>
				</div>
			</nav> -->
	</div>
	<!-- Body -->
	@yield('contents')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script> 
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script> 

	
	
	<!-- Full Calendar -->

	<!--   Core JS Files   -->
	<script src="{{ asset('paper/assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/fullcalendar/lib/jquery.min.js')}}"></script>
	<script src="{{ asset('/fullcalendar/lib/moment.min.js')}}"></script>
	<script src="{{ asset('/fullcalendar/fullcalendar.min.js')}}"'></script>
	<script src="{{ asset('/fullcalendar/gcal.min.js')}}"></script>
	<script src="{{ asset('paper/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('paper/assets/js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="{{ asset('paper/assets/js/paper-bootstrap-wizard.js') }}" type="text/javascript"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="{{ asset('paper/assets/js/jquery.validate.min.js') }}"></script>

	<script src="{{ asset('LTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('LTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
	<!--  Plugin for the Wizard -->
	@yield('scripts')

</body>
</html>
