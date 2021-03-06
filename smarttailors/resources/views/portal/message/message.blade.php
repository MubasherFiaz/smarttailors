@extends('layouts.msg')

@section('content')
        <div class="col-12">
                 
        <a class="f-password" href="{{ url()->previous() }}">
                                        Go Back
                                    </a>
                           
        </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="user-wrapper">
                <ul class="users">
                    @foreach($users as $user)
                    <li class="user" id="{{$user->id}}">
                        <!-- @if($user->unread)
                        <span class="pending">{{$user->unread}}</span>
                        @endif -->
                        <div class="media">
                            <div class="media-left">
                                <img src="https://via.placeholder.com/150" alt="" class="media-object">
                            </div>
                            <div class="media-body">
                                <p class="name">{{$user->name}}</p>
                                <p class="email">{{$user->email}}</p>
                            </div>
                        </div></li>
                        @endforeach
                     
                </ul>
            </div>
        </div>
        <div class="col-md-8" id="messages">
            
        </div>
    </div>
</div>
@endsection
