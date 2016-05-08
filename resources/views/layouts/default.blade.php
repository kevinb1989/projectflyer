 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('title')

  <!-- Fonts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

  <!-- Styles -->
  <link rel="stylesheet" href="{{url('css/app.css')}}" type="text/css">
  <link rel="stylesheet" href="{{url('css/all.css')}}" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" type="text/css">

</head>
<body style='padding-top: 70px;' id="app-layout">
	<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        {!!link_to_route('home_path', 'Project Flyer', null, ['class' => 'navbar-brand'])!!}
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active">{!!link_to_route('flyers.index', 'all flyers')!!}</li>
          <li>{!!link_to_route('about_path', 'about')!!}</li>
          <li>{!!link_to_route('contact_path', 'contact')!!}</li>
        </ul>

        
          <ul class="nav navbar-nav navbar-right">
            @if($signedIn)
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><u>{{ $user->name }}</u> <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('users/profile') }}">Profile</a></li>
                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                  </ul>
              </li>
            @else
              <li><a href="{{url('/login')}}">Login</a></li>
              <li><a href="{{url('/register')}}">Register</a></li>
            @endif
          </ul>
      </div>
    </div>
  </nav>

  <div class='container'>
   @yield('content')
 </div>


 <!--<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>-->
 <!-- Latest compiled and minified JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="http://localhost:8888/projectflyer/public/js/all.js"></script>
 <!--<script type="text/javascript">
    swal({   
      title: "Error!",
      text: "Here's my error message!",
      type: "error",
      confirmButtonText: "Cool"
    });
  </script>-->

  @yield('customscript.footer')

</body>
</html> 