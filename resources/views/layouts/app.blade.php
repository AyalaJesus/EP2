<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-material-design-master/dist/css/bootstrap-material-design.css') }}" rel="stylesheet">
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
                        {{ config('app.name', 'Laravel') }}
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
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        @if( Auth::user()->customer())
                        <li>
                          <a data-toggle="modal" data-target="#myModal">
                            <input type="image" src="{{asset('/images/acceso/carrito.png')}}" alt="permiso restringido" height="20"
                            >
                          </a>
                        </li>
                        @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  @if( Auth::user()->admin())
                                  <li>
                                      <a href="{{url('/products')}}">Gestión producto</a>
                                      <a href="{{url('/products/create')}}">Agregar producto</a>
                                      <a href="{{url('/categories')}}">Gestión categorias</a>
                                      <a href="{{url('/categories/create')}}">Agregar categoria</a>
                                      <a href="{{url('/orders')}}">Ver pedidos</a>
                                  </li>
                                  @endif
                                  @if( Auth::user()->customer())
                                  <li>
                                      <a href="{{url('/products')}}">Menu principal</a>
                                  </li>
                                  @endif
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
    <script type="text/javascript">
      function eliminarProducto(data) {
        $.ajax({
        type:"DELETE",
        url:'/products/'+data,
        data:{"_token": "{{ csrf_token() }}" },
        success:function(result)
          {
          }
      });
      }
    </script>
    <script type="text/javascript">
      function eliminarCategoria(data) {
        $.ajax({
        type:"DELETE",
        url:'/categories/'+data,
        data:{"_token": "{{ csrf_token() }}" },
        success:function(result)
          {
          }
      });
      }
    </script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
