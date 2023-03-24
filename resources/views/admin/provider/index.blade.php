@extends('layouts.admin')
@section('title', 'Gestion de Proovedores')
@section('styles')
@endsection
{{-- @section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('providers.create')}}">
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
                Proveedores
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Proveedores</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Proveedores</h4>
                            <!--<i class="fas fa-ellipsis-v"></i>-->
                            <div class="btn-group">
                                <a href="{{ route('providers.create') }}" class="btn btn-primary ml-auto mb-2">Nuevo</a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Dirección</th>
                                        <th>Telefono</th>
                                        @if (Gate::check('detalle-proveedor') && Gate::check('editar-proveedor') && Gate::check('borrar-proveedor'))
                                            <th>Acciones</th>
                                        @elseif (Gate::check('detalle-proveedor') || Gate::check('editar-proveedor') || Gate::check('borrar-proveedor'))
                                            <th>Acciones</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($providers as $provider)
                                        <tr>
                                            <th scope="row">{{ $provider->id }}</th>
                                            <td>
                                                <a href="{{ route('providers.show', $provider) }}">
                                                    {{ $provider->name }}</a>
                                            </td>
                                            <td>{{ $provider->email }}</td>
                                            <td>{{ $provider->address }}</td>
                                            <td>{{ $provider->phone }}</td>
                                            <td style="width: 180px;">
                                                {!! Form::open(['route' => ['providers.destroy', $provider], 'method' => 'DELETE', 'id' => 'delete-form']) !!}
                                                <div class="btn-group" role="group">
                                                    @can('detalle-proveedor')
                                                        <a href="{{ route('providers.show', $provider) }}" type="button"
                                                            class="btn btn-info btn-sm rounded" title="Detalles">
                                                            <i class="far fa-eye small"></i> Detalles
                                                        </a>
                                                    @endcan
                                                    @can('editar-proveedor')
                                                        <a href="{{ route('providers.edit', $provider) }}" type="button"
                                                            class="btn btn-success btn-sm ml-2 rounded" title="Editar">
                                                            <i class="far fa-edit small"></i> Editar
                                                        </a>
                                                    @endcan
                                                    @can('borrar-proveedor')
                                                        <button class="btn btn-danger btn-sm ml-2 rounded" type="button"
                                                        onclick="deleteConfirm('¿Está seguro de que desea eliminar este proveedor?',{{ $provider->id }})">
                                                            <i class="fas fa-trash-alt small"></i> Eliminar
                                                        </button>
                                                    @endcan

                                                </div>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
