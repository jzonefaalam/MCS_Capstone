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
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-12">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="blue" id="wizardProfile">
		                    <form action="" method="">
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        	   Information
		                        	</h3>
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#resDetail" data-toggle="tab">Reservation</a></li>
			                            <li><a href="#cusInfo" data-toggle="tab">Customer</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                        	<div class="tab-pane" id="resDetail">
		                              <div class="row">
		                                	<div class="col-sm-4 col-sm-offset-1">
		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">toc</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Event Type</label>
		                                            	<select name="eType" id = "eType" class="form-control">
															<option disabled="(Choose Event Type)" selected=""></option>
		                                            	</select>
		                                            </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">label</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Do you have a location?</label>
		                                            	<select class="form-control">
															<option disabled="" selected=""></option>
		                                            	</select>
		                                            </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">location_on</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Location</label>
			                                            <input type="text" name="eLoc" id = "eLoc" class="form-control">
			                                        </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">location_on</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Location</label>
		                                            	<select name="eType" id = "eType" class="form-control">
															<option disabled="(Choose Event Type)" selected=""></option>
		                                            	</select>
			                                        </div>
		                                        </div>
		                                    </div>

		                                	<div class="col-sm-4 col-sm-offset-1">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">spellcheck</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Name of Event</label>
			                                            <input type="text" name="eName" id = "eName" class="form-control">
			                                        </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">perm_identity</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Number of Guest</label>
			                                            <input type="text" name="eNum" id = "eNum" class="form-control">
			                                        </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">today</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Date of Event</label>
			                                            <input type="text" name="eDate" id = "eDate" class="form-control">
			                                        </div>
		                                        </div>
		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">query_builder</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Time of Event</label>
			                                            <input type="text" name="eTime" id = "eTime" class="form-control">
			                                        </div>
		                                        </div>

		                                	</div>
		                            	</div>
		                            </div>

		                            <div class="tab-pane" id="cusInfo">
		                              	<div class="row">
		                                	
		                                	<div class="col-sm-4 col-sm-offset-1">
		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">toc</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Full Name</label>
			                                            <input type="text" name="cusName" id = "cusName" class="form-control">
		                                            </div>
		                                        </div>

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">location_on</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Home Address</label>
			                                            <input type="text" name="homeAdd" id = "homeAdd" class="form-control">
			                                        </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">loyalty</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Billing Address</label>
			                                            <input type="text" name="billAdd" id = "billAdd" class="form-control">
		                                            </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">label</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Age</label>
			                                            <input type="text" name="cusAge" id = "cusAge" class="form-control">
		                                            </div>
		                                        </div>
		                                    </div>

		                                	<div class="col-sm-4 col-sm-offset-1">
		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">ring_volume</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Telephone Number</label>
			                                            <input type="text" name="telNum" id = "telNum" class="form-control">
		                                            </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">voicemail</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Cellphone Number</label>
			                                            <input type="text" name="cellNum" id = "cellNum" class="form-control">
		                                            </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">comment</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Email Address</label>
			                                            <input type="email" name="email" id = "email" class="form-control">
		                                            </div>
		                                        </div>

		                                	</div>
		                            	</div>
										
										<div class="row">
		                                    <div class="col-sm-12">
		                                        <h4 class="info-text"> In case of emergency please specify another contact </h4>
		                                    </div>

		                                	<div class="col-sm-4 col-sm-offset-1">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">assignment_ind</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Contact Name</label>
			                                            <input type="text" name="conPerson" id = "conPerson" class="form-control">
			                                        </div>
		                                        </div>
		                                    </div>

		                                	<div class="col-sm-4 col-sm-offset-1">
		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">settings_phone</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Contact Number</label>
			                                            <input type="text" name="conNum" id = "conNum" class="form-control">
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
