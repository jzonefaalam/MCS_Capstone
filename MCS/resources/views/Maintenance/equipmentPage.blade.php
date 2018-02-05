@extends('layouts.admin')

@section('content')
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
          <div class="box">
            <div class="box-header with-border">
              <div class="row">
                <div class="col-md-6">
                  <h2>Equipment</h2>
                </div>
                <div class="col-md-6">
                      <a class="btn btn-app" data-target="#addEquipmentModal" data-toggle="modal" style="float:right">
                        <i class="fa fa-save"></i> Add Equipment
                      </a>
                    </div>
              </div>
            </div>
          <!-- /.box-header -->
          
                <!-- /Header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Rate Per Hour</th>
                      <th>Unit</th>
                      <th>Actions</th>
                      <th>Toggle</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($equipmentData as $equipmentData)
                      <tr>
                        <td><img src="{{ asset('images/' . $equipmentData->equipmentImage) }}"  style="width:150px;height:100px;" /></td>
                        <td>{{ $equipmentData->equipmentName }}</td>
                        <td>{{ $equipmentData->equipmentDescription }}</td>
                        <td>{{ $equipmentData->equipmentRatePerHour }}</td>
                        <td>{{ $equipmentData->equipmentUnit }}</td>
                             <td width="160px">
          						  <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editEquipmentModal" onclick="getEquipment(this.name);" name="{{$equipmentData->equipmentID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
					              <a class="btn btn-danger btn-sm" data-toggle="modal"><i class="fa fa-trash fa-fw"></i> Delete</a>
                       </td>
                       <td width="100px">
                         <a class="btn btn-info btn-sm" data-toggle="modal"><i class="fa fa-cog fa-fw"></i> Enable</a>
                         <a class="btn btn-warning btn-sm" data-toggle="modal"><i class="fa fa-cog fa-fw"></i> Disable</a>
                       </td>
                      </tr>
                      @endforeach
                      <!-- Enable Equipment Modal-->
                      <div class="modal fade" id="enableModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form role="form" method="POST" action="enable_equipment.php" class="form-horizontal">
                              <div class="modal-body">
                                <div class="form-group" style="display: none;">
                                  <label class="col-sm-4 control-label">Equipment ID</label>
                                  <div class="col-sm-5 input-group">
                                    <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="equipmentID"  readonly="">
                                  </div>
                                </div>

                                <div>
                                  <h5> Are you sure you want to activate this equipment? </h5>
                                </div>

                                <div style="text-align: center;">
                                  <button type="submit" name="enableEquipmentBtn" class="btn btn-primary btn-sm">Confirm</button>
                                  <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Modals-->

                      <!-- Disable Equipment Modal-->
                      <div class="modal fade" id="disableModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form role="form" method="POST" action="disable_equipment.php" class="form-horizontal">
                              <div class="modal-body">
                                <div class="form-group" style="display: none;">
                                  <label class="col-sm-4 control-label">Equipment ID</label>
                                  <div class="col-sm-5 input-group">
                                    <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="equipmentID" readonly="">
                                  </div>
                                </div>

                                <div>
                                  <h5> Are you sure you want to deactive this equipment? </h5>
                                </div>

                                <div style="text-align: center;">
                                  <button type="submit" name="disableEquipmentBtn" class="btn btn-primary btn-sm">Confirm</button>
                                  <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Modals-->
                      
                      <!-- Delete Equipment Modal-->
                      <div class="modal fade" id="deleteModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form role="form" method="POST" action="deleteItems.php" class="form-horizontal">
                              
							  <div class="modal-body">
							  
                                <div class="form-group" style="display: none;">
                                  <label class="col-sm-4 control-label">Equipment ID</label>
                                  <div class="col-sm-5 input-group">
                                    <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="equipmentID" readonly="">
                                  </div>
                                </div>

                                <div>
                                  <h5> Are you sure you want to delete this equipment? </h5>
                                </div>

                                <div style="text-align: center;">
                                  <button type="submit" name="deleteEquipmentBtn" class="btn btn-primary btn-sm">Confirm</button>
                                  <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
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
                <!-- /Body -->
            <!-- /2nd Body -->


            <!-- /Box Body -->
            </div>

                      <!-- Update Package Modal-->
                      <div class="modal fade" id="editEquipmentModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form  id="editEquipmentForm" role="form" method="POST" action="EditEquipmentPage" class="form-horizontal" enctype="multipart/form-data" >
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
                              <label class="col-sm-4 control-label">Rate per Hour</label>
                              <div class="col-sm-6">
							  <div class = "input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-hourglass-half" aria-hidden="true"></i>
                                </div>
                                <input type="text" class="form-control" name="editEquipmentRatePerHour" id="editEquipmentRatePerHour" required>
                              </div>
							  </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-4 control-label">Unit</label>
                              <div class="col-sm-6">
							  <div class = "input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-flask" aria-hidden="true"></i>
                                </div>
                                <input type="text" class="form-control" name="editEquipmentUnit" id="editEquipmentUnit" required>
                              </div>
							  </div>
                            </div>

                            <div class="form-group has-feedback">
                                  <label class="col-sm-4 control-label">Equipment Image</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <input type="file" name="editEquipmentImage">
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
                    <form id="addEquipmentForm" role="form" method="POST" action="/EquipmentPage" class="form-horizontal" enctype="multipart/form-data">
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
                                  <label class="col-sm-4 control-label">Rate per Hour</label>
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
                                  <label class="col-sm-4 control-label">Unit</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-flask" aria-hidden="true"></i>
                                      </div>
                                      <input type="text" class="form-control" name="addEquipmentUnit" placeholder="Unit" required>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group has-feedback">
                                  <label class="col-sm-4 control-label">Equipment Image</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <input type="file" name="addEquipmentImage">
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
                $('#editEquipmentName').val(data['ss'][0]['equipmentName']);
                $('#editEquipmentDescription').val(data['ss'][0]['equipmentDescription']);
                $('#editEquipmentRatePerHour').val(data['ss'][0]['equipmentRatePerHour']);
                $('#editEquipmentUnit').val(data['ss'][0]['equipmentUnit']);
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