<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Smart Tailors @yield('title') </title>


    <!-- Favicon -->
    <link rel="icon" href="{{asset('public/frontend/image/only_logo.png')}}" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="{{asset('public/frontend/vendors/animate/animate.css')}}" rel="stylesheet">
    <!-- Icon CSS-->
    <link rel="stylesheet" href="{{asset('public/frontend/vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- Camera Slider -->
    <link rel="stylesheet" href="{{asset('public/frontend/vendors/camera-slider/camera.css')}}">
    <!-- Owlcarousel CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendors/owl_carousel/owl.carousel.css')}}" media="all">

    <!--Theme Styles CSS-->

    {{-- <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/style.css')}}" media="all" /> --}}

    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/stylees.css')}}" media="all" />

    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/team.css')}}" media="all" />

    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/nearest.css')}}" media="all" />

    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/stk.css')}}" media="all" />

    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/footer.css')}}" media="all" />

</head>
<style>
    .ggl{
        transform: translateY(-25px);
        
       
    }
    .hhr{
        transform: translateY(-65px);
        
    }
    .ccc{
        height: 80px;
        
        background-color:#f8f1f1f1;
        border-radius: 4px;
        box-shadow: none;
    }
   
    
    .ggll {
        transform: translateY(-110px);
        
    }
  
    @media (max-width:500px){
        .bgred{

        }
        .ggl{
            transform: translateY(-10px);

        }
        .ggll{
            transform: translateY(-70px);

        }
        .hhr{
        transform: translateY(-40px);
        
    }
    }
</style>
<body>
    <!-- Preloader -->
    <div class="preloader"></div>
    <div class="iconn-barr">
        <a href='https://www.facebook.com/usama.abbai.5' class='facebook ' target='_blank' style="background: #3b5998; text-decoration: none; color: white;">
            Facebook <i class=" fa fa-facebook-square"></i>
        </a>
        <a href='#' class='twitter ' target='_blank' style="background: #00aced; text-decoration: none; color: white;">
            Twitter<i class=" fa fa-twitter-square"></i>
        </a>

        <a href='https://www.instagram.com' class='instagram ' target='_blank'
            style="background: #e4405f; text-decoration: none; color: white;">
            Instagram<i class="fa fa-instagram"></i>
        </a>
        <a href='tel:03499744214' class='whatsapp ' target='_blank' style="background:#13e748; text-decoration: none; color: white;">
            Whatsapp<i class=" fa fa-whatsapp"></i>
        </a>
        <a href='https://www.youtube.com' class='youtube ' target='_blank'
            style="background:  #cd201f; text-decoration: none; color: white;">
            Youtube<i class=" fa fa-youtube-square"></i></a>
    </div>
    <!-- Top Header_Area -->
    <section class="top_header_area">
        <div class="container">
            <ul class="nav navbar-nav top_nav">
                <li><a href="#"><i class="fa fa-phone"></i>+92 3499744214</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i>smarttailor@gmail.com</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right social_nav">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true" title="Facebook" ></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true" title="Twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true" title="Google Plus"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true" title="Instagram"></i></a></li>

            </ul>
        </div>

    </section>
    <!-- End Top Header_Area -->

    <!-- Header_Area -->
    <nav class="navbar navbar-default header_aera" id="main_navbar">
        <div class="container">
            <!-- searchForm -->

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-md-2 p0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" style="background-color: none;" data-toggle="collapse"
                        data-target="#min_navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar" ></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="{{asset('public/frontend/image/newlogo.png')}}" alt="Logo"></a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="col-md-10 p0">
                <div class="collapse navbar-collapse" id="min_navbar">
                    <ul class="nav navbar-nav navbar-right">

                        <li><a style="text-decoration: none;" href="{{url('/')}}">Home</a></li>
                        <li><a style="text-decoration: none;" href="{{url('tailors')}}">Tailors</a></li>
                        <li><a style="text-decoration: none;" href="{{url('about-us')}}">About Us</a></li>
                        <li><a style="text-decoration: none;" href="{{url('our-working')}}">Works</a></li>
                        <li><a style="text-decoration: none;" href="{{url('contact-us')}}">Contact</a></li>
                        @guest

                        <li> <a style="text-decoration: none;" href="{{url('login')}}"><button class="butt">
                                    <h5>Login</h5>
                                </button></a></li>
                        @else
 <li >
                                <a style="text-decoration: none; " id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right ccc" aria-labelledby="navbarDropdown">
                                   <div class="ggl">
                                 
                                 
                                    <a  class="ccl" style="text-decoration: none;" href="{{ route('dashboard') }}"
                                       >
                                        Portal
                                   </a>
                                   <br>
                               
                                </div>
                                <hr class="hhr" style="color:black;">
                                    <form  action="{{ route('dashboard') }}" style="display: none;">
                                        @csrf
                                    </form>
                           
                                <div class="ggll">
                                    <a class="ccl "style="text-decoration: none;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </div>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest


                    </ul>


                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container -->
    </nav>

                    @yield('contents')


     <!-- Footer Area -->
    
     <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h5>About Us</h5>
                    </div>
                    <div class="footer-left">
                        <p style="color: white; font-size: 14px;">SmartTailor is a pioneer online stitching solution
                            Where Customers can
                            get information about
                            latest clothing trends and find their nearest located tailors online.</p>
                        <div class="footer-social">
                            <a href="#" title="Facebook" style="background-color: #3b5998;"><i class="fa fa-facebook " ></i></a>
                            <a href="#" title="Instagram"style="background-color: #e4405f;"><i class="fa fa-instagram"></i></a>
                            <a href="#" title="Twitter"style="background-color:  #00aced;"><i class="fa fa-twitter"></i></a>
                            <a href="#" title="Whatsapp"style="background-color: #13e748;"><i class="fa fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 ">
                    <div class="footer-widget">
                        <h5>Quick Links</h5>
                        <ul style="margin-left: -40px;">
                            <li><a href="{{url('privacy')}}"> Terms And Condition</a></li>
                            <li><a href="{{url('privacy')}}">Privacy Policy</a></li>
                            <li><a href="{{url('faq')}}">FAQ</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul style="margin-left: -40px;">
                            <li><a href="{{url('login')}}">My Account</a></li>
                            <li><a href="{{url('contact-us')}}">Contact</a></li>

                            <li><a href="{{url('tailors')}}">Order</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 footer_about">
                    <div class="right-col">
                        <h1>Our Newsletter</h1>
                        <div class="border"></div>
                        <p>Enter your Email to get Our news and Updates</p>

                        <form action="" class="newsletter-form">

                            <input type="text" class="txtb" placeholder="Enter Your Email" required>
                            <button type="submit" class="btntex">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script> All rights reserved | This
                            template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by
                            PMAS
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="{{asset('public/frontend/image/payment-method.png')}}" alt="">
                            <button onclick="topFunction()" id="myyBtn" title="Go to top"><i
                                    class="fa fa-arrow-up"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <!-- Footer Section End -->
    <script>


        mybutton = document.getElementById("myyBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () { scrollFunction() };

        function scrollFunction() {
            if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
    <!-- End Footer Area -->

    <!-- jQuery JS -->




    <script src="{{asset('public/frontend/js/jquery-1.12.0.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <!-- Animate JS -->
    <script src="{{asset('public/frontend/vendors/animate/wow.min.js')}}"></script>
    <!-- Camera Slider -->
    <script src="{{asset('public/frontend/vendors/camera-slider/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('public/frontend/vendors/camera-slider/camera.min.js')}}"></script>
    <!-- Isotope JS -->


    <script src="{{asset('public/frontend/vendors/Counter-Up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('public/frontend/vendors/Counter-Up/waypoints.min.js')}}"></script>
    <!-- Owlcarousel JS -->
    <script src="{{asset('public/frontend/vendors/owl_carousel/owl.carousel.min.js')}}"></script>
    <!-- Stellar JS -->
    <script src="{{asset('public/frontend/vendors/stellar/jquery.stellar.js')}}"></script>
    <!-- Theme JS -->
    <script src="{{asset('public/frontend/js/theme.js')}}"></script>
</body>

</html>