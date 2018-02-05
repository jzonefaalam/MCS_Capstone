  <?php
  include "dbcon.php";
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Margareths Catering Service</title>
    <link rel="icon" type="image/gif" href="ggg.png"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="dist_1/css/bootstrapValidator.css"/>
    <script src="sweetalert-master/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css">
  </head>

  <body class="hold-transition skin-black sidebar-mini">

  <?php
    $message = isset($_GET['message'])?intval($_GET['message']):0;
    
    if($message == 1) {
      echo "<script> swal('Data insertion failed!', ' ', 'error'); </script>";
    }
    
    if($message == 2) {
      echo "<script> swal('Added succesfully!', ' ', 'success'); </script>";
    }
    
    if($message == 3) {
      echo "<script> swal('Data update failed!', ' ', 'error'); </script>";
    }
    
    if($message == 4) {
      echo "<script> swal('Updated succesfully!', ' ', 'success'); </script>";
    }
    
    if($message == 5) {
      echo "<script> swal('Data deletion failed!', ' ', 'error'); </script>";
    }
    
    if($message == 6) {
      echo "<script> swal('Deleted succesfully!', ' ', 'success'); </script>";
    }

    if($message == 7) {
      echo "<script> swal('Data insertion failed!', 'Image file is invalid!', 'error'); </script>";
    }

    if($message == 8) {
      echo "<script> swal('Data insertion failed!', 'Image file size is invalid!', 'error'); </script>";
    }

    if($message == 9) {
      echo "<script> swal('Data insertion failed!', 'Location is already existing!', 'error'); </script>";
    }
  ?>

    <div class="wrapper">
      <header class="main-header">
      <!-- Logo -->
      <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src ="logo2.png" width="50%" > </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Margareth's</b>Catering</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a  class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Administrator</span>
              </a>
              <ul class="dropdown-menu">
              <!-- User image -->
                <li class="user-header">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p> Alexander Pierce - Web Developer<small>Member since Nov. 2012</small></p>
                </li>
              </ul>
            </li>
            <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-times"></i></a>
            </li>
          </ul>
        </div>
      </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" style="font-size: 20px">
            
            <li class="treeview">
              <a href="dashboard.php">
                <i class="fa fa-home"></i> <span>Dashboard</span>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-wrench"></i> <span>Maintenance</span>
                <span class="pull-right-container">
                  <i class="fa fa-caret-right pull-right"></i>
                </span>
              </a>
                <ul class="treeview-menu">
                  <li class="active treeview">
                    <a href="menu.php"><i class="fa fa-circle-o"></i> Dish
                      <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="active"><a href="menu.php"><i class="fa fa-square-o"></i> Dish List</a></li>
                      <li><a href="menu_type.php"><i class="fa fa-square-o"></i> Dish Type</a></li>
                    </ul>
                  </li>
                  <li class="active treeview">
                    <a href="employee.php"><i class="fa fa-circle-o"></i> Employee
                      <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="employee.php"><i class="fa fa-square-o"></i> Employee List</a></li>
                      <li><a href="employee_type.php"><i class="fa fa-square-o"></i> Employee Type</a></li>
                    </ul>
                  </li><li><a href="equipment.php"><i class="fa fa-circle-o"></i> Equipment</a></li>
                  <li><a href="event.php"><i class="fa fa-circle-o"></i> Event</a></li>
                  <li><a href="location.php"><i class="fa fa-circle"></i> Location</a></li>
                  <li><a href="package.php"><i class="fa fa-circle-o"></i> Packages</a></li>
                  <li><a href="service.php"><i class="fa fa-circle-o"></i> Services</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar"></i> <span>Schedule</span>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-text-o"></i> <span>Reservation</span>
              </a>
            </li>

          </ul>
        </section>
      <!-- /.sidebar -->
      </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <br>
        <ol class="breadcrumb">
          <li><a href="menu.php"><i class="fa fa-wrench"></i> Maintenance</a></li>
          <li class="active"><a href = "#"><i class="fa fa-map-pin"></i>Location</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="box box-primary">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Locations</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" data-target="#addLocationModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> ADD LOCATION
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-stripped table-bordered">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Location Name</th>
                  <th>Location Description</th>
                  <th>Location Address</th>
                  <th>Contact Person</th>
                  <th>Contact Number</th>
                  <th>Location Capacity</th>
                  <th>Location Fee</th>
                  <th>Actions</th><th>Toggle</th>
                    
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM locationtbl where locationStatus = 1";
                  $result = mysqli_query($connect,$query);
                  while($row=mysqli_fetch_array($result)):
                    $locationID=$row['locationID'];
                    $locationName=$row['locationName'];
                    $locationContactPerson=$row['locationContactPerson'];
                    $locationContactNumber=$row['locationContactNumber'];
                    $locationCapacity=$row['locationCapacity'];
                    $locationFee=$row['locationFee'];
                    $locationDescription=$row['locationDescription'];
                    $locationAddress = $row['locationAddress'];
                    $locationAvailability=$row['locationAvailability'];
                    $locationImage=$row['imageName'];
                    
                ?>
                <tr>
                  <td width="100px"><?php echo "<img alt='Image Not Available' width='100' src='images/".$row['imageName']."'"; ?></td>
                  <td><?php echo $locationName;?></td>
                  <td><?php echo $locationDescription;?></td>
                  <td width="130px"><?php echo $locationAddress;?></td>
                  <td width="120px"><?php echo $locationContactPerson;?></td>
                  <td width="100px"><?php echo $locationContactNumber;?></td>
                  <td width="80px"><?php echo $locationCapacity;?></td>
                  <td width="80px"><?php echo $locationFee;?></td>
                  <td width="200px">
						 
						 <a class="btn btn-success btn-sm" 
              data-id="<?php echo $locationID; ?>"
							data-name="<?php echo $locationName; ?>" 
							data-desc="<?php echo $locationDescription; ?>" 
							data-add="<?php echo $locationAddress; ?>" 
							data-person="<?php echo $locationContactPerson; ?>" 
							data-num="<?php echo $locationContactNumber; ?>" 
							data-capacity="<?php echo $locationCapacity; ?>" 
							data-fee="<?php echo $locationFee; ?>" 
              data-images1="images/<?php echo $locationImage; ?>" 
							onclick=" 
                $('#editLocationID').val($(this).data('id')); 
                $('#editLocationName').val($(this).data('name')); 
                $('#tempName').val($(this).data('name'));
								$('#editLocationDesc').val($(this).data('desc')); 
								$('#editLocationAdd').val($(this).data('add')); 
								$('#editLocationContactPerson').val($(this).data('person'));  	 
								$('#editLocationContactNumber').val($(this).data('num')); 
								$('#editLocationCapacity').val($(this).data('capacity')); 
								$('#editLocationPrice').val($(this).data('fee'));  		
                $('#editLocationImage').attr('value',$(this).data('images1')); 					

								$('#editLocationModal').modal('show')" 
							data-toggle="modal"><i class="fa fa-wrench"></i> Update</a>
					
                    <a class="btn btn-danger btn-sm" data-toggle="modal"  href="#deleteLocationModal<?php echo $row['locationID'];?>"><i class="fa fa-trash fa-fw"></i> Delete</a>
                  </td>
                  <td width="100px">
                  <?php
                    if($locationAvailability==0){
                    ?>
                      <a class="btn btn-info btn-sm" data-toggle="modal" href="#enableModal<?php echo $row['locationID'];?>"><i class="fa fa-cog fa-fw"></i> Enable</a>
                    <?php
                    } else{ 
                    ?>
                      <a class="btn btn-warning btn-sm" data-toggle="modal" href="#disableModal<?php echo $row['locationID'];?>"><i class="fa fa-cog fa-fw"></i> Disable</a>
                    <?php
                      }
                    ?>
                 </td>
                </tr>

                <!-- Disable Location -->
                <div class="modal fade" id="disableModal<?php echo $row['locationID']?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="disable_location.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Location ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="locationID" value="<?php echo $row['locationID']?>" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5> Are you sure you want to deactive this location? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="disableLocationBtn" class="btn btn-default">Yes</button>
                            <button data-dismiss="modal" class="btn btn-default">No</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END -->

                <!-- Enable Location -->
                <div class="modal fade" id="enableModal<?php echo $row['locationID']?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="enable_location.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Location ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="locationID" value="<?php echo $row['locationID']?>" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5> Are you sure you want to activate this location? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="enableLocationBtn" class="btn btn-default">Yes</button>
                            <button data-dismiss="modal" class="btn btn-default">No</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END -->

                <!-- editlocation Modal-->
                <div class="modal fade" id="deleteLocationModal<?php echo $row['locationID']?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form id="editlocationForm" role="form" method="POST" action="deleteItems.php" class="form-horizontal" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Location ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="deleteLocationID" value="<?php echo $row['locationID']?>" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5> Are you sure you want to delete this location? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="deleteLocationBtn" class="btn btn-primary btn-sm">Confirm</button>
                            <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modals-->

                

                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
          <!-- /.box -->
		  
                    <!-- editlocation Modal-->
                    <div class="modal fade" id="editLocationModal<?php echo $row['locationID']?>">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <form id="editLocationForm" role="form" method="POST" action="editItems.php" class="form-horizontal" enctype="multipart/form-data">

                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">UPDATE LOCATION</h4>
                      </div>

                      <div class="modal-body">

                      <div class="form-group" style="display:none;">
                      <label class="col-sm-4 control-label">Location ID</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationID" id="editLocationID" value="<?php echo $row['locationID']?>" readonly="">
                      </div>
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="col-sm-4 control-label">Location Name</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-map-signs" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationName" id="editLocationName" placeholder="Location Name" data-error="This field is required">
                      </div>
                      </div>
                      </div>


