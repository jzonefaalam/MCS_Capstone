<?php
  include "dbcon.php";
?>

<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		
		   


  
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<link rel="stylesheet" href="bootstrap.css">	
			<link rel="stylesheet" href="css/bootstrap-theme.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
			<title> Reservation | Margareth's Catering </title>
			<link rel="icon" type="image/gif" href="img/logo_2.png">
			<link href="wizard/assets/css/bootstrap.min.css" rel="stylesheet" />
			<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
			
		<link rel="wizard/stylesheet" type="text/css" href="style.css">
		<link href="wizard/assets/css/gsdk-base.css" rel="stylesheet" />
	
		</head>

		<body style = "background-image:url(img/bg1.jpg); background-size: cover; background-attachment: fixed; background-position: center; background-repeat: no-repeat">
			<div class="container-fluid">
				
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
							<ul class ="nav navbar-nav navbar-right">
								<li><a href="Base.php"> Home </a></li>
							
							<li class="dropdown">
								<a class="dropdown-toggle" type = "button" data-toggle="dropdown">
									Menu <span class="caret"></span></a>
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
				</nav> </br> </br> </br> </br>

				<h3 style ="color:white">Choose your Package</h3></br>
				<div style = "padding-left:30%">
				<div class="col-lg-12" >
				<div  class=" col-md-6"  style = " border-radius: 10px; width:30%; height :240px"></br>
				<div class = "form-group">
								<a href="#full" data-toggle="modal"><button class="btn btn-info btn-fill"><i class="fa fa-spoon " aria-hidden="true"></i><i class="fa fa-fork" aria-hidden="true"></i>&nbsp;Full Service </button></a></br></br>
								<a href="#five" data-toggle="modal"><button class="btn btn-info btn-fill"><i class="fa fa-spoon " aria-hidden="true"></i>&nbsp;Five Main Course </button></a></br></br>
								<a href="#four" data-toggle="modal"><button class="btn btn-info btn-fill"><i class="fa fa-spoon" aria-hidden="true"></i>&nbsp;Four Main Course </button></a></br></br>
								<a href="#three" data-toggle="modal"><button class="btn btn-info btn-fill"><i class="fa fa-spoon" aria-hidden="true"></i>&nbsp;Three Main Course </button></a>
							</div>
							</div>
				<div id="body-container"  class=" col-md-6"  style = " border-radius: 10px; width:30%; height :240px"></br>
					<div class = "form-group" align = "center" ></br>
						<a href="#menu" data-toggle="modal"><button class="btn btn-warning btn-fill">Menu </button></a></br></br>
						<a href="#services" data-toggle="modal"><button class="btn btn-warning btn-fill"><i class="fa fa-suitcase" aria-hidden="true"></i>&nbsp;Services </button></a></br></br>
						<a href="#equip" data-toggle="modal"><button class="btn btn-warning btn-fill"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Equipment </button></a></br></br>
					</div>
				</div>
				</div>
				</div>
				<div align="center">				
					<button type="reset" class="snip1535"> Clear </button>
					<button type = "button" class="snip1535"> <a href="Reservation_1.php" style ="text-decoration:none;color:white"> < Back </a></button>
					<a href="#sbmit" data-toggle="modal" class="snip1535"  style=" text-decoration:none; color:white">Submit</a>
				</div>
				</div>
				
			</div>
		<div class="modal fade" id ="equip">
          <div class="modal-dialog" style="width:90%;">
            <div class="modal-content">
              <div class="modal-header" style="background-color:black">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style ="color:white; text-align:left">Additional Equipments</h4>
          </div>
		  <form class="form-horizontal" role="form" >
		
						<h5> 

							<div class="form-group" >
								<label class="control-label col-sm-4">Tables:</label>
								<input type="num" required="Maximum of 200" class="form-control" id="numGuest" style="width: 120px" placeholder="quantity">
							</div>
							<div class="form-group" >
								<label class="control-label col-sm-4">Chairs:</label>
								<input type="num" required="Maximum of 200" class="form-control" id="numGuest" style="width: 120px" placeholder="quantity">
							</div>
							 <div class="form-group">
							<label class="control-label col-sm-4">Upload your Design</label>
							<input type="file" id="exampleInputFile">
							</div>
							<div class="row">
							<button type="submit" class="snip1535"><a href="new 3.php"  style=" text-decoration:none; color:white"> Save </a></button>
							<button type="reset" class="snip1535"> Clear </button>
							
						</div>
							</form>
		
						 </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		<div class="modal fade" id ="five">
          <div class="modal-dialog" style="width:90%;">
            <div class="modal-content">
              <div class="modal-header" style="background-color:black">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style ="color:white; text-align:left">Choose your food</h4>
          </div>
		<form>
              <div class="modal-body">
				<div class = "col-md-12">
                <div class = "col-md-3">
					<h3> Beef </h3>
					<img src="img/beef.jpe" width="267x" height="188px">
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Breaded Pork</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Crispy Pata</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Hamonado</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Hawaian Pork</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Lechon Kawali</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Menudo</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Pork Asado</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Pork Barbecue</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Sweet & Sour Pork</br>
						</form>
					</div>
				</div>
				
				<div class = "col-md-3">
					<h3> Pork </h3>
					<img src="img/pork.jpg" width="267px" height="188px">
				
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Breaded Pork</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Crispy Pata</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Hamonado</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Hawaian Pork</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Lechon Kawali</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Menudo</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Pork Asado</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Pork Barbecue</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Sweet & Sour Pork</br>
						</form>
					</div>
				</div>
				
				<div class = "col-md-3">
					<h3> Fish </h3>
					<img src="img/logo.png" width="267x" height="188px">
				
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Shrimp Tempura</br>
						<input type ="radio" name ="vegetables" value ="Shrimp with Garlic" style ="width:20px">Shrimp with Garlic</br>
						<input type ="radio" name ="vegetables" value ="Sweet and Sour Fish" style ="width:20px">Sweet and Sour Fish</br>
						<input type ="radio" name ="vegetables" value ="Chopseuy" style ="width:20px">Chopseuy</br>
					</form>
					</div>
				</div>
				
				<div class = "col-md-3">
					<h3> Chicken </h3>
					<img src="img/logo.png" width="267x" height="188px">
				
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
						<input type ="radio" name ="vegetables" value ="Chicken Barbecue" style ="width:20px">Chicken Barbecue</br>
						<input type ="radio" name ="vegetables" value ="Chicken Adobo" style ="width:20px">Chicken Adobo</br>
						<input type ="radio" name ="vegetables" value ="Chicken Fillet" style ="width:20px">Chicken Fillet</br>
						<input type ="radio" name ="vegetables" value ="Chicken Teriyaki" style ="width:20px">Chicken Teriyaki</br>
						<input type ="radio" name ="vegetables" value ="Cordon Blue" style ="width:20px">Cordon Blue</br>
					</form>
					</div>
				</div>
				</div>
				<div class = "col-md-3">
					<h3> Vegetables</h3>
					<img src="img/beef.jpe" width="267x" height="188px">
					
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
					<input type ="radio" name ="vegetables" value ="Buttered Corn" style ="width:20px">Buttered Corn & Carrots</br>
					<input type ="radio" name ="vegetables" value ="Chopsuey" style ="width:20px">Chopsuey</br>
					<input type ="radio" name ="vegetables" value ="Greenpeas" style ="width:20px">Greenpeas w/ Quail Eggs</br>
					<input type ="radio" name ="vegetables" value ="Lumpia" style ="width:20px">Lumpia Ubod</br>
					<input type ="radio" name ="vegetables" value ="Mixed Vegetables" style ="width:20px">Mixed Vegetables w/ oyster sauce</br>
					</form>
				</div>
				</div>
				<div class = "col-md-3">
					<h3> Pasta</h3>
					<img src="img/beef.jpe" width="267x" height="188px">
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
					<input type ="radio" name ="pasta" value ="canton" style ="width:20px">Canton w/ Sotanghon</br>
					<input type ="radio" name ="pasta" value ="carbonara" style ="width:20px">Carbonara</br>
					<input type ="radio" name ="pasta" value ="Bihon" style ="width:20px">Pancit Bihon Pancit Canton</br>
					<input type ="radio" name ="pasta" value ="Malabon" style ="width:20px">Pancit Malabon</br>
					<input type ="radio" name ="pasta" value ="Sotanghon" style ="width:20px">Sotanghon</br>
					<input type ="radio" name ="pasta" value ="Spaghetti" style ="width:20px">Spaghetti</br>
					</form>
				</div>
				</div>
				<div class = "col-md-3">
					<h3> Dessert</h3>
					<img src="img/beef.jpe" width="267x" height="188px">
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
					<input type ="radio" name ="dessert" value ="buko" style ="width:20px">Buko Pandan</br>
					<input type ="radio" name ="dessert" value ="salad" style ="width:20px">Fruit Salad</br>
					<input type ="radio" name ="dessert" value ="gelatin" style ="width:20px">Gelatin</br>
					<input type ="radio" name ="dessert" value ="Leche Flan" style ="width:20px">Leche Flan</br>
					<input type ="radio" name ="dessert" value ="Pastries" style ="width:20px">Pastries</br>
					<input type ="radio" name ="dessert" value ="Fruits" style ="width:20px">Fresh Fruits in Seasons</br>
					</form>
				</div>
				</div>
				<div class = "col-md-3">
					<h3> Drinks</h3>
					<img src="img/beef.jpe" width="267x" height="188px"></br></br>
					<div class="radiogroup" align = "left">
					<form>
					<input type ="radio" name ="drinks" value ="orange" style ="width:20px">Orange Juice</br>
					<input type ="radio" name ="drinks" value ="mango" style ="width:20px">Mango Juice</br>
					<input type ="radio" name ="drinks" value ="pineapple" style ="width:20px">Pineapple Juice</br>
					<input type ="radio" name ="drinks" value ="softdrinks" style ="width:20px">Soft Drinks</br></br></br>
					</form>
				</div>
				</div>
				<div class "col-md-3">				
					<button type="reset" class="snip1535"> Clear </button>
					<button type="submit" class="snip1535"><a href="Reservation_3.php" style=" text-decoration:none; color:white"> Save </a></button>
				</div>
			</form>
		
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		<div class="modal fade" id ="three">
          <div class="modal-dialog" style="width:90%;">
            <div class="modal-content">
              <div class="modal-header" style="background-color:black">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style ="color:white; text-align:center">Choose your food</h4>
              </div>
		<form>
              <div class="modal-body">
				<div class = "col-md-12">
                <div class = "col-md-3">
					<h3> Beef </h3>
					<img src="img/beef.jpe" width="267x" height="188px">
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Breaded Pork</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Crispy Pata</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Hamonado</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Hawaian Pork</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Lechon Kawali</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Menudo</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Pork Asado</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Pork Barbecue</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Sweet & Sour Pork</br>
						</form>
					</div>
				</div>
				
				<div class = "col-md-3">
					<h3> Pork </h3>
					<img src="img/pork.jpg" width="267px" height="188px">
				
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Breaded Pork</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Crispy Pata</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Hamonado</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Hawaian Pork</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Lechon Kawali</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Menudo</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Pork Asado</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Pork Barbecue</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Sweet & Sour Pork</br>
						</form>
					</div>
				</div>
				
				<div class = "col-md-3">
					<h3> Fish </h3>
					<img src="img/fish fillet.jpe" width="267x" height="188px">
				
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Shrimp Tempura</br>
						<input type ="radio" name ="vegetables" value ="Shrimp with Garlic" style ="width:20px">Shrimp with Garlic</br>
						<input type ="radio" name ="vegetables" value ="Sweet and Sour Fish" style ="width:20px">Sweet and Sour Fish</br>
						<input type ="radio" name ="vegetables" value ="Chopseuy" style ="width:20px">Chopseuy</br>
					</form>
					</div>
				</div>
				
				<div class = "col-md-3">
					<h3> Chicken </h3>
					<img src="img/fried chicken.jpg" width="267x" height="188px">
				
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
						<input type ="radio" name ="vegetables" value ="Chicken Barbecue" style ="width:20px">Chicken Barbecue</br>
						<input type ="radio" name ="vegetables" value ="Chicken Adobo" style ="width:20px">Chicken Adobo</br>
						<input type ="radio" name ="vegetables" value ="Chicken Fillet" style ="width:20px">Chicken Fillet</br>
						<input type ="radio" name ="vegetables" value ="Chicken Teriyaki" style ="width:20px">Chicken Teriyaki</br>
						<input type ="radio" name ="vegetables" value ="Cordon Blue" style ="width:20px">Cordon Blue</br>
					</form>
					</div>
				</div>
				</div>
				<div class = "col-md-3">
					<h3> Vegetables</h3>
					<img src="img/beef.jpe" width="267x" height="188px">
					
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
					<input type ="radio" name ="vegetables" value ="Buttered Corn" style ="width:20px">Buttered Corn & Carrots</br>
					<input type ="radio" name ="vegetables" value ="Chopsuey" style ="width:20px">Chopsuey</br>
					<input type ="radio" name ="vegetables" value ="Greenpeas" style ="width:20px">Greenpeas w/ Quail Eggs</br>
					<input type ="radio" name ="vegetables" value ="Lumpia" style ="width:20px">Lumpia Ubod</br>
					<input type ="radio" name ="vegetables" value ="Mixed Vegetables" style ="width:20px">Mixed Vegetables w/ oyster sauce</br>
					</form>
				</div>
				</div>
				<div class = "col-md-3">
					<h3> Pasta</h3>
					<img src="img/beef.jpe" width="267x" height="188px">
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
					<input type ="radio" name ="pasta" value ="canton" style ="width:20px">Canton w/ Sotanghon</br>
					<input type ="radio" name ="pasta" value ="carbonara" style ="width:20px">Carbonara</br>
					<input type ="radio" name ="pasta" value ="Bihon" style ="width:20px">Pancit Bihon Pancit Canton</br>
					<input type ="radio" name ="pasta" value ="Malabon" style ="width:20px">Pancit Malabon</br>
					<input type ="radio" name ="pasta" value ="Sotanghon" style ="width:20px">Sotanghon</br>
					<input type ="radio" name ="pasta" value ="Spaghetti" style ="width:20px">Spaghetti</br>
					</form>
				</div>
				</div>
				<div class = "col-md-3">
					<h3> Dessert</h3>
					<img src="img/beef.jpe" width="267x" height="188px">
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
					<input type ="radio" name ="dessert" value ="buko" style ="width:20px">Buko Pandan</br>
					<input type ="radio" name ="dessert" value ="salad" style ="width:20px">Fruit Salad</br>
					<input type ="radio" name ="dessert" value ="gelatin" style ="width:20px">Gelatin</br>
					<input type ="radio" name ="dessert" value ="Leche Flan" style ="width:20px">Leche Flan</br>
					<input type ="radio" name ="dessert" value ="Pastries" style ="width:20px">Pastries</br>
					<input type ="radio" name ="dessert" value ="Fruits" style ="width:20px">Fresh Fruits in Seasons</br>
					</form>
				</div>
				</div>
				<div class = "col-md-3">
					<h3> Drinks</h3>
					<img src="img/beef.jpe" width="267x" height="188px"></br></br>
					<div class="radiogroup" align = "left">
					<form>
					<input type ="radio" name ="drinks" value ="orange" style ="width:20px">Orange Juice</br>
					<input type ="radio" name ="drinks" value ="mango" style ="width:20px">Mango Juice</br>
					<input type ="radio" name ="drinks" value ="pineapple" style ="width:20px">Pineapple Juice</br>
					<input type ="radio" name ="drinks" value ="softdrinks" style ="width:20px">Soft Drinks</br></br></br>
					</form>
				</div>
				</div>
				<div class "col-md-3">				
					<button type="reset" class="snip1535"> Clear </button>
					<button type="submit" class="snip1535"><a href="new 3.php"  style=" text-decoration:none; color:white"> Save </a></button>
				</div>
			</form>
		
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		<div class="modal fade" id ="services">
          <div class="modal-dialog" style="width:90%;">
            <div class="modal-content">
              <div class="modal-header" style="background-color:black">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style ="color:white; text-align:center">Choose other services</h4>
              </div>
			 <div class="modal-body">
			<div class="container-fluid text-center">
				 </br>
				
				<div class = "row"></br>
					<div class = "col-sm-3">
						<a href ="invitation.html"><figure  class="snip1581"><img src = "img/inv.jpg" style = "width: 280px; height: 200px"></figure></a>
						<h4> Invitations </h4>
					</div>
				
					<div class = "col-sm-3">
						<a href ="tarp.html"><figure class="snip1581"><img src = "img/logo_2.png" style = "width: 280px; height: 200px"></figure>
						<h4> Tarpauline </h4>
					</div>
					
					<div class = "col-sm-3">
						<a href ="flower.html"><figure class="snip1581"><img src = "img/flower.jpeg" style = "width: 280px; height: 200px"></figure>
						<h4> Flower Entourage </h4>
					</div>
					
					<div class = "col-sm-3">
						<figure class="snip1581"><img src = "img/sound.jpg" style = "width: 280px; height: 200px"></figure>
						<h4> Sound Mobile </h4>
					</div>
				</div> </br> </br>
				
				<div class = "row">
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
						<figure class="snip1581"><img src = "img/logo.png" style = "width: 280px; height: 200px"></figure>
						<h4> Kitchen Utensils </h4>
					</div>
				</div>
				<button type="submit" class="btn-lg"><a href="new 3.php"  style=" text-decoration:none; color:black"> Save </a></button>
			</div>
				</div>
				</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
	  	<div class="modal fade" id ="sbmit" >
          <div class="modal-dialog" style="width:80%;">
            <div class="modal-content">
              <div class="modal-header"style="background-color:black">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style ="color:white">Terms and Conditions</h4>
              </div>
              <div class="modal-body">
			  <h5 style ="text-align:left"><b>FINALIZING YOUR EVENT AND ATTENDANCE GUARANTEE</b></h5>
			  <p style ="text-align:left">Once details of event have been planned and finalized, a planner will email the client a confirmation of the catering order. The client should carefully review
				 the documents for accuracy. If questions or concerns arise, the client must emmediately contact the event planner to make any needed adjustment.</p>
			  
			  <p style ="text-align:left">The ability to serve additional guests added after the guest count guarantee deadline will be determined on case-by-case basis. Any decrease in the guest count made after the guarantee deadline
			  will not be reduce the qouted cost of event. if the number of guest exceeds the guarantee, the client will be charged for the actual number attending on the event. If a final guarantee
			  is not submitted, the original contracted guest count will be used for billing purposes.</p>
			  <h5 style ="text-align:left"><b>CANCELATION</b></h5>
			   <p style ="text-align:left">Event canceled due to valid reason(i.e extreme weather condititions)will not incur any charge. 
			   If a client cancels an event without a prior notice, the client will be responsible for any special-ordered items and other 
			   costs that cannot be absorbed into normal production or operations. If extreme weather conditions are predicted that must 
			   cancel early, clients will be contacted by MCS with a deadline to cancel catering without penalty. 
			   </p>
			   <p style ="text-align:left">For catering orders cancelled within established deadlines, no charges will be incurred by the client. All other cancellations
			   made after the established deadline, may be charged at full price. Cancellations not related to weather that are made after (3)
			   business days (excluding event day) prior to your event will be charged the grand total for the event.</p>
			   <h5 style ="text-align:left"><b>Leftover Food Policy</b></h5>
			   <p style ="text-align:left">Due to health regulations and for the safety of our guests, food not consumed may not be taken from 
			   catered events. All leftover food remains the property of the client. To-go containers are not offered. </p>
			    <h5 style ="text-align:left"><b>Sustainability Policy</b></h5>
				<p style ="text-align:left">MCS is committed to minimizing negative impacts on the environment. As such MCS continually investigates
				into new alternative, eco-friendly and social justice products to offer the clients. The department’s production and purchasing staff
				are leaders in sustainability practices. Cans and bottles from all events are recycled and food is composted when appropriate. Please
				ask the Event Planners how you can host the highest level ecofriendly event. Please see our web page for specific sustainability information.</p>
				 <h5 style ="text-align:left"><b>Payment Policy</b></h5>
				 <p style ="text-align:left">The mode of payment is thru cash only. The client and the owner will meet and the client should pay half of 
				 the expense before the event happened. The owner and the client will have an agreement whether where to pay the half of the money.</p></br>
				<input type ="checkbox"  style ="width:80px">I accept the terms and conditions</br></br>
				<button type="submit" class="btn-lg"><a href="Reservation_3.php"  style=" text-decoration:none; color:black"> Proceed to payment </a></button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
       
        <!-- /.modal -->
		</div>
	  
	  
	  	<div class="modal fade" id ="four">
          <div class="modal-dialog" style="width:90%;">
            <div class="modal-content">
              <div class="modal-header" style="background-color:black">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style ="color:white; text-align:center">Choose your food</h4>
              </div>
		<form>
              <div class="modal-body">
				<div class = "col-md-12">
                <div class = "col-md-3">
					<h3> Beef </h3>
					<img src="img/beef.jpe" width="267x" height="188px">
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Breaded Pork</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Crispy Pata</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Hamonado</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Hawaian Pork</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Lechon Kawali</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Menudo</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Pork Asado</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Pork Barbecue</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Sweet & Sour Pork</br>
						</form>
					</div>
				</div>
				
				<div class = "col-md-3">
					<h3> Pork </h3>
					<img src="img/pork.jpg" width="267px" height="188px">
				
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Breaded Pork</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Crispy Pata</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Hamonado</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Hawaian Pork</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Lechon Kawali</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Menudo</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Pork Asado</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Pork Barbecue</br>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Sweet & Sour Pork</br>
						</form>
					</div>
				</div>
				
				<div class = "col-md-3">
					<h3> Fish </h3>
					<img src="img/fish fillet.jpe" width="267x" height="188px">
				
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
						<input type ="radio" name ="vegetables" value ="Shrimp Tempura" style ="width:20px">Shrimp Tempura</br>
						<input type ="radio" name ="vegetables" value ="Shrimp with Garlic" style ="width:20px">Shrimp with Garlic</br>
						<input type ="radio" name ="vegetables" value ="Sweet and Sour Fish" style ="width:20px">Sweet and Sour Fish</br>
						<input type ="radio" name ="vegetables" value ="Chopseuy" style ="width:20px">Chopseuy</br>
					</form>
					</div>
				</div>
				
				<div class = "col-md-3">
					<h3> Chicken </h3>
					<img src="img/fried chicken.jpg" width="267x" height="188px">
				
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
						<input type ="radio" name ="vegetables" value ="Chicken Barbecue" style ="width:20px">Chicken Barbecue</br>
						<input type ="radio" name ="vegetables" value ="Chicken Adobo" style ="width:20px">Chicken Adobo</br>
						<input type ="radio" name ="vegetables" value ="Chicken Fillet" style ="width:20px">Chicken Fillet</br>
						<input type ="radio" name ="vegetables" value ="Chicken Teriyaki" style ="width:20px">Chicken Teriyaki</br>
						<input type ="radio" name ="vegetables" value ="Cordon Blue" style ="width:20px">Cordon Blue</br>
					</form>
					</div>
				</div>
				</div>
				<div class = "col-md-3">
					<h3> Vegetables</h3>
					<img src="img/beef.jpe" width="267x" height="188px">
					
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
					<input type ="radio" name ="vegetables" value ="Buttered Corn" style ="width:20px">Buttered Corn & Carrots</br>
					<input type ="radio" name ="vegetables" value ="Chopsuey" style ="width:20px">Chopsuey</br>
					<input type ="radio" name ="vegetables" value ="Greenpeas" style ="width:20px">Greenpeas w/ Quail Eggs</br>
					<input type ="radio" name ="vegetables" value ="Lumpia" style ="width:20px">Lumpia Ubod</br>
					<input type ="radio" name ="vegetables" value ="Mixed Vegetables" style ="width:20px">Mixed Vegetables w/ oyster sauce</br>
					</form>
				</div>
				</div>
				<div class = "col-md-3">
					<h3> Pasta</h3>
					<img src="img/beef.jpe" width="267x" height="188px">
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
					<input type ="radio" name ="pasta" value ="canton" style ="width:20px">Canton w/ Sotanghon</br>
					<input type ="radio" name ="pasta" value ="carbonara" style ="width:20px">Carbonara</br>
					<input type ="radio" name ="pasta" value ="Bihon" style ="width:20px">Pancit Bihon Pancit Canton</br>
					<input type ="radio" name ="pasta" value ="Malabon" style ="width:20px">Pancit Malabon</br>
					<input type ="radio" name ="pasta" value ="Sotanghon" style ="width:20px">Sotanghon</br>
					<input type ="radio" name ="pasta" value ="Spaghetti" style ="width:20px">Spaghetti</br>
					</form>
				</div>
				</div>
				<div class = "col-md-3">
					<h3> Dessert</h3>
					<img src="img/beef.jpe" width="267x" height="188px">
					<div class="radio" align = "left" style ="padding-left:10%">
					<form>
					<input type ="radio" name ="dessert" value ="buko" style ="width:20px">Buko Pandan</br>
					<input type ="radio" name ="dessert" value ="salad" style ="width:20px">Fruit Salad</br>
					<input type ="radio" name ="dessert" value ="gelatin" style ="width:20px">Gelatin</br>
					<input type ="radio" name ="dessert" value ="Leche Flan" style ="width:20px">Leche Flan</br>
					<input type ="radio" name ="dessert" value ="Pastries" style ="width:20px">Pastries</br>
					<input type ="radio" name ="dessert" value ="Fruits" style ="width:20px">Fresh Fruits in Seasons</br>
					</form>
				</div>
				</div>
				<div class = "col-md-3">
					<h3> Drinks</h3>
					<img src="img/beef.jpe" width="267x" height="188px"></br></br>
					<div class="radiogroup" align = "left">
					<form>
					<input type ="radio" name ="drinks" value ="orange" style ="width:20px">Orange Juice</br>
					<input type ="radio" name ="drinks" value ="mango" style ="width:20px">Mango Juice</br>
					<input type ="radio" name ="drinks" value ="pineapple" style ="width:20px">Pineapple Juice</br>
					<input type ="radio" name ="drinks" value ="softdrinks" style ="width:20px">Soft Drinks</br></br></br>
					</form>
				</div>
				</div>
				<div class "col-md-3">				
					<button type="reset" class="snip1535"> Clear </button>
					<button type="submit" class="snip1535"><a href="new 3.php"  style=" text-decoration:none; color:white"> Save </a></button>
				</div>
			</form>
		
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="plugins/iCheck/icheck.min.js"></script>
		
<script src="wizard/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
  <script src="wizard/assets/js/wizard.js"></script>
<script type="text/javascript">
  function validateFirstStep(){
    
}

function validateSecondStep(){
   
}

function validateThirdStep(){
    //code here for third step
    
    
}
</script>
		</body>
	</html>
