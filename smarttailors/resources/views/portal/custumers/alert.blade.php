     <div id="alert">
       <div class="alert alert-success alert-dismissible" id="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Measurement Added.
  </div>

      @if(session('message'))
  <div class="alert alert-success alert-dismissible" id="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{session('message')}}.
  </div>
@endif              
  
@if( count($errors) > 0)
       @foreach ( $errors->all() as $error)
       <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error! </strong> {{ $error  }}.</div>
        @endforeach
        @endif
      </div>