@extends('frontend.layout.layout') 
@section('title','')
@section('contents')

    <style>
        .co {
            height: 450px;
        }
        #map {
            width: 100%;
            height: 100%;
            border: 1px solid #e7ab3c;
        }
        #data, #allData {
            display: none;
        }
        @media all and (min-width:0px) and (max-width: 620px) {
  /* put your css styles in here */

#marg{
    margin-bottom: 850px;

}
}
    </style>


    <!-- Slider area -->
    <section class="slider_area row m0">
        <div class="slider_inner">
           
            <div data-thumb="{{asset('public/frontend/image/hero-2.jpg')}}" data-src="{{asset('public/frontend/image/hero-2.jpg')}}">
                <div class="camera_caption">
                    <div class="container">
                        <h5 class=" wow fadeInUp animated">Welcome to Smart Tailor</h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s"> STITCHING AT YOUR DOORSTEP </h3>

                        <a class="site-btn sb-big" data-wow-delay="1s" href="{{URL::to('/')}}/public/SmartAll.apk" target="_blank">Get Android App</a>
                    </div>
                </div>
            </div>
            <div data-thumb="{{asset('public/frontend/image/f2.jpg')}}" data-src="{{asset('public/frontend/image/f2.jpg')}}">
                <div class="camera_caption">
                    <div class="container">
                      
                    </div>
                </div>
            </div>
            <div data-thumb="{{asset('public/frontend/image/second.jpg')}}" data-src="{{asset('public/frontend/image/second.jpg')}}" class="shrt">
                <div class="camera_caption">
                    <div class="container">
                        
                    </div>
                </div>
            </div>
            <div data-thumb="{{asset('public/frontend/image/p10.jpg')}}" data-src="{{asset('public/frontend/image/p10.jpg')}}">
                <div class="camera_caption">
                    <div class="container">
                     
                    </div>
                </div>
            </div>
            <div data-thumb="{{asset('public/frontend/image/f2.jpg')}}" data-src="{{asset('public/frontend/image/f2.jpg')}}">
                <div class="camera_caption">
                    <div class="container">
                       
                    </div>
                </div>
            </div>
            <div data-thumb="{{asset('public/frontend/image/hero-1.jpg')}}" data-src="{{asset('public/frontend/image/hero-1.jpg')}}">
                <div class="camera_caption">
                    <div class="container">
                    
                    </div>
                </div>
            </div>
            <div data-thumb="{{asset('public/frontend/image/f3.jpg')}}" data-src="{{asset('public/frontend/image/f3.jpg')}}">
                <div class="camera_caption">
                    <div class="container">
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Slider area -->

    <!-- Professional Builde -->
    <section class="professional_buil row">
        <div class="container">
            <div class="row buil_all">

                <div class="col-md-4 col-sm-4 buil">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <h4>UNIQUENESS</h4>
                    <p>Matchless Designer Gallery. No Compromise on Quality.</p>
                </div>
                <div class="col-md-4 col-sm-4 buil">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <h4>TIME MANAGEMENT</h4>
                    <p> "Time isn't the Main Thing. It is the only Thing." </p>
                </div>
                <div class="col-md-4 col-sm-4 buil">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    <h4>PASSIONATE</h4>
                    <p>Registered and Verified Tailors Only </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Professional Builde -->

    <!-- About Us Area -->

    <!-- End About Us Area -->
    <section class="why-section spad">
        <div class="container">
            <div class="text-center mb-5 pb-4">
                <h4>Why Choose us?</h4>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="icon-box-item">
                        <div class="ib-icon">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                        </div>
                        <div class="ib-text">
                            <h5>EFFECTIVE SELECTION</h5>
                            <p>Through this platform Customers will be able to choose their nearest located tailor
                                which is a matchless facility because other forums in this era are for one tailor shop
                                only.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="icon-box-item">
                        <div class="ib-icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="ib-text">
                            <h5>Expert Tailors & Designers</h5>
                            <p> All tailors here are registered and verified. You can make a
                                comparison among tailors on the basis of Price, user reviews and ratings. </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="text-center pt-3">
                <a href="{{url('tailors')}}" class="site-btn sb-big">Order Now!</a>
            </div>
        </div>
    </section>
    <!-- What ew offer Area -->

 <!-- Banner Section Begin -->
