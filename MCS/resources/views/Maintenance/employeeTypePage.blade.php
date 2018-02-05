@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <br>
        <ol class="breadcrumb">
          <li><a href="menu.php"><i class="fa fa-wrench"></i> Maintenance</a></li>
          <li class="active"><a href = "#"><i class="fa fa-user"></i>Employee Type</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="box box-primary">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Employee Type</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" data-target="#addEmployeeTypeModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> Add Employee Type
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-stripped table-bordered">
              <thead>
                <tr>
                  <th width='450'>Employee Type</th>
                  <th width='150'>Rate per Hour</th>
                  <th width='100'>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($employeeTypeData as $employeeTypeData)
                <tr>
                  <td> {{ $employeeTypeData -> employeeTypeName }} </td>
                  <td> {{ $employeeTypeData -> employeeRatePerHour }} </td>
                  <td>
  				          <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editEmployeeTypeModal" onclick="getEmployeeType(this.name);" name="{{$employeeTypeData->employeeTypeID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
          					<a class="btn btn-danger btn-sm" data-toggle="modal"><i class="fa fa-trash fa-fw"></i> Delete</a>
                  </td>
                </tr>
                @endforeach
                  
                <!-- Delete Employee Type Modal-->
                <div class="modal fade" id="deleteEmployeeModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="delete_employee_type.php" class="form-horizontal">
                        
                        <div class="modal-body">

                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Employee Type ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="employeeTypeID" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5>Are you sure you want to delete this employee type?</h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="deleteEmployeeTypeBtn" class="btn btn-default text-left" >Yes</button>
                            <button data-dismiss="modal" class="btn btn-default text-left" >No</button>
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
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
          <!-- /.box -->

		  
        <!-- editEmployeeType Modal-->
        <form id="editEmployeeTypeForm" role="form" method="POST" action="EditEmployeeTypePage" class="form-horizontal">
          <div class="modal fade" id="editEmployeeTypeModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">UPDATE EMPLOYEE TYPE</h4>
                </div>

                {!! csrf_field() !!}
                <div class="modal-body">
                
                  <div class="form-group" style="display: none;">
                  <label class="col-sm-4 control-label">Employee Type ID</label>
                  <div class="col-sm-6">
                  <div class = "input-group">
                  <div class="input-group-addon">
                  <i class="fa fa-list" aria-hidden="true"></i></div>
                  <input type="text" class="form-control" name="editEmployeeTypeID" id="editEmployeeTypeID"  readonly="">
                  </div>
                  </div>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Type Name</label>
                  <div class="col-sm-6">
                  <div class = "input-group">
                  <div class="input-group-addon">
                  <i class="fa fa-user" aria-hidden="true"></i></div>
                  <input type="text" class="form-control" name="editEmployeeTypeName" id="editEmployeeTypeName" placeholder="Employee Type" data-error="This field is required">
                  </div>
                  </div>
                  </div>

                  <input style="display: none;" type="text" class="form-control" name="tempName" id="tempName" >
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
          <form id="addEmployeeTypeForm" role="form" method="POST" action="/EmployeeTypePage" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal fade" id="addEmployeeTypeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">ADD EMPLOYEE TYPE</h4>
                  </div>
                  <div class="modal-body">
                    
                    {!! csrf_field() !!}
                  
                    <div class="form-group">
                      <label class="col-sm-4 control-label"> Type Name </label>
                      <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-user" aria-hidden="true"></i></div>
                        <input type="text" class="form-control" name="addEmployeeType" placeholder="Employee Type" data-error="This field is required">
                      </div>
                      </div>
                    </div>  
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Rate per Hour</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-rouble" aria-hidden="true"></i></div>
                        <input type="text" class="form-control" name="addEmployeeRatePerHour" placeholder="Rate per Hour" data-error="This field is required">
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