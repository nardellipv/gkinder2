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
            <li class="active"><a href="#"><i class="fa fa-dashboard"></i> <span>Panel Principal</span></a></li>
            <li><a href="#"><i class="fa fa-users"></i> <span>Listado Alumnos</span></a></li>
            <li><a href="#"><i class="fa fa-user"></i> <span>Listado Docentes</span></a></li>
            <li><a href="#"><i class="fa fa-envelope"></i> <span>Bandeja de entrada</span></a></li>
            <li><a href="#"><i class="fa fa-calendar"></i> <span>Calendario</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-user-plus"></i> <span>Agregar</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
                <ul class="treeview-menu">
                    <li><a href="#">Agregar Alumno</a></li>
                    <li><a href="#">Agregar Padres/Tutores</a></li>
                    <li><a href="#">Agregar Docente</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>