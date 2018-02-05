<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="assets/paper_img/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		
		<title>Margareth's Catering</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	    <meta name="viewport" content="width=device-width" />

	    <!-- SweetAlert -->
	    <link href="{{ asset('sweetalert/dist/sweetalert.css') }}" rel="stylesheet"/>
	    
	    <link href="{{ asset('paperWeb/bootstrap3/css/bootstrap.css') }}" rel="stylesheet" />
	    <link href="{{ asset('paperWeb/assets/css/ct-paper.css') }}" rel="stylesheet"/>
	    <link href="{{ asset('paperWeb/assets/css/demo.css') }}" rel="stylesheet" /> 
	        
	    <!--     Fonts and icons     -->
	    <link href="{{ asset('http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('http://fonts.googleapis.com/css?family=Montserrat') }}" rel='stylesheet' type='text/css'>
	    <link href="{{ asset('http://fonts.googleapis.com/css?family=Open+Sans:400,300') }}" rel='stylesheet' type='text/css'>
	</head>

	<body>
		<nav class="navbar navbar-ct-transparent" role="navigation-demo" id="demo-navbar">
		  	<div class="container">
		    	<!-- Brand and toggle get grouped for better mobile display -->
		    	<div class="navbar-header">
		      		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
		        		<span class="sr-only">Toggle navigation</span>
		        		<span class="icon-bar"></span>
		        		<span class="icon-bar"></span>
		        		<span class="icon-bar"></span>
		      		</button>
		      
		      		<a href="UserHomePage">
		           		<div class="logo-container">
		                	<div class="brand">
		                    	<img src="../img/logo.png" alt="Creative Tim Logo" style="width: 250px; height: 70px">
		                	</div>
		            	</div>
		      		</a>
		    	</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
		    	<div class="collapse navbar-collapse" id="navigation-example-2">
		      		<ul class="nav navbar-nav navbar-right">
		          		<li>
		            		<a href="UserHomePage" class="btn btn-danger btn-simple">Home</a>
		          		</li>
		          		<li>
		            		<a href="UserPackagePage" class="btn btn-danger btn-simple">Package</a>
		          		</li>
		          		<li>
		            		<a href="UserDishPage" class="btn btn-danger btn-simple">Dish</a>
		          		</li>
		          		<li>
		            		<a href="UserServicePage" class="btn btn-danger btn-simple">Service</a>
		          		</li>
		          		<li>
		            		<a href="UserEquipmentPage" class="btn btn-danger btn-simple">Equipment</a>
		          		</li>
		          		<li>
		            		<a href="UserReservationPage" class="btn btn-danger btn-simple">Make a Reservation</a>
		          		</li>
		       		</ul>
		    	</div><!-- /.navbar-collapse -->
		  	</div><!-- /.container-->
		</nav> 
		@yield('content')

		<script src="{{ asset('paperWeb/assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
		<script src="{{ asset('paperWeb/assets/js/jquery-ui-1.10.4.custom.min.js') }}" type="text/javascript"></script>

		<script src="{{ asset('paperWeb/bootstrap3/js/bootstrap.js') }}" type="text/javascript"></script>
		
		<!--  Plugins -->
		<script src="{{ asset('paperWeb/assets/js/ct-paper-checkbox.js') }}"></script>
		<script src="{{ asset('paperWeb/assets/js/ct-paper-radio.js') }}"></script>
		<script src="{{ asset('paperWeb/assets/js/bootstrap-select.js') }}"></script>
		<script src="{{ asset('paperWeb/assets/js/bootstrap-datepicker.js') }}"></script>
		
		<script src="{{ asset('paperWeb/assets/js/ct-paper.js') }}"></script>

		@yield('scripts') 
	</body>
</html>