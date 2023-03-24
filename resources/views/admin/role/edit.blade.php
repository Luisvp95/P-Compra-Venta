@extends('layouts.admin')
@section('title', 'Editar rol')
@section('styles')
@endsection
{{-- @section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('roles.create')}}">
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
                Editar rol
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Rols</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar rol</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar rol</h4>
                        </div>
                        {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            <label for="name">Nombre del rol</label>
                            <input type="text" name="name" id="name" value="{{ $role->name }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Ingrese nombre del rol">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Permisos para este rol</label>
                            @if ($errors->has('permission'))
                                <div class="invalid-feedback d-block">{{ $errors->first('permission') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ Form::checkbox('select_all', 1, false, ['id' => 'select_all']) }} Seleccionar
                                todo</label>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group checkbox-grid">
                                    <h3 class="h5 mb-4">Permisos Usuario</h3>
                                    @foreach ($userPermission as $id => $name)
                                        <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name' . ($errors->has('permission') ? ' is-invalid' : ''), 'name' => 'permission[]']) }}
                                            {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group checkbox-grid">
                                    <h3 class="h5 mb-4">Permisos de rol</h3>
                                    @foreach ($rolPermission as $id => $name)
                                        <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                                            {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group checkbox-grid">
                                    <h3 class="h5 mb-4">Permisos de categoria</h3>
                                    @foreach ($categoryPermission as $id => $name)
                                        <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                                            {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group checkbox-grid">
                                    <h3 class="h5 mb-4">Permisos de cliente</h3>
                                    @foreach ($clientPermission as $id => $name)
                                        <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                                            {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group checkbox-grid">
                                    <h3 class="h5 mb-4">Permisos de producto</h3>
                                    @foreach ($productPermission as $id => $name)
                                        <label>
                                            {{ Form::checkbox('permission[]', $id, false, ['class' => 'name', 'value' => '']) }}
                                            {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group checkbox-grid">
                                    <h3 class="h5 mb-4">Permisos de proveedor</h3>
                                    @foreach ($providerPermission as $id => $name)
                                        <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                                            {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group checkbox-grid">
                                    <h3 class="h5 mb-4">Permisos de compra</h3>
                                    @foreach ($purchasePermission as $id => $name)
                                        <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                                            {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group checkbox-grid">
                                    <h3 class="h5 mb-4">Permisos de venta</h3>
                                    @foreach ($salePermission as $id => $name)
                                        <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                                            {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group checkbox-grid">
                                    <h3 class="h5 mb-4">Permisos de reporte</h3>
                                    @foreach ($reportPermission as $id => $name)
                                        <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                                            {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group checkbox-grid">
                                    <h3 class="h5 mb-4">Permisos de empresa</h3>
                                    @foreach ($businesPermission as $id => $name)
                                        <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                                            {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group checkbox-grid">
                                    <h3 class="h5 mb-4">Permisos de impresora</h3>
                                    @foreach ($printerPermission as $id => $name)
                                        <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                                            {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-light">Cancelar</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/select-all.js') !!}
@endsection
