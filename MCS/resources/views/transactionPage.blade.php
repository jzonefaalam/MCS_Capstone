@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <style>
  .btn-space{
    margin-right: 5px;
  }
  </style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <br>
    <ol class="breadcrumb">
        <li><a href="TransactionPage"><i class="fa fa-wrench"></i>Transaction</a></li>
    </ol>
</section>

<section class="content">
    <div class="box box-danger">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-md-6">
                    <h2>Transaction List</h2>
                </div>
            </div>  
        </div>
        <div class="box-body">
            <h5><i><b>Note:</b> Double click the row to view transaction details.</i></h5>
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab"> Pending Events</a></li>
                        <li><a href="#tab_2" data-toggle="tab">On Going Events</a></li>
                        <li><a href="#tab_3" data-toggle="tab">Pending Payments</a></li>
                        <li><a href="#tab_4" data-toggle="tab">Cancelled Events</a></li>
                        <li><a href="#tab_5" data-toggle="tab">Rejected Reservations</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <table id="pendingEventsTable" class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th style="display: none;">Transaction #</th>
                                        <th>Event Name</th>
                                        <th>Customer</th>
                                        <th>Payment</th>
                                        <th>Event Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rejectedReservations as $rrData)
                                        <?php if (($rrData->reservationStatus)==0): ?>
                                            <tr>
                                                <td style="display: none;">{{ $rrData->transactionID }}</td>
                                                <td>{{ $rrData->eventName }}</td>
                                                <td>{{ $rrData->fullName }}</td>
                                                <td>{{ $rrData->totalFee }}</td>
                                                <td>{{ $rrData->eventDate }}</td>
                                            </tr>
                                        <?php endif ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tab_2">
                            <table id="onGoingEventsTable" class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th style="display: none;">Transaction #</th>
                                        <th>Event Name</th>
                                        <th>Customer</th>
                                        <th>Payment</th>
                                        <th>Event Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rejectedReservations as $rrData)
                                        <?php if (($rrData->reservationStatus)==2): ?>
                                            <tr>
                                                <td style="display: none;">{{ $rrData->transactionID }}</td>
                                                <td>{{ $rrData->eventName }}</td>
                                                <td>{{ $rrData->fullName }}</td>
                                                <td>{{ $rrData->totalFee }}</td>
                                                <td>{{ $rrData->eventDate }}</td>
                                            </tr>
                                        <?php endif ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tab_3">
                            <table id="pendingPaymentsTable" class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th style="display: none;">Transaction #</th>
                                        <th>Event Name</th>
                                        <th>Customer</th>
                                        <th>Payment</th>
                                        <th>Event Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rejectedReservations as $rrData)
                                        <?php if (($rrData->reservationStatus)==4): ?>
                                            <tr>
                                                <td style="display: none;">{{ $rrData->transactionID }}</td>
                                                <td>{{ $rrData->eventName }}</td>
                                                <td>{{ $rrData->fullName }}</td>
                                                <td>{{ $rrData->totalFee }}</td>
                                                <td>{{ $rrData->eventDate }}</td>
                                            </tr>
                                        <?php endif ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tab_4">
                            <table id="cancelledEventsTable" class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th style="display: none;">Transaction #</th>
                                        <th>Event Name</th>
                                        <th>Customer</th>
                                        <th>Payment</th>
                                        <th>Event Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rejectedReservations as $rrData)
                                        <?php if (($rrData->reservationStatus)==5): ?>
                                            <tr>
                                                <td style="display: none;">{{ $rrData->transactionID }}</td>
                                                <td>{{ $rrData->eventName }}</td>
                                                <td>{{ $rrData->fullName }}</td>
                                                <td>{{ $rrData->totalFee }}</td>
                                                <td>{{ $rrData->eventDate }}</td>
                                            </tr>
                                        <?php endif ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tab_5">
                            <table id="rejectedReservationsTable" class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th style="display: none;">Transaction #</th>
                                        <th>Event Name</th>
                                        <th>Customer</th>
                                        <th>Payment</th>
                                        <th>Event Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rejectedReservations as $rrData)
                                        <?php if (($rrData->reservationStatus)==3): ?>
                                            <tr>
                                                <td style="display: none;">{{ $rrData->transactionID }}</td>
                                                <td>{{ $rrData->eventName }}</td>
                                                <td>{{ $rrData->fullName }}</td>
                                                <td>{{ $rrData->totalFee }}</td>
                                                <td>{{ $rrData->eventDate }}</td>
                                            </tr>
                                        <?php endif ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PAYMENT EVENT Modal -->
