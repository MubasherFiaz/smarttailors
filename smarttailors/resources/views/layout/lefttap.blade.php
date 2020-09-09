<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Smart Tailors | @yield('title') </title>
   <link rel="icon" href="{{asset('public/frontend/image/only_logo.png')}}" type="image/x-icon" />
    <!-- Bootstrap -->
    <link href="{{asset('public/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
     <link href="{{asset('public/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('public/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('public/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('public/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('public/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="{{asset('public/build/css/custom.min.css')}}" rel="stylesheet">
    <style type="text/css">
      .left_col {
    background: #331118 !important;
}
.body {
    color: #331118 !important;
    background: #331118 !important;
    }
    .nav_title {
   
    background: #EDEDED !important;
  }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style=" border-right: 10 ; border-color: #331118">
              <a href="/" class="site_title"><img style="margin-top: -5px; width: 200px;
    height: 74px;" src="{{asset('public/frontend/image/plogo.png')}}" alt="Logo"><img style="margin-top: -5px; max-width: 100%;
    height: 66px;" src="{{asset('public/frontend/image/smart_tailors.png')}}" alt="Logo"></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                
                <?php
                if (Auth::user()->img=='') {
                  ?>
                  <img src="{{asset('public/images/img1.jpg')}}" alt="..." class="img-circle profile_img">
                 <?php
                }else{
                ?>
                <img src="{{asset('public/images/'.Auth::user()->img)}}" alt="..." class="img-circle profile_img">
                <?php
              }
                ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              
                <ul class="nav side-menu" >
                     <?php
                          if (Auth()->user()->role=="tailor") {
                            ?>

  <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a> </li>
<li><a href="{{url('message')}}"><i class="fa fa-comments"></i>Messages</a> </li>


<li><a href="{{url('order')}}"><i class="fa fa-shopping-cart"></i>Order</a> </li>
<li><a href="{{url('pricing')}}"><i class="fa fa-money"></i>Pricing</a> </li>


<li><a href="{{url('gallery')}}"><i class="fa fa-image"></i>Profile</a> </li>
<li><a href="{{url('tailors')}}"><i class="fa fa-users"></i>All Tailors</a> </li>
<li><a href="{{url('profile')}}"><i class="fa fa-cogs"></i>Settings</a> </li>  
               <?php    
                          }
                          if (Auth()->user()->role=="custumer") {
                    ?>
<li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a> </li>
<li><a href="{{url('message')}}"><i class="fa fa-comments"></i>Messages</a> </li>
<li><a href="{{url('custumer-measurements')}}"><i class="fa fa-male"></i>Measurements</a> </li>
<li><a href="{{url('tailors')}}"><i class="fa fa-users"></i>All Tailors</a> </li>

<li><a href="{{url('our-order')}}"><i class="fa fa-shopping-cart"></i>Order</a> </li>
<li><a href="{{url('profile')}}"><i class="fa fa-cogs"></i>Settings</a> </li>
<?php    
                          }
                          if (Auth()->user()->role=="admin") {
                    ?>
<li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a> </li>
<li><a href="{{url('all-custumer')}}"><i class="fa fa-users"></i>Custumer</a> </li>
<li><a href="{{url('all-tailors')}}"><i class="fa fa-users"></i>Tailors</a> </li>

<li><a href="{{url('tailors')}}"><i class="fa fa-users"></i>All Tailors</a> </li>

<li><a href="{{url('measurement-setting')}}"><i class="fa fa-male"></i>Measurement Settings</a> </li>
<li><a href="{{url('profile')}}"><i class="fa fa-cogs"></i>Settings</a> </li>

<?php
}
?>                    
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
         
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                       <?php
                if (Auth::user()->img=='') {
                  ?>
                  <img src="{{asset('public/images/img1.jpg')}}" alt="..." >
                 <?php
                }else{
                ?>
                <img src="{{asset('public/images/'.Auth::user()->img)}}" alt="..." >
                <?php
              }
                ?>{{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{url('gallery')}}"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span> Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;"> Help</a></li>
                   
                    
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
   @csrf
                                    </form>
                                                      <i class="fa fa-sign-out pull-right"></i>  Log Out </a></li>
                  </ul>
                </li>

           <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    @foreach($users as $user)

@if($user->unread!=0)
<span class="badge bg-green">
                    {{$user->unread}}
                     </span>
                        @endif
                  @endforeach
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    @foreach($users as $user=> $value)
@if($value->unread!=0)
                    <li>
                      <a>
                        <span class="image">
                          @if($value->img=='')
                          <img src="{{asset('public/images/img1.jpg')}}" alt="Profile Image" />
                          @else
                          <img src="{{asset('public/images/'.$value->img)}}" alt="Profile Image" />
                          @endif
                        </span>
                        <span>
                          <span>{{$value->name}}</span>
                         
                        </span>
                        <span class="message">
                          {{$value->city}} |
                         {{$value->email}}
                        </span>
                      </a>
                    </li>  
                     @endif
 @endforeach                  
                    <li>
                      <div class="text-center">
                        <a  href="{{url('message')}}">
                          <strong>See All Messages</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
         <div class="right_col" role="main">
 @yield('contents')
          </div>


              <footer>
          <div class="pull-right">
            {{ Auth::user()->name }}
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->

<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>


        <script>
                        CKEDITOR.replace( 'description' );
                </script> 

    <script src="{{asset('public/vendors/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('public/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('public/vendors/fastclick/lib/fastclick.js')}}"></script>
    <script src="{{asset('public/bootbox.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('public/vendors/nprogress/nprogress.js')}}"></script>
  
    <!-- jQuery Sparklines -->
    <script src="{{asset('public/vendors/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- morris.js')}} -->
    <script src="{{asset('public/vendors/raphael/raphael.min.js')}}"></script>
    
    <!-- gauge.js')}} -->
   
    <!-- bootstrap-progressbar -->
    <script src="{{asset('public/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('public/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('public/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('public/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('public/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('public/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('public/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('public/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('public/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('public/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('public/vendors/DateJS/build/date.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('public/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('public/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('public/build/js/custom.min.js')}}"></script>

  </body>
</html>