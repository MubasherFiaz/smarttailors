@extends('layout.lefttap') 
@section('title','Profile')
@section('contents')
      
   


          <div class="">
            <div class="row top_tiles">

            	  <div class="col-md-12 col-xs-12">
                    @if(session('message'))
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{session('message')}}.
  </div>
@endif              
  
@if( count($errors) > 0)
       @foreach ( $errors->all() as $error)
       <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error! </strong> {{ $error  }}.</div>
        @endforeach
        @endif
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Password</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form method="POST" action="{{route('update-profile-password')}}" >
                @csrf

                    <div class="form-horizontal form-label-left input_mask">

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="password" class="form-control" name="old_password">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">New Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="password" class="form-control" name="password">
                        </div>
                      </div>       
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Retype Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="password" class="form-control" name="password_confirmation">
                        </div>

                      </div>
                 <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                         
						   <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>

                    </div>
                  </form>
                  </div>
                </div></div>
  <form method="POST" action="{{route('update-profile')}}" enctype="multipart/form-data">
                @csrf
            	<div class="col-md-6 col-xs-12">
              <div class="x_panel col">
                  <div class="x_title">
                    <h2>Edit Profile</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                   
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <div class="form-horizontal form-label-left input_mask">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="First Name" value="{{$user_info->f_name}}" name="f_name">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
 
                  

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Last Name" value="{{$user_info->l_name}}" name="l_name">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>   
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess4" value="{{$user_info->name}}" name="name">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div> 
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="email" class="form-control has-feedback-left" id="inputSuccess4" value="{{$user_info->email}}" placeholder="Email">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                   
                      

                    </div>
                  </div>
                </div></div>  	
                <div class="col-md-6 col-xs-12">
              <div class="x_panel col">
                  <div class="x_title">
                    <h2>Profile Photo</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                   
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <div class="form-horizontal form-label-left input_mask">

                      
 
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Image:</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="file" class="form-control" value="{{$user_info->img}}" name="img" accept=".png , .jpg , .jpeg">
                        </div>
                      </div> 

               
                   
                      <div class="ln_solid"></div>
                    

                    </div>
                  </div>
                </div>
              
            </div>
       <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>More Informations
                      </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="form-horizontal form-label-left" novalidate="">

                      <span class="section">Personal Info</span>
    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" value="{{$user_info->phone_number}}" name="phone_number" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Cnic Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="number" value="{{$user_info->cnic}}" name="cnic"  data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>   
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Gender<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="gender" class="form-control" >
                            <option value="">Please Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>
                      </div>   
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12  xdisplay_inputx form-group has-feedback">
                         <input type="text" class="form-control has-feedback-left" name="date_of_birth" value="{{$user_info->date_of_birth}}" id="single_cal1" placeholder="First Name" aria-describedby="inputSuccess2Status">
                         <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">City <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" value="{{$user_info->city}}" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="city"  type="text">
                        </div>
                      </div>
                <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Latitude <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="lat" value="{{$user_info->lat}}" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="lat"  type="text">
                        </div>
                      </div>
                <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Longitude <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="lng" value="{{$user_info->lng}}" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="lng"  type="text">
                        </div>
                      </div>
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">
                          <?php
                          if (Auth()->user()->role=="tailor") {
                            print_r('Shop Address');
                          }
                          else{
                            print_r('Address');

                          }
                          ?>
                           <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" value="{{$user_info->address}}" name="address" class="form-control col-md-7 col-xs-12">{{$user_info->address}}</textarea>
                        </div>
                      </div>
                     
                    
                      <div class="ln_solid"></div>
                     
                    </div>
                  </div>
                </div>
                 <div class="form-group">
                        <div class="col-md-6 col-md-offset-11">
                          
                          <button id="send" type="submit" class="btn btn-success">Update</button>
                           <!-- <button class="btn btn-default source" onclick="new PNotify({
                                  title: 'Regular Success',
                                  text: 'That thing that you were trying to do worked!',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });">Success</button> -->
                        </div>
                      </div>
              </div>
</form>
         </div>
         

@endsection