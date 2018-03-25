<div id="mail" class="contact">
    <div class="container">
        <h3 class="w3_agileits_head">Contacto con <span class="w3_child">G</span><span class="w3_child1">K</span><span
                    class="w3_child4">i</span><span class="w3_child2">n</span><span class="w3_child1">d</span><span
                    class="w3_child">e</span><span class="w3_child1">r</span></h3>
        <p class="w3_agile_elit">Conctactenos por cualquier duda que tenga.</p>
        <div class="agile_banner_bottom_grids">
            <div class="col-md-4 w3_agile_contact_grid">
                <div class="col-xs-4 agile_contact_grid_left">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="col-xs-8 agile_contact_grid_right agilew3_contact">
                    <h4>Dirección</h4>
                    <p>Ejercito Argentino 456, Las Heras, Mendoza</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 w3_agile_contact_grid">
                <div class="col-xs-4 agile_contact_grid_left agileits_w3layouts_left">
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                </div>
                <div class="col-xs-8 agile_contact_grid_right agileits_w3layouts_right">
                    <h4>Teléfono</h4>
                    <p>+(54) 2615965966</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 w3_agile_contact_grid">
                <div class="col-xs-4 agile_contact_grid_left agileits_w3layouts_left1">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </div>
                <div class="col-xs-8 agile_contact_grid_right agileits_w3layouts_right1">
                    <h4>Email</h4>
                    <p><a href="mailto:info@example.com">comercial@gkinder.com</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="agile_banner_bottom_grids">
            {!! Form::open(['method' => 'POST','route' => ['contactmail'],'style'=>'display:inline']) !!}
            {{ csrf_field() }}
                <div class="col-md-6 w3_agileits_contact_left">
						<span class="input input--akira">
							<input class="input__field input__field--akira" type="text" id="input-22" name="name"
                                   placeholder="" required=""/>
							<label class="input__label input__label--akira" for="input-22">
								<span class="input__label-content input__label-content--akira">Nombre</span>
							</label>
						</span>
                    <span class="input input--akira">
							<input class="input__field input__field--akira" type="email" id="input-23" name="email"
                                   placeholder="" required=""/>
							<label class="input__label input__label--akira" for="input-23">
								<span class="input__label-content input__label-content--akira">Email</span>
							</label>
						</span>
                    <span class="input input--akira">
							<input class="input__field input__field--akira" type="text" id="input-24" name="subject"
                                   placeholder="" required=""/>
							<label class="input__label input__label--akira" for="input-24">
								<span class="input__label-content input__label-content--akira">Asunto</span>
							</label>
						</span>
                </div>
                <div class="col-md-6 w3_agileits_contact_right">
                    <div class="w3_agileits_contact_right1">
                        <textarea name="message" placeholder="Comentario" required=""></textarea>
                    </div>
                    <div class="w3_agileits_contact_right2">
                        <input type="submit" value="">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            {!! Form::close() !!}
        </div>
    </div>
</div>