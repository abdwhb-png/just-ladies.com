<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- FavIcons -->
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/griffe.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/griffe.png') }}">

    <!-- BootstrapIcons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/06e28f27a4.js" crossorigin="anonymous"></script>
    @vite(['resources/sass/app.scss', 'resources/css/admin.css', 'resources/js/app.js'])
</head>
<body class="container-fluid">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('admin') }}">
                    Admin Panel
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        
                            @can('deep-gest-users')
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownUsers" class="nav-link dropdown-toggle @if (Route::getCurrentRoute()->uri() == 'admin/users' ||Route::getCurrentRoute()->uri() == 'admin/users/create') active @endif" aria-current="page" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{ route('admin.users.index') }}">USERS</a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownUsers">
                                    <a class="dropdown-item border-bottom" href="{{ route('admin.users.index') }}">
                                        {{ __('List') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.users.create') }}">
                                        {{ __('Add') }}
                                    </a>
                                </div>
                            </li>
                            @endcan
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownEscorts" class="nav-link dropdown-toggle @if (Route::getCurrentRoute()->uri() == 'admin/escorts/create' || Route::getCurrentRoute()->uri() == 'admin/escorts')  active @endif" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('ESCORTES') }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownEscorts">
                                    <a class="dropdown-item border-bottom" href="{{ route('admin.escorts.index') }}">
                                        {{ __('Liste') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.escorts.create') }}">
                                        {{ __('Ajouter') }}
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownMembers" class="nav-link dropdown-toggle @if (Route::getCurrentRoute()->uri() == 'admin/members/create' || Route::getCurrentRoute()->uri() == 'admin/members')  active @endif" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('MEMBRES') }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMembers">
                                    <a class="dropdown-item border-bottom" href="{{ route('admin.members.index') }}">
                                        {{ __('Liste') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.members.create') }}">
                                        {{ __('Ajouter') }}
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('/') }}">
                                        {{ __('Aller sur le site') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ url('admin') }}">
                                        {{ __('Messagerie') }}
                                    </a>
                                    <a class="dropdown-item" href="#"
                                       onclick="event.preventDefault();
                                                                                                                                                                        document.getElementById('logout-form').submit();">
                                        {{ __('D??connexion') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf</form>
                                    </a>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
    <script src="https://www.bemygirl.ch/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function sendImage(){
            $("#textForm").hide();
            $("#imageForm").show();
        };
        function sendText(){
            $("#textForm").show();
            $("#imageForm").hide();
        }
    </script>
    <script type="text/javascript">
        $('#messageBar').ready(function() {
            $('#messageBar').scrollTop($('#messageBar').height());
        });
    </script>
</body>
</html>
