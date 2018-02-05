<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Dashboard</title>

  
  
  <link href='css/bootstrap.css' rel='stylesheet' />
    <link href='css/rotating-card.css' rel='stylesheet' />
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="bootstrap3/css/font-awesome.css" rel="stylesheet" />
    
  <link href="assets/css/gsdk.css" rel="stylesheet" />   
    <link href="assets/css/demo.css" rel="stylesheet" /> 
<link rel="stylesheet" type="text/css" href="style.css">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="background.css">
  <link href="assets/css/gsdk-base.css" rel="stylesheet" />
    <!--     Font Awesome     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
</head>

<body>
 <div id="navbar-full">
    <div id="navbar">
    <!--    
        navbar-default can be changed with navbar-ct-blue navbar-ct-azzure navbar-ct-red navbar-ct-green navbar-ct-orange  
        -->
        <nav class="navbar navbar-fixed-top navbar-transparent navbar-ct-green " role="navigation">
          
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Auction<sup>3</sup></a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="products.php">Buy product</a></li>
                        <li><a href="sellproduct.php">Sell product</a></li>
                      
                      </ul>
                </li>
                
                <li>
                    <a href="javascript:void(0);" data-toggle="search" class="hidden-xs"><i class="fa fa-search"></i></a>
                </li>
              </ul>
               <form class="navbar-form navbar-left navbar-search-form" role="search">                  
                 <div class="form-group">
                      <input type="text" value="" class="form-control" placeholder="Search...">
                 </div> 
              </form>
              <ul class="nav navbar-nav navbar-right">
                    
                    
                    <li><a class="btn btn-default btn-round" href="index.php">Sign in</a></li>
               </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
         <div class='blurred-container'>

        <div class="motto">
        <div class="border no-right-border">1</div><div class="border no-right-border">2</div><div class="border">3</div>
            <div style="margin-left: -30px">Auction!</div>
            
            
            
        </div>
        <div class="img-src" style="background-image: url('assets/img/bg1.jpg')"></div>
        <div class='img-src blur' style="background-image: url('assets/img/bg1-blur.jpg')"></div>
    </div>
    </div><!--  end navbar -->

</div> <!-- end menu-dropdown -->

             


