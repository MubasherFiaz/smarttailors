@extends('auth.layout') 
@section('title','Login')
@section('contents')
<script>
    function showPosition() {
       
            navigator.geolocation.getCurrentPosition(function(position) {
                var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
                document.getElementById("result").innerHTML = positionInfo;
            });
        
    }
</script>


 <link rel="stylesheet" href="{{asset('public/frontend/css/choser.css')}}">
<style type="text/css">
    .choser_cont .userse .usersec a {
    margin-top: 0px !important;
}
</style>
     <div class="container choser_cont">

        <div class="row userse" style="margin-top: 0px">
                <center><h2>Register As A</h2></center>
<br>  <div id="result">
        <!--Position information will be inserted here-->
    </div>
           <!-- <button type="button" onclick="showPosition();">Show Position</button>
            -->  <div class="col-sm-5 col-lg-5 mrg">
                <div class="usersec">

                    <a href="{{url('register-as-user')}}"><i class="fa  fa-user-circle-o"style="color: #e7ab3c; aria-hidden="true"></i></a>


                    <div class="seting">

                        <a href="{{url('register-as-user')}}">
                            <h5>User</h5>

                        </a>
                    </div>
                </div>



            </div>



            <div class="col-sm-5 col-lg-5 mrg">

                <div class="usersec">

                    <a href="{{url('register-as-tailor')}}"><i class=" fa  fa-universal-access" aria-hidden="true" style="color: #e7ab3c;"></i></a>
                    <div class="seting">

                        <a href="{{url('register-as-tailor')}}">
                            <h5>Tailor</h5>
                        </a>
                    </div>

                </div>



            </div>


        </div>


    </div>


    <section>


        <div class="regset">
            <h4>Already Registered <a href="{{url('login')}} " style="color: #e7ab3c;">Login?</a> </h4>
        </div>
    </section>



                @endsection
