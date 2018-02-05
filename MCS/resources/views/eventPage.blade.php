@extends('layouts.admin')

@section('content')

<!-- SweetAlert -->
<link href="{{ asset('sweetalert/dist/sweetalert.css') }}" rel="stylesheet"/>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <br>
        <ol class="breadcrumb">
          <li><a href="menu.php"><i class="fa fa-wrench"></i> Maintenance</a></li>
          <li class="active"><a href = "#"><i class="fa fa-bell-o"></i>Event</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="box box-danger">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Event</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" data-target="#addEventModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> ADD
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-stripped table-bordered dataTable" id="eventTable">
              <thead>
                <tr>
                  <th width="250px">Name</th>
                  <th width="500px">Description</th>
                  <th width="170px">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($eventData as $eventData)
                <tr>
                 <td> {{ $eventData -> eventTypeName }} </td>
                 <td> {{ $eventData -> eventTypeDescription }} </td>
                 <td>
						        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editEventModal" onclick="getEvent(this.name);" name="{{$eventData->eventTypeID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEventModal" onclick="getEvent(this.name);" name="{{$eventData->eventTypeID}}"><i class="fa fa-trash fa-fw"></i> Delete</a>
                 </td>
                </tr>
                @endforeach

                <!-- Disable Package Modal-->
                <div class="modal fade" id="disableModal">
                  <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 250px">
                      <form role="form" method="POST" action="disable_event.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Event ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="eventTypeID"  readonly="">
                            </div>
                          </div>

                          <div align="center">
                            <h4> Are you sure you want to deactive this event? </h4>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="disableEventBtn" class="btn btn-danger btn-sm">Confirm</button>
                            <button data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modals-->

                 <!-- Disable Package Modal-->
                <div class="modal fade" id="enableModal">
                  <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 250px">
                      <form role="form" method="POST" action="enable_event.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Event ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="eventTypeID" readonly="">
                            </div>
                          </div>

                          <div align="center">
                            <h4> Are you sure you want to activate this event? </h4>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="enableEventBtn" class="btn btn-success btn-sm">Confirm</button>
                            <button data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modals-->

                
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
          <!-- /.box -->

                  <!-- Delete Event Modal-->
                <form role="form" method="POST" action="DeleteEventPage" class="form-horizontal">
                <div class="modal fade" id="deleteEventModal">
                  <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 250px">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Event ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="deleteEventTypeID" id="deleteEventTypeID" readonly="">
                            </div>
                          </div>
                          {!! csrf_field() !!}
                          <div align="center">
                            <h4> Are you sure you want to delete this item? </h4>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="deleteEventBtn" class="btn btn-danger btn-sm">Delete</button>
                            <button data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                </form>
                <!-- End Modals-->

                <!-- Update Event Modal-->
               <div class="modal fade" id="editEventModal">
                 <div class="modal-dialog"><form id = "editEventForm" role="form" method="POST" action="EditEventPage" class="form-horizontal editEventValidator">
                          
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Update Event</h4>
                        </div>
                        
                        <div class="modal-body">
                          {!! csrf_field() !!}
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Event ID</label>
                            <div class="col-sm-6 input-group">
                              
                                <div class="input-group-addon">
                                  <i class="fa fa-list" aria-hidden="true"></i>
                                </div>
                                <input type="text" class="form-control" name="editEventTypeID" id="editEventTypeID" readonly="">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Event Name</label>
                            <div class="col-sm-6">
							<div class = "input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-bell-o" aria-hidden="true"></i>
                              </div>
                              <input type="text" class="form-control" name="editEventTypeName" id="editEventTypeName" required>
                            </div>
                            </div>
                          </div>

                          <input type="text" class="form-control" name="tempName" id="tempName" style="display: none;">

                          <div class="form-group">
                            <label class="col-sm-4 control-label"> Description</label>
                            <div class="col-sm-6">
                        <div class = "input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-quote-right" aria-hidden="true"></i></div>
                              <textarea type="text" required class="form-control" name="editEventTypeDesc" id="editEventTypeDesc"></textarea>
                            </div>
                          </div>
                          </div>

                  
					  
                        </div>
                        <div class="modal-footer">
                        <button type="submit" name="editEventBtn" class="btn btn-primary">Confirm</button>
                      </div>
					  
                  </div>
                  </form>                   
                 </div>
               </div>
              <!-- End Modals-->

        <!-- addevent Modal-->
        <div class="panel-body">
          <form id="addEventForm" role="form" method="POST" action="/EventPage" class="form-horizontal addEventValidator">
            <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">ADD EVENT</h4>
                    </div>

                    <div class="modal-body">

                    {!! csrf_field() !!}

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Event Name</label>
                        <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-bell-o" aria-hidden="true"></i></div>
                         <input type="text" class="form-control" id="addEventName" name="addEventName" placeholder="Event" data-error="This field is required">
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label"> Description</label>
                        <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-quote-right" aria-hidden="true"></i></div>
                         <input type="text" class="form-control" id="addEventDescription" name="addEventDescription" placeholder="Event Description" data-error="This field is required">
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="addEventBtn" class="btn btn-primary">Submit</button>
                    </div>

                  </div>
                </div>
              </div>
            </form>
          </div>
        <!-- End Modals-->


      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<script type="text/javascript" src="{{ asset('sweetalert/dist/sweetalert.min.js') }}"></script>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

    @if (Session::has('message'))
      <script>
        swal({   
          title: "{{ Session::get('title') }}",   
          text: "{{ Session::get('message') }}",   
          type: "{{ Session::get('type') }}",
          timer: 3000,
          showConfirmButton: false
        });
      </script>
    @endif

<!-- <script type="text/javascript">
  function eventAdd() {
      swal({   
        title: "Saved!",  
        type: "success",
        timer: 4000,
        showConfirmButton: false
      });
    }

  function eventDelete() {
      swal({   
        title: "Deleted!",  
        type: "success",
        timer: 4000,
        showConfirmButton: false
      });
    }

  function eventUpdate() {
      swal({   
        title: "Updated!",  
        type: "success",
        timer: 4000,
        showConfirmButton: false
      });
    }
</script> -->

<script>
  $(function () {
    $(document).on("hidden.bs.modal", "#addEventModal", function () {
      $("#addEventName").val("");
      $("#addEventDescription").val("");
    });
  });
  $(function () {
    $(document).on("hidden.bs.modal", "#editEventModal", function () {
      $("#editEventTypeName").val("");
      $("#editEventTypeDesc").val("");
    });
  });
</script>

 <script>
  $(function () {
    $('#eventTable').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
  });
</script>
    <script>
      function getEvent(id){
        $.ajax({
                type: "GET",
                url:  "/RetrieveEvent",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#editEventTypeID').val(data['ss'][0]['eventTypeID']);
                $('#deleteEventTypeID').val(data['ss'][0]['eventTypeID']);
                $('#editEventTypeName').val(data['ss'][0]['eventTypeName']);
                $('#editEventTypeDesc').val(data['ss'][0]['eventTypeDescription']);
                },
                error: function(xhr)
                {
                    alert("mali");
                    alert($.parseJSON(xhr.responseText)['error']['message']);
                }                
            });
      }

    </script>

    <script type="text/javascript">
    $('.editEventValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              editEventTypeName: {
                  validators: {
                        stringLength: {
                        min: 2,
                        max: 20,
                        message:'Event name should be at least 2 characters and not exceed 20 characters.'
                      },
                          regexp: {
                              regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                              message: 'This field should contain letters, hyphen & apostrophe only.'
                      },
                          notEmpty: {
                          message: 'This field is required.'
                      },
                  }

              },
               editEventTypeDesc: {
                    validators: {
                        stringLength: {
                        max: 150,
                        message:'Description should not exceed 150 characters.'
                    },
                  }
                }
              }
          });
      </script>

      <script type="text/javascript">
    $('.addEventValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              addEventName: {
                  validators: {
                        stringLength: {
                        min: 2,
                        max: 20,
                        message:'Event name should be at least 2 characters and not exceed 20 characters.'
                      },
                          regexp: {
                              regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                              message: 'This field should contain letters, hyphen & apostrophe only.'
                      },
                          notEmpty: {
                          message: 'This field is required.'
                      },
                  }

              },
               addEventDescription: {
                    validators: {
                        stringLength: {
                        max: 150,
                        message:'Description should not exceed 150 characters.'
                    },
                  }
                }
              }
          });
      </script>
@endsection