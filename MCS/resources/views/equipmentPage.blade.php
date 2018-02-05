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
          <li class="active"><a href = "#"><i class="fa fa-cube"></i>Equipment</a></li>
        </ol>
      </section>

    <section class="content">
          <div class="box box-danger">
            <div class="box-header with-border">
              <div class="row">
                <div class="col-md-6">
                  <h2>Equipment</h2>
                </div>
              </div>
            </div>
          <!-- /.box-header -->
          
                <!-- /Header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped dataTable" id="equipmentTable">
                    <thead>
                    <tr>
                      <th width="150px">Image</th>
                      <th width="180px">Name</th>
                      <th width="200px">Description</th>
                      <th width="80px">Type</th>
                      <th width="80px">Rate</th>
                      <th width="80px">Total Quantity</th>
                      <th width="150px">Actions</th>
                      <th width="150px">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($equipmentData as $equipmentData)
                      <tr>
                        <td><img src="{{ asset('img/' . $equipmentData->equipmentImage) }}"  style="width:150px;height:100px;" /></td>
                        <td>{{ $equipmentData->equipmentName }}</td>
                        <td>{{ $equipmentData->equipmentDescription }}</td>
                        <td>{{ $equipmentData->equipmentTypeName }}</td>
                        <td>{{ $equipmentData->equipmentRatePerHour }}</td>
                        <td>{{ $equipmentData->qtyIn + $equipmentData->qtyOut }}</td>
                       <td>
                        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editEquipmentModal" onclick="getEquipment(this.name);" name="{{$equipmentData->equipmentID}}"><i class="fa fa-wrench fa-fw"></i> Update
                        </a>
                       </td>
                       <td>
                        <?php if (( $equipmentData->equipmentStatus )==0): ?> 
                          <span class="label label-danger">Not Available</span>
                        <?php endif ?>
                        <?php if (( $equipmentData->equipmentStatus )==1): ?> 
                          <span class="label label-success">Available</span>
                        <?php endif ?>
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
                      <form role="form" method="POST" action="DeleteEquipmentPage" class="form-horizontal">
                      <div class="modal fade" id="deleteEquipmentModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                             <div class="modal-body">
                                <div class="form-group" style="display: none;">
                                  <label class="col-sm-4 control-label">Equipment ID</label>
                                  <div class="col-sm-5 input-group">
                                    <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="deleteEquipmentID" id="deleteEquipmentID" readonly="">
                                  </div>
                                </div>
                                {!! csrf_field() !!}
                                <div>
                                  <h5> Are you sure you want to delete this item? </h5>
                                </div>
                                <div style="text-align: center;">
                                  <button type="submit" name="deleteEquipmentBtn" class="btn btn-danger btn-sm">Confirm</button>
                                  <button data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      </form>
                      <!-- End Modals-->

                    <!-- Update Package Modal-->
                    <div class="modal fade" id="editEquipmentModal">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <form  id="editEquipmentForm" role="form" method="POST" action="EditEquipmentPage" class="form-horizontal editEquipmentValidator" enctype="multipart/form-data" >
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
                    <input type="text" class="form-control" name="editEquipmentID" id="editEquipmentID" readonly="">
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-4" >
                        <img id="editPhotoIcon" align="middle" src="img/imageIcon.png" class="img-responsive" style="width:150px;margin-left:220px;border-radius:50%;height:150px; "/>
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-4 control-label">Equipment Name</label>
                    <div class="col-sm-6">
                    <div class = "input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-cube" aria-hidden="true"></i>
                    </div>
                    <input type="text" class="form-control" name="editEquipmentName" id="editEquipmentName" required>
                    </div>

                    <input type="text" class="form-control" name="tempName" id="tempName" style="display: none;">
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-4 control-label"> Description</label>
                    <div class="col-sm-6">
                    <div class = "input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-quote-right" aria-hidden="true"></i>
                    </div>
                    <textarea type="text" required class="form-control" name="editEquipmentDescription" id="editEquipmentDescription"></textarea>
                    </div>
                    </div>
                    </div>


                    <div class="form-group">
                    <label class="col-sm-4 control-label">Rate</label>
                    <div class="col-sm-6">
                    <div class = "input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-hourglass-half" aria-hidden="true"></i>
                    </div>
                    <input type="text" class="form-control" name="editEquipmentRatePerHour" id="editEquipmentRatePerHour" required>
                    </div>
                    </div>
                    </div>

                    <div class="form-group" style="display: none;">
                    <label class="col-sm-4 control-label"> Type</label>
                    <div class="col-sm-6">
                    <div class = "input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-navicon" aria-hidden="true"></i>
                    </div>
                    <select class="form-control" name="editEquipmentType" id="editEquipmentType">
                    @foreach($addEquipmentData as $equipmentTypeData)
                    <option value="{{ $equipmentTypeData->equipmentTypeID }}">{{ $equipmentTypeData->equipmentTypeName }} </option>
                    @endforeach
                    </select>
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-4 control-label"> Type</label>
                    <div class="col-sm-6">
                    <div class = "input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-navicon" aria-hidden="true"></i>
                    </div>
                    <select disabled class="form-control" name="editEquipmentTypeFake" id="editEquipmentTypeFake">
                    @foreach($addEquipmentData as $equipmentTypeData)
                    <option value="{{ $equipmentTypeData->equipmentTypeID }}">{{ $equipmentTypeData->equipmentTypeName }} </option>
                    @endforeach
                    </select>
                    </div>
                    </div>
                    </div>

                    <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Equipment Image</label>
                    <div class="col-sm-6">
                    <div class="input-group">
                    <div class="input-group-addon">
                    <input type="file" name="editEquipmentImage" id="editEquipmentImage">
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>

                    <div class="modal-footer">
                    <button type="submit" name="editEquipmentBtn" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                    </div>
                    </div>                   
                    </div>
                    <!-- End Modals-->

                    <!-- addEquipment Modal-->
                    <form id="addEquipmentForm" role="form" method="POST" action="/EquipmentPage" class="form-horizontal addEquipmentValidator" enctype="multipart/form-data">
                    <div class="panel-body">
                     
                        <div class="modal fade" id="addEquipmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">ADD EQUIPMENT</h4>
                              </div>
                              
                              <div class="modal-body">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                  <label class="col-sm-4 control-label">Equipment Name</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-cube" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" class="form-control" name="addEquipmentName" placeholder="Equipment Name" required>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-sm-4 control-label"> Description</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                                      </div>
                                      <textarea type="text" class="form-control" name="addEquipmentDescription" placeholder="Equipment Description" required></textarea>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-sm-4 control-label">Rate</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-hourglass-half" aria-hidden="true"></i>
                                      </div>
                                    <input type="text" class="form-control" name="addEquipmentRatePerHour" placeholder="Rate Per Hour" required>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                <label class="col-sm-4 control-label"> Type</label>
                                <div class="col-sm-6">
                                <div class = "input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-navicon" aria-hidden="true"></i>
                                </div>
                                <select class="form-control" name="addEquipmentType" id="addEquipmentType">
                                @foreach($addEquipmentData as $equipmentTypeData)
                                <option value="{{ $equipmentTypeData->equipmentTypeID }}">{{ $equipmentTypeData->equipmentTypeName }} </option>
                                @endforeach
                                </select>
                                </div>
                                </div>
                                </div>

                                <div class="form-group has-feedback">
                                  <label class="col-sm-4 control-label">Equipment Image</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <input type="file" name="addEquipmentImage" id="addEquipmentImage">
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                

                                <div class="modal-footer">
                                  <button type="submit" name="addEquipmentBtn" class="btn btn-primary">Save</button>
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