<form id="paymentForm" role="form" method="POST" action="#" class="form-horizontal">
    <div class="modal fade" id="paymentModal" >
        <div class="modal-dialog" style="width:70%;">
            <div class="modal-content">
                <div class="modal-body">
                    {!! csrf_field() !!}
                    <div class="row" align="center">
                        <div class="box" style="width:95%;">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6" align="left">
                                        <label>Customer Name: </label>
                                        <div id="paymentModalCustomerName" style="display: inline-block;">
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
                                        <input id="paymentModalpaymentTerm" type="text" hidden>
                                        <input id="paymentModalTransactionID" type="text" style="display: none;">
                                        <input id="paymentModalPaymentFee" type="text" style="display: none;">
                                        <input id="paymentModalTransactionFee" type="text" style="display: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table id="paymentDetailTbl" class="table table-striped table-bordered" style="width:95%;">
                            <thead>
                                <tr>
                                    <th>Payment Amount</th>
                                    <th>Due Date</th>
                                    <th>Date Received</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="paymentDetailTblBody">
                                <input type="hidden" id="token" value="{{ csrf_token() }}">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End -->    

<!-- Transaction Modal-->
<form role="form" method="POST" action="#" class="form-horizontal">
    <div  class="modal fade" id="transactionModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="transModal">Customer and Event Information</h4>
                </div>
                <div class="modal-body">
                    {!! csrf_field() !!}
                    <div name="customerDetails">
                        <div class="row">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-6" for="email">Customer Name:</label>
                                    <div class="col-sm-5">
                                        <p class="form-control-static" id="parCustomerName" style="color: red; font-size: 16px"></p>
                                    </div>
                                    <label class="control-label col-sm-6" for="email">Customer Number:</label>
                                    <div class="col-sm-5">
                                        <p class="form-control-static" id="parContactNumber" style="color: red; font-size: 16px"></p>
                                    </div>
                                    <label class="control-label col-sm-6" for="email">Event Name:</label>
                                    <div class="col-sm-5">
                                        <p class="form-control-static" id="parEventName" style="color: red; font-size: 16px"></p>
                                    </div>
                                    <label class="control-label col-sm-6" for="email">Event Location:</label>
                                    <div class="col-sm-5">
                                        <p class="form-control-static" id="parEventLocation" style="color: red; font-size: 16px"></p>
                                    </div>
                                    <label class="control-label col-sm-6" for="email">Number of Guests:</label>
                                    <div class="col-sm-5">
                                        <p class="form-control-static" id="parNumberOfGuest" style="color: red; font-size: 16px"></p>
                                    </div>
                                    <label class="control-label col-sm-6" for="email">Availed Package:</label>
                                    <div class="col-sm-5">
                                        <p class="form-control-static" id="parAvailedPackage" style="color: red; font-size: 16px"></p>
                                    </div>
                                    <label class="control-label col-sm-6" for="email">Additional:</label>
                                    <div class="col-sm-5">
                                        <p class="form-control-static" id="parAdditionalItem" style="color: red; font-size: 16px"></p>
                                    </div>
                                    <label class="control-label col-sm-6" for="email">Total Fee:</label>
                                    <div class="col-sm-5">
                                        <p class="form-control-static" id="parTotalFee" style="color: red; font-size: 16px"></p>
                                    </div>
                                    <label class="control-label col-sm-6" for="email">Payment Term:</label>
                                    <div class="col-sm-5">
                                        <p class="form-control-static" id="parPaymentTerm" style="color: red; font-size: 16px"></p>
                                    </div>
                                    <label class="control-label col-sm-6" for="email">Payment Status:</label>
                                    <div class="col-sm-5">
                                        <p class="form-control-static" id="parPaymentStatus" style="color: red; font-size: 16px"></p>
                                    </div>
                                </div>
                                <input type="text"  name="parTransactionId" id="parTransactionId" style="display: none;">
                                <input type="text"  name="parReservationID" id="parReservationID" style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a data-target="#cancelEventModal" id="cancelBtn" data-toggle="modal" onclick="cancelEvent(document.getElementById('parTransactionId').value);" class="btn btn-app" type="submit" style=" float:right; display:none;">
                        <i class="fa fa-times" ></i> Cancel Event
                    </a>
                    <a class="btn btn-app" id="paymentBtn" onclick="getPayment(document.getElementById('parReservationID').value);" style="float:right; display:none;">
                        <i class="fa fa-money"></i> Payment
                    </a>
                    <a class="btn btn-app" id="assessmentBtn" onclick="assessmentEvent(document.getElementById('parTransactionId').value);" style="float:right; display:none;">
                        <i class="fa fa-print"></i>Assessment
                    </a>
                    <a sstyle="float:right;" class="btn btn-app" id="assignBtn" onclick="assignEvent(document.getElementById('parReservationID').value);" style="float:right; display:none;">
                       <i class="fa fa-edit" ></i> Assign Equipment
                    </a>
                    <a class="btn btn-app" id="printBtn" href="#" style="float:right; display:none;" onclick="getReservation(document.getElementById('parTransactionId').value);">
                        <i class="fa fa-print"></i>Print
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End of Transaction Modals-->