<div class="main">
  <div class="container">
        <div class="row">
        <div class="col-sm-12">
           
            <!--      Wizard container        -->   
            <div class="wizard-container"> 
                
                <div class="card wizard-card ct-wizard-green" id="wizardProfile">
                    <form action="save_user.php" method="POST">
                <!--        You can switch "ct-wizard-orange"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->
                
                      <div class="wizard-header">
                          <h3>
                             <b>BUILD</b> YOUR PROFILE <br>
                             <small>This information will let us know more about you.</small>
                          </h3>
                      </div>
                      <ul>
                            <li><a href="#personal" data-toggle="tab">Personal Information</a></li>
                            <li><a href="#account" data-toggle="tab">Account</a></li>
                            <li><a href="#feature" data-toggle="tab">Features</a></li>
                        </ul>
                        
                        <div class="tab-content">
                        <div class="tab-pane" id="personal">
                              <div class="row">
                                  <h4 class="info-text"></h4>
                               
                                  <div class="col-sm-8">
                                          <div class="col-md-12">
                      <div class="col-md-5">
                      
                        <div class="form-group form-animate-text">
                            <input type="text" class="form-text"  name="fname" required>
                            <span class="bar"></span>
                            <label>First Name<sup style="color: red">*</sup></label>
                          </div>
                          </div>
                           <div class="col-md-3"  >
                        <div class="form-group form-animate-text">
                            <input type="text" class="form-text"  name="mname" value="">
                            <span class="bar"></span>
                            <label>Middle Name</label>
                          </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group form-animate-text">
                            <input type="text" class="form-text"  name="lname" required>
                            <span class="bar"></span>
                            <label>Last Name<sup style="color: red">*</sup></label>
                          </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                                    
                          
                        <div class="col-md-6">

                             <div class="form-group form-animate-text">
                            <input type="date" class="form-text"   id="datePicker" name="bday" required>
                            <span class="bar"></span>
                            <label>Date of Birth<sup style="color: red">*</sup></label>
                          </div>
                          </div>
                          
                          <div class="col-md-6">
                             <div class="form-group form-animate-text">
                            <input type="text" class="form-text" id="validate_firstname" name="contact_number" required>
                            <span class="bar"></span>
                            <label>Contact Number<sup style="color: red">*</sup></label>
                          </div>
                          </div>
                        </div>
                        
                            <div class="col-md-12">
                        <div class="col-md-5">
                        <label for='optionsRadios2'>Gender<sup style="color: red">*</sup></label>
                          <label class="col-sm-offset-1 form-group radio ct-green">
                          <input class="form-group" type="radio" name="gender" data-toggle="radio" value="1" checked>
                          <i></i>Male
                          </label>
                           <label class="col-sm-offset-1 form-group radio ct-green">
                          <input class="form-group" type="radio" name="gender" data-toggle="radio"  value="2">
                          <i></i>Female
                          </label>
                        </div>
                        <div class="col-md-7">
                           <div class="form-group form-animate-text">
                            <input type="text" class="form-text" id="validate_firstname" name="validate_firstname" required>
                            <span class="bar"></span>
                            <label>Address<sup style="color: red">*</sup></label>
                          </div>
                        </div>
                        </div>
                        </div>
                        
                         <div class="col-sm-4" style="padding: 0px; margin: 0px;">
                         <div class="picture-container">
                              <div class="picture">
                                  <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                  <input type="file" id="wizard-picture" name="img">
                              </div>
                              <h6>Choose Picture</h6>
                          </div>
                      </div>
                                 
                              </div>
                            </div>
                            
                            <div class="tab-pane" id="account">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text">Create your Account</h4>
                                    </div>
                                    <div class="col-sm-6 col-sm-offset-3">
                                          <div class="form-group form-animate-text">
                            <input type="text" class="form-text"  name="fname" required>
                            <span class="bar"></span>
                            <label >Email Address<sup style="color: red">*</sup></label>
                          </div>
                                    </div>
                                   <div class="col-sm-6 col-sm-offset-3">
                                          <div class="form-group form-animate-text">
                            <input type="password" class="form-text"  name="fname" required>
                            <span class="bar"></span>
                            <label>Password<sup style="color: red">*</sup></label>
                          </div>
                                    </div>
                                   <div class="col-sm-6 col-sm-offset-3">
                                          <div class="form-group form-animate-text">
                            <input type="password" class="form-text"  name="fname" required>
                            <span class="bar"></span>
                            <label>Confirm Password<sup style="color: red">*</sup></label>
                          </div>
                                    </div>
                                 
                                </div>
                            </div>
                            <div class="tab-pane" id="feature">
                                <h4 class="info-text"></h4>
                                <div class="row">
                                   
                                    
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-6">
                                            <div class="choice active" data-toggle="wizard-radio">
                                                <input type="radio" name="jobb" value="1" >
                                                <div class="icon">
                                                    <i class="fa fa-lock"></i>
                                                </div>
                                                <h6>Free</h6>
                                                <p>
                                                  <p>Grants limited access to some features of this <br>system.</p>
                                                </p>
                                            </div>
                                        </div>
                                      
                                        <div class="col-sm-6">
                                            <div class="choice" data-toggle="wizard-radio">
                                                <input type="radio" name="jobb" value="2">
                                                <div class="icon">
                                                    <i class="fa fa-unlock"></i>
                                                </div>
                                                <h6>Premmium</h6>
                                                <p>Grants full access to all features of this <br>system.</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd btn-sm' name='next' value='Next' />
                                <button type='submit' class='btn btn-finish btn-fill btn-success btn-wd btn-sm' name='finish' >Finish</button>
        
                            </div>
                            
                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>  
                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
    </div> 
<div class="container">
<div class="col-md-12">

  
</div>
<!-- end main --></div>
</div>
  <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

  <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
  <script src="assets/js/gsdk-checkbox.js"></script>
  <script src="assets/js/gsdk-radio.js"></script>
  <script src="assets/js/gsdk-bootstrapswitch.js"></script>
  <script src="assets/js/get-shit-done.js"></script>
    <script src="assets/js/custom.js"></script>
<script src="scripts.js"></script>  
    <script src="assets/js/custom.js"></script>
      

<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
  <script src="assets/js/wizard.js"></script>
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