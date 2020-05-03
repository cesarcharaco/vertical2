
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vertical') }}</title>

    @include('layouts.partials.stylesheet')
    
</head>
<!-- class="animsition"-->
<body class="">
    <div id="app">
        <div class="page-wrapper">

            
                @auth
                <!-- HEADER MOBILE-->
                <header class="header-mobile d-block d-lg-none">
                    <div class="header-mobile__bar">
                        <div class="container-fluid">
                            <div class="header-mobile-inner">
                                <a class="logo" href="index.html">
                                    <img src="{{ asset('images/icon/logo.png') }}" alt="GBM Hugo Chávez" />
                                </a>
                                <button class="hamburger hamburger--slider" type="button">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar-mobile">
                        <div class="container-fluid">
                            <ul class="navbar-mobile__list list-unstyled">
                                <li class="has-sub">
                                    <a class="js-arrow" href="#">
                                        <i class="fas fa-tachometer-alt"></i>Vertical</a>
                                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                        @php $modulos=modulos('Vertical'); @endphp
                                        @foreach($modulos as $key)
                                            @php $ruta=$key->ruta.".index"; 

                                            @endphp
                                        <li>
                                            @if(buscar_p($key->modulo,'Listar')=="Si")
                                            <a href="{{route($ruta)}}">{{ $key->modulo }}</a>
                                            @endif
                                        </li>
                                        @endforeach

                                    </ul>
                                <ul class="list-unstyled navbar__list">
                                <li class="active has-sub">
                                    <a class="js-arrow" href="#">
                                        <i class="fas fa-tachometer-alt"></i>Mantenimiento</a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                            
                                        @php $modulos=modulos('Mantenimiento'); @endphp
                                        @foreach($modulos as $key)
                                            @php $ruta=$key->ruta.".index"; 

                                            @endphp
                                        <li>
                                            <a href="{{route($ruta)}}">{{ $key->modulo }}</a>
                                        </li>
                                        @endforeach
                                        @if(buscar_p($key->modulo,'Listar')=="Si")
                                        <li>
                                        <a href="{{route('visitas.index')}}"> Visitas</a>  

                                        </li>
                                        @endif
                                        {{-- <li>
                                            <a href="{{ route('bitacora.index') }}">Bitácora</a>
                                        </li> --}}
                                    </ul>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__list">
                                <li class="active has-sub">
                                    <a class="js-arrow" href="#">
                                        <i class="fas fa-tachometer-alt"></i>Administración</a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        @php $modulos=modulos('Root'); @endphp
                                        @foreach($modulos as $key)
                                        @if($key->ruta=="asistencias")
                                            @php $ruta=$key->ruta.".empleados"; 

                                            @endphp
                                        @else
                                            @php $ruta=$key->ruta.".index"; 

                                            @endphp
                                        @endif    
                                        @if(buscar_p($key->modulo,'Listar')=="Si")
                                        <li>
                                            <a href="{{route($ruta)}}">{{ $key->modulo }}</a>
                                        </li>
                                        @endif
                                        
                                        @endforeach
                                         
                                    </ul>
                                </li>
                                        
                            </ul>
                        </div>
                    </nav>
                </header>
                <!-- END HEADER MOBILE-->

                <!-- MENU SIDEBAR-->
                <aside class="menu-sidebar d-none d-lg-block">
                    <div class="logo">
                        <a href="#">
                            <img src="{{ asset('images/icon/logo.png') }}" alt="Cool Admin" />
                        </a>
                    </div>
                    <div class="menu-sidebar__content js-scrollbar1">
                        <nav class="navbar-sidebar">
                            <ul class="list-unstyled navbar__list">
                                <li class="active has-sub">
                                    <a class="js-arrow" href="#">
                                        <i class="fas fa-tachometer-alt"></i>Vertical</a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        @php $modulos=modulos('Vertical'); @endphp
                                        @foreach($modulos as $key)
                                            @php $ruta=$key->ruta.".index"; 

                                            @endphp
                                        @if(buscar_p($key->modulo,'Listar')=="Si")
                                        <li>    
                                            <a href="{{route($ruta)}}">{{ $key->modulo }}</a>
                                        </li>
                                        @endif
                                        @endforeach
                                        
                                    </ul>
                                </li>
                                
                            </ul>
                             <ul class="list-unstyled navbar__list">
                                <li class="active has-sub">
                                    <a class="js-arrow" href="#">
                                        <i class="fas fa-tachometer-alt"></i>Mantenimiento</a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        @php $modulos=modulos('Mantenimiento'); @endphp
                                        @foreach($modulos as $key)
                                            @php $ruta=$key->ruta.".index"; 

                                            @endphp
                                        @if(buscar_p($key->modulo,'Listar')=="Si")
                                        <li>
                                            <a href="{{route($ruta)}}">{{ $key->modulo }}</a>
                                        </li>
                                        @endif
                                        @endforeach
                                        {{-- <li>
                                            <a href="{{ route('bitacora.index') }}">Bitácora</a>
                                        </li> --}}
                                    </ul>
                                </li>
                                
                            </ul>
                            <ul class="list-unstyled navbar__list">
                                <li class="active has-sub">
                                    <a class="js-arrow" href="#">
                                        <i class="fas fa-tachometer-alt"></i>Administración</a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        @php $modulos=modulos('Root'); @endphp
                                        @foreach($modulos as $key)
                                        @if($key->ruta=="asistencias")
                                            @php $ruta=$key->ruta.".empleados"; 

                                            @endphp
                                        @else
                                            @php $ruta=$key->ruta.".index"; 

                                            @endphp
                                        @endif
                                        @if(buscar_p($key->modulo,'Listar')=="Si")
                                        <li>
                                            <a href="{{route($ruta)}}">{{ $key->modulo }}</a>
                                        </li>

                                        
                                        @endif
                                        @endforeach
                                        
                                    </ul>
                                </li>
                                        
                            </ul>
                        </nav>
                    </div>
                </aside>
                <!-- END MENU SIDEBAR-->

                <!-- PAGE CONTAINER-->
                <div class="page-container">
                    <!-- HEADER DESKTOP-->
                    <header class="header-desktop">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                <div class="header-wrap">
                                    {{-- NOTIFICACIONES --}}
                                        {{-- <div class="header-button">
                                        <div class="account-wrap">
                                            <div class="account-item clearfix js-item-menu">
                                                <div class="image">
                                                    <img src="{{ asset('images/notificacion.png') }}" alt="John Doe" />
                                                </div>
                                                <div class="content">
                                                    <a class="js-acc-btn" href="#">
                                                    @if(solicitudes_espacio()>0)
                                                {{ solicitudes_espacio() }}
                                                    @endif 
                                                Notificaciones</a>
                                                </div>
                                                <div class="account-dropdown js-dropdown">
                                                    
                                                    <div class="account-dropdown__body">
                                                        <div class="account-dropdown__item">
                                                            <a href="#">
                                                                <i class="zmdi zmdi-account"></i>Solicitudes de Espacio</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                    
                    
                        <div class="header-wrap">    <div class="noti-wrap">
                            <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">
                                            @if(solicitudes_espacio()>0)
                                                {{ solicitudes_espacio() }}
                                            @endif
                                        </span>
                                        @if(solicitudes_espacio()>0)
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>Tiene {{ solicitudes_espacio() }} Notificaciones</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p><a href="{{ route('solicitudes.index') }}">Notificaiones de Espacio</a></p>
                                                    {{-- <span class="date">April 12, 2018 06:50</span> --}}
                                                </div>
                                            </div>
                                            {{-- <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div> 
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>--}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        
                    
                                    {{-- FIN DE NOTIFICATIONES --}}
                                    <div class="header-button">
                                        <div class="account-wrap">
                                            <div class="account-item clearfix js-item-menu">
                                                <div class="image">
                                                    <img src="{{ asset('images/icon/avatar.jpg') }}" alt="John Doe" />
                                                </div>
                                                <div class="content">
                                                    <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                                </div>
                                                <div class="account-dropdown js-dropdown">
                                                    <div class="info clearfix">
                                                        <div class="image">
                                                            <a href="#">
                                                                <img src="{{ asset('images/icon/avatar.jpg') }}" alt="John Doe" />
                                                            </a>
                                                        </div>
                                                        <div class="content">
                                                            <h5 class="name">
                                                                <a href="#">{{ Auth::user()->name }}</a>
                                                            </h5>
                                                            <span class="email">{{ Auth::user()->tipo_usuario }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="account-dropdown__body">
                                                        <div class="account-dropdown__item">
                                                            <a href="#">
                                                                <i class="zmdi zmdi-account"></i>Cuenta</a>
                                                        </div>
                                                        <div class="account-dropdown__item">
                                                            <a href="#">
                                                                <i class="zmdi zmdi-settings"></i>Configuraciones</a>
                                                        </div>
                                                        <div class="account-dropdown__item">
                                                            <a href="#">
                                                                <i class="zmdi zmdi-money-box"></i>Dinero</a>
                                                        </div>

                                                         <div class="account-dropdown__item">
                                                            <a href="{{asset('manual/manual.pdf')}}" target="_blank">
                                                                <i class="zmdi zmdi-account"></i>Manual Usuario</a>
                                                        </div>

                                                        <div class="account-dropdown__item">
                                                            <a href="{{route('ayuda_linea')}}" >
                                                                <i class="zmdi zmdi-account"></i>Manual Interactivo</a>
                                                        </div>
                                                    </div>
                                                    <div class="account-dropdown__footer">
                                                        <a href="{{ route('logout') }}">
                                                            <i class="zmdi zmdi-power"></i>Salir</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- HEADER DESKTOP-->
                    <!-- MAIN CONTENT-->

                    
                            
                                @yield('content')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="copyright">
                                            <p>Vertical. Todos los derechos reservados.<br>T.S.U. Manuel Martinez y T.S.U. Ronald Ramirez</p>
                                        </div>
                                    </div>
                                </div>
                        
                </div>

            @else

                <div class="page-content--bge5">
                    <div class="container">
                        @yield('content')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Vertical. Todos los derechos reservados.<br>T.S.U. Manuel Martinez y T.S.U. Ronald Ramirez</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endauth            
                
        </div>
    </div>
    
    @include('layouts.partials.scripts')

</body>
</html>