<!-- CANCEL EVENT MODAL -->
<form role="form" method="POST" action="CancelEvent" class="form-horizontal">
    <div class="modal fade" id="cancelEventModal">
        <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-body">
                    <div class="form-group" style="display:none;">
                        <label class="col-sm-4 control-label">Transaction ID</label>
                        <div class="col-sm-5 input-group" >
                            <input type="text"  name="cancelEventTransactionId" id="cancelEventTransactionId" style="display: none;">
                        </div>
                    </div>
                </div>
                {!! csrf_field() !!}
                <div>
                    <h5> Are you sure you want to cancel this event? </h5>
                </div>
                <div style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                    <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End of cancel event Modals-->

<!-- Event Modal -->
<form id="eventForm" role="form" action="#" class="form-horizontal">
    <div class="modal fade" id="eventModal" >
        <div class="modal-dialog" style="width:70%;">
            <div class="modal-content">
                <div class="modal-body">
                    {!! csrf_field() !!}
                    <div class="row" align="center">
                        <div class="box" style="width:95%;">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6" align="left">
                                        <label>Customer Name: </label>
                                        <div id="eventModalCustomerName" style="display: inline-block;">
                                          
                                        </div><br>
                                        <label>Event Name: </label>
                                        <div id="eventModalEventName" style="display: inline-block;">
                                          
                                        </div><br>
                                        <label>Event Date: </label>
                                        <div id="eventModalEventDate" style="display: inline-block;">
                                          
                                        </div>
                                    </div>
                                    <div class="col-md-6" align="left">
                                        <label>Contact Number: </label>
                                        <div id="eventModalCustomerNumber" style="display: inline-block;">

                                        </div><br>
                                        <label>Package Availed: </label>
                                        <div id="eventModalPackageAvailed" style="display: inline-block;">
                                          
                                        </div><br>
                                        <label>Event Location: </label>
                                        <div id="eventModalEventLocation" style="display: inline-block;">
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-bordered table-striped dataTable" id="equipmentTbl" style="width:95%;" align="center">
                            <thead>
                                <tr>
                                    <th>Equipment</th>
                                    <th>Equipment Quantity</th>
                                </tr>
                            </thead>
                            <tbody id="equipmentTblBody">
                              
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="assignEquipmentBtn" onclick="getEquipmentDetails();" class="btn btn-default" type="button">Assign Equipment</button>
                    <button id="assessEquipmentBtn" type="button" href="#" style="display: none;" class="btn btn-default">Assessment of Equipment</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End of event modal-->

<!-- Assign Modal -->
<form id="assignForm" role="form" method="POST" action="/AssignEquipment" class="form-horizontal">
    <div class="modal fade" id="assignEquipmentModal" >
        <div class="modal-dialog" style="width:70%;">
            <div class="modal-content">
                <div class="modal-body">
                    {!! csrf_field() !!}
                    <div class="row" align="center">
                        <div class="box" style="width:95%;">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6" align="left">
                                        <label>Customer Name: </label>
                                        <div id="assignModalCustomerName" style="display: inline-block;">
                          
                                        </div><br>
                                        <label>Event Name: </label>
                                        <div id="assignModalEventName" style="display: inline-block;">
                                          
                                        </div><br>
                                        <input style="display:none;" type="text" id="assignModalReservationID" name="assignModalReservationID">
                                        <input style="display:none;" type="text" id="assignModalPackageID" name="assignModalPackageID">
                                        <input style="display:none;" type="text" id="addItemCtr" name="addItemCtr">
                                        <input style="display:none;" type="text" id="additionalItemCtr" name="additionalItemCtr">
                                    </div>
                                    <div class="col-md-6" align="left">
                                        <label>Guest Count: </label>
                                        <div id="assignModalGuestCount" style="display: inline-block;">

                                        </div>
                                        <br>
                                        <label>Package Availed: </label>
                                        <div id="assignModalPackageName" style="display: inline-block;">
                                          
                                        </div><br>
                                    </div>
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
                                </tr>
                            </thead>
                            <tbody id="equipmentAssignTblBody">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="assignEquipmentBtn" class="btn btn-default" type="submit">Save</button>
                    <button type="button" href="#" class="btn btn-default">Back</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End of Assign Modal -->

