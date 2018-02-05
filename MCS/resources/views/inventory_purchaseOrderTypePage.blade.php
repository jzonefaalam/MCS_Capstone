@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <style>
  .btn-space{
    margin-right: 5px;
  }
  </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
        <ol class="breadcrumb">
          <li><a><i class="fa fa-wrench"></i> Inventory</a></li>
          <li><a href = "/InventoryEquipmentPage"><i class="fa fa-cube"></i>Equipment</a></li>
          <li><a href = "/InventoryPOPage"><i class="fa fa-cube"></i>Purchase Order</a></li>
          <li class="active"><a href = "/InventoryPOTypePage"><i class="fa fa-cube"></i>Purchase Order Category</a></li>
        </ol>
      </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-md-6">
              <h2>PURCHASE ORDER CATEGORIES</h2>
            </div>
            <div class="col-md-6">
              <a class="btn btn-app" data-target="#addPurchaseOrderTypeModal" data-toggle="modal" style="float:right">
                <i class="fa fa-plus"></i> NEW
              </a>
            </div>
          </div>
        </div>
        <div class="box-body with-border">
          <table id="purchaseOrderTypeTable" class="table table-bordered table-striped dataTable">
            <thead>
              <tr>
                <th>Name</th>
                <th width="100px"><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              @foreach($poTypeData as $poTypeData)
                <tr>
                  <td> {{ $poTypeData->poTypeName }} </td>
                  <td>
                    <center>
                      <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editPOTypeModal" 
                        onclick="getPOTypeData(this.name);" name="{{$poTypeData->poTypeId}}">
                        <i class="fa fa-wrench fa-fw"></i>
                      </a>
                      <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePOTypeModal" 
                        onclick="getPOTypeData(this.name);" name="{{$poTypeData->poTypeId}}">
                        <i class="fa fa-trash fa-fw"></i>
                      </a>  
                    </center>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- /.content -->

      <!-- Add Purchase Order Type Modal-->
        <div class="panel-body">
          <form role="form" method="POST" action="/InventoryPOTypePage" class="form-horizontal">
            <div class="modal fade" id="addPurchaseOrderTypeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">ADD PURCHASE ORDER CATEGORY</h4>
                  </div>
                  <div class="modal-body">
                    {!! csrf_field() !!}
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Category Name</label>
                      <div class="col-sm-6">
                      <div class="input-group">
                       <div class="input-group-addon">
                       <i class="fa fa-text-o" aria-hidden="true"></i></div>
                       <input type="text" class="form-control" name="addPOCategoryName" placeholder="Please Input Category Name..." data-error="This field is required">
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" name="addPOCategoryBtn" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      <!-- End Modals-->

      <!-- Edit PO Type Modal-->
        <div class="modal fade" id="editPOTypeModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <form role="form" method="POST" action="/EditPOType" class="form-horizontal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">EDIT PURCHASE ORDER CATEGORY</h4>
                  </div>
                  <div class="modal-body">
                    {!! csrf_field() !!}
                    <div class="form-group" style="display: none;">
                      <label class="col-sm-4 control-label">PO Type ID</label>
                      <div class="col-sm-5 input-group">
                        <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="editPOTypeId" id="editPOTypeId">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Category Name</label>
                      <div class="col-sm-6">
                      <div class="input-group">
                       <div class="input-group-addon">
                       <i class="fa fa-text-o" aria-hidden="true"></i></div>
                       <input type="text" class="form-control" name="editPOTypeName" id="editPOTypeName" placeholder="Please Input Category Name..." data-error="This field is required">
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" name="editPOCategoryBtn" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      <!-- End Modals-->

      <!-- Delete PO Type Modal-->
        <div class="modal fade" id="deletePOTypeModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <form role="form" method="POST" action="/DeletePOType" class="form-horizontal">
                  <!-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">EDIT PURCHASE ORDER CATEGORY</h4>
                  </div> -->
                  <div class="modal-body">
                    {!! csrf_field() !!}
                    <div class="form-group" style="display: none;">
                      <label class="col-sm-4 control-label">PO Type ID</label>
                      <div class="col-sm-5 input-group">
                        <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="deletePOTypeId" id="deletePOTypeId" readonly="">
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <label class="col-sm-4 control-label">Category Name</label>
                      <div class="col-sm-6">
                      <div class="input-group">
                       <div class="input-group-addon">
                       <i class="fa fa-text-o" aria-hidden="true"></i></div>
                       <input type="text" class="form-control" name="editPOCategoryName" id="editPOCategoryName" placeholder="Please Input Category Name..." data-error="This field is required">
                      </div>
                      </div>
                    </div> -->
                    <div>
                      <h5> Are you sure you want to delete this purchase order category? </h5>
                    </div>
                    <div style="text-align: center;">
                      <button type="submit" name="deletePOTypeBtn" class="btn btn-primary">Yes</button>
                      <button data-dismiss="modal" class="btn btn-primary">No</button>
                    </div>
                  </div>
                  <!-- <div class="modal-footer">
                      <button type="submit" name="editPOCategoryBtn" class="btn btn-primary">Submit</button>
                  </div> -->
                </div>
              </form>
            </div>
          </div>
        </div>
      <!-- End Modals-->

  </div>
  <!-- /.content-wrapper -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
<script>
  function getPOTypeData(id){
    $.ajax({
      type: "GET",
      url:  "/RetrievePOTypeData",
      data: 
      {
        getId: id
      },
      success: function(data){
        $('#editPOTypeId').val(data['poTypeData'][0]['poTypeId']);
        $('#editPOTypeName').val(data['poTypeData'][0]['poTypeName']);
        $('#deletePOTypeId').val(data['poTypeData'][0]['poTypeId']);

      },
      error: function(xhr)
      {
        alert("Error!");
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>
@endsection