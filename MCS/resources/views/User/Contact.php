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
			<title> Contact | Margareth's Catering </title>
			<link rel="icon" type="image/gif" href="logo_2.png"/>
		</head>

		<body background = "bg4.jpeg" align = "center" >
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
							<li><a href="Base.php"> Home </a></li>
							
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									Menu <span class="caret"></span> </a> 
								<ul class="dropdown-menu">
									<li><a href="Package.php"> Packages </a></li>
									<li><a href="Food.php"> Foods </a></li>
									<li><a href="Service.php"> Services </a></li> 
								</ul>
							</li>
							
							<li><a href="Reservation.php">Make a Reservation </a></li>
							<li><a href="#"> Contact Us </a></li>
						</ul>
					</div>
				</div>
			</nav> </br> </br> 
		
			<div class="container-fluid" align = "center">
			
				<table>
					<tr>
						<td style = "padding: 20px"> <big> <big> <big> <big> <big> <big> Margareth's Catering </big> </big> </big> </big> </big> </big> </br>
							<span class="glyphicons glyphicons-time"></span> 9:00am to 5:00 pm | Monday to Saturday </br>
							<span class="glyphicon glyphicon-map-marker"></span> B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br>
							<span class="glyphicon glyphicon-phone"></span> 696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>
							<span class="glyphicon glyphicon-envelope"></span> margarethcateringservices@gmail.com </br> </br>
						
							<!-- Set height and width with CSS -->
							<div id="googleMap" style="height:350px;width:600px;"></div>

							<!-- Add Google Maps -->
							<script src="http://maps.googleapis.com/maps/api/js"></script>
							
							<script>
								var myCenter = new google.maps.LatLng(14.6955, 121.1215);

								function initialize() {
									var mapProp = {
										center:myCenter,
										zoom:12,
										scrollwheel:false,
										draggable:false,
										mapTypeId:google.maps.MapTypeId.ROADMAP
									};

									var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

									var marker = new google.maps.Marker({
										position:myCenter,
									});

									marker.setMap(map);
								}

								google.maps.event.addDomListener(window, 'load', initialize);
							</script>
						</td>
						
						<td style = "padding: 30px"> <big> <big> <big> Send us feedback! </big> </big> </big> </br> </br>
							<div class="form-group">
								<label for="pwd"> Full name: </label>
								<input type="text" class="form-control" style="width: 300px;">
							</div>
							
							<div class="form-group">
								<label for="pwd"> Email address: </label>
								<input type="email" class="form-control" style="width: 300px;">
							</div>
							
							 <div class="form-group">
							<label>Comment:</label>
							<textarea class="form-control" rows="3" placeholder="Suggestions,Comments here"></textarea>
							</div>
					
							<button type="submit" class="snip1535"> Send </a> </button> 
							</br> </br> </br> </br> </td>
				</table>
			</div>
			<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
				<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
		</body>
	</html>


