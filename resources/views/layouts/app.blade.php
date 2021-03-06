<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
   {{--!!<script src="{{ asset('js/app.js') }}" defer></script>!!--}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    

</head>
<body>
    <div id="app">
        
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro Usuarios') }}</a>
                                </li>
                            @endif
                        @else
                        @can('zonas-editar')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('zonas.index') }}">{{ __('Zonas') }}</a>
                        </li>
                        @endcan
                        @can('roles-editar')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('roles.index') }}">{{ __('Roles') }}</a>
                        </li>
                        @endcan
                        @can('users-editar')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">{{ __('Usuarios') }}</a>
                        </li>
                        @endcan
                        @can('registros-editar')
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('tickets.index') }}">{{ __('Tickets') }}</a>
                        </li>
                        @endcan 
                        @can('registros-borrar')
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('registros.eliminar') }}">{{ __('Borrar Tickets') }}</a>     
                        </li>
                        @endcan 
                        
                        
                            <li class="nav-item dropdown">
                               
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>                                   
                                    {{ Auth::user()->name." ".Auth::user()->getRoleNames()}} <span class="caret"></span>
                                </a>
                              
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
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
            @include('flash-message')
            @yield('content')
        </main>
    </div>
    @yield('home')
    @yield('script')
    @yield('scrusers')
    @yield('scrroles')
  
    
   
</body>
</html>
