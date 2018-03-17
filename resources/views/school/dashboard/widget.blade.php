<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$countStudents}}</h3>
        <p>Cantidad Alumnos</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="{{url('school/estudiantes')}}" class="small-box-footer">
          Ir al listado de alumnos <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$countMessages}}</h3>
        <p>Mensajes sin Leer</p>
      </div>
      <div class="icon">
        <i class="fa fa-envelope-o"></i>
      </div>
      <a href="{{url('school/mensajes')}}" class="small-box-footer">
          Ir a la bandeja de entrada <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$countTeachers}}</h3>
        <p>Cantidad Profesores</p>
      </div>
      <div class="icon">
        <i class="ion ion-person"></i>
      </div>
      <a href="{{url('school/profesores')}}" class="small-box-footer">
          Ir al listado de profesores <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{$countEvents}}</h3>
        <p>Cantidad Eventos</p>
      </div>
      <div class="icon">
        <i class="fa fa-calendar"></i>
      </div>
      <a href="{{url('school/calendario')}}" class="small-box-footer">
          Ir al calendario <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
  </div>
  <!-- ./col -->
</div>