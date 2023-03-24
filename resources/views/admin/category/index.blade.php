@extends('layouts.admin')
@section('title', 'Gestion de Categorias')
@section('styles')
@endsection
{{-- @section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('categories.create')}}">
        <span class="btn btn-primary">+Crear nuevo</span>
    </a>
</li>
@endsection --}}

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Categorias
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert {{ session('alert-type', 'alert-success') }} alert-dismissible fade show"
                                role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Categorias</h4>

                            <!--<i class="fas fa-ellipsis-v"></i>-->
                            @can('crear-categoria')
                                <div class="btn-group">
                                    <a href="{{ route('categories.create') }}" class="btn btn-primary ml-auto mb-2">Nuevo</a>
                                </div>
                            @endcan

                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        @if (Gate::check('detalle-categoria') && Gate::check('editar-categoria') && Gate::check('borrar-categoria'))
                                            <th>Acciones</th>
                                        @elseif (Gate::check('detalle-categoria') || Gate::check('editar-categoria') || Gate::check('borrar-categoria'))
                                            <th>Acciones</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <th scope="row">{{ $category->id }}</th>
                                            <td>
                                                <a href="{{ route('categories.show', $category) }}">
                                                    {{ $category->name }}</a>
                                            </td>
                                            <td>{{ $category->description }}</td>

                                            <td style="width: 180px;">
                                                {!! Form::open([
                                                    'route' => ['categories.destroy', $category],
                                                    'method' => 'DELETE',
                                                    'id' => 'delete-form'
                                                ]) !!}

                                                <div class="btn-group" role="group">

                                                    @can('detalle-categoria')
                                                        <a href="{{ route('categories.show', $category) }}" type="button"
                                                            class="btn btn-info btn-sm rounded" title="Detalles">
                                                            <i class="far fa-eye small"></i> Detalles
                                                        </a>
                                                    @endcan


                                                    @can('editar-categoria')
                                                        <a href="{{ route('categories.edit', $category) }}" type="button"
                                                            class="btn btn-success btn-sm ml-2 rounded" title="Editar">
                                                            <i class="far fa-edit small"></i> Editar
                                                        </a>
                                                    @endcan

                                                    @can('borrar-categoria')
                                                        <button class="btn btn-danger btn-sm ml-2 rounded" type="button"
                                                            onclick="deleteConfirm('¿Está seguro de que desea eliminar esta categoría?',{{ $category->id }})">
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