<!-- Submit Payment Form -->
<form role="form" method="POST" action="SubmitPayment" class="form-horizontal">
    <div class="modal fade" id="submitEventModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group" >
                        <label class="col-sm-4 control-label">Payment ID</label>
                        <div class="col-sm-5 input-group" >
                            <input type="text"  name="submitPaymentID" id="submitPaymentID" >
                            <input type="text"  name="submitPaymentTransactionID" id="submitPaymentTransactionID">
                            <input type="text"  name="submitPaymentTermID" id="submitPaymentTermID" >
                            <input type="text"  name="submitPaymentReceiveDate" id="submitPaymentReceiveDate" >
                            <input type="text"  name="submitPaymentChecker" id="submitPaymentChecker" >
                            <input type="text"  name="submitPaymentFee" id="submitPaymentFee" >
                            <input type="text"  name="submitTransactionFee" id="submitTransactionFee" >
                        </div>
                    </div>
                </div>
                {!! csrf_field() !!}
                <div>
                    <h5> Are you sure you want to submit this event? </h5>
                </div>
                <div style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                    <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Submit Payment Form-->

  </div>

<!-- Scripts -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

<script>
    $("#assignEquipmentBtn").click(function(e){
        $("#eventModal").modal("hide");
        var packageID = document.getElementById('assignModalPackageID').value; 
        var reservationID = document.getElementById('assignModalReservationID').value; 
        $.ajax({
            type: "GET",
            url:  "/RetrievePackageInclusion",
            data: {
                sdid: packageID,
                sendReservationID: reservationID
            },
            success: function(data){
                var itemName, itemQty, itemID;
                var addItemName, addItemQtyID, addItemID;
                var addItemCounter = 0;
                var additionalItemCounter = 0;
                var tblSDet = $('#equipmentAssignTbl').DataTable();
                tblSDet.clear();
                tblSDet.draw(true);
                for (var i = 0; i < data['ff'].length; i++) {
                    addItemName = "addItemName" + i;
                    addItemID = "addItemID" + i;
                    addItemQtyID = "addItemQtyID" + i;
                    itemID = '<input style="display: none;" name="' + addItemID + '" id="' + addItemID + '" value="' + data['ff'][i]['equipmentID'] + '" />';
                    itemName = data['ff'][i]['equipmentName'];
                    itemQty = '<input value="0" name="' + addItemQtyID + '" id="' + addItemQtyID + '"type="number">';
                    tblSDet.row.add([
                        itemName,
                        itemQty,
                        itemID
                    ]).draw(true);
                    addItemCounter = addItemCounter + 1;
                }
                for (var i = 0; i < data['additionalEquipment'].length; i++) {
                    addItemName = "additionalItemName" + i;
                    addItemID = "additionalItemID" + i;
                    addItemQtyID = "additionalItemQtyID" + i;
                    itemID = '<input style="display: none;" name="' + addItemID + '" id="' + addItemID + '" value="' + data['ff'][i]['equipmentID'] + '" />';
                    itemName = "Additional: " + data['ff'][i]['equipmentName'];
                    itemQty = '<input name="' + addItemQtyID + '" id="' + addItemQtyID + '"type="number" value="' + data['additionalEquipment'][i]['equipmentAdditionalQty']+ '">';
                    tblSDet.row.add([
                        itemName,
                        itemQty,
                        itemID
                    ]).draw(true);
                    additionalItemCounter = additionalItemCounter + 1;
                }
                document.getElementById('addItemCtr').value = addItemCounter;
                document.getElementById('additionalItemCtr').value = additionalItemCounter;
                $("#assignEquipmentModal").modal("show"); 
            },
            error: function(xhr){
                alert($.parseJSON(xhr.responseText)['error']['message']);
            }                
        }); 
    }); 
</script> 

