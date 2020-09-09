@extends('layout.lefttap') 
@section('title','Measurement Settings')
@section('contents')

<section class="content-header">
    <h1>Update Cloth Type
    </h1>
</section>

<section class="content">
<div class="row">
        <div class="col-sm-12">
                  
                    <div class="">
                
    <div class="box-body">
        <div class="row">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
            <form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('edit-cloth-type')}}" enctype="multipart/form-data">
                @csrf
                  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{$data->name}}" name="name" id="name" class="form-control" required>
                    <input type="hidden" name="id" value="{{$data->id}}" class="form-control" required>
                  </div>

                
                  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="sex">Sex (Previous Sex is : {{$data->sex}})</label>
                    <select name="sex" id="sex" class="form-control" required>
                      <option disabled="disabled">Select any one</option>

   
                      <option value="Male" selected>Male</option>
                      <option value="Female">Female</option>
                 
                     
                    </select>
                  </div>
              <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="amount">Image</label>
                    <input type="file"value="{{$data->image}}" name="image" id="image" class="form-control" accept=".png , .jpg , .jpeg">
                  </div>
    
      
          <button class="btn btn-primary" type="reset">Reset</button>
          <button type="submit" id="btnUpdate" class="btn btn-success">Submit</button>
        </div></form></div>
        </div>
      </div>
    </div>
  </div>
</div> 

@endsection
