@extends('layouts.admin')

@section('content')
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
        <div class="box box-primary">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Locations</h2>
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
            <table class="table table-stripped table-bordered">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Location Name</th>
                  <th>Location Description</th>
                  <th>Location Address</th>
                  <th>Contact Person</th>
                  <th>Contact Number</th>
                  <th>Location Capacity</th>
                  <th>Location Fee</th>
                  <th>Actions</th><th>Toggle</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($locationData as $locationData)
                <tr>
                  <td><img src="{{ asset('images/' . $locationData->locationImage) }}"  style="width:150px;height:100px;" /></td>
                  <td> {{ $locationData->locationName }} </td>
                  <td> {{ $locationData->locationDescription }} </td>
                  <td width="130px"> {{ $locationData->locationAddress }} </td>
                  <td width="120px"> {{ $locationData->locationContactPerson }} </td>
                  <td width="100px"> {{ $locationData->locationContactNumber }} </td>
                  <td width="80px"> {{ $locationData->locationCapacity }} </td>
                  <td width="80px"> {{ $locationData->locationFee }} </td>
                  <td width="200px">
        						<a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editLocationModal" onclick="getLocation(this.name);" name="{{$locationData->locationID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
					          <a class="btn btn-danger btn-sm" data-toggle="modal"><i class="fa fa-trash fa-fw"></i> Delete</a>
                  </td>
                  <td width="100px">
                    <a class="btn btn-info btn-sm" data-toggle="modal"><i class="fa fa-cog fa-fw"></i> Enable</a>
                    <a class="btn btn-warning btn-sm" data-toggle="modal"><i class="fa fa-cog fa-fw"></i> Disable</a>
                 </td>
                </tr>
                @endforeach
                <!-- Disable Location -->
                <div class="modal fade" id="disableModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="disable_location.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Location ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="locationID" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5> Are you sure you want to deactive this location? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="disableLocationBtn" class="btn btn-default">Yes</button>
                            <button data-dismiss="modal" class="btn btn-default">No</button>
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
                    <div class="modal-content">
                      <form role="form" method="POST" action="enable_location.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Location ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="locationID" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5> Are you sure you want to activate this location? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="enableLocationBtn" class="btn btn-default">Yes</button>
                            <button data-dismiss="modal" class="btn btn-default">No</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END -->

                <!-- editlocation Modal-->
                <div class="modal fade" id="deleteLocationModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form id="editlocationForm" role="form" method="POST" action="deleteItems.php" class="form-horizontal" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Location ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="deleteLocationID" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5> Are you sure you want to delete this location? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="deleteLocationBtn" class="btn btn-primary btn-sm">Confirm</button>
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
          <!-- /.box-body -->
        </div>
          <!-- /.box -->
		  
                    <!-- editlocation Modal-->
                    <div class="modal fade" id="editLocationModal">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <form id="editLocationForm" role="form" method="POST" action="EditLocationPage" class="form-horizontal" enctype="multipart/form-data">

                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">UPDATE LOCATION</h4>
                      </div>

                      <div class="modal-body">

                      {!! csrf_field() !!}

                      <div class="form-group" style="display:none;">
                      <label class="col-sm-4 control-label">Location ID</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationID" id="editLocationID" readonly="">
                      </div>
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="col-sm-4 control-label">Location Name</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-map-signs" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationName" id="editLocationName" placeholder="Location Name" data-error="This field is required">
                      </div>
                      </div>
                      </div><input type="text" class="form-control" name="tempName" id="tempName" style="display: none;">


                      <div class="form-group has-feedback">
                      <label class="col-sm-4 control-label"> Address</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-map-o" aria-hidden="true"></i></span>
                      <textarea type="text" class="form-control" name="editLocationAddress" id="editLocationAddress" placeholder="Location Address"></textarea>
                      </div>
                      </div>
                      </div>

                      <div class="form-group has-feedback">
                      <label class="col-sm-4 control-label"> Description</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                      <textarea type="text" class="form-control" name="editLocationDesc" id="editLocationDesc" placeholder="location Description"></textarea>
                      </div>
                      </div>
                      </div>

                      <div class="form-group ">
                      <label class="col-sm-4 control-label">Contact Person</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationContactPerson" id="editLocationContactPerson" placeholder="Location Price" >
                      </div>
                      </div>
                      </div>

                      <div class="form-group ">
                      <label class="col-sm-4 control-label">Contact Number</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationContactNumber" id="editLocationContactNumber" placeholder="Location Price">
                      </div>
                      </div>
                      </div>

                      <div class="form-group ">
                      <label class="col-sm-4 control-label"> Capacity</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationCapacity" id="editLocationCapacity" placeholder="Location Capacity">
                      </div>
                      </div>
                      </div>

                      <div class="form-group ">
                      <label class="col-sm-4 control-label"> Fee</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-rouble" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editLocationPrice" id="editLocationPrice" placeholder="location Price">
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
                              <label class="col-sm-4 control-label">Location Name</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-map-signs" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationName" placeholder="Location Name"
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
                                <textarea type="text" class="form-control" name="addLocationDescription" placeholder="Location Description"></textarea>
                              </div>
                            </div>
                            </div>
                            <div class="form-group has-feedback">
                              <label class="col-sm-4 control-label"> Address</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-map-o" aria-hidden="true"></i></div>
                                <textarea type="text" class="form-control" name="addLocationAddress" placeholder="Location Address"></textarea>
                              </div>
                            </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-sm-4 control-label">Contact Person</label>
                             <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-user" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationContactPerson" placeholder="Full Name">
                                </div>
                            </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-sm-4 control-label">Contact Number</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-phone" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationContactNumber" placeholder="Contact Number">
                              </div>
                            </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-sm-4 control-label"> Capacity</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-users" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationCapacity" placeholder="Location Capacity">
                              </div>
                              </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-sm-4 control-label"> Fee</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-rouble" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationFee" placeholder="Location Fee">
                              </div>
                            </div>
                            </div>

                            <div class="form-group has-feedback">
                              <label class="col-sm-4 control-label">Location Image</label>
                             <div class="col-sm-6">
                              <div class="input-group">
                               <div class="input-group-addon">
                                <input type="file" name="addLocationImage">
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
                $('#editLocationName').val(data['ss'][0]['locationName']);
                $('#editLocationDesc').val(data['ss'][0]['locationDescription']);
                $('#editLocationPrice').val(data['ss'][0]['locationFee']);
                $('#editLocationAddress').val(data['ss'][0]['locationAddress']);
                $('#editLocationCapacity').val(data['ss'][0]['locationCapacity']);
                $('#editLocationContactPerson').val(data['ss'][0]['locationContactPerson']);
                $('#editLocationContactNumber').val(data['ss'][0]['locationContactNumber']);
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