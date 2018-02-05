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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-black sidebar-mini">
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
                  <li><a href="location.php"><i class="fa fa-circle-o"></i> Location</a></li>
                  <li><a href="package.php"><i class="fa fa-circle-o"></i> Packages</a></li>
                  <li><a href="service.php"><i class="fa fa-circle-o"></i> Services</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar"></i> <span>Schedule</span>
              </a>
            </li>

            <li class="active">
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
      <h1>
        Reservation
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-calendar"></i> Reservation</a></li>
      </ol>
    </section>


    <div id="content" class="col-md-12">
    <!-- Main content -->
    <section class="content">
            <div class="row">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Reservation</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Customer Name</th>
                    <th>Contact Number</th>
                    <th>Email Address</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = "SELECT * FROM customertbl where customerStatus = 1";
                      $result = mysqli_query($connect,$query);
                      while($row=mysqli_fetch_array($result)):
                        $customerID=$row['customerID'];
                        $fullName=$row['fullName'];
                        $homeAddress=$row['homeAddress'];
                        $billingAddress = $row['billingAddress'];
                        $emailAddress = $row['emailAddress'];
                        $contactNum = $row['contactNum'];
                        $customerAvail = $row['customerAvail'];
                    ?>
                    <tr>
                      <td><?php echo $fullName;?></td>
                      <td><?php echo $contactNum;?></td>
                      <td><?php echo $emailAddress;?></td>
                      <td><?php echo $billingAddress;?></td>
                      <td width="150px">
                      <?php
                        if($customerAvail==0){
                        ?>
                          <a class="btn btn-warning btn-sm" data-toggle="modal" href="#enableModal<?php echo $row['customerID'];?>"><i class="fa fa-refresh"></i> Pending </a>
                        <?php
                        } else{ 
                        ?>
                          <a class="btn btn-success btn-sm" data-toggle="modal" href="#disableModal<?php echo $row['customerID'];?>"><i class="fa fa-check"></i> Confirmed </a>
                        <?php
                          }
                        ?>
                     </td>
                      <td width="210px">
                        <a class="btn btn-primary  btn-sm" data-toggle="modal"  href="#vieDetailsModal<?php echo $row['customerID'];?>"><i class="fa fa-trash fa-fw"></i> View Details</a>
              
                        <a class="btn btn-danger  btn-sm" data-toggle="modal"  href="#cancelModal<?php echo $row['customerID'];?>"><i class="fa fa-trash fa-fw"></i> Cancel</a>
                      </td>
                    </tr><!-- Enable Employee Modal-->
                    
                    <div class="modal fade" id="enableModal<?php echo $row['customerID']?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <form role="form" method="POST" action="enable_customer.php" class="form-horizontal">
                            
                            <div class="modal-body">

                              <div class="form-group" style="display: none;">
                                <label class="col-sm-4 control-label">Customer ID</label>
                                <div class="col-sm-5 input-group">
                                  <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                  <input type="text" class="form-control" name="enableCustomerID" value="<?php echo $row['customerID']?>" readonly="">
                                </div>
                              </div>

                              <div>
                                <h5>Confirm the reservation?</h5>
                              </div>

                              <div style="text-align: center;">
                                <button type="submit" name="enableCustomerBtn" class="btn btn-primary btn-sm text-left" >Confirm</button>
                                <button data-dismiss="modal" class="btn btn-primary btn-sm text-left" >Cancel</button>
                                <!-- <script>
                                  $('#enableModal').modal('hide');
                                </script> -->
                              </div>

                            </div>
                              
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- End Modals-->

                    <!-- Disable Employee Modal-->
                    <div class="modal fade" id="disableModal<?php echo $row['customerID']?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <form role="form" method="POST" action="disable_customer.php" class="form-horizontal">
                            
                            <div class="modal-body">

                              <div class="form-group" style="display: none;">
                                <label class="col-sm-4 control-label">Customer ID</label>
                                <div class="col-sm-5 input-group">
                                  <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                  <input type="text" class="form-control" name="disableCustomerID" value="<?php echo $row['customerID']?>" readonly="">
                                </div>
                              </div>

                              <div>
                                <h5>?</h5>
                              </div>

                              <div style="text-align: center;">
                                <button type="submit" name="disableCustomerBtn" class="btn btn-default btn-sm text-left" >Confirm</button>
                                <button data-dismiss="modal" class="btn btn-default btn-sm text-left" >Cancel</button>
                                <!-- <script>
                                  $('#enableModal').modal('hide');
                                </script> -->
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
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

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
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
