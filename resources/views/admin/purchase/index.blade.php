@extends('layouts.admin')
@section('title', 'Gestion de compras')
@section('styles')
@endsection
{{-- @section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('purchases.create')}}">
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
                Compras
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Compras</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Compras</h4>
                            <!--<i class="fas fa-ellipsis-v"></i>-->
                            @can('crear-compra')
                                <div class="btn-group">
                                    <a href="{{ route('purchases.create') }}" class="btn btn-primary ml-auto mb-2">Nuevo</a>
                                </div>
                            @endcan

                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        @can('estado-compra')
                                        <th>Estado</th>
                                        @endcan
                                        @if (Gate::check('pdf-compra') && Gate::check('detalle-compra'))
                                        <th style="width: 100px;">Acciones</th> 
                                        @elseif (Gate::check('pdf-compra') || Gate::check('detalle-compra'))
                                        <th style="width: 100px;">Acciones</th> 
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                        <tr>
                                            <th scope="row">
                                                <a href="{{ route('purchases.show', $purchase) }}">{{ $purchase->id }}</a>
                                            </th>
                                            <td>{{ $purchase->purchase_date }}</td>
                                            <td>{{ $purchase->total }}</td>
                                            
                                            @can('estado-compra')                                            
                                            @if ($purchase->status == 'VALID')
                                                <td>
                                                    <a class="jsgrid-button btn btn-success"
                                                        href="{{ route('change.status.purchases', ['id' => $purchase->id, 'status' => 'canceled']) }}"
                                                        title="Editar">
                                                        Activo<i class="fas fa-check"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <td>
                                                    <a class="jsgrid-button btn btn-danger"
                                                        href="{{ route('change.status.purchases', ['id' => $purchase->id, 'status' => 'valid']) }}"
                                                        title="Editar">
                                                        Desactivado<i class="fas fa-times"></i>
                                                    </a>
                                                </td>
                                            @endif
                                            @endcan

                                            <td style="width: 100px;">
                                                {{-- {!! Form::open(['route'=>['purchases.destroy',
                                            $purchase], 'method'=>'DELETE']) !!}
                                            {{-- <a class="jsgrid-button jsgrid-edit-button" href="
                                            {{route('purchases.edit', $purchase)}}" title="Editar">
                                                <i class="far fa-edit"></i>
                                            </a> --}}
                                                {{-- <a class="jsgrid-button jsgrid-delete-button" type="submit" title="eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </a> --}}
                                                @can('pdf-compra')
                                                    <a href="{{ route('purchases.pdf', $purchase) }}" target="_black"
                                                        class="jsgrid-button">
                                                        <i class="far fa-file-pdf"></i>
                                                    </a>
                                                @endcan

                                                {{-- <a href="#" class="jsgrid-button">
                                                    <i class="fas fa-print"></i>
                                                </a> --}}
                                                @can('detalle-compra')
                                                    <a href="{{ route('purchases.show', $purchase) }}"
                                                        class="jsgrid-button jsgrid-edit-button">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                @endcan

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
    {!! Html::script('js/alerts.js') !!}
    {!! Html::script('js/avgrund.js') !!}
@endsection
