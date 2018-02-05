<?php
  include "dbcon.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="stylesheet" href="bootstrap.css">	
			<title> Five Main Course </title>
			<link rel="icon" type="image/gif" href="logo_2.png"/>
		</head>

		<body background = "bg2.jpeg" align = "center">
			<div class="container-fluid">
				<nav class="navbar navbar-default navbar-fixed-top">
					<div class="container"style = "background-color:black; width:100%">
						
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>                        
							</button>
							
							<a class="navbar-brand" href="Base.php">  </a>
						</div>
				
						<div class="collapse navbar-collapse" id="myNavbar">
							<ul class="nav navbar-nav navbar-right">
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
								<li><a href="Contact.php"> Contact Us </a></li>
							</ul>
						</div>
					</div>
				</nav> </br> </br> </br> 
			</div>
			
			<div id="menu" align= "center">
				<h3> </br> MENU </h3>
				<h5>Choose 1 dish for every course</h5>
				<form>
				<div class = "col-md-3">
					<h3> Beef </h3>
					<img src="beef.jpe" width="267x" height="188px">
				
					<div class="checkbox" align = "left">
						<label><input type ="checkbox" value = "">Breaded Pork</label></br>
						<label><input type ="checkbox" value = "">Crispy Pata</label></br>
						<label><input type ="checkbox" value = "">Hamonado</label></br>
						<label><input type ="checkbox" value = "">Hawaian Pork</label></br>
						<label><input type ="checkbox" value = "">Lechon Kawali</label></br>
						<label><input type ="checkbox" value = "">Menudo</label></br>
						<label><input type ="checkbox" value = "">Pork Asado</label></br>
						<label><input type ="checkbox" value = "">Pork Barbecue</label></br>
						<label><input type ="checkbox" value = "">Sweet & Sour Pork</label></br>
					</div>
				</div>
				
				<div class = "col-md-3">
					<h3> Pork </h3>
					<img src="pork.jpg" width="267px" height="188px">
				
					<div class="checkbox" align = "left">
						<label><input type ="checkbox" value = "">Breaded Pork</label></br>
						<label><input type ="checkbox" value = "">Crispy Pata</label></br>
						<label><input type ="checkbox" value = "">Hamonado</label></br>
						<label><input type ="checkbox" value = "">Hawaian Pork</label></br>
						<label><input type ="checkbox" value = "">Lechon Kawali</label></br>
						<label><input type ="checkbox" value = "">Menudo</label></br>
						<label><input type ="checkbox" value = "">Pork Asado</label></br>
						<label><input type ="checkbox" value = "">Pork Barbecue</label></br>
						<label><input type ="checkbox" value = "">Sweet & Sour Pork</label></br>
					</div>
				</div>
				
				<div class = "col-md-3">
					<h3> Fish </h3>
					<img src="fish fillet.jpe" width="267x" height="188px">
				
					<div class="checkbox" align = "left">
						<label><input type ="checkbox" value = "">Shrimp Tempura</label></br>
						<label><input type ="checkbox" value = "">Shrimp with Garlic</label></br>
						<label><input type ="checkbox" value = "">Sweet and Sour Fish</label></br>
						<label><input type ="checkbox" value = "">Chopseuy</label></br>
					</div>
				</div>
				
				<div class = "col-md-3">
					<h3> Chicken </h3>
					<img src="fried chicken.jpg" width="267x" height="188px">
				
					<div class="checkbox" align = "left">
						<label><input type ="checkbox" value = "">Chicken Barbecue</label></br>
						<label><input type ="checkbox" value = "">Chicken Adobo</label></br>
						<label><input type ="checkbox" value = "">Chicken Fillet</label></br>
						<label><input type ="checkbox" value = "">Chicken Teriyaki</label></br>
						<label><input type ="checkbox" value = "">Cordon Blue</label></br></br></br></br></br>
					</div>
				</div>
				<div class = "col-md-3">
					<h3> Vegetables</h3>
					<img src="beef.jpe" width="267x" height="188px">
					
					<div class="checkbox" align = "left">
					<input type ="radio" name ="vegetables" value ="Buttered Corn" style ="width:80px">Buttered Corn & Carrots</br>
					<input type ="radio" name ="vegetables" value ="Chopsuey" style ="width:80px">Chopsuey</br>
					<input type ="radio" name ="vegetables" value ="Greenpeas" style ="width:80px">Greenpeas w/ Quail Eggs</br>
					<input type ="radio" name ="vegetables" value ="Lumpia" style ="width:80px">Lumpia Ubod</br>
					<input type ="radio" name ="vegetables" value ="Mixed Vegetables" style ="width:80px">Mixed Vegetables w/ oyster sauce</br>
				</div>
				</div>
				<div class = "col-md-3">
					<h3> Pasta</h3>
					<img src="beef.jpe" width="267x" height="188px">
					<div class="checkbox" align = "left">
					<input type ="radio" name ="pasta" value ="canton" style ="width:80px">Canton w/ Sotanghon</br>
					<input type ="radio" name ="pasta" value ="carbonara" style ="width:80px">Carbonara</br>
					<input type ="radio" name ="pasta" value ="Bihon" style ="width:80px">Pancit Bihon Pancit Canton</br>
					<input type ="radio" name ="pasta" value ="Malabon" style ="width:80px">Pancit Malabon</br>
					<input type ="radio" name ="pasta" value ="Sotanghon" style ="width:80px">Sotanghon</br>
					<input type ="radio" name ="pasta" value ="Spaghetti" style ="width:80px">Spaghetti</br>
				</div>
				</div>
				<div class = "col-md-3">
					<h3> Dessert</h3>
					<img src="beef.jpe" width="267x" height="188px">
					<div class="checkbox" align = "left">
					<input type ="radio" name ="dessert" value ="buko" style ="width:80px">Buko Pandan</br>
					<input type ="radio" name ="dessert" value ="salad" style ="width:80px">Fruit Salad</br>
					<input type ="radio" name ="dessert" value ="gelatin" style ="width:80px">Gelatin</br>
					<input type ="radio" name ="dessert" value ="Leche Flan" style ="width:80px">Leche Flan</br>
					<input type ="radio" name ="dessert" value ="Pastries" style ="width:80px">Pastries</br>
					<input type ="radio" name ="dessert" value ="Fruits" style ="width:80px">Fresh Fruits in Seasons</br>
				</div>
				</div>
				<div class = "col-md-3">
					<h3> Drinks</h3>
					<img src="beef.jpe" width="267x" height="188px"></br></br>
					<div class="radiogroup" align = "left">
					<input type ="radio" name ="drinks" value ="orange" style ="width:80px">Orange Juice</br>
					<input type ="radio" name ="drinks" value ="mango" style ="width:80px">Mango Juice</br>
					<input type ="radio" name ="drinks" value ="pineapple" style ="width:80px">Pineapple Juice</br>
					<input type ="radio" name ="drinks" value ="softdrinks" style ="width:80px">Soft Drinks</br></br></br>
				</div>
				<div class "col-md-3">				
					<button type="reset" class="btn btn-default"> Clear </button>
					<button type="submit" class="btn btn-default"><a href="new 3.html"> Save </a></button>
				</div>
				
			</div>
			</form>
		</body>
	</html>
