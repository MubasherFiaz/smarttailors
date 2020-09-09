@extends('layout.lefttap') 
@section('title','All Tailor')
@section('contents')
<style>
  #example1 {
  
   
    width: 100% !important;
  overflow: auto !important;
}
</style>   
 <div class="container">
           


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
                    <h2>All Tailor</h2>
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
                                   <th>Image</th>
                                   <th>Name</th>
                                  
                                    <th>Email Address</th>
                                   
                                    <th>City</th>
                                    <th>Status</th>
                                    <th>Rating</th>
                                    <th >Joining Date</th>
                                    <th >Action</th>
                                  

                                </tr>
                      </thead>
                      <tbody>
    @foreach($tailor as $t)
                                
                          <tr>
                               <td class="user">  <?php
                                if ($t->img=='') {
                                  ?>
 

                                  <?php
                                 echo "No Image Selected";
                                }
                               else {
                                ?>
                                <img src="{{asset('public/images/')}}/{{$t->img}}"  class="avatar" >
                              <?php  }
                                ?>

 </td> 

                                <td>{{$t->name}}</td>
                                
                                <td>{{$t->email}}</td>
                               
                                 <td>{{$t->city}}</td>
                               <td> {{$t->status}}  </td>
                               <td> {{$t->rating}}  </td>
                                 
                   <td> {{$t->created_at}}</td>
                   <td>
<!-- <a type="button" data-id="{{$t->id}}" data-role="{{$t->role}}" data-name="{{$t->name}}" data-status="{{$t->status}}" class="show-details btn btn-info btn-xs" >View </a> --> 
<a type="submit" id="cs" class="btn editbtn btn-danger btn-xs">Change Status
                                    </a>
                                  </td>
                                </tr>
                                   @endforeach
                   
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
       </tbody></table></div>
    <div class="modal fade account_model" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>
  <div class="modal fade" id="show" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-body">
                                   
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Custumer Status</h2>
                  
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <p>Name</p>{{$t->name}}
                   <p>Email</p>{{$t->id}}
                   <p>status</p>{{$t->status}}
                   <p>Ranking</p>{{$t->role}}
                   <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
    <div class="modal fade account_model" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>
  <div class="modal fade" id="edit_status" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-body">
                                   
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Custumer Status</h2>
                  
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
            <form id="editCustumer">
              {{ csrf_field() }}
                
                {{ method_field('PUT') }}
                 <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="status">Select Status</label>
                    <select name="status" id="status" class="form-control" required="required">
                     
  
                      <option value="1" selected>Enable</option>
                      <option value="0">Disable</option>
               
                     
                    </select>
                  </div>
 <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="rating">Rating</label>
                    <input name="email" type="hidden" id="email" class="form-control" required>

                    <input name="rating" id="rating" class="form-control" required>
                  </div>
 
             
    
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="reset">Reset</button>
          <button id="save_status" class="btn btn-success">Submit</button>
        </div></form></div>
        </div>
      </div>
    </div>
  </div>
</div> 

</div>
   <script src="https://code.jquery.com/jquery-3.4.1.slim.js"
  integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
  crossorigin="anonymous"></script>




<script>
    $(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Blfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );   

</script>

 <script src="https://js.pusher.com/5.1/pusher.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- <script>
$(document).ready(function() {


   $('.btn-danger').click(function(event){
           

            received_id = $(this).attr('id');
            //alert(received_id);
            $.ajax({
                type: "get",
                url: "view-t/" + received_id,
                data: "",
                cache: false,
                success: function (data){
                  
                }
            })
        });

}
</script> -->

<script>
  $(document).on('click','.show-details',function(){
    $('#show').modal('show');

  });
</script>
<script>
  $(document).ready(function()
  {
    $('.editbtn').on('click',function()
    {
      $('#edit_status').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);
      $('#rating').val(data[5]);
      $('#email').val(data[2]);
      
    });
    $('#save_status').on('click',function(e){
      e.preventDefault();
      var email = $('#email').val();


      $.ajax({
        type: "PUT",
        url: "change_status/"+email,
        data: $('#editCustumer').serialize(),
        success: function (response){
          console.log(response);
          $('#edit_status').modal('hide');
          alert("Data Updated");
          location.reload();
        },
        error: function(error)
        {
          console.log(error);
        }
      });
    });
  });
</script>





@endsection