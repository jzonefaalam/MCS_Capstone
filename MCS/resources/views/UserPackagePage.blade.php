@extends('layouts.userResUI')

@section('content')
<div class="wrapper">
  <div class="demo">
    <img src="../img/qqq.jpg" style="width: 100%; height: 300px; margin-top: -100px">
  </div>
  
  <div class="main">
    <div class="section section-nude">
      <div class="container tim-container">
        <div id="sliders-navigation">

          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">

              <ul id="tabs" class="nav nav-tabs" data-tabs="tabs" >
                <li class="active"><a href="#package" data-toggle="tab">Package</a></li>
       
              </ul>

            </div>
          </div>
            
          <div id="my-tab-content" class="tab-content text-center">
            <div class="tab-pane active" id="package">
       		</div>
          @foreach($package as $pg)
            <div class="tab-pane active" id="{{$pg->packageName}}">              
              	<div class="col-sm-4" align="left">
                  <img src="{{ asset('img/' . $pg->packageImage) }}" style="width: 350px; height: 200px"> <br>
                  <h5> {{$pg->packageName}} </h5>
                <h6 align="center"> Dishes </h6>
                @foreach($packageinclusion as $pgi)
            	@if($pgi->packageID == $pg->packageID)
	            	<small>-{{$pgi->dishTypeName}}</small><br>											
				@endif
			  	@endforeach
                <h6 align="center"> Services </h6>
			  	@foreach($serviceinclusion as $sgi)
					@if($sgi->packageID == $pg->packageID)
					<small>-{{$sgi->serviceName}}</small><br>														
					@endif
				@endforeach
				@foreach($employeeinclusion as $egi)
   					@if($egi->packageID == $pg->packageID)
					<small>-{{$egi->employeeTypeName}}</small><br>	
					@endif
				@endforeach
                <h6 align="center"> Equipment </h6>
				@foreach($equipmentinclusion as $egi)
  					@if($egi->packageID == $pg->packageID)
					<small>-{{$egi->equipmentName}}</small><br>	
					@endif
				@endforeach
			  	</div>
              
                     
               
            </div> 
          @endforeach

          </div>
        </div>
      </div>
    </div>
  </div> <br>

  <footer class="footer-demo section-dark">
    <div class="container" align="center">
      <nav class="copyright pull-left">
        ABOUT US <br>
        Margareth’s catering is a business which offers food service with complete equipment <br>
        and setup. Services like flower arrangements, invitations, tarpaulins, rental of equipment <br>
        and other services for different kinds of events (special occasions like birthdays and <br>
        weddings, business meetings and conferences) are also available. Many attendees are fond of <br>
        the way they arranged the place which come up in a catering business in the year of 2010.
      </nav>

      <div class="copyright pull-right">
        CONTACT US <br>
        <i class="fa fa-clock-o"></i> 9:00am to 5:00 pm | Monday to Saturday <br>
        <i class="fa fa-location-arrow"></i> B4 L5 Ph7 JP Rizal St., New San Mateo Subd., <br>Gitnangbayan I, San Mateo, Rizal <br>
        <i class="fa fa-phone"></i> (042) 696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 <br>
        <i class="fa fa-envelope-o"></i> margarethcateringservices@gmail.com
      </div>
    </div>
  </footer>
</div>
@endsection