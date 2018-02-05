<?php
  include "dbcon.php";
?>

<html xmlns="http://www.w3.org/1999/xhtml">

		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">				
			<link rel="stylesheet" href="bootstrap/css/bootstrap.css">	
			<link rel="stylesheet" href="bootstrap.css">
			<link rel="stylesheet" href="css/bootstrap-theme.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">			
			<title> Customize your Invitation Card | Margareth's Catering </title>
			<link rel="icon" type="image/gif" href="logo_2.png"/>
			<style>

			</style>
		</head>

		<body>
			<div id="body-container" class="container-fluid bg-3 text-center">
				<nav class="navbar navbar-default navbar-fixed-top">
					<div class="container"style = "background-color:black; width:100%; cursor: pointer;">
						
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>                        
							</button>
							<a class="navbar-brand" href="Base.php"><img src="logo.png" style ="float:left ; width 40px;height :40px;padding-bottom :10px"></a>
						</div>
				
						<div class="collapse navbar-collapse" id="myNavbar"style = "width:100%;">
						
							<ul class ="nav navbar-nav navbar-right">
								<li><a href="#"> Home </a></li>
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
			</div>
			<h3>Customize your Tarpaulins</h3></br>
			<form class="form-horizontal" role="form" >
					<img src="inv.jpg" style="width:40%; height:280px">
						<h5> 

							<div class="form-group" >
								<label class="control-label col-sm-4">Size:</label>
								<select class="form-control control-label col-sm-4"  style="width: 120px; text-align:center">
									<option>12x5</option>
									<option>8x10</option>
									<option>2 Meters</option>
									<option>1 Meter</option>
								</select>
							</div>
							<div class="form-group" >
								<label class="control-label col-sm-4">Quantity:</label>
								<input type="num" required="Maximum of 200" class="form-control" id="numGuest" style="width: 120px" placeholder="quantity">
							</div>
							 <div class="form-group">
							<label class="control-label col-sm-4">Upload your pictures</label>
							<input type="file" id="exampleInputFile">
							</div>
							<div class="row">
							<button type="submit" class="snip1535"><a href="new 3.html"  style=" text-decoration:none; color:white"> Save </a></button>
							<button type="reset" class="snip1535"> Clear </button>
							
						</div>
							</form>
		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
				<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
		</body>
	</html>
