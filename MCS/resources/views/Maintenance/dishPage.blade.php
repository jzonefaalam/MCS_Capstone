@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <br>
        <ol class="breadcrumb">
          <li><a href="/DishPage"><i class="fa fa-wrench"></i> Maintenance</a></li>
          <li class="active"><a href = "#"><i class="fa fa-cutlery"></i>Dish</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">

        <!-- Update Dish Modal-->
        <form  id="asdasdsad" role="form" method="POST" action="EditDishPage" class="form-horizontal">
         <div class="modal fade" id="editDishModal">
           <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">UPDATE DISH</h4>
                  </div>
                      
                  
                  <div class="modal-body">
                  {!! csrf_field() !!}
                  <div class="form-group" style="display: none;">
                    <label class="col-sm-4 control-label">Dish ID</label>
                    <div class="col-sm-6">
                      <div class = "input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-list" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" id="editDishID" name="editDishID" readonly="">
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
                        <input type="text" class="form-control" name="editDishName" id="editDishName" required>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-sm-4 control-label"> Price</label>
                    <div class="col-sm-6">
                      <div class = " input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="editDishPrice" id="editDishPrice" required>
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
                        <textarea type="text" required class="form-control" name="editDishDesc" id="editDishDesc"></textarea>
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
                        <select class="form-control" name="editDishType" id="editDishType">
                          @foreach($addDishData as $dishTypeData)
                          <option value="{{ $dishTypeData->dishTypeID }}">{{ $dishTypeData->dishTypeName }} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
      
                  <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Image</label>
                    <div class="col-sm-6">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <input type="file" name="editDishImage" id="editDishImage">
                        </div>
                      </div>
                    </div>
                  </div>
      

                  <div class="modal-footer">
                    <button type="submit" name="editDishBtn" class="btn btn-primary">Save</button>
                  </div>
                  </div>
      
            </div>                   
           </div>
         </div>
         </form>
        <!-- End Modals-->

        <!-- Add Dish Modal-->
        <div class="panel-body">
          <form id="addDish" role="form" method="POST" action="/DishPage" class="form-horizontal" enctype="multipart/form-data">
                {!! csrf_field() !!}
            <div class="modal fade" id="addDishModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">ADD DISH</h4>
                    </div>
                    <div class="modal-body">

                      <input type="text" name="addDishID" id="addDishID" value = "{{ $dishNewID }}" hidden>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Dish Name</label>
                        <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-cutlery" aria-hidden="true"></i></div>
                         <input type="text" class="form-control" name="addDishName" id="addDishName" placeholder="Menu Name" data-error="This field is required">
                         </div>
                        </div>
                      </div>

                      <div class="form-group ">
                        <label class="col-sm-4 control-label"> Price</label>
                        <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-rouble" aria-hidden="true"></i></div>
                         <input type="text" class="form-control" name="addDishPrice" placeholder="Menu Price" id="addDishPrice">
                        </div>
                        </div>
                      </div>

                      <div class="form-group has-feedback">
                        <label class="col-sm-4 control-label"> Description</label>
                       <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-quote-right" aria-hidden="true"></i></div>
                         <textarea type="text" class="form-control" id="addDishDesc" name="addDishDesc" placeholder="Description"></textarea>
                        </div>
                        </div>
                      </div>

                      <div class="form-group has-feedback">
                        <label class="col-sm-4 control-label"> Type</label>
                        <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-navicon" aria-hidden="true"></i></div>
                         <select class="form-control tyty" name="addDishType" id="addDishType">
                          <option selected disabled> (Select Dish Type) </option>
                             @foreach($addDishData as $dishTypeData)
                              <option value="{{ $dishTypeData->dishTypeID }}">{{ $dishTypeData->dishTypeName }} </option>
                             @endforeach
                         </select>
                        </div>
                        </div>
                      </div>


                    <input type="hidden" id="token" value="{{ csrf_token() }}">
                    <div class="form-group has-feedback">
                        <label class="col-sm-4 control-label">Dish Image</label>
                       <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                          <input type="file" name="addDishImage" id="addDishImage">
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>

                    <div class="modal-footer">
                        <button type="submit" name="addDishBtn" id="addDishBtn" class="btn btn-primary" onclick="btnsave()">Save</button>
                    </div>
                </div>
              </div>
            </form>
          </div>
        <!-- End Modals-->



        <div class="box box-primary">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Dish List</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" data-target="#addDishModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> Add Dish
                </a>
              </div>
            </div>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-stripped table-bordered">
              <thead>
                <tr>
                  <th style="width:150px;">Image</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Cost</th>
                  <th>Type</th>
                  <th>Actions</th>
                  <th>Toggle</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dishData as $dishData)
                <tr>
                  <td><img src="{{ asset('images/' . $dishData->imageName) }}"  style="width:150px;height:100px;" /></td>
                  <td>{{ $dishData->dishName }}</td>
                  <td>{{ $dishData->dishDescription }}</td>
                  <td>{{ $dishData->dishCost }}</td>
                  <td>{{ $dishData->dishTypeName }}</td>
                  <td>
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editDishModal" onclick="editdishget(this.name);" name="{{$dishData->dishID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" href="#"><i class="fa fa-trash fa-fw"></i> Delete</a>
                  </td>
                  
                </tr>
                @endforeach
                <!-- Enable Package Modal-->
                <div class="modal fade" id="">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="enable_dish.php" class="form-horizontal">
                        
                        <div class="modal-body">

                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Dish ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="dishID" value="" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5>Are you sure you want to activate this menu?</h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="enableDishBtn" class="btn btn-default text-left" >Yes</button>
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

                <!-- Disable Package Modal-->
                <div class="modal fade" id="disableModa">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="disable_dish.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Dish ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="dishID" value="" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5> Are you sure you want to deactive this dish? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="disableDishBtn" class="btn btn-primary">Yes</button>
                            <button data-dismiss="modal" class="btn btn-primary">No</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modals-->
        
        <!--DELETE Modal-->
                <div class="modal fade" id="deleteModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="deleteItems.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Delete Service</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="dishID" value="" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5> Are you sure you want to delete this dish? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="deleteDishBtn" class="btn btn-default">Yes</button>
                            <button data-dismiss="modal" class="btn btn-default">No</button>
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



      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
      function editdishget(id){
        $.ajax({
                type: "GET",
                url:  "/RetrieveDish",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#editDishID').val(data['ss'][0]['dishID']);
                $('#editDishName').val(data['ss'][0]['dishName']);
                $('#editDishDesc').val(data['ss'][0]['dishDescription']);
                $('#editDishPrice').val(data['ss'][0]['dishCost']);
                  var opty = document.getElementById('editDishType').options;
                
                  for(var i =0; i<opty.length; i++){
                    if(opty[i].value==data['ss'][0]['dishTypeID']){
                    $('#editDishType').val(data['ss'][0]['dishTypeID']) ;
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