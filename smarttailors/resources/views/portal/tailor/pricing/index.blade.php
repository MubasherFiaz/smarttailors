@extends('layout.lefttap') 
@section('title','Pricing Settings')
@section('contents')
<style>
img.avatar {
    transition:transform 0.25s ease;
}

img.avatar:hover {
    -webkit-transform:scale(4.5);
    transform:scale(4.5);
}
</style>
<div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
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
                  <div class="x_title">
                    <h2>Enter Price <small>of each category </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                      <li><button class="btn btn-primary" data-toggle="modal" data-target="#add_new"><i class="fa fa-plus"></i> Add Category</button></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <h4>Set Price Of Each Categorys.</h4>
                 <form class="form-horizontal form-label-left" method="POST" action="{{route('set-price')}}" enctype="multipart/form-data">
                @csrf
                <br/>
                
                  @foreach($pricing as $c)
                       <label for="price" style="padding-left: 1% ; padding-top: 0.5% ">{{$c->c_name}}</label>
              
               <img src="{{asset('public/tailor_imgs/images/')}}/{{$c->image}}" class="avatar" >       
                       <br/><br/>
                 
                    <input name="id[]" type="hidden" value="{{$c->cat_id}}" class="form-control" required>
                    <input name="price[]"  value="{{$c->price}}" id="price" class="form-control" required>
                       <br/>

    @endforeach                  

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
              <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
            

</div>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pricing Details</h2>
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
                                   
                                    <th>Created Date</th>
                                    <th>Category Name</th>
                                    <th>Image</th>
                                    <th >Price</th>
                                    <th >Action</th>
                                    

                                </tr>
                      </thead>
                      <tbody>
                                                 
    @foreach($pricing as $p)
<tr>
                                
                                <td>{{$p->created_at}}</td>
                                <td>{{$p->c_name}}</td>
                                 <td><img src="{{asset('public/tailor_imgs/images/')}}/{{$c->image}}" class="avatar" >  </td>                             
                                    <td>{{$p->price}}</td>
                 <td>
                  <a type="button" onClick="confirmDelete('{{url('/delete-price-details/').'/'.$p->id}}')" class="btn btn-danger btn-xs" >Delete </a>

  <script type="text/javascript">

    function confirmDelete(delUrl) {
      bootbox.confirm("Are you sure you want to delete?", function(result) {
            if(result) {
              document.location = delUrl;
            }
          });

    }

    </script>
                  </td>                              

                                </tr>
                                <?php 
                                  $id = $p->id;

                                ?>
       <div class="modal fade" id="show" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-body">
                                   
                <div class="x_panel">
                  <div class="x_title">
                    <h1>Are You Sure?</h1>
                  
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <h3>
                   You want to delete record. {{$id}}
                 </h3>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                     <?php
if(!empty($p))
{
                     ?>
                     
          <a href="{{url('/delete-price-details/').'/'.$p->id}}" type="button" class="btn btn-danger ">Yes
                                    </a>
                                   
          <?php
}
          ?>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>                              
    @endforeach  
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
</div></div>
   <div class="modal fade account_model" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>
  <div class="modal fade" id="add_new" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-body">
                                   
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add New Category</h2>
                  
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
            <form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('add-new-category')}}" enctype="multipart/form-data">
                @csrf
                 <div class="col-md-12 col-sm-12 col-xs-12 form-group">
  
       @foreach($cloth_categorys as $c)
                <br>
       
<span style="padding-left: 2% ; padding-top: 5% ">

           <label >
        
           <input  type="checkbox" name="category[]" class="check-cls"  value="{{$c->id}}" class="flat" />
           {{$c->name}}</label>
                       
         
                </span>
                 <img src="{{asset('public/tailor_imgs/images/')}}/{{$c->image}}" id="myImg" class="avatar" >  
                <br>

    @endforeach                 
 @if($cloth_categorys=='[]')
    <h1>All Categores are already added to Add new Category Contact To Admin</h1>
    @endif
 
    <br>
    <br>
   
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="reset">Reset</button>
          <input type="submit" class="submit-btn btn btn-success" value="Add" disabled>
        </div></form></div>
        </div>
      </div>
    </div>
  </div>
</div>
 
</div></div></div></div></div></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script>
  var checkboxes = $(".check-cls"),
    submitButt = $(".submit-btn");

checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
});

  $(document).on('click','.delete',function(){
    $('#show').modal('show');

  });
</script>
@endsection
