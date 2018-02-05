<?php
  include "dbcon.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">

		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="stylesheet" href="bootstrap.css">
			<link rel="stylesheet" href="css/bootstrap-theme.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">			
			<title> Food | Margareth's Catering </title>
			<link rel="icon" type="image/gif" href="img/logo_2.png"/>
			<!-- Tell the browser to be responsive to screen width -->
		    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		    <!-- Bootstrap 3.3.6 -->
		    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		    <!-- Font Awesome -->
		    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		    <!-- Ionicons -->
		    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		    <!-- Theme style -->
		    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
		    <!-- AdminLTE Skins. Choose a skin from the css/skins
		    folder instead of downloading all of them to reduce the load. -->
		    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
		    <!-- iCheck -->
		    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
		    <!-- Morris chart -->
		    <link rel="stylesheet" href="plugins/morris/morris.css">
		    <!-- jvectormap -->
		    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		    <!-- Date Picker -->
		    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
		    <!-- Daterange picker -->
		    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
		    <!-- bootstrap wysihtml5 - text editor -->
		    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		    <link rel="stylesheet" href="dist_1/css/bootstrapValidator.css"/>
  			<!-- sweetalert -->
  			<script src="sweetalert-master/dist/sweetalert-dev.js"></script>
  			<link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css">
		</head>

		<body style="background-image:url(img/bg1.jpg); background-size: cover; background-attachment: fixed; background-position: center; background-repeat: no-repeat;">
			<div id="body-container" class="container-fluid bg-3 text-center">
				<nav class="navbar navbar-default navbar-fixed-top">
					<div class="container"style = "background-color:black; width:100%; cursor: pointer;">
						
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>    
													
							</button>
							
							<a class="navbar-brand" href="Base.php"><img src="img/logo.png" style ="float:left ; width 40px;height :40px;padding-bottom :10px"></a>			
						</div>
				
						<div class="collapse navbar-collapse" id="myNavbar"style = "background-color:black; width:100%">
						
							<ul class="nav navbar-nav navbar-right">
								<li><a href="base.php"> Home </a></li>
								
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">
										Menu <span class="caret"></span> </a> 
									<ul class="dropdown-menu">
										<li><a href="Package.php"> Packages </a></li>
										<li><a href="#"> Foods </a></li>
										<li><a href="Service.php"> Services </a></li> 
									</ul>
								</li>
									
								<li><a href="Reservation.php">Make a Reservation </a></li>
								<li><a href="Contact.php"> Contact Us </a></li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
			
			<div id="body-container" class="container-fluid bg-3" align = "center"> 
				
				
				
			</div>
			<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
				<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
				<script src="js/bootstrap.min.js"></script><!--                                                          JAVASCRIPTS                                          -->
			    <!-- jQuery 2.2.3 -->
			    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
			    <!-- jQuery UI 1.11.4 -->
			    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
			    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
			    <script>
			    $.widget.bridge('uibutton', $.ui.button);
			    </script>
			    <!-- Bootstrap 3.3.6 -->
			    <script src="bootstrap/js/bootstrap.min.js"></script>
			    <script src="bootstrap/js/validator.js"></script>
			    <!-- Morris.js charts -->
			    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
			    <script src="plugins/morris/morris.min.js"></script>
			    <!-- Sparkline -->
			    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
			    <!-- jvectormap -->
			    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
			    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
			    <!-- jQuery Knob Chart -->
			    <script src="plugins/knob/jquery.knob.js"></script>
			    <!-- daterangepicker -->
			    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
			    <script src="plugins/daterangepicker/daterangepicker.js"></script>
			    <!-- datepicker -->
			    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
			    <!-- Bootstrap WYSIHTML5 -->
			    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
			    <!-- Slimscroll -->
			    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
			    <!-- FastClick -->
			    <script src="plugins/fastclick/fastclick.js"></script>
				<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
			    <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

				<script src="bootstrap/js/bootstrap.min.js"></script>
		</body>
	</html>
