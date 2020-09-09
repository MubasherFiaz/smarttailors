@extends('layout.lefttap') 
@section('title','Measurement Settings')
@section('contents')
<style>
  table {
  
    position:absolute;
    overflow-x:scroll;
}
</style>
<div class="container">
           
<div class="row">

<div class="title_left">


                <h3>Measurement Settings <small><button class="btn btn-primary" data-toggle="modal" data-target="#add_new1"><i class="fa fa-plus"></i> Add Category</button>
 <button class="btn btn-primary" data-toggle="modal" data-target="#add_new"><i class="fa fa-plus"></i> Add Measurement Parts</button></small></h3>
              </div>
</div></div>
<br>
  @if(session('message'))
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{session('message')}}.
  </div>
@endif 
 @if(session('error'))
  <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error! </strong> {{session('error')}}.</div>
@endif  
@if( count($errors) > 0)
       @foreach ( $errors->all() as $error)
       <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error! </strong> {{ $error  }}.</div>
        @endforeach
        @endif




<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Measurement Parts</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="example1" class="table" >
                      <thead>
                        <tr>
                                   <th>Serial Number</th>
                                  
                                    <th>Date</th>
                                    <th>Measurement Type</th>
                                    <th>Name</th>
                                    <th >Description</th>
                                    <th>Action</th>

                                </tr>
                      </thead>
                      <tbody>
                                                  <?php $count=1;  ?>
                           
    @foreach($measurements as $v)
<tr>
                                <td>{{$count}}</td>
                                
                                <td>{{$v->created_at}}</td>
                                <td>{{$v->cat_name}}</td>
                                 <td>{{$v->name}}</td>
                              
                                    <td>{{$v->description}}</td>
                                          <td>
<a href="{{url('/update-measurement-part/').'/'.$v->id}}" type="button" class="btn btn-info dropdown-toggle btn-xs" >Edit </a> 
                   <a href="{{url('/delete-measurement-part/').'/'.$v->id}}" type="button" class="btn btn-danger dropdown-toggle btn-xs">Delete
                                    </a>


                  </td>

                                </tr>
                                 <?php  ++$count; ?>
                                
    @endforeach  
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cloth Categorys</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="example" class="table table-striped" >
                      <thead>
                       <tr>
                                   <th>Serial Number</th>
                                  
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Sex</th>
                                    <th>Images</th>
                                    <th>Action</th>

                                </tr>
                      </thead>
                      <tbody>
                          <?php $count=1;  ?>
                           
    @foreach($cloth_categorys as $v)
<tr>
                                <td>{{$count}}</td>
                                
                                <td>{{$v->created_at}}</td>
                                <td>{{$v->name}}</td>
                                 <td>{{$v->sex}}</td>
                               <td>
                                   <?php
                                if ($v->img=='') {
                                  ?>
 

                                  <?php
                                 echo "No Image Selected";
                                }
                               else {
                                ?>
                                <img src="{{asset('public/tailor_imgs/images/')}}/{{$v->img}}"  class="avatar" >
                              <?php  }
                                ?>

                               </td>
                                    <td>
                   <a href="{{url('/update-cloth-type/').'/'.$v->id}}" type="button" class="btn btn-info dropdown-toggle btn-xs" >Edit </a> 
                   <a href="{{url('/delete-type/').'/'.$v->id}}" type="button" href class="btn btn-danger dropdown-toggle btn-xs">Delete
                                    </a>


                  </td>

                                </tr>
                                 <?php  ++$count; ?>
                                
    @endforeach                  

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>






    <div class="modal fade account_model" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>
  <div class="modal fade" id="add_new" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-body">
                                   
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Measurement Part</h2>
                  
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
            <form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('add-measurement-part')}}" enctype="multipart/form-data">
                @csrf
                 <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="category">Select Category</label>
                    <select name="category" id="category" class="form-control" required="required">
                      <option disabled="disabled">Select </option>

    @foreach($cloth_categorys as $t)

                      <option value="{{$t->id}}">{{$t->name}}</option>
    @endforeach                  
                     
                    </select>
                  </div>

                 <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="name">Name</label>
                    <input name="name" id="name" class="form-control" required>
                  </div>    
                   

                
                 
                 
            
                  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="description">Description</label>
                    <textarea  name="description" id="description" style="margin: 0px; width: 804px; height: 115px;"></textarea>
                  </div>

             
    
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="reset">Reset</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </div></form></div>
        </div>
      </div>
    </div>
  </div>
</div> 



<div class="modal fade account_model" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>
  <div class="modal fade" id="add_new1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-body">
                                   
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Cloth Category</h2>
                  
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
            <form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('add-cloth-type')}}" enctype="multipart/form-data">
                @csrf
    
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                  </div>

                
                  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="sex">Sex</label>
                    <select name="sex" id="sex" class="form-control" required>
                      <option disabled="disabled">Select any one</option>

   
                      <option value="Male" selected>Male</option>
                      <option value="Female">Female</option>
                 
                     
                    </select>
                  </div>
                 <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="amount">Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept=".png , .jpg , .jpeg">
                  </div>

             
    
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="reset">Reset</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </div></form></div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- /.content -->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.js"
  integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
  crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Blfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );      $(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Blfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );   

   


</script>

@endsection
