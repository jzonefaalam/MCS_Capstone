@extends('layouts.userReserveUI')
@section('contents')
@section('scripts')

	    <!-- SweetAlert -->
	    <link href="{{ asset('sweetalert/dist/sweetalert.css') }}" rel="stylesheet"/>

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-7">

		            <!--      Wizard container        -->
		            <div class="wizard-container" style="padding-top: 50px">
		                <div class="card wizard-card" data-color="red" id="wizard">
		                    <form class = "infoForm" name = "addReservation" id = "addReservation" role = "form" method="POST" action="/UserReservationPage" enctype="multipart/form-data" >
		                <!--        You can switch " data-color="azure" "  with one of the next bright colors: "blue", "green", "orange", "red"           -->
 						{{ csrf_field() }}
		                    	<div class="wizard-header">
		                    		<a class="btn btn-danger" style="float: left; margin-top: 5px; margin-right: -100px" onclick="goHome()"><i class="ti-home"></i></a>
		                        	<h3 class="wizard-title">Reservation</h3>
		                        	<p class="category">Book a reservation now!</p>
		                    	</div>

								<div class="wizard-navigation">
									<div class="progress-with-circle">
									     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 21%;"></div>
									</div>
									<ul>
			                            <li>
											<a href="#resDetails" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-calendar"></i>
												</div>
												Event Details
											</a>
										</li>
			                            <li>
											<a href="#cusInfo" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-user"></i>
												</div>
												Customer Information
											</a>
										</li>
			                            <li>
											<a href="#package" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-package"></i>
												</div>
												Package Selection
											</a>
										</li>
			                            <li>
											<a href="#addOn" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-plus"></i>
												</div>
												Additional
											</a>
										</li>
			                            <li>
											<a href="#payment" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-wallet"></i>
												</div>
												Payment
											</a>
										</li>
			                        </ul>
								</div>
		                        <div class="tab-content">
		                            <div class="tab-pane" id="resDetails">
		                            	<div class="row"> <br> <br>
			                                <div class="col-sm-5 col-sm-offset-1">
			                                	<input type="text" name="addEventID" id="addEventID" value = "{{ $eventNewID }}" hidden>
			                                    <div class="form-group">
			                                        <label>Event Type</label>
			                                        <select name="eType" id = "eType" class="form-control" >
														<option disabled="" selected=""></option>
														    @foreach($eType as $type)
														<option value="{{$type->eventTypeID}}" id="{{$type->eventTypeName}}">{{$type->eventTypeName}}</option>
														    @endforeach
		                                            </select>
			                                    </div>
			                                </div>
			                                <div class="col-sm-5">
			                                    <div class="form-group">
			                                        <label>Name of Event</label>
			                                        <input type="text" name="eName" id = "eName" maxlength="50" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="col-sm-5 col-sm-offset-1">
			                                    <div class="form-group">
			                                        <label>Do you have a Venue?</label>
			                                        <div class="form-control">&nbsp&nbsp&nbsp&nbsp
		                                            	<input type="radio" name="yesNo" id = "yes" value="Yes" onchange="locYes(this)">Yes
		                                            	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		                                            	<input type="radio" name="yesNo" id = "no" value="No" onchange="locYes(this)">No
		                                            </div>
		                                            <label for="yesNo" class="error" style="display:none;">Choose and answer.</label>
			                                    </div>
			                                </div>
			                                <div class="col-sm-5">
			                                    <div class="form-group">
			                                        <label>Date of Event</label>
			                                        <input type="date" name="eDate" id = "eDate"  min="{{date('Y-m-d',  strtotime( '+7 day' ))}}" max="{{date('Y-m-d',  strtotime( '+2 month' ))}}" class="form-control" onchange="dateday(this.id)">
			                                    </div>
			                                </div>
			                                <div class="col-sm-5 col-sm-offset-1" id="locYes">
			                                    <div class="form-group">
			                                        <label>Venue</label>
			                                        <input type="text" name="eLoc" id = "eLoc" class="form-control" disabled="">
			                                    </div>
			                                </div>
			                                <div class="col-sm-5 col-sm-offset-1" id="locNo" style="display:none">
			                                    <div class="form-group">
			                                        <label>Venue</label>
		                                            <select name="eLoc2" id = "eLoc2" class="form-control">
														<option disabled="Choose Venue" selected=""></option>
														@foreach($location as $loc)
														<option value="{{$loc->locationID}}">{{$loc->locationName}}</option>
														@endforeach
		                                            </select>
			                                    </div>
			                                </div>
			                                <div class="col-sm-5">
			                                    <div class="form-group">
			                                        <label>Number of Guests</label>
			                                        <input type="number" name="eNum" id = "eNum" min="100" max="400" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="col-sm-5 col-sm-offset-1">
			                                    <div class="form-group">
			                                        <label>Starting Time of Event</label>
			                                        <input type="time" name="eTime" id = "eTime" min="06:59:00"  class="form-control" onchange="timeChange(this.id)">
			                                    </div>
			                                </div>
			                                <div class="col-sm-5">
			                                    <div class="form-group">
			                                        <label>End Time of Event</label>
			                                        <input type="time" name="enTime" id = "enTime" min="11:59:00" class="form-control" onchange="timeChange(this.id)">
			                                    </div>
			                                </div>
		                            	</div>
		                        	</div>

		                            <div class="tab-pane" id="cusInfo">
		                                <div class="row"> <br> <br>
											<input type="text" name="addCustomerID" id="addCustomerID" value = "{{ $customerNewID }}" hidden>
											<input type="text" name="addReservationID" id="addReservationID" value = "{{ $reservationNewID }}" hidden>
											<input type="text" name="addContactID" id="addContactID" value = "{{ $contactNewID }}" hidden>
											<input type="text" name="addDishAvailedID" id="addDishAvailedID" value = "{{ $dishAvailedNewID }}" hidden>
											<input type="text" name="tc" id="tc"  hidden>
											<input type="text" name="cStat" id="cStat" value="1" hidden>
											<input type="text" name="tm3" id="tm3"  hidden>
											<input type="text" name="tm1" id="tm1" value="9:00" hidden>
											<input type="text" name="tm2" id="tm2" value="9:00"  hidden>
											<input type="text" name="pID" id="pID" hidden="">
											<input type="text" name="pChecker" id="pChecker" hidden="">
											<div class="col-sm-12">
			                                    <div class="form-group">
			                                        <h5 class="info-text"><input type="checkbox" name="prevCus" id = "prevCus" onchange="prevC(this)" >Previous Customer</h5>
			                                    </div>
			                                </div>
											<div class="col-sm-5 col-sm-offset-1" id="cusNo">
			                                    <div class="form-group">
			                                        <label>Full Name</label>
			                                        <input type="text" name="cusName" id = "cusName" class="form-control" placeholder="e.g. Juan de la Cruz">
			                                    </div>
			                                </div>
											<div class="col-sm-5 col-sm-offset-1" id="cusYes" style="display:none;">
			                                    <div class="form-group">
			                                        <label>Full Name</label>
			                                        <select name="prevCusName" id = "prevCusName" class="form-control" onchange="prevChange(this.name)">
			                                        <option disabled="Choose Customer" selected=""></option>
														@foreach($customer as $cus)
														<option value="{{$cus->customerID}}">{{$cus->fullName}}</option>
														@endforeach
		                                            </select>
			                                    </div>
			                                </div>
											<div class="col-sm-5">
											 	<div class="form-group">
			                                        <label>Date of Birth</label>
			                                        <input type="date" name="dob" id = "dob" min="{{date('Y-m-d',  strtotime( '-100 year' ))}}" max="{{date('Y-m-d',  strtotime( '-12 year' ))}}" class="form-control">
			                                    </div>
			                                </div>											
			                                <div class="col-sm-10 col-sm-offset-1">
			                                   	<div class="form-group">
			                                        <label>Home Address</label>
			                                        <input type="text" name="homeAdd" id = "homeAdd" class="form-control">
			                                    </div>
			                                </div>
											<div class="col-sm-5 col-sm-offset-1">
			                                    <div class="form-group">
			                                        <label>Contact Number</label>
			                                        <input type="text" name="cellNum" id = "cellNum" pattern="09[0-9]{2}-[0-9]{3}-[0-9]{4}" placeholder="e.g. 0900-000-0000" class="form-control">
			                                    </div>
			                                </div>
											<div class="col-sm-5">
			                                    <div class="form-group">
			                                        <label>Email Address</label>
			                                        <input type="email" name="emailAdd" id = "emailAdd" class="form-control" placeholder="e.g. margarethcateringservices@gmail.com">
			                                    </div>
			                                </div>		                                	
			                                <div class="col-sm-12">
		                                    	<h5 class="info-text"> In case of emergency please specify another contact</h5>
		                                    </div>
											<div class="col-sm-5 col-sm-offset-1">
			                                    <div class="form-group">
			                                        <label>Contact Name</label>
			                                        <input type="text" name="conPerson" id = "conPerson" class="form-control" placeholder="e.g Juana de la Cruz">
			                                    </div>
			                                </div>
											<div class="col-sm-5">
			                                    <div class="form-group">
			                                        <label>Contact Number</label>
			                                        <input type="text" name="conNum" id = "conNum" pattern="09[0-9]{2}-[0-9]{3}-[0-9]{4}||[0-9]{3}-[0-9]{4}" placeholder="e.g. 0900-000-0000/000-0000" class="form-control">
			                                    </div>
			                                </div>
		                                </div>
		                            </div>

		                            <div class="tab-pane" id="package">
		                                <div class="row" align="center">                       
		                                	<div class="col-sm-12">
		                                        <h5 class="info-text"> <i> Choose your package </i> </h5>
		                                    </div>
		                                	<input type="text" id="pprice" hidden>
		                                	<input type="text" id="dprice" hidden>
		                                	<input type="text" id="sprice" hidden>
		                                	<input type="text" id="eprice" hidden>
		                                	<input type="text" id="emprice" hidden>
		                                    @foreach($package as $pg)
		                                	<input type="text" id="pckid" hidden>
		                                    <input type="button" style = "width: 550px" class="btn btn-danger btn-sm"  data-toggle="modal" href="#packageModal{{$pg->packageID}}" id = "pck{{$pg->packageID}}" name='{{$pg->packageID}}' onclick="getpckid(this.name)" value="{{$pg->packageName}}">
		                                    <br> <br>
		                                    <input type="text" id="pgid" value='{{$pg->packageID}}' hidden>
											<input type="text" id="pgimage" value='{{$pg->packageImage}}' hidden>
										    <input type="text" id="countDish" value="{{$countDish}}" hidden>
		                                    @endforeach
		                                </div>
		                            </div>
		                            
		                            <div class="tab-pane" id="addOn">
		                                <div class="row" align="center">                       
		                                	<div class="col-sm-12">
		                                        <h5 class="info-text"> <i> Additional Food / Service / Equipment </i> </h5>
		                                    </div>

		                                	<input type="text" id="dtid" hidden>
		                                	<input type="text" id="ptids" hidden>
		                                	<input type="text" id="pmids" hidden>
		                                    <input type="button" style = "width: 180px; height: 180px" class="btn btn-danger btn-lg"  data-toggle="modal" href="#additionalModal" value="Food" onclick="getFck(this)"> &nbsp &nbsp

		                                	<input type="text" id="dtid" hidden>
		                                    <input type="button" style = "width: 180px; height: 180px" class="btn btn-danger btn-lg" data-toggle="modal" href="#serviceModal" value="Service" onclick="getFck(this)"> &nbsp &nbsp
		                                    </a>

		                                	<input type="text" id="dtid" hidden>
		                                    <input type="button" style = "width: 180px; height: 180px" class="btn btn-danger btn-lg"  data-toggle="modal" href="#equipmentModal" value="Equipment" onclick="getFck(this)">
		                                    </a>
		                                </div>
		                            </div>
		                            
		                            <div class="tab-pane" id="payment">
		                                <div class="row" align="center">
		                					<!-- <div class="card wizard-card" data-color="orange"> -->
			                                    <div class="row">
				                                    <div class="col-sm-6" >
					                                    <h5 class="info-text"> <i> Payment Term</i> </h5>
				                                    	@foreach($paymentTerm as $pt)
				                                        <div class="col-sm-9 col-sm-offset-2" id="ppt{{$pt->paymentTermID}}">
															<div class="choice" data-toggle="wizard-checkbox"  style="margin-top: -10px" >
				                                                <input type="checkbox" name="{{$pt->paymentTermID}}" id="pt{{$pt->paymentTermID}}" onchange="getpt(this.name)">
				                                                <div class="card card-checkboxes card-hover-effect"  id="{{$pt->paymentTermID}}" onclick="getpt(this.id)">
				                                                    <i class="{{$pt->paymentTermIco}}"></i>
																	<p>{{$pt->paymentTermName}}</p>
				                                                </div>
				                                            </div>
				                                        </div>
				                                    	@endforeach
				                                    </div>
				                                    <div class="col-sm-6" >
					                                    <h5 class="info-text"> <i>Payment Mode</i> </h5>
					                                    
				                                    	@foreach($paymentMode as $pm)
				                                        <div class="col-sm-9 col-sm-offset-1 " id="ppm{{$pm->paymentModeID}}" >
															<div class="choice" data-toggle="wizard-checkbox" style="margin-top: -10px">
				                                                <input type="checkbox" name="{{$pm->paymentModeID}}" id="pm{{$pm->paymentModeID}}" onchange="getpm(this.name)">
				                                                <div class="card card-checkboxes card-hover-effect" id="{{$pm->paymentModeID}}" onclick="getpm(this.id)">
				                                                    <i class="{{$pm->paymentModeIco}}"></i>
																	<p>{{$pm->paymentModeName}}</p>
				                                                </div>
				                                            </div>
				                                        </div>
				                                    	@endforeach
				                                    </div>
				                                </div>
			                                <!-- </div>		                                 -->
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                        	<div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next'  />
		                                <input type="button" data-toggle="modal"  value="Finish" class="btn btn-finish btn-fill btn-danger btn-wd" onclick="getFuck(this)">
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-danger btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>

		        <div class="col-sm-5 col-sm-offset-8" style="margin: 0px">
		            <!--      Wizard container        -->
		            <div class="wizard-container" style="padding-top: 50px">
		                <div class="card wizard-card" data-color="red" id="wizard">
		                <!--        You can switch " data-color="azure" "  with one of the next bright colors: "blue", "green", "orange", "red"           -->
		                		<div class="wizard-header">
		                        	<h3 class="wizard-title">Viewing</h3>
		                        	<p class="category">Click the icon to view the details.</p>
		                    	</div>

								<div class="wizard-navigation">
									<div class="progress-with-circle">
									     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 21%;"></div>
									</div>
									<ul>			                            
			                            <li>
											<a href="#viewDate" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-check-box"></i>
												</div>
												Dates
											</a>
										</li>
										<li>
											<a href="#viewCart" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-shopping-cart"></i>
												</div>
												Cart
											</a>
										</li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="viewCart">
		                                <div class="row">
		                                    <table id="cartTable" class="table table-hover" height="300px" style="display: block; overflow-x: hidden; ">
                  								<thead>
                     				
           										</thead>
                   								<tbody style="overflow-y: auto;">
                             
                   								</tbody>
          									</table>
		                                </div>
		                            </div>

		                            <div class="tab-pane" id="viewDate">
		                                <div class="row">
		                                    <div id="calendar" class="col-sm-10 col-sm-offset-1"></div>
		                                </div>

		                            </div>

		                        </div>
		                        <div class="wizard-footer">
		                            <div id="subtot">
										<h3 class="pull-left"> <b></b></h3> 
									</div>
		                            <div class="clearfix"></div>
		                        </div>

		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div> <!-- row -->
	    </div> <!--  big container -->
	</div>
	
	<!-- PACKAGE MODAL -->
	<form id="packageModals">
	@foreach($package as $pg)
	<div id="packageModal{{$pg->packageID}}" class="modal fade" role="dialog" >
		<div class="col-md-8 col-sm-offset-2">	
			<div class="modal-content" style="margin-top: 50px">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"> {{$pg->packageName}} <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h4>
				</div>

				<div class="modal-footer">
					@foreach($packageinclusion as $pgi)
		            	@if($pgi->packageID == $pg->packageID)
		            		<div class = "col-md-3 col-sm-3">
								<h3 id='dishTypeName'><center>{{$pgi->dishTypeName}}{{$pgi->serviceID}}</center></h3>
					            <div class="form-group">
									<img src="{{ asset('img/' . $pgi->dishTypeImage) }}" style="height: 150px; border: 5px" id="dishimg{{$pgi->packageID}}{{$pgi->packageInclusionID}}" class="col-md-12 col-sm-12">
					            	<select class="form-control" name="dishimg{{$pgi->packageID}}{{$pgi->packageInclusionID}}" id="dish{{$pgi->packageID}}{{$pgi->packageInclusionID}}" data-error="required"  onclick="getdishid(this.id)" onchange="pckdshimg(this.name)" required="">
									<option disabled selected value="">Choose Dish</option>
										@foreach($dishes as $dishh)
											@if($pgi->dishTypeID == $dishh->dishTypeID)
								   				<option value="{{$dishh->dishID}}">{{$dishh->dishName}}</option>
											@endif
										@endforeach
						           	</select>
							    </div>
							</div>																
						@endif
					@endforeach
				</div>
				<div class="modal-footer">
					<div class="pull-left">			
						<small>
						<h6 align="left"><label>
						<i><small>This package includes:</small></i><br/>
						Services:
						<i>								
						@foreach($serviceinclusion as $sgi)
							@if($sgi->packageID == $pg->packageID)
								{{$sgi->serviceName}}, &nbsp														
							@endif
						@endforeach
						@foreach($employeeinclusion as $egi)
		   					@if($egi->packageID == $pg->packageID)
								{{$egi->employeeTypeName}}, &nbsp	
							@endif
						@endforeach
						</i><br/>Equipment:
						<i>								
						@foreach($equipmentinclusion as $egi)
		  					@if($egi->packageID == $pg->packageID)
								{{$egi->equipmentName}}, &nbsp	
							@endif
						@endforeach
						</i>																
						</label>
						</h6>
						</small>
					</div>
					<div class="pull-right">
						<button type="button" style="margin-top: 10px" class="btn btn-success btn-fill pull-right" data-dismiss="modal" name="{{$pg->packageID}}" id="{{$pg->packageID}}" class="btn btn-info btn-md" onclick="addPack(this.name)">Add to Cart</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	</form>

	<!-- ADDITIONAL MODAL -->
	<form class="modal multi-step" id="additionalModal" role="form" method="POST" action="/UserReservationPage">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h3 hidden>{{$i=1}}</h3>
					@foreach($dishtype as $dd)
	                <h4 class="modal-title step-{{$i}}" data-step="{{$i}}">{{$dd->dishTypeName}}</h4>
	                <h3 hidden>{{$i++}}</h3>
	                @endforeach
	            </div>
				<input id="addprice" hidden>
				<h3 hidden>{{$i=1}}</h3>
				@foreach($dishtype as $dd)
	            <div class="modal-body step step-{{$i}}" align="center">
	            	<div class="row">						
		                <img src="{{ asset('img/' . $dd->dishTypeImage) }}" id="dishTypeImage{{$dd->dishTypeID}}" width="200px" height="150px">
						<select class="form-control" name="dishTypeImage{{$dd->dishTypeID}}" id="dishType{{$dd->dishTypeID}}" style="width: 200px" onchange="pckdshimg(this.name)" required="">
							<option disabled selected value="">Choose Dish</option>
							@foreach($dishes as $dishh)
							@if($dd->dishTypeID == $dishh->dishTypeID)
								<option value="{{$dishh->dishID}}">{{$dishh->dishName}}</option>
							@endif
							@endforeach
						</select> <br>
					    
					    <div class="col-sm-6">
					    	<div class="form-group">
					    		<label>Quantity</label>
					    		<input type="number" name="{{$dd->dishTypeID}}" id = "addqty{{$dd->dishTypeID}}" maxlength="50" min="1" max="9999" class="form-control" style="width: 250px" placeholder="Quantity per serving (5 pax)" onkeyup="comPrice(this.name)" onchange="comPrice(this.name)">
					    	</div>
					    
					    	<div class="form-group">
					    		<label>Price</label>
					    		<input type="number" disabled="" name="{{$dd->dishTypeID}}"  id="addprice{{$dd->dishTypeID}}" maxlength="50" class="form-control" style="width: 250px" value="" placeholder="Price">
					    	</div>
					    </div>

					    <div class="col-sm-offset-1">
					    	<label>Note / Comment</label>
					    	<textarea name="note" name="{{$dd->dishTypeID}}" id = "addnote{{$dd->dishTypeID}}" maxlength="50" class="form-control" style="width: 250px; height: 120px" placeholder="Note"></textarea>
					   	</div>
					</div>
	            </div>
	            <h3 hidden>{{$i++}}</h3>
	            @endforeach
	            

	            <div class="modal-footer">
		            <div class="pull-right">
		            <h3 hidden>{{$i=1}}</h3>
					@foreach($dishtype as $dd)
                		<button type="button" class="btn btn-danger btn-fill step step-{{$i-1}}" data-step="{{$i-1}}" onclick="sendEvent('#additionalModal', {{$i}})"> <i class="ti-angle-double-right"></i> </button>
	                	<button type="button" name="dishType{{$dd->dishTypeID}}" class="btn btn-success btn-fill step step-{{$i}}" data-step="{{$i}}" data-dismiss="modal" onclick="addAdd(this.name)">Add to Cart</button>

	            	<h3 hidden>{{$i++}}</h3>
	            	@endforeach
		            </div>

		            <div class="pull-left">
		            <h3 hidden>{{$i=1}}</h3>
					@foreach($dishtype as $dd)
                		<button type="button" class="btn btn-danger step step-{{$i+1}}" data-step="2" onclick="sendEvent('#additionalModal', {{$i}})"><i class="ti-angle-double-left"></i></button>
                	<h3 hidden>{{$i++}}</h3>
	            	@endforeach
		            </div>
	            </div>
	        </div>
	    </div>
	</form>

	<!-- SERVICE MODAL -->
	<form class="modal multi-step" id="serviceModal">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title step-1" data-step="1">Staff Service</h4>
	                <h3 hidden>{{$i=2}}</h3>
					@foreach($servicetype as $st)
	                <h4 class="modal-title step-{{$i}}" data-step="{{$i}}">{{$st->serviceTypeName}}</h4>
	                <h3 hidden>{{$i++}}</h3>
	                @endforeach
	            </div>

				<input id="empprice" hidden>
	            <div class="modal-body step step-1" align="center">
	                <div class="row">
		                <img src="{{ asset('img/' . 'bg1.jpg') }}" id="empimage" width="200px" height="150px">
		                <select class="form-control" name="empimage" id="employeetype" style="width: 200px"  onchange="pckempimg(this.name)">
							<option disabled selected value="">Choose Staff</option>
							@foreach($employeetype as $et)
								<option value="{{$et->employeeTypeID}}">{{$et->employeeTypeName}}</option>
							@endforeach
						</select> <br>
						<div class="col-sm-6">
					    	<div class="form-group">
					    		<label>Count</label>
					    		<input type="text" name="empqty" id = "empqty" maxlength="50" class="form-control" style="width: 250px" placeholder="Quantity" onchange="comPriceem(this)" onkeyup="comPriceem(this)">
					    	</div>

					    	<div class="form-group">
					    		<label>Price</label>
					    		<input type="text" disabled="" name="emptprice" id = "emptprice" maxlength="50" class="form-control" style="width: 250px" placeholder="Price">
					    	</div>
					    </div>
						<div class="col-sm-6">
						    <div class="col-sm-offset-1">
						    	<label>Note / Comment</label>
						    	<textarea name="empnote" id = "empnote" class="form-control" style="width: 300px; height: 120px" placeholder="Note"></textarea>
						    </div>
						</div>
					</div>
	            </div> 

				<input id="servprice" hidden>
				<h3 hidden>{{$i=2}}</h3>
	            @foreach($servicetype as $st)
	            <div class="modal-body step step-{{$i}}" align="center">
	            	<div class="row">	                
						<img src="{{ asset('img/' . $st->serviceTypeImage) }}" id="serviceTypeImage{{$st->serviceTypeID}}" width="200px" height="150px">
						<select class="form-control" name="serviceTypeImage{{$st->serviceTypeID}}" id="serviceType{{$st->serviceTypeID}}" style="width: 200px" onchange="pckservimg(this.name)">
							<option disabled selected value="">Choose Service</option>
							@foreach($service as $ss)
							@if($st->serviceTypeID == $ss->serviceTypeID)
								<option value="{{$ss->serviceID}}">{{$ss->serviceName}}</option>
							@endif
							@endforeach
						</select> <br>
					    
					    <div class="col-sm-6">
					    	<div class="form-group">
					    		<label>Quantity</label>
					    		<input type="text" name="{{$st->serviceTypeID}}" id = "servqty{{$st->serviceTypeID}}" maxlength="50" class="form-control" style="width: 250px" placeholder="Quantity" onchange="comPrices(this.name)" onkeyup="comPrices(this.name)">
					    	</div>

					    	<div class="form-group">
					    		<label>Description</label>
					    		<textarea name="servdesc" id = "servdesc{{$st->serviceTypeID}}" maxlength="50" class="form-control" style="width: 250px; height: 120px" placeholder="Description"></textarea>

					    	</div>
					    </div>

					    <div class="col-sm-offset-1">
					    	<div class="form-group">
					    		<label>Price</label>
					    		<input type="text" disabled="" name="servprice" id = "servprice{{$st->serviceTypeID}}" maxlength="50" class="form-control" style="width: 250px" placeholder="Price">
					    	</div>

					    	<div class="form-group">
					    		<label>Note / Comment</label>
					    		<textarea name="servnote" id = "servnote{{$st->serviceTypeID}}" maxlength="50" class="form-control" style="width: 250px; height: 120px" placeholder="Note"></textarea>
					    	</div>
					   	</div>
					</div>
	            </div>
	            <h3 hidden>{{$i++}}</h3>
	            @endforeach
	            

	            <div class="modal-footer">
	            	<div class="pull-right">
		            <h3 hidden>{{$i=2}}</h3>
		            <h3 hidden>{{$j=1}}</h3>
		            
					@foreach($servicetype as $st)
						<button type="button" name="employeetype" class="btn btn-success btn-fill step step-{{$j}}" data-step="{{$j}}" data-dismiss="modal" onclick="addEmp(this.name)">Add to Cart</button>
                		<button type="button" class="btn btn-danger btn-fill step step-{{$i-1}}" data-step="{{$i-1}}" onclick="sendEvent('#serviceModal', {{$i}})"> <i class="ti-angle-double-right"></i> </button>
	                	<button type="button" name="serviceType{{$st->serviceTypeID}}" class="btn btn-success btn-fill step step-{{$i}}" data-step="{{$i}}" data-dismiss="modal" onclick="addServ(this.name)">Add to Cart</button>

	            	<h3 hidden>{{$i++}}</h3>
	            	<h3 hidden>{{$j--}}</h3>
	            	@endforeach
		            </div>

		            <div class="pull-left">
		            <h3 hidden>{{$i=1}}</h3>
					@foreach($dishtype as $dd)
                		<button type="button" class="btn btn-danger step step-{{$i+1}}" data-step="{{$i+1}}" onclick="sendEvent('#serviceModal', {{$i}})"><i class="ti-angle-double-left"></i></button>
                	<h3 hidden>{{$i++}}</h3>
	            	@endforeach
	            	</div>
	        	</div>
	    	</div>
	    </div>
	</form>