<script>
    function assignEvent(id){
        var reservationID = id;
        var packageID;
        $.ajax({
            type: "GET",
            url:  "/RetrieveEventDetail",
            data: {
                sendReservationID: reservationID
            },
            success: function(data){
                document.getElementById('eventModalCustomerName').innerHTML += '<h6>'+data['eventDetail'][0]['fullName']+'</h6>';
                document.getElementById('eventModalEventName').innerHTML += '<h6>'+data['eventDetail'][0]['eventName']+'</h6>';
                document.getElementById('eventModalEventDate').innerHTML += '<h6>'+data['eventDetail'][0]['eventDate']+'</h6>';
                document.getElementById('eventModalCustomerNumber').innerHTML += '<h6>'+data['eventDetail'][0]['cellNum']+'</h6>';
                document.getElementById('eventModalPackageAvailed').innerHTML += '<h6>'+data['eventDetail'][0]['packageName']+'</h6>';
                document.getElementById('eventModalEventLocation').innerHTML += '<h6>'+data['eventDetail'][0]['eventLocation']+'</h6>';
                document.getElementById('assignModalCustomerName').innerHTML += '<h6>'+data['eventDetail'][0]['fullName']+'</h6>';
                document.getElementById('assignModalPackageName').innerHTML += '<h6>'+data['eventDetail'][0]['packageName']+'</h6>';
                document.getElementById('assignModalGuestCount').innerHTML += '<h6>'+data['eventDetail'][0]['guestCount']+'</h6>';
                document.getElementById('assignModalEventName').innerHTML += '<h6>'+data['eventDetail'][0]['eventName']+'</h6>';
                document.getElementById('assignModalPackageID').value = data['eventDetail'][0]['packageID'];
                document.getElementById('assignModalReservationID').value = reservationID;
                var checkEventDate = data['eventDetail'][0]['eventDate'];
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
                if(diffDays<0){
                    var x = document.getElementById('assessEquipmentBtn');
                    x.style.display = '';
                    var y = document.getElementById('assignEquipmentBtn');
                    y.style.display = 'none';
                }
                $.ajax({
                    type: "GET",
                    url:  "/RetrieveAssignedEquipment",
                    data:{
                        sendReservationID: reservationID
                    },
                    success: function(data){
                        var equipmentName, equipmentQty;
                        var tblSDet = $('#equipmentTbl').DataTable();
                        tblSDet.clear();
                        tblSDet.draw(true);
                        for (var i = 0; i < data['ss'].length; i++) {
                            equipmentName = data['ss'][i]['equipmentName'];
                            equipmentQty = data['ss'][i]['assignEquipmentQty'];
                            tblSDet.row.add([
                                equipmentName,
                                equipmentQty,
                            ]).draw(true);
                        }
                        $("#transactionModal").modal("hide");
                        $("#eventModal").modal("show");
                    },
                    error: function(xhr){
                        alert($.parseJSON(xhr.responseText)['error']['message']);
                    }                
                });
            },
            error: function(xhr){
                alert("mali");
                alert($.parseJSON(xhr.responseText)['error']['message']);
            }                
        });
    }
</script>

