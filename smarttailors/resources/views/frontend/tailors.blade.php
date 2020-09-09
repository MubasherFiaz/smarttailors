@extends('frontend.layout.layout') 
@section('title','| Nearest Tailors')
@section('contents')
     <style>
       @media (max-width:600px){
         .mgt50px{
           margin-top: 30px;
         }
       }
     </style>

    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Nearest Tailors </h2>

    </section>
    <!-- End Banner area -->
   <!-- Our nearest tailor Area -->
   


   

  <!-- Nearest-->
    <section class="">

        <div class="container">
            <div class="row col-3 col-sm-3 mgt50px" style="background-color: #eee6e6; margin-right: 5%;">
              <br>  
                  <h5 style="margin-left: 3%; color: #fff; background-color: #e7ab3c; display: flex; justify-content: center; text-align: center;">Search By Location</h5>  
                  <form style="margin-left: 2%">
    <label class="radio-inline" id="rates">
      <input type="radio" value="all" name="location" onclick="get_rec()">All Tailors
    </label><br>
    <label class="radio-inline">
      <input type="radio" value="n_b" onclick="get_rec()" name="location" checked> Nearby Tailors
    </label><br><br>
   
  </form>       <h5 style="margin-left: 3%; color: #fff; background-color: #e7ab3c; display: flex; justify-content: center; text-align: center;">Search By Rates</h5>  
                  <form style="margin-left: 2%">
    <label class="radio-inline" id="rates">
      <input type="radio" value="all" name="rates" onclick="get_rec()" checked>All
    </label><br>
    <label class="radio-inline">
      <input type="radio" value="l_p" onclick="get_rec()" name="rates"> Lower Price
    </label><br>
    <label class="radio-inline">
      <input type="radio" value="m_p" onclick="get_rec()" name="rates">Mediam Price
    </label>  <br> 
     <label class="radio-inline">
      <input type="radio" value="h_p" onclick="get_rec()" name="rates">Higher Price
    </label><br>
  </form>                

              <br>  
    <h5 style="margin-left: 3%; color: #fff; background-color: #e7ab3c; display: flex; justify-content: center; text-align: center;">Search By Tailors</h5>  
                  <form style="margin-left: 2%">
    <label class="radio-inline">
      <input type="radio" value="all" name="type" onclick="get_rec()" checked>All
    </label><br>
    <label class="radio-inline">
      <input type="radio" value="g_t" name="type" onclick="get_rec()"> Gents Tailors
    </label><br>
    <label class="radio-inline">
      <input type="radio" value="l_t" name="type" onclick="get_rec()"> Ladies Tailors
    </label>  <br> 
    
  </form>             

             <br>  
    <h5 style="margin-left: 3%; color: #fff; background-color: #e7ab3c; display: flex; justify-content: center; text-align: center;">Search By Availability</h5>  
                  <form style="margin-left: 2%">
    <label class="radio-inline">
      <input type="radio" value="all" name="availability" onclick="get_rec()" checked>All
    </label><br>
    <label class="radio-inline">
      <input type="radio" value="f_t" name="availability" onclick="get_rec()">Full Time Tailors 
    </label><br>
    <label class="radio-inline">
      <input type="radio" value="p_t" name="availability" onclick="get_rec()">Part Time Tailors
    </label>  <br> 
    
  </form>            

             <br>  
    <h5 style="margin-left: 3%; color: #fff; background-color: #e7ab3c; display: flex; justify-content: center; text-align: center;">Search By Delivery</h5>  
                  <form style="margin-left: 2%">
    <label class="radio-inline">
      <input type="radio" value="both" name="delivery" onclick="get_rec()" checked>Both
    </label><br>
    <label class="radio-inline">
      <input type="radio" value="h_d" name="delivery" onclick="get_rec()">Home Delivery Available
    </label><br>
 
    
  </form>

  <br><br>
            </div>

            <div class="row col-8 col-sm-8" style="background-color: white;" id="s_tailors">
                <div class="row mgt50px" >
            @foreach($shops as $s)
                    <div class="column" style="margin-top: 100px;background-color: #e7ab3c;">

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
</div>

    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
         function get_rec() {
         //   alert("jy");


     //e.preventDefault();
      var rates = $("input[type=radio][name='rates']:checked").val();
      var type = $("input[type=radio][name='type']:checked").val();
      var delivery = $("input[type=radio][name='delivery']:checked").val();
      var availability = $("input[type=radio][name='availability']:checked").val();
      var location = $("input[type=radio][name='location']:checked").val();
     
      $.ajax({
        type: "POST",
        url: "get-tailors",
        data:  {
        "_token": "{{ csrf_token() }}",
        "rates": rates,
        "type": type,
        "delivery": delivery,
        "availability": availability,
        "location": location,
             },
        success: function (data){
        $('#s_tailors').html(data);
        $('#alert').html(data);

         

        },
        error: function(error)
        {
        $('#alert').html(error);
          console.log(error);
        }
      });
}
    </script>
<br><br>
@endsection
