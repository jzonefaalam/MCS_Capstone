<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="../img/icon.png"/>
  <title>Admin | Margareth's Catering</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('LTE/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('LTE/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('LTE/dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('LTE/plugins/datatables/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('LTE/plugins/datatables/dataTables.bootstrap.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link href="{{ asset('LTE/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('LTE/fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet" media="print" />
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/datepicker/bootstrap-datepicker.min.css') }}">
  
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
              <a href="/InventoryDishPage">
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- Notifications -->
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">asdasdas</h3>
              <div class="box-tools pull-right">
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <!-- Table for Upcoming events -->
                  <table class="table table-bordered table-striped dataTable" id="eventTable">
                    <thead>
                      <tr>
                        <th >Upcoming Events</th>
                        <th style="display: none;" >Reservation ID</th>
                        <th style="display: none;">Event ID</th>
                        <th style="display: none;">Package ID</th>
                        <th style="display: none;">Customer ID</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                  <hr>

                  <!-- Table for Payments -->
                  <table class="table table-bordered table-striped dataTable" id="paymentTable">
                    <thead>
                      <tr>
                        <th>Payments</th>
                        <th style="display: none;">Reservation ID</th>
                        <th style="display: none;">Event ID</th>
                        <th style="display: none;">Package ID</th>
                        <th style="display: none;">Customer ID</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($latestPayments as $latestPayments)
                      <tr>
                          <td>
                            <a >{{ $latestPayments -> eventName}}</a>
                            <?php if ( ($latestPayments->transactionStatus) == 1 ): ?> 
                              <small style="width: 100px;" class="label label-warning pull-right">
                                Pending Payment
                              </small>
                            <?php endif ?>
                            <?php if ( ($latestPayments->transactionStatus) == 2 ): ?> 
                              <small style="width: 100px;" class="label label-warning pull-right">
                                Fully Paid
                              </small>
                            <?php endif ?>
                            <?php if ( ($latestPayments->transactionStatus) == 3 ): ?> 
                              <small style="width: 100px;" class="label label-warning pull-right">
                                Half Paid
                              </small>
                            <?php endif ?>
                            <?php if ( ($latestPayments->transactionStatus) == 5 ): ?> 
                              <small style="width: 100px;" class="label label-warning pull-right">
                                Pending: Additional Payment
                              </small>
                            <?php endif ?>
                          </td>
                          <td style="display: none;">{{ $latestPayments->reservationID }}</td>
                          <td style="display: none;">{{ $latestPayments->eventID }}</td>
                          <td style="display: none;">{{ $latestPayments->packageID }}</td>
                          <td style="display: none;">{{ $latestPayments->customerID }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <hr>

                  <!-- Table for New Reservations-->
                  <table class="table table-bordered table-striped dataTable" id="notificationTable">
                      <thead>
                      <tr>
                        <th style="display:none">Reservation ID</th>
                        <th style="display:none">Event Name</th>
                        <th style="display:none">Customer Name</th>
                        <th style="display:none" width="130 px">Date</th>
                        <th style="display:none">Package</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th style="display:none">Status</th>
                        <th width="150px">Newest Reservations</th> 
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($dashboardData as $dashboardData)
                        <tr>
                        <td style="display:none">{{ $dashboardData->reservationID }}</td>
                        <td style="display:none">{{ $dashboardData->eventName }}</td>
                        <td style="display:none">{{ $dashboardData->fullName }}</td>
                        <td style="display:none">{{ $dashboardData->eventDate }}</td>
                        <td style="display:none">{{ $dashboardData->packageName }}</td>
                        <td style="display:none">
                        <?php if (($dashboardData->reservationStatus)==0): ?>
                          <span class="label label-warning">Not Available</span>
                        <?php endif ?>
                        <?php if (($dashboardData->reservationStatus)==1): ?>
                          <span class="label label-success">Confirmed</span>
                        <?php endif ?>
                        <?php if (($dashboardData->reservationStatus)==2): ?>
                          <span class="label label-warning">Denied</span>
                        <?php endif ?>
                        </td>
                        <td style="display:none">{{ $dashboardData->homeAddress }} </td>
                        <td style="display:none">{{ $dashboardData->billingAddress }} </td>
                        <td style="display:none">{{ $dashboardData->emailAddress }} </td>
                        <td style="display:none">{{ $dashboardData->cellNum }} </td>
                        <td style="display:none">{{ $dashboardData->telNum }} </td>
                        <td style="display:none">{{ $dashboardData->dateOfBirth }} </td>
                        <td style="display:none">{{ $dashboardData->packageCost }} </td>
                        <td style="display:none">{{ $dashboardData->eventTime }} </td>
                        <td style="display:none">{{ $dashboardData->endTime }} </td>
                        <td style="display:none">{{ $dashboardData->eventLocation }} </td>
                        <td style="display:none">{{ $dashboardData->guestCount }} </td>
                        <td style="display:none">{{ $dashboardData->packageID }} </td>
                        <td style="display:none">{{ $dashboardData->eventID }} </td>
                        <td style="display:none">{{ $dashboardData->reservationStatus }} </td>
                        <td style="display:none">{{ $dashboardData->paymentTermID }} </td>
                        <td style="display:none">{{ $dashboardData->customerID }} </td>
                        <td style="display:none">{{ $dashboardData->eventDate }} </td>
                        <td style="display:none">{{ $dashboardData->fullName }} </td>
                        <td>
                            <a >{{ $dashboardData -> eventName}}</a>
                            <small class="label label-danger pull-right"><i class="fa fa-calendar-o"></i> {{ $dashboardData -> eventDate }} &nbsp {{ $dashboardData->eventTime }}</small>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                  </table>

                </div>
              </div>
              
            </div>
          </div>
        </div>
        <!-- End of Notifications -->

        <!-- Calendar -->
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>

            <!-- Update Modal -->
            <form id="scheduleForm" method="POST" action="SaveReservation">
            <div class="modal fade" id="detailModal" style="width:100%;">
            <div class="modal-dialog" style="width:70%; margin-top:3%; margin-left:15%;">
            <div class="modal-content">
            <div class="modal-header" style="width:100%;" >
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Update Reservation</h4>
            </div>

            <div class="row" style="width: 97%; padding-left: 6%">
              <div class="box box-danger">
                <div class="box-body">
                  <div class="row">
                    <div class="form-horizontal">

                      <div class="col-sm-6" style="padding-left: 70px; padding-right: 0px">
                        <h4 align="center"><strong><i>Customer Details</i></strong></h4>
                        <div class="form-group">
                          <label class="control-label col-sm-4">Customer Name</label>
                          <div>
                            <input type="text" class="form-control" id="editCustomerName" name="editCustomerName" column="20" style="width: 200px" required>
                            <input type="text"  name="reservationNumber" id="reservationNumber" style="display: none;">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-4">Home Address</label>
                          <div>
                            <input type="text" class="form-control" id="editHomeAddress" name="editHomeAddress" column="20" style="width: 200px" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-4">Email Address</label>
                          <div>
                            <input type="text" class="form-control" id="editEmailAddress" name="editEmailAddress" column="20" style="width: 200px" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-4">Contact Number</label>
                          <div>
                            <input type="text" class="form-control" id="editContactNumber" name="editContactNumber" column="20" style="width: 200px" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-4">Date of Birth</label>
                          <div>
                            <input type="text" class="form-control" id="editDateOfBirth" name="editDateOfBirth" column="20" style="width: 200px" required>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6" style="margin-right: 0px">
                        <h4 align="center"><strong><i>Event Details</i></strong></h4>

                        <div class="form-group">
                          <label class="control-label col-sm-4">Event Name</label>
                          <div>
                            <input type="text" class="form-control" id="editEventName" name="editEventName" column="20" style="width: 200px" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-4">Event Date</label>
                          <div>
                            <input type="text" class="form-control" id="editEventDate" name="editEventDate" column="20" style="width: 200px" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-4">Event Location</label>
                          <div>
                            <input type="text" class="form-control" id="editEventLocation" name="editEventLocation" column="20" style="width: 200px" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-4">Number of Guests</label>
                          <div>
                            <input type="text" class="form-control" id="editEventGuestCount" name="editEventGuestCount" column="20" style="width: 200px" required>
                          </div>
                        </div> 

                        <div class="form-inline" align="center">
                          <div class="form-group">
                            <label class="control-label col-sm-4">Start</label>
                            <input type="text" class="form-control" id="editEventStartTime" name="editEventStartTime" column="20" style="width: 80px" required>
                          </div> &nbsp &nbsp &nbsp

                          <div class="form-group">
                            <label class="control-label col-sm-4">End</label>
                            <input type="text" class="form-control" id="editEventEndTime" name="editEventEndTime" column="20" style="width: 80px" required>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <!-- End Row -->
                    
              <div class="box-body">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li style="width: 18%; text-align: center; font-size: 16px"><a href="#tab_2" data-toggle="tab">Package </a></li>
                    <li style="width: 19%; text-align: center; font-size: 16px"><a href="#tab_3" data-toggle="tab">Additional Food </a></li>
                    <li style="width: 23%; text-align: center; font-size: 16px"><a href="#tab_4" data-toggle="tab">Additional Equipment </a></li>
                    <li style="width: 19%; text-align: center; font-size: 16px"><a href="#tab_5" data-toggle="tab">Additional Service</a></li>
                    <li style="width: 18%; text-align: center; font-size: 16px"><a href="#tab_6" data-toggle="tab">Additional Staff </a></li>
                  </ul>
                  <div class="tab-content">

                    <!-- Package Tab -->
                    <div class="tab-pane active" id="tab_2">
                      <div class="box-header">
                        <h4><strong>Package Details</strong></h4>
                      </div>
                      <div class="box-body">
                        <div>
                          <label>Package Name</label> <br>
                          <div> 
                            <select class="form-control" name="editPackage" id="editPackage" onchange="dishInclusionChange(this.id)">
                              <option disabled>Select Package</option>
                              @foreach($packageData as $packageData)
                              <option value="{{ $packageData->packageID }}">{{ $packageData->packageName }} </option>
                              @endforeach
                            </select>
                          </div>
                        </div> <br>
                          
                        <h3><strong> Package Inclusions </strong></h3>
                        <div class="row">
                          <div class="col-sm-3">
                            <h4> Dish Included </h4>
                            <div id="dishInclusion">

                            </div>
                          </div>
                          <div class="col-sm-3">
                            <h4> Equipment Included </h4>
                            <div id="equipmentInclusion">

                            </div>
                          </div>
                          <div class="col-sm-3">
                            <h4> Services & Staff Included </h4>
                            <div id="serviceInclusion">

                            </div>
                          </div>
                          <div class="col-sm-3">
                            <h4> Services & Staff Included </h4>
                            <div id="employeeInclusion">

                            </div>
                          </div>
                        </div>
                        <!-- End Row -->
                      </div>
                      <!-- End Box -->
                    </div>
                    <!-- End Reservation Info Tab -->

                          <!-- Additional Food Tab -->
                          <div class="tab-pane" id="tab_3">
                              <div class="box-header">
                                <h4><strong>Additional Food Details</strong></h4>
                              </div>
                              <div class="box-body">
                              <h4> Lists </h4>
                                <div id="additionalDishDiv">

                                </div>
                              </div>
                            <!-- End Box -->
                          </div>
                          <!-- End Reservation Tab -->

                              {!! csrf_field() !!}
                          <input type="hidden" id="token" value="{{ csrf_token() }}">
                          <!-- Additional Equipment Tab -->
                          <div class="tab-pane" id="tab_4">
                              <div class="box-header">
                                <h4><strong>Additional Equipment Details</strong></h4>
                              </div>
                              <div class="box-body">
                                <h4> Lists </h4>
                                <div id="additionalEquipmentDiv">

                                </div>
                              </div>
                            <!-- End Box -->
                          </div>
                          <!-- End Reservation Info Tab -->

                          <!-- Additional Service & Staff Tab -->
                          <div class="tab-pane" id="tab_5">
                              <div class="box-header">
                                <h4><strong>Additional Service Details</strong></h4>
                              </div>
                              <div class="box-body">
                                <h4> Lists </h4>
                                <div id="additionalServiceDiv">

                                </div>
                              </div>
                            <!-- End Box -->
                          </div>
                          <!-- End Reservation Info Tab -->

                          <!-- Additional Service & Staff Tab -->
                          <div class="tab-pane" id="tab_6">
                              <div class="box-header">
                                <h4><strong>Additional Staff Details</strong></h4>
                              </div>
                              <div class="box-body">
                                <h4> Lists </h4>
                                <div id="additionalEmployeeDiv">

                                </div>
                            </div>
                            <!-- End Box -->
                          </div>
                          <!-- End Reservation Info Tab -->

                        </div>
                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div>
                  <!-- nav-tabs-custom -->
            </div>
            <div id="confirmationDiv" class="modal-footer" >
              <a  style="display:none;" data-target="#sendApproveEmailModal" data-toggle="modal" onclick="getReservation(document.getElementById('reservationNumber').value);" class="btn btn-app" type="submit">
                  <i class="fa fa-check" ></i> APPROVE
              </a>
              <a  data-target="#sendApproveEmailModal" data-toggle="modal" onclick="getReservation(document.getElementById('reservationNumber').value);" class="btn btn-app" type="submit">
                  <i class="fa fa-check" ></i> APPROVE
              </a>
              <a data-target="#sendDenyEmailModal" data-toggle="modal" onclick="getReservation(document.getElementById('reservationNumber').value);" class="btn btn-app" type="submit">
                  <i class="fa fa-times" ></i> DENY
              </a>
            </div>
            </div>
            </div>
            </div>
            </form>
                <!-- End Update Modal -->  

<!-- APPROVAL MODAL -->
  <form role="form" method="POST" action="ApproveReservationEmail" class="form-horizontal">
    <div class="modal fade" id="sendApproveEmailModal">
      <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 250px">
          <div class="modal-body">
            <div class="form-group" hidden>
              <label class="col-sm-4 control-label">Reservation Details</label>
              <div class="col-sm-5 input-group" >
                <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                <!-- IDs -->
                <input type="text" class="form-control" name="mailReservationID" id="mailReservationID" readonly="">
                <input type="text" class="form-control" name="mailCustomerID" id="mailCustomerID" readonly="">
                <input type="text" class="form-control" name="mailPackageID" id="mailPackageID" readonly="">
                <input type="text" class="form-control" name="mailEventID" id="mailEventID" readonly="">

                <!-- Customer Details -->
                <input type="text" class="form-control" name="mailCustomerName" id="mailCustomerName" readonly="">
                <input type="text" class="form-control" name="mailCustomerHomeAddress" id="mailCustomerHomeAddress" readonly="">
                <input type="text" class="form-control" name="mailCustomerEmailAddress" id="mailCustomerEmailAddress" readonly="">
                <input type="text" class="form-control" name="mailCustomerContactNumber" id="mailCustomerContactNumber" readonly="">
                <input type="text" class="form-control" name="mailCustomerBirthDate" id="mailCustomerBirthDate" readonly="">

                <!-- Event Details -->
                <input type="text" class="form-control" name="mailEventName" id="mailEventName" readonly="">
                <input type="text" class="form-control" name="mailEventDate" id="mailEventDate" readonly="">
                <input type="text" class="form-control" name="mailEventLocation" id="mailEventLocation" readonly="">
                <input type="text" class="form-control" name="mailEventGuestCount" id="mailEventGuestCount" readonly="">
                <input type="text" class="form-control" name="mailEventStartTime" id="mailEventStartTime" readonly="">
                <input type="text" class="form-control" name="mailEventEndTime" id="mailEventEndTime" readonly="">
                <input type="text" class="form-control" name="mailEventPaymentTerm" id="mailEventPaymentTerm" readonly="">

                <!-- Package Details -->
                <input type="text" class="form-control" name="mailPackageCost" id="mailPackageCost" readonly="">
                <input type="text" class="form-control" name="mailPackageAddOns" id="mailPackageAddOns" readonly="">

              </div>
            </div>
          </div>
          <!-- Token -->
          {!! csrf_field() !!}
          <!-- End Token -->
          <div align="center">
            <h4> Are you sure you want to approve this reservation? </h4>
          </div>
          <div style="text-align: center;">
            <button type="submit" class="btn btn-success btn-sm">Approve</button>
            <button data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
          </div>
          <br>
        </div>
        </div>
      </div>
    </div>
  </form>
<!-- End Modals-->

            <!-- Delete service Modal-->
            <form role="form" method="POST" action="DenyReservationEmail" class="form-horizontal">
            <div class="modal fade" id="sendDenyEmailModal">
              <div class="modal-dialog">
                <div class="modal-content" style="margin-top: 250px">
                   <div class="modal-body">
                      <div class="form-group" style="display:none;">
                        <label class="col-sm-4 control-label">Reservation ID</label>
                        <div class="col-sm-5 input-group" >
                          <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="denyReservationId" id="denyReservationId" readonly="">
                        </div>
                      </div>
                      {!! csrf_field() !!}
                      <div align="center">
                        <h4> Are you sure you want to deny this reservation? </h4>
                      </div>
                      <div style="text-align: center;">
                        <button type="submit" class="btn btn-danger btn-sm">Deny</button>
                        <button data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            </form>
            <!-- End Modals-->   
               
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- End of Calendar -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <!-- Event Modal -->
  <form id="eventForm" role="form" method="POST" action="#" class="form-horizontal">
    <div class="modal fade" id="eventModal" >
      <div class="modal-dialog" style="width:50%;">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="upcomingEventModal">Upcoming Event</h4>
            </div>
          <div class="modal-body">
            {!! csrf_field() !!}
            <div class="row" align="center" style="width: 97%; padding-left: 7%">
              <div class="box box-danger">
              <div class="box-body">
                <div class="row" style="padding-left: 9%">
                  <div class="col-md-6" align="left">
                    <label>Customer Name: </label>
                    <div id="eventModalCustomerName" style="display: inline-block;">
                      
                    </div>
                    <br>
                    <label>Event Name: </label>
                    <div id="eventModalEventName" style="display: inline-block;">
                      
                    </div>
                    <br>
                    <label>Event Date: </label>
                    <div id="eventModalEventDate" style="display: inline-block;">
                      
                    </div>
                  </div>
                  <div class="col-md-6" align="left">
                    <label>Contact Number: </label>
                    <div id="eventModalCustomerNumber" style="display: inline-block;">

                    </div>
                    <br>
                    <label>Package Availed: </label>
                    <div id="eventModalPackageAvailed" style="display: inline-block;">
                      
                    </div>
                    <br>
                    <label style="display: none;">Event Location: </label>
                    <div id="eventModalEventLocation" style="display: none;">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Box -->
            </div>
            <div class="row">
              <table class="table table-bordered table-striped dataTable" id="equipmentTbl" style="width:85%;" align="center">
                <thead>
                  <tr>
                    <th style="width: 250px">Equipment</th>
                    <th style="width: 200px">Equipment Quantity</th>
                  </tr>
                </thead>
                <tbody id="equipmentTblBody">
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer">
              <button id="assignEquipmentBtn" class="btn btn-primary" type="button">
                Assign Equipment
              </button>
              <button id="assessEquipmentBtn" type="button" href="#" style="display: none;" class="btn btn-default">Assessment of Equipment</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- End -->

  <!-- Assessment Modal Modal -->
  <form role="form" method="POST" class="form-horizontal" action="/AssessEquipment">
    <div class="modal fade" id="assessmentModal" >
      <div class="modal-dialog" style="width:50%;">
        <div class="modal-content">
          <div class="modal-body">
            {!! csrf_field() !!}
            <div class="row" align="center">
              <div class="box box-danger" style="width:95%;">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6" align="left">
                    <label>Customer Name: </label>
                    <div id="assessmentModalCustomerName" style="display: inline-block;">
                      
                    </div>
                    <br>
                    <label>Event Name: </label>
                    <div id="assessmentModalEventName" style="display: inline-block;">
                      
                    </div>
                    <br>
                    <!-- <label>Event Date: </label> -->
                    <input style="display:none;" type="text" id="assessmentModalReservationID" name="assessmentModalReservationID">
                    <input style="display:none;" type="text" id="assessmentModalPackageID" name="assessmentModalPackageID">
                    <input style="display:none;" type="text" id="assessmentTransactionID" name="assessmentTransactionID">
                    <input style="display:none;" type="text" id="assessmentItemCtr" name="assessmentItemCtr">
                    <input style="display:none;" type="text" id="assessmentAdditionalPayment" name="assessmentAdditionalPayment">
                  </div>
                  <div class="col-md-6" align="left">
                    <label>Guest Count: </label>
                    <div id="assessmentModalGuestCount" style="display: inline-block;">

                    </div>
                    <br>
                    <label>Package Availed: </label>
                    <div id="assessmentModalPackageName" style="display: inline-block;">
                      
                    </div>
                    <br>
                    <!-- <label>Event Location: </label> -->
                  </div>
                </div>
              </div>
            </div>
            <!-- End Box -->
            </div>
            <div class="row">
              <table id="equipmentAssessTbl" class="table table-striped table-bordered" style="width:95%;" align="center">
                  <thead>
                    <tr>
                      <th>Equipment Name</th>
                      <th>Equipment Quantity</th>
                      <th>Return Quantity</th>
                      <th style="display: none;">Equipment ID</th>
                      <th style="display: none;">Equipment ID</th>
                      <th style="display: none;">Equipment ID</th>
                    </tr>
                  </thead>
                  <tbody id="equipmentAssessTblBody">

                  </tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer">
              <button id="saveAssessEquipment" class="btn btn-default" type="submit">
                Save
              </button>
              <button type="button"  data-dismiss="modal"  data-toggle="modal" class="btn btn-default">Back</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- End -->

<!-- Assign Modal -->
<form id="assignForm" role="form" method="POST" action="/AssignEquipment" class="form-horizontal">
    <div class="modal fade" id="assignEquipmentModal" >
        <div class="modal-dialog" style="width:70%;">
            <div class="modal-content">
                <div class="modal-header">
                    Assigning Equipment Modal
                </div>
                <div class="modal-body">
                    {!! csrf_field() !!}
                    <div class="row" align="center">
                        <div class="box" style="width:95%;">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6" align="left">
                                       <!--  <label>Customer Name: </label>
                                        <div id="assignModalCustomerName" style="display: inline-block;">
                          
                                        </div><br>
                                        <label>Event Name: </label>
                                        <div id="assignModalEventName" style="display: inline-block;">
                                          
                                        </div><br> -->
                                        <input style="display:none;" type="text" id="assignEquipmentReservationID" name="assignEquipmentReservationID">
                                        <input style="display:none;" type="text" id="assignEquipmentPackageID" name="assignEquipmentPackageID">
                                        <input style="display:none;" type="text" id="assignEquipmentEventID" name="assignEquipmentEventID">
                                        <input style="display:none;" type="text" id="addItemCtr" name="addItemCtr">
                                        <input style="display:none;" type="text" id="additionalItemCtr" name="additionalItemCtr">
                                    </div>
                                    <!-- <div class="col-md-6" align="left">
                                        <label>Guest Count: </label>
                                        <div id="assignModalGuestCount" style="display: inline-block;">

                                        </div>
                                        <br>
                                        <label>Package Availed: </label>
                                        <div id="assignModalPackageName" style="display: inline-block;">
                                          
                                        </div><br>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table id="equipmentAssignTbl" class="table table-striped table-bordered" style="width:95%;" align="center">
                            <thead>
                                <tr>
                                    <th>Equipment Name</th>
                                    <th>Equipment Quantity</th>
                                    <th style="display: none;">Equipment ID</th>
                                    <th style="width: 200px">Remaining Quantity</th>
                                </tr>
                            </thead>
                            <tbody id="equipmentAssignTblBody">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="submitAssignEquipmentBtn" class="btn btn-default" type="submit">Save</button>
                    <button type="button" href="#" class="btn btn-default">Back</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End of Assign Modal -->

  <!-- Payment Modal -->
  <form id="paymentForm" role="form" method="POST" action="#" class="form-horizontal">
    <div class="modal fade" id="paymentModal" >
      <div class="modal-dialog" style="width:60%;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Payment</h4>
          </div>
          <div class="modal-body">
            {!! csrf_field() !!}
            <div class="row" align="center">
              <div class="box box-danger" style="width:95%;">
              <div class="box-body">
                <div class="row" style="padding-left: 13%">
                  <div class="col-md-6" align="left">
                    <label>Customer Name: </label>
                    <div id="paymentModalCustomerName" style="display: inline-block; font-size: 20px">
                      
                    </div>
                    <br>
                    <label>Event Name: </label>
                    <div id="paymentModalEventName" style="display: inline-block;">
                      
                    </div>
                  </div>
                  <div class="col-md-6" align="left">
                    <label>Contact Number: </label>
                    <div id="paymentModalContactNumber" style="display: inline-block;">
                      
                    </div>
                    <br>
                    <label>Event Date: </label>
                    <div id="paymentModalEventDate" style="display: inline-block;">
                      
                    </div>
                    <input id="paymentModalpaymentTerm" type="text" style="display: none;">
                    <input id="paymentModalTransactionID" type="text" style="display: none;">
                    <input id="paymentModalPaymentFee" type="text" style="display: none;">
                    <input id="paymentModalTransactionFee" type="text" style="display: none;">
                  </div>
                </div>
              </div>
            </div>
            <!-- End Box -->
            </div>
            <!-- Payment Table -->
            <div class="row">
              <table id="paymentDetailTbl" class="table table-striped table-bordered" style="width:95%;" align="center">
                  <thead>
                    <tr>
                      <th style="width: 200px">Payment Amount</th>
                      <th style="width: 200px">Due Date</th>
                      <th style="width: 200px">Date Received</th>
                      <th style="width: 100px">Status</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody id="paymentDetailTblBody">

                    <input type="hidden" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" id="paymentchk" value="">
                  </tbody>
                </table>
            </div>
          </div>
          <div class="modal-footer">
              <!-- <button type="submit" class="btn btn-primary">Send Notification</button> -->
              <button data-target="#cancelEventModal" id="cancelBtn" data-toggle="modal" onclick="cancelEvent(document.getElementById('paymentModalTransactionID').value);" class="btn btn-danger" type="button" style=" float:right;">
                 Cancel Event</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- End -->

   <!-- CANCEL EVENT MODAL -->
  <form role="form" method="POST" action="CancelEvent" class="form-horizontal">
    <div class="modal fade" id="cancelEventModal">
      <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 250px">
           <div class="modal-body">
              <div class="form-group" style="display:none;">
                <label class="col-sm-4 control-label">Transaction ID</label>
                <div class="col-sm-5 input-group" >
                  <input type="text"  name="cancelEventTransactionId" id="cancelEventTransactionId" style="display: none;">
                </div>
              </div>
            </div>
              {!! csrf_field() !!}
            <div align="center">
              <h4> Are you sure you want to cancel this event? </h4>
            </div>
            <div style="text-align: center;">
              <button type="submit" class="btn btn-danger btn-sm">Confirm</button>
              <button data-dismiss="modal" class="btn btn-default btn-sm">Back</button>
            </div> <br>
            </div>
        </div>
      </div>
    </div>
  </form>
  <!-- End Modals-->
  
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('LTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('LTE/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('LTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('LTE/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('LTE/dist/js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('LTE/dist/js/demo.js') }}"></script>
<script src="{{ asset('LTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('LTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- Full Calendar -->
<script src="{{ asset('LTE/fullcalendar/lib/moment.min.js')}}"></script>
<!-- <script src="{{ asset('LTE/fullcalendar/lib/jquery.min.js')}}"></script> -->
<script src="{{ asset('LTE/fullcalendar/fullcalendar.min.js')}}"'></script>
<script src="{{ asset('LTE/fullcalendar/gcal.min.js')}}"></script>
<script src="{{ asset('LTE/plugins/datepicker/bootstrap-datepicker.min.js') }}"></script>
<!-- Page specific script -->

<script>
  function cancelEvent(id){
    var transactionID = id;
    $.ajax({
      type: "GET",
      url:  "/RetrieveTransaction",
      data: 
      {
        getId: transactionID
      },
      success: function(data){
        document.getElementById("cancelEventTransactionId").value = data['tdata'][0]['transactionID'];
      }, 
      error: function(xhr)
      {
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>

<!-- Render of Event Table -->
<script>
  window.onload = function() {
    $.ajax({
      type: "GET",
      url:  "/RetrieveUpcomingEvents",
      success: function(data){
          var tblSDet = $('#eventTable').DataTable();
          var latestEventStatus;
          var latestEventName, latestReservationID, latestPackageID, latestCustomerID, latestEventDate, latestEventTime, latestNull, latestEventID; 
          tblSDet.clear();
          tblSDet.draw(true);
          for (var i = 0; i < data['latestEvents'].length; i++) {
            latestEventDate = data['latestEvents'][i]['eventDate'];
            latestEventStatus = data['latestEvents'][i]['eventStatus'];
            var checkDate = new Date(latestEventDate);
            var today = new Date();
            var timeDiff = (checkDate.getTime() - today.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            // alert(diffDays);
              if(diffDays < 8){
                latestEventName = data['latestEvents'][i]['eventName'];
                latestReservationID = data['latestEvents'][i]['reservationID'];
                latestPackageID = data['latestEvents'][i]['transactionID'];
                latestCustomerID = data['latestEvents'][i]['customerID'];
                latestEventID = data['latestEvents'][i]['eventID'];
                latestEventTime = data['latestEvents'][i]['eventTime'];
                latestNull = '<a>' +latestEventName+ '</a><small style="width: 150px;" class="label label-success pull-right"><i class="fa fa-calendar-o"></i>'+latestEventDate+' &nbsp '+latestEventTime+'</small>';
                tblSDet.row.add([
                    latestNull,
                    latestReservationID,
                    latestEventID,
                    latestPackageID,
                    latestCustomerID
                  ]).draw(true);
              }
          }
      },
      error: function(xhr)
      {
          alert("Error!");
          alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>

<!-- Save Assessment of Equipment -->
<script>
  $("#saveAssessEquipment").click(function(e){
    var itemCtr = document.getElementById('assessmentItemCtr').value;
    // var reservationID = document.getElementById('assignModalReservationID').value;
    var totalAmount = 0;
    // alert()
    for (var i = 0; i < itemCtr; i++) {
      var abc = "assessReturnQty" + i;
      var x = document.getElementById(abc).value;
      var bcd = "assessAssignQty" + i; 
      var xx = document.getElementById(bcd).value;
      var diff = xx-x;
      var cde = "assessEquipmentRatePerHour" + i;
      var xxx = document.getElementById(cde).value;
      if(diff>0){
        totalAmount = totalAmount + (xxx * diff);
      }
    }
    document.getElementById('assessmentAdditionalPayment').value = totalAmount;
  }); 
</script>

<!-- Assessment of Equipment -->
<script>
  $("#assessEquipmentBtn").click(function(e){
    $("#eventModal").modal("hide");
    // var packageID = document.getElementById('assignModalPackageID').value; 
    var reservationID = document.getElementById('assessmentModalReservationID').value;
    $.ajax({
        type: "GET",
        url:  "/RetrieveAssignedEquipment",
        data: 
        {
            sendReservationID: reservationID
        },
        success: function(data){
          var assessItemName, assessAssignQty, assessReturnQty, assessItemID, assessEquipmentName, assessEquipmentRatePerHour;
          var assessItemNameID, assessAssignQtyID, assessReturnQtyID, assessItemIDID, assessEquipmentNameID, assessEquipmentRatePerHourID;
          var assessmentItemCtr = 0;
          var tblSDet = $('#equipmentAssessTbl').DataTable();
          tblSDet.clear();
          tblSDet.draw(true);
          for (var i = 0; i < data['ss'].length; i++) {
            assessItemNameID = "assessItemName" + i;
            assessItemIDID = "assessItemID" + i;
            assessReturnQtyID = "assessReturnQty" + i;
            assessEquipmentNameID = "assessEquipmentNameID" + i;
            assessAssignQtyID = "assessAssignQty" + i;
            assessEquipmentRatePerHourID = "assessEquipmentRatePerHour" + i;
            assessItemName = data['ss'][i]['equipmentName'];
            assessAssignQty = '<input disabled value="' + data['ss'][i]['assignEquipmentQty'] + '" id="'+ assessAssignQtyID +'" name="'+assessAssignQtyID+'">' ;
            assessReturnQty = '<input class="col-md-10"  name="'+assessReturnQtyID+'"  required type="number" min="0" max="'+ data['ss'][i]['assignEquipmentQty'] +'" id="'+ assessReturnQtyID +'">';
            assessItemID = '<input name="'+assessItemIDID+'" style="display: none;" id="'+ assessItemIDID +'" value="'+ data['ss'][i]['assignEquipmentID'] +'"/>';
            assessEquipmentName = '<input name="'+assessEquipmentNameID+'" style="display: none;" id="'+ assessEquipmentNameID +'" value="'+ data['ss'][i]['equipmentID'] +'"/>';
            assessEquipmentRatePerHour = '<input name="'+assessEquipmentRatePerHourID+'" style="display: none;" id="'+ assessEquipmentRatePerHourID +'" value="'+ data['ss'][i]['equipmentRatePerHour'] +'"/>';
            tblSDet.row.add([
              assessItemName,
              assessAssignQty,
              assessReturnQty,
              assessItemID,
              assessEquipmentName,
              assessEquipmentRatePerHour
              ]).draw(true);
            assessmentItemCtr = assessmentItemCtr + 1;
          }
          document.getElementById('assessmentItemCtr').value = assessmentItemCtr;
          $("#assessmentModal").modal("show"); 
        },
        error: function(xhr)
        {
            alert("mali");
            alert($.parseJSON(xhr.responseText)['error']['message']);
        }                
      }); 
  }); 
</script>

<!-- Assignment of Equipment -->
<script>
  $("#assignEquipmentBtn").click(function(e){
    $("#eventModal").modal("hide");
    var packageID = document.getElementById('assignEquipmentPackageID').value; 
    var reservationID = document.getElementById('assignEquipmentReservationID').value;
    $.ajax({
        type: "GET",
        url:  "/RetrieveAssignDetail",
        data: 
        {
            sdid: packageID,
            sendReservationID: reservationID
        },
        success: function(data){
          var itemName, itemQty, itemID, itemRQty;
          var addItemName, addItemQtyID, addItemID;
          var addItemCounter = 0;
          var additionalItemCounter = 0;
          var tblSDet = $('#equipmentAssignTbl').DataTable();
          tblSDet.clear();
          tblSDet.draw(true);
          for (var i = 0; i < data['rr'].length; i++) {
            addItemName = "addItemName" + i;
            addItemID = "addItemID" + i;
            addItemQtyID = "addItemQtyID" + i;
            itemID = '<input style="display: none;" name="' + addItemID + '" id="' + addItemID + '" value="' + data['rr'][i]['equipmentID'] + '" />';
            itemName = data['rr'][i]['equipmentName'];
            itemQty = '<input required value="0" min="0" max="'+data['rr'][i]['qtyIn'] +'" name="' + addItemQtyID + '" id="' + addItemQtyID + '"type="number" class="col-md-10" >';
            itemRQty = data['rr'][i]['qtyIn'];
            tblSDet.row.add([
              itemName,
              itemQty,
              itemRQty,
              itemID,
              ]).draw(true);
            addItemCounter = addItemCounter + 1;
          }

          for (var i = 0; i < data['tt'].length; i++) {
            addItemName = "additionalItemName" + i;
            addItemID = "additionalItemID" + i;
            addItemQtyID = "additionalItemQtyID" + i;
            itemID = '<input style="display: none;" name="' + addItemID + '" id="' + addItemID + '" value="' + data['rr'][i]['equipmentID'] + '" />';
            itemName = "Additional: " + data['rr'][i]['equipmentName'];
            itemQty = '<input  required name="' + addItemQtyID + '" id="' + addItemQtyID + '"type="number" min="1" max="'+data['tt'][i]['qtyIn'] +'" class="col-md-10" value="' + data['tt'][i]['equipmentAdditionalQty']+ '">';
            itemRQty = data['tt'][i]['qtyIn'];
            tblSDet.row.add([
              itemName,
              itemQty,
              itemRQty,
              itemID
              ]).draw(true);
            additionalItemCounter = additionalItemCounter + 1;
          }
          document.getElementById('addItemCtr').value = addItemCounter;
          document.getElementById('additionalItemCtr').value = additionalItemCounter;
          $("#assignEquipmentModal").modal("show"); 
        },
        error: function(xhr)
        {
            alert("mali");
            alert($.parseJSON(xhr.responseText)['error']['message']);
        }                
      }); 
  }); 
</script> 

<!-- DATATABLE FUNCTIONS -->
<script>
  // DataTables Initialization
  $(function () {
    $('#notificationTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
    $('#paymentTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
    $('#eventTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "aoColumnDefs": 
        [{ "bVisible": false, "aTargets": [ 1,2,3,4 ], }],
    });
    $('#paymentDetailTbl').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true
    });
    $('#equipmentAssignTbl').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true
    });
    $('#equipmentAssessTbl').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true
    });
    $('#equipmentTbl').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true
    });
  });

  // Notification Table Function
  $(document).ready(function() {
    var table = $('#notificationTable').DataTable();
    $('#notificationTable tbody').on('dblclick', 'tr', function () {
        var totalFeeTemp = 0;
        var totalFeePerm = 0;
        var additionalDishFee = 0;
        var additionalServiceFee = 0;
        var additionalEquipmentFee = 0;
        var additionalEmployeeFee = 0;
        var data = table.row( this ).data();
        var reservationIDVar = data[0];
        var reservationEventNameVar = data[1];
        var reservationCustomerNameVar = data[2];
        var reservationDateVar = data[3];
        var reservationPackageVar = data[4];
        var customerHomeAddressVar = data[6];
        var customerBillingAddressVar = data[7];
        var customerEmailAddressVar = data[8];
        var customerCellNumVar = data[9];
        var customerTelNumVar = data[10];
        var customerDateOfBirthVar = data[11];
        var reservationPackageCostVar = data[12];
        var reservationEventTimeVar = data[13];
        var reservartionEndTimeVar = data[14];
        var reservationEventLocationVar = data[15];
        var reservationGuestCountVar = data[16];
        var reservationPackageID = data[17];
        var reservationEventID = data[18];
        var reservationStatus = data[19];
        var reservationPaymentTerm = data[20];
        var customerID = data[21];
        var reservationEventDate = data[22];
        var customerName = data[23];
        $('#editReservationID').val(reservationIDVar);
        $('#editCustomerName').val(reservationCustomerNameVar);
        $('#reservationNumber').val(reservationIDVar);
        $('#editHomeAddress').val(customerHomeAddressVar);
        $('#editEmailAddress').val(customerEmailAddressVar);
        $('#editContactNumber').val(customerCellNumVar);
        $('#editDateOfBirth').val(customerDateOfBirthVar);
        $('#editEventName').val(reservationEventNameVar);
        $('#editEventDate').val(reservationDateVar);
        $('#editEventLocation').val(reservationEventLocationVar);
        $('#editEventGuestCount').val(reservationGuestCountVar);
        $('#editEventStartTime').val(reservationEventTimeVar);
        $('#editEventEndTime').val(reservartionEndTimeVar);
        totalFeeTemp = reservationGuestCountVar * reservationPackageCostVar;
        var opty = document.getElementById('editPackage').options;
          for(var i =0; i<opty.length; i++){
            if(opty[i].value==(reservationPackageID)){
              $('#editPackage').val(reservationPackageID);
              break;
            }
          }
        $.ajax({
          type: "GET",
          url:  "/RetrievePackageInclusion",
          data: 
          {     
            sdid: reservationPackageID,
            sendReservationID: reservationIDVar
          },
          success: function(data){
            // for (var i = 0; i < data['ss'].length; i++) {
            //   document.getElementById('dishInclusion').innerHTML += '<h6>'+data['ss'][i]['dishTypeName']+'</h6>';
            // }
            for (var i = 0; i < data['ss'].length; i++) {
              document.getElementById('dishInclusion').innerHTML += '<h6>'+data['ss'][i]['dishTypeName']+': </h6> <select id="dishInclusion'+i+'" class="form-control"><option disabled selected value="">Choose Dish</option>';
              for (var j = 0; j < data['ww'].length; j++) {
                if(data['ss'][i]['dishTypeID'] == data['ww'][j]['dishTypeID']){
                  $('#dishInclusion'+i+'').append($('<option>', {
                      value: data['ww'][j]["dishID"],
                      text: data['ww'][j]['dishName'],
                  }));
                }
              }
            }
            for (var i = 0; i < data['ss'].length; i++) {
              $('#dishInclusion'+i+' option[value='+data['ss'][i]['dishID']+']').prop('selected', true);
            //   //document.getElementById('dishInclusion').innerHTML += '<h6>'+data['ss'][i]['dishName']+'</h6>';
            }
            for (var i = 0; i < data['dd'].length; i++) {
              document.getElementById('serviceInclusion').innerHTML += '<h6>'+data['dd'][i]['serviceName']+'</h6>';
            }
            for (var i = 0; i < data['ff'].length; i++) {
              document.getElementById('equipmentInclusion').innerHTML += '<h6>'+data['ff'][i]['equipmentName']+'</h6>';
            }
            for (var i = 0; i < data['gg'].length; i++) {
              document.getElementById('employeeInclusion').innerHTML += '<h6>'+data['gg'][i]['employeeTypeName']+'</h6>';
            }
            if((data['additionalDish'].length)>0){
              for (var i = 0; i < data['additionalDish'].length; i++) {
                document.getElementById('additionalDishDiv').innerHTML += '<h6>'+data['additionalDish'][i]['dishName']+'</h6>';
                var additionalDishMultiplier = parseFloat(data['additionalDish'][i]['additionalServing']);
                var additionalDishCost = parseFloat(data['additionalDish'][i]['dishCost']);
                var newAdditionalDishCost = additionalDishMultiplier * additionalDishCost;
                additionalDishFee = newAdditionalDishCost + additionalDishFee;
              }
            }
            if((data['additionalService'].length)>0){
              for (var i = 0; i < data['additionalService'].length; i++) {
                document.getElementById('additionalServiceDiv').innerHTML += '<h6>'+data['additionalService'][i]['serviceName']+'</h6>';
                var additionalServiceMultiplier = parseFloat(data['additionalService'][i]['serviceAdditionalQty']);
                var additionalServiceCost = parseFloat(data['additionalService'][i]['serviceFee']);
                var newAdditionalServiceCost = additionalServiceMultiplier * additionalServiceCost;
                additionalServiceFee = additionalServiceFee + newAdditionalServiceCost;
              }
            }
            if((data['additionalEquipment'].length)>0){
              for (var i = 0; i < data['additionalEquipment'].length; i++) {
                document.getElementById('additionalEquipmentDiv').innerHTML += '<h6>'+data['additionalEquipment'][i]['equipmentName']+'</h6>';
                var additionalEquipmentMultiplier = parseFloat(data['additionalEquipment'][i]['equipmentAdditionalQty']);
                var additionalEquipmentCost = parseFloat(data['additionalEquipment'][i]['equipmentRatePerHour']);
                var newAdditionalEquipmentCost = additionalEquipmentMultiplier * additionalEquipmentCost;
                additionalEquipmentFee = newAdditionalEquipmentCost + additionalEquipmentFee;
              }
            }
            if((data['additionalEmployee'].length)>0){
              for (var i = 0; i < data['additionalEmployee'].length; i++) {
                document.getElementById('additionalEmployeeDiv').innerHTML += '<h6>'+data['additionalEmployee'][i]['employeeTypeName']+'</h6>';
                var additionalEmployeeMultiplier = parseFloat(data['additionalEmployee'][i]['employeeAdditionalQty']);
                var additionalEmployeeCost = parseFloat(data['additionalEmployee'][i]['employeeRatePerHour']);
                var newAdditionalEmployeeCost = additionalEmployeeMultiplier * additionalEmployeeCost;
                additionalEmployeeFee = newAdditionalEmployeeCost + additionalEmployeeFee;
              }
            }
            totalFeePerm =  additionalDishFee + additionalServiceFee + additionalEmployeeFee + additionalEquipmentFee;

            // Others
            $('#mailPackageCost').val(reservationPackageCostVar);
            $('#mailPackageID').val(reservationPackageID);
            $('#mailPackageAddOns').val(totalFeePerm);
            $('#mailEventPaymentTerm').val(reservationPaymentTerm);
            $('#mailCustomerID').val(customerID);
            $('#mailEventID').val(reservationEventID);
            if( reservationStatus == 2){
              var x = document.getElementById('confirmationDiv');
              x.style.display = 'none';
            }
            else if( reservationStatus == 1){
              var x = document.getElementById('confirmationDiv');
              x.style.display = '';
            }
            $("#detailModal").modal("show");     
          },
          error: function(xhr)
          {
            alert("mali");
            alert($.parseJSON(xhr.responseText)['error']['message']);
          }                
        });
        } );
  });

  // Payment Table Function
  $(document).ready(function() {
    var table = $('#paymentTable').DataTable();
    $('#paymentTable tbody').on('dblclick', 'tr', function () {
      var data = table.row( this ).data();
      var paymentModalReservationID = data[1];
      var paymentModalpaymentID = data[2];
      var paymentModalPackageID = data[3];
      var paymentModalCustomerID = data[4];
      $.ajax({
        type: "GET",
        url:  "/RetrieveEventDetail",
        data: 
        {
            sendReservationID: paymentModalReservationID
        },
        success: function(data){
          document.getElementById('paymentModalCustomerName').innerHTML += '<h6>'+data['eventDetail'][0]['fullName']+'</h6>';
          document.getElementById('paymentModalEventName').innerHTML += '<h6>'+data['eventDetail'][0]['eventName']+'</h6>';
          document.getElementById('paymentModalEventDate').innerHTML += '<h6>'+data['eventDetail'][0]['eventDate']+'</h6>';
          document.getElementById('paymentModalContactNumber').innerHTML += '<h6>'+data['eventDetail'][0]['cellNum']+'</h6>';
          document.getElementById('paymentModalpaymentTerm').value=data['eventDetail'][0]['paymentTermID'];
          document.getElementById('paymentModalTransactionID').value=data['eventDetail'][0]['transactionID'];
          document.getElementById('paymentModalTransactionFee').value=data['eventDetail'][0]['totalFee'];
          // Ajax for Payment Detail
          $.ajax({
            type: "GET",
            url:  "/RetrievePaymentDetail",
            data: 
            {
                reservationID: paymentModalReservationID
            },
            success: function(data){
              var paymentAmount, paymentDueDate, paymentReceiveDate, paymentStatus, paymentID, paymentActionBtn;
              var paymentAmountID, paymentDueDateID, paymentReceiveDateID, paymentStatusID, paymentIDID, paymentActionBtnID;
              var tblSDet = $('#paymentDetailTbl').DataTable();
              tblSDet.clear();
              tblSDet.draw(true);
              for (var i = 0; i < data['paymentDetail'].length; i++) {
                addPaymentReceiveDate = "addPaymentReceiveDate" + i;
                addPaymentID = "addPaymentID" + i;
                addPaymentBtnID = "addPaymentBtnID" + i;
                addPaymentStatusID = "addPaymentStatusID" + i;
                var submitPayment = "submitPayment" + i;
                paymentID = '<input id=" ' + addPaymentID + '" type="text" value="' + data['paymentDetail'][i]['paymentID'] +  '"> </input>' ;
                paymentAmount = data['paymentDetail'][i]['paymentAmount'];
                paymentDueDate = data['paymentDetail'][i]['paymentDueDate'];
                statusChecker = data['paymentDetail'][i]['paymentStatus'];
                if (statusChecker == 0) {
                  paymentStatus = '<span id="' + addPaymentStatusID + '" class="label label-warning">Pending</span>';
                  paymentReceiveDate = '<input type="date" id="' + addPaymentReceiveDate+'" name="'+i+'" max="{{date('Y-m-d',  strtotime( '+1 month' ))}}" min="{{date('Y-m-d',  strtotime( '+1 day' ))}}" onchange="paymentchk(this.name)">';
                  paymentActionBtn = '<input disabled type="button" id="' + addPaymentBtnID + '" value="Confirm" onclick=" ' +submitPayment+ '(this.name)" name="'+data['paymentDetail'][i]['paymentID']+'">';
                }
                if (statusChecker == 1) {
                  paymentStatus = '<span id="' + addPaymentStatusID + '" class="label label-success">Confirmed</span>';
                  paymentReceiveDate = '<input disabled value="' + data['paymentDetail'][i]['paymentReceiveDate'] + '" id="' + addPaymentReceiveDate + i+'" data-date-format="yyyy/mm/dd">';
                  paymentActionBtn = '<input disabled type="button" id="' + addPaymentBtnID + '" value="Confirm" onclick=" ' +submitPayment+ '(this.name)" name="'+data['paymentDetail'][i]['paymentID']+'">';
                }
                
                tblSDet.row.add([
                  paymentAmount,
                  paymentDueDate,
                  paymentReceiveDate,
                  paymentStatus,
                  paymentActionBtn
                  ]).draw(true);
                document.getElementById('paymentModalPaymentFee').value = paymentAmount;
              }
              $("#paymentModal").modal("show"); 
            },
            error: function(xhr)
            {
                alert("mali");
                alert($.parseJSON(xhr.responseText)['error']['message']);
            }                
          });
        },
        error: function(xhr)
        {
            alert("mali");
            alert($.parseJSON(xhr.responseText)['error']['message']);
        }                
      });
    });
  });

  function paymentchk(id) {
    document.getElementById('addPaymentBtnID'+id).disabled=false;
  }

  // Event Table Function
  $(document).ready(function() {
    var table = $('#eventTable').DataTable();
    $('#eventTable tbody').on('dblclick', 'tr', function() {
      var data = table.row( this ).data();
      var eventModalReservationID = data[1];
      var eventModalEventID = data[2];
      var eventModalPackageID = data[3];
      var eventModalCustomerID = data[4];
      var transactionStatus;
      $.ajax({
        type: "GET",
        url:  "/RetrieveEventDetail",
        data: 
        {
            sendReservationID: eventModalReservationID
        },
        success: function(data){
          document.getElementById('eventModalCustomerName').innerHTML += '<h6>'+data['eventDetail'][0]['fullName']+'</h6>';
          document.getElementById('eventModalEventName').innerHTML += '<h6>'+data['eventDetail'][0]['eventName']+'</h6>';
          document.getElementById('eventModalEventDate').innerHTML += '<h6>'+data['eventDetail'][0]['eventDate']+'</h6>';
          document.getElementById('eventModalCustomerNumber').innerHTML += '<h6>'+data['eventDetail'][0]['cellNum']+'</h6>';
          document.getElementById('eventModalPackageAvailed').innerHTML += '<h6>'+data['eventDetail'][0]['packageName']+'</h6>';
          document.getElementById('eventModalEventLocation').innerHTML += '<h6>'+data['eventDetail'][0]['eventLocation']+'</h6>';
          // ASSIGN
          // document.getElementById('assignEquipmentCustomerName').innerHTML = '<h6>'+data['eventDetail'][0]['fullName']+'</h6>';
          // document.getElementById('assignEquipmentPackageName').innerHTML = '<h6>'+data['eventDetail'][0]['packageName']+'</h6>';
          // document.getElementById('assignEquipmentGuestCount').innerHTML = '<h6>'+data['eventDetail'][0]['guestCount']+'</h6>';
          // document.getElementById('assignEquipmentEventName').innerHTML = '<h6>'+data['eventDetail'][0]['eventName']+'</h6>';
          document.getElementById('assignEquipmentPackageID').value = data['eventDetail'][0]['packageID'];
          document.getElementById('assignEquipmentReservationID').value = eventModalReservationID;
          document.getElementById('assignEquipmentEventID').value = data['eventDetail'][0]['eventID'];
          // ASSESSMENT
          document.getElementById('assessmentModalCustomerName').innerHTML = '<h6>'+data['eventDetail'][0]['fullName']+'</h6>';
          document.getElementById('assessmentModalPackageName').innerHTML = '<h6>'+data['eventDetail'][0]['packageName']+'</h6>';
          document.getElementById('assessmentModalGuestCount').innerHTML = '<h6>'+data['eventDetail'][0]['guestCount']+'</h6>';
          document.getElementById('assessmentModalEventName').innerHTML = '<h6>'+data['eventDetail'][0]['eventName']+'</h6>';
          document.getElementById('assessmentModalPackageID').value = eventModalPackageID;
          document.getElementById('assessmentModalReservationID').value = eventModalReservationID;
          document.getElementById('assessmentTransactionID').value = data['eventDetail'][0]['transactionID'];

          // VALIDATION
          var checkEventDate = data['eventDetail'][0]['eventDate'];
          transactionStatus = data['eventDetail'][0]['transactionStatus'];
          var checkEventStatus = data['eventDetail'][0]['eventStatus'];
          var today = new Date();
          var dd = today.getDate();
          var mm = today.getMonth()+1; //January is 0!
          var yyyy = today.getFullYear();
          if(dd<10) {
              dd = '0'+dd
          } 
          if(mm<10) {
              mm = '0'+mm
          } 
          today = yyyy + '-' + mm + '-' + dd;
          var myDate = new Date(today);
          var eventCheckDate = new Date(checkEventDate);
          var timeDiff = eventCheckDate.getTime() - myDate.getTime();
          var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
          if(diffDays < 8 && diffDays > 0){
            if(transactionStatus == 2 || transactionStatus == 3){
                var x = document.getElementById('assessEquipmentBtn');
                x.style.display = 'none';
                var y = document.getElementById('assignEquipmentBtn');
                y.style.display = 'block';
            }
          }
          if(diffDays <= 0){
            if(transactionStatus == 2){
              var x = document.getElementById('assessEquipmentBtn');
              x.style.display = 'block';
              var y = document.getElementById('assignEquipmentBtn');
              y.style.display = 'none';
            }
            if(transactionStatus == 3){
              var x = document.getElementById('assessEquipmentBtn');
              x.style.display = 'none';
              var y = document.getElementById('assignEquipmentBtn');
              y.style.display = 'none';
            }
          }
          $.ajax({
            type: "GET",
            url:  "/RetrieveAssignedEquipment",
            data: 
            {
                sendReservationID: eventModalReservationID
            },
            success: function(data){
              var equipmentName, equipmentQty, equipmentRQty;
              var tblSDet = $('#equipmentTbl').DataTable();
              tblSDet.clear();
              tblSDet.draw(true);
              for (var i = 0; i < data['ss'].length; i++) {
                equipmentName = data['ss'][i]['equipmentName'];
                equipmentQty = data['ss'][i]['assignEquipmentQty'];
                equipmentRQty = data['ss'][i]['qtyIn'];

                tblSDet.row.add([
                  equipmentName,
                  equipmentQty,
                  equipmentRQty,
                  ]).draw(true);
              }
              $("#eventModal").modal("show");
            },
            error: function(xhr)
            {
                alert("mali");
                alert($.parseJSON(xhr.responseText)['error']['message']);
            }                
          });
        },
        error: function(xhr)
        {
            alert("mali");
            alert($.parseJSON(xhr.responseText)['error']['message']);
        }                
      });
      
    });
  });


  // Package Update Change
  function dishInclusionChange(id){
    var selectedOption = document.getElementById(id);
    var dish = selectedOption.options[selectedOption.selectedIndex].value;
    // alert(dish);
    $.ajax({
        type: "GET",
        url:  "/InclusionChange",
        data: 
        {
            packageID: dish
        },
        success: function(data){
          $('#dishInclusion').empty();
          $('#serviceInclusion').empty();
          $('#equipmentInclusion').empty();
          $('#employeeInclusion').empty();
            for (var i = 0; i < data['qq'].length; i++) {
              document.getElementById('dishInclusion').innerHTML += '<h6>'+data['qq'][i]['dishTypeName']+': </h6> <select id="dishInclusion'+i+'" class="form-control"><option disabled selected value="">Choose Dish</option>';
              for (var j = 0; j < data['ww'].length; j++) {
                if(data['qq'][i]['dishTypeID'] == data['ww'][j]['dishTypeID']){
                  $('#dishInclusion'+i+'').append($('<option>', {
                      value: data['ww'][j]["dishID"],
                      text: data['ww'][j]['dishName'],
                  }));
                }
              }
            }
            for (var i = 0; i < data['dd'].length; i++) {
              document.getElementById('serviceInclusion').innerHTML += '<h6>'+data['dd'][i]['serviceName']+'</h6>';
            }
            for (var i = 0; i < data['ff'].length; i++) {
              document.getElementById('equipmentInclusion').innerHTML += '<h6>'+data['ff'][i]['equipmentName']+'</h6>';
            }
            for (var i = 0; i < data['gg'].length; i++) {
              document.getElementById('employeeInclusion').innerHTML += '<h6>'+data['gg'][i]['employeeTypeName']+'</h6>';
            }
        },
        error: function(xhr)
        {
            alert("mali");
            alert($.parseJSON(xhr.responseText)['error']['message']);
        }  
    });
  }
</script>

<!-- Approve Reservation -->
<script>
  function getReservation(id){
            // Customer
            var getCustomerName = document.getElementById('editCustomerName').value;
            var getCustomerHomeAddress = document.getElementById('editHomeAddress').value;
            var getCustomerEmailAddress = document.getElementById('editEmailAddress').value;
            var getCustomerContactNumber = document.getElementById('editContactNumber').value;
            var getCustomerBirthDate = document.getElementById('editDateOfBirth').value;
            $('#mailCustomerName').val(getCustomerName);
            $('#mailCustomerHomeAddress').val(getCustomerHomeAddress);
            $('#mailCustomerEmailAddress').val(getCustomerEmailAddress);
            $('#mailCustomerContactNumber').val(getCustomerContactNumber);
            $('#mailCustomerBirthDate').val(getCustomerBirthDate);

            // Event
            var getEventName = document.getElementById('editEventName').value;
            var getEventDate = document.getElementById('editEventDate').value;
            var getEventLocation = document.getElementById('editEventLocation').value;
            var getEventGuestCount = document.getElementById('editEventGuestCount').value;
            var getEventStartTime = document.getElementById('editEventStartTime').value;
            var getEventEndTime = document.getElementById('editEventEndTime').value;
            $('#mailEventName').val(getEventName);
            $('#mailEventDate').val(getEventDate);
            $('#mailEventLocation').val(getEventLocation);
            $('#mailEventGuestCount').val(getEventGuestCount);
            $('#mailEventStartTime').val(getEventStartTime);
            $('#mailEventEndTime').val(getEventEndTime);
    $.ajax({
            type: "GET",
            url:  "/RetrieveReservationID",
            data: 
            {
                sdid: id
            },
            success: function(data){
            $('#mailReservationID').val(data['ss'][0]['reservationID']);
            $('#denyReservationId').val(data['ss'][0]['reservationID']);
            },
            error: function(xhr)
            {
                alert("mali");
                alert($.parseJSON(xhr.responseText)['error']['message']);
            }                
        });
  }
</script>

<!-- Script for Payment -->
<script>

  // First Payment
  function submitPayment0(id){
    var paymentID0 = id;
    var receiveDate0 = document.getElementById('addPaymentReceiveDate0').value;
    var paymentTermID = document.getElementById('paymentModalpaymentTerm').value;
    var transactionID = document.getElementById('paymentModalTransactionID').value;
    $.ajax({
      url: "/SavePayment0",
      type: "POST",
      beforeSend: function (xhr) {
        var token = $('meta[name="csrf_token"]').attr('content');
        if (token) {
          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
      },
      data: {
        sendPaymentID: paymentID0,
        sendReceiveDate: receiveDate0,
        sendPaymentTerm: paymentTermID,
        sendTransactionID: transactionID,
        '_token': $('#token').val()
      },               
      success: function (response) {
        $('#addPaymentStatusID0').removeClass('label label-warning').addClass('label label-success');
        document.getElementById('addPaymentStatusID0').innerHTML = 'Confirmed';
        $('#addPaymentBtnID0').prop("disabled",true);
        $('#addPaymentReceiveDate0').prop("disabled",true);
      },
      error: function(xhr)
      {
        alert("mali")
      }                  
    });
  }

  //Second Payment
  function submitPayment1(id){
    var paymentID1 = id;
    var receiveDate1 = document.getElementById('addPaymentReceiveDate1').value;
    var transactionID = document.getElementById('paymentModalTransactionID').value;
    var paymentTermID = document.getElementById('paymentModalpaymentTerm').value;
    var transactionFee = document.getElementById('paymentModalTransactionFee').value;
    var paymentFee = document.getElementById('paymentModalPaymentFee').value;
    $.ajax({
      url: "/SavePayment1",
      type: "POST",
      beforeSend: function (xhr) {
        var token = $('meta[name="csrf_token"]').attr('content');
        if (token) {
          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
      },
      data: {
        sendPaymentID: paymentID1,
        sendReceiveDate: receiveDate1,
        sendTransactionID: transactionID,
        sendPaymentTerm: paymentTermID,
        sendTransactionFee: transactionFee,
        sendPaymentFee: paymentFee,
        '_token': $('#token').val()
      },               
      success: function (response) {
        $('#addPaymentStatusID1').removeClass('label label-warning').addClass('label label-success');
        document.getElementById('addPaymentStatusID1').innerHTML = 'Confirmed';
        $('#addPaymentBtnID1').prop("disabled",true);
        $('#addPaymentReceiveDate1').prop("disabled",true);
      },
      error: function(xhr)
      {
        alert("mali");
      }                  
    });
  }

  //Third Payment
  function submitPayment2(id){
    var paymentID2 = id;
    var receiveDate2 = document.getElementById('addPaymentReceiveDate2').value;
    var transactionID = document.getElementById('paymentModalTransactionID').value;
    var transactionFee = document.getElementById('paymentModalTransactionFee').value;
    var paymentFee = document.getElementById('paymentModalPaymentFee').value;
    var totalFee = transactionFee + paymentFee;
    // alert(transactionFee);
    // alert(paymentFee);
    $.ajax({
      url: "/SavePayment2",
      type: "POST",
      beforeSend: function (xhr) {
        var token = $('meta[name="csrf_token"]').attr('content');
        if (token) {
          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
      },
      data: {
        sendPaymentID: paymentID2,
        sendReceiveDate: receiveDate2,
        sendTransactionID: transactionID,
        sendTransactionFee: transactionFee,
        sendPaymentFee: paymentFee,
        '_token': $('#token').val()
      },               
      success: function (response) {
        $('#addPaymentStatusID2').removeClass('label label-warning').addClass('label label-success');
        document.getElementById('addPaymentStatusID2').innerHTML = 'Confirmed';
        $('#addPaymentBtnID2').prop("disabled",true);
        $('#addPaymentReceiveDate2').prop("disabled",true);
      },
      error: function(xhr)
      {
        alert("mali");
      }                  
    });
  }
</script>

<!-- Refresh Modal -->
<script>
  $(function () {
    $(document).on("hidden.bs.modal", "#detailModal", function () {
        $(this).find("#additionalDishDiv").html(""); // Just clear the contents.
        $(this).find("#additionalServiceDiv").html(""); // Just clear the contents.
        $(this).find("#additionalEquipmentDiv").html(""); // Just clear the contents.
        $(this).find("#additionalEmployeeDiv").html(""); // Just clear the contents.
        $(this).find("#dishInclusion").html(""); // Just clear the contents.
        $(this).find("#serviceInclusion").html(""); // Just clear the contents.
        $(this).find("#equipmentInclusion").html(""); // Just clear the contents.
        $(this).find("#employeeInclusion").html(""); // Just clear the contents.
      });
    $(document).on("hidden.bs.modal", "#eventModal", function () {
        $(this).find("#eventModalEventLocation").html(""); // Just clear the contents.
        $(this).find("#eventModalCustomerNumber").html(""); // Just clear the contents.
        $(this).find("#eventModalEventDate").html(""); // Just clear the contents.
        $(this).find("#eventModalPackageAvailed").html(""); // Just clear the contents.
        $(this).find("#eventModalCustomerName").html(""); // Just clear the contents.
        $(this).find("#eventModalEventName").html(""); // Just clear the contents.
      });
    $(document).on("hidden.bs.modal", "#paymentModal", function () {
        $(this).find("#paymentModalEventDate").html(""); // Just clear the contents.
        $(this).find("#paymentModalContactNumber").html(""); // Just clear the contents.
        $(this).find("#paymentModalEventName").html(""); // Just clear the contents.
        $(this).find("#paymentModalCustomerName").html(""); // Just clear the contents.
      });
  });
</script>

<!-- Calendar -->
<script>
      var eventDate=[];
      var eventStart=[];
      var eventEnd=[];
      var eventLocation=[];
      var eventGuestCount=[];
      var rsvtn=1;
      var events=[];
      var eventName=[];
      var dateReservationId=[];
      var customerName=[];
      var customerHomeAddress=[];
      var customerEmailAddress=[];
      var customerCellNumber=[];
      var customerBirthDate=[];
      var eventPackageName=[];
      var eventPackageId=[];
      var reservationStatus=[];
      var transStatus=[];
      $.ajax({
            url: '/RetrieveSchedule',
            type: 'GET',
            data: {
               asd: rsvtn
              },
              success: function(data){
                for(var i=0;i<data['rsvtn'].length;i++){
                  eventName.push([data['rsvtn'][i]['eventName']]);
                  eventDate.push([data['rsvtn'][i]['eventDate']]);  
                  eventStart.push([data['rsvtn'][i]['eventTime']]);  
                  eventEnd.push([data['rsvtn'][i]['endTime']]);
                  eventLocation.push([data['rsvtn'][i]['eventLocation']]);
                  eventGuestCount.push([data['rsvtn'][i]['guestCount']]);
                  dateReservationId.push([data['rsvtn'][i]['reservationID']]);
                  customerName.push([data['rsvtn'][i]['fullName']]);
                  customerHomeAddress.push([data['rsvtn'][i]['homeAddress']]);
                  customerEmailAddress.push([data['rsvtn'][i]['emailAddress']]);
                  customerCellNumber.push([data['rsvtn'][i]['cellNum']]);
                  customerBirthDate.push([data['rsvtn'][i]['dateOfBirth']]);
                  eventPackageName.push([data['rsvtn'][i]['packageName']]);
                  eventPackageId.push([data['rsvtn'][i]['packageID']]);
                  reservationStatus.push([data['rsvtn'][i]['reservationStatus']]);
                  transStatus.push([data['rsvtn'][i]['transactionStatus']]);
                } 
                // alert(dateReservationId);
                for(var i=0;i<data['rsvtn'].length;i++){
                  if(transStatus[i]==4){
                  events.push({
                      title: 'Finished'+"\r\nEvent: "+eventName[i],  
                      start: eventDate[i]+'T'+eventStart[i], 
                      end: eventDate[i]+'T'+eventEnd[i], 
                      id: dateReservationId[i],
                      customerNameEvent: customerName[i],
                      customerHomeAddressEvent: customerHomeAddress[i],
                      customerEmailAddressEvent: customerEmailAddress[i],
                      customerCellNumberEvent: customerCellNumber[i],
                      customerBirthDateEvent: customerBirthDate[i],
                      guestCountEvent: eventGuestCount[i],
                      locationEvent: eventLocation[i],
                      nameEvent: eventName[i],
                      dateEvent: eventDate[i],
                      startTimeEvent: eventStart[i],
                      endTimeEvent: eventEnd[i],
                      packageNameEvent: eventPackageName[i],
                      packageIdEvent: eventPackageId[i],
                      reservationStatus: reservationStatus[i],
                      
                    
                  })
                }
                else if(transStatus[i]==2 || transStatus[i]==1){
                   events.push({
                      title: 'Upcoming'+"\r\nEvent: "+eventName[i],  
                      start: eventDate[i]+'T'+eventStart[i], 
                      end: eventDate[i]+'T'+eventEnd[i], 
                      id: dateReservationId[i],
                      customerNameEvent: customerName[i],
                      customerHomeAddressEvent: customerHomeAddress[i],
                      customerEmailAddressEvent: customerEmailAddress[i],
                      customerCellNumberEvent: customerCellNumber[i],
                      customerBirthDateEvent: customerBirthDate[i],
                      guestCountEvent: eventGuestCount[i],
                      locationEvent: eventLocation[i],
                      nameEvent: eventName[i],
                      dateEvent: eventDate[i],
                      startTimeEvent: eventStart[i],
                      endTimeEvent: eventEnd[i],
                      packageNameEvent: eventPackageName[i],
                      packageIdEvent: eventPackageId[i],
                      reservationStatus: reservationStatus[i],
                      color: '#ec971f'
                    
                  })
                }
                else if(transStatus[i]==5 || transStatus[i]==0){
                   events.push({
                      title: 'Payment Pending'+"\r\nEvent: "+eventName[i],  
                      start: eventDate[i]+'T'+eventStart[i], 
                      end: eventDate[i]+'T'+eventEnd[i], 
                      id: dateReservationId[i],
                      customerNameEvent: customerName[i],
                      customerHomeAddressEvent: customerHomeAddress[i],
                      customerEmailAddressEvent: customerEmailAddress[i],
                      customerCellNumberEvent: customerCellNumber[i],
                      customerBirthDateEvent: customerBirthDate[i],
                      guestCountEvent: eventGuestCount[i],
                      locationEvent: eventLocation[i],
                      nameEvent: eventName[i],
                      dateEvent: eventDate[i],
                      startTimeEvent: eventStart[i],
                      endTimeEvent: eventEnd[i],
                      packageNameEvent: eventPackageName[i],
                      packageIdEvent: eventPackageId[i],
                      reservationStatus: reservationStatus[i],
                      color: '#dd4b39'
                    
                  })
                }
              }

                $('#calendar').fullCalendar({
                header: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'month,listWeek'
                },
                events: events,
                eventRender: function(event, element) {
                    content: 
                      event.id,
                      event.customerNameEvent,
                      event.customerHomeAddressEvent,
                      event.customerEmailAddressEvent,
                      event.customerCellNumberEvent,
                      event.customerBirthDateEvent,
                      event.guestCountEvent,
                      event.locationEvent,
                      event.nameEvent,
                      event.dateEvent
                      event.startTimeEvent,
                      event.endTimeEvent,
                      event.packageNameEvent,
                      event.packageIdEvent,
                      event.reservationStatus
                },
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                droppable: true,


                eventClick: function(calEvent, jsEvent, view) {
                  document.getElementById('scheduleForm').reset();
                  $(this).find("#scheduleForm").html("");
                  if(calEvent.reservationStatus == 2){
                    var x = document.getElementById('confirmationDiv');
                    x.style.display = 'none';
                  }
                  if(calEvent.reservationStatus == 3){
                    var x = document.getElementById('confirmationDiv');
                    x.style.display = 'none';
                  }
                  // document.getElementById('contactNumber').innerHTML = '<h2 class="pull-right"><strong> #'+calEvent.customerCellNumberEvent+'</strong></h2>';
                  $('#editCustomerName').val(calEvent.customerNameEvent);
                  $('#editContactNumber').val(calEvent.customerCellNumberEvent);
                  $('#editEmailAddress').val(calEvent.customerEmailAddressEvent);
                  $('#editHomeAddress').val(calEvent.customerHomeAddressEvent);
                  $('#editDateOfBirth').val(calEvent.customerBirthDateEvent);
                  $('#editEventName').val(calEvent.nameEvent);
                  $('#editEventDate').val(calEvent.dateEvent);
                  $('#editEventLocation').val(calEvent.locationEvent);
                  $('#editEventGuestCount').val(calEvent.guestCountEvent);
                  $('#editEventStartTime').val(calEvent.startTimeEvent);
                  $('#editEventEndTime').val(calEvent.endTimeEvent);
                  $('#reservationNumber').val(calEvent.id);
                  var opty = document.getElementById('editPackage').options;
                  for(var i =0; i<opty.length; i++){
                    if(opty[i].value==(calEvent.packageIdEvent)){
                      $('#editPackage').val(calEvent.packageIdEvent);
                      break;
                    }
                  }
                  $.ajax({

                    type: "GET",
                    url:  "/RetrievePackageInclusion",
                    data: 
                    {     
                      sdid: calEvent.packageIdEvent,
                      sendReservationID: calEvent.id
                    },
                    success: function(data){

                      // for (var i = 0; i < data['ss'].length; i++) {
                      //   document.getElementById('dishInclusion').innerHTML += '<select id="dishInclusion'+data['ss'][i]['dishID']+'"></select><br>';
                      // }
                      // for (var i = 0; i < data['ss'].length; i++) {
                      //   var select = document.getElementById('dishInclusion'+data['ss'][i]['dishID']);
                      //   for (var x = 0; x < data['dishTypeData'].length; x++) {
                      //     if(data['dishTypeData'][i]['dishTypeID']==data['dishData'][x]['dishTypeID']){
                      //       select.options[select.options.length] = new Option(data['dishData'][x]['dishName'],'value1');
                      //   }
                      // }
                      for (var i = 0; i < data['ss'].length; i++) {
                        document.getElementById('dishInclusion').innerHTML += '<h6>'+data['ss'][i]['dishName']+'</h6>';
                      }
                      for (var i = 0; i < data['dd'].length; i++) {
                        document.getElementById('serviceInclusion').innerHTML += '<h6>'+data['dd'][i]['serviceName']+'</h6>';
                      }
                      for (var i = 0; i < data['ff'].length; i++) {
                        document.getElementById('equipmentInclusion').innerHTML += '<h6>'+data['ff'][i]['equipmentName']+'</h6>';
                      }
                      for (var i = 0; i < data['gg'].length; i++) {
                        document.getElementById('employeeInclusion').innerHTML += '<h6>'+data['gg'][i]['employeeTypeName']+'</h6>';
                      }
                      for (var i = 0; i < data['additionalDish'].length; i++) {
                        document.getElementById('additionalDishDiv').innerHTML += '<h6>'+data['additionalDish'][i]['dishName']+'</h6>';
                      }
                      for (var i = 0; i < data['additionalService'].length; i++) {
                        document.getElementById('additionalServiceDiv').innerHTML += '<h6>'+data['additionalService'][i]['serviceName']+'</h6>';
                      }
                      for (var i = 0; i < data['additionalEquipment'].length; i++) {
                        document.getElementById('additionalEquipmentDiv').innerHTML += '<h6>'+data['additionalEquipment'][i]['equipmentName']+'</h6>';
                      }
                      for (var i = 0; i < data['additionalEmployee'].length; i++) {
                        document.getElementById('additionalEmployeeDiv').innerHTML += '<h6>'+data['additionalEmployee'][i]['employeeTypeName']+'</h6>';
                      }
                      $("#detailModal").modal("show");     
                    },
                    error: function(xhr)
                    {
                      alert("mali");
                      alert($.parseJSON(xhr.responseText)['error']['message']);
                    }                
                  });
                  }
                });               
              },
              error: function(result){
                alert('Error! ');
              }
      });
      </script>

</body>
</html>
