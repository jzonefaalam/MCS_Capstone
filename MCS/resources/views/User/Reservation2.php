<?php
  include "dbcon.php";
?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon.ico">
		<title> Reservation | Margareth's Catering </title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	    <meta name="viewport" content="width=device-width" />
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
		<link rel="icon" type="image/png" href="assets/img/favicon.png" />
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		    folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
		<!--     Fonts and icons     -->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

		<!-- CSS Files -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

		<!-- CSS Just for demo purpose, don't include it in your project -->
		<link href="assets/css/demo.css" rel="stylesheet" />
	</head>

	<body style = "background-image:url(img/bg1.jpg); background-size: cover; background-attachment: fixed; background-position: center; background-repeat: no-repeat">
		<div class="container-fluid">
				
			<nav class="navbar navbar-default navbar-fixed-top" style="background-color:black;">
				<div class="container" style = "background-color:black; width:100%; cursor: pointer;">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
						</button>
							
						<a class="navbar-brand" href="Base.php"><img src="img/logo.png" style ="float:left ; width 40px;height :40px;padding-bottom :10px"></a>
					</div>
				
					<div class="collapse navbar-collapse" id="myNavbar" style = "background-color:black; width:100%">
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
			</nav>

			<!--   Big container   -->
	    <div class="container-fluid" align="center">
	        <div class="row">
		        <div class="col-sm-9">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="blue" id="wizardProfile">
		                    <form action="" method="">
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        	   Reservation Details
		                        	</h3>
		                    	</div>

								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#package" data-toggle="tab">Package</a></li>
			                            <li><a href="#addFood" data-toggle="tab">Additional Food</a></li>
			                            <li><a href="#service" data-toggle="tab">Service</a></li>
			                            <li><a href="#equip" data-toggle="tab">Equipment</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content" style="width: 800px">
		                            <div class="tab-pane" id="package"> <br> <br>
		                                <div class="row" align = "center">
		                                    <div class="panel-group" id="accordion">
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse1"> Full Main Course </a>
											        	</h4>
											      	</div>
											      	
											      	<div id="collapse1" class="panel-collapse collapse">
											        	<div class="panel-body"> 
											        		<div class = "col-md-12">
                <div class = "col-md-3">
					<h3> Beef </h3>
					<img src="img/beef.jpe" width="150px" height="150px">
					<div class="radiogroup" align = "left" style ="padding-left:10%">
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
					<img src="img/pork.jpg" width="150px" height="150px">
				
					<div class="radiogroup" align = "left" style ="padding-left:10%">
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
					<img src="img/logo.png" width="150px" height="150px">
				
					<div class="radiogroup" align = "left" style ="padding-left:10%">
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
					<img src="img/logo.png" width="150px" height="150px">
				
					<div class="radiogroup" align = "left" style ="padding-left:10%">
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
					<img src="img/beef.jpe" width="150px" height="150px">
					
					<div class="radiogroup" align = "left" style ="padding-left:10%">
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
					<img src="img/beef.jpe" width="150px" height="150px">
					<div class="radiogroup" align = "left" style ="padding-left:10%">
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
					<img src="img/beef.jpe" width="150px" height="150px">
					<div class="radiogroup" align = "left" style ="padding-left:10%">
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
					<img src="img/beef.jpe" width="150px" height="150px"></br></br>
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
					<button type="reset" class="snip1535"> Save </button>
				</div>
											        	</div>
											      	</div>
											    </div>
											    
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="width: 200px"> Five Main Course </a>
											        	</h4>
											      	</div>
											      
											      	<div id="collapse2" class="panel-collapse collapse">
											        	<div class="panel-body"> (Checkbox) </div>
											      	</div>
											    </div>
											    
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse3"> Four Main Course </a>
											        	</h4>
											      	</div>
											      
											      	<div id="collapse3" class="panel-collapse collapse">
											        	<div class="panel-body"> (Checkbox) </div>
											      	</div>
											    </div>
											    
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse4"> Three Main Course </a>
											        	</h4>
											      	</div>
											      
											      	<div id="collapse4" class="panel-collapse collapse">
											        	<div class="panel-body"> (Checkbox) </div>
											      	</div>
											    </div>
											</div>
		                                </div>
		                            </div>

		                            <div class="tab-pane" id="addFood"> <br> <br>
		                                <div class="row" align = "center">
		                                    <div class="panel-group" id="accordion">
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse5"> Beef </a>
											        	</h4>
											      	</div>
											      	
											      	<div id="collapse5" class="panel-collapse collapse">
											        	<div class="panel-body">
															<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Example</button>

															<!-- Modal -->
															<div id="myModal" class="modal fade" role="dialog">
															  	<div class="modal-dialog modal-sm">

																    <!-- Modal content-->
																    <div class="modal-content" style="margin-top: 130px">
																      	<div class="modal-header">
																        	<button type="button" class="close" data-dismiss="modal">&times;</button>
																        	<h4 class="modal-title">Dish Details</h4> 
																      	</div>
																      
																      	<div class="modal-body">
																        	<div class="input-group" style="width: 200px">
																				<span class="input-group-addon">
																					<i class="material-icons">info_outline</i>
																				</span>
																				<div class="form-group label-floating" align="left">
										                                            <label class="control-label">Quantity (per person)</label>
										                                            <input type="text" name="quant" id = "quant" class="form-control">
										                                        </div>
									                                        </div>

																        	<div class="input-group" style="width: 200px">
																				<span class="input-group-addon">
																					<i class="material-icons">loyalty</i>
																				</span>
																				<div class="form-group label-floating" align="left">
										                                            <label class="control-label">Price</label>
										                                            <input type="text" disabled name="price" id = "price" class="form-control">
										                                        </div>
									                                        </div>

																        	<div class="input-group" style="width: 200px">
																				<span class="input-group-addon">
																					<i class="material-icons">list</i>
																				</span>
																				<div class="form-group label-floating" align="left">
										                                            <label class="control-label">Note</label>
										                                            <textarea type="text" class="form-control" name="price" id="price"></textarea>
										                                        </div>
									                                        </div>
																      	</div>
																      
																      	<div class="modal-footer">
																        	<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
																      	</div>
																    </div>

																</div>
															</div>
														</div>
											      	</div>
											    </div>
											    
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse6" style="width: 200px"> Pork </a>
											        	</h4>
											      	</div>
											      
											      	<div id="collapse6" class="panel-collapse collapse">
											        	<div class="panel-body"> (Clickable shit) </div>
											      	</div>
											    </div>
											    
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse7"> Chicken </a>
											        	</h4>
											      	</div>
											      
											      	<div id="collapse7" class="panel-collapse collapse">
											        	<div class="panel-body"> (Clickable shit) </div>
											      	</div>
											    </div>
											    
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse8"> Fish </a>
											        	</h4>
											      	</div>
											      
											      	<div id="collapse8" class="panel-collapse collapse">
											        	<div class="panel-body"> (Clickable shit) </div>
											      	</div>
											    </div>
											    
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse9"> Vegetable </a>
											        	</h4>
											      	</div>
											      
											      	<div id="collapse9" class="panel-collapse collapse">
											        	<div class="panel-body"> (Clickable shit) </div>
											      	</div>
											    </div>
											    
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse10"> Drinks </a>
											        	</h4>
											      	</div>
											      
											      	<div id="collapse10" class="panel-collapse collapse">
											        	<div class="panel-body"> (Clickable shit) </div>
											      	</div>
											    </div>
											</div>
		                                </div>
		                            </div>

		                            <div class="tab-pane" id="service"> <br> <br>
		                                <div class="row" align = "center">
		                                    <div class="panel-group" id="accordion">
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse11"> Flower Arrangement </a>
											        	</h4>
											      	</div>
											      	
											      	<div id="collapse11" class="panel-collapse collapse">
											        	<div class="panel-body">
											        		<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal1">Example</button>

															<!-- Modal -->
															<div id="myModal1" class="modal fade" role="dialog">
															  	<div class="modal-dialog modal-sm">

																    <!-- Modal content-->
																    <div class="modal-content" style="margin-top: 130px">
																      	<div class="modal-header">
																        	<button type="button" class="close" data-dismiss="modal">&times;</button>
																        	<h4 class="modal-title">Arrangement Details</h4> 
																      	</div>
																      
																      	<div class="modal-body">
																        	<div class="input-group" style="width: 200px">
																				<span class="input-group-addon">
																					<i class="material-icons">label_outline</i>
																				</span>
																				<div class="form-group label-floating" align="left">
										                                            <label class="control-label">Type of flower</label>
										                                            <select name="flower" id = "flower" class="form-control">
																						<option disabled="(Choose a Flower)" selected=""></option>
									                                            	</select>
										                                        </div>
									                                        </div>

																        	<div class="input-group" style="width: 200px">
																				<span class="input-group-addon">
																					<i class="material-icons">view_day</i>
																				</span>
																				<div class="form-group label-floating" align="left">
										                                            <label class="control-label">Arrangement</label>
										                                            <input type="text"  name="price" id = "price" class="form-control">
										                                        </div>
									                                        </div>

																        	<div class="input-group" style="width: 200px">
																				<span class="input-group-addon">
																					<i class="material-icons">loyalty</i>
																				</span>
																				<div class="form-group label-floating" align="left">
										                                            <label class="control-label">Quantity</label>
										                                            <textarea type="text" class="form-control" name="price" id="price"></textarea>
										                                        </div>
									                                        </div>
																      	</div>
																      
																      	<div class="modal-footer">
																        	<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
																      	</div>
																    </div>

																</div>
															</div>
											        	</div>
											      	</div>
											    </div>
											    
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse13"> Invitation </a>
											        	</h4>
											      	</div>
											      
											      	<div id="collapse13" class="panel-collapse collapse">
											        	<div class="panel-body"> (Clickable shit) </div>
											      	</div>
											    </div>
											    
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse14"> Tarpaulin </a>
											        	</h4>
											      	</div>
											      
											      	<div id="collapse14" class="panel-collapse collapse">
											        	<div class="panel-body"> (Clickable shit) </div>
											      	</div>
											    </div>
											    
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse15"> Balloon </a>
											        	</h4>
											      	</div>
											      
											      	<div id="collapse15" class="panel-collapse collapse">
											        	<div class="panel-body"> (Clickable shit) </div>
											      	</div>
											    </div>
											</div>
		                                </div>
		                            </div>

		                            <div class="tab-pane" id="equip"></br></br>
		                            	<div class="row" align = "center">
		                                    <div class="panel-group" id="accordion">
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse16"> Sound Mobile </a>
											        	</h4>
											      	</div>
											      	
											      	<div id="collapse16" class="panel-collapse collapse">
											        	<div class="panel-body">
															<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal2">Example</button>

															<!-- Modal -->
															<div id="myModal2" class="modal fade" role="dialog">
															  	<div class="modal-dialog modal-sm">

																    <!-- Modal content-->
																    <div class="modal-content" style="margin-top: 130px">
																      	<div class="modal-header">
																        	<button type="button" class="close" data-dismiss="modal">&times;</button>
																        	<h4 class="modal-title">Choose</h4> 
																      	</div>
																      
																      	<div class="modal-body">
																        	<p>Actual Photos of Sound Mobile</p>
																      	</div>
																      
																      	<div class="modal-footer">
																        	<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
																      	</div>
																    </div>

																</div>
															</div>
														</div>
											      	</div>
											    </div>
											    
											    <div class="panel panel-default">
											      	<div class="panel-heading" style="background-color: #e6e6ff">
											        	<h4 class="panel-title">
											          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse17" style="width: 200px"> Smoke Machine </a>
											        	</h4>
											        </div>
											      
											      	<div id="collapse17" class="panel-collapse collapse">
											        	<div class="panel-body"> (Clickable shit) </div>
											      	</div>
											    </div>
											</div>
		                                </div>
		                            </div>
		                        </div>

		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' />
		                                <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finish' />
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>

		        <div class="col-sm-3 col-sm-offset-9" style="margin-left: 0px">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" id="wizardProfile">
		                    <form action="" method="">
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

		                    	<div class="wizard-header">
		                        	<h4 class="wizard-title">
		                        	   	Add to Cart <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
		                        	</h4>
		                    	</div>

								
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div><!-- end row -->
	    </div> </br> </br> <!--  big container -->

        <!-- /.modal-content -->
        </div>
        <!-- AdminLTE App -->
	    <script src="dist/js/app.min.js"></script>
	    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	    <script src="dist/js/pages/dashboard.js"></script>
	    <!-- AdminLTE for demo purposes -->
	    <script src="dist/js/demo.js"></script>
	    <!-- 
	    <script type="text/javascript" src="vendor/jquery/jquery-1.10.2.min.js"></script>
	    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="dist_1/js/bootstrapValidator.js"></script> -->
		<!--   Core JS Files   -->
	    <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>

		<!--  Plugin for the Wizard -->
		<script src="assets/js/material-bootstrap-wizard.js"></script>

	    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
		<script src="assets/js/jquery.validate.min.js"></script>
	</body>
</html>
