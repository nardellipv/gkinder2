<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/logo-profile.png') }}" class="img-circle" alt="imagen-perfil">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menú</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>Panel Principal</span></a></li>
            <li><a href="{{url('school/mensajes')}}"><i class="fa fa-envelope"></i> <span>Bandeja de entrada</span></a></li>
            <li><a href="{{url('school/calendario')}}"><i class="fa fa-calendar"></i> <span>Calendario</span></a></li>
        <!-- /.sidebar-menu -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>