<script>
    function getPayment(id){
        var reservationID = id;
        $("#transactionModal").modal("hide");
        $.ajax({
            type: "GET",
            url:  "/RetrieveEventDetail",
            data: {
                sendReservationID: reservationID
            },
            success: function(data){
                document.getElementById('paymentModalCustomerName').innerHTML += '<h6>'+data['eventDetail'][0]['fullName']+'</h6>';
                document.getElementById('paymentModalEventName').innerHTML += '<h6>'+data['eventDetail'][0]['eventName']+'</h6>';
                document.getElementById('paymentModalEventDate').innerHTML += '<h6>'+data['eventDetail'][0]['eventDate']+'</h6>';
                document.getElementById('paymentModalContactNumber').innerHTML += '<h6>'+data['eventDetail'][0]['cellNum']+'</h6>';
                document.getElementById('paymentModalpaymentTerm').value=data['eventDetail'][0]['paymentTermID'];
                document.getElementById('paymentModalTransactionID').value=data['eventDetail'][0]['transactionID'];
                document.getElementById('paymentModalTransactionFee').value=data['eventDetail'][0]['totalFee'];
                $.ajax({
                    type: "GET",
                    url:  "/RetrievePaymentDetail",
                    data:{
                        reservationID: reservationID
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
                                paymentReceiveDate = '<input type="date" id="' + addPaymentReceiveDate + '" max="{{date('Y-m-d',  strtotime( '+2 month' ))}}" min="{{date('Y-m-d',  strtotime( '+7 day' ))}}">';
                                paymentActionBtn = '<input data-target="#submitEventModal" data-toggle="modal" type="button" id="' + addPaymentBtnID + '" value="Confirm" onclick=" ' +submitPayment+ '(this.name)" name="'+data['paymentDetail'][i]['paymentID']+'">';
                            }
                            if (statusChecker == 1) {
                                paymentStatus = '<span id="' + addPaymentStatusID + '" class="label label-success">Confirmed</span>';
                                paymentReceiveDate = '<input disabled value="' + data['paymentDetail'][i]['paymentReceiveDate'] + '" id="' + addPaymentReceiveDate + '" data-date-format="yyyy/mm/dd">';
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
                    error: function(xhr){
                        alert("mali");
                        alert($.parseJSON(xhr.responseText)['error']['message']);
                    }                
                });
            },
            error: function(xhr){
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
        document.getElementById('submitPaymentTransactionID').value = transactionID;
        document.getElementById('submitPaymentReceiveDate').value = receiveDate0;
        document.getElementById('submitPaymentTermID').value = paymentTermID;
        document.getElementById('submitPaymentID').value = paymentID0;
        document.getElementById('submitPaymentChecker').value = 1;
    }

    //Second Payment
    function submitPayment1(id){
        var paymentID1 = id;
        var receiveDate1 = document.getElementById('addPaymentReceiveDate1').value;
        var transactionID = document.getElementById('paymentModalTransactionID').value;
        var paymentTermID = document.getElementById('paymentModalpaymentTerm').value;
        var transactionFee = document.getElementById('paymentModalTransactionFee').value;
        var paymentFee = document.getElementById('paymentModalPaymentFee').value;
        document.getElementById('submitPaymentTransactionID').value = transactionID;
        document.getElementById('submitPaymentReceiveDate').value = receiveDate1;
        document.getElementById('submitPaymentTermID').value = paymentTermID;
        document.getElementById('submitPaymentID').value = paymentID1;
        document.getElementById('submitPaymentChecker').value = 2;
        document.getElementById('submitPaymentFee').value = paymentFee;
        document.getElementById('submitTransactionFee').value = transactionFee;
    }

    //Second Payment
    function submitPayment2(id){
        var paymentID2 = id;
        var receiveDate2 = document.getElementById('addPaymentReceiveDate2').value;
        var transactionID = document.getElementById('paymentModalTransactionID').value;
        var paymentTermID = document.getElementById('paymentModalpaymentTerm').value;
        var transactionFee = document.getElementById('paymentModalTransactionFee').value;
        var paymentFee = document.getElementById('paymentModalPaymentFee').value;
        document.getElementById('submitPaymentTransactionID').value = transactionID;
        document.getElementById('submitPaymentReceiveDate').value = receiveDate2;
        document.getElementById('submitPaymentTermID').value = paymentTermID;
        document.getElementById('submitPaymentID').value = paymentID2;
        document.getElementById('submitPaymentChecker').value = 3;
        document.getElementById('submitPaymentFee').value = paymentFee;
        document.getElementById('submitTransactionFee').value = transactionFee;
    }
</script>

<script>
    function cancelEvent(id){
        var transactionID = id;
        $.ajax({
            type: "GET",
            url:  "/RetrieveTransaction",
            data:{
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

<script>
  $(function () {
        $('#paymentDetailTbl').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": true
        });
        $('#rejectedReservationsTable').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": true,
          "autoWidth": true
        });
        $('#pendingEventsTable').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": true,
          "autoWidth": true
        });
        $('#onGoingEventsTable').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": true,
          "autoWidth": true
        });
        $('#pendingPaymentsTable').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": true,
          "autoWidth": true
        });
        $('#cancelledEventsTable').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": true,
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
        $('#equipmentAssignTbl').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": true
        });
    });
</script>

