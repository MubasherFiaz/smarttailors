 @extends('layout.lefttap') 
@section('title','Order Details')
@section('contents')

<div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
            
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Order Details</h2>
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
                                   
                                    <th>Invoice No</th>
                                    <th>Tailor Name</th>
                                    <th>Phone No</th>
                                    <th >Order Status</th>
                                    <th ><center>Action</center></th>
                                    

                                </tr>
                      </thead>
                      <tbody>
                                                 
     @foreach($orders as $o)                           
    
<tr>
                                <td>{{$o->invoice_no}}</td>
                                <td>{{$o->name}} {{ $o->l_name}}</td>
                                 <td>{{$o->phone_number}} </td>                             
                                    <td>{{$o->o_status}}</td>
                 <td>
                  <a type="button" class="btn btn-info btn-xs" onclick="detail({{$o->id}})"  >Order Details </a>
                  <a type="button" href="{{url('custumer-measurements')}}" class="btn btn-primary btn-xs" >Change Measurements </a> 
                  <a type="button" data-id="" class="delete editbtn btn btn-danger btn-xs" >Change Status </a> 
                  


                  </td>                              
                                </tr>
@endforeach
                                     
    
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
</div></div>

 
</div></div></div></div></div></div>
<!-- <div class="modal fade" id="show" role="dialog">
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
                   You want to delete record.
                 </h3>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

          <a href="{{url('/delete-price-details/')}}" type="button" class="btn btn-danger ">Yes
                                    </a>
          
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->

    <div class="modal fade account_model" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>
  <div class="modal fade" id="edit_status" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-body">
                                   
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Status</h2>
                  
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
            <form id="editOrder">
              {{ csrf_field() }}
                
                {{ method_field('PUT') }}
                 <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                  Current Status
                    <input type="hidden" id="invoice_no" class="form-control" readonly>
                    <input  type="text" id="o_status" class="form-control" readonly>

                    <label for="o_status">Change Status</label>

                    <select name="o_status" id="o_status" class="form-control" required="required">
                     
  
                    
                      <option value="Delivered">Delivered</option>
                      <option value="Cancelled">Cancelled</option>
               
                     
                    </select>
                  </div>

 
             
    
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         
          <button id="save_status" class="btn btn-success">Submit</button>
        </div></form></div>
        </div>
      </div>
    </div>
  </div>
</div> 

<div class="modal fade account_model" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade" id="show" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-body">
                                   
                <div class="x_panel">
                  <div class="x_title">
                    <h1>Order Details</h1>
                  
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                 <div id="modal-body"></div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          
          
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="modal fade account_model" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
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

   function detail(id){
      
    $.ajax({
        type: "get",
        url: "get_order_c_details/"+id,
       
      success: function (response){
          console.log(response);
        $('#modal-body').html(response);
     $('#show').modal('show'); 
     
          
        },
        error: function(error)
        {
          console.log(error);
        }


    });

  }

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
      $('#invoice_no').val(data[0]);
      $('#o_status').val(data[3]);
      
    });
    $('#save_status').on('click',function(e){
      e.preventDefault();
      var invoice_no = $('#invoice_no').val();


      $.ajax({
        type: "PUT",
        url: "change_order_status/"+invoice_no,
        data: $('#editOrder').serialize(),
        success: function (response){
          console.log(response);
          $('#edit_status').modal('hide');
         
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
