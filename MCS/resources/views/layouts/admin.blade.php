<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="../img/icon.png"/>
  <title>Admin | Margareth's Catering</title>
  <link rel="icon" type="image/gif" href="ggg.png"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- FORM VALIDATION -->
  <link rel="stylesheet" href="{{ asset('formvalidation/dist/css/formValidation.min.css') }}">
  
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('LTE/bootstrap/css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('LTE/plugins/datatables/dataTables.bootstrap.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('LTE/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('LTE/dist/css/skins/_all-skins.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/iCheck/flat/blue.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/morris/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  
  <!-- Bootstrap time PickeSr -->
  <link rel="stylesheet" href="{{ asset('LTE/timepicker/bootstrap-timepicker.min.css') }}">
  <!-- Select -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('LTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('LTE/plugins/datatables/dataTables.bootstrap.min.css') }}">

  <link href="{{ asset('LTE/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('LTE/fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet" media="print" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition skin-red-light sidebar-mini">
<div class="wrapper">

  
    <header class="main-header">
    <!-- Logo -->
    <a href="/DashboardPage" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><i>Margareth's Catering</i></b>  </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
         <a style="text-align:center;" class="logo pull-right" href="/Logout"><span class="fa fa-sign-out"></span><b> Log out</b> </a>
    </nav>
  </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" style="font-size: 20px">
            
            <li class="treeview">
              <a href="DashboardPage">
                <i class="fa fa-home"></i> <span>Home</span>
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
                    <a href="DishPage"><i class="fa fa-circle-o"></i> Dish
                      <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="active"><a href="/DishPage"><i class="fa fa-square-o"></i> Dish List</a></li>
                      <li><a href="/DishTypePage"><i class="fa fa-square-o"></i> Dish Type</a></li>
                    </ul>
                  </li>
                  <li class="active treeview">
                    <a href="/EmployeeTypePage"><i class="fa fa-circle-o"></i> Employee
                    </a>
                  </li>
                  <li>
                    <a href="/EquipmentPage"><i class="fa fa-circle-o"></i> Equipment
                    <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="/EquipmentPage"><i class="fa fa-square-o"></i> Equipment List</a></li>
                      <li><a href="/EquipmentTypePage"><i class="fa fa-square-o"></i> Equipment Type</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="/EventPage"><i class="fa fa-circle-o"></i> Event</a>
                  </li>
                  <li>
                    <a href="/LocationPage"><i class="fa fa-circle-o"></i> Location</a>
                  </li>
                  <li>
                    <a href="/PackagePage"><i class="fa fa-circle-o"></i> Package</a>
                  </li>
                  <li>
                    <a href="/ServicePage"><i class="fa fa-circle-o"></i> Service
                      <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li>
                        <a href="/ServicePage"><i class="fa fa-square-o"></i> Service List</a>
                      </li>
                      <li>
                        <a href="/ServiceTypePage"><i class="fa fa-square-o"></i> Service Type</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="/UOMPage"><i class="fa fa-circle-o"></i> Unit Of Measurement</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="/ReservationPage">
                <i class="fa fa-file-text-o"></i> <span>Reservation</span>
              </a>
            </li>

            <li class="treeview">
              <a href="/InventoryEquipmentPage">
                <i class="fa fa-book"></i><span>Inventory</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/InventoryEquipmentPage"><i class="fa fa-square-o"></i> Equipment</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="/PurchaseOrderPage">
                <i class="fa fa-shopping-cart"></i><span>Purchase Order</span>
              </a>
              <!-- <ul class="treeview-menu">
                <li><a href="/PurchaseOrderPage"><i class="fa fa-circle-o"></i> List</a></li>
                <li><a href="/UOMPage"><i class="fa fa-circle-o"></i> Unit Of Measurement</a></li>
              </ul> -->
            </li>

            <li class="treeview">
              <a href="/TransactionPage">
                <i class="fa fa-file-text"></i> <span>Transactions</span>
              </a>  
            </li>

            <li class="treeview">
              <a href="/QueryPage">
                <i class="fa fa-line-chart"></i> <span>Queries</span>
              </a>  
            </li>

            <li class="treeview">
              <a href="ReportPage">
                <i class="fa fa-pencil-square-o"></i> <span>Reports</span>
              </a>  
            </li>

          </ul>
        </section>
      <!-- /.sidebar -->
      </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('LTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>


  <!-- FORM VALIDATION -->
  <link rel="stylesheet" href="{{ asset('formvalidation/dist/js/formValidation.min.js') }}">

<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('LTE/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
<script src="{{ asset('LTE/plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('LTE/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('LTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('LTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('LTE/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('LTE/https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js') }}"></script>
<script src="{{ asset('LTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('LTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('LTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('LTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('LTE/plugins/fastclick/fastclick.js') }}"></script>

<!-- CHart-->
<script src="{{ asset('LTE/plugins/chartjs/Chart.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('LTE/dist/js/app.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('LTE/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('LTE/dist/js/demo.js') }}"></script>
<script src="{{ asset('LTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('LTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('LTE/timepicker/bootstrap-timepicker.min.js') }}"></script>
  @yield('script')
</body>
</html>
