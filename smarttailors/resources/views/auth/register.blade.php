

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

    <!-- Font Icon -->
 <link rel="stylesheet" href="{{asset('public/login/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('public/login/css/style.css')}}">
    <style type="text/css">
        .main { 
    
    padding: 20px !important;
}
    </style>
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign in </h2>
                        
                       <form method="POST" action="{{ route('register') }}" class="register-form" id="login-form">

                        @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
   <input id="name" type="text" class="input-field @error('name') is-invalid @enderror" placeholder="Your Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')


                                    <span class="invalid-feedback" role="alert" style="margin-bottom: 5%">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                              

          <input id="email" type="email" class="input-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your Email Address">

                                @error('email')


                                    <span class="invalid-feedback" role="alert" style="margin-bottom: 5%">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                               
 <input id="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
        
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                               



<input id="password-confirm" type="password" class="input-field" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
 
                                @error('password')

                                    <span class="invalid-feedback" role="alert" style="margin-bottom: 5%">
                                         

                                 <strong >{{ $message }}</strong>
                                   

                                    </span>
 <br>
                                @enderror

                            </div>                      
              <div class="form-group">
                                <label for="re-phone"><i class="zmdi zmdi-account-box-phone"></i></label>
                               



<input  type="number" class="input-field" name="phone_number" placeholder="Phone Number" required >
 
                                @error('phone_number')

                                    <span class="invalid-feedback" role="alert" style="margin-bottom: 5%">
                                         

                                 <strong >{{ $message }}</strong>
                                   

                                    </span>
 <br>
                                @enderror

                            </div>
                            <div class="form-group">
                               
                                <label for="agree-term" class="label-agree-term">Select Role</label>


<select  name="role" style="width: 100%">
  <option disabled>Select Any One</option>
  <option value="tailor">Tailor</option>
  <option value="custumer">Custumer</option>
  
</select>  

                            </div>  
                              <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{asset('public/login/images/signup-image.jpg')}}" alt="sing up image"></figure>
                        <a href="{{ url('/login') }}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

      
    </div>

    <!-- JS -->
     <script src="{{asset('public/login/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/login/js/main.js')}}"></script>
</body>
</html>