<!-- EQUIPMENT MODAL -->
	<form class="modal multi-step" id="equipmentModal">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h3 hidden>{{$i=1}}</h3>
					@foreach($equipmenttype as $et)
	                <h4 class="modal-title step-{{$i}}" data-step="{{$i}}">{{$et->equipmentTypeName}}</h4>
	                <h3 hidden>{{$i++}}</h3>
	                @endforeach	            
	           </div>
				<input id="equipprice" hidden>
				<h3 hidden>{{$i=1}}</h3>
				@foreach($equipmenttype as $et)
	            <div class="modal-body step step-{{$i}}" align="center">
	            	<div class="row">						
		                <img src="{{ asset('img/' . $et->equipmentTypeImage) }}" id="equipmentTypeImage{{$et->equipmentTypeID}}" width="200px" height="150px">
						<select class="form-control" name="equipmentTypeImage{{$et->equipmentTypeID}}" id="equipmentType{{$et->equipmentTypeID}}" style="width: 200px" onchange="pckeqpimg(this.name)">
							<option disabled selected value="">Choose Equipment</option>
							@foreach($equipment as $eq)
							@if($et->equipmentTypeID == $eq->equipmentTypeID)
								<option value="{{$eq->equipmentID}}">{{$eq->equipmentName}}</option>
							@endif
							@endforeach
						</select> <br>
					    
					    <div class="col-sm-6">
					    	<div class="form-group">
					    		<label>Quantity</label>
					    		<input type="text" name="{{$et->equipmentTypeID}}" id = "equipqty{{$et->equipmentTypeID}}" maxlength="50" class="form-control" style="width: 250px" placeholder="Quantity" onchange="comPricee(this.name)" onkeyup="comPricee(this.name)">
					    	</div>

					    	<div class="form-group">
					    		<label>Description</label>
					    		<textarea name="equipdesc" id = "equipdesc{{$et->equipmentTypeID}}" maxlength="50" class="form-control" style="width: 250px; height: 120px" placeholder="Description"></textarea>

					    	</div>
					    </div>

					    <div class="col-sm-offset-1">
					    	<div class="form-group">
					    		<label>Price</label>
					    		<input type="text" disabled="" name="equipprice" id = "equipprice{{$et->equipmentTypeID}}" maxlength="50" class="form-control" style="width: 250px" placeholder="Price">
					    	</div>

					    	<div class="form-group">
					    		<label>Note / Comment</label>
					    		<textarea name="equipnote" id = "equipnote{{$et->equipmentTypeID}}" maxlength="50" class="form-control" style="width: 250px; height: 120px" placeholder="Note"></textarea>
					    	</div>
					   	</div>
					</div>
	            </div>
	            <h3 hidden>{{$i++}}</h3>
	            @endforeach
	            

	            <div class="modal-footer">
		            <div class="pull-right">
		            <h3 hidden>{{$i=1}}</h3>
					@foreach($equipmenttype as $et)
                		<button type="button" class="btn btn-danger btn-fill step step-{{$i-1}}" data-step="{{$i-1}}" onclick="sendEvent('#equipmentModal', {{$i}})"> <i class="ti-angle-double-right"></i> </button>
	                	<button type="button" name="equipmentType{{$et->equipmentTypeID}}" class="btn btn-success btn-fill step step-{{$i}}" data-step="{{$i}}" data-dismiss="modal" onclick="addEquip(this.name)">Add to Cart</button>

	            	<h3 hidden>{{$i++}}</h3>
	            	@endforeach
		            </div>

		            <div class="pull-left">
		            <h3 hidden>{{$i=1}}</h3>
					@foreach($equipmenttype as $et)
                		<button type="button" class="btn btn-danger step step-{{$i+1}}" data-step="2" onclick="sendEvent('#equipmentModal', {{$i}})"><i class="ti-angle-double-left"></i></button>
                	<h3 hidden>{{$i++}}</h3>
	            	@endforeach
		            </div>
	            </div>
	        </div>
	    </div>
	</form>

	<!-- PAYMENT MODAL -->
	<form class="modal multi-step" id="paymentModal" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog"> <br> <br> <br>
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title step-1" data-step="1">Confirmation</h4>
					<h4 class="modal-title step-2" data-step="2">Terms and Conditions</h4>
					<!-- <h4 class="modal-title step-3" data-step="3">Confirmation</h4> -->
				</div>

	            <div class="modal-body step step-1" align="center">
	            	<div id="review">

	            	</div>
	            </div>

	            <div class="modal-body step step-2" align="center">
					<textarea class="form-control" style="width: 550px; height:300px; overflow-y: auto;" value="" disabled>1) Reservation of your date with Margareth’s Catering 
