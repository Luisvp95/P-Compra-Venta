@extends('layouts.admin')
@section('title', 'Gestion de Clientes')
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
                Clientes
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Clientes</h4>
                            <!--<i class="fas fa-ellipsis-v"></i>-->
                            @can('crear-cliente')
                                <div class="btn-group">
                                    <a href="{{ route('clients.create') }}" class="btn btn-primary ml-auto mb-2">Nuevo</a>
                                </div>
                            @endcan

                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>CI</th>
                                        <th>Dirección</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        @if (Gate::check('detalle-cliente') && Gate::check('editar-cliente') && Gate::check('borrar-cliente'))
                                            <th>Acciones</th>
                                        @elseif (Gate::check('detalle-cliente') || Gate::check('editar-cliente') || Gate::check('borrar-cliente'))
                                            <th>Acciones</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                        <tr>
                                            <th scope="row">{{ $client->id }}</th>
                                            <td>
                                                <a href="{{ route('clients.show', $client) }}">
                                                    {{ $client->name }}</a>
                                            </td>
                                            <td>{{ $client->ci }}</td>
                                            <td>{{ $client->address }}</td>
                                            <td>{{ $client->phone }}</td>
                                            <td>{{ $client->email }}</td>
                                            <td style="width: 180px;">
                                                {!! Form::open(['route' => ['clients.destroy', $client], 'method' => 'DELETE', 'id' => 'delete-form']) !!}
                                                <div class="btn-group" role="group">
                                                    @can('detalle-cliente')
                                                        <a href="{{ route('clients.show', $client) }}" type="button"
                                                            class="btn btn-info btn-sm rounded" title="Detalles">
                                                            <i class="far fa-eye small"></i> Detalles
                                                        </a>
                                                    @endcan
                                                    @can('editar-cliente')
                                                        <a href="{{ route('clients.edit', $client) }}" type="button"
                                                            class="btn btn-success btn-sm ml-2 rounded" title="Editar">
                                                            <i class="far fa-edit small"></i> Editar
                                                        </a>
                                                    @endcan
                                                    @can('borrar-cliente')
                                                        <button class="btn btn-danger btn-sm ml-2 rounded" type="button"
                                                            onclick="deleteConfirm('¿Está seguro de que desea eliminar este cliente?',{{ $client->id }})">
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
