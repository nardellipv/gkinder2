<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>G</b>K</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>G</b>Kinder</span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                    {{-- <img src="{{ asset('dist/img/logo-profile.png') }}" class="img-circle" alt="imagen-perfil">--}}
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{Auth::user()->name}} <i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset('dist/img/logo-profile.png') }}" class="img-circle" alt="imagen-perfil">
                            <p>
                                {{Auth::user()->name}}-{{Auth::user()->user_type}}
                                <small>Miembro desde {{Auth::user()->created_at->format('d/m/y')}}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            @if(auth()->user()->user_type == 'ADMIN')
                                <div class="pull-left">
                                    <a href="{{URL('school/perfil', auth()->user()->school_id)}}"
                                       class="btn btn-default btn-flat">Perfil</a>
                                </div>
                            @endif
                            <div class="pull-right">
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Salir
                                </a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>