<input type="text" class="form-control" name="tempName" id="tempName" style="display: none;">


                      <div class="form-group has-feedback">
                      <label class="col-sm-4 control-label"> Address</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-map-o" aria-hidden="true"></i></span>
                      <textarea type="text" class="form-control" name="editLocationAdd" id="editLocationAdd" placeholder="Location Address"></textarea>
                      </div>
                      </div>
                      </div>

                      <div class="form-group has-feedback">
                      <label class="col-sm-4 control-label"> Description</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                      <textarea type="text" class="form-control" name="editLocationDesc" id="editLocationDesc" placeholder="location Description"></textarea>
                      </div>
                      </div>
                      </div>

                      <div class="form-group ">
                      <label class="col-sm-4 control-label">Contact Person</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationContactPerson" id="editLocationContactPerson" placeholder="Location Price" >
                      </div>
                      </div>
                      </div>

                      <div class="form-group ">
                      <label class="col-sm-4 control-label">Contact Number</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationContactNumber" id="editLocationContactNumber" placeholder="Location Price">
                      </div>
                      </div>
                      </div>

                      <div class="form-group ">
                      <label class="col-sm-4 control-label"> Capacity</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationCapacity" id="editLocationCapacity" placeholder="Location Capacity">
                      </div>
                      </div>
                      </div>

                      <div class="form-group ">
                      <label class="col-sm-4 control-label"> Fee</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-rouble" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationPrice" id="editLocationPrice" placeholder="location Price">
                      </div>
                      </div>
                      </div>

                      <div class="form-group has-feedback">
                      <label class="col-sm-4 control-label">Location Image</label>
                      <div class="col-sm-6">
                      <div class="input-group">
                      <div class="input-group-addon">
                      <input type="file" name="editLocationImage" id="editLocationImage" class="form-control">
                      </div>
                      </div>
                      </div>
                      </div>

                      </div>



                      <div class="modal-footer">
                      <button type="submit" name="editLocationBtn" class="btn btn-primary">Submit</button>
                      </div>
                      </form>
                      </div>
                      </div>
                    </div>
                    <!-- End Modals-->

        <!-- addlocation Modal-->
                    <div class="modal fade" id="addLocationModal">
                      <div class="modal-dialog">
                        <div class="modal-content">
                        <form id="addLocationForm" role="form" method="POST" action="addItems.php" class="form-horizontal" enctype="multipart/form-data">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">ADD LOCATION</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Location Name</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-map-signs" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationName" placeholder="Location Name"
                                data-error="This field is required">
                              </div>
                              </div>
                            </div>
                            <div class="form-group has-feedback">
                              <label class="col-sm-4 control-label"> Description</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-quote-right" aria-hidden="true"></i></div>
                                <textarea type="text" class="form-control" name="addLocationDescription" placeholder="Location Description"></textarea>
                              </div>
                            </div>
                            </div>
                            <div class="form-group has-feedback">
                              <label class="col-sm-4 control-label"> Address</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-map-o" aria-hidden="true"></i></div>
                                <textarea type="text" class="form-control" name="addLocationAddress" placeholder="Location Address"></textarea>
                              </div>
                            </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-sm-4 control-label">Contact Person</label>
                             <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-user" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationContactPerson" placeholder="Full Name">
                                </div>
                            </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-sm-4 control-label">Contact Number</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-phone" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationContactNumber" placeholder="Contact Number">
                              </div>
                            </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-sm-4 control-label"> Capacity</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-users" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationCapacity" placeholder="Location Capacity">
                              </div>
                              </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-sm-4 control-label"> Fee</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-rouble" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationFee" placeholder="Location Fee">
                              </div>
                            </div>
                            </div>

                            <div class="form-group has-feedback">
                              <label class="col-sm-4 control-label">Location Image</label>
                             <div class="col-sm-6">
                              <div class="input-group">
                               <div class="input-group-addon">
                                <input type="file" name="addLocationImage">
                              </div>
                              </div>
                            </div>


                          </div>
                          <div class="modal-footer">
                            <button type="submit" name="addLocationBtn" class="btn btn-primary">Submit</button>
                          </div>
                      </form>
                      </div>
                    </div>
                  </div>
        <!-- End Modals-->

        

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->
    

    <!--                                                          JAVASCRIPTS                                          -->
    <!-- jQuery 2.2.3 -->
     <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/validator.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
      
      $(document).ready(function() {
          $('#addLocationForm').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            
            fields: {
              addLocationName: {
                validators: {
                  regexp: {
				  regexp: /^[0-9a-zA-Z]+([\S-'@ ]+[0-9a-zA-Z]+)*$/,
                    message: 'Please supply a valid location name.'
                  },
                  notEmpty: {
                    message: 'Please supply the location name.'
                  },
                  remote: {
                    url: 'checklocationname.php',
                    message: 'This location already exists!'
                  }
                }
              },
        
              addLocationDescription: {
                validators: {
                  stringLength: {
                    max: 50,
                    message: 'The system allows 50 characters only.'
                  },
                }
              },
        
              addLocationAddress: {
                validators: {
                  regexp: {
					regexp: /^[0-9a-zA-Z]+([\S-'@ ]+[0-9a-zA-Z]+)*$/,
                    message: 'Please supply a valid location name.'
                  },
                  notEmpty: {
                    message: 'Please supply the location address.'
                  }
                }
              },
			  
              addLocationContactPerson: {
                validators: {
                  regexp: {
				  regexp: /^[a-zA-Z]+([\S-' ]+[a-zA-Z]+)*$/,
                    message: 'This can only consist of alphabetical letters, hyphens and apostrophe only.'
                  },
                  notEmpty: {
                    message: 'Please supply the contact name.'
                  },
                }
              },
        
              addLocationContactNumber: {
                validators: {
                  regexp: {
                    regexp: /^[1-9(0)]+$/,
                    message: 'The input is invalid.'
                  },
                  notEmpty: {
                    message: 'Please supply the contact number.'
                  },
                  stringLength: {
                    min: 1,
                    max: 13,
                    message: 'The system allows 4 digits of input only.'
                  }
                }
              },
        
              addLocationCapacity: {
                validators: {
                  regexp: {
                    regexp: /^\d{0,3}?$/,
                    message: 'The input is invalid.'
                  },
                  notEmpty: {
                    message: 'Please enter total capacity.'
                  },

                }
              },
        
              addLocationFee: {
                validators: {
                  regexp: {
                    regexp: /^\d{0,6}(\.\d{0,2})?$/,
                    message: 'Invalid input.'
                  },
                  stringLength: {
                    max: 6,
                    message: 'Maximum price length is 6 digits.'
                  },
                  notEmpty: {
                    message: 'Please supply the location fee.'
                  }
                }
              },

              addLocationImage: {
                validators: {
                  notEmpty: {
                    message: 'Please insert location image.'
                  }
                }
              }
            }
          })
        });

    </script>
	
	<script type="text/javascript">
      
      $(document).ready(function() {
          $('#editLocationForm').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            
            fields: {
              editLocationName: {
                validators: {
                  regexp: {
				  regexp: /^[0-9a-zA-Z]+([\S-'@ ]+[0-9a-zA-Z]+)*$/,
                    message: 'Please supply a valid location name.'
                  },
                  notEmpty: {
                    message: 'Please supply the location name.'
                  },
                  stringLength: {
                    max: 50,
                    message: 'The system allows 50 characters only.'
                  }
                }
              },
        
              editLocationDesc: {
                validators: {
                  stringLength: {
                    max: 50,
                    message: 'The system allows 50 characters only.'
                  },
                }
              },
        
              editLocationAdd: {
                validators: {
                  regexp: {
					regexp: /^[0-9a-zA-Z]+([\S-'@ ]+[0-9a-zA-Z]+)*$/,
                    message: 'Please supply a valid location name.'
                  },
                  notEmpty: {
                    message: 'Please supply the location address.'
                  }
                }
              },
			  
              editLocationContactPerson: {
                validators: {
                  regexp: {
				  regexp: /^[a-zA-Z]+([\S-' ]+[a-zA-Z]+)*$/,
                    message: 'This can only consist of alphabetical letters, hyphens and apostrophe only.'
                  },
                  notEmpty: {
                    message: 'Please supply the contact name.'
                  }
                }
              },
        
              editLocationContactNumber: {
                validators: {
                  regexp: {
                    regexp: /^[1-9(0)]+$/,
                    message: 'The input is invalid.'
                  },
                  notEmpty: {
                    message: 'Please supply the contact number.'
                  },
                  stringLength: {
                    max: 13,
                    message: 'The system allows 13 characters only.'
                  }

                }
              },
        
              editLocationCapacity: {
                validators: {
                  regexp: {
                    regexp: /^\d{0,3}?$/,
                    message: 'The input is invalid.'
                  },
                  notEmpty: {
                    message: 'Please supply the contact number.'
                  }
                }
              },
        
              editLocationPrice: {
                validators: {
                  regexp: {
                    regexp: /^\d{0,6}(\.\d{0,2})?$/,
                    message: 'Invalid input.'
                  },
                  stringLength: {
                    max: 6,
                    message: 'Maximum price length is 6 digits.'
                  },
                  notEmpty: {
                    message: 'Please supply the location price.'
                  }
                }
              },
            }
          })
        });

    </script>

    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script><!-- 
    <script type="text/javascript" src="vendor/jquery/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist_1/js/bootstrapValidator.js"></script>
     -->
     
  </body>

</html>