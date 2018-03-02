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
        <h3>{{$countRooms}}</h3>
        <p>Cantidad Salas</p>
      </div>
      <div class="icon">
        <i class="fa fa-home"></i>
      </div>
      <a href="#" class="small-box-footer">
          Ir al listado de salas <i class="fa fa-arrow-circle-down"></i>
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
      <a href="#" class="small-box-footer">
          Ir al calendario <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
  </div>
  <!-- ./col -->
</div>