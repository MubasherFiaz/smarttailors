@extends('auth.layout') 
@section('title','Login')
@section('contents')


    

        <div class="register-login-section spad">
            <div class="container">
                <div class="row" style="display: flex;justify-content: center; align-items: center;">
                    <div class="col-lg-6 offset-lg-3 offset-sm-3">
                        <div class="login-form">
                            <h2>Login</h2>
                            <form method="POST" action="{{ route('login') }}" class="register-form">
                                @csrf
    
    
    
                                <div class="group-input">
                                    <label for="username">
                                        Username or email address *</label>
                                    <input id="email" type="email" class="inp" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus />
    
    <br>
                                    @error('email')
                                    <span class="invalid-feedback " role="alert" style="margin-top: 5px; color: red; ">
                                                         <strong>{{ $message }}</strong>
                                                      </span>
                                                      @enderror
                                </div>
                                <div class="group-input">
                                    <label for="pass">Password *</label>
                                    <input id="password" type="password" class="inp" name="password" autocomplete="current-password" placeholder="Enter Password" required title="Please Enter Password" required="" />
                     
     @error('password')
    
    
                        <span class="invalid-feedback" role="alert" style="margin-top: 5px; color: red;">
                           <strong>{{ $message }}</strong>
                        </span>
    <br>
                     @enderror
                                </div>
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me  </label>
                                 
                                                                     
                                                  
                                                                @if (Route::has('password.request'))
                                
                                                                    <a class="f-password pwde"   href="{{ route('password.request') }}" >
                                                                           Forget Password?
                                                                    </a>
                                                                @endif
                                <button type="submit" class="site-btn login-btn">Sign In</button>
                            </form>
                            <div class="switch-login">
                                <a href="{{url('choose')}}" class="or-login pwde ">Or Create An Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



                @endsection
