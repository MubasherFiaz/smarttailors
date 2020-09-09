@extends('layout.lefttap') 
@section('title','Dashboard')
@section('contents')
      
   


          <div class="container">
           
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
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
                    <h2>Add Images</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <center>
                    <p>Drag  image to the box below for multi upload or click to select images. </p>
                    <form method="POST" action="{{route('add-gallery')}}" enctype="multipart/form-data">
  {{csrf_field()}}


    <div class="input-group hdtuto control-group lst increment" >
      
       <input type="file" class="myfrm form-control" name="img" accept=".png , .jpg , .jpeg">
       <label>Small Image Discription</label>
<input type="text" 
    id="sessionNo" class="myfrm form-control"
    name="description" 
    onkeypress="return isNumberKey(event)" 
    maxlength="25" />
    <br>
    <br>
    <br>
    <br>

      <div> 
        <button class="btn btn-success" type="submit"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
      </div>
    </div>
   

 


</form>
                    
</center>
                  </div>
                </div>    
                 <div class="x_panel">
                  <div class="x_title">
                    <h2>Gallery</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @foreach($imgs as $img)

                   <div class="col-md-55">
                        <div class="">
                          <div class="image view view-first">

                            <img style="width: 100%; display: block;" src="{{asset('public/images/'.$img->img)}}
                            " alt="image">
                            <div class="mask">
                              
                              <div class="tools tools-bottom">
                               
                                <a href="delete-img/{{$img->id}}"><i class="fa fa-times"></i></a>
                                <p>{{$img->description}}</p>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      @endforeach
                  </div>
                </div>               
                  <div class="x_panel">
                  <div class="x_title">
                    <h2>Description</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form method="POST" action="{{route('update-description')}}" enctype="multipart/form-data">
  {{csrf_field()}}
                   

            <textarea  name="description"><?php echo("$des->description") ?></textarea> 

      
       
       <br>
                      <button id="send" style="float: right;" type="submit" class="btn btn-success">Update</button>
                    </form>
                  </div>
                </div>                


                  <div class="x_panel">
                  <div class="x_title">
                    <h2>Search By Profile</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
          
             <div class="x_content">
                    <form method="POST" action="{{route('update-search')}}" enctype="multipart/form-data">
  {{csrf_field()}}
                   
<center>
            <div class="row col-10 col-sm-10 mgt50px" >
                 
                  <h2>Search By Rates</h2>  
                  
    <label class="radio-inline" id="rates">
      <input type="radio" value="all" name="rates" {{ $des->rates == 'all' ? 'checked' : ''}}>All
    </label>
    <label class="radio-inline">
      <input type="radio" value="l_p" {{ $des->rates == 'l_p' ? 'checked' : ''}}  name="rates"> Lower Price
    </label>
    <label class="radio-inline">
      <input type="radio" value="m_p" {{ $des->rates == 'm_p' ? 'checked' : ''}} name="rates">Mediam Price
    </label> 
     <label class="radio-inline">
      <input type="radio" value="h_p" {{ $des->rates == 'h_p' ? 'checked' : ''}}  name="rates">Higher Price
    </label>
          

                 
    <h2>Search By Tailors</h2>  
                  
    <label class="radio-inline">
      <input type="radio" value="all" name="type" {{ $des->type == 'all' ? 'checked' : ''}}>All
    </label> 
    <label class="radio-inline">
      <input type="radio" value="g_t" name="type" {{ $des->type == 'g_t' ? 'checked' : ''}}> Gents Tailors
    </label> 
    <label class="radio-inline">
      <input type="radio" value="l_t" name="type" {{ $des->type == 'l_t' ? 'checked' : ''}}> Ladies Tailors
    </label>    
    
       

                
    <h2>Search By Availability</h2>  
                  
    <label class="radio-inline">
      <input type="radio" value="all" name="availability" {{ $des->availability == 'all' ? 'checked' : ''}}>All
    </label> 
    <label class="radio-inline">
      <input type="radio" value="f_t" name="availability" {{ $des->availability == 'f_t' ? 'checked' : ''}}>Full Time Tailors 
    </label> 
    <label class="radio-inline">
      <input type="radio" value="p_t" name="availability" {{ $des->availability == 'p_t' ? 'checked' : ''}}>Part Time Tailors
    </label>    
    
      

                
    <h2>Search By Delivery</h2>  
                  
    <label class="radio-inline">
      <input type="radio" value="both" name="delivery" {{ $des->delivery == 'both' ? 'checked' : ''}}>Both
    </label> 
    <label class="radio-inline">
      <input type="radio" value="h_d" name="delivery" {{ $des->delivery == 'h_d' ? 'checked' : ''}}>Home Delivery Available
    </label> <br><br>
                       <button id="send" type="submit" class="btn btn-success">Update</button>
                     
                  </div>
                </center></form>
                </div>


<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>


        <script>
                        CKEDITOR.replace( 'description' );
                </script> 
                @endsection