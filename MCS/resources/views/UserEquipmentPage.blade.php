@extends('layouts.userResUI')

@section('content')
<div class="wrapper">
  <div class="demo">
    <img src="../img/qqq.jpg" style="width: 100%; height: 300px; margin-top: -100px">
  </div>
  
  <div class="main">
    <div class="section section-nude">
        <div id="sliders-navigation">

          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">

              <ul id="tabs" class="nav nav-tabs" data-tabs="tabs" >
                <li class="active"><a href="#Equipment" data-toggle="tab">Equipment</a></li>
              @foreach($equipmenttype as $dd)
                <li><a href="#{{$dd->equipmentTypeName}}" data-toggle="tab">{{$dd->equipmentTypeName}}</a></li>
              @endforeach
              </ul>

            </div>
          </div>
            
          <div id="my-tab-content" class="tab-content text-center">
            <div class="tab-pane active" id="Equipment"  style=" height: 500px">
              <img src="{{ asset('img/' . 'eq.jpg') }}" class="col-md-12" > 
            </div>
          @foreach($equipmenttype as $dd)
            <div class="tab-pane" id="{{$dd->equipmentTypeName}}">
              <div class="row" align="center">

              
              @foreach($equipment as $dishh)
              @if($dd->equipmentTypeID == $dishh->equipmentTypeID)
                <div class="col-sm-4">
                  <img src="{{ asset('img/' . $dishh->equipmentImage) }}" style="width: 350px; height: 200px"> <br>
                  <h5> {{$dishh->equipmentName}} </h5>
                </div>
              @endif
              @endforeach
            
         
               
              </div>
            </div> 
          @endforeach

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
</div>
@endsection