<script>
  $('#editEquipmentImage').change(function(){
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

<script>
  $(function () {
    $(document).on("hidden.bs.modal", "#editEquipmentModal", function () {
      $("#editEquipmentName").val("");
      $("#editEquipmentImage").val("");
      $("#editEquipmentDescription").val("");
      $("#editEquipmentRatePerHour").val("");
      document.getElementById('editPhotoIcon').src = "img/imageIcon.png";
    });
  });
</script>

<script>
  $(function () {
    $('#equipmentTable').DataTable({
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
  function getEquipment(id){
    $.ajax({
            type: "GET",
            url:  "/RetrieveEquipment",
            data: 
            {
                sdid: id
            },
            success: function(data){
            $('#editEquipmentID').val(data['ss'][0]['equipmentID']);
            $('#deleteEquipmentID').val(data['ss'][0]['equipmentID']);
            $('#editEquipmentName').val(data['ss'][0]['equipmentName']);
            $('#editEquipmentDescription').val(data['ss'][0]['equipmentDescription']);
            $('#editEquipmentRatePerHour').val(data['ss'][0]['equipmentRatePerHour']);
            $('#editEquipmentUnit').val(data['ss'][0]['equipmentUnit']);
            document.getElementById("editPhotoIcon").src="img/" + (data['ss'][0]['equipmentImage']);
            var opty = document.getElementById('editEquipmentType').options; 
            var opty1 = document.getElementById('editEquipmentTypeFake').options;
              for(var i =0; i<opty.length; i++){
                if(opty[i].value==data['ss'][0]['equipmentTypeID']){
                $('#editEquipmentType').val(data['ss'][0]['equipmentTypeID']) ;
                break;
                }
              }
              for(var i =0; i<opty.length; i++){
                if(opty1[i].value==data['ss'][0]['equipmentTypeID']){
                $('#editEquipmentTypeFake').val(data['ss'][0]['equipmentTypeID']) ;
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

<script type="text/javascript">
  $('.editEquipmentValidator').bootstrapValidator({
    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
    
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
          editEquipmentName: {
              validators: {
                    stringLength: {
                    min: 2,
                    max: 20,
                    message:'Please supply a valid equipment name.'
                  },
                  //     regexp: {
                  //         regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                  //         message: 'This field should contain letters, hyphen & apostrophe only.'
                  // },
                      notEmpty: {
                      message: 'This field is required.'
                  },
              }

          },
           editEquipmentDescription: {
                validators: {
                    stringLength: {
                    max: 50,
                    message:'Description should not to exceed 50 characters.'
                },
                }
            },

            editEquipmentRatePerHour: {
                validators: {
                    stringLength: {
                    max: 7,
                    message:'Price limit reached.'
                },
                      regexp: {
                        regexp: /^\d+(?:\.\d{1,2})?$/,
                        message: 'Invalid Input.'
                },
                }
            },
            
            editEquipmentType: {
                validators: {
                      notEmpty: {
                      message: 'This field is required.'
                  },
                }
            },

            editEquipmentImage: {
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
    $('.addEquipmentValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              addEquipmentName: {
                  validators: {
                        stringLength: {
                        min: 2,
                        max: 20,
                        message:'Please supply a valid equipment name.'
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
               addEquipmentDescription: {
                    validators: {
                        stringLength: {
                        max: 20,
                        message:'Description should not to exceed 20 characters.'
                    },
                    }
                },

                addEquipmentRatePerHour: {
                    validators: {
                        stringLength: {
                        max: 7,
                        message:'Price limit reached.'
                    },
                          regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    }
                },
                
                addEquipmentImage: {
                    validators: {
                          notEmpty: {
                          message: 'This field is required.'
                      },
                    }
                },

                editEquipmentImage: {
                    validators: {
                          notEmpty: {
                          message: 'This field is required.'
                      },
                    }
                },
              }
          });
</script>
  @endsection