@extends('layouts.admin')
@section('title', 'Gestion de ventas')
@section('styles')
@endsection
{{-- @section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('sales.create')}}">
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
                Ventas
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ventas</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Ventas</h4>
                            <!--<i class="fas fa-ellipsis-v"></i>-->
                            @can('crear-venta')
                                <div class="btn-group">
                                    <a href="{{ route('sales.create') }}" class="btn btn-primary ml-auto mb-2">Nuevo</a>
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
                                        @can('estado-venta')
                                            <th>Estado</th>
                                        @endcan
                                        @if (Gate::check('pdf-venta') && Gate::check('detalle-venta') && Gate::check('imprimir-venta'))
                                            <th style="width: 100px;">Acciones</th>
                                        @elseif (Gate::check('pdf-venta') || Gate::check('detalle-venta') || Gate::check('imprimir-venta'))
                                            <th style="width: 100px;">Acciones</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($sales as $sale)
                                        <tr>
                                            <th scope="row">
                                                <a href="{{ route('sales.show', $sale) }}">{{ $sale->id }}</a>
                                            </th>
                                            <td>{{ $sale->sale_date }}</td>
                                            <td>{{ $sale->total }}</td>
                                            @can('estado-venta')
                                                @if ($sale->status == 'VALID')
                                                    <td>
                                                        <a class="jsgrid-button btn btn-success"
                                                            href="{{ route('change.status.sales', ['id' => $sale->id, 'status' => 'canceled']) }}"
                                                            title="Editar">
                                                            Activo<i class="fas fa-check"></i>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td>
                                                        <a class="jsgrid-button btn btn-danger"
                                                            href="{{ route('change.status.sales', ['id' => $sale->id, 'status' => 'valid']) }}"
                                                            title="Editar">
                                                            Desactivado<i class="fas fa-times"></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endcan
                                            <td style="width: 100px;">
                                                {{-- {!! Form::open(['route'=>['sales.destroy',
                                            $sale], 'method'=>'DELETE']) !!}
                                            {{-- <a class="jsgrid-button jsgrid-edit-button" href="
                                            {{route('sales.edit', $sale)}}" title="Editar">
                                                <i class="far fa-edit"></i>
                                            </a> --}}
                                                {{-- <a class="jsgrid-button jsgrid-delete-button" type="submit" title="eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </a> --}}
                                                @can('pdf-venta')
                                                    <a href="{{ route('sales.pdf', $sale) }}" class="jsgrid-button" target="_black">
                                                        <i class="far fa-file-pdf"></i>
                                                    </a>
                                                @endcan
                                                @can('imprimir-venta')
                                                    <a href="{{ route('sales.print', $sale) }}" class="jsgrid-button">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                @endcan

                                                @can('detalle-venta')
                                                    <a href="{{ route('sales.show', $sale) }}"
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
