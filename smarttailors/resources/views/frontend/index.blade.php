@extends('frontend.layout.layout') 
@section('title','')
@section('contents')
      

    <!-- Slider area -->
    <section class="slider_area row m0">
        <div class="slider_inner">
            <div data-thumb="{{asset('public/frontend/image/Second.jpg')}}" data-src="{{asset('public/frontend/image/Second.jpg')}}" class="shrt">
                <div class="camera_caption">
                    <div class="container">
                        <h5 class=" wow fadeInUp animated">Welcome to Smart Tailor</h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s">FIND YOUR NEAREST TAILOR ONLINE</h3>

                        <a class=" wow fadeInUp animated" data-wow-delay="1s" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div data-thumb="{{asset('public/frontend/image/47.jpg')}}" data-src="{{asset('public/frontend/image/47.jpg')}}">
                <div class="camera_caption">
                    <div class="container">
                        <h5 class=" wow fadeInUp animated">Welcome to Smart Tailor</h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s"> STITCHING AT YOUR DOORSTEP </h3>

                        <a class=" wow fadeInUp animated" data-wow-delay="1s" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div data-thumb="{{asset('public/frontend/image/p10.jpg')}}" data-src="{{asset('public/frontend/image/p10.jpg')}}">
                <div class="camera_caption">
                    <div class="container">
                        <h5 class=" wow fadeInUp animated">Welcome to Smart Tailor</h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s"> CREATE YOUR OWN FASHION STYLE</h3>

                        <a class=" wow fadeInUp animated" data-wow-delay="1s" href="#">Read More</a>
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
                <a href="#" class="site-btn sb-big">Order Now!</a>
            </div>
        </div>
    </section>
    <!-- What ew offer Area -->


    <!-- ******************header parts start *******************-->

    <!-- Our nearest tailor Area -->
    <section class="header-extra-d " id="smartfeature">

        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-12">
                    <h1> Nearest Tailor</h1>
                </div>


            </div>

    </section>


    <div class="container nearestt">
        <ul>
            <li>
                <div class="had">
                    <h4>First</h4>
                </div>
                <div class="div tex">
                    <a href="#">
                        <p>Welcome</p>
                    </a>
                </div>
            </li>
            <li>
                <div class="had">
                    <h4>Second</h4>
                </div>
                <div class="div tex">
                    <a href="#">
                        <p>Welcome</p>
                    </a>
                </div>
            </li>
            <li>
                <div class="had">
                    <h4>Third</h4>
                </div>
                <div class="div tex">
                    <a href="#">
                        <p>Welcome</p>
                    </a>
                </div>
            </li>


        </ul>


    </div>



    <!-- map Area -->

    <section class="header-extra-d " id="smartfeature">

        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-12">
                    <h1> Map</h1>
                </div>
                <div class="map-det">
                    <h2 style="margin-top: 40px;"><mark><i class=" fa fa-1x fa fa-map-marker"
                                aria-hidden="true"></i></mark>
                        We are Here</h2>
                </div>

            </div>

    </section>


    <section class=" header-extra-d">

        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12  googlemaps col-lg-offset-1 col-sm-1 ">



                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106334.89925187966!2d72.77709477761451!3d33.6061969722294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df948974419acb%3A0x984357e1632d30f!2sRawalpindi%2C%20Punjab!5e0!3m2!1sen!2s!4v1587640970569!5m2!1sen!2s"
                        width="600" height="500" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
                </div>


            </div>

    </section>


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
    <!-- End Our Achievments Area -->


@endsection