<script>
    function getReservation(id){
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        frameDoc.document.write('<html><head>');
        frameDoc.document.write('</head><body>');
        frameDoc.document.write('<style> .invoice-box{ max-width:800px; margin:auto; padding:30px; border:1px solid #eee; box-shadow:0 0 10px rgba(0, 0, 0, .15); font-size:16px; line-height:24px; font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; color:#555; } .invoice-box table{ width:100%; line-height:inherit; text-align:left; } .invoice-box table td{ padding:5px; vertical-align:top; } .invoice-box table tr td:nth-child(2){ text-align:right; } .invoice-box table tr.top table td{ padding-bottom:20px; } .invoice-box table tr.top table td.title{ font-size:45px; line-height:45px; color:#333; } .invoice-box table tr.information table td{ padding-bottom:40px; } .invoice-box table tr.heading td{ background:#eee; border-bottom:1px solid #ddd; font-weight:bold; } .invoice-box table tr.details td{ padding-bottom:20px; } .invoice-box table tr.item td{ border-bottom:1px solid #eee; } .invoice-box table tr.item.last td{ border-bottom:none; } .invoice-box table tr.total td:nth-child(2){ border-top:2px solid #eee; font-weight:bold; } @media only screen and (max-width: 600px) { .invoice-box table tr.top table td{ width:100%; display:block; text-align:center; } .invoice-box table tr.information table td{ width:100%; display:block; text-align:center; } } </style>');
        frameDoc.document.write('<html><body> <div > <table cellpadding="0" cellspacing="0"> <tr class="top"> <td colspan="2">   ');
        frameDoc.document.write('<image src = "logo.png" align = "pullcenter"  width = "130" height = "100" style ="padding-left:10px"> ');
        frameDoc.document.write('<p align = "Center">Margareth Catering Services </br> ');
        frameDoc.document.write(' B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br> ');
        frameDoc.document.write(' 696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>');
        frameDoc.document.write(' margarethcateringservices@gmail.com </p></br></br>');
        frameDoc.document.write(' <p align= "right" style ="padding-right:16%">MM/DD/YYYY</p>');
        frameDoc.document.write(' <p align = "left" style = "padding-left:20%">');
        frameDoc.document.write(' Dear (client name),</br></br> ');
        frameDoc.document.write(' </br>We recieved your inquiry and we would like confirm the agreement made during the phone conversation.</br> ');
        frameDoc.document.write(' Thank you for making a reservation.');
        frameDoc.document.write('     Here is the full details of your reservation. Kindly check if all the information is correct.</br>');
        frameDoc.document.write(' </br></br></br>Event Date: ');
        frameDoc.document.write(' </br>Event Time: ');
        frameDoc.document.write(' </br>Event Name:');
        frameDoc.document.write(' </br>Package Availed:');
        frameDoc.document.write(' </br>Chosen Dish/Dishes: ');
        frameDoc.document.write(' </br>Number of Guest:');
        frameDoc.document.write(' </br>Add-ons:');
        frameDoc.document.write(' </br>Service Availed:');
        frameDoc.document.write(' </br>Location:</br>');
        frameDoc.document.write(' </br>As agreed upon the first payment will be made at (date) and the second payment will be at (date).</br>');
        frameDoc.document.write(' This letter will serve as our contract. For further question you can reach us in our phone number 696-4528</br>');
        frameDoc.document.write(' (+63) 928-297-2321 | (+63) 907-208-3331or you can email us at margarethcateringservices@gmail.com</br>');
        frameDoc.document.write(' </br></br></br>');
        frameDoc.document.write('</div></body></html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
    }
</script>

<script>
    $(document).ready(function() {
        var table = $('#transactionTable').DataTable();
        $('#transactionTable tbody').on('dblclick', 'tr', function () {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();
            if(dd<10){
                dd='0'+dd;
            } 
            if(mm<10){
                mm='0'+mm;
            }
            var newDate = yyyy+'-'+mm+'-'+dd;
            var data = table.row( this ).data();
            var transactionId = data[0];
            var eventDate = data[6];
            var packageID;
            var eventID;
            $.ajax({
                type: "GET",
                url:  "/RetrieveTransaction",
                data:{     
                    getId: transactionId
                },
                success: function(data){
                    $('#parTransactionId').val(transactionId);
                    $('#parReservationID').val(data['tdata'][0]['reservationID']);
                    document.getElementById("parCustomerName").innerHTML = data['tdata'][0]['fullName'];
                    document.getElementById("parContactNumber").innerHTML = data['tdata'][0]['cellNum'];
                    document.getElementById("parEventName").innerHTML = data['tdata'][0]['eventName'];
                    document.getElementById("parEventLocation").innerHTML = data['tdata'][0]['eventLocation'];
                    document.getElementById("parAvailedPackage").innerHTML = data['tdata'][0]['packageName'];
                    document.getElementById("parTotalFee").innerHTML = data['tdata'][0]['totalFee'];
                    document.getElementById("parPaymentTerm").innerHTML = data['tdata'][0]['paymentTermName'];
                    if(data['tdata'][0]['transactionStatus'] == 0){
                        document.getElementById("parPaymentStatus").innerHTML = "Pending";
                        document.getElementById('assignBtn').style.display='none';
                        document.getElementById('paymentBtn').style.display='block';
                        document.getElementById('assessmentBtn').style.display='none';
                        document.getElementById('cancelBtn').style.display='block';
                    }
                    if(data['tdata'][0]['transactionStatus'] == 1){
                        document.getElementById("parPaymentStatus").innerHTML = "Fully Paid";
                        document.getElementById('assignBtn').style.display='none';
                        document.getElementById('paymentBtn').style.display='none';
                        document.getElementById('assessmentBtn').style.display='none';
                        document.getElementById('cancelBtn').style.display='block';
                    }
                    if(data['tdata'][0]['transactionStatus'] == 2){
                        document.getElementById("parPaymentStatus").innerHTML = "Half Paid";
                        document.getElementById('assignBtn').style.display='none';
                        document.getElementById('assessmentBtn').style.display='none';
                        document.getElementById('cancelBtn').style.display='block';
                        document.getElementById('printBtn').style.display='none';
                        document.getElementById('paymentBtn').style.display='block';
                    }
                    if(data['tdata'][0]['transactionStatus'] == 3){
                        document.getElementById("parPaymentStatus").innerHTML = "Cancelled";
                        document.getElementById('assignBtn').style.display='none';
                        document.getElementById('assessmentBtn').style.display='none';
                        document.getElementById('cancelBtn').style.display='none';
                        document.getElementById('printBtn').style.display='none';
                        document.getElementById('paymentBtn').style.display='none';
                    }
                    if(data['tdata'][0]['transactionStatus'] == 4){
                        document.getElementById("parPaymentStatus").innerHTML = "Finished";
                        document.getElementById('assessmentBtn').style.display='none';
                        document.getElementById('assignBtn').style.display='none';
                        document.getElementById('printBtn').style.display='none';
                    }
                    if(data['tdata'][0]['transactionStatus'] == 5){
                        document.getElementById("parPaymentStatus").innerHTML = "Additional Payment Pending";
                        document.getElementById('assessmentBtn').style.display='none';
                        document.getElementById('assignBtn').style.display='none';
                        document.getElementById('printBtn').style.display='none';
                        document.getElementById('paymentBtn').style.display='block';
                    }
                    document.getElementById("parNumberOfGuest").innerHTML = data['tdata'][0]['guestCount'];
                    packageID = data['tdata'][0]['packageID'];
                    eventID = data['tdata'][0]['eventID'];
                    $.ajax({
                        type: "GET",
                        url:  "/RetrievePackageInclusion",
                        data:{
                            sdid: packageID,
                            sendReservationID: eventID
                        },
                        success: function(data){
                            var additionalDishList = new Array;
                            var additionalServiceList = new Array;
                            var additionalEmployeeList = new Array;
                            var additionalEquipmentList = new Array;
                            if(data['additionalDish'].length > 0){
                                for (var i = 0; i < data['additionalDish'].length; i++) {
                                    additionalDishList = "[" + data['additionalDish'][i]['additionalServing'] + "] " + 
                                    data['additionalDish'][i]['dishName'];
                                }
                            }
                            else{
                                additionalDishList = "";
                            }
                            if(data['additionalService'].length > 0){
                                for (var i = 0; i < data['additionalService'].length; i++) {
                                    additionalServiceList = "[" + data['additionalService'][i]['serviceAdditionalQty'] + "] " + 
                                    data['additionalService'][i]['serviceName'];
                                }
                            }
                            else{
                                additionalServiceList = "";
                            }
                            if(data['additionalEquipment'].length > 0){
                                for (var i = 0; i < data['additionalEquipment'].length; i++) {
                                    additionalEquipmentList = "[" + data['additionalEquipment'][i]['equipmentAdditionalQty'] + "] " + 
                                    data['additionalEquipment'][i]['equipmentName'];
                                }
                            }
                            else{
                                additionalEquipmentList = "";
                            }
                            if(data['additionalEmployee'].length > 0){
                                for (var i = 0; i < data['additionalEmployee'].length; i++) {
                                    additionalEmployeeList = "[" + data['additionalEmployee'][i]['employeeAdditionalQty'] + "] " + 
                                    data['additionalEmployee'][i]['employeeTypeName'];
                                }
                            }
                            else{
                                additionalEmployeeList = "";
                            }
                            document.getElementById("parAdditionalItem").innerHTML = additionalDishList + " " + additionalEquipmentList + " " + additionalServiceList + " " + additionalEmployeeList;
                            $("#transactionModal").modal("show");
                        }, 
                        error: function(xhr){
                            alert($.parseJSON(xhr.responseText)['error']['message']);
                        }                
                    });
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