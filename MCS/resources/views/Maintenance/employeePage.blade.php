@extends('layouts.admin')
@section('content')

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
        <div class="box box-primary">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Employees</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" data-target="#addEmployeeModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> Add Employee
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
                  <th>Employee Name</th>
                  <th>Employee Type</th>
                  <th>Actions</th>
                  <th>Toggle</th>
                </tr>
              </thead>
              <tbody>
                @foreach($employeeData as $employeeData)
                <tr>
                  <td><img src="{{ asset('images/' . $employeeData->employeeImage) }}"  style="width:150px;height:100px;" /></td>
                  <td>{{ $employeeData->employeeName }}</td>
                  <td width="150px">{{ $employeeData->employeeTypeName }}</td>
                  <td width="180px">
				            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editEmployeeModal" onclick="editEmployee(this.name);" name="{{$employeeData->employeeID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
					          <a class="btn btn-danger  btn-sm" data-toggle="modal"><i class="fa fa-trash fa-fw"></i> Delete</a>
                  </td>
                  <td width="100px">
                    <a class="btn btn-info btn-sm" data-toggle="modal"><i class="fa fa-cog fa-fw"></i> Enable</a>
                    <a class="btn btn-warning btn-sm" data-toggle="modal"><i class="fa fa-cog fa-fw"></i> Disable</a>
                 </td>
                </tr>
                @endforeach

                <!-- Enable Employee Modal-->
                <div class="modal fade" id="enableModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="enable_Employee.php" class="form-horizontal">
                        
                        <div class="modal-body">

                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Employee ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="employeeID" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5>Are you sure you want to activate the employee?</h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="enableEmployeeBtn" class="btn btn-primary btn-sm text-left" >Yes</button>
                            <button data-dismiss="modal" class="btn btn-primary btn-sm text-left" >No</button>
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
                <div class="modal fade" id="disableModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="disable_Employee.php" class="form-horizontal">
                        
                        <div class="modal-body">

                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Employee ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="employeeID" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5>Are you sure you want to deactivate the employee?</h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="disableEmployeeBtn" class="btn btn-default btn-sm text-left" >Confirm</button>
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
                  
                <!-- Delete Employee Modal-->
                <div class="modal fade" id="deleteEmployeeModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="deleteItems.php" class="form-horizontal">
                        
                        <div class="modal-body">

                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Employee ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="employeeID" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5>Are you sure you want to delete the employee?</h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="deleteEmployeeBtn" class="btn btn-primary btn-sm text-left" >Confirm</button>
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
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
          <!-- /.box -->

		  

                <!-- editemployee Modal-->
                <div class="panel-body">
                <form id="editEmployeeForm" role="form" method="POST" action="EditEmployeePage" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                        
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">UPDATE EMPLOYEE</h4>
                          </div>
						  
                          <div class="modal-body">

                            {!! csrf_field() !!}

						  <div class="form-group" style="display:none;">
                              <label class="col-sm-4 control-label">Employee ID</label>
                              <div class="col-sm-6">
							<div class = "input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-list" aria-hidden="true"></i></div>
                               <input type="text" class="form-control" name="editEmployeeID" id="editEmployeeID" readonly="">
                              </div>
                             </div>
                            </div>
							
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Employee Name</label>
                              <div class="col-sm-6">
							<div class = "input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-user" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="editEmployeeName" id="editEmployeeName" placeholder="Employee Name" data-error="This field is required">
                              </div>
                              </div>
                            </div>

                            <input type="text" class="form-control" name="tempName" id="tempName" style="display: none;">

                          <div class="form-group">
                            <label class="col-sm-4 control-label"> Type</label>
                            <div class="col-sm-6">
                              <div class = "input-group">
                              <div class="input-group-addon">
                              <i class="fa fa-navicon" aria-hidden="true"></i></div>
                              <select class="form-control" name="editEmployeeType" id="editEmployeeType">
                                @foreach($addEmployeeData as $employeeTypeData)
                                <option value="{{ $employeeTypeData->employeeTypeID }}">{{ $employeeTypeData->employeeTypeName }} </option>
                                @endforeach
                              </select>
                              </div>
                            </div>
                          </div>
							
							  <div class="form-group has-feedback">
								<label class="col-sm-4 control-label"> Image</label>
								<div class="col-sm-6">
								<div class="input-group">
								 <div class="input-group-addon">
								  <input type="file" name="editEmployeeImage">
								</div>
								</div>
							  </div>
							  </div>
                          <div class="modal-footer">
                            <button type="submit" name="editEmployeeBtn" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                      </form>
                      </div>
                <!-- End Modals-->
		  
        <!-- addEmployee Modal-->
        <div class="panel-body">
          <form id="addEmployeeForm" role="form" method="POST" action="/EmployeePage" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">ADD EMPLOYEE</h4>
                  </div>
                  <div class="modal-body">

                    {!! csrf_field() !!}

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Employee Name</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-user" aria-hidden="true"></i></div>
                        <input type="text" class="form-control" name="addEmployeeName" id="addEmployeeName" placeholder="Employee Name" data-error="This field is required">
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label"> Type</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-navicon" aria-hidden="true"></i></div>
                        <select class="form-control" name="addEmployeeType">
                          <option selected disabled> (Select Employee Type) </option>
                          @foreach($addEmployeeData as $employeeTypeData)
                            <option value="{{ $employeeTypeData->employeeTypeID }}">{{ $employeeTypeData->employeeTypeName }} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label"> Image</label>
                    <div class="col-sm-6">
                    <div class="input-group">
                     <div class="input-group-addon">
                      <input type="file" name="addEmployeeImage">
                    </div>
                    </div>
                  </div>
                  </div>
				  </div>
				  
                  <div class="modal-footer">
                    <button type="submit" name="addEmployeeBtn" class="btn btn-primary">Save</button>
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
      function editEmployee(id){
        $.ajax({
                type: "GET",
                url:  "/RetrieveEmployee",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#editEmployeeID').val(data['ss'][0]['employeeID']);
                $('#editEmployeeName').val(data['ss'][0]['employeeName']);
                  var opty = document.getElementById('editEmployeeType').options;
                
                  for(var i =0; i<opty.length; i++){
                    if(opty[i].value==data['ss'][0]['employeeTypeID']){
                    $('#editEmployeeType').val(data['ss'][0]['employeeTypeID']) ;
                    break;
                    }

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
@endsection