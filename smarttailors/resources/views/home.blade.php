@extends('layouts.app')

@section('content')
 

                
                 
        
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
  <a class="f-password" href="{{ url()->previous() }}">
                                        Go Back
                                    </a>
              <div class="title_right row">

                <div class="col-12  top_search">

                  <div class="input-group">
                   
                    <input onkeyup="myFunction()" type="text" id="myInput"  placeholder="Search for..." >
                   
                  </div>
                </div>
              </div>
              <?php
                    if  (Auth()->user()->role=="tailor") {
                    ?> 
            <div class="user-wrapper">
                <ul class="users" id="myUL">
                    @foreach($users as $user=> $value)
                    <?php
                   
                        if ($value->role=="tailor") {
                            
                        }else{
                    
                    ?>
                    @if($value->unread!=0)
                    
                    <li class="user" id="{{$value->id}}">
                         @if($value->unread!=0)
                        <span class="pending">{{$value->unread}}</span>
                        
                        @endif
                        <div class="media">
                            <div class="media-left">
                                <img src=" {{asset('public/images/'.$value->img)}}" alt="" class="media-object">
                            

                            </div>
                            <div class="media-body">
                                <p class="name">{{$value->name}}</p>
                                <p class="email">{{$value->city}} | {{$value->email}}</p>
                            </div>
                        </div></li>
                    <?php
                    unset($users[$user]);
                    ?>
                    @endif
                    <?php
                }
                ?>
                    @endforeach
                    @foreach($users as $user)
                    <?php
                    if ($user->role=="tailor") {
                           
                        }if ($user->role=="custumer"){
                    
                    ?>
                    <li class="user" id="{{$user->id}}">
                         @if($user->unread!=0)
                        <span class="pending">{{$user->unread}}</span>
                        
                        @endif
                        <div class="media">
                            <div class="media-left">
                                <img src=" {{asset('public/images/'.$value->img)}}" alt="" class="media-object">
                            </div>
                            <div class="media-body">
                                <p class="name">{{$user->name}}</p>
                                <p class="email">{{$user->city}} | {{$user->email}}</p>
                            </div>
                        </div></li>
                          <?php
                }
                ?>
                        @endforeach
                     
                </ul>
            </div>
            <?php
        }

                    if  (Auth()->user()->role=="custumer") {
                    ?> 
            <div class="user-wrapper">
                <ul class="users" id="myUL">
                    @foreach($users as $user=> $value)
                      <?php
                    if ($value->role=="custumer") {
                           
                        }else{
                    
                    ?>
                    
                    @if($value->unread!=0)
                    
                    <li class="user" id="{{$value->id}}">
                         @if($value->unread!=0)
                        <span class="pending">{{$value->unread}}</span>
                        
                        @endif
                        <div class="media">
                            <div class="media-left">
                                <img src=" {{asset('public/images/'.$value->img)}}" alt="" class="media-object">
                            </div>
                            <div class="media-body">
                                <p class="name">{{$value->name}}</p>
                                <p class="email">{{$value->city}} | {{$value->email}}</p>
                            </div>
                        </div></li>
                    <?php
                    unset($users[$user]);
                    ?>
                    @endif
                        <?php
                }
                ?>
                    @endforeach
                    @foreach($users as $user)
  <?php
                    if ($user->role=="custumer") {
                           
                        }else{
                    
                    ?>
                    <li class="user" id="{{$user->id}}">
                         @if($user->unread!=0)
                        <span class="pending">{{$user->unread}}</span>
                        
                        @endif
                        <div class="media">
                            <div class="media-left">
                                <img src=" {{asset('public/images/'.$value->img)}}" alt="" class="media-object">
                            </div>
                            <div class="media-body">
                                <p class="name">{{$user->name}}</p>
                                <p class="email">{{$user->city}} | {{$user->email}}</p>
                            </div>
                        </div></li>
                             <?php
                }
                ?>
                        @endforeach
                     
                </ul>
            </div>
            <?php
        }
        ?>
        </div>
        <div class="col-md-8" id="messages">
            
        </div>
    </div>
</div>

@endsection
