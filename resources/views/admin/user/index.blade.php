@extends('layouts.admin')
@section('title', 'Gestion de Usuarios del sistema')
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
                Usuarios del sistema
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Usuarios del sistema</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Usuarios del sistema</h4>
                            <!--<i class="fas fa-ellipsis-v"></i>-->
                            @can('crear-usuario')
                                <div class="btn-group">
                                    <a href="{{ route('users.create') }}" class="btn btn-primary ml-auto mb-2">Nuevo</a>
                                </div>
                            @endcan

                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>
                                                <a href="{{ route('users.show', $user) }}">
                                                    {{ $user->name }}</a>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $rolName)
                                                        <h5><span class="text-black">{{ $rolName }}</span></h5>
                                                    @endforeach
                                                @endif
                                            </td>

                                            <td style="width: 180px;">
                                                {!! Form::open(['route' => ['users.destroy', $user], 'method' => 'DELETE', 'id' => 'delete-form']) !!}
                                                <div class="btn-group" role="group">
                                                    @can('detalle-usuario')
                                                        <a href="{{ route('users.show', $user) }}" type="button"
                                                            class="btn btn-info btn-sm rounded" title="Detalles">
                                                            <i class="far fa-eye small"></i> Detalles
                                                        </a>
                                                    @endcan
                                                    @can('editar-usuario')
                                                        <a href="{{ route('users.edit', $user) }}" type="button"
                                                            class="btn btn-success btn-sm ml-2 rounded" title="Editar">
                                                            <i class="far fa-edit small"></i> Editar
                                                        </a>
                                                    @endcan
                                                    @can('borrar-usuario')
                                                        <button class="btn btn-danger btn-sm ml-2 rounded" type="button"
                                                            onclick="deleteConfirm('¿Está seguro de que desea eliminar este usuario?',{{ $user->id }})">
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
