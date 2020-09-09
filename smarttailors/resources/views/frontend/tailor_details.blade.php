@extends('frontend.layout.layout') 
@section('title','| Tailor Details')
@section('contents')

<style type="text/css">
  .fb_iframe_widget {
    overflow: hidden;
}

.fb_iframe_widget span {
    margin-bottom: -30px;
}
</style>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=593286858002757&autoLogAppEvents=1" nonce="PxeMTqRj"></script>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<style>
  img.avatar {
    transition:transform 0.25s ease;
}

img.avatar:hover {
    -webkit-transform:scale(4.5);
    transform:scale(4.5);
}
img.avatar, ul.messages li img.avatar {
    height: 32px;
    width: 32px;
    float: left;
    display: inline-block;
    border-radius: 2px;
    padding: 2px;
    background: #f7f7f7;
    border: 1px solid #e6e6e6;
}
#map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
       .imgee {
   
    top: 45px !important;
}
.sitebtn {
    display: inline-block;
    border: 1px solid #FF5476;
    border-radius: 3px;
    font-size: 18px;
    font-weight: 600;
    min-width: 188px;
    padding: 15px 25px;
    border-radius: 3px;
    text-transform: uppercase;
    background: #331118;
    color: black;
    line-height: normal;
    cursor: pointer;
    text-align: center;
    margin-top: 30px;
}
.dataTables_length{
    display: none;
}
 .dataTables_paginate {
    display: none;

 }
 .navbar {
   position: absolute !important;

}
</style>
    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
       <div class="imgee">

                            <a href="" class="notify-badge">Level {{$user->rating}}</a>
                           
                                <img src="{{asset('public/images/'.$user->img)}}">
                           

                        </div>
                        <br><br>
                        <br><br>
        <h2>
            {{$user->name}} <br>
                        {{$user->f_name}} {{$user->l_name}}</h2>

    </section>
    <!-- End Banner area -->

    <!-- About Us Area -->
    <section class="about_us_area row">
        <div class="container">
   @if(session('message'))
   <br><br>
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{session('message')}}.
  </div>
@endif 
 @if(session('error'))
 <br><br>
  <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error! </strong> {{session('error')}}.</div>
@endif  
@if( count($errors) > 0)
<br><br>
       @foreach ( $errors->all() as $error)
       <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error! </strong> {{ $error  }}.</div>
        @endforeach
        @endif           
            <div class="row about_row">
                <div class="col-md-5 col-sm-6 about_client about_pages_client">
                    <!-- Slider area -->
    <section class="slider_area row m0">
        <div class="slider_inner">

            @if(!empty($imgs->img))
             @foreach($imgs as $i)
            <div data-thumb="{{asset('public/images/$i->img')}}" data-src="{{asset('public/images/$i->img')}}" class="shrt">
                <div class="camera_caption">
                    <div class="container">
                        <h5 class="fadeInUp animated">{{$i->description}}</h5>
                       

                      
                    </div>
                </div>
            </div>
           @endforeach
           @else
            <div data-thumb="{{asset('public/frontend/image/Second.jpg')}}" data-src="{{asset('public/frontend/image/Second.jpg')}}" class="shrt">
                <div class="camera_caption">
                    <div class="container">
                        <h5 class="fadeInUp animated">{{$user->name}}</h5>
                       

                      
                    </div>
                </div>
            </div>
            <div data-thumb="{{asset('public/frontend/image/47.jpg')}}" data-src="{{asset('public/frontend/image/47.jpg')}}">
                <div class="camera_caption">
                    <div class="container">
                        <h5 class="fadeInUp animated">{{$user->name}}</h5>
                       

                      
                    </div>
                </div>
            </div>
           @endif
        </div>
    </section>
    <!-- End Slider area -->
                </div>
                <div class="who_we_area col-md-7 col-sm-6">
                    <div class="subtittle">
                        <h2>About {{$user->name}}</h2>
                    </div>
                    <p> {{$user->description}}</h2>
                    </div>
                    <div class="subtittle">
                        <h2>Address</h2>
                    </div>
                    <p> {{$user->address}}.</p>
                    <div class="subtittle">

                        @guest
           
 <div class="text-center pt-3">
                <a href="{{url('login')}}" class="site-btn sb-big">Login To Contact Tailors!</a>
            </div>
                        @else
                        @if($user->id == auth()->user()->id)
                        
                        @else
                        
                         <div class="text-center pt-3">
                       
                <a type="button"
