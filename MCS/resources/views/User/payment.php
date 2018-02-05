<?php
  include "dbcon.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">

		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">				
			<link rel="stylesheet" href="bootstrap/css/bootstrap.css">	
			<link rel="stylesheet" href="bootstrap.css">
			<link rel="stylesheet" href="bootstrap1.css">
			<link rel="stylesheet" href="css/bootstrap-theme.min.css">
			<link href="business-casual.css" rel="stylesheet">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">			
			<title> Payment| Margareth's Catering </title>
			<link rel="icon" type="image/gif" href="img/logo_2.png">
			<style>

			</style>
		</head>

		<body style = "background-image:url(img/bg1.jpg); background-size: cover; background-attachment: fixed; background-position: center; background-repeat: no-repeat;">
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
				
						<div class="collapse navbar-collapse" id="myNavbar"style = "width:100%;">
						
							<ul class ="nav navbar-nav navbar-right">
								<li><a href="Base.php"> Home </a></li>
								<li class="dropdown">
								<a class="dropdown" data-toggle="dropdown" type = "button" >
									Menu <span class="caret"></span></a>
								<ul class="dropdown-menu">
								<li><a href="Package.php"> Packages </a></li>
									<li><a href="Food.php"> Foods </a></li>
									<li><a href="Service.php"> Services </a></li></ul> 
								<li><a href="Reservation.php">Make a Reservation </a></li>
								<li><a href="Contact.php"> Contact Us </a></li>
							</ul>
						</div>
					</div>
				</nav>
				<div id="body-container" class="container-fluid bg-3" align = "center"> </br> 
				<h3> <big> Payment Method </big> </h3> </br>
				<div id="pricing" class="container-fluid">
					<div class="row slideanim col-sm-12">
						<div class=" col-xs-4">
							<div class="panel panel-default text-center">
								<div class="panel-heading">
									<h1> Bank </h1>
									
								</div>
       
								<div class="panel-body">
									
									<p><strong> Merchant Name: </strong> Margareth Catering Services </p>
									<p><strong> Clearing Account No. </strong> 0682-2220-18</p>
									<p><strong> Reference No: </strong> 201403754MN0 </p>
									<p><strong> Total Amount Due: </strong> P21,375 </p>
									<p><strong> Bank Service Fee: </strong> P25.00 </p>
								</div>
        
								<div class="panel-footer">
									<button class="btn-lg"><a href="Reservation_4.html" style ="text-decoration:none"> Confirm </a></button>
								</div>
							</div>      
						</div>  
						
						<div class="col-xs-4">
							<div class="panel panel-default text-center">
								<div class="panel-heading">
									<h1> Money Remitance</h1>
									<p><strong> You can pay at Palawan Express or Smart Padala </strong></p>
								</div>
							
								<div class="panel-body">
								
									<p><strong> At this Contact Number </strong> 0907-208-3331  </p>
									<p><strong> Total Bill </strong> P10,000 </p>
									<p><strong> Service Charge </strong> P20.00 </p>
									
								</div>
			
								<div class="panel-footer">
									<button class="btn-lg"><a href="Reservation_4.html" style ="text-decoration:none"> Confirm </a></button>
								</div>
							</div>      
						</div>
					<div class="col-xs-4">
							<div class="panel panel-default text-center">
								<div class="panel-heading">
									<h1> Cash</h1>
									<p><strong> Visit us at our place </strong></p>
								</div>
							
								<div class="panel-body">
								
									<p><strong> B4 L5 Ph7 JP Rizal St., New San Mateo Subd.,</strong></p>
									<p><strong> Gitnangbayan I, San Mateo, Rizal  </strong> </p>
									<p><strong> Contact us at:</strong>(+63) 907-208-3331  </p>
									<p><strong> Or Email us at: </strong> margarethcateringservices@gmail.com   </p>
									
								</div>
			
								<div class="panel-footer">
									<button class="btn-lg"><a href="Reservation_4.html" style ="text-decoration:none"> Confirm </a></button>
								</div>
							</div>      
						</div>   						
				</div>
			</div>
			<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
				<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
		</body>
	</html>
