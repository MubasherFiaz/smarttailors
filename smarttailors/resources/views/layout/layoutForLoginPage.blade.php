
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-compatible" Content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    integrity="sha256-NuCn4IvuZXdBaFKJOAcsU2Q3ZpwbdFisd5dux4jkQ5w=" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="{{asset('public/css/style1.css')}}">


 
</head>

<body>

@yield('login_contents')





  <script type="text/javascript">


    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");



    function register() {
      x.style.left = "-400px";
      y.style.left = "50px";
      z.style.left = "110px";




    }
    function login() {
      x.style.left = "50px";
      y.style.left = "450px";
      z.style.left = "0px";


    }
  </script>
<script>
  $("#register").submit(function(event) {
    if($("#ch").is(':checked')) {
        setTimeout(function() { 
            alert('You chose email'); 
            submit = true;
        $("register").submit(); // if needed
        }, 2000);
    }
    else{}
    event.preventDefault();  // prevent page from being reloaded
});
</script>
</body>


</html>
