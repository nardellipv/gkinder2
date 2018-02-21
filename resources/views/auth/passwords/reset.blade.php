@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="resp-tab-item tab_box">Reset Password</div>

                <div class="register agileits">
                    <form method="POST" action="{{ route('password.request') }}">
                            {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                                <input id="email" type="email" class="email{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                    required placeholder="email"> @if ($errors->has('email'))
                                <span class="invalid-feedback tab_box">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span> @endif
                            </div>
                            <div class="form-group row">
                                <input id="password" type="password" class="password{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required placeholder="Contraseña"> @if ($errors->has('password'))
                                <span class="invalid-feedback tab_box">
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
        </div>
    </div>
</div>
@endsection