a) Must reserve your date as early as 6-8 weeks before, during peak seasons. (Christmas, Graduation, Holidays) and 2-4 weeks during normal days. 
b) Event reservations must be confirmed in writing by the Client thru signing of Contract.
c) All bookings are subject to minimum guest numbers; these will be confirmed by Margareth’s Catering to the Clients.

2) Initial Payment: 30:70
a) An amount of initial payment will be given to the client by Margareth’s Catering once your reservation was confirmed.
b) Initial payment consists of 30% of total cost. It must be given to Margareth’s Catering after finalizing the event details.
c) Payment methods available include bank transfer, cheque and cash. 

3) Booking Confirmation
a) Once the Clients deposit has been received, Margareth’s Catering will issue a receipt. And a confirmation will follow about your event details. 

4) Total Cost
a) Payment in full is required for all catering services to be provided by Cloverdale Catering prior to the event. 
b) The information provided at this point will be used to produce your total event cost invoice, arrange staff and co-ordinate with your venue. Once our invoice is received by the Client payment must be received no later than 3 working days before the event.
c) Margareth’s Catering must be advised of any changes to event requirements (including the reduction of guest numbers) 7 days before the event date.
 
6) Cancellation of Event
a) Events cancelled due to valid reason Margareth’s Catering must be informed about cancellations. Total refundable amount was only 70% of total price computed upon finalizing the event. 
•	70% - 1 week before the event.
•	20% - 2 days before the event. 
b) The total event cost will be based on the numbers of guests scheduled, at the agreed price.

8) Food 
a) Due to health regulations and for the safety of our guests, food not consumed may not be taken from catered events. All leftover food remains the property of the client. 
b) While for Allergies, we cannot however take responsibility for any guests unless advised in advance (no less than 5 working days before the event).

9) Margareth’s Catering Properties, and Venue Guidelines
a) Venue Guidelines Margareth’s Catering will be happy to advise and arrange for specialty linens, floral arrangements, tents, chairs and tables. If you wish to display any signs or materials, please let the event planner know in advance and we will be happy to assist you. 
Please note: 
• Use of tape on walls, doors, ceilings, etc. is prohibited. 
• Open flames policy varies in each building. Consult event planner for more information. 
• Confetti or similar materials may be used. 
• No objects can be suspended from the ceiling.
b) Margareth’s Catering will not be held responsible for the theft, lost or damage to any personal effects of the Client.

10) Lost, Damaged Equipments
a) Margareth’s Catering will charge the client for lost equipments. (Ask for further information)
b) While damage fees will be applied for damaged equipments. (Ask for further information)

