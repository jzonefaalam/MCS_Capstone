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
          <li class="active"><a href = "#"><i class="fa fa-map-pin"></i>Location</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="box box-danger">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Location</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" data-target="#addLocationModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> ADD LOCATION
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-stripped table-bordered dataTable" id="locationTable">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Address</th>
                  <th>Contact Person</th>
                  <th>Contact Number</th>
                  <th>Capacity</th>
                  <th style="width: 100px">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($locationData as $locationData)
                <tr>
                  <td><img src="{{ asset('img/' . $locationData->locationImage) }}"  style="width:150px;height:100px;" /></td>
                  <td> {{ $locationData->locationName }} </td>
                  <td> {{ $locationData->locationDescription }} </td>
                  <td width="130px"> {{ $locationData->locationAddress }} </td>
                  <td width="120px"> {{ $locationData->locationContactPerson }} </td>
                  <td width="100px"> {{ $locationData->locationContactNumber }} </td>
                  <td width="80px"> {{ $locationData->locationCapacity }} </td>
                  <td width="250px">
        						<a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editLocationModal" onclick="getLocation(this.name);" name="{{$locationData->locationID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
					          <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteLocationModal" onclick="getLocation(this.name);" name="{{$locationData->locationID}}"><i class="fa fa-trash fa-fw"></i> Delete</a>
                  
                </tr>
                @endforeach
                <!-- Disable Location -->
                <div class="modal fade" id="disableModal">
                  <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 250px">
                      <form role="form" method="POST" action="disable_location.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Location ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="locationID" readonly="">
                            </div>
                          </div>

                          <div align="center">
                            <h4> Are you sure you want to deactive this location? </h4>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="disableLocationBtn" class="btn btn-danger btn-sm">Confirm</button>
                            <button data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END -->

                <!-- Enable Location -->
                <div class="modal fade" id="enableModal">
                  <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 250px">
                      <form role="form" method="POST" action="enable_location.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Location ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="locationID" readonly="">
                            </div>
                          </div>

                          <div align="center">
                            <h4> Are you sure you want to activate this location? </h4>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="enableLocationBtn" class="btn btn-success btn-sm">Confirm</button>
                            <button data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END -->
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
          <!-- /.box -->
		  

                <!-- editlocation Modal-->
                <form id="editlocationForm" role="form" method="POST" action="DeleteLocationPage" class="form-horizontal " enctype="multipart/form-data">
                <div class="modal fade" id="deleteLocationModal">
                  <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 250px">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Location ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="deleteLocationID" id="deleteLocationID" readonly="">
                            </div>
                          </div>
                          {!! csrf_field() !!}
                          <div align="center">
                            <h4> Are you sure you want to delete this item? </h4>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="deleteLocationBtn" class="btn btn-danger btn-sm">Delete</button>
                            <button data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                </form>
                <!-- End Modals-->

                    <!-- editlocation Modal-->
                    <div class="modal fade" id="editLocationModal">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <form id="editLocationForm" role="form" method="POST" action="EditLocationPage" class="form-horizontal editLocationValidator" enctype="multipart/form-data">

                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">UPDATE LOCATION</h4>
                      </div>

                      <div class="modal-body">

                      {!! csrf_field() !!}

                      <div class="form-group">
                      <div class="col-sm-4" >
                      <img id="editPhotoIcon" align="middle" src="img/imageIcon.png" class="img-responsive" style="width:150px;margin-left:220px;border-radius:50%;height:150px; "/>
                      </div>
                      </div>

                      <div class="form-group" style="display:none;">
                      <label class="col-sm-4 control-label">Location ID</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationID" id="editLocationID" readonly="">
                      </div>
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="col-sm-4 control-label">Location Name</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-map-signs" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationName" id="editLocationName" placeholder="Location Name" data-error="This field is required">
                      </div>
                      </div>
                      </div><input type="text" class="form-control" name="tempName" id="tempName" style="display: none;">


                      <div class="form-group has-feedback">
                      <label class="col-sm-4 control-label"> Address</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-map-o" aria-hidden="true"></i></span>
                      <textarea type="text" class="form-control" name="editLocationAddress" id="editLocationAddress" placeholder="Location Address"></textarea>
                      </div>
                      </div>
                      </div>

                      <div class="form-group has-feedback">
                      <label class="col-sm-4 control-label"> Description</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                      <textarea type="text" class="form-control" name="editLocationDesc" id="editLocationDesc" placeholder="location Description"></textarea>
                      </div>
                      </div>
                      </div>

                      <div class="form-group ">
                      <label class="col-sm-4 control-label">Contact Person</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationContactPerson" id="editLocationContactPerson" placeholder="Location Price" >
                      </div>
                      </div>
                      </div>

                      <div class="form-group ">
                      <label class="col-sm-4 control-label">Contact Number</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationContactNumber" id="editLocationContactNumber" placeholder="Location Price">
                      </div>
                      </div>
                      </div>

                      <div class="form-group ">
                      <label class="col-sm-4 control-label"> Capacity</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationCapacity" id="editLocationCapacity" placeholder="Location Capacity">
                      </div>
                      </div>
                      </div>

                      <div class="form-group has-feedback">
                      <label class="col-sm-4 control-label">Location Image</label>
                      <div class="col-sm-6">
                      <div class="input-group">
                      <div class="input-group-addon">
                      <input type="file" name="editLocationImage" id="editLocationImage" class="form-control">
                      </div>
                      </div>
                      </div>
                      </div>

                      </div>
                      <div class="modal-footer">
                      <button type="submit" name="editLocationBtn" class="btn btn-primary">Submit</button>
                      </div>
                      </form>
                      </div>
                      </div>
                    </div>
                    <!-- End Modals-->

        <!-- addlocation Modal-->
                    <div class="modal fade" id="addLocationModal">
                      <div class="modal-dialog">
                        <div class="modal-content">
                        <form id="addLocationForm" role="form" method="POST" action="/LocationPage" class="form-horizontal" enctype="multipart/form-data">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">ADD LOCATION</h4>
                          </div>
                          <div class="modal-body">
                          {!! csrf_field() !!}

                          <div class="form-group">
                            <div class="col-sm-4" >
                              <img id="addPhotoIcon" align="middle" src="img/imageIcon.png" class="img-responsive" style="width:150px;margin-left:220px;border-radius:50%;height:150px; "/>
                            </div>
                          </div>

                            <div class="form-group">
                              <label class="col-sm-4 control-label">Location Name</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-map-signs" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationName" id="addLocationName" placeholder="Location Name"
                                data-error="This field is required">
                              </div>
                              </div>
                            </div>
                            <div class="form-group has-feedback">
                              <label class="col-sm-4 control-label"> Description</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-quote-right" aria-hidden="true"></i></div>
                                <textarea type="text" class="form-control" name="addLocationDescription" id="addLocationDescription" placeholder="Location Description"></textarea>
                              </div>
                            </div>
                            </div>
                            <div class="form-group has-feedback">
                              <label class="col-sm-4 control-label"> Address</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-map-o" aria-hidden="true"></i></div>
                                <textarea type="text" class="form-control" name="addLocationAddress" id="addLocationAddress" placeholder="Location Address"></textarea>
                              </div>
                            </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-sm-4 control-label">Contact Person</label>
                             <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-user" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationContactPerson" id="addLocationContactPerson" placeholder="Full Name">
                                </div>
                            </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-sm-4 control-label">Contact Number</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-phone" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationContactNumber" id="addLocationContactNumber" placeholder="Contact Number">
                              </div>
                            </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-sm-4 control-label"> Capacity</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-users" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationCapacity" id="addLocationCapacity" placeholder="Location Capacity">
                              </div>
                              </div>
                            </div>

                            <div class="form-group has-feedback">
                              <label class="col-sm-4 control-label">Location Image</label>
                             <div class="col-sm-6">
                              <div class="input-group">
                               <div class="input-group-addon">
                                <input type="file" name="addLocationImage" id="addLocationImage">
                              </div>
                              </div>
                            </div>


                          </div>
                          <div class="modal-footer">
                            <button type="submit" name="addLocationBtn" class="btn btn-primary">Submit</button>
                          </div>
                      </form>
                      </div>
                    </div>
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
  function locationAdd() {
      swal({   
        title: "Saved!",  
        type: "success",
        timer: 4000,
        showConfirmButton: false
      });
    }

  function locationDelete() {
      swal({   
        title: "Deleted!",  
        type: "success",
        timer: 4000,
        showConfirmButton: false
      });
    }

  function locationUpdate() {
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
    $(document).on("hidden.bs.modal", "#addLocationModal", function () {
      $("#addLocationImage").val("");
      $("#addLocationCapacity").val("");
      $("#addLocationDescription").val("");
      $("#addLocationAddress").val("");
      $("#addLocationName").val("");
      $("#addLocationContactNumber").val("");
      $("#addLocationContactPerson").val("");
      document.getElementById('addPhotoIcon').src = "img/imageIcon.png";
    });
  });
  $(function () {
    $(document).on("hidden.bs.modal", "#editLocationModal", function () {
      $("#editLocationName").val("");
      $("#editLocationCapacity").val("");
      $("#editLocationDesc").val("");
      $("#editLocationImage").val("");
      $("#editLocationPrice").val("");
      $("#editLocationContactPerson").val("");
      $("#editLocationContactNumber").val("");
      $("#editLocationAddress").val("");
    });
  });
</script>

<script>
  $(function () {
    $('#locationTable').DataTable({
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
$('#addLocationImage').change(function(){

var file = this.files[0];
var reader = new FileReader();
reader.onload = function(){
// alert("asdsd")

document.getElementById('addPhotoIcon').src = this.result;
};
reader.readAsDataURL(file);

var yourImg = document.getElementById('addPhotoIcon');
if(yourImg && yourImg.style) {
yourImg.style.height = '150px';
yourImg.style.width = '150px';
}
});

$('#editLocationImage').change(function(){

var file = this.files[0];
var reader = new FileReader();
reader.onload = function(){
// alert("asdsd")

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
      function getLocation(id){
        $.ajax({
                type: "GET",
                url:  "/RetrieveLocation",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#editLocationID').val(data['ss'][0]['locationID']);
                $('#deleteLocationID').val(data['ss'][0]['locationID']);
                $('#editLocationName').val(data['ss'][0]['locationName']);
                $('#editLocationDesc').val(data['ss'][0]['locationDescription']);
                $('#editLocationAddress').val(data['ss'][0]['locationAddress']);
                $('#editLocationCapacity').val(data['ss'][0]['locationCapacity']);
                $('#editLocationContactPerson').val(data['ss'][0]['locationContactPerson']);
                $('#editLocationContactNumber').val(data['ss'][0]['locationContactNumber']);
                document.getElementById("editPhotoIcon").src="img/" + (data['ss'][0]['locationImage']);
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
    $('.editLocationValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              editLocationName: {
                  validators: {
                        stringLength: {
                        min: 2,
                        max: 20,
                        message:'Location name should be at least 2 characters and not exceed 20 characters.'
                      },
                          regexp: {
                              regexp: /^[a-zA-Z0-9]+([-'\s][a-zA-Z0-9]+)*$/,
                                message: 'This field should contain letters, hyphen & apostrophe only.'
                      },
                          notEmpty: {
                          message: 'This field is required.'
                      },
                  }

              },
               editLocationAddress: {
                    validators: {
                        stringLength: {
                        max: 150,
                        message:'Location address should be at least 2 characters and not exceed 20 characters.'
                    },
                          regexp: {
                                regexp: /^[a-zA-Z0-9]+([-'.#\s][a-zA-Z0-9]+)*$/,
                                message: 'Invalid input.'
                        
                        },
                    }
                },
                editLocationDesc: {
                    validators: {
                        stringLength: {
                        max: 150,
                        message:'Description should not exceed 150 characters.'
                    },
                  }
                },

                editLocationContactPerson: {
                    validators: {
                        stringLength: {
                        max: 50,
                        message:'Contact name should be at least 2 characters and not exceed 20 characters.'
                    },
                          regexp: {
                                regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                                message: 'This field should contain letters only.'
                        
                        },
                    }
                },
                editLocationContactNumber: {
                    validators: {
                          regexp: {
                                regexp: /^[1-9(0)]+$/,
                                message: 'Invalid input.'
                        },
                    }
                },
                editLocationCapacity: {
                    validators: {
                        stringLength: {
                        max: 3,
                        message:'Capacity should not exceed to thousand.'
                    },
                          regexp: {
                                regexp: /^[1-9(0)]+$/,
                                message: 'Invalid input.'
                        },
                    }
                },
                editLocationPrice: {
                    validators: {
                        stringLength: {
                        max: 9,
                        message:'Price limit reached.'
                    },
                          regexp: {
                              regexp: /^\d+(?:\.\d{1,2})?$/,
                              message: 'Invalid Input.'
                        },
                    }
                },

              editLocationImage: {
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
    $('#addLocationForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              addLocationName: {
                  validators: {
                        stringLength: {
                        min: 2,
                        max: 20,
                        message:'Location name should be at least 2 characters and not exceed 20 characters.'
                      },
                          regexp: {
                              regexp: /^[a-zA-Z0-9]+([-'\s][a-zA-Z0-9]+)*$/,
                                message: 'This field should contain letters, hyphen & apostrophe only.'
                      },
                          notEmpty: {
                          message: 'This field is required.'
                      },
                  }

              },

               addLocationAddress: {
                    validators: {
                        stringLength: {
                        max: 150,
                        message:'Location address should be at least 2 characters and not exceed 20 characters.'
                    },
                          regexp: {
                                regexp: /^[a-zA-Z0-9]+([-'.#\s][a-zA-Z0-9]+)*$/,
                                message: 'Invalid input.'
                        
                        },
                    }
                },

                addLocationDescription: {
                    validators: {
                        stringLength: {
                        max: 150,
                        message:'Description should not exceed 150 characters.'
                    },
                  }
                },

                addLocationContactPerson: {
                    validators: {
                        stringLength: {
                        max: 50,
                        message:'Please supply a valid contact name.'
                    },
                          regexp: {
                                regexp: /^[a-zA-Z]+([-' \s][a-zA-Z]+)*$/,
                                message: 'This field should contain letters only.'
                        
                        },
                    }
                },

                addLocationContactNumber: {
                    validators: {
                          regexp: {
                                regexp: /^[1-9(0)]+$/,
                                message: 'Invalid input.'
                        },
                    }
                },

                addLocationCapacity: {
                    validators: {
                        stringLength: {
                        max: 3,
                        message:'Capacity should not exceed to thousand.'
                    },
                          regexp: {
                                regexp: /^[1-9(0)]+$/,
                                message: 'Invalid input.'
                        },
                    }
                },

              addLocationImage: {
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