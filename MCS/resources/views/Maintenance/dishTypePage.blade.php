@extends('layouts.admin')

@section('content')

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
        <div class="box box-primary">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Dish Type</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" data-target="#addDishTypeModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> Add Dish Type
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-stripped table-bordered">
              <thead>
                <tr>
                  <th width="150px">Image</th>
                  <th width="200px">Name</th>
                  <th width="300px">Description</th>
                  <th width="120px">Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($dishTypeData as $dishTypeData)
                <tr>
                  <td><img src="{{ asset('images/' . $dishTypeData->dishTypeImage) }}"  style="width:150px;height:100px;" /></td>
                  <td>{{ $dishTypeData->dishTypeName }}</td>
                  <td>{{ $dishTypeData->dishTypeDescription }}</td>   	
                  <td>		 
                   <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editDishTypeModal" onclick="getDishType(this.name);" name="{{$dishTypeData->dishTypeID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
            			 <a class="btn btn-danger btn-sm" data-toggle="modal"><i class="fa fa-trash fa-fw"></i> Delete</a>
                 </td>
                </tr>
              @endforeach
              <!-- Disable Package Modal-->
                <div class="modal fade" id="deleteModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="deleteItems.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">dishType ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="dishTypeID" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5> Are you sure you want to delete this Dish Type? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="deleteDishTypeBtn" class="btn btn-default">Yes</button>
                            <button data-dismiss="modal" class="btn btn-default">No</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Disable Package Modal-->
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
          <!-- /.box -->


              <!-- Update Package Modal-->
        <form  id="asdasdsad" role="form" method="POST" action="/EditDishTypePage" class="form-horizontal">
         <div class="modal fade" id="editDishTypeModal">
           <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">UPDATE DISH</h4>
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
        
                  <input style="display: none;" type="text" class="form-control" name="tempName" id="tempName" >

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

                  <div class="form-group">
                    <label class="col-sm-4 control-label"> Description</label>
                    <div class="col-sm-6 ">
                      <div class = "input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                        </div>
                        <textarea type="text" required class="form-control" name="editDishTypeDescription" id="editDishTypeDescription"></textarea>
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
                    <button type="submit" name="editDishTypeBtn" class="btn btn-primary">Save</button>
                  </div>
                  </div>
      
            </div>                   
           </div>
         </div>
         </form>
        <!-- End Modals-->
              <!-- End Modals-->

        <!-- addDishModalType -->
          <form id="addDishTypeForm" role="form" method="POST" action="/DishTypePage" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal fade" id="addDishTypeModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">ADD DISH TYPE</h4>
                  </div>
                  <div class="modal-body">

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Dish Type</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-cutlery" aria-hidden="true"></i></div>
                       <input type="text" class="form-control" name="addDishTypeName" placeholder="Menu Type Name" required>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Description</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-quote-right" aria-hidden="true"></i></div>
                         <textarea class="form-control" name="addDishTypeDescription" rows="5"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Default Image</label>
                       <div class="col-sm-6">
                        <div class="input-group"> 
                         <div class="input-group-addon">
                          <input type="file" name="addDishTypeImage">
                        </div>
                        </div>
                      </div>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="addDishTypeBtn">Submit</button>
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
                $('#editDishTypeDescription').val(data['ss'][0]['dishTypeDescription']);
                },
                error: function(xhr)
                {
                    alert("mali");
                    alert($.parseJSON(xhr.responseText)['error']['message']);
                }                
            });
      }

    </script>
    <!-- /.content-wrapper -->
    @endsection