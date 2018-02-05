@extends('layouts.admin')

@section('content')

<!-- Style -->
<!-- <style type="text/css">
    .modal-content {
        border:1px solid black;
    }
    .modal-header {
        border-bottom:2px solid black;
    }
    .modal-footer {
        border-top:2px solid black;
    }
</style> -->
<!-- End of Style -->

<!-- Body -->
<div class="content-wrapper">
    <!-- Breadcrumbs -->
    <section class="content-header">
        <br>
        <ol class="breadcrumb">
            <li>
                <a href="/DishPage">
                    <i class="fa fa-wrench"></i> Maintenance
                </a>
            </li>
            <li class="active">
                <a href = "#">
                    <i class="fa fa-file-text-o"></i>Reservation
                </a>
            </li>
        </ol>
    </section>
    <!-- End of Breadcrumbs -->
    <section class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Reservation List</h2>
                    </div><br>
                    <div class="col-md-12">
                        <h5><i><b>Note:</b> Double click the row to view transaction details.</i></h5>
                        <!-- Reservation Table -->
                        <table id="reservationListTable" class="table table-bordered table-striped dataTable">
                            <thead>
                                <tr>
                                    <th>Reservation ID</th>
                                    <th>Event Name</th>
                                    <th>Customer Name</th>
                                    <th>Event Date</th>
                                    <th>Package Availed</th>
                                    <th style="display: none;">Status</th>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservationData as $dashboardData)
                                    <tr>
                                        <td>{{ $dashboardData->reservationID }}</td>
                                        <td>{{ $dashboardData->eventName }}</td>
                                        <td>{{ $dashboardData->fullName }}</td>
                                        <td>{{ $dashboardData->eventDate }}</td>
                                        <td>{{ $dashboardData->packageName }}</td>
                                        <td style="display: none;">
                                        <?php if (($dashboardData->reservationStatus)==1): ?>
                                          <span class="label label-warning">Not Available</span>
                                        <?php endif ?>
                                        <?php if (($dashboardData->reservationStatus)==2): ?>
                                          <span class="label label-success">Confirmed</span>
                                        <?php endif ?>
                                        <?php if (($dashboardData->reservationStatus)==3): ?>
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
                                        <td style="display:none">{{ $dashboardData->locationName }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End of Reservation Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- End of Body -->

<!-- Reservation Details Modal -->
<form id="reservationDetailsForm" method="POST">
    <div class="modal fade" id="detailModal" style="width:100%;">
        <div class="modal-dialog" style="width:70%; margin-top:5%; margin-left:17%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Reservation Details</h4>
                </div>
                <div class="modal-body">
                    <div id="CustomerDetailsDiv">
                        <h4><strong>Customer Information</strong></h4>
                        <div class="row" style="margin-left: 20px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input type="text" class="form-control" id="editCustomerName" name="editCustomerName" column="20" style="width: 350px" required>
                                    <input type="text"  name="reservationNumber" id="reservationNumber" style="display: none;">
                                </div>

                                <div class="form-group">
                                    <label>Home Address</label>
                                    <input type="text" class="form-control" id="editHomeAddress" name="editHomeAddress" column="20" style="width: 350px" required>
                                </div>

                                <div class="form-group">
                                    <label>Billing Address</label>
                                    <input type="text" class="form-control" id="editBillingAddress" name="editBillingAddress" column="20" style="width: 350px" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" id="editEmailAddress" name="editEmailAddress" column="20" style="width: 350px" required>
                                </div>

                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" id="editContactNumber" name="editContactNumber" column="20" style="width: 350px" required>
                                </div>

                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="text" class="form-control" id="editDateOfBirth" name="editDateOfBirth" column="20" style="width: 350px" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="eventDetailsDiv">
                        <h4><strong>Event Information</strong></h4>
                        <div class="row" style="margin-left: 20px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Event Name</label>
                                    <input type="text" class="form-control" id="editEventName" name="editEventName" column="20" style="width:350px" required>
                                </div>

                                <div class="form-group">
                                    <label>Event Date</label>
                                    <input type="text" class="form-control" id="editEventDate" name="editEventDate" column="20" style="width: 350px" required>
                                </div>

                                <div class="form-group">
                                    <label>Start Time</label>
                                    <input type="text" class="form-control" id="editEventStartTime" name="editEventStartTime" column="20" style="width: 350px" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Event Location</label>
                                    <input type="text" class="form-control" id="editEventLocation" name="editEventLocation" column="20" style="width: 350px" required>
                                </div>

                                <div class="form-group">
                                    <label>Number of Guests</label>
                                    <input type="text" class="form-control" id="editEventGuestCount" name="editEventGuestCount" column="20" style="width: 350px" required>
                                </div>

                                <div class="form-group">
                                    <label>End Time</label>
                                    <input type="text" class="form-control" id="editEventEndTime" name="editEventEndTime" column="20" style="width: 350px" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="packageDetailsDiv">
                        <h4><strong>Package Information</strong></h4>
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
                                        <div class="box-body">
                                            <div>
                                                <label>Package Name</label> <br>
                                                <div> 
                                                    <select disabled class="form-control" name="editPackage" id="editPackage">
                                                        <option disabled>Select Package</option>
                                                        @foreach($addReservationData as $packageData)
                                                            <option value="{{ $packageData->packageID }}">{{ $packageData->packageName }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div><br>
                                            <h5><strong> Package Inclusions </strong></h5>
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
                                        </div>
                                    </div>
                                    <!-- End of Package Tab -->

                                    <!-- Additional Food Tab -->
                                    <div class="tab-pane" id="tab_3">
                                        <div class="box-body">
                                            <div id="additionalDishDiv">

                                            </div>
                                        </div>        
                                    </div>
                                    <!-- End of Additional Food Tab -->

                                    {!! csrf_field() !!}
                                    <input type="hidden" id="token" value="{{ csrf_token() }}">

                                    <!-- Additional Equipment Tab -->
                                    <div class="tab-pane" id="tab_4">
                                        <div class="box-body">
                                            <div id="additionalEquipmentDiv">

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Additional Equipment Tab -->

                                    <!-- Additional Service & Staff Tab -->
                                    <div class="tab-pane" id="tab_5">
                                        <div class="box-body">
                                            <div id="additionalServiceDiv">

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Additional Service Tab -->

                                    <!-- Additional Staff Tab -->
                                    <div class="tab-pane" id="tab_6">
                                        <div class="box-body">
                                            <div id="additionalEmployeeDiv">

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Additional Staff Tab -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="modal-footer"  id="confirmationDiv">
                    <a style="display:none;" data-target="#sendApproveEmailModal" data-toggle="modal" onclick="getReservation(document.getElementById('reservationNumber').value);" class="btn btn-app" type="submit">
                    <i class="fa fa-check" ></i> APPROVE
                    </a>
                    <a data-target="#sendApproveEmailModal" data-toggle="modal" onclick="getReservation(document.getElementById('reservationNumber').value);" class="btn btn-app" type="submit">
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
<!-- End of Reservation Details Modal -->   

<!-- Approve Reservation MODAL -->
<form role="form" method="POST" action="ApproveReservationEmail" class="form-horizontal">
    <div class="modal fade" id="sendApproveEmailModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Confirmation</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group" style="display:none;">
                        <label class="col-sm-4 control-label">Reservation ID</label>
                        <div class="col-sm-5 input-group" >
                          <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="approveReservationId" id="approveReservationId" readonly="">
                          <input type="text" class="form-control" name="totalReservationFee" id="totalReservationFee" readonly="">
                          <input type="text" class="form-control" name="mailPaymentTerm" id="mailPaymentTerm" readonly="">
                          <input type="text" class="form-control" name="mailCustomerID" id="mailCustomerID" readonly="">
                          <input type="text" class="form-control" name="mailEventDate" id="mailEventDate" readonly="">
                          <input type="text" class="form-control" name="mailEventStartTime" id="mailEventStartTime" readonly="">
                          <input type="text" class="form-control" name="mailEventEndTime" id="mailEventEndTime" readonly="">
                          <input type="text" class="form-control" name="mailPackageAvailed" id="mailPackageAvailed" readonly="">
                          <input type="text" class="form-control" name="mailNumOfGuest" id="mailNumOfGuest" readonly="">
                          <input type="text" class="form-control" name="mailDishInclusion" id="mailDishInclusion" readonly="">
                          <input type="text" class="form-control" name="mailDishAdditional" id="mailDishAdditional" readonly="">
                          <input type="text" class="form-control" name="mailServiceAdditional" id="mailServiceAdditional" readonly="">
                          <input type="text" class="form-control" name="mailEmployeeAdditional" id="mailEmployeeAdditional" readonly="">
                          <input type="text" class="form-control" name="mailEquipmentAdditional" id="mailEquipmentAdditional" readonly="">
                          <input type="text" class="form-control" name="mailEventLocation" id="mailEventLocation" readonly=""> 
                          <input type="text" class="form-control" name="mailEventName" id="mailEventName" readonly="">
                          <input type="text" class="form-control" name="mailCustomerName" id="mailCustomerName" readonly="">
                        </div>
                    </div>
                </div>
                {!! csrf_field() !!}
                <div align="center">
                    <h4> Are you sure you want to approve this reservation? </h4>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Confirm</button>
                    <button data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End of Approve Reservation MODAL-->

<!-- Deny Reservation Modal-->
<form role="form" method="POST" action="DenyReservationEmail" class="form-horizontal">
    <div class="modal fade" id="sendDenyEmailModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Confirmation</h4>
                </div>
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
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-sm">Confirm</button>
                        <button data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Deny Reservation Modal-->

<!-- Scripts -->
<script src="{{ asset('LTE/fullcalendar/lib/moment.min.js')}}"></script>
<script src="{{ asset('LTE/fullcalendar/fullcalendar.min.js')}}"'></script>
<script src="{{ asset('LTE/fullcalendar/gcal.min.js')}}"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
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

        $('#reservationListTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "columnDefs": [{
                "targets": [ 0 ],
                "visible": false,
            }],
        });

    });

    function getReservation(id){
        $.ajax({
            type: "GET",
            url:  "/RetrieveReservationID",
            data: {
                sdid: id
            },
            success: function(data){
                $('#approveReservationId').val(data['ss'][0]['reservationID']);
                $('#denyReservationId').val(data['ss'][0]['reservationID']);
            },
            error: function(xhr){
                alert($.parseJSON(xhr.responseText)['error']['message']);
            }                
        });
    }

    function getReservationDetail(id){
        $.ajax({
            type: "GET",
            url:  "/RetrieveReservation",
            data: 
            {
                sdid: id
            },
            success: function(data){
                $('#editReservationID').val(data['ss'][0]['reservationID']);
                $('#editReservationDate').val(data['ss'][0]['eventDate']);
                var opty = document.getElementById('editReservationPackage').options;
                for(var i =0; i<opty.length; i++){
                    if(opty[i].value==data['ss'][0]['packageID']){
                        $('#editReservationPackage').val(data['ss'][0]['packageID']) ;
                        break;
                    }
                }
            },
            error: function(xhr)
            {
                alert($.parseJSON(xhr.responseText)['error']['message']);
            }                
        });
    }
