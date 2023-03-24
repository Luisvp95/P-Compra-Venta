@extends('layouts.admin')
@section('title', 'Gestion de Productos')
@section('styles')
@endsection
{{-- @section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('products.create')}}">
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
                Productos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Productos</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Productos</h4>
                            <!--<i class="fas fa-ellipsis-v"></i>-->
                            @can('crear-producto')
                                <div class="btn-group">
                                    <a href="{{ route('products.create') }}" class="btn btn-primary ml-auto mb-2">Nuevo</a>
                                </div>
                            @endcan
                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Stock</th>
                                        <th>Categoria</th>
                                        <th>Estado</th>
                                        @if (Gate::check('detalle-producto') && Gate::check('editar-producto') && Gate::check('borrar-producto'))
                                            <th>Acciones</th>
                                        @elseif (Gate::check('detalle-producto') || Gate::check('editar-producto') || Gate::check('borrar-producto'))
                                            <th>Acciones</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <th scope="row">{{ $product->id }}</th>
                                            <td>
                                                <a href="{{ route('products.show', $product) }}">
                                                    {{ $product->name }}</a>
                                            </td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            @if ($product->status == 'ACTIVE')
                                                <td>
                                                    <a class="jsgrid-button btn btn-success"
                                                        href="
                                            {{ route('change.status.products', $product) }}"
                                                        title="Editar">
                                                        Activo<i class="fas fa-check"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <td>
                                                    <a class="jsgrid-button btn btn-danger"
                                                        href="
                                            {{ route('change.status.products', $product) }}"
                                                        title="Editar">
                                                        Desactivado<i class="fas fa-times"></i>
                                                    </a>
                                                </td>
                                            @endif
                                            <td style="width: 180px;">
                                                {!! Form::open(['route' => ['products.destroy', $product], 'method' => 'DELETE', 'id' => 'delete-form']) !!}

                                                <div class="btn-group" role="group">

                                                    @can('detalle-producto')
                                                        <a href="{{ route('products.show', $product) }}" type="button"
                                                            class="btn btn-info btn-sm rounded" title="Detalles">
                                                            <i class="far fa-eye small"></i> Detalles
                                                        </a>
                                                    @endcan

                                                    @can('editar-producto')
                                                        <a href="{{ route('products.edit', $product) }}" type="button"
                                                            class="btn btn-success btn-sm ml-2 rounded" title="Editar">
                                                            <i class="far fa-edit small"></i> Editar
                                                        </a>
                                                    @endcan

                                                    @can('borrar-producto')
                                                        <button class="btn btn-danger btn-sm ml-2 rounded" type="button"
                                                            onclick="deleteConfirm('¿Está seguro de que desea eliminar este producto?',{{ $product->id }})">
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
