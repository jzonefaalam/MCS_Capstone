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
                <h2>Events</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" data-target="#addDishTypeModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> Button
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

          </div>
          <!-- /.box-body -->
        </div>
          <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
@endsection