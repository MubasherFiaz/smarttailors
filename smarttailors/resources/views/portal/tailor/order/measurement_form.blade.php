 <div id="add-measurement-part">

<h4>Measurement Details</h4>
 	
 	<div class="col-md-6">
 	 <form id="save_measurements">
                @csrf
                        @foreach($data as $c)
   <input name="category[]" value="{{$c->category}}" type="hidden" class="form-control" required>   
 	  <input name="m_id[]" value="{{$c->id}}" type="hidden" class="form-control" required>                        
   <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="{{$c->name}}" title="{{$c->description}}">{{$c->name}}</label>
                    <input name="mea[]" value="{{$c->mea}}" type="text" class="form-control" readonly>
  
                  </div> 
              {{$c->img}}
                           @endforeach                  

                    
</form> 
       
</div>
<div class="col-md-6">

               
	<img src="{{asset('public/tailor_imgs/images/'.$img)}}" alt="..." class="profile_img">

                 

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