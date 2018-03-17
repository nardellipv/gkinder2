<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="box box-widget widget-user-2">
            <div class="widget-user-header bg-yellow">
                <h3 class="widget-user-username">{{ $school->name }}</h3>
                <h5 class="widget-user-desc">{{ $school->url }}</h5>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li><a href="#"><b>Dirección</b> <span class="pull-right">{{ $school->address }}</span></a></li>
                    <li><a href="#"><b>Ciudad</b> <span class="pull-right">{{ $school->city }}</span></a></li>
                    <li><a href="#"><b>Código Postal</b> <span class="pull-right">{{ $school->cp }}</span></a></li>
                    <li><a href="#"><b>Teléfono</b> <span class="pull-right">{{ $school->phone }}</span></a></li>
                    <li><a href="#"><b>Email</b> <span class="pull-right">{{ $school->email }}</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>