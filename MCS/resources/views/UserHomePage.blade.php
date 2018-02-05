@extends('layouts.userResUI')

@section('content')
<div class="wrapper">
    <div class="demo-header demo-header-image">
        <div class="motto">
            <h2 class="title-uppercase">Explore great tasting food</h2>
            <h3>Thank you for choosing MCR & Events Planning. We are <br> here to assist you in planning your successful event. <br> Event planners will help you reserve venues and create <br> menus to satisfy your guest needs.</h3>
        </div>
    </div>

    <div id="carousel">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel slide" data-ride="carousel">

              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="../img/5.jpg" alt="Awesome Image">
                </div>
                <div class="item">
                  <img src="../img/3.jpg" alt="Awesome Image">
                </div>
                <div class="item">
                  <img src="../img/4.jpg" alt="Awesome Image">
                </div>
                <div class="item">
                  <img src="../img/1.jpg" alt="Awesome Image">
                </div>
                <div class="item">
                  <img src="../img/7.jpg" alt="Awesome Image">
                </div>
              </div>
            
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="fa fa-angle-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="fa fa-angle-right"></span>
              </a>
            </div>
        </div> <!-- end carousel -->
        
    </div> <!-- end wrapper -->

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