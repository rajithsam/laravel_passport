<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Mesh Login App </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    
        @import url('//ajax.googleapis.com/ajax/libs/angular_material/0.8.3/angular-material.min.css');
        .login-form 
        {
            md-card 
            {
                padding: 0!important;

                md-card-title 
                {
                    background-color: blue;
                }
            }
        }
        
    </style>

</head>

<body>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Mesh Login App
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
                            <li><a href="{{ route('mesh_login') }}">Mesh Login</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular-animate.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular-messages.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular-aria.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.js"></script>
    <script src="//cdn.jsdelivr.net/angular-material-icons/0.4.0/angular-material-icons.min.js"></script>
    
    <script>
        var app = angular.module('LoginForm',['ngMaterial','ngAnimate','ngAria','ngMessages'])
                .controller('Ctrl', function( $scope, $http, $location, $mdDialog )
                {
                    $scope.vm = {
                        formData: {
                            email: 'admin@rms.com',
                            password: 'password'
                        }
                    };

                    $scope.vm.login = function()
                    {
                        console.log( $scope.vm.formData );
                        var data = {
                            client_id: 2,
                            client_secret :'5X8PIn4YXtF2MM2gAb0C64iSF4yKxwjhD4jQY5ip',
                            grant_type : 'password',
                            username :$scope.vm.formData.email,
                            password :$scope.vm.formData.password
                        }
                       
                        $http.post("oauth/token", data )
                             .then(function(data, status) 
                            {
                                console.log(data);
                                //$location.url('home');
                                window.location = "http://localhost/meshHIRE/public/home"
                            },
                            function(data) 
                            {
                                alert('Unauthorized!!');
                            }); 
                    }
                
                });
    </script>

</body>
</html>
