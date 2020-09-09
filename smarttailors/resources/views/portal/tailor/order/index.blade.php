@extends('layout.lefttap') 
@section('title','Order Details')
@section('contents')
@if(!empty(Session::get('error_code')) && Session::get('error_code') 
 == 5)
  <script>
    $(function() {
       $('#show').modal('show');

    });
</script>
@endif
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
                                    <th>Customer Name</th>
                                    <th>Phone No</th>
                                    <th >Order Status</th>
                                    <th >Total Payment</th>
                                    <th >Payment Received</th>
                                    <th ><center>Action</center></th>
                                    

                                </tr>
                      </thead>
                      <tbody>
                                                 
     @foreach($orders as $o)                           
    
<tr>
                                <td id="invoice_no">{{$o->invoice_no}}</td>
                                <?php 
$c=$o->custumer_id;
$u = DB::table('users')->where('id' ,$c)->value('name');

  

                                ?>
                                <td>{{$u}}</td>
                                 <td>{{$o->phone_number}} </td>                             
                                    <td>{{$o->o_status}}</td>
                                    <td>{{$o->total_payment}}</td>
                                    <td>{{$o->payment_received}}</td>
                 <td>
                  

<button type="button" onclick="detail({{$o->id}})"  class="btn btn-info btn-xs showw" >Order Details </button>


                  <a type="button" href="{{url('custumer-measurement-details/').'/'.$o->name}}" class="btn btn-primary btn-xs" >Measurements </a> 
                  <a type="button" id="id" data-toggle="modal" data-id="'.$o->id.'" class="delete editbtn btn btn-danger btn-xs" >Change Status </a> 
                  <a type="button" id="id" data-toggle="modal" data-id="'.$o->id.'" class="delete editpayment btn btn-danger btn-xs" >Add Payment</a> 
                  


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
                   
            <form id="editOrder">
              {{ csrf_field() }}
                
                {{ method_field('PUT') }}
                 <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                  Current Status
                    <input type="hidden" id="invoice_no" class="form-control" readonly>
                    <input  type="text" id="o_status" class="form-control" readonly>

                    <label for="o_status">Change Status</label>

                    <select name="o_status" id="o_status" class="form-control" required="required">
                     
  
                      <option value="Assigned" selected>Assigned</option>
                      <option value="Ready">Ready</option>
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
  <div class="modal fade" id="editpayment" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-body">
                                   
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Enter Payment </h2>
                  
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
            <form id="editPayment">
              {{ csrf_field() }}
                
                {{ method_field('PUT') }}
                 <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                  Total Payment
                    <input type="hidden" id="invoice_noo" class="form-control" readonly>
                    <input  type="text" id="t_payment" class="form-control" readonly>

                    <label for="pay_r">Payment Received</label>

                    <input  type="text" id="pay_r" name="pay_r" class="form-control" >
                    
               
                     
                    </select>
                  </div>

 
             
    
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         
          <button id="save_payment" class="btn btn-success">Submit</button>
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

  
     $('.editpayment').on('click',function()
    {
      $('#editpayment').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);
      $('#invoice_noo').val(data[0]);
      $('#t_payment').val(data[4]);
      
    });
    $('#save_payment').on('click',function(e){
      e.preventDefault();
      var invoice_no = $('#invoice_noo').val();
      var t_payment = $('#t_payment').val();
      var pay_r = $('#pay_r').val();
      if (pay_r>t_payment) {
        alert('Received Payment is must less than or equal to Total Payment');
        return false;
      }
     

      $.ajax({
        type: "PUT",
        url: "update_payment/"+invoice_no,
        data: $('#editPayment').serialize(),
        success: function (response){
          console.log(response);
          $('#editpayment').modal('hide');
         
          location.reload();
        },
        error: function(error)
        {
          console.log(error);
        }
      });
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
   function detail(id){
   
     // alert(id);
    $.ajax({
        type: "get",
        url: "get-order-details/"+id,
       
      success: function (response){
          console.log(response);
        $('#modal-body').html(response);
     $('#show').modal('show'); 
     
          
        },
        error: function(error)
        {
          console.log(error);
        }


    });}


</script>

@endsection