<!--  <div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="{{asset('public/frontend/image/banner-1.jpg')}}" alt="">
                    <div class="inner-text">
                        <h4>Men’s</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="{{asset('public/frontend/image/banner-2.jpg')}}" alt="">
                    <div class="inner-text">
                        <h4>Women’s</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="{{asset('public/frontend/image/banner-3.jpg')}}" alt="">
                    <div class="inner-text">
                        <h4>Kid’s</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Banner Section End -->
    <!-- ******************header parts start *******************-->

    <!-- Our nearest tailor Area -->
    <section class="" id="smartfeature">

        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-12">
                    <h1> <center>Nearest Tailor</center></h1>
                </div>


            </div>

    </section>


   

  <!-- Nearest-->
    <section class="team" id="marg">

        <div class="container">

            <div class="row ">
                <div class="row mgt50px">
            @foreach($shops as $s)
                    <div class="column" style="background-color: #e7ab3c;">

                        <div class="imgee">

                            <a href="{{url('tailor/'.$s->name)}}" class="notify-badge">Level {{$s->rating}}</a>
                            <a href="{{url('tailor/'.$s->name)}}">
                                <img src="{{asset('public/images/'.$s->img)}}">
                            </a>

                        </div>
                        <div class="loc">
                            <a href="{{url('tailor/'.$s->name)}}">
                                <h5>{{$s->city}}</h5>
                            </a>
                        </div>
                        <div class="detai">
                            <h3>{{$s->name}}<br><span>Tailor</span>
                                <p>{{$s->address}}</p>
                            </h3>
                            <ul>
                                <li><a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i> </a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>

                    </div>
            @endforeach
                  

                    <div style="clear: both;"></div>

                </div>

            </div>

    </section>


    <!-- map Area -->

    <section class="header-extra-d">

        <div class="container co">


            @include('frontend.map.education')

        <center><h1>Check all Tailors in Map</h1></center>
        <?php 

           
            $edu = new education;
            $coll = $edu->getCollegesBlankLatLng();
            $coll = json_encode($coll, true);
            echo '<div id="data">' . $coll . '</div>';

            $allData = $edu->getAllColleges();
            $allData = json_encode($allData, true);
            echo '<div id="allData">' . $allData . '</div>';            
         ?>



        <div id="map"></div>
   </div>

    </section>
<br><br><br><br><br><br>

    <!-- End Our Map Area -->


    <!-- Our Achievments Area -->
    <section class="our_achievments_area" background-ratio="0.2">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h3>Our Achievments</h3>
                <h5>More than 1,000 of cloths make and design</h5>
            </div>
            <div class="achievments_row row">
                <div class="col-md-4 col-sm-4 p0 completed">
                    <i class="fa fa-connectdevelop" aria-hidden="true"></i>
                    <span class="counter">800</span>
                    <h5>Complete Order</h5>
                </div>
                <div class="col-md-4 col-sm-4 p0 completed">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span class="counter">500</span>
                    <h5>Happy User</h5>
                </div>
                <div class="col-md-4 col-sm-4 p0 completed">
                    <i class="fa fa-child" aria-hidden="true"></i>
                    <span class="counter">300</span>
                    <h5>Working On</h5>
                </div>

            </div>
        </div>
    </section>

<script type="text/javascript">
    var map;
var geocoder;

function loadMap() {
    var pune = {lat: 33.72148, lng: 73.04329};
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 9,
      center: pune
    });

    var marker = new google.maps.Marker({
      position: pune,
      map: map
    });

    var cdata = JSON.parse(document.getElementById('data').innerHTML);
    geocoder = new google.maps.Geocoder();  
    codeAddress(cdata);

    var allData = JSON.parse(document.getElementById('allData').innerHTML);
    showAllColleges(allData)
}

function showAllColleges(allData) {
    var infoWind = new google.maps.InfoWindow;
    Array.prototype.forEach.call(allData, function(data){
        var content = document.createElement('div');
        var strong = document.createElement('strong');
        
        strong.textContent = data.name;
        content.appendChild(strong);

        

        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(data.lat, data.lng),
          map: map
        });

        marker.addListener('mouseover', function(){
            infoWind.setContent(content);
            infoWind.open(map, marker);
        })
    })
}

function codeAddress(cdata) {
   Array.prototype.forEach.call(cdata, function(data){
        var address = data.name + ' ' + data.address;
        geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == 'OK') {
            map.setCenter(results[0].geometry.location);
            var points = {};
            points.id = data.id;
            points.lat = map.getCenter().lat();
            points.lng = map.getCenter().lng();
            updateCollegeWithLatLng(points);
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
    });
}

function updateCollegeWithLatLng(points) {
    $.ajax({
        url:"action.php",
        method:"post",
        data: points,
        success: function(res) {
            console.log(res)
        }
    })
    
}

</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjmHG4Cvs2Z5IgBPbdrT0hW3Hhrys5F9E&callback=loadMap">
</script>

@endsection