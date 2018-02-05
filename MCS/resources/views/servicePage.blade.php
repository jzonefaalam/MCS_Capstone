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
          <li class="active"><a href = "#"><i class="fa fa-cube"></i>Service</a></li>
        </ol>
      </section>

    <section class="content">
          <div class="box box-danger">
            <div class="box-header with-border">
              <div class="row">
                <div class="col-md-6">
                  <h2>Service</h2>
                </div>
                <div class="col-md-6">
                      <a class="btn btn-app" data-target="#addserviceModal" data-toggle="modal" style="float:right">
                        <i class="fa fa-save"></i> ADD
                      </a>
                    </div>
              </div>
            </div>
          <!-- /.box-header -->
          
                <!-- /Header -->
                <div class="box-body">
                  <table id="serviceTable" class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr>
                      <th width="150px">Image</th>
                      <th width="180px">Name</th>
                      <th width="200px">Description</th>
                      <th width="80px">Fee</th>
                      <th width="150px">Type</th>
                      <th width="200px">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($serviceData as $serviceData)
                      <tr>
                        <td><img src="{{ asset('img/' . $serviceData->serviceImage) }}"  style="width:150px;height:100px;" /></td>
                        <td>{{ $serviceData->serviceName }}</td>
                        <td>{{ $serviceData->serviceDescription }}</td>
                        <td>{{ $serviceData->serviceFee }}</td>
                        <td>{{ $serviceData->serviceTypeName }}</td>
                       <td>
                        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editServiceModal" onclick="getService(this.name);" name="{{$serviceData->serviceID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteServiceModal" onclick="getService(this.name);" name="{{$serviceData->serviceID}}"><i class="fa fa-trash fa-fw"></i> Delete</a>
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


                      <!-- Delete service Modal-->
                      <form role="form" method="POST" action="DeleteServicePage" class="form-horizontal">
                      <div class="modal fade" id="deleteServiceModal">
                        <div class="modal-dialog">
                          <div class="modal-content" style="margin-top: 250px">
                             <div class="modal-body">
                                <div class="form-group" style="display: none;">
                                  <label class="col-sm-4 control-label">Service ID</label>
                                  <div class="col-sm-5 input-group">
                                    <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="deleteServiceID" id="deleteServiceID" readonly="">
                                  </div>
                                </div>
                                {!! csrf_field() !!}
                                <div align="center">
                                  <h4> Are you sure you want to delete this item? </h4>
                                </div>
                                <div style="text-align: center;">
                                  <button type="submit" name="deleteserviceBtn" class="btn btn-danger btn-sm">Confirm</button>
                                  <button data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      </form>
                      <!-- End Modals-->

                    <!-- Update Package Modal-->
                    <div class="modal fade" id="editServiceModal">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <form  id="editserviceForm" role="form" method="POST" action="EditServicePage" class="form-horizontal editServiceValidator" enctype="multipart/form-data" >
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">UPDATE SERVICE</h4>
                    </div>

                    <div class="modal-body">
                    {!! csrf_field() !!}

                    <div class="form-group">
                    <div class="col-sm-4" >
                    <img id="editPhotoIcon" align="middle" src="img/imageIcon.png" class="img-responsive" style="width:150px;margin-left:220px;border-radius:50%;height:150px; "/>
                    </div>
                    </div>

                    <div class="form-group" style="display: none;">
                    <label class="col-sm-4 control-label">Service ID</label>
                    <div class="col-sm-6">
                    <div class = "input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    </div>
                    <input type="text" class="form-control" name="editServiceID" id="editServiceID" readonly="">
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-4 control-label">Service Name</label>
                    <div class="col-sm-6">
                    <div class = "input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-cube" aria-hidden="true"></i>
                    </div>
                    <input type="text" class="form-control" name="editServiceName" id="editServiceName" required>
                    </div>

                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-4 control-label"> Description</label>
                    <div class="col-sm-6">
                    <div class = "input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-quote-right" aria-hidden="true"></i>
                    </div>
                    <textarea type="text" required class="form-control" name="editServiceDescription" id="editServiceDescription"></textarea>
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-4 control-label"> Fee</label>
                    <div class="col-sm-6">
                    <div class = "input-group">
                    <span class="input-group-addon"><i class="fa fa-rouble" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="editServiceFee" id="editServiceFee" required>
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
                    <select class="form-control" name="editServiceType" id="editServiceType">
                    @foreach($addServiceData as $serviceTypeData)
                    <option value="{{ $serviceTypeData->serviceTypeID }}">{{ $serviceTypeData->serviceTypeName }} </option>
                    @endforeach
                    </select>
                    </div>
                    </div>
                    </div>

                    <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Service Image</label>
                    <div class="col-sm-6">
                    <div class="input-group">
                    <div class="input-group-addon">
                    <input type="file" name="editServiceImage" id="editServiceImage">
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>

                    <div class="modal-footer">
                    <button type="submit" name="editserviceBtn" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                    </div>
                    </div>                   
                    </div>
                    <!-- End Modals-->

                    <!-- addservice Modal-->
                    <form id="addServiceForm" role="form" method="POST" action="/ServicePage" class="form-horizontal addserviceValidator" enctype="multipart/form-data">
                    <div class="panel-body">
                     
                        <div class="modal fade" id="addserviceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">ADD SERVICE</h4>
                              </div>
                              
                              <div class="modal-body">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                <div class="col-sm-4" >
                                <img id="addPhotoIcon" align="middle" src="img/imageIcon.png" class="img-responsive" style="width:150px;margin-left:220px;border-radius:50%;height:150px; "/>
                                </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-sm-4 control-label">Service Name</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-cube" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" class="form-control" name="addServiceName" ID="addServiceName" placeholder="Service Name" required>
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
                                      <textarea type="text" class="form-control" name="addServiceDescription" ID="addServiceDescription" placeholder="Service Description" required></textarea>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                <label class="col-sm-4 control-label"> Fee</label>
                                <div class="col-sm-6">
                                <div class = "input-group">
                                <span class="input-group-addon"><i class="fa fa-rouble" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="addServiceFee" id="addServiceFee" placeholder="Service Fee" required>
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
                                <select class="form-control" name="addServiceType" id="addServiceType">
                                @foreach($addServiceData as $serviceTypeData)
                                <option value="{{ $serviceTypeData->serviceTypeID }}">{{ $serviceTypeData->serviceTypeName }} </option>
                                @endforeach
                                </select>
                                </div>
                                </div>
                                </div>

                                <div class="form-group has-feedback">
                                  <label class="col-sm-4 control-label">Service Image</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <input type="file" name="addServiceImage" id="addServiceImage">
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                

                                <div class="modal-footer">
                                  <button type="submit" name="addserviceBtn" class="btn btn-primary">Save</button>
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
  $(function () {
    $('#serviceTable').DataTable({
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
$('#addServiceImage').change(function(){

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

$('#editServiceImage').change(function(){

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
      function getService(id){
        $.ajax({
                type: "GET",
                url:  "/RetrieveService",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#editServiceID').val(data['ss'][0]['serviceID']);
                $('#deleteServiceID').val(data['ss'][0]['serviceID']);
                $('#editServiceName').val(data['ss'][0]['serviceName']);
                $('#editServiceFee').val(data['ss'][0]['serviceFee']);
                $('#editServiceDescription').val(data['ss'][0]['serviceDescription']);
                document.getElementById("editPhotoIcon").src="img/" + (data['ss'][0]['serviceImage']);
                var opty = document.getElementById('editServiceType').options;
                  for(var i =0; i<opty.length; i++){
                    if(opty[i].value==data['ss'][0]['serviceTypeID']){
                    $('#editServiceType').val(data['ss'][0]['serviceTypeID']) ;
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
    $('#addServiceForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              addServiceName: {
                  validators: {
                      stringLength: {
                        min: 3,
                        max: 20,
                        message:'Service name should be at least 3 characters long, and should not exceed 20 characters.'
                      },
                      regexp: {
                        regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                        message: 'This field should contain letters, hyphen & apostrophe only.'
                      },
                      notEmpty: {
                        message: 'This field is required.'
                      }
                  }
              },

              addServiceDescription: {
                validators: {
                      stringLength: {
                        max: 150,
                        message:'Description should not exceed 150 characters.'
                      },
                  }
              },

              addServiceFee: {
                validators: {
                      regexp: {
                              regexp: /^\d+(?:\.\d{1,2})?$/,
                              message: 'Invalid Input.'
                      },
                      stringLength: {
                          max: 8,
                          message:'Price limit reached'
                      },
                          notEmpty: {
                          message: 'This field is required.'
                      }
                 }
              },

              addServiceType: {
                validators: {
                          notEmpty: {
                          message: 'This field is required.'
                      }
                 }
              },

              addServiceImage: {
                validators: {
                          notEmpty: {
                          message: 'This field is required.'
                      }
                 }
              },

            }
        });
      </script>

    <script type="text/javascript">
    $('.editServiceValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              editServiceName: {
                  validators: {
                      stringLength: {
                        min: 2,
                        max: 20,
                        message:'Service name should be at least 3 characters long, and should not exceed 20 characters.'
                      },
                      regexp: {
                        regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                        message: 'This field should contain letters, hyphen & apostrophe only.' 
                      },
                      notEmpty: {
                        message: 'This field is required.'
                      }
                  }
              },

              editServiceDescription: {
                validators: {
                      stringLength: {
                        max: 150,
                        message:'Description should not exceed 150 characters.'
                      }
                  }
              },

              editServiceFee: {
                validators: {
                      regexp: {
                              regexp: /^\d+(?:\.\d{1,2})?$/,
                              message: 'Invalid Input.'
                      },
                      stringLength: {
                          max: 8,
                          message:'Price limit reached'
                      },
                          notEmpty: {
                          message: 'This field is required.'
                      }
                 }
              },

              editServiceType: {
                validators: {
                          notEmpty: {
                          message: 'This field is required.'
                      }
                 }
              },

              editServiceImage: {
                validators: {
                          notEmpty: {
                          message: 'This field is required.'
                      }
                 }
              },

            }
        });
      </script>

  @endsection