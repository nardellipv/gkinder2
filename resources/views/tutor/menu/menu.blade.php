<aside class="main-sidebar">
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
        <ul class="sidebar-menu">
            <li class="header">Menú</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>Panel Principal</span></a></li>
            <li><a href="{{url('tutor/mensajes')}}"><i class="fa fa-envelope"></i> <span>Bandeja de entrada</span>
                    <small class="label pull-right bg-green">{{ $messageTutor }}</small>
                </a></li>
            <li><a href="{{url('tutor/eventos')}}"><i class="fa fa-calendar"></i> <span>Calendario</span></a></li>
        </ul>
    </section>
</aside>