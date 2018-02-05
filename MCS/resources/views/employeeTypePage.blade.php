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
          <li class="active"><a href = "#"><i class="fa fa-user"></i>Employee</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="box box-danger">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Employee</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" data-target="#addEmployeeTypeModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> ADD
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-stripped table-bordered dataTable" id="employeeTypeTable">
              <thead>
                <tr>
                  <th width='450'>Employee</th>
                  <th width='250'>Rate per Hour</th>
                  <th width='150'>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($employeeTypeData as $employeeTypeData)
                <tr>
                  <td> {{ $employeeTypeData -> employeeTypeName }} </td>
                  <td> {{ $employeeTypeData -> employeeRatePerHour }} </td>
                  <td>
  				          <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editEmployeeTypeModal" onclick="getEmployeeType(this.name);" name="{{$employeeTypeData->employeeTypeID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
          					<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEmployeeTypeModal" onclick="getEmployeeType(this.name);" name="{{$employeeTypeData->employeeTypeID}}"><i class="fa fa-trash fa-fw"></i> Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
          <!-- /.box -->

          <!-- Delete Employee Type Modal-->
                <form role="form" method="POST" action="DeleteEmployeeTypePage" class="form-horizontal">
                  <div class="modal fade" id="deleteEmployeeTypeModal">
                  <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 250px">
                        
                        <div class="modal-body">

                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Employee ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="deleteEmployeeTypeID" id="deleteEmployeeTypeID" readonly="">
                            </div>
                          </div>
                          {!! csrf_field() !!}
                          <div align="center">
                            <h4>Are you sure you want to delete this item?</h4>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="deleteEmployeeTypeBtn" class="btn btn-danger  btn-sm">Delete</button>
                            <button data-dismiss="modal" class="btn btn-default  btn-sm" >Cancel</button>
                            <!-- <script>
                              $('#enableModal').modal('hide');
                            </script> -->
                          </div>

                        </div>
                          
                    </div>
                  </div>
                </div>
                </form>
          <!-- End Modals-->
		  
        <!-- editEmployeeType Modal-->
        <form id="editEmployeeTypeForm" role="form" method="POST" action="EditEmployeeTypePage" class="form-horizontal editEmployeeTypeValidator">
          <div class="modal fade" id="editEmployeeTypeModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">UPDATE EMPLOYEE</h4>
                </div>

                {!! csrf_field() !!}
                <div class="modal-body">
                
                  <div class="form-group" style="display: none;">
                  <label class="col-sm-4 control-label">Employee ID</label>
                  <div class="col-sm-6">
                  <div class = "input-group">
                  <div class="input-group-addon">
                  <i class="fa fa-list" aria-hidden="true"></i></div>
                  <input type="text" class="form-control" name="editEmployeeTypeID" id="editEmployeeTypeID"  readonly="">
                  </div>
                  </div>
                  </div>
                  
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Employee Name</label>
                  <div class="col-sm-6">
                  <div class = "input-group">
                  <div class="input-group-addon">
                  <i class="fa fa-user" aria-hidden="true"></i></div>
                  <input type="text" class="form-control" name="editEmployeeTypeName" id="editEmployeeTypeName" placeholder="Employee Type" data-error="This field is required">
                  </div>
                  </div>
                  </div>

                  <div class="form-group ">
                  <label class="col-sm-4 control-label">Rate per Hour</label>
                  <div class="col-sm-6">
                  <div class = "input-group">
                  <div class="input-group-addon">
                  <i class="fa fa-rouble" aria-hidden="true"></i></div>
                  <input type="text" class="form-control" name="editEmployeeRatePerHour" id="editEmployeeRatePerHour" placeholder="Rate Per Hour">
                  </div>
                  </div>
                  </div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="modal-footer">
                  <button type="submit" name="editEmployeeTypeBtn" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <!-- End Modals-->
		  
        <!-- addEmployee Modal-->
        <div class="panel-body">
          <form id="addEmployeeTypeForm" role="form" method="POST" action="/EmployeeTypePage" class="form-horizontal addEmployeeTypeValidator" enctype="multipart/form-data">
            <div class="modal fade" id="addEmployeeTypeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">ADD EMPLOYEE</h4>
                  </div>
                  <div class="modal-body">
                    
                    {!! csrf_field() !!}
                  
                    <div class="form-group">
                      <label class="col-sm-4 control-label"> Employee Name </label>
                      <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-user" aria-hidden="true"></i></div>
                        <input type="text" class="form-control" id="addEmployeeType" name="addEmployeeType" placeholder="Employee Type" data-error="This field is required">
                      </div>
                      </div>
                    </div>  
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Rate per Hour</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-rouble" aria-hidden="true"></i></div>
                        <input type="text" class="form-control" id="addEmployeeRatePerHour" name="addEmployeeRatePerHour" placeholder="Rate per Hour" data-error="This field is required">
                      </div>
                      </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">  

                </div>
                  <div class="modal-footer">
                    <button type="submit" name="addEmployeeTypeBtn" class="btn btn-primary">Submit</button>
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
  function employeeAdd() {
      swal({   
        title: "Saved!",  
        type: "success",
        timer: 4000,
        showConfirmButton: false
      });
    }

  function employeeDelete() {
      swal({   
        title: "Deleted!",  
        type: "success",
        timer: 4000,
        showConfirmButton: false
      });
    }

  function employeeUpdate() {
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
    $(document).on("hidden.bs.modal", "#addEmployeeTypeModal", function () {
      $("#addEmployeeType").val("");
      $("#addEmployeeRatePerHour").val("");
      // document.getElementById('photoIcon').src = "img/imageIcon.png";
    });
  });
  $(function () {
    $(document).on("hidden.bs.modal", "#editEmployeeTypeModal", function () {
      $("#editEmployeeTypeName").val("");
      $("#editEmployeeRatePerHour").val("");
      // document.getElementById('editPhotoIcon').src = "img/imageIcon.png";
    });
  });
</script>

 <script>
  $(function () {
    $('#employeeTypeTable').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
  });
</script>

<script type="text/javascript">
    $('.editEmployeeTypeValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              editEmployeeTypeName: {
                  validators: {
                        stringLength: {
                        min: 2,
                        max: 50,
                          message:'Employee type name should be at least 2 characters and not exceed 20 characters.'
                      },
                          regexp: {
                              regexp: /^[a-zA-Z]+([-'.\s][a-zA-Z]+)*$/,
                              message: 'This field should contain letters, hyphen, period & apostrophe only.'
                      },
                          notEmpty: {
                          message: 'This field is required.'
                      },
                  }

              },
               editEmployeeRatePerHour: {
                    validators: {
                        stringLength: {
                        max: 8,
                        message:'Please supply a valid rate.'
                    },
                          regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    }
                }
              }
          });
      </script>

      <script type="text/javascript">
      $('.addEmployeeTypeValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              addEmployeeType: {
                  validators: {
                      stringLength: {
                      min: 2,
                      max: 50,
                        message:'Employee type name should be at least 2 characters and not exceed 20 characters.'
                      },
                      notEmpty: {
                        message: 'This field is required.'
                      },
                  }

              },
               addEmployeeRatePerHour: {
                    validators: {
                        stringLength: {
                        max: 8,
                        message:'Please supply a valid rate.'
                    },
                          regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    }
                }
              }
          });
      </script>

    <script>
      function getEmployeeType(id){
        $.ajax({
                type: "GET",
                url:  "/RetrieveEmployeeTypePage",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#editEmployeeTypeID').val(data['ss'][0]['employeeTypeID']);
                $('#deleteEmployeeTypeID').val(data['ss'][0]['employeeTypeID']);
                $('#editEmployeeTypeName').val(data['ss'][0]['employeeTypeName']);
                $('#editEmployeeRatePerHour').val(data['ss'][0]['employeeRatePerHour']);                
                },
                error: function(xhr)
                {
                    alert("mali");
                    alert($.parseJSON(xhr.responseText)['error']['message']);
                }                
            });
      }

    </script>
    @endsection