11) Margareth’s Rental of Equipment Service
a) Staffed Limited Service. This set-up includes a tablecloth for the food items ordered and all appropriate service ware. One (1) catering staff member will stay on-site to oversee the event. The staff member will replenish food and beverages throughout the event and keep the food buffet tidy and appealing to the guests.
					</textarea>	
					<div class="form-group">
					<input type="checkbox" id="concheck" onchange="getfm(this.id)" class="pull-left" value="1" style="margin-top: 3px;"><h6 style="font-size: 16px"> I have read and understand this agreement and I accept and agree to all of its terms and conditions.</h6>
					</div>
	            </div>

				<div class="modal-footer">
					<div class="pull-right">
						<button type="button" class="btn btn-success btn-fill step step-1" data-step="1" onclick="sendEvent('#paymentModal', 2)">Continue</button>
						<button type="button" id="btnFinish" name="finish" value="Finish" class="btn btn-success btn-fill step step-2" data-step="2" disabled="">Confirm</button>
						<!-- <button type="button" id="btnFinish" name="finish" value="Finish" class="btn btn-danger btn-fill step step-3" data-step="3" data-dismiss="modal">Confirm</button> -->
					</div>
					<div class="pull-left">
						<button type="button" class="btn btn-danger step step-1" data-step="1" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-danger step step-2" data-step="2" onclick="sendEvent('#paymentModal', 1)">Back</button>
						<!-- <button type="button" class="btn btn-success step step-3" data-step="3" onclick="sendEvent('#paymentModal', 2)">Back</button> -->
					</div>
				</div>
			</div>			
		</div>
	</form>

	<!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
	<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

	<script type="text/javascript" src="{{ asset('sweetalert/dist/sweetalert.min.js') }}"></script>

	<script type="text/javascript">
		function goHome() {
			swal({
			  title: "Are you sure you want to exit?",
			  text: "All the information will be lost.",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Exit",
			  closeOnConfirm: false
			},
			
			function(){
			    window.location.href="UserHomePage"
			});
		}
	</script>

	<script type="text/javascript">
			$.validator.addMethod("regex", function(value, element, regexp) {
		            var re = new RegExp(regexp);
		            return this.optional(element) || re.test(value);
		        },
		        "Please check your input."
			);
   			$('#addReservation').validate({
        		// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        		feedbackIcons: {
            		valid: 'fa fa-check',
            		invalid: 'fa fa-close',
            		validating: 'fa fa-refresh',
        		},
        		rules:{
        			eType: {
        				required:true,
        			},	        
		            yesNo: {
		            	required:true,
		            },
		            eLoc: {
						required:true,
						minlength: 2,
		            },
		            eLoc2: {
		            	required:true,
		            },
		            eName: {
		            	required:true,
						rangelength: [5,50],
		            },
		            eNum: {
		            	required:true,
		            	digits:true,
		            	min: 100,
		            	max: 400,
		            },
		            eDate: {
		            	required:true,
		            	date: true,
		            	min: "{{date('Y-m-d',  strtotime( '+7 day' ))}}",
		            	max: "{{date('Y-m-d',  strtotime( '+2 month' ))}}",
		            },
		            eTime: {
		            	required:true,
		            	min:"06:59:00",
		            	max: function () { return $('#tm1').val(); },
		            },
		            enTime: {
		            	required:true,
		            	min: function () { return $('#tc').val(); },
		            	max: function () { return $('#tm2').val(); },
		            },
		            cusName: {
		            	required:true,
						rangelength: [3,50],
		            },
		            prevCusName: {
		            	required:true,
		            },
		            homeAdd: {
		            	required:true,
						rangelength: [5,50],
		            },
		            dob: {
		            	required:true,
		            	date: true,
		            	min: "{{date('Y-m-d',  strtotime( '-100 year' ))}}",
		            	max: "{{date('Y-m-d',  strtotime( '-12 year' ))}}",
		            },
		            cellNum: {
		            	required:true,
						regex: "^[0-9]{3}-[0-9]{4}$|^09[0-9]{2}-[0-9]{3}-[0-9]{4}$",
		            },
		            emailAdd: {
		         	   	required:true,
		         	   	email:true,
		            },
		            conPerson: {
		            	required:true,
		            	rangelength: [3,50],

		            },
		            conNum: {
		            	required:true,
		            	regex: "^[0-9]{3}-[0-9]{4}$|^09[0-9]{2}-[0-9]{3}-[0-9]{4}$",
		            },
            	},
            	messages:{
            		eNum: {
		            	min: "Minimum guest is 100",
		            	max: "Maximum guest is 400",
		            },
		            eType:{
        				required:"Choose a type of Event.",
        			},	        
		            eLoc2:{
        				required:"Choose a Venue.",
        			},	        
		            no: {
		            	required:"Choose an answer.",
		            },
		            cellNum:{
		            	regex: "Please enter a valid contact number. Format is 0900-000-0000 or 000-0000",
		            },
		            eDate:{
		            	min: "Event must be a week at least a week from now.",
		            	max: "Event must be within these 2 months.",
		            },
		            eTime:{
		            	min: "Business hours starts at 7:00 AM.",
		            	max: "Event duration must be atleast 5 hours.",
		            },
		            enTime:{
		            	min: "Event duration must be atleast 5 hours.",
		            	max:  function () { return "Business hours ends at " + $('#tm3').val(); },
		            },
		            dob: {
		            	required:"Date of birth is required to determine your age.",
		            	min: "You are not that old.",
		            	max: "You must be atleast 12 years old to book an event.",
		            },
		            conNum:{
		            	regex: "Please enter a valid contact number. Format is 0900-000-0000 or 000-0000",
		            },
            	}
        	});     
 		</script>

 	<script type="text/javascript">
    //   $('#serviceModal').bootstrapValidator({
    //         feedbackIcons: {
    //             valid: 'glyphicon glyphicon-ok',
    //             invalid: 'glyphicon glyphicon-remove',
    //             validating: 'glyphicon glyphicon-refresh'
    //         },
    //         fields: {
    //             empqty: {
    //                 validators: {
    //                       stringLength: {
    //                       max: 2,
    //                       message:'Limit reached.'
    //                     },
    //                     regexp: {
    //                             regexp: /^[0-9]+$/,
    //                             message: 'Invalid input.'
    //                     },
    //                         notEmpty: {
    //                         message: 'This field is required.'
    //                     },
    //                 }
				// },

    //             empnote: {
    //                 validators: {
    //                       stringLength: {
    //                       min: 2,
    //                       max: 50,
    //                       message:'Limit reached.'
    //                     }, 
    //                     notEmpty: {
    //                         message: 'This field is required.'
    //                     },
    //                 }
				// },
    //         }
                
    //     });
      </script>

 		<script>
 			var addCtr = 0;
 			var servCtr = 0;
 			var equipCtr = 0;
 			var empCtr = 0;
 			function addPack(id){
				var dishes = [];
				var dishesVal = [];
 					// alert("asd");
 					var pckgid = [];
 					var servid = [];
 					var equipid = [];
 					var empid = [];
 					var dishid = [];
		        	var pgId = $("#pckid").val();
		        	var pckname;
		        	var price = 0;
		        	var pckImage;
		        	var check = 0;
		        	// alert(pgId);
					$.ajax({
						url: '/UserReservationPage-getPIID',
						type: 'POST',
						data: {
							"_token": "{{ csrf_token() }}",
							pg_id: pgId
						},
						success: function(data){
							// console.log(data);
							// alert(data['pckgid'][0]['packageInclusionID']);
							for(var i = 0; i < data['pckgid'].length; i++){
								// alert(data['pckgid'][i]['packageInclusionID']);
								price=([data['pckgid'][i]['packageCost']]);
								pckgid.push([data['pckgid'][i]['packageInclusionID']]);
		 						pckname=([data['pckgid'][i]['packageName']]);
		 						pckImage=([data['pckgid'][i]['packageImage']]);	
		 						tp=price*parseInt($('#eNum').val());
		 						// price=price+parseDouble(([data['pckgid'][i]['dishCost']]));
		 						// alert(price);

							}
							if(!($('#eNum').val())){
								check=1;
							}							
							for(var i = 0; i < data['servid'].length; i++){
								servid.push([data['servid'][i]['serviceID']]);
							}
							for(var i = 0; i < data['equipid'].length; i++){
								equipid.push([data['equipid'][i]['equipmentID']]);
							}
							for(var i = 0; i < data['empid'].length; i++){
								empid.push([data['empid'][i]['employeeTypeID']]);
							}
							var pckginc = [];
		 					for (var i = 0; i < pckgid.length; i++){
		 						pckginc.push(["dish" +pgId+""+pckgid[i]]);
		 					}
							for (var i = 0; i < pckginc.length; i++){
								var selectedOption = document.getElementById(pckginc[i]);
		 						dishes[i] = " "+selectedOption.options[selectedOption.selectedIndex].text;
								dishesVal[i] = selectedOption.options[selectedOption.selectedIndex].value;
								if ((dishes[i])==" Choose Dish"){
									check=1;
								}
		 					}
							//alert(dishes);
							//alert(dishesVal);
		 					if(check==0){
		 						for(var i = 0; i < data['pckid'].length; i++){
									document.getElementById("pck"+[data['pckid'][i]['packageID']]).disabled=true;
								}
								var table = document.getElementById("cartTable");
							    var row = table.insertRow(0);
								var cell10 = row.insertCell(0);
							    var cell1 = row.insertCell(1);
							    var cell2 = row.insertCell(2);
								var cell3 = row.insertCell(3);
								var cell4 = row.insertCell(4);
								var cell5 = row.insertCell(5);
								var cell6 = row.insertCell(6);
								var cell7 = row.insertCell(7);
								var cell8 = row.insertCell(8);
								var cell9 = row.insertCell(9);

								cell1.innerHTML = '<h6>Package &nbsp |</h6><img id="cartImg" src="" width="80px" height="60px">';
								document.getElementById("cartImg").src="{!! asset('img/'.'"+ pckImage +"')!!}";
							    cell2.innerHTML = '<h6><b>'+pckname+'</b></h6><small><label id="cartDishes"><i>'+ dishes +'</i></label></small>';
			 					cell3.innerHTML = '<h6><b>'+tp+'</b></h6>';
							    // cell3.innerHTML = '<h3>'+price+'</h3><br/><button id ="btnRemove" type="button" class="btn btn-info btn-md" onclick="deleteRow(this)">Remove</button>';
						    	cell4.innerHTML = '<button id ="btnRemove" type="button" class="btn btn-danger btn-sm pull-right " onclick="deleteRow(this)">&times</button>';
								cell5.innerHTML = '<input type="text" id="addPackageID" value="'+pgId+'" hidden>';
								cell6.innerHTML = '<input type="text" id="addDishesAvailed" value="'+dishesVal+'" hidden>';
								cell7.innerHTML = '<input type="text" id="addServiceAvailed" value="'+servid+'" hidden>';
								cell8.innerHTML = '<input type="text" id="addEquipmentAvailed" value="'+equipid+'" hidden>';
								cell9.innerHTML = '<input type="text" id="addEmployeeEmployed" value="'+empid+'" hidden>';
								cell10.innerHTML = '<input type="text" id="addCheck" value="0" hidden>';

								var table = document.getElementById('cartTable');
					        	var subt =0;
							        for (var r = 0, n = table.rows.length; r < n; r++) {
							            subt =subt+parseFloat(table.rows[r].cells[3].innerText);
							        }
								$subt=subt;
					    		document.getElementById('subtot').innerHTML='<h3 class="pull-left">Subtotal:   <b>'+subt+'</b></h3> ';
					    		$('#pprice').val(tp);
					    	}
					    	else{
					    		swal("Note!", "Please complete choosing your package.")
					    	}
						},
						error: function(result){
							alert('error');
						}
					});


		        }
		        function pckdshimg(id){			        
				var selectedOption = document.getElementsByName(id);
				var dish = selectedOption[0].options[selectedOption[0].selectedIndex].value;
				        
				$.ajax({
					url: '/UserReservationPage-getAdd',
					type: 'POST',
					data: {
					"_token": "{{ csrf_token() }}",
					ad_id: dish
						},
						success: function(data){	
						var dishImages=([data['dish'][0]['dishImage']]);
						var str="{!! asset('img/'.'"+ dishImages +"')!!}";
						var pckdishimg =  document.getElementById(id);
						$("#addprice").val([data['dish'][0]['dishCost']]);
						pckdishimg.src=str;
						comPrice([data['dish'][0]['dishTypeID']]);
						
						},
						error: function(result){
							alert('error');
						}
				});

		        }
			function deleteRow(t){
		        	var pgId = $("#pckid").val();
				    var row = t.parentNode.parentNode;
				    document.getElementById("cartTable").deleteRow(row.rowIndex);

		        	var table = document.getElementById('cartTable');
		        	var subt =0;
				        for (var r = 0, n = table.rows.length; r < n; r++) {
				            subt =subt+parseFloat(table.rows[r].cells[3].innerText);
				        }
				    // alert(subt);

				    $subt=subt;
				    document.getElementById('subtot').innerHTML='<h3 class="pull-left">Subtotal:   <b>'+subt+'</b></h3> ';
				    // console.log(row);
				    $.ajax({
						url: '/UserReservationPage-getPIID',
						type: 'POST',
						data: {
							"_token": "{{ csrf_token() }}",
							pg_id: pgId
						},
						success: function(data){

							for(var i = 0; i < data['pckid'].length; i++){
								document.getElementById("pck"+[data['pckid'][i]['packageID']]).disabled=false;
							}

						},
						error: function(result){
							alert('error');
						}
					});
			}
