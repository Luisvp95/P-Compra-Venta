@extends('layouts.admin')
@section('title', 'Editar usuario')
@section('styles')
@endsection
{{-- @section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('users.create')}}">
        <span class="btn btn-primary">+Crear nuevo</span>
    </a>
</li>
@endsection --}}
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Editar usuario
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar usuario</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar usuario</h4>
                        </div>
                        {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" value="{{ $user->name }}" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Ingrese nombre de usuario">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input value="{{ $user->email }}" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Ingrese correo electrónico">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Ingrese contraseña">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Roles</label>
                            {!! Form::select(
                                'roles[]',
                                $roles,
                                [],
                                ['class' => 'form-control' . ($errors->has('roles') ? ' is-invalid' : ''),'name'=>'roles', 'placeholder' => 'Seleccione un rol']
                            ) !!}
                            
                             @if ($errors->has('roles'))
                             <div class="invalid-feedback">{{ $errors->first('roles') }}</div>
                         @endif
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{ route('users.index') }}" class="btn btn-light">Cancelar</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