</script>
<script>
    $(document).ready(function() {
        var table = $('#reservationListTable').DataTable();
        $('#reservationListTable tbody').on('dblclick', 'tr', function () {
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
            var reservationEventLocation2Var = data[24];
            $('#editReservationID').val(reservationIDVar);
            $('#editCustomerName').val(reservationCustomerNameVar);
            $('#reservationNumber').val(reservationIDVar);
            $('#editHomeAddress').val(customerHomeAddressVar);
            $('#editEmailAddress').val(customerEmailAddressVar);
            $('#editContactNumber').val(customerCellNumVar);
            $('#editDateOfBirth').val(customerDateOfBirthVar);
            $('#editEventName').val(reservationEventNameVar);
            $('#editEventDate').val(reservationDateVar);
            $('#editBillingAddress').val(customerBillingAddressVar);
            if(reservationEventLocationVar.length < 1){
                $('#editEventLocation').val(reservationEventLocation2Var);
            }
            else{
                $('#editEventLocation').val(reservationEventLocationVar);
            }
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
                data:{     
                    sdid: reservationPackageID,
                    sendReservationID: reservationIDVar
                },
                success: function(data){
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
                    if((data['additionalDish'].length)>0){
                        for (var i = 0; i < data['additionalDish'].length; i++) {
                            document.getElementById('additionalDishDiv').innerHTML += '<h6>'+data['additionalDish'][i]['dishName']+'</h6>';
                            var additionalDishMultiplier = parseFloat(data['additionalDish'][i]['additionalServing']);
                            var additionalDishCost = parseFloat(data['additionalDish'][i]['dishCost']);
                            var newAdditionalDishCost = (additionalDishMultiplier * additionalDishCost);
                            additionalDishFee = newAdditionalDishCost + additionalDishFee;
                        } 
                    }
                    else{
                        additionalDishFee = 0;
                    }
                    if((data['additionalService'].length)>0){
                        for (var i = 0; i < data['additionalService'].length; i++) {
                            document.getElementById('additionalServiceDiv').innerHTML += '<h6>'+data['additionalService'][i]['serviceName']+'</h6>';
                            var additionalServiceMultiplier = parseFloat(data['additionalService'][i]['serviceAdditionalQty']);
                            var additionalServiceCost = parseFloat(data['additionalService'][i]['serviceFee']);
                            var newAdditionalServiceCost = (additionalServiceMultiplier * additionalServiceCost);
                            additionalServiceFee = additionalServiceFee + newAdditionalServiceCost;
                        }
                    }
                    else{
                        additionalServiceFee = 0;
                    }
                    if((data['additionalEquipment'].length)>0){
                        for (var i = 0; i < data['additionalEquipment'].length; i++) {
                            document.getElementById('additionalEquipmentDiv').innerHTML += '<h6>'+data['additionalEquipment'][i]['equipmentName']+'</h6>';
                            var additionalEquipmentMultiplier = parseFloat(data['additionalEquipment'][i]['equipmentAdditionalQty']);
                            var additionalEquipmentCost = parseFloat(data['additionalEquipment'][i]['equipmentRatePerHour']);
                            var newAdditionalEquipmentCost = (additionalEquipmentMultiplier * additionalEquipmentCost);
                            additionalEquipmentFee = newAdditionalEquipmentCost + additionalEquipmentFee;
                        }
                    }
                    else{
                        additionalEquipmentFee = 0;
                    }
                    if((data['additionalEmployee'].length)>0){
                        for (var i = 0; i < data['additionalEmployee'].length; i++) {
                            document.getElementById('additionalEmployeeDiv').innerHTML += '<h6>'+data['additionalEmployee'][i]['employeeTypeName']+'</h6>';
                            var additionalEmployeeMultiplier = parseFloat(data['additionalEmployee'][i]['employeeAdditionalQty']);
                            var additionalEmployeeCost = parseFloat(data['additionalEmployee'][i]['employeeRatePerHour']);
                            var newAdditionalEmployeeCost = (additionalEmployeeMultiplier * additionalEmployeeCost);
                            additionalEmployeeFee = newAdditionalEmployeeCost + additionalEmployeeFee;
                        }
                    }
                    else{
                        additionalEmployeeFee = 0;
                    }
                    totalFeePerm = totalFeeTemp + additionalDishFee + additionalServiceFee + additionalEmployeeFee + additionalEquipmentFee; 
                    $('#totalReservationFee').val(totalFeePerm);
                    $('#mailEventLocation').val(reservationEventLocationVar);
                    $('#mailPackageAvailed').val(reservationPackageVar);
                    $('#mailEventDate').val(reservationDateVar);
                    $('#mailPaymentTerm').val(reservationPaymentTerm);
                    $('#mailCustomerID').val(customerID);
                    $('#mailEventDate').val(reservationEventDate);
                    $('#mailEventStartTime').val(reservationEventTimeVar);
                    $('#mailEventEndTime').val(reservartionEndTimeVar);
                    $('#mailNumOfGuest').val(reservationGuestCountVar);
                    $('#mailEventName').val(reservationEventNameVar);
                    $('#mailCustomerName').val(customerName);
                    if( reservationStatus == 2){
                        var x = document.getElementById('confirmationDiv');
                        x.style.display = 'none';
                    }
                    if( reservationStatus == 3){
                        var x = document.getElementById('confirmationDiv');
                        x.style.display = 'none';
                    }
                    $("#detailModal").modal("show");     
                },
                error: function(xhr){
                  alert($.parseJSON(xhr.responseText)['error']['message']);
                }             
            });
        });
    });
</script>
<!-- End of Scripts -->


@endsection