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
			<title> Home | Margareth's Catering </title>
			<link rel="icon" type="image/gif" href="img/logo_2.png">
			<style>

			</style>
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
				</nav></br></br>
				
    <div class="container">

        <div class="row">
            <div class="box" style ="background-color:black">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
							 <li data-target="#carousel-example-generic" data-slide-to="3"></li>
							  <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/cb.jpg" alt= "" style ="height:465px;width:460px">
                            </div>
							<div class="item">
                                <img class="img-responsive img-full" src="img/sp.jpg" alt="" style ="height:465px;width:460px">
                            </div>
							<div class="item">
                                <img class="img-responsive img-full" src="img/pas.jpeg" alt="" style ="height:465px;width:460px">
                            </div>
							<div class="item">
                                <img class="img-responsive img-full" src="img/bt.jpg" alt="" style ="height:465px;width:460px">
                            </div>
							<div class="item">
                                <img class="img-responsive img-full" src="img/le.jpg" alt="" style ="height:465px;width:460px">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name" style ="color:white">Margareth Catering Services</h1>
                    <hr class="tagline-divider">
					<button type = "submit" class = "btn-info"><a href="Reservation.html" style ="text-decoration:none; color:white"> Make a Reservation </a> </button>
                    </h2>
                </div>
            </div>
        </div>
    </div>
			<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
				<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
				      <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
		</body>
	</html>
