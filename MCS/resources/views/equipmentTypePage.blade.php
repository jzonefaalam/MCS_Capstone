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
          <li><a><i class="fa fa-wrench"></i> Maintenance</a></li>
          <li class="active"><a href = "/EquipmentTypePage"><i class="fa fa-cube"></i>Equipment Type</a></li>
        </ol>
      </section>

    <section class="content">
          <div class="box box-danger">
            <div class="box-header with-border">
              <div class="row">
                <div class="col-md-6">
                  <h2>Equipment Type</h2>
                </div>
                <div class="col-md-6">
                      <a class="btn btn-app" data-target="#addEquipmentModal" data-toggle="modal" style="float:right">
                        <i class="fa fa-save"></i> ADD
                      </a>
                    </div>
              </div>
            </div>
          <!-- /.box-header -->
          
                <!-- /Header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped dataTable" id="equipmentTypeTable">
                    <thead>
                    <tr>
                      <th width="180px">Name</th>
                      <th width="150px">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($equipmentTypeData as $equipmentTypeData)
                      <tr>
                        <td>{{ $equipmentTypeData->equipmentTypeName }}</td>
                       <td>
                        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editEquipmentTypeModal" onclick="getEquipmentType(this.name);" name="{{$equipmentTypeData->equipmentTypeID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEquipmentTypeModal" onclick="getEquipmentType(this.name);" name="{{$equipmentTypeData->equipmentTypeID}}"><i class="fa fa-trash fa-fw"></i> Delete</a>
                       </td>
                      </tr>
                      @endforeach
                      </tbody>
                  </table>
                </div>
                <!-- /Body -->
            <!-- /2nd Body -->


            <!-- /Box Body -->
            </div>


                      <!-- Delete Equipment Modal-->
                      <form role="form" method="POST" action="DeleteEquipmentTypePage" class="form-horizontal">
                      <div class="modal fade" id="deleteEquipmentTypeModal">
                        <div class="modal-dialog">
                          <div class="modal-content" style="margin-top: 250px">
                             <div class="modal-body">
                                <div class="form-group" style="display: none;">
                                  <label class="col-sm-4 control-label">Equipment ID</label>
                                  <div class="col-sm-5 input-group">
                                    <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="deleteEquipmentTypeID" id="deleteEquipmentTypeID" readonly="">
                                  </div>
                                </div>
                                {!! csrf_field() !!}
                                <div align="center">
                                  <h4> Are you sure you want to delete this item? </h4>
                                </div>
                                <div style="text-align: center;">
                                  <button type="submit" name="deleteEquipmentBtn" class="btn btn-danger btn-sm" onclick="equipTypeDelete()">Delete</button>
                                  <button data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      </form>
                      <!-- End Modals-->

                      <!-- Update Package Modal-->
                      <div class="modal fade" id="editEquipmentTypeModal">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <form  id="editEquipmentForm" role="form" method="POST" action="EditEquipmentTypePage" class="form-horizontal editEquipmentValidator" enctype="multipart/form-data" >
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">UPDATE EQUIPMENT</h4>
                      </div>

                      <div class="modal-body">
                      {!! csrf_field() !!}
                      <div class="form-group" style="display: none;">
                      <label class="col-sm-4 control-label">Equipment ID</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <div class="input-group-addon">
                      <i class="fa fa-list" aria-hidden="true"></i>
                      </div>
                      <input type="text" class="form-control" name="editEquipmentTypeID" id="editEquipmentTypeID" readonly="">
                      </div>
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="col-sm-4 control-label">Equipment Name</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <div class="input-group-addon">
                      <i class="fa fa-cube" aria-hidden="true"></i>
                      </div>
                      <input type="text" class="form-control" name="editEquipmentTypeName" id="editEquipmentTypeName" required>
                      </div>

                     
                      </div>
                      </div>
                      </div>

                      <div class="modal-footer">
                      <button type="submit" name="editEquipmentBtn" class="btn btn-primary" onclick="equipTypeUpdate()">Save</button>
                      </div>
                      </form>
                      </div>
                      </div>                   
                      </div>
                      <!-- End Modals-->

                    <!-- addEquipment Modal-->
                    <form id="addEquipmentForm" role="form" method="POST" action="/EquipmentTypePage" class="form-horizontal addEquipmentValidator" enctype="multipart/form-data">
                    <div class="panel-body">
                     
                        <div class="modal fade" id="addEquipmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">ADD EQUIPMENT TYPE</h4>
                              </div>
                              
                              <div class="modal-body">
                                  {!! csrf_field() !!}
                                  <div class="form-group">
                                    <label class="col-sm-4 control-label">Equipment Type Name</label>
                                    <div class="col-sm-6">
                                      <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-cube" aria-hidden="true"></i>
                                      </div>
                                      <input type="text" class="form-control" name="addEquipmentTypeName" id="addEquipmentTypeName" placeholder="Equipment Type Name" required>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="modal-footer">
                                  <button type="submit" name="addEquipmentBtn" class="btn btn-primary" >Save</button>
                                </div>
                                </div>                            
                                </div>
                          </div>
                        </div>
                    </div>
                    </form>
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
  function equipTypeAdd() {
      swal({   
        title: "Saved!",  
        type: "success",
        timer: 4000,
        showConfirmButton: false
      });
    }

  function equipTypeDelete() {
      swal({   
        title: "Deleted!",  
        type: "success",
        timer: 4000,
        showConfirmButton: false
      });
    }

  function equipTypeUpdate() {
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
    $(document).on("hidden.bs.modal", "#addEquipmentModal", function () {
      $("#addEquipmentTypeName").val("");
      // document.getElementById('photoIcon').src = "img/imageIcon.png";
    });
  });
  $(function () {
    $(document).on("hidden.bs.modal", "#editEquipmentTypeModal", function () {
      $("#editEquipmentTypeName").val("");
      // document.getElementById('editPhotoIcon').src = "img/imageIcon.png";
    });
  });
</script>

 <script>
  $(function () {
    $('#equipmentTypeTable').DataTable({
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
      function getEquipmentType(id){
        $.ajax({
                type: "GET",
                url:  "/RetrieveEquipmentType",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#editEquipmentTypeID').val(data['ss'][0]['equipmentTypeID']);
                $('#deleteEquipmentTypeID').val(data['ss'][0]['equipmentTypeID']);
                $('#editEquipmentTypeName').val(data['ss'][0]['equipmentTypeName']);
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
    $('.editEquipmentValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              editEquipmentTypeName: {
                  validators: {
                        stringLength: {
                        min: 2,
                        max: 20,
                        message:'Equipment type name should be at least 2 characters and not exceed 20 characters.'
                      },
                          regexp: {
                              regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                              message: 'This field should contain letters only.'
                      },
                          notEmpty: {
                          message: 'This field is required.'
                      },
                  }
                }
              }
          });
      </script>

      <script type="text/javascript">
    $('.addEquipmentValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              addEquipmentTypeName: {
                  validators: {
                        stringLength: {
                        min: 2,
                        max: 20,
                        message:'Equipment type name should be at least 2 characters and not exceed 20 characters.'
                      },
                          regexp: {
                              regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                              message: 'This field should contain letters only.'
                      },
                          notEmpty: {
                          message: 'This field is required.'
                      },
                  }

              },
               addEquipmentDescription: {
                    validators: {
                        stringLength: {
                        max: 20,
                        message:'Middle name should not exceed 20 characters.'
                    },
                          regexp: {
                                regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                                message: 'This field should contain letters only.'
                        
                        },
                    }
                },
                addEquipmentUnit: {
                    validators: {
                        stringLength: {
                        max: 20,
                        message:'Middle name should not exceed 20 characters.'
                    },
                          regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    }
                },
                addEquipmentRatePerHour: {
                    validators: {
                        stringLength: {
                        max: 20,
                        message:'Middle name should not exceed 20 characters.'
                    },
                          regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    }
                },
              }
          });
      </script>
  @endsection