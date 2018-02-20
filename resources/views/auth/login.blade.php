@extends('layouts.app') 
@section('content')
<div class="container">
        @if (Session::has('message'))
        <p class="resp-tab-item resp-tab-active">{!! Session::get('message') !!}</p>
        @endif
        @if (count($errors) > 0)
        
        <div class="resp-tab-item resp-tab-active">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif 
    <div class="tab">
        <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
            <script src="{{ asset('login-admin/js/easyResponsiveTabs.js') }}" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default', //Types: default, vertical, accordion
							width: 'auto', //auto or any width like 600px
							fit: true,   // 100% fit in a container
							closed: 'accordion', // Start closed if in accordion view
							activate: function(event) { // Callback function if tab is switched
								var $tab = $(this);
								var $info = $('#tabInfo');
								var $name = $('span', $info);
								$name.text($tab.text());
								$info.show();
							}
						});
						$('#verticalTab').easyResponsiveTabs({
							type: 'vertical',
							width: 'auto',
							fit: true
						});
					});
            </script>
            <div class="tabs">
                <div class="tab-left">
                    <ul class="resp-tabs-list">
                        <li class="resp-tab-item">Ingresar</li>
                        <li class="resp-tab-item">Registrarse</li>
                        <li class="resp-tab-item">Novedades</li>
                        <li class="resp-tab-item">Recuperar contraseña</li>
                        <li class="resp-tab-item">Contacto</li>
                    </ul>
                </div>
                <div class="tab-right">
                    <div class="resp-tabs-container">
                        <div class="tab-1 resp-tab-content">
                            <div class="w3l-sign-in">
                                <h3>Ingresar</h3>
                                <form method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <input id="email" type="email" class="name{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                        required autofocus placeholder="email"> @if($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                                    <input id="password" type="password" class="password{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                        required placeholder="contraseña"> @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                                    <ul class="w3agile">
                                        <li>
                                            <input type="checkbox" name="remember" id="brand1" value="" {{ old( 'remember') ? 'checked' : '' }}>
                                            <label for="brand1"><span></span>Remember me</label>
                                        </li>
                                    </ul>
                                    <input type="submit" value="Ingresar">
                                    <div class="clear"></div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-1 resp-tab-content">
                            <div class="register agileits">
                                <h3>Registrarse</h3>
                                <form method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="name{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                            placeholder="Nombre y Apellido" required autofocus>                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span> @endif
                                    </div>
                                    <div class="form-group row">
                                        <input id="email" type="email" class="email{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                            required placeholder="email"> @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span> @endif
                                    </div>
                                    <div class="form-group row">
                                        <input id="password" type="password" class="password{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                            required placeholder="Contraseña"> @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span> @endif
                                    </div>
                                    <div class="form-group row">
                                        <input id="password-confirm" type="password" class="password" name="password_confirmation" required placeholder="Confirmar Contraseña">
                                    </div>
                                    <input type="submit" value="Registrarse">
                                    <div class="clear"></div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-1 resp-tab-content gallery-images">
                            <div class="register agileits">
                                <h3>Novedades</h3>
                                {!! Form::open(['method' => 'POST','route' => ['newsLetter'],'style'=>'display:inline']) !!} {{ csrf_field() }}
                                <input type="text" class="email" name="email" placeholder="Email" required="">
                                <input type="submit" value="Darme de alta">
                                <div class="clear"></div>
                                {!! form::Close() !!}
                            </div>
                        </div>
                        <div class="tab-1 resp-tab-content">
                            <div class="register agileits">
                                <h3>Recuperar Contraseña</h3>
                                {!! Form::open(['method' => 'POST','route' => ['password.email'],'style'=>'display:inline']) !!} {{ csrf_field() }}                                
                                    <input type="text" class="email" name="email" placeholder="Email" required="">
                                    <input type="submit" value="Enviar mail">
                                    <div class="clear"></div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-1 resp-tab-content">
                            <div class="agile-send-mail">
                                <h3>Formulario de contacto</h3>
                                <form action="#" method="post">
                                    <input type="text" class="name" name="username" placeholder="Your Name" required="">
                                    <input type="text" class="email" name="email" placeholder="Your Email" required="">
                                    <textarea name="your message" placeholder="Your Message"></textarea>
                                    <input type="submit" value="Send Email">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
@endsection