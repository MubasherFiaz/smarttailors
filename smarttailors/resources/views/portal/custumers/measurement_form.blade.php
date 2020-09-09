 <div id="add-measurement-part">

<h1>Add Measurements</h1>
 	
 	<div class="col-md-6">
 	 <form id="save_measurements">
                @csrf
                        @foreach($data as $c)
   <input name="category[]" value="{{$c->category}}" type="hidden" class="form-control" required>   
 	  <input name="m_id[]" value="{{$c->id}}" type="hidden" class="form-control" required>                        
   <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="{{$c->name}}" title="{{$c->description}}">{{$c->name}}</label>
                    <input name="mea[]" value="{{$c->mea}}" type="text" class="form-control" required="required">
  
                  </div> 
              {{$c->img}}
                           @endforeach                  

              <button type="submit" id="save_mea" style="float: right;" class="btn btn-success">Submit</button>
                    
</form> 
       
</div>
<div class="col-md-6">

               
	<img src="{{asset('public/tailor_imgs/images/'.$img)}}" alt="..." class="profile_img">

                 

</div>
                  </div>
    <div class="modal fade account_model" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>
  <div class="modal fade" id="success" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-body">
                                   
                <div class="x_panel">
                  
                    <h2>Measurement Added Successfully</h2>
                  
              
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
        </div>
        </div>
      </div>
    </div>
  </div>
</div> 
 <div class="modal fade" id="error" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-body">
                                   
                <div class="x_panel">
                  
                    
       <div class="alert alert-danger alert-dismissible">
    
    <strong>Error! </strong> Please fill all given fields.</div>
        
              
        
        </div>
      </div>
    </div>
  </div>
</div>
                  <script>
  $(document).ready(function()
  {

     $('#save_mea').on('click',function(e){
      e.preventDefault();
    //alert("empty");


      $.ajax({
        type: "POST",
        url: "save-measurements",
        data: $('#save_measurements').serialize(),
        success: function (){
        

       $('#success').modal('show');
          //location.reload();
        },
        error: function(error)
        {
       $('#error').modal('show');

        	
        }
      });
    });   
  });
</script>