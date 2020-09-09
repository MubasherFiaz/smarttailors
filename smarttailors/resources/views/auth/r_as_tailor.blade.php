 @extends('auth.layout') 
@section('title','Register As User | Smart Tailors')
@section('contents')
    <link rel="stylesheet" href="{{asset('public/frontend/css/regestr.css')}}">

 <div class="wrap">
        <div class="titt" style="background-color:  #e7ab3c;">

            Registration Form
        </div>

      <form method="POST" action="{{route('register-as-tailor')}}" class="register-form" id="login-form" enctype="multipart/form-data">

                        @csrf


           <div class="form">
                  <div class="inpt_field">

                    <label>Shop Name</label>
                  <input id="name" type="text" class="inpt @error('name') is-invalid @enderror" placeholder="" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')


                                    <span class="invalid-feedback" role="alert" style="margin-bottom: 5%">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror

                </div>
                <div class="inpt_field">

                    <label> Tailor Name</label>
                    <input type="text " class="inpt  @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder=" " required>
                    @error('first_name')


                                    <span class="invalid-feedback" role="alert" style="margin-bottom: 5%">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror

                </div>
                <div class="inpt_field">

                    <label> Tailor Surname</label>
                    <input type="text " class="inpt  @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder=" " required>
                    @error('last_name')


                                    <span class="invalid-feedback" role="alert" style="margin-bottom: 5%">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror
                    <input type="hidden" value="tailor" class="inpt" name="role" required>

                </div>              
               
                   <div class="inpt_field">

                    <label>Email Address</label>
                     <input id="email" type="email" class="inpt @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="">

                                @error('email')


                                    <span class="invalid-feedback" role="alert" style="margin-bottom: 5%">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror
                </div>
                <div class="inpt_field">

                    <label> Password</label>
                     <input id="password" type="password" class="inpt @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="">

                </div>                
                
                <div class="inpt_field">
                    <label> Confirm Password</label>
                  <input id="password-confirm" type="password" class="inpt" name="password_confirmation" placeholder="" required autocomplete="new-password">
 
                                @error('password')

                                    <span class="invalid-feedback" role="alert" style="margin-bottom: 5%">
                                         

                                 <strong >{{ $message }}</strong>
                                   

                                    </span>
 <br>
                                @enderror
                </div>

                <div class="inpt_field">

                    <label> Phone Number</label>
                  <input  type="number" class="inpt" name="phone_number" placeholder="" required >
 
                                @error('phone_number')

                                    <span class="invalid-feedback" role="alert" style="margin-bottom: 5%">
                                         

                                 <strong >{{ $message }}</strong>
                                   

                                    </span>
 <br>
                                @enderror

                </div>

                <div class="inpt_field">

                    <label>Identification CNIC Number</label>


                    <input type="text" class="inpt" name="cnic"  required maxlength="13"
                        size="14">
@error('cnic')

                                    <span class="invalid-feedback" role="alert" style="margin-bottom: 5%">
                                         

                                 <strong >{{ $message }}</strong>
                                   

                                    </span>
 <br>
                                @enderror
                </div>
 <div class="inpt_field">

                    <label> Gender</label>
                    <div class="custom_select">
                        <select name="gender" required >
                            <option value="">Select</option>
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                            <option value="other">others</option>
                        </select>
                    </div>
                </div>
                <div class="inpt_field">

                    <label>Image</label>
                    <input type="file" name="img" accept=".png , .jpg , .jpeg" class="inpt" >

                </div>
<div class="inpt_field" style="display: block !important;">

                    <label> Select Cloths that You Stitched</label>
                      @foreach($category as $c)
<br>
  <input  type="checkbox" name="category[]" class="check-cls"  value="{{$c->id}}" class="flat" style="margin-left: 150px" />

  {{$c->name}}

 @endforeach  

                </div>

                <div class="inpt_field">

                    <label>Shop Address</label>
                    <textarea name="address" class="textarea" required></textarea>
                    @error('address')

                                    <span class="invalid-feedback" role="alert" style="margin-bottom: 5%">
                                         

                                 <strong >{{ $message }}</strong>
                                   

                                    </span>
 <br>
                                @enderror
                </div>
                <div class="inpt_field termm"style="">

                    <label class="check"style="background-color: #e7ab3c;">
                        <input type="checkbox">
                        <span class="checkmark"style="background-color: #e7ab3c;"></span>
                    </label>
                    <p>Agreed to terms and conditions</p>
                </div>
                <div class="inpt_field">

                    <button type="submit" class="submit-btn bt" >Submit</button>

                </div>
        </form>


    </div>

    </div>

    <section>

        <div class="regset">
            <h4>Already Account <a href="{{url('login')}}"style="color: #e7ab3c;">Login ? </a> </h4>
        </div>
    </section>
    <br>
    <br>
       
@endsection