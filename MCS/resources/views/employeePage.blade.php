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
                <h2>Employees</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" data-target="#addEmployeeModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> ADD
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-stripped table-bordered dataTable" id="employeeTable">
              <thead>
             
                <tr>
                  <th width="150px">Image</th>
                  <th width="250px">Employee Name</th>
                  <th width="150px">Employee Type</th>
                  <th width="150px">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($employeeData as $employeeData)
                <tr>
                  <td><img src="{{ asset('images/' . $employeeData->employeeImage) }}"  style="width:150px;height:100px;" /></td>
                  <td>{{ $employeeData->employeeName }}</td>
                  <td >{{ $employeeData->employeeTypeName }}</td>
                  <td>
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editEmployeeModal" onclick="editEmployee(this.name);" name="{{$employeeData->employeeID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEmployeeModal" onclick="editEmployee(this.name);" name="{{$employeeData->employeeID}}"><i class="fa fa-trash fa-fw"></i> Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
          <!-- /.box -->

		            <!-- Delete Employee Modal-->
                 <form role="form" method="POST" action="DeleteEmployeePage" class="form-horizontal">
                 <div class="modal fade" id="deleteEmployeeModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Employee ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="deleteEmployeeID" id="deleteEmployeeID" readonly="">
                            </div>
                          </div>
                          {!! csrf_field() !!}
                          <div>
                            <h5>Are you sure you want to delete this item?</h5>
                          </div>
                          <div style="text-align: center;">
                            <button type="submit" name="deleteEmployeeBtn" class="btn btn-primary btn-sm text-left" >Confirm</button>
                            <button data-dismiss="modal" class="btn btn-primary btn-sm text-left" >Cancel</button>
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

                <!-- editemployee Modal-->
                <div class="panel-body">
                <form id="editEmployeeForm" role="form" method="POST" action="EditEmployeePage" class="form-horizontal editEmployeeValidator" enctype="multipart/form-data">
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
                            <div class="col-sm-4" >
                            <img id="editPhotoIcon" align="middle" src="images/imageIcon.png" class="img-responsive" style="width:150px;margin-left:220px;border-radius:50%;height:150px; "/>
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
            								  <input type="file" name="editEmployeeImage" id="editEmployeeImage">
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
                    <form id="addEmployeeForm" role="form" method="POST" action="/EmployeePage" class="form-horizontal addEmployeeValidator" enctype="multipart/form-data">
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
                      <div class="col-sm-4" >
                      <img id="photoIcon" align="middle" src="images/imageIcon.png" class="img-responsive" style="width:150px;margin-left:220px;border-radius:50%;height:150px; "/>
                      </div>
                      </div>

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
                      <input type="file" name="addEmployeeImage" id="addEmployeeImage">
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

    <script type="text/javascript" src="{{ asset('sweetalert/dist/sweetalert.min.js') }}"></script>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

     <script>
  $(function () {
    $('#employeeTable').DataTable({
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
      $('#addEmployeeImage').change(function(){

      var file = this.files[0];
      var reader = new FileReader();
      reader.onload = function(){

      document.getElementById('photoIcon').src = this.result;
      };
      reader.readAsDataURL(file);

      var yourImg = document.getElementById('photoIcon');
      if(yourImg && yourImg.style) {
      yourImg.style.height = '150px';
      yourImg.style.width = '150px';
      }
      });

      $('#editEmployeeImage').change(function(){

      var file = this.files[0];
      var reader = new FileReader();
      reader.onload = function(){

      document.getElementById('editPhotoIcon').src = this.result;
      };
      reader.readAsDataURL(file);

      var yourImg = document.getElementById('editPhotoIcon');
      if(yourImg && yourImg.style) {
      yourImg.style.height = '150px';
      yourImg.style.width = '150px';
      }
      });

    </script>

    <script type="text/javascript">
    $('.editEmployeeValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              editEmployeeName: {
                  validators: {
                        stringLength: {
                        min: 2,
                        max: 20,
                        message:'Employee name should be at least 2 characters and not exceed 20 characters.'
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

              editEmployeeType: {
                  validators: {
                          notEmpty: {
                          message: 'This field is required.'
                      },
                  }
              },

              editEmployeeImage: {
                  validators: {
                          notEmpty: {
                          message: 'This field is required.'
                      },
                  }
              },

            }
          });
      </script>
    
    <script type="text/javascript">
    $('#addEmployeeForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              addEmployeeName: {
                  validators: {
                        stringLength: {
                        min: 2,
                        max: 20,
                          message:'Employee name should be at least 2 characters and not exceed 20 characters.'
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

              addEmployeeType: {
                  validators: {
                          notEmpty: {
                          message: 'This field is required.'
                      },
                  }
              },

              addEmployeeImage: {
                  validators: {
                          notEmpty: {
                          message: 'This field is required.'
                      },
                  }
              },
            }
          });
      </script>

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
                $('#deleteEmployeeID').val(data['ss'][0]['employeeID']);
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