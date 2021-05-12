<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Clocking</title>

    <!-- Styles -->

    <style type="text/css">
		body { font-family: Helvetica, sans-serif; background-color:white; }
		h2, h3 { margin-top:0; }
		form { margin-top: 15px; }
		form > input { margin-right: 15px; }
		#results { float:right; margin:20px; padding:20px; border:1px solid; background:#4682B4; }
        #body{ background-color:white;padding-top:5em;}
	</style>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>

     <!-- Styles to display notifications from database
    <link href="https:cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https:cdnjs.cloudflare.com/ajax/libs/font-awesame/5.11.2/css/all.min.css" rel="stylesheet">
    <link href="https:cdnjs.cloudflare.com/ajax/libs/font-awesame-animation/0.2.1/font-awesame-animation.min.css/" rel="stylesheet">
-->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel='stylesheet' type='text/css'>
</head>
<body id="body">

    <div id="app">
        <nav class="navbar navbar-light navbar-fixed-top" style="background-color:green;font-color:white" >
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed navbar-default"  data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                     <a class=" " href="{{ url('/home') }}"> 
                    <b style="color:white">Clocking<br/>
                      {{ Auth::user()->email }}&nbsp;[{{ Auth::user()->role }}] </b>
                     </a> 
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            @if (Route::has('login') )
                               @if (url()->current() == 'http://127.0.0.1:8000/login' )
                                
                            <li><a href="{{ route('register') }}"><b>Register</b></a></li>
                               
                               @elseif (url()->current() == 'http://127.0.0.1:8000/register' )
                                
                            <li><a href="{{ route('login') }}"><b>Login</b></a></li>
                               
                               @endif
                            @endif
                        @else
           

                           
                           <li><a href="{{ route('report.index') }}" style="color:white"><b>Report</b></a></li>
                                
                            </li>   
                                <!--displays Users link for Admins only-->
                                @if (Auth::user()->role == 'admin')
                                 <li><a href="{{ url('user') }}" style="color:white;"><b>Users</b></a></li>
                                 @endif            

                                    <li>
                                        <a href="{{ route('logout') }}" style="color:white;"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <b> Logout</b>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                             
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @include('partials.errors')
        @include('partials.success')
        @yield('content')
        @include('Users.create')
        
    </div>

        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jQuery-2.1.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>
        
</html>
