@extends('layouts.admin')
@section('title', 'Gestion de Roles')
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
                Roles
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Roles</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Roles</h4>
                            <!--<i class="fas fa-ellipsis-v"></i>-->
                            @can('crear-rol')
                                <div class="btn-group">
                                    <a href="{{ route('roles.create') }}" class="btn btn-primary ml-auto mb-2">Nuevo</a>
                                </div>
                            @endcan

                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <th scope="row">{{ $role->id }}</th>
                                            <td>
                                                <a href="{{ route('roles.show', $role) }}">
                                                    {{ $role->name }}</a>
                                            </td>

                                            <td style="width: 180px;">
                                                {!! Form::open(['route' => ['roles.destroy', $role], 'method' => 'DELETE', 'id' => 'delete-form']) !!}
                                                <div class="btn-group" role="group">
                                                    @can('detalle-rol')
                                                        <a href="{{ route('roles.show', $role) }}" type="button"
                                                            class="btn btn-info btn-sm rounded" title="Detalles">
                                                            <i class="far fa-eye small"></i> Detalles
                                                        </a>
                                                    @endcan
                                                    @can('editar-rol')
                                                        <a href="{{ route('roles.edit', $role) }}" type="button"
                                                            class="btn btn-success btn-sm ml-2 rounded" title="Editar">
                                                            <i class="far fa-edit small"></i> Editar
                                                        </a>
                                                    @endcan
                                                    @can('borrar-rol')
                                                        <button class="btn btn-danger btn-sm ml-2 rounded" type="button"
                                                            onclick="deleteConfirm('¿Está seguro de que desea eliminar este rol?',{{ $role->id }})">
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
