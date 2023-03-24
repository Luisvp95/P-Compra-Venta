@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-center fs-3">{{ __('Iniciar sesión') }}</div>
                    <div class="card-body">
                        <img src="{{ asset('image/logo/logo1.png') }}" class="mb-4 mx-auto d-block"
                            style="max-width: 100px; height: auto;">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3">
                                
                                <div class="col-md-8 mx-auto">
                                    <label for="email">{{ 'Dirección de correo electrónico' }}</label>
                                    <input id="email" type="email"
                                        class="form-control form-floating @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                   
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                             
                                <div class="col-md-8 mx-auto">
                                    <label for="password">{{ __('Contraseña') }}</label>
                                    <input id="password" type="password"
                                        class="form-control form-floating @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Recordar contraseña') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 mx-auto">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Iniciar sesión') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidó su contraseña?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
