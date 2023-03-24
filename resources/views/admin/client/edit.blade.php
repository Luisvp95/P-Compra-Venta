@extends('layouts.admin')
@section('title', 'Editar cliente')
@section('styles')
@endsection
{{-- @section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('clients.create')}}">
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
                Editar cliente
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Cliente</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar cliente</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar cliente</h4>
                        </div>
                        {!! Form::model($client, ['route' => ['clients.update', $client], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" value="{{ $client->name }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Ingrese nombre del cliente">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="text" name="email" id="email" value="{{ $client->email }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Ingrese correo electrónico">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ci">CI</label>
                            <input type="text" name="ci" id="ci" value="{{ $client->ci }}"
                                class="form-control @error('ci') is-invalid @enderror" placeholder="Ingrese carnet de identidad">
                            @error('ci')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" name="address" id="address" value="{{ $client->address }}"
                                class="form-control @error('address') is-invalid @enderror" placeholder="Ingrese dirección">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono o Célular</label>
                            <input type="text" name="phone" id="phone" value="{{ $client->phone }}"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Ingrese celular/teléfono">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{ route('clients.index') }}" class="btn btn-light">Cancelar</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
