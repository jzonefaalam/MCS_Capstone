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
          <li><a href="/DishPage"><i class="fa fa-wrench"></i> Maintenance</a></li>
          <li class="active"><a href = "#"><i class="fa fa-cutlery"></i>Dish Type</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="box box-danger">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Dish Type</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" data-target="#addDishTypeModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> ADD
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-stripped table-bordered dataTable" id="dishTypeTable">
              <thead>
                <tr>
                  <th width="150px">Image</th>
                  <th width="200px">Name</th>
                  <th width="150px">Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($dishTypeData as $dishTypeData)
                <tr>
                  <td><img src="{{ asset('img/' . $dishTypeData->dishTypeImage) }}"  style="width:150px;height:100px;" /></td>
                  <td>{{ $dishTypeData->dishTypeName }}</td>
                  <td>		 
                   <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editDishTypeModal" onclick="getDishType(this.name);" name="{{$dishTypeData->dishTypeID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
            			 <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteDishTypeModal" onclick="getDishType(this.name);" name="{{$dishTypeData->dishTypeID}}"><i class="fa fa-trash fa-fw"></i> Delete</a>
                 </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
          <!-- /.box -->


        <!-- Disable Package Modal-->
        <form role="form" method="POST" action="/DeleteDishTypePage" class="form-horizontal">
        <div class="modal fade" id="deleteDishTypeModal">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 250px">
                <div class="modal-body">
                  <div class="form-group" style="display: none;">
                    <label class="col-sm-4 control-label">dishType ID</label>
                    <div class="col-sm-5 input-group">
                      <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="deleteDishTypeID" id="deleteDishTypeID" readonly="">
                    </div>
                  </div>
                  {!! csrf_field() !!}
                  <div align="center">
                    <h4> Are you sure you want to delete this item? </h4>
                  </div>

                  <div style="text-align: center;">
                    <button type="submit" name="deleteDishTypeBtn" class="btn btn-danger btn-sm" onclick="dishTypeDelete()">Delete</button>
                    <button data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
        </form>
        <!-- Disable Package Modal-->

        <!-- Update Dish Type Modal-->
        <form  id="asdasdsad" role="form" method="POST" action="/EditDishTypePage" class="form-horizontal editDishTypeValidator" enctype="multipart/form-data">
         <div class="modal fade" id="editDishTypeModal">
           <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">UPDATE DISH TYPE</h4>
                  </div>
                      
                  {!! csrf_field() !!}
                  
                  <div class="modal-body">
                  
                  <div class="form-group" style="display: none;">
                    <label class="col-sm-4 control-label">Dish ID</label>
                    <div class="col-sm-6">
                      <div class = "input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-list" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" id="editDishTypeID" name="editDishTypeID" readonly="">
                      </div>
                    </div>
                  </div>
                
                  <div class="form-group">
                    <div class="col-sm-4" >
                      <img id="editPhotoIcon" align="middle" src="img/imageIcon.png" class="img-responsive" style="width:150px;margin-left:220px;border-radius:50%;height:150px; "/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Dish Name</label>
                    <div class="col-sm-6">
                      <div class = "input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-cutlery" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="editDishTypeName" id="editDishTypeName" required>
                      </div>
                    </div>
                  </div>
      
                  <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Image</label>
                    <div class="col-sm-6">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <input type="file" name="editDishTypeImage" id="editDishTypeImage">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="submit" name="editDishTypeBtn" class="btn btn-primary" onclick="dishTypeUpdate()">Save</button>
                  </div>
                  </div>
      
            </div>                   
           </div>
         </div>
         </form>
        <!-- End Modals-->

        <!-- Add Dish Type Modal -->
          <form id="addDishTypeForm" role="form" method="POST" action="/DishTypePage" class="form-horizontal addDishTypeValidator" enctype="multipart/form-data">
            <div class="modal fade" id="addDishTypeModal" style="width:100%;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">NEW DISH TYPE</h4>
                  </div>
                  <div class="modal-body" id="addDishTypeModalBody">

                    <div class="form-group">
                      <div class="col-sm-4" >
                        <img id="photoIcon" align="middle" src="img/imageIcon.png" class="img-responsive" style="width:150px;margin-left:220px;border-radius:50%;height:150px; "/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Dish Type</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-cutlery" aria-hidden="true"></i></div>
                       <input type="text" class="form-control" name="addDishTypeName" id="addDishTypeName" placeholder="Dish Type Name">
                        </div>
                      </div>
                    </div>

                    <div class="form-group" style="display:none;">
                      <label class="col-sm-4 control-label"></label>
                      <div class="col-sm-6">
                          <h4>EXisting dish!</h4>
                      </div>
                    </div>
                  
                      <label class="col-sm-4 control-label">Default Image</label>
                       <div class="col-sm-6">
                        <div class="input-group"> 
                         <div class="input-group-addon">
                          <input type="file" name="addDishTypeImage" id="addDishTypeImage">
                        </div>
                        </div>
                      </div>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="modal-footer">
                      <input class="btn btn-primary" id="send" type="submit" value="Submit">
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
  function dishTypeAdd() {
      swal({   
        title: "Saved!",  
        type: "success",
        timer: 4000,
        showConfirmButton: false
      });
    }

  function dishTypeDelete() {
      swal({   
        title: "Deleted!",  
        type: "success",
        timer: 4000,
        showConfirmButton: false
      });
    }

  function dishTypeUpdate() {
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
    $(document).on("hidden.bs.modal", "#addDishTypeModal", function () {
      $("#addDishTypeName").val("");
      $("#addDishTypeImage").val("");
      document.getElementById('photoIcon').src = "img/imageIcon.png";
    });
  });
</script>

<script>
  $(function () {
    $('#dishTypeTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
  });
</script> 

<script>
  $("#addDishTypeModal").on("hidden.bs.modal", function(){
    });
    $('#addDishTypeImage').change(function(){
    var file = this.files[0];
    var reader = new FileReader();
    reader.onload = function(){
    // alert("asdsd")
    document.getElementById('photoIcon').src = this.result;
    };
    reader.readAsDataURL(file);
    var yourImg = document.getElementById('photoIcon');
    if(yourImg && yourImg.style) {
    yourImg.style.height = '150px';
    yourImg.style.width = '150px';
    }
  });

  $('#editDishTypeImage').change(function(){
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

<script type="text/javascript">
  $('#addDishTypeForm').bootstrapValidator({
      // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
      addDishTypeName: {
          validators: {
            stringLength: {
              min: 2,
              max: 20,
              message:'Dish type name should be at least 3 characters long, and should not exceed 20 characters.'
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
      addDishTypeImage: {
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
  $('.editDishTypeValidator').bootstrapValidator({
  // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
  
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        editDishTypeName: {
            validators: {
                  stringLength: {
                  min: 2,
                  max: 20,
                  message:'Dish type name should be at least 2 characters and not exceed 20 characters.'
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
         editDishTypeImage: {
              validators: {
                notEmpty: {
                  message: 'This field is required.'
                }
            }
          },
        }
    });
</script>
   
<script>
  function getDishType(id){
    $.ajax({
            type: "GET",
            url:  "/RetrieveDishType",
            data: 
            {
                sdid: id
            },
            success: function(data){
            $('#editDishTypeID').val(data['ss'][0]['dishTypeID']);
            $('#editDishTypeName').val(data['ss'][0]['dishTypeName']);
            $editDishTypePhoto = (data['ss'][0]['dishTypeImage']);
            $('#deleteDishTypeID').val(data['ss'][0]['dishTypeID']);
            document.getElementById("editPhotoIcon").src="img/" + (data['ss'][0]['dishTypeImage']);
            },
            error: function(xhr)
            {
                alert("mali");
                alert($.parseJSON(xhr.responseText)['error']['message']);
            }                
        });
  }
</script>

<!-- <script>
  $(document).ready(function() {
    $("#send").click(function(e) {
      e.preventDefault();
      var checkDishTypeName = $("#addDishTypeName").val();
      var checker = 0;
      $.ajax({
            type: "GET",
            url:  "/DishTypeValidator",
            success: function(data){
              for (var i = 0; i < data['ss'].length; i++) {
                var result = $.trim(data['ss'][i]['dishTypeName']);
                if(result==checkDishTypeName){
                  checker = 1;
                  break;
                }
                else{
                  checker = 0;
                }
              }
              if(checker > 0){
                alert('Existing Dish Type!');
              }
              else{
                document.getElementById("addDishTypeImage").disabled = false;
                if(document.getElementById("addDishTypeImage").value != "") {
                  document.getElementById("addDishTypeForm").submit();
                }
              }
            },
            error: function(xhr)
            {
                alert("mali");
                alert($.parseJSON(xhr.responseText)['error']['message']);
            }                
        });
    });
  });
</script> -->
    <!-- /.content-wrapper -->
@endsection