@extends('layout.lefttap') 
@section('title','Measurement Settings')
@section('contents')

<section class="content-header">
    <h1>Update Measurement Part
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
            <form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('edit-measurement-part')}}" enctype="multipart/form-data">
                @csrf
                 <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="category">Select Category (Previous Category is : {{$data->category}}) </label>
                    <select name="category" id="category" class="form-control" required="required">
                      <option disabled="disabled">Select </option>

    @foreach($cloth_categorys as $t)

                      <option value="{{$t->id}}">{{$t->name}}</option>
    @endforeach                  
                     
                    </select>
                  </div>

                 <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="name">Name</label>
                    <input name="name" value="{{$data->name}}" id="name" class="form-control" required>
                    <input name="id" value="{{$data->id}}" id="id" type="hidden" class="form-control" required>
                  </div>    
                   

                
                 
                
            
                 
                      <div class="form-group">
                        <label for="additional_notes">Description</label>
                        <textarea class="form-control" rows="3" name="description" value="{{$data->description}}" cols="40" id="additional_notes"></textarea>
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
