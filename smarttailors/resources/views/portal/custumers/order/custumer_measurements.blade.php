@extends('layout.lefttap') 
@section('title','Custumer Measurements')
@section('contents')

   


          <div class="container">
           
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Measurements of {{$custumer_info->name}}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                 <div class="x_content">
                 
 <form id="selected_category">
                @csrf
          <label>Select Cloth Category For Measurements</label>
 <select name="category" id="category-get" class="form-control" required="required">
                      <option disabled="disabled" selected>Select Category</option>

                        @foreach($cat as $c)
  

                      <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach                  
                     
                    </select>
                    <br>
     <!-- <button id="category-get">Submit</button>               -->
        <input type="hidden" name="id" value="{{$custumer_info->id}}">           
                    
</form> 

                  </div>
          <div id="alert"></div>

                  <div id="add-measurement-part">
                    
                  </div>
      

                </div>
              </div>  
                         
                
              </div>
            </div>
          </div>
  <script src="https://js.pusher.com/5.1/pusher.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  $(document).ready(function()
  {
   
    $('#category-get').on('click',function(e){

      e.preventDefault();
      

      $.ajax({
        type: "POST",
        url: "mea-cou",
        data: $('#selected_category').serialize(),
        success: function (data){
        $('#add-measurement-part').html(data);

         

        },
        error: function(error)
        {
        $('#alert').html(error);
          console.log(error);
        }
      });
    });





        
  });
</script>



@endsection
