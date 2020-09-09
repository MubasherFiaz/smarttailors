@extends('layout.lefttap') 
@section('title','Dashboard')
@section('contents')
      
   


          <div class="container">
            <div class="row top_tiles">
          <h1>Welcome {{Auth::user()->name}}</h1>

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count">{{$custumers}}</div>
                  <h3>Total Custumers</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count">{{$tailor}}</div>
                  <h3>Total Tailors</h3>
                 
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-shopping-cart"></i></div>
                  <div class="count">{{$orders}}</div>
                  <h3>Total Orders</h3>
                
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count">{{$completed_orders}}</div>
                  <h3>Completed Orders</h3>
               
                </div>
              </div>
            </div>
          <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                  <div class="count">{{$pending_orders}}</div>
                  <h3>Pending Orders</h3>
                 
                </div>
              </div>
           
            </div>



          </div>
         



@endsection