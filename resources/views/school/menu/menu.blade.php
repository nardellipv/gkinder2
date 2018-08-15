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
            <li><a href="{{ url('school/home') }}"><i class="fa fa-dashboard"></i> <span>Panel Principal</span></a></li>
            <li><a href="{{url('school/estudiantes')}}"><i class="fa fa-users"></i> <span>Listado Alumnos</span></a>
            </li>
            <li><a href="{{url('school/profesores')}}"><i class="fa fa-user"></i> <span>Listado Profesores</span></a>
            </li>
            <li><a href="{{url('school/tutores')}}"><i class="fa fa-user"></i> <span>Listado Tutores</span></a></li>
            <li><a href="{{url('school/circulares')}}"><i class="fa fa-file-text"></i> <span>Listado Circulares
                    <small class="label pull-right bg-green">{{ $circular }}</small></span></a></li>
            <li><a href="{{url('school/mensajes')}}"><i class="fa fa-envelope"></i> <span>Bandeja de entrada
                    <small class="label pull-right bg-green">{{ $message }}</small></span></a></li>
            <li><a href="{{url('school/calendario')}}"><i class="fa fa-calendar"></i> <span>Calendario</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-user-plus"></i> <span>Agregar</span>
                    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('school/tutores/create')}}">Tutor</a></li>
                    <li><a href="{{url('school/estudiantes/create')}}">Alumno</a></li>
                    <li><a href="{{url('school/profesores/create')}}">Profesor</a></li>
                    <li><a href="{{url('school/salas/create')}}">Sala/Aula</a></li>
                    <li><a href="{{url('school/calendario/create')}}">Crear Evento en el calendario</a></li>
                    <li><a href="{{url('school/circulares/create')}}">Crear Circular</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>