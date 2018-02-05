@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
          <li><a href="menu.php"><i class="fa fa-wrench"></i> Maintenance</a></li>
          <li class="active"><a href = "#"><i class="fa fa-car"></i>Service</a></li>
      </ol>
    </section>

<br>
    <section class="content">
          <div class="box box-primary">

            <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Service</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" data-target="#addServiceModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> ADD SERVICE
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="250px">Name</th>
                  <th width="400px">Description</th>
                  <th width="80px">Fee</th>
                  <th width="150px">Actions</th>
                  <th width="100px">Toggle</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($serviceData as $serviceData)
                  <tr>
                    <td>{{ $serviceData->serviceName }}</td>
                    <td>{{ $serviceData->serviceDescription }}</td>
                    <td>{{ $serviceData->serviceFee }}</td>
                    <td>
                      <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editServiceModal" onclick="getServiceData(this.name);" name="{{$serviceData->serviceID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
                      <a class="btn btn-danger btn-sm" data-toggle="modal"><i class="fa fa-trash fa-fw"></i> Delete</a>
                    </td>
                    <td width="100px">
                      <a class="btn btn-info btn-sm" data-toggle="modal"><i class="fa fa-cog fa-fw"></i> Enable</a>
                      <a class="btn btn-warning btn-sm" data-toggle="modal"><i class="fa fa-cog fa-fw"></i> Disable</a>
                    </td>
                  </tr>
                  @endforeach
                <!-- Enable Modal-->
                <div class="modal fade" id="enableModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="enable_service.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Activate Service</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="serviceID" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5> Are you sure you want to activate this service? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="enableServiceBtn" class="btn btn-default">Yes</button>
                            <button data-dismiss="modal" class="btn btn-default">No</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modals-->

                <!-- Disable Modal-->
                <div class="modal fade" id="disableModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="disable_service.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Deactivate Service</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="serviceID" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5> Are you sure you want to deactivate this service? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="disableServiceBtn" class="btn btn-default">Yes</button>
                            <button data-dismiss="modal" class="btn btn-default">No</button>
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
                              <input type="text" class="form-control" name="serviceID" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5> Are you sure you want to activate this package? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="deleteServiceBtn" class="btn btn-default">Yes</button>
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
            </div>

                <!-- Update Modal -->
                <form id = "editServiceForm" role="form" method="POST" action="EditServicePage" class="form-horizontal">
                <div class="modal fade" id="editServiceModal">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="myModalLabel">UPDATE SERVICE</h4>
                          </div>
                          
                          <div class="modal-body">
                          {!! csrf_field() !!}
                                  <div class="form-group" >
                                    <label class="col-sm-4 control-label">Service ID</label>
                                    <div class="col-sm-6">
									<div class = "input-group">
                                     <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                     <input type="text" class="form-control" name="editServiceID" id="editServiceID" required>
                                    </div>
									</div>
                                  </div>

                                  <div class="form-group">
                                    <label class="col-sm-4 control-label"> Name</label>
                                    <div class="col-sm-6">
									<div class = "input-group">
                                     <span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
                                     <input type="text" class="form-control" name="editServiceName" id="editServiceName" required>
                                    </div>
									</div>
                                  </div>

                                  <input type="text" class="form-control" name="tempName" id="tempName" style="display: none;">

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
                                    <label class="col-sm-4 control-label"> Description</label>
                                    <div class="col-sm-6">
									<div class = "input-group">
                                     <span class="input-group-addon"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                                     <textarea type="text" class="form-control" name="editServiceDesc" id="editServiceDesc" required></textarea>
                                    </div>
									</div>
                                  </div>

                                  
                          </div>
                          <div class="modal-footer">
                              <button type="submit" name="editServiceBtn" class="btn btn-default">Submit</button>
                          </div>
                        </div>
                  </div>
                </div>
                </form>
                        <!-- End Modals -->
						
                     <!-- addService Modal-->
                        <div class="panel-body">
                        <form id = "addServiceForm" role="form" method="POST" action="/ServicePage" class="form-horizontal">
                              <div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">ADD SERVICE</h4>
                                        </div>
                                        <div class="modal-body">
                                        {!! csrf_field() !!}
                                                <div class="form-group">
                                                  <label class="col-sm-4 control-label">Service Name</label>
                                                  <div class="col-sm-6">
												  <div class = "input-group">
                                                   <span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
                                                   <input type="text" class="form-control" name="addServiceName" placeholder="Service Name" required>
                                                  </div>
												  </div>
                                                </div>

                                                <div class="form-group">
                                                  <label class="col-sm-4 control-label">Fee</label>
                                                  <div class="col-sm-6">
												  <div class = "input-group">
                                                   <span class="input-group-addon"><i class="fa fa-rouble" aria-hidden="true"></i></span>
                                                   <input type="text" class="form-control" name="addServiceFee" placeholder="Service Fee" required>
                                                  </div>
												  </div>
                                                </div>

                                                <div class="form-group">
                                                  <label class="col-sm-4 control-label"> Description</label>
                                                  <div class="col-sm-6">
												  <div class = "input-group">
                                                   <span class="input-group-addon"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                                                   <textarea type="text" class="form-control" name="addServiceDescription" placeholder="Service Description" required></textarea>
                                                  </div>
												  </div>
                                                </div>

                                                

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="addServiceBtn" class="btn btn-primary">Submit</button>
                                        </div>
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
 <script>
      function getServiceData(id){
        $.ajax({
                type: "GET",
                url:  "/RetrieveService",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#editServiceID').val(data['ss'][0]['serviceID']);
                $('#editServiceFee').val(data['ss'][0]['serviceName']);
                $('#editServiceDesc').val(data['ss'][0]['serviceDescription']);
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