@extends('layout.lefttap') 
@section('title','Dashboard')
@section('contents')
     
          <div class="container">
            <div class="row top_tiles">
          <h1>Welcome {{Auth::user()->name}}</h1>

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
           
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-spinner"></i></div>
                  <div class="count">{{$assigned}}</div>
                  <h3>Total Assigned Orders</h3>
               
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-suitcase"></i></div>
                  <div class="count">{{$ready}}</div>
                  <h3>Total Ready Orders</h3>
                 
                </div>
              </div>
            </div>
          <div class="row top_tiles">
              
                   
         
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-upload"></i></div>
                  <div class="count">{{$delivered}}</div>
                  <h3>Total Delivered Orders</h3>
                 
                </div>
              </div>
           
            </div>



          </div>
         



@endsection