<?php
  include "dbcon.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">

		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="stylesheet" href="bootstrap.css">	
			<title> Menu | Margareth's Catering </title>
			<link rel="icon" type="image/gif" href="logo_2.png"/>
		</head>

		<body style= "background-color: #f6f2e6">
			<div class="container-fluid">
			
				<nav class="navbar navbar-default navbar-fixed-top">
					<div class="container">
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
								
								<li><a href="Reservation.php"> Reservation </a></li>
								<li><a href="Contact.php"> Contact Us </a></li>
						</div>
					</div>
				</nav>
			</div>
			
			<div id="body-container" class="container-fluid bg-3" align = "center"> </br> </br> </br>
				<h3> <b> PACKAGES </b> </h3> </br>
				
				<!-- DIFFERENT PACKAGES -->
				<table border = "3px">
				
					<tr align = "center">
						<td style = "padding: 10px"> <big> <big> <big> Full Service </big> </big> </big> <br>
							<i> Php 53, 350.00 </i> <br>
							<big> (Beef, Pork, Chicken, Fish, Vegetable, Rice, Pasta, Desserts, Drinks, Others) </big> </td>
							
						<td style = "padding: 10px"> <big> <big> <big> 5 Main Course </big> </big> </big> <br>
							<i> Php 36, 560.00 </i> <br>
							<big> (Beef, Pork, Chicken, Fish, Vegetable, Rice, Pasta, Desserts, Drinks) </big> </td>
					</tr>
				
					<tr align = "center">
						<td style = "padding: 10px"> <big> <big> <big> 4 Main Course </big> </big> </big> <br>
							<i> Php 26, 530.00 </i> <br>
							<big> (Pork, Chicken, Fish, Vegetable, Rice, Pasta, Desserts, Drinks) </big> </td>
						
						<td style = "padding: 10px"> <big> <big> <big> 3 Main Course </big> </big> </big> <br>
							<i> Php 21, 650.00 </i> <br>
							<big> (Chicken, Fish, Vegetable, Rice, Pasta, Desserts, Drinks) </big> </td>
					</tr>
				
				</table> </br>
				
				<!-- BEEF DISHES -->
				<table align = "center">
				
					<tr>
						<td colspan = "4" align = "center"> <big> <big> B E E F </big> </big> </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px" align = "center"> <img src = "bwb.jpg" width = "250px" height = "150px"> </br>
							Beef w/ Broccoli </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bwm.jpg" width = "250px" height = "150px"> </br>
							Beef w/ Mushroom </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Beef Kaldereta w/ </br> Potatoes & Carrots</td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bt.jpg" width = "250px" height = "150px"> </br>
							Beef Teriyaki </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px"> </br>
							</td>
							
						<td style = "padding: 10px" align = "center"> <img src = "kk.jpg" width = "250px" height = "150px"> </br>
							Kare-kare </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "le.jpg" width = "250px" height = "150px"> </br>
							Lengua Estofado </td>
							
						<td style = "padding: 10px"> </br>
							</td>
					</tr>
					
				</table> </br> </br>
				
				<!-- PORK DISHES -->				
				<table align = "center">
				
					<tr>
						<td colspan = "4" align = "center"> <big> <big> P O R K </big> </big> </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Barbeque Liempo </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bp.jpg" width = "250px" height = "150px"> </br>
							Breaded Pork </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "cpa.jpeg" width = "250px" height = "150px"> </br>
							Crispy Pata </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "h.jpg" width = "250px" height = "150px"> </br>
							Hamonado </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px" align = "center"> <img src = "hp.jpg" width = "250px" height = "150px"> </br>
							Hawaiian Pork </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "lk.jpg" width = "250px" height = "150px"> </br>
							Lechon Kawali </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "m.jpg" width = "250px" height = "150px"> </br>
							Menudo </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "pa.jpg" width = "250px" height = "150px"> </br>
							Pork Asado </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px" align = "center"> <img src = "pb.jpg" width = "250px" height = "150px"> </br>
							Pork Barbeque </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Pork Roll </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "ssp.jpg" width = "250px" height = "150px"> </br>
							Sweet & Sour Pork </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Tofu Con Lechon </td>
					</tr>
					
				</table> </br> </br>
				
				<!-- CHICKEN DISHES -->
				<table align = "center">
				
					<tr>
						<td colspan = "4" align = "center"> <big> <big> C H I C K E N </big> </big> </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Breaded Chicken Fillet </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "cad.jpeg" width = "250px" height = "150px"> </br>
							Chicken Adobo </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "cb.jpg" width = "250px" height = "150px"> </br>
							Chicken Barbeque </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Chicken w/ Pickles </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Chicken w/ Pineapple </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "cte.jpeg" width = "250px" height = "150px"> </br>
							Chicken Teriyaki </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "cbl.jpg" width = "250px" height = "150px"> </br>
							Cordon Bleu </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "fch.jpg" width = "250px" height = "150px"> </br>
							Fried Chicken </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px" align = "center"> </br>
							 </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Chicken Ala Orange </td>
							
						<td style = "padding: 10px" align = "center"> </br>
							 </td>
							
						<td style = "padding: 10px" align = "center"> </br>
							 </td>
					</tr>
					
				</table> </br> </br>
						
				<!-- FISH DISHES -->
				<table align = "center">
				
					<tr>
						<td colspan = "4" align = "center"> <big> <big> F I S H </big> </big> </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Fish Fillet w/ Tartar Sauce </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "swg.jpg" width = "250px" height = "150px"> </br>
							Shrimp w/ Garlic </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "st.jpg" width = "250px" height = "150px"> </br>
							Shrimp Tempura </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "ssf.jpg" width = "250px" height = "150px"> </br>
							Sweet & Sour Fish Fillet </td>
					</tr>
					
				</table> </br> </br>
				
				<!-- VEGETABLE DISHES -->
				<table align = "center">
				
					<tr>
						<td colspan = "4" align = "center"> <big> <big> V E G E T A B L E </big> </big> </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px" align = "center"> <img src = "bcc.jpg" width = "250px" height = "150px"> </br>
							Buttered Corn & Carrots </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "ch.jpg" width = "250px" height = "150px"> </br>
							Chopsuey </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "gqe.jpg" width = "250px" height = "150px"> </br>
							Greenpeas w/ Quail Eggs </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Lumpia Ubod </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px"> </br>
							</td>
							
						<td style = "padding: 10px" align = "center"> <img src = "mv.jpg" width = "250px" height = "150px"> </br>
							Mixed Vegetables w/ </br> Oyster Sauce </td>
							
						<td style = "padding: 10px" align = "center"> </br>
							 </td>
							
						<td style = "padding: 10px"> </br>
							</td>
					</tr>
					
				</table> </br> </br>
				
				<!-- PASTA DISHES -->
				<table align = "center">
				
					<tr>
						<td colspan = "4" align = "center"> <big> <big> P A S T A </big> </big> </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px" align = "center"> <img src = "cws.jpg" width = "250px" height = "150px"> </br>
							Canton w/ Sotanghon </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Carbonara </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Pancit Bihon </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Pancit Canton </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px" align = "center"> <img src = "pma.jpg" width = "250px" height = "150px"> </br>
							Pancit Malabon </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "so.jpg" width = "250px" height = "150px"> </br>
							Sotanghon </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "sp.jpg" width = "250px" height = "150px"> </br>
							Spaghetti </td>
							
						<td style = "padding: 10px"> </br>
							</td>
					</tr>
					
				</table> </br> </br>
				
				<!-- DESSERTS -->
				<table align = "center">
				
					<tr>
						<td colspan = "4" align = "center"> <big> <big> D E S S E R T </big> </big> </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px" align = "center"> <img src = "bpa.jpg" width = "250px" height = "150px"> </br>
							Buko Pandan </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "frs.jpg" width = "250px" height = "150px"> </br>
							Fruit Salad </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "gel.jpg" width = "250px" height = "150px"> </br>
							Gelatin </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Leche Flan </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px"> </br>
							 </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "pas.jpeg" width = "250px" height = "150px"> </br>
							Pastries </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "fr.jpg" width = "250px" height = "150px"> </br>
							Fresh Fruits in Season </td>
							
						<td style = "padding: 10px"> </br>
							</td>
					</tr>
					
				</table> </br> </br>
				
				<!-- DRINKS -->
				<table align = "center">
			
					<tr>
						<td colspan = "4" align = "center"> <big> <big> D R I N K S </big> </big> </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px" align = "center"> <img src = "ict.jpg" width = "250px" height = "150px"> </br>
							Iced Tea </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Orange Juice </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Mango Juice </td>
							
						<td style = "padding: 10px" align = "center"> <img src = "pju.jpg" width = "250px" height = "150px"> </br>
							Pineapple Juice </td>
					</tr>
					
					<tr>
						<td style = "padding: 10px"> </br>
							</td>
							
						<td style = "padding: 10px" align = "center"> <img src = "bbb.jpg" width = "250px" height = "150px"> </br>
							Softdrink </td>
							
						<td style = "padding: 10px" align = "center"> </br>
							 </td>
							
						<td style = "padding: 10px"> </br>
							</td>
					</tr>
					
				</table>
				
			</div>
		</body>
	</html>