////////////////////////////////////			// //////////////////////////////////////////////////////////////////////////////////////////////
			function getpt(id){
				var ptid=id;
				$('#ptids').val(ptid);
					$.ajax({
						url: '/UserReservationPage-getPay',
						type: 'POST',
						data: {
							"_token": "{{ csrf_token() }}",							
							p_id: ptid,
						},
						success: function(data){
							for(var i = 0; i < data['paymentTerm'].length; i++){
								document.getElementById("pt"+[data['paymentTerm'][i]['paymentTermID']]).checked=false;
								$('#ppt'+[data['paymentTerm'][i]['paymentTermID']]).find('[data-toggle="wizard-checkbox"]').removeClass('active');							
							}
							document.getElementById("pt"+id).checked=true;
						},
						error: function(result){
							alert('error');
						}
					});
			}
			function getpm(id){
				var pmid=id;
				$('#pmids').val(pmid);
					$.ajax({
						url: '/UserReservationPage-getPay',
						type: 'POST',
						data: {
							"_token": "{{ csrf_token() }}",
							p_id: pmid,
						},
						success: function(data){
							for(var i = 0; i < data['paymentMode'].length; i++){
								document.getElementById("pm"+[data['paymentMode'][i]['paymentModeID']]).checked=false; 
								$('#ppm'+[data['paymentMode'][i]['paymentModeID']]).find('[data-toggle="wizard-checkbox"]').removeClass('active');
								
							}
							document.getElementById("pm"+id).checked=true;

								// $('.fc-toolbar').find('.fc-button-group').addClass('btn-xs btn-group');
						},
						error: function(result){
							alert('error');
						}
					});
			}
		  
 			function addAdd(id){
					var selectedOption = document.getElementById(id);
					var dish = selectedOption.options[selectedOption.selectedIndex].value;
				var price=0;
				var qty=0;

				if(dish==0) {
					swal("Note!", "Please choose a dish.")
				}

 				$.ajax({
					url: '/UserReservationPage-getAdd',
					type: 'POST',
					data: {
					"_token": "{{ csrf_token() }}",
					ad_id: dish
						},
						success: function(data){
						price=parseFloat([data['dish'][0]['dishCost']]);	
						var dishName=([data['dish'][0]['dishName']]);	
						var dishImage=([data['dish'][0]['dishImage']]);
						var qty = $("#addqty"+([data['dish'][0]['dishTypeID']])).val();
						var notes = $("#addnote"+([data['dish'][0]['dishTypeID']])).val();
						// var tp = $("#addprice"+([data['dish'][0]['dishTypeID']])).val();
						var qqty = 0;
						var check;
						var chec=0;
						var table = document.getElementById("cartTable");
						for (var r = 0,n=table.rows.length; r <n; r++) {
							if(dish==table.rows[r].cells[5].childNodes[0].value){
								// alert(r);
								if(table.rows[r].cells[0].childNodes[0].value==1){
								// alert(r+"a");
									qqty=parseInt(table.rows[r].cells[6].childNodes[0].value);
									if(table.rows[r].cells[7].childNodes[0].value){
										notes=table.rows[r].cells[7].childNodes[0].value;	
									}				
									check=r;
									chec=1;
				     			}
							}
						}
						if(chec==1 && qty>0){
							document.getElementById("cartTable").deleteRow(check);
				     		addCtr=addCtr-1;
				     	}						
						if(qty>0){
							addCtr=addCtr+1;
							var table = document.getElementById("cartTable");
						    var row = table.insertRow(0);
							var cell8 = row.insertCell(0);
						    var cell1 = row.insertCell(1);
						    var cell2 = row.insertCell(2);
							var cell3 = row.insertCell(3);
							var cell4 = row.insertCell(4);
							var cell5 = row.insertCell(5);
							var cell6 = row.insertCell(6);
							var cell7 = row.insertCell(7);
							var tq = parseInt(qty)+parseInt(qqty);
							var tp = tq*price;
														
							cell1.innerHTML = '<h6>Add-On &nbsp |</h6><img id="cartImg" src="" width="80px" height="60px">';
							document.getElementById("cartImg").src="{!! asset('img/'.'"+ dishImage +"')!!}";
							cell2.innerHTML = '<h6><b>'+dishName+'</b></h6><small><label id="cartDishes"><i>Quantity: '+tq+'<br/>Price: '+price+'</i></label></small>';
						    cell3.innerHTML = '<h6><b>'+tp+'</b></h6>';
						    cell4.innerHTML = '<button id ="btnRemove" type="button" class="btn btn-danger btn-sm pull-right " onclick="deleteRowFood(this)">&times</button>';
							cell5.innerHTML = '<input type="text" id="additionalDish'+addCtr+'" value="'+dish+'" hidden><h1 style="display:none">'+dish+'</h1>';
							cell6.innerHTML = '<input type="text" id="additionalQty'+addCtr+'" value="'+tq+'" hidden>';
							cell7.innerHTML = '<input type="text" id="additionalNotes'+addCtr+'" value="'+notes+'" hidden>';
							cell8.innerHTML = '<input type="text" id="addCheck'+addCtr+'" value="1" hidden>';
				

							var table = document.getElementById('cartTable');
					       	var subt =0;
						        for (var r = 0, n = table.rows.length; r < n; r++) {
						            subt =subt+parseFloat(table.rows[r].cells[3].innerText);
						        }
							$subt=subt;
				    		document.getElementById('subtot').innerHTML='<h3 class="pull-left">Subtotal:   <b>'+subt+'</b></h3> ';
				    		// selectedOption.removeChild([selectedOption.selectedIndex]);
						}
						else{
							swal("Note!", "Please input dish quantity.")
						}						
						},
						error: function(result){
							alert('error');
						}
				});
		 		
 			}
 			function comPrice(id){
 					var p=$('#addprice').val();
 					var qty=$('#addqty'+id).val();
 					var tp;
 					tp=p*qty;
 					$('#addprice'+id).val(tp);
 			}
 			function deleteRowFood(t){
				    var row = t.parentNode.parentNode;
				    document.getElementById("cartTable").deleteRow(row.rowIndex);
				    addCtr=addCtr-1;

		        	var table = document.getElementById('cartTable');
		        	var subt =0;
				        for (var r = 0, n = table.rows.length; r < n; r++) {
				            subt =subt+parseFloat(table.rows[r].cells[3].innerText);
				        }

				        swal({
							title: "Remove additional food in the cart?",
							confirmButtonColor: "#DD6B55",
							confirmButtonText: "Yes",
							showCancelButton: true,
							closeOnConfirm: false
						},
							
							function(){
							    window.location.href="UserHomePage"
							});
				    // alert(subt);
				    $subt=subt;
				    document.getElementById('subtot').innerHTML='<h4 class="pull-left">Subtotal:   <b>'+subt+'</b></h4> ';

				    // console.log(row);
			}
			// function tabDate(t){
			// 		document.getElementById('subtot').innerHTML='<h4 class="pull-left">  <b></b></h3> ';	
			// }
			// function tabCart(t){
			// 		var table = document.getElementById('cartTable');
		    //        	var subt =0;
			// 	        for (var r = 0, n = table.rows.length; r < n; r++) {
			// 	            subt =subt+parseFloat(table.rows[r].cells[3].innerText);
			// 	        }
			// 	    // alert(subt);
			// 	    $subt=subt;
			// 	    document.getElementById('subtot').innerHTML='<h4 class="pull-left">Subtotal:   <b>'+subt+'</b></h4> ';
			// }
 			function addServ(id){
 				var selectedOption = document.getElementById(id);
				var serv = selectedOption.options[selectedOption.selectedIndex].value;
				var price=0;
				var qty=0;
 				// alert(serv);
				
				if(serv==0) {
					swal("Note!", "Please choose a service.")
				}

 				$.ajax({
					url: '/UserReservationPage-getServ',
					type: 'POST',
					data: {
					"_token": "{{ csrf_token() }}",
					as_id: serv
						},
						success: function(data){
						price=parseFloat([data['serv'][0]['serviceFee']]);	
						var servName=([data['serv'][0]['serviceName']]);	
						var servImage=([data['serv'][0]['serviceImage']]);
						var qty = $("#servqty"+([data['serv'][0]['serviceTypeID']])).val();
						var notes = $("#servnote"+([data['serv'][0]['serviceTypeID']])).val();
						var desc = $("#servdesc"+([data['serv'][0]['serviceTypeID']])).val();
						// var tp = $("#servprice"+([data['serv'][0]['serviceTypeID']])).val();
						var qqty = 0;
						var check;
						var chec=0;
						var table = document.getElementById("cartTable");
						for (var r = 0,n=table.rows.length; r <n; r++) {
							if(serv==table.rows[r].cells[5].childNodes[0].value){
								// alert(r);
								if(table.rows[r].cells[0].childNodes[0].value==2){
								// alert(r+"a");
									qqty=parseInt(table.rows[r].cells[6].childNodes[0].value);
									if(table.rows[r].cells[7].childNodes[0].value){
										notes=table.rows[r].cells[7].childNodes[0].value;	
									}
									if(table.rows[r].cells[8].childNodes[0].value){
										desc=table.rows[r].cells[8].childNodes[0].value;	
									}				
									check=r;
									chec=1;
				     			}
							}
						}
						if(chec==1 && qty>0){
							document.getElementById("cartTable").deleteRow(check);
				     		servCtr=servCtr-1;
				     	}		
					
								 
						if(qty>0){
							servCtr=servCtr+1;
							var table = document.getElementById("cartTable");
						    var row = table.insertRow(0);
							var cell9 = row.insertCell(0);
						    var cell1 = row.insertCell(1);
						    var cell2 = row.insertCell(2);
							var cell3 = row.insertCell(3);
							var cell4 = row.insertCell(4);
							var cell5 = row.insertCell(5);
							var cell6 = row.insertCell(6);
							var cell7 = row.insertCell(7);
							var cell8 = row.insertCell(8);
							var tq = parseInt(qty)+parseInt(qqty);
							var tp = tq*price;
											
							cell1.innerHTML = '<h6>Add-On &nbsp |</h6><img id="cartImg" src="" width="80px" height="60px">';
							document.getElementById("cartImg").src="{!! asset('img/'.'"+ servImage +"')!!}";
							cell2.innerHTML = '<h6><b>'+servName+'</b></h6><small><label id="cartDishes"><i>Quantity: '+tq+'<br/>Price: '+price+'</i></label></small>';
						    cell3.innerHTML = '<h6><b>'+tp+'</b></h6>';
						    cell4.innerHTML = '<button id ="btnRemove" type="button" class="btn btn-danger btn-sm pull-right " onclick="deleteRowServ(this)">&times</button>';
							cell5.innerHTML = '<input type="text" id="additionalService'+servCtr+'" value="'+serv+'" hidden><h1 style="display:none">'+serv+'</h1>';
							cell6.innerHTML = '<input type="text" id="additionalSQty'+servCtr+'" value="'+tq+'" hidden>';
							cell7.innerHTML = '<input type="text" id="additionalSNotes'+servCtr+'" value="'+notes+'" hidden>';
							cell8.innerHTML = '<input type="text" id="additionalSDesc'+servCtr+'" value="'+desc+'" hidden>';
							cell9.innerHTML = '<input type="text" id="addSCheck'+servCtr+'" value="2" hidden>';
				

							var table = document.getElementById('cartTable');
					       	var subt =0;
						        for (var r = 0, n = table.rows.length; r < n; r++) {
						            subt =subt+parseFloat(table.rows[r].cells[3].innerText);
						        }
							$subt=subt;
				    		document.getElementById('subtot').innerHTML='<h3 class="pull-left">Subtotal:   <b>'+subt+'</b></h3> ';
				    		// selectedOption.removeChild([selectedOption.selectedIndex]);
						}
						else{
							swal("Note!", "Please input service quantity.")
						}
						},
						error: function(result){
							alert('error');
						}
				});
 			}
 			function pckservimg(id){			        
				var selectedOption = document.getElementsByName(id);
				var serv = selectedOption[0].options[selectedOption[0].selectedIndex].value;
				        
				$.ajax({
					url: '/UserReservationPage-getServ',
					type: 'POST',
					data: {
					"_token": "{{ csrf_token() }}",
					as_id: serv
						},
						success: function(data){	
						var servImages=([data['serv'][0]['serviceImage']]);
						var str="{!! asset('img/'.'"+ servImages +"')!!}";
						var pckdishimg =  document.getElementById(id);
						$("#servprice").val([data['serv'][0]['serviceFee']]);
						pckdishimg.src=str;
						comPrices([data['serv'][0]['serviceTypeID']]);
						
						},
						error: function(result){
							alert('error');
						}
				});

		    }
 			function comPrices(id){
 					var p=$('#servprice').val();
 					var qty=$('#servqty'+id).val();
 					var tp;
 					tp=p*qty;
 					$('#servprice'+id).val(tp);
 			}
 			function deleteRowServ(t){
				    var row = t.parentNode.parentNode;
				    document.getElementById("cartTable").deleteRow(row.rowIndex);
				    servCtr=servCtr-1;

		        	var table = document.getElementById('cartTable');
		        	var subt =0;
				        for (var r = 0, n = table.rows.length; r < n; r++) {
				            subt =subt+parseFloat(table.rows[r].cells[3].innerText);
				        }
				    // alert(subt);
				    $subt=subt;
				    document.getElementById('subtot').innerHTML='<h4 class="pull-left">Subtotal:   <b>'+subt+'</b></h4> ';

				    // console.log(row);
			}
 			function addEquip(id){
				var selectedOption = document.getElementById(id);
				var equip = selectedOption.options[selectedOption.selectedIndex].value;
				var price=0;
				var qty=0;
 				// alert(equip);

 				if(equip==0) {
 					swal("Note!", "Please choose an equipment.")
 				} 

 				$.ajax({
					url: '/UserReservationPage-getEquip',
					type: 'POST',
					data: {
					"_token": "{{ csrf_token() }}",
					ae_id: equip
						},
						success: function(data){
						price=parseFloat([data['equip'][0]['equipmentRatePerHour']]);	
						var equipName=([data['equip'][0]['equipmentName']]);	
						var equipImage=([data['equip'][0]['equipmentImage']]);
						var qty = $("#equipqty"+([data['equip'][0]['equipmentTypeID']])).val();
						var notes = $("#equipnote"+([data['equip'][0]['equipmentTypeID']])).val();
						var desc = $("#equipdesc"+([data['equip'][0]['equipmentTypeID']])).val();
						// var tp = $("#equipprice"+([data['equip'][0]['equipmentTypeID']])).val();
						var qqty = 0;
						var check;
						var chec=0;
						var table = document.getElementById("cartTable");
						for (var r = 0,n=table.rows.length; r <n; r++) {
							if(equip==table.rows[r].cells[5].childNodes[0].value){
								// alert(r);
								if(table.rows[r].cells[0].childNodes[0].value==3){
								// alert(r+"a");
									qqty=parseInt(table.rows[r].cells[6].childNodes[0].value);
									if(table.rows[r].cells[7].childNodes[0].value){
										notes=table.rows[r].cells[7].childNodes[0].value;	
									}
									if(table.rows[r].cells[8].childNodes[0].value){
										desc=table.rows[r].cells[8].childNodes[0].value;	
									}				
									check=r;
									chec=1;
				     			}
							}
						}
						if(chec==1 && qty>0){
							document.getElementById("cartTable").deleteRow(check);
				     		equipCtr=equipCtr-1;
				     	}		
					

						if(qty>0){
							equipCtr=equipCtr+1;
							var table = document.getElementById("cartTable");
						    var row = table.insertRow(0);
							var cell9 = row.insertCell(0);
						    var cell1 = row.insertCell(1);
						    var cell2 = row.insertCell(2);
							var cell3 = row.insertCell(3);
							var cell4 = row.insertCell(4);
							var cell5 = row.insertCell(5);
							var cell6 = row.insertCell(6);
							var cell7 = row.insertCell(7);
							var cell8 = row.insertCell(8);
							var tq = parseInt(qty)+parseInt(qqty);
							var tp = tq*price;
											
							cell1.innerHTML = '<h6>Add-On &nbsp |</h6><img id="cartImg" src="" width="80px" height="60px">';
							document.getElementById("cartImg").src="{!! asset('img/'.'"+ equipImage +"')!!}";
							cell2.innerHTML = '<h6><b>'+equipName+'</b></h6><small><label id="cartDishes"><i>Quantity: '+tq+'<br/>Price: '+price+'</i></label></small>';
						    cell3.innerHTML = '<h6><b>'+tp+'</b></h6>';
						    cell4.innerHTML = '<button id ="btnRemove" type="button" class="btn btn-danger btn-sm pull-right " onclick="deleteRowEquip(this)">&times</button>';
							cell5.innerHTML = '<input type="text" id="additionalEquipment'+equipCtr+'" value="'+equip+'" hidden><h1 style="display:none">'+equip+'</h1>';
							cell6.innerHTML = '<input type="text" id="additionalEQty'+equipCtr+'" value="'+tq+'" hidden>';
							cell7.innerHTML = '<input type="text" id="additionalENotes'+equipCtr+'" value="'+notes+'" hidden>';
							cell8.innerHTML = '<input type="text" id="additionalEDesc'+equipCtr+'" value="'+desc+'" hidden>';
							cell9.innerHTML = '<input type="text" id="addECheck'+equipCtr+'" value="3" hidden>';
				

							var table = document.getElementById('cartTable');
					       	var subt =0;
						        for (var r = 0, n = table.rows.length; r < n; r++) {
						            subt =subt+parseFloat(table.rows[r].cells[3].innerText);
						        }
							$subt=subt;
				    		document.getElementById('subtot').innerHTML='<h3 class="pull-left">Subtotal:   <b>'+subt+'</b></h3> ';
				    		// selectedOption.removeChild([selectedOption.selectedIndex]);
						}
						else{
							swal("Note!", "Please input equipment quantity.")
						}
						},
						error: function(result){
							alert('error');
						}
				});
 			}
 			function pckeqpimg(id){			        
				var selectedOption = document.getElementsByName(id);
				var equip = selectedOption[0].options[selectedOption[0].selectedIndex].value;
				        
				$.ajax({
					url: '/UserReservationPage-getEquip',
					type: 'POST',
					data: {
					"_token": "{{ csrf_token() }}",
					ae_id: equip
						},
						success: function(data){	
						var equipImages=([data['equip'][0]['equipmentImage']]);
						var str="{!! asset('img/'.'"+ equipImages +"')!!}";
						var pckeqpimg =  document.getElementById(id);
						$("#equipprice").val([data['equip'][0]['equipmentRatePerHour']]);
						pckeqpimg.src=str;
						comPricee([data['equip'][0]['equipmentTypeID']]);
						
						},
						error: function(result){
							alert('error');
						}
				});

		    }
 			function comPricee(id){
 					var p=$('#equipprice').val();
 					var qty=$('#equipqty'+id).val();
 					var tp;
 					tp=p*qty;
 					$('#equipprice'+id).val(tp);
 			}
 			function deleteRowEquip(t){
				    var row = t.parentNode.parentNode;
				    document.getElementById("cartTable").deleteRow(row.rowIndex);
				    equipCtr=equipCtr-1;

		        	var table = document.getElementById('cartTable');
		        	var subt =0;
				        for (var r = 0, n = table.rows.length; r < n; r++) {
				            subt =subt+parseFloat(table.rows[r].cells[3].innerText);
				        }
				    // alert(subt);
				    $subt=subt;
				    document.getElementById('subtot').innerHTML='<h4 class="pull-left">Subtotal:   <b>'+subt+'</b></h4> ';

				    // console.log(row);
			}
 			function addEmp(id){
 				var selectedOption = document.getElementById(id);
				var emp = selectedOption.options[selectedOption.selectedIndex].value;
				var price=0;
				var qty=0;
 				// alert(emp);

 				if(emp==0) {
					swal("Note!", "Please choose a staff service.")
 				}

 				$.ajax({
					url: '/UserReservationPage-getEmp',
					type: 'POST',
					data: {
					"_token": "{{ csrf_token() }}",
					ae_id: emp
						},
						success: function(data){
						price=parseFloat([data['emp'][0]['employeeRatePerHour']]);	
						var empName=([data['emp'][0]['employeeTypeName']]);	
						var empImage=([data['emp'][0]['employeeTypeImage']]);
						var qty = $("#empqty").val();
						var notes = $("#empnote").val();
						// var tp = $("#emptprice").val();
						var qqty = 0;
						var check;
						var chec=0;
						var table = document.getElementById("cartTable");
						for (var r = 0,n=table.rows.length; r <n; r++) {
							if(emp==table.rows[r].cells[5].childNodes[0].value){
								// alert(r);
								if(table.rows[r].cells[0].childNodes[0].value==4){
								// alert(r+"a");
									qqty=parseInt(table.rows[r].cells[6].childNodes[0].value);
									if(table.rows[r].cells[7].childNodes[0].value){
										notes=table.rows[r].cells[7].childNodes[0].value;	
									}				
									check=r;
									chec=1;
				     			}
							}
						}
						if(chec==1 && qty>0){
							document.getElementById("cartTable").deleteRow(check);
				     		empCtr=empCtr-1;
				     	}						
								 
						if(qty>0){
							empCtr=empCtr+1;
							var table = document.getElementById("cartTable");
						    var row = table.insertRow(0);
							var cell8 = row.insertCell(0);
						    var cell1 = row.insertCell(1);
						    var cell2 = row.insertCell(2);
							var cell3 = row.insertCell(3);
							var cell4 = row.insertCell(4);
							var cell5 = row.insertCell(5);
							var cell6 = row.insertCell(6);
							var cell7 = row.insertCell(7);
							var tq = parseInt(qty)+parseInt(qqty);
							var tp = tq*price;
											
							cell1.innerHTML = '<h6>Add-On &nbsp |</h6><img id="cartImg" src="" width="80px" height="60px">';
							document.getElementById("cartImg").src="{!! asset('img/'.'"+ empImage +"')!!}";
							cell2.innerHTML = '<h6><b>'+empName+'</b></h6><small><label id="cartDishes"><i>Quantity: '+tq+'<br/>Price: '+price+'</i></label></small>';
						    cell3.innerHTML = '<h6><b>'+tp+'</b></h6>';
						    cell4.innerHTML = '<button id ="btnRemove" type="button" class="btn btn-danger btn-sm pull-right " onclick="deleteRowEmp(this)">&times</button>';
							cell5.innerHTML = '<input type="text" id="additionalEmployee'+empCtr+'" value="'+emp+'" hidden><h1 style="display:none">'+emp+'</h1>';
							cell6.innerHTML = '<input type="text" id="additionalEmQty'+empCtr+'" value="'+tq+'" hidden>';
							cell7.innerHTML = '<input type="text" id="additionalEmNotes'+empCtr+'" value="'+notes+'" hidden>';
							cell8.innerHTML = '<input type="text" id="addEmCheck'+empCtr+'" value="4" hidden>';
				

							var table = document.getElementById('cartTable');
					       	var subt =0;
						        for (var r = 0, n = table.rows.length; r < n; r++) {
						            subt =subt+parseFloat(table.rows[r].cells[3].innerText);
						        }
							$subt=subt;
				    		document.getElementById('subtot').innerHTML='<h3 class="pull-left">Subtotal:   <b>'+subt+'</b></h3> ';
				    		// selectedOption.removeChild([selectedOption.selectedIndex]);
						}
						else{
							swal("Note!", "Please input staff count.")
						}
						},
						error: function(result){
							alert('error');
						}
				});
 			}
 			function pckempimg(id){			        
				var selectedOption = document.getElementsByName(id);
				var emp = selectedOption[0].options[selectedOption[0].selectedIndex].value;
				$.ajax({
					url: '/UserReservationPage-getEmp',
					type: 'POST',
					data: {
					"_token": "{{ csrf_token() }}",
					ae_id: emp
						},
						success: function(data){	
						var empImages=([data['emp'][0]['employeeTypeImage']]);
						var str="{!! asset('img/'.'"+ empImages +"')!!}";
						var pckempimg =  document.getElementById(id);
						$("#empprice").val([data['emp'][0]['employeeRatePerHour']]);
						pckempimg.src=str;
						comPriceem();
						
						},
						error: function(result){
							alert('error');
						}
				});

		    }
		    function comPriceem(id){
 					var p=$('#empprice').val();
 					var qty=$('#empqty').val();
 					var tp;
 					tp=p*qty;
 					$('#emptprice').val(tp);
 			}
		    function deleteRowEmp(t){
				    var row = t.parentNode.parentNode;
				    document.getElementById("cartTable").deleteRow(row.rowIndex);
				    empCtr=empCtr-1;

		        	var table = document.getElementById('cartTable');
		        	var subt =0;
				        for (var r = 0, n = table.rows.length; r < n; r++) {
				            subt =subt+parseFloat(table.rows[r].cells[3].innerText);
				        }
				    // alert(subt);
				    $subt=subt;
				    document.getElementById('subtot').innerHTML='<h4 class="pull-left">Subtotal:   <b>'+subt+'</b></h4> ';

				    // console.log(row);
			}

 			
		        
		        function cartclick(id){
		        	// alert($("#addEventID").val());
		        	// alert($("#addCustomerID").val());
		        	// alert($("#addReservationID").val());
		        	// alert($("#addContactID").val());
		        	// alert($("#addDishAvailedID").val());
		        	var table = document.getElementById('cartTable');
		        	var subt =0;
				        for (var r = 0, n = table.rows.length; r < n; r++) {
				            subt =subt+parseFloat(table.rows[r].cells[3].innerText);
				        }
				    // alert(subt);
				    $subt=subt;
				    document.getElementById('subtot').innerHTML='<h4 class="pull-left">Subtotal:   <b>'+subt+'</b></h4> ';
		        }
 				function getpckid(id){
 				$("#pckid").val(id)
 				@foreach($package as $pg)
 				@foreach($packageinclusion as $pgi)
		            	@if($pgi->packageID == $pg->packageID)
		            		document.getElementById('dishimg{{$pgi->packageID}}{{$pgi->packageInclusionID}}').src="{!! asset('img/' . $pgi->dishTypeImage) !!}"; 
		            	@endif
		         @endforeach
		         @endforeach
 				// alert(id)
 				document.getElementById('packageModals').reset();
 				}
 				function getFck(id){
 				@foreach($dishtype as $dt)
		            document.getElementById('dishTypeImage{{$dt->dishTypeID}}').src="{!! asset('img/' . $dt->dishTypeImage) !!}";
		        @endforeach
 				@foreach($servicetype as $st)
		            document.getElementById('serviceTypeImage{{$st->serviceTypeID}}').src="{!! asset('img/' . $st->serviceTypeImage) !!}";
		        @endforeach
		        @foreach($equipmenttype as $et)
		            document.getElementById('equipmentTypeImage{{$et->equipmentTypeID}}').src="{!! asset('img/' . $et->equipmentTypeImage) !!}";
		        @endforeach
 					document.getElementById('empimage').src="{!! asset('img/' . 'bg1.jpg') !!}"; 
 					document.getElementById('additionalModal').reset();
 					document.getElementById('serviceModal').reset();
 					document.getElementById('equipmentModal').reset();
 				}
 				function getfm(id){
 					if(document.getElementById(id).checked==true){
 						document.getElementById('btnFinish').disabled=false; 						
 					}
 					else{
 						document.getElementById('btnFinish').disabled=true;
 					}
 				} 				
 				function getFuck(id){
 					document.getElementById('paymentModal').reset();
 					sendEvent('#paymentModal', 1);
 					var addEventIDs = $("#addEventID").val();						
					var eNames = $("#eName").val();
					var eDates = $("#eDate").val();
					var eTimes = $("#eTime").val();
					var enTimes = $("#enTime").val();
					var eLocs = $("#eLoc").val();
					var eLoc2s = $("#eLoc2 :selected").text();
					var eNums = $("#eNum").val();
					var eTypes = $("#eType :selected").text();
					var addCustomerIDs = $("#addCustomerID").val();
					var cusNames;
					if(document.getElementById('prevCus').checked){							
						cusNames = $("#prevCusName").find(":selected").text().trim();
						document.getElementById('pID').value = $("#prevCusName").find(":selected").val();

					}
					else{							
						cusNames = $("#cusName").val();							
					}
					var homeAdds = $("#homeAdd").val();
					var emailAdds = $("#emailAdd").val();
					var cellNums = $("#cellNum").val();
					var dobs = $("#dob").val();
					var addContactIDs = $("#addContactID").val();
					var conPersons = $("#conPerson").val();
					var conNums = $("#conNum").val();
					var addDishID = [];
					var addDishQty = [];
					var addDishNotes = [];
					var addServID = [];
					var addServQty = [];
					var addServNotes = [];
					var addServDescs = [];
					var addEquipID = [];
					var addEquipQty = [];
					var addEquipNotes = [];
					var addEquipDescs = [];
					var addEmpID = [];
					var addEmpQty = [];
					var addEmpNotes = [];
					var ptIDs = $("#ptids").val();
					var abc = 0;

						if(ptIDs==""||ptIDs==null){
							abc = 1;
							swal("Note!", "Please choose a payment term.", "warning")
						}

					var pmIDs = $("#pmids").val();

						if(pmIDs==""||pmIDs==null){
							abc = 1;
							swal("Note!", "Please choose a payment mode.", "warning")
						}

					var addReservationIDs = $("#addReservationID").val();
					var addPackIDs = $("#addPackageID").val();
					var venues;
					if(document.getElementById('yes').checked){
						venues=eLocs;
					}
					else{
						venues=eLoc2s;
					}

					if(abc==0) {
					$("#paymentModal").modal("show");
					document.getElementById('review').innerHTML='<p align="left">Hi '+cusNames+'! Here are the details of your reservation. Kindly review and verify:</p><textarea id="txt" class="form-control" style="width: 550px; height:300px; overflow-y: auto;" value="" disabled></textarea>';
					$('#txt').append("\t\t\t\t\t\tEVENT DETAILS:");
					$('#txt').append("\n\tEvent Name: \t\t\t\t"+eNames);
					$('#txt').append("\n\tEvent Type: \t\t\t\t"+eTypes);
					$('#txt').append("\n\tNumber of Guests: \t\t"+eNums);
					$('#txt').append("\n\tEvent Date: \t\t\t\t"+eDates);
					$('#txt').append("\n\tEvent Venue: \t\t\t"+venues);
					$('#txt').append("\n\tStart Time: \t\t\t\t"+eTimes);
					$('#txt').append("\n\tEnd Time: \t\t\t\t"+enTimes);
					$('#txt').append("\n\t_____________________________________________________________");
					$('#txt').append("\n\n\t\t\t\t\t\tCUSTOMER DETAILS:");
					$('#txt').append("\n\tCustomer Name: \t\t\t"+cusNames);
					$('#txt').append("\n\tHome Address: \t\t\t"+homeAdds);
					$('#txt').append("\n\tEmail Address: \t\t\t"+emailAdds);
					$('#txt').append("\n\tDate of Birth: \t\t\t"+dobs);
					$('#txt').append("\n\tContact Number: \t\t\t"+cellNums);
					$('#txt').append("\n\tContact Person: \t\t\t"+conPersons);
					$('#txt').append("\n\tContact Number: \t\t\t"+conNums);
					$('#txt').append("\n\t_____________________________________________________________");
					var tot=0;
					if(addPackIDs){
					$('#txt').append("\n\n\t\t\t\t\t\tPACKAGE DETAILS:");
						$.ajax({
							url: '/UserReservationPage-getPIID',
							type: 'POST',
							data: {
								"_token": "{{ csrf_token() }}",
								pg_id: addPackIDs
							},
							success: function(data){
								$('#txt').append("\n\tPackage Name: \t\t\t"+data['pckid'][0]['packageName']);
								var price;
								var pckgid=[];
								var tp;
								for(var i = 0; i < data['pckgid'].length; i++){
								price=([data['pckgid'][i]['packageCost']]);
								pckgid.push([data['pckgid'][i]['packageInclusionID']]);
		 						tp=price*parseInt($('#eNum').val());

								}
								$('#txt').append("\n\tPrice: \t\t\t\t\t"+price+" per head");
								var pckginc = [];
			 					for (var i = 0; i < pckgid.length; i++){
			 						pckginc.push(["dish" +addPackIDs+""+pckgid[i]]);
			 					}
			 					$('#txt').append("\n\tDish Included:");
								for (var i = 0; i < pckginc.length; i++){
									var selectedOption = document.getElementById(pckginc[i]);
			 						$('#txt').append("\n\t\t\t\t\t\t\t"+selectedOption.options[selectedOption.selectedIndex].text);
									
			 					}
			 					$('#txt').append("\n\tServices Included:");
								for(var i = 0; i < data['servid'].length; i++){
									$('#txt').append("\n\t\t\t\t\t\t\t"+[data['servid'][i]['serviceName']]);
								}
			 					$('#txt').append("\n\tEquipment Included:");
								for(var i = 0; i < data['equipid'].length; i++){
									$('#txt').append("\n\t\t\t\t\t\t\t"+[data['equipid'][i]['equipmentName']]);
								}
			 					$('#txt').append("\n\tStaff Included:");
								for(var i = 0; i < data['empid'].length; i++){
									$('#txt').append("\n\t\t\t\t\t\t\t"+[data['empid'][i]['employeeTypeName']]);
								}
								$('#txt').append("\n\t_____________________________________________________________");
								$('#txt').append("\n\t\t\t\t\t\t\t\t\t\t\t\t\t"+tp+".00");
								tot=tot+tp;
							},
							error: function(result){
								alert('error');
							}
						}); 
					}
					if(addCtr>0||servCtr>0||equipCtr>0||empCtr>0){
						$('#txt').append("\n\n\t\t\t\t\t\tADDITIONAL DETAILS:");
							if(addCtr>0){
								var j=1;
								for (var i = 1; i <= addCtr; i++){
									addDishID=($("#additionalDish"+i+"").val());
										$.ajax({
											url: '/UserReservationPage-getAdd',
											type: 'POST',
											data: {
											"_token": "{{ csrf_token() }}",
											ad_id: addDishID
												},
												success: function(data){
												var price=parseFloat([data['dish'][0]['dishCost']]);
												$('#txt').append("\n\tAdditional Dish "+j+": \t\t"+data['dish'][0]['dishName']);
												if($("#additionalNotes"+j+"").val()){
													$('#txt').append("\n\tNote: \t\t\t\t\t"+($('#additionalNotes'+j+'').val()));
												}
												$('#txt').append("\n\tPrice: \t\t\t\t\t"+price);
												$('#txt').append("\n\tQuantity: \t\t\t\t"+($('#additionalQty'+j+'').val()));
												tp=price*($("#additionalQty"+j+"").val());
												$('#txt').append("\n\t\t\t\t\t\t\t\t\t\t\t\t\t"+tp+".00");	
												j++;
												tot=tot+tp;
												},
												error: function(result){
													alert('error');
												}
										});									
								}
							}
							
							if(servCtr>0){
								var k=1;
								for (var i = 1; i <= servCtr; i++){
									addServID=($("#additionalService"+i+"").val());
									$.ajax({
											url: '/UserReservationPage-getServ',
											type: 'POST',
											data: {
											"_token": "{{ csrf_token() }}",
											as_id: addServID
												},
												success: function(data){
												var price=parseFloat([data['serv'][0]['serviceFee']]);
												$('#txt').append("\n\tAdditional Service "+k+": \t\t"+data['serv'][0]['serviceName']);
												if($("#additionalSNotes"+k+"").val()){
													$('#txt').append("\n\tNote: \t\t\t\t\t"+($('#additionalSNotes'+k+'').val()));
												}
												if($("#additionalSDesc"+k+"").val()){
													$('#txt').append("\n\tDescription: \t\t\t\t"+($('#additionalSDesc'+k+'').val()));
												}
												$('#txt').append("\n\tPrice: \t\t\t\t\t"+price);
												$('#txt').append("\n\tQuantity: \t\t\t\t"+($('#additionalSQty'+k+'').val()));
												tp=price*($("#additionalSQty"+k+"").val());
												$('#txt').append("\n\t\t\t\t\t\t\t\t\t\t\t\t\t"+tp+".00");	
												k++;
												tot=tot+tp;
												},
												error: function(result){
													alert('error');
												}
											}); 
								}
							}
							if(equipCtr>0){
								var l = 1;
								for (var i = 1; i <= equipCtr; i++){
									addEquipID=($("#additionalEquipment"+i+"").val());
									$.ajax({
											url: '/UserReservationPage-getEquip',
											type: 'POST',
											data: {
											"_token": "{{ csrf_token() }}",
											ae_id: addEquipID
												},
												success: function(data){
												var price=parseFloat([data['equip'][0]['equipmentRatePerHour']]);
												$('#txt').append("\n\tAdditional Equipment "+l+": \t"+data['equip'][0]['equipmentName']);
												if($("#additionalENotes"+l+"").val()){
													$('#txt').append("\n\tNote: \t\t\t\t\t"+($('#additionalENotes'+l+'').val()));
												}
												if($("#additionalEDesc"+l+"").val()){
													$('#txt').append("\n\tDescription: \t\t\t\t"+($('#additionalEDesc'+l+'').val()));
												}
												$('#txt').append("\n\tPrice: \t\t\t\t\t"+price);
												$('#txt').append("\n\tQuantity: \t\t\t\t"+($('#additionalEQty'+l+'').val()));
												tp=price*($("#additionalEQty"+l+"").val());
												$('#txt').append("\n\t\t\t\t\t\t\t\t\t\t\t\t\t"+tp+".00");	
												l++;
												tot=tot+tp;
												},
												error: function(result){
													alert('error');
												}
											}); 
								}
							}
							if(empCtr>0){
								var m =1;
								for (var i = 1; i <= empCtr; i++){
									addEmpID.push($("#additionalEmployee"+i+"").val());
									$.ajax({
											url: '/UserReservationPage-getEmp',
											type: 'POST',
											data: {
											"_token": "{{ csrf_token() }}",
											ae_id: addEmpID
												},
												success: function(data){
												var price=parseFloat([data['emp'][0]['employeeRatePerHour']]);
												$('#txt').append("\n\tAdditional Staff "+m+": \t\t"+data['emp'][0]['employeeTypeName']);
												if($("#additionalEmNotes"+m+"").val()){
													$('#txt').append("\n\tNote: \t\t\t\t\t"+($('#additionalEmNotes'+m+'').val()));
												}
												$('#txt').append("\n\tPrice: \t\t\t\t\t"+price);
												$('#txt').append("\n\tQuantity: \t\t\t\t"+($('#additionalEmQty'+m+'').val()));
												tp=price*($("#additionalEmQty"+m+"").val());
												$('#txt').append("\n\t\t\t\t\t\t\t\t\t\t\t\t\t"+tp+".00");	
												m++;
												tot=tot+tp;
												},
												error: function(result){
													alert('error');
												}
											}); 
								}
							}
						}
						$('#txt').one("scroll", function(){
							if(addPackIDs){
							//tot=tot+parseFloat($('#pprice').val());
							}
							if(addCtr>0){
								for(var i=1;i<=addCtr;i++){
									var dprice=parseFloat($('#dprice').val());
									// tot=tot+dprice;
								}
							}
							if(servCtr>0){
								for(var i=1;i<=servCtr;i++){
									var sprice =parseFloat($('#sprice').val());
									// tot=tot+sprice;
								}
							}
							if(equipCtr>0){
								for(var i=1;i<=equipCtr;i++){
									var eprice =parseFloat($('#eprice').val());
									//tot=tot+eprice;
								}
							}
							if(empCtr>0){
								for(var i=1;i<=empCtr;i++){
									var emprice =parseFloat($('#emprice').val());
									// tot=tot+emprice;
								}
							}
							// alert(tot);
			 				$('#txt').append("\n\t_____________________________________________________________");
							$('#txt').append("\n\tTOTAL:\t\t\t\t\t\t\t\t\t\t\t"+tot+".00");

		 				});	
		 			}
						
 				}
 				
 				function getdishtypeid(id){
 				$("#dtid").val(id)
 				//alert(id)
 				}
 				function getstid(id){
 				$("#stid").val(id)
 				//alert(id)
 				}
 				function geteqid(id){
 				$("#eqid").val(id)
 				//alert(id)
 				}
 				function getdishid(id){
 				//$("#pckid").val(id)
 				//alert(id)
 				}
 				function dateday(id){
 					var d = new Date($('#eDate').val());
 					var n = d.getDay();
 					// alert(n);
 					if(n==0 || n==6){
 						var a = "13:00";
 						var b = "18:00";
 						document.getElementById('eTime').setAttribute("max","13:00:00.00");
 						document.getElementById('enTime').setAttribute("max","18:00:00.00");
 						$('#tm1').val(a);
 						$('#tm2').val(b);
 						$('#tm3').val("6:00 PM");

 						swal({
						  title: "Note!",
						  text: "Working hours ends at 6pm every weekends.",
						  timer: 5000,
						  showConfirmButton: true
						});
 					}
 					else{
 						var a = "16:00";
 						var b = "21:00";
 						document.getElementById('eTime').setAttribute("max","16:00:00.00");
 						document.getElementById('enTime').setAttribute("max","21:00:00.00");
 						$('#tm1').val(a);
 						$('#tm2').val(b);
 						$('#tm3').val("9:00 PM");
 					}

 				}
 				function timeChange(id){

 					var etime = $('#eTime').val();
 					var tt = etime.charAt(0)+etime.charAt(1);
 					var pp = etime.charAt(3)+etime.charAt(4);
 					var ttime = parseInt(tt) + 5;
 					var pt= ttime+":"+pp;
 					$('#tc').val(pt);
 					// alert(ttime);
 					document.getElementById('enTime').setAttribute("min",pt);
 					
 				}
 				$("#btnFinish").click(function(e){
 						var pchecker = $("#pChecker").val();
 						var pID = $("#pID").val();
						var addEventIDs = $("#addEventID").val();						
						var eNames = $("#eName").val();
						var eDates = $("#eDate").val();
						var eTimes = $("#eTime").val();
						var enTimes = $("#enTime").val();
						var eLocs = $("#eLoc").val();
						var eLoc2s = $("#eLoc2").val();
						var eNums = $("#eNum").val();
						var eTypes = $("#eType").val();
						var addCustomerIDs = $("#addCustomerID").val();
						var cusNames;
						if(document.getElementById('prevCus').checked){							
							cusNames = $("#prevCusName").find(":selected").text().trim();
						}
						else{							
							cusNames = $("#cusName").val();							
						}
						var homeAdds = $("#homeAdd").val();
						var emailAdds = $("#emailAdd").val();
						var cStats = $('#cStat').val();
						var cellNums = $("#cellNum").val();
						var dobs = $("#dob").val();
						var addContactIDs = $("#addContactID").val();
						var conPersons = $("#conPerson").val();
						var conNums = $("#conNum").val();
						var addDishID = [];
						var addDishQty = [];
						var addDishNotes = [];
						var addServID = [];
						var addServQty = [];
						var addServNotes = [];
						var addServDescs = [];
						var addEquipID = [];
						var addEquipQty = [];
						var addEquipNotes = [];
						var addEquipDescs = [];
						var addEmpID = [];
						var addEmpQty = [];
						var addEmpNotes = [];
						var ptIDs = $("#ptids").val();
						var pmIDs = $("#pmids").val();
						var addReservationIDs = $("#addReservationID").val();
						var addPackIDs = $("#addPackageID").val();
						if(addPackIDs){
							var dishIDs = $("#addDishesAvailed").val().split(',');
							var servIDs = $("#addServiceAvailed").val().split(',');	
							var equipIDs = $("#addEquipmentAvailed").val().split(',');
							var empIDs = $("#addEmployeeEmployed").val().split(',');
						}
						// else{
						// 	addPackIDs = 0;
						// }
						if(addCtr>0){
							for (var i = 1; i <= addCtr; i++){
								addDishID.push($("#additionalDish"+i+"").val());
								addDishQty.push($("#additionalQty"+i+"").val());
								addDishNotes.push($("#additionalNotes"+i+"").val());
							}
							// alert(addDishID);
							// alert(addDishQty);
							// alert(addDishNotes);
						}
						
						if(servCtr>0){
							for (var i = 1; i <= servCtr; i++){
								addServID.push($("#additionalService"+i+"").val());
								addServQty.push($("#additionalSQty"+i+"").val());
								addServNotes.push($("#additionalSNotes"+i+"").val());
								addServDescs.push($("#additionalSDesc"+i+"").val());
							}
							// alert(addServID);
							// alert(addServQty);
							// alert(addServNotes);
							// alert(addServDescs);
						}
						if(equipCtr>0){
							for (var i = 1; i <= equipCtr; i++){
								addEquipID.push($("#additionalEquipment"+i+"").val());
								addEquipQty.push($("#additionalEQty"+i+"").val());
								addEquipNotes.push($("#additionalENotes"+i+"").val());
								addEquipDescs.push($("#additionalEDesc"+i+"").val());
							}
							// alert(addEquipID);
							// alert(addEquipQty);
							// alert(addEquipNotes);
							// alert(addEquipDescs);
						}
						if(empCtr>0){
							for (var i = 1; i <= empCtr; i++){
								addEmpID.push($("#additionalEmployee"+i+"").val());
								addEmpQty.push($("#additionalEmQty"+i+"").val());
								addEmpNotes.push($("#additionalEmNotes"+i+"").val());
							}
							// alert(addEmpID);
							// alert(addEmpQty);
							// alert(addEmpNotes);
						}
							// alert("motherfucker2");
						// var d = new Date(); 
						//  dt = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate(); 
						// alert(dt)
								$.ajax({
					                url:  "/UserReservationPage",
					                type: "POST",
							        beforeSend: function (xhr) {
							            var token = $('meta[name="csrf_token"]').attr('content');

							            if (token) {
							                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
							            }
							        },
					                data: {
					                	"_token": "{{ csrf_token() }}",
										addEventID: addEventIDs,
										pChecker: pchecker,
										pID: pID,
										eName: eNames,
										eDate: eDates,
										eTime: eTimes,
										enTime: enTimes,
									    eLoc: eLocs,
									    eLoc2: eLoc2s,
									    eNum: eNums,
									    eType: eTypes,
									    addCustomerID: addCustomerIDs,
									    cusName: cusNames,
									    homeAdd: homeAdds,
									    billAdd: homeAdds,
									    emailAdd: emailAdds,
									    cStat: cStats,
									    cellNum: cellNums,
									    dob: dobs,
									    addContactID: addContactIDs,
									    conPerson: conPersons,
									    conNum: conNums,
										addReservationID: addReservationIDs,
								       	addPackID: addPackIDs,
						            	dishID: dishIDs,
						            	servID: servIDs,
						            	equipID: equipIDs,
						            	empID: empIDs,
						            	addDishID: addDishID,
						            	addDishQty: addDishQty,
						            	addDishNotes: addDishNotes,
						            	addServID: addServID,
										addServQty: addServQty,
										addServNotes: addServNotes,
										addServDescs: addServDescs,
										addEquipID: addEquipID,
										addEquipQty: addEquipQty,
										addEquipNotes: addEquipNotes,
										addEquipDescs: addEquipDescs,
										addEmpID: addEmpID,
										addEmpQty: addEmpQty,
										addEmpNotes: addEmpNotes,
										ptIDs: ptIDs,
										pmIDs: pmIDs,
						            	
					         		},
					                success: function(data){
						            	swal({
										  title: "Thank you!",
										  text: "Please expect a call within a day.",
										  type: "success",
										  showCancelButton: false,
										  confirmButtonText: "Okay",
										  closeOnConfirm: false
										},
										
										function(){
										    window.location.href="UserReservationPage"
										});
					                },
					                error: function(xhr){
						            	alert("Error");
						            }                  
					    		});					
							
					});
 				function locYes(){
 					if(document.getElementById('yes').checked){
 						$("#eLoc").removeAttr('disabled');
 						document.getElementById('locNo').style="display:none";
 						document.getElementById('locYes').style="display:";
 						document.getElementById('eLoc2').selectedIndex="0";
 					}
 					else if(document.getElementById('no').checked){
 						document.getElementById('locYes').style="display:none";
 						document.getElementById('locNo').style="display:"; 	
 						document.getElementById('eLoc').value="";	
 					}
 				}
 				function prevC(){
	 				if(document.getElementById('prevCus').checked) {
					    $("#homeAdd").attr('disabled', true);
					    $("#dob").attr('disabled', true);
 						document.getElementById('cusNo').style="display:none";
 						document.getElementById('cusYes').style="display:";
 						// $('#cStat').val('0');
 						document.getElementById('pChecker').value = 1;
					} else {
					    $("#homeAdd").removeAttr('disabled');
					    $("#dob").removeAttr('disabled');
 						document.getElementById('dob').value="";			
 						document.getElementById('cellNum').value="";			
 						document.getElementById('homeAdd').value="";			
 						document.getElementById('emailAdd').value="";
					    document.getElementById('cusYes').style="display:none";
 						document.getElementById('cusNo').style="display:";
 						document.getElementById('prevCusName').selectedIndex="0";

 						document.getElementById('pChecker').value = 0;
 						// $('#cStat').val('1');			
					}
				}
				function prevChange(id){	        
				var selectedOption = document.getElementsByName(id);
				var getCusID = selectedOption[0].options[selectedOption[0].selectedIndex].value;
					$.ajax({
						url: '/UserReservationPage-getCus',
						type: 'POST',
						data: {
						"_token": "{{ csrf_token() }}",
						gc_id: getCusID
							},
							success: function(data){
							var h=([data['cus'][0]['homeAddress']]);
							var e=([data['cus'][0]['emailAddress']]);
							var c=([data['cus'][0]['cellNum']]);
							var d=([data['cus'][0]['dateOfBirth']]);
	 						document.getElementById('dob').value=d;			
	 						document.getElementById('cellNum').value=c;			
	 						document.getElementById('homeAdd').value=h;			
	 						document.getElementById('emailAdd').value=e;
	 						document.getElementById('pID').value=data['cus'][0]['customerID'];							
							},
							error: function(result){
								alert('error');
							}
					}); 
				}
 		</script>


 		<script>
 		var datee=[];
 		var start=[];
 		var end=[];
 		var rsvtn=1;
 		var events=[];
 		$.ajax({
					url: '/UserReservationPage-getReservation',
					type: 'POST',
					data: {
						asd:'rsvtn',
						"_token": "{{ csrf_token() }}",
						},
						success: function(data){	
	 						for(var i=0;i<data['rsvtn'].length;i++){
								datee.push([data['rsvtn'][i]['eventDate']]);	
								start.push([data['rsvtn'][i]['eventTime']]);	
								end.push([data['rsvtn'][i]['endTime']]);
							}	
							for(var i=0;i<data['rsvtn'].length;i++){
								events.push({title: 'Reserved',  start : datee[i]+'T'+start[i], end : datee[i]+'T'+end[i]})
							}	
					 		$(document).ready(function() {
					 			//alert(datee);
								// alert(start);
								// alert(end);
								//alert(ctr);
								// alert(events);
								$('#calendar').fullCalendar({
									header: {	
										left: '',						
										center: 'title',
										right: '',
									},
									footer: {			
										left: 'prev,next today'
									},
									events: events,
									displayEventTime: false,
									theme:true,
									eventColor: '#EB5E28'

										
													
								});
								$('.fc-toolbar').find('.fc-button-group').addClass('btn-xs btn-group');
								$('.fc-toolbar').find('.ui-button').addClass('btn btn-danger btn-fill');
								$('.fc-toolbar').find('.fc-prev-button').html($('<span />').attr('class', 'ti-angle-left'));
								$('.fc-toolbar').find('.fc-next-button').html($('<span />').attr('class', 'ti-angle-right'));
							});							
						},
						error: function(result){
							alert('error');
						}
		});
 		</script>
 		<script type="text/javascript">
	 		
 		</script>

 		<script src="/multi/multi-step-modal.js"></script>
		
		<script>
			sendEvent = function(sel, step) {
		    	$(sel).trigger('next.m.' + step);
			}
		</script>

@endsection
