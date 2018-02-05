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
			<title> Services | Margareth's Catering </title>
			<link rel="icon" type="image/gif" href="img/logo_2.png"/>
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
				
						<div class="collapse navbar-collapse" id="myNavbar">
						<ul class ="nav navbar-nav navbar-right">
								<li><a href="base.php"> Home </a></li>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">
										Menu <span class="caret"></span> </a> 
									<ul class="dropdown-menu">
										<li><a href="Package.php"> Packages </a></li>
										<li><a href="Food.php"> Foods </a></li>
										<li><a href="#"> Services </a></li> 
									</ul>
								</li>
									
								<li><a href="Reservation.php">Make a Reservation </a></li>
								<li><a href="Contact.php"> Contact Us </a></li>
							</ul>
						</div>
					</div>
				</nav>
			</div></br></br>

			<div class="container-fluid text-center">
				<big style = "color:white"> S E R V I C E S </big> </br>
				
				<div class = "row"  style = "color:white"></br>
					<div class = "col-sm-3">
						<figure class="snip1581"><img src = "img/inv.jpg" style = "width: 280px; height: 200px"></figure>
						<h4> Invitations </h4>
					</div>
				
					<div class = "col-sm-3">
						<figure class="snip1581"><img src = "img/logo_2.png" style = "width: 280px; height: 200px"></figure>
						<h4> Tarpauline </h4>
					</div>
					
					<div class = "col-sm-3">
						<figure class="snip1581"><img src = "img/flower.jpeg" style = "width: 280px; height: 200px"></figure>
						<h4> Flower Entourage </h4>
					</div>
					
					<div class = "col-sm-3">
						<figure class="snip1581"><img src = "img/sound.jpg" style = "width: 280px; height: 200px"></figure>
						<h4> Sound Mobile </h4>
					</div>
				</div> </br> </br>
				
				<div class = "row" style = "color:white">
					<div class = "col-sm-3">
						<figure class="snip1581"><img src = "img/balloons.png" style = "width: 280px; height: 200px"></figure>
						<h4> Balloons </h4>
					</div>
				
					<div class = "col-sm-3">
						<figure class="snip1581"><img src = "img/clowns.jpg" style = "width: 280px; height: 200px"></figure>
						<h4> Clown </h4>
					</div>
					
					<div class = "col-sm-3">
						<figure class="snip1581"><img src = "img/mc.jpg" style = "width: 280px; height: 200px"></figure>
						<h4> Host/MC </h4>
					</div>
					
					<div class = "col-sm-3">
						<figure class="snip1581"><img src = "img/ogo_2.png" style = "width: 280px; height: 200px"></figure>
						<h4> Kitchen Utensils </h4>
					</div>
				</div>
				
			</div>
		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
				<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
		</body>
	</html>
