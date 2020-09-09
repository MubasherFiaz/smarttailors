@extends('frontend.layout.layout') 
@section('title','| About Us')
@section('contents')
     

    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>About Us</h2>

    </section>
    <!-- End Banner area -->

    <!-- About Us Area -->
    <section class="about_us_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>ABOUT US</h2>
                <h4>SMART TAILORS FOR ALL CUSTOMERS</h4>
            </div>
            <div class="row about_row">
                <div class="col-md-5 col-sm-6 about_client about_pages_client">
                    <img src="{{asset('public/frontend/image/49.jpg')}}" alt="">
                </div>
                <div class="who_we_area col-md-7 col-sm-6">
                    <div class="subtittle">
                        <h2>WHO WE ARE</h2>
                    </div>
                    <p> SmartTailor is a pioneer online stitching solution
                        Where Customers can get information about latest clothing trends and find their nearest located
                        tailors online.
                        SmartTailor believes in sole customer satisfaction
                        by providing door-step collection and delivery services. You
                        need just to place order & SmartTailor representative will
                        be at your premises for Measurements verification & fabric collection. Rest will be served
                        at SmartTailor & within 72 hours high-quality stitching will be back in your hands.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="about_us_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Mission</h2>
                <h4>SMART TAILORS FOR ALL CUSTOMERS</h4>
            </div>
            <div class="row about_row">

                <div class="who_we_area col-md-7 col-sm-6">

                    <p> SmartTailor aim to provide finest tailoring
                        with state of the art facilities in stipulated time just
                        on Clicks. Customers Can Select tailors on the basis of comparison which is a very good
                        facility. Designers Galleries are updated regularly
                        based on latest trends.</p>

                </div>
                <div class="col-md-5 col-sm-6 about_client about_pages_client">
                    <img src="{{asset('public/frontend/image/p60.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- End About Us Area -->

    <!-- call Area -->

    </section>
    <!-- End About Us Area -->

    <!-- call Area -->
    <section class="call_min_area">
        <div class="container">
            <h2>+92 110045678</h2>
            <p>Contact With Us</p>
            <div class="call_btnn">
                <a href="{{url('login')}}" class="button_all">GET IN TOUCH</a>
                <a href="{{url('contact-us')}}" class="button_all">Contact Now</a>

            </div>
        </div>
    </section>
    <!-- End call Area -->

    <!-- Our Features Area -->
@endsection
