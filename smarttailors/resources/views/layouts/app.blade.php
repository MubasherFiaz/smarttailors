<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Smart Tailors') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <style>
        ul {
            margin: 0;
            padding: 0;
        }
        li{
            list-style: none;
        }
        .user-wrapper, .message-wrapper{
            border: 1px solid #dddddd;
            overflow-y: auto;
        }
        .user-wrapper{
            height: 500px;
        }
        .user{
            cursor: pointer;
            padding : 5px 0;
            position: relative;
        }
        .user:hover{
            background: #eeeeee;
        }
        .user:last-child{
            margin-bottom: 0;
        }
        .pending {
            position: absolute;
            left: 13px;
            top: 9px;
            background: #b600ff;
            margin: 0;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            line-height: 18px;
            padding-left: 5px;
            color: #ffffff;
            font-size: 12px;
        }
        .media-left{
            margin: 0 10px; 
        }
        .media-left img {
            width: 64px;
            border-radius: 64px;
        }
        .media-body p {
            margin: 6px 0;
        }
        .message-wrapper{
            padding: 10px;
            height: 536px;
            background: #eeeeee;
        }
        .messages .message{
            margin-bottom: 15px;
        }
        .message .message:last-child{
            margin-bottom: 0;
        }
        .received, .sent {
            width: 45%;
            padding: 3px 10px;
            border-radius: 10px;
        }
        .received {
            background: #ffffff;
            float: right;
            text-align: right;
        }
        .sent{
            background: #3bebff;

        }
        .message p {
            margin: 5px 0;
        }
        .date {
            color: #777777;
            font-size: 12px;
        }
        .active{
            background: #eeeeee;
        }
        input[type=text]{
            width: 100%;
            padding: 12px 20px;
            margin: 15px 0 0 0;
            display: inline-block;
            border-radius: 4px
            box-sizing: border-box;
            outline: none;
            border: 1px solid #cccccc;
        }
        input[type=text]:focus{
            border: 1px solid #aaaaaa;
        }

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Smart Tailors') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('choose') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://js.pusher.com/5.1/pusher.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        var received_id = '';
        var my_id = "{{ Auth::id() }}";
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
            });

    
            
            
             Pusher.logToConsole = true;

var pusher = new Pusher('686417912c102faa55d3', {
      cluster: 'ap2',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        
       // alert(JSON.stringify(data));
     if (my_id == data.from) {
                 //   alert('sender');

                $('#' + data.to).click();
            } else if (my_id == data.to) {
                if (received_id  == data.from) {
                    // if receiver is selected, reload the selected user ...
                //    alert('sender');
                    $('#' + data.from).click();
                } else {
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.from).find('.pending').html());

                    if (pending) {
                        $('#' + data.from).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.from).append('<span class="pending">1</span>');
                    }
                }
            }
    });
        $('.user').click(function(){
            $('.user').removeClass('active');
            $(this).addClass('active');
            $(this).find('.pending').remove();

            received_id = $(this).attr('id');
            //alert(received_id);
            $.ajax({
                type: "get",
                url: "message/" + received_id,
                data: "",
                cache: false,
                success: function (data){
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            })
        });
        $(document).on('keyup','.input-text input', function(e)
        {
            var message = $(this).val();
            if(e.keyCode == 13 && message != '' && received_id != '')
            {
                $(this).val(''); //while pressed enter text box will be empty
                var datastr = "receiver_id=" + received_id + "&message=" +message;
                $.ajax({
                    type : "post",
                    url : "message",
                    data : datastr,
                    cache: false,
                    success: function (data){
                  $.ajax({
                type: "get",
                url: "message/" + received_id,
                data: "",
                cache: false,
                success: function (data){
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            })
                    

                    },
                    error: function (jqXHR, status, err)
                    {

                    },
                    complete: function(){
                        scrollToBottomFunc();
                    }
                })
            }
        });
        });
        // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }

function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByClassName("name")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
</body>
</html>