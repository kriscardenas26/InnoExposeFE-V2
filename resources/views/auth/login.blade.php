@extends('layouts.auth_app')
@section('title')
    Iniciar sesión
@endsection
@section('content')
   
       
        <div class="card">
            <div class="logoContainer d-flex justify-content-center">
                <img src="img/Logo Icono.svg" width="100" alt="" srcset="">
            </div>

            <div class="card-body">
                <h2 class="card-title text-center">Iniciar Sesión</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger p-0">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input aria-describedby="emailHelpBlock" id="email" type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            placeholder="Ingresar correo electrónico" tabindex="1"
                            value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus
                            required>
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Contraseña</label>
                            <div class="float-right">
                                <a href="{{ route('password.request') }}" class="text-small">
                                   Olvidó contraseña?
                                </a>
                            </div>
                        </div>
                        <input aria-describedby="passwordHelpBlock" id="password" type="password"
                            value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                            placeholder="Ingresar contraseña"
                            class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                            tabindex="2" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                id="remember"{{ (Cookie::get('remember') !== null) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember" ">Recordarme</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block BotonIngresar" tabindex="4">
                            Iniciar Sesión
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-5 text-muted text-center">
        No tienes cuenta? <a
                href="{{ route('register') }}">Registrate</a>
    </div>
@endsection