data-toggle="modal" data-target="#myModal" class="site-btn sb-big">Place Order</a>
            </div>
            
                        @endif
                        @endguest
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="about_us_area row">
        <div class="container">
       <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   
                  <div class="x_title">
                   <center> <h2>Pricing Details</h2> </center>
                    
                  </div>
                  <div class="x_content">

                    <table id="example1" class="table" >
                      <thead>
                        <tr>
                                   
                                   
                                    <th>Category Name</th>
                                    <th>Image</th>
                                    <th >Price</th>
                                    

                                </tr>
                      </thead>
                      <tbody>
                                                 
    @foreach($pricing as $p)

<tr>
                                
                              
                                <td>{{$p->c_name}}</td>
                                 <td><img src="{{asset('public/tailor_imgs/images/')}}/{{$p->image}}" class="avatar" >  </td>                             
                                    <td>@if($p->price=='')
           Price Not Available 
           @else
         {{$p->price}}  Rs Only
           @endif</td>
                                              

                                </tr>
                
    @endforeach  
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
        </div>
    </section><br>
   <div class="container">
    <h4><center>Customer Feedbacks and Remarks</center></h4>
<div class="fb-comments" data-href="http://localhost/fyp/smarttailors/tailor/{{$user->id}}" data-numposts="5" data-width="100%"></div></div> 
    <br>
    <br>
    <center><h3>Shop Location of {{$user->name}}</h3></center>
    <br>
 <div id="map"></div>
    <!-- End About Us Area -->

    <!-- call Area -->

    </section>
    <!-- End About Us Area -->
<!-- <div class="container" id="disqus_thread" onload="hide()"></div>
 -->

<!-- <script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = '{{ Request::url()}}';  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = '{{$user->id}}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://smart-12.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();

</script> -->

                            
    <!-- call Area -->
    <section class="call_min_area">
        <div class="container">
            <h2>{{$user->phone_number}}</h2>
                        @guest
            <p>Contact With Them</p>

            <div class="text-center pt-3">
                <a href="{{url('login')}}" style="background-color: white !important; margin-top: 10px !important" class="site-btn sb-big">Login To Contact Tailors!</a>
            </div>

                        @else
                        @if($user->id==auth()->user()->id)
                        @else
            <p>Contact With Them</p>

            <div class="call_btnn">

                <a href="{{url('login')}}" class="button_all">Chat With {{$user->f_name}}</a>
                <a href="{{url('contact-us')}}" class="button_all">Place Order</a>
            </div>
                        @endif
                        @endguest


        </div>
    </section>   
    <!-- End call Area -->
      <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Place An Order</h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('add-order')}}" enctype="multipart/form-data">
                @csrf
    
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="date">Delivered Date</label>
                    <input type="date" min="<?php echo date("Y-m-d"); ?>" name="data" id="date" class="form-control" required>
                  </div>   
                   <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="category">Select Cloths</label>
                    <br>
                        @foreach($pricing as $c)
  <input  type="checkbox" name="category[]" class="check-cls"  value="{{$c->cat_id}}" class="flat" />

                    
           {{$c->c_name}} (Price : @if($c->price=='')
           Price Not Available 
           @else
           {{$c->price}} Rs Only
           @endif
           )
<br>
                        @endforeach                  
                 
                
                  </div>                 
                  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="note">Payment Method</label>
                  <select name="payment_method" class="form-control">
                    <option value="Advance Payment">Advance Payment</option>

                    <option value="Cash On Delivery">Cash On Delivery</option>
                    <option value="Bank Payment">Bank Payment</option>
                  </select>
                  </div>        
                   <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="note">Delivery Method</label>
                  <select name="delivery_method" class="form-control">
                    <option value="On Shop">On Shop</option>

                    <option value="On Home">On Home</option>
                    
                  </select>
                  </div>


                     <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="note">Note / Description</label>
                    <textarea type="text" name="note" id="note" class="form-control" ></textarea> 
                    
                    <input type="hidden" value="{{$user->id}}" name="tailor_id" class="form-control" required>
                   
                         
                    
                  </div>
                 
              
        </div>
        <div class="modal-footer">
         
          <button type="submit" class="submit-btn btn btn-success" disabled>Submit</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div></form>
      </div>
      
    </div>
  </div>
 <script>
    $(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Blfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );   
 function hide(){
  
  $(".disqus-footer").hide();
}

  var checkboxes = $(".check-cls"),
    submitButt = $(".submit-btn");

checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
});
// Initialize and add the map
function initMap() {
  var lat = <?php echo $user->lat ?>;
  var lng = <?php echo $user->lng ?>;
  var loc = {lat: lat, lng: lng};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 11, center: loc});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: loc, map: map});
}
    </script>
     <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjmHG4Cvs2Z5IgBPbdrT0hW3Hhrys5F9E&callback=initMap">
    </script>

